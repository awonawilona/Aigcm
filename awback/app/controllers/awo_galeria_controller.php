<?php
class AwoGaleriaController extends AppController {

	var $name = 'AwoGaleria';
	var $helpers = array('Html', 'Form', 'Ajax', 'Javascript');
    
    var $components = array('Perfil');

	function index() {
		$this->AwoGalerium->recursive = 0;
		$this->set('awoGaleria', $this->paginate());
	}
    
    function beforeFilter() 
    {
        if (isset($this->Auth)) {
            $this->Auth->userModel = 'AwoUsuario';
            $this->Auth->loginAction = array('controller'=>'awo_usuarios', 'action'=>'login');
            $this->Auth->loginRedirect = array('controller'=>'pages', 'action'=>'home');
        }
        
        if($this->Session->check('AwoUsuario') == false)
        {
            $this->redirect('/awo_usuarios/login');
            $this->Session->setFlash('The URL you\'ve followed requires you login.');
        }
        
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
        
        parent::beforeFilter();
    } 
    
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid AwoGalerium', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('awoGalerium', $this->AwoGalerium->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
		  
            $this->data['AwoGalerium']['created_at'] = date('Y-m-d H:i:s', time());
            
            $this->data['AwoGalerium']['updated_at'] = date('Y-m-d H:i:s', time());
          
			$this->AwoGalerium->create();
			if ($this->AwoGalerium->save($this->data)) {
				$this->Session->setFlash(__('La galer&iacute;a ha sido guardada', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La galer&iacute;a no ha podido ser guardada, por favor, int&eacute;ntelo de nuevo', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid AwoGalerium', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
		  
            $this->data['AwoGalerium']['updated_at'] = date('Y-m-d H:i:s', time());
          
			if ($this->AwoGalerium->save($this->data)) {
				$this->Session->setFlash(__('La galer&iacute;a ha sido actualizada', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La galer&iacute;a no ha sido guardada, por favor, int&eacute;ntelo de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->AwoGalerium->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Identificador no v&aacute;lido', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->AwoGalerium->del($id)) {
			$this->Session->setFlash(__('Galer&iacute;a eliminada', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('La galer&iacute;a no se ha eliminado, por favor, int&eacute;ntelo de nuevo.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>