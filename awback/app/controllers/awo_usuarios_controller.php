<?php
class AwoUsuariosController extends AppController {

	var $name = 'AwoUsuarios';
	var $helpers = array('Html', 'Form', 'Ajax', 'Javascript');
    
    var $components = array('Perfil', 'Email');

	function index() {
		$this->AwoUsuario->recursive = 0;
		$this->set('awoUsuarios', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid AwoUsuario', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('awoUsuario', $this->AwoUsuario->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
		      
            $passwd = $this->data['AwoUsuario']['password'];
            
            $this->data['AwoUsuario']['password'] = md5($passwd);
              
            $this->data['AwoUsuario']['created_at'] = date('Y-m-d H:i:s', time());
            
            $this->data['AwoUsuario']['updated_at'] = date('Y-m-d H:i:s', time());
            
            /*var_dump($this->data);
            
            exit;*/
            
			$this->AwoUsuario->create();
			if ($this->AwoUsuario->save($this->data)) {
			     
                $this->_sendNewUserMail($this->data);
             
				$this->Session->setFlash(__('El usuario se ha dado de alta correctamente.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El usuario no se ha podido registrar, por favor, int&eacute;ntelo de nuevo.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Usuario erroneo.', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
		      
            if($this->data['AwoUsuario']['password'] !== $this->data['AwoUsuario']['passwordConf'])
            {
                $this->Session->setFlash(__('Las Contrase&ntilde;as no coinciden.', true));
                
           	    $this->redirect(array('action' => 'edit', 'id' => $id));
            }
            else
            {
                unset($this->data['AwoUsuario']['passwordConf']);
            }
              
            $this->data['AwoUsuario']['updated_at'] = date('Y-m-d H:i:s', time());
              
            /*var_dump($this->data);
            
            exit;*/
            
			if ($this->AwoUsuario->save($this->data)) {
				$this->Session->setFlash(__('El usuario ha sido actualizado.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El usuario no se ha podido actualizar, por favor, int&eacute;ntelo de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->AwoUsuario->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Identificador inv&aacute;lido', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->AwoUsuario->del($id)) {
			$this->Session->setFlash(__('Usuario Eliminado', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El usuario no ha sido eliminado, por favor, int&eacute;ntelo de nuevo.', true));
		$this->redirect(array('action' => 'index'));
	}
    
    function beforeFilter()
    {        
        
        $this->__validateLoginStatus();
        
        $usuario = $this->Session->read('AwoUsuario');
        
        $this->set('usuarioIdentificado', $usuario['username']);
        
        $cliente = $this->Session->read('Cliente');
        
        $this->set('cliente', $cliente);
        
        $perfil = $this->Perfil->getPerfil($usuario['username']);
        
        if($perfil[0]['b']['perfil'] === 'Socio')
        {
            $this->Session->destroy('user');
            $this->Session->setFlash('Los usuarios con perfil de socios no pueden acceder al backend');
            $this->redirect('login');
        }
        
        $this->set('perfil', $perfil);
    }
    
    function login()
    {
        if(empty($this->data) == false)
        {
            if(($user = $this->AwoUsuario->validateLogin($this->data['AwoUsuario'])) == true)
            {
                $this->Session->write('AwoUsuario', $user);
                $this->Session->write('Cliente', 'Aigcm');
                //$this->Session->setFlash('Has iniciado sesi&oacute;n correctamente.');
                $this->redirect('/pages/home');
                exit();
            }
            else
            {
                $this->Session->setFlash('Lo sentimos, el usuario/contrase&ntilde;a no son correctos.');
                $this->redirect('/awo_usuarios/login');
                exit();
            }
        }
    }
    
    function logout()
    {
        $this->Session->destroy('user');
        //$this->Session->setFlash('Has iniciado sesi&oacute;n correctamente');
        $this->redirect('login');
    }
        
    function __validateLoginStatus()
    {
        if($this->action != 'login' && $this->action != 'logout')
        {            
            if($this->Session->check('AwoUsuario') == false)
            {
                $this->redirect('/awo_usuarios/login');
                $this->Session->setFlash('The URL you\'ve followed requires you login.');
            }
        }
    }   
    
    function _sendNewUserMail($data) 
    {        
        $this->Email->to = $data['AwoUsuario']['email'];
        
        //$this->Email->bcc = array('secreto@ejemplo.com');
          
        $this->Email->subject = 'Bienvenido a AIGCM';
        
        $this->Email->replyTo = 'info@aigcm.es';
        
        $this->Email->from = 'AIGCM <info@aigcm.es>';
        
        $this->Email->template = '<p>Bienvanido a AIGCM<br /> Te recordamos tus datos de acceso:<br /> <strong>usuario:</strong>'.$data['AwoUsuario']['username'].'<br /><strong>Contrase&ntilde;a:</strong>'.$data['AwoUsuario']['password'].'</p>'; // NOTAR QUE NO HAY '.ctp'
        
        //Enviar como 'html', 'text' or 'both' (ambos) - (por defecto es 'text')
        $this->Email->sendAs = 'both'; // queremos enviar un lindo email
        
        //Variables de la vista
        //$this->set('User', $User);
        
        //NO PASAMOS ARGUMENTOS A SEND()
        $this->Email->send();
     }


}
?>