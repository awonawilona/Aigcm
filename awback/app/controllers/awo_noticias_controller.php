<?php
class AwoNoticiasController extends AppController {

	var $name = 'AwoNoticias';
	var $helpers = array('Html', 'Form', 'Ajax', 'Javascript', 'Tinymce');
    
    var $components = array('Perfil');

	function index() {
		$this->AwoNoticia->recursive = 0;
		$this->set('awoNoticias', $this->paginate());
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
			$this->Session->setFlash(__('Invalid AwoNoticia', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('awoNoticia', $this->AwoNoticia->read(null, $id));
	}

	function add() {
	   
        $config = $this->AwoNoticia->getParams();
            
        $this->set('config', $config);
       
		if (!empty($this->data)) {
            
            $archivos = $this->AwoNoticia->cargaArchivos($this->data);
            
            
            
            if(isset($archivos['imagen']))
            {
                $this->data['AwoNoticia']['imagen'] = $archivos['imagen'];   
            }
            else
            {
                unset($this->data['AwoNoticia']['imagen']);
            }
            
            if(isset($archivos['archivo']))
            {
                $this->data['AwoNoticia']['archivo'] = $archivos['archivo'];
            }     
            else
            {
                unset($this->data['AwoNoticia']['archivo']);
            }      
            
            $this->data['AwoNoticia']['portada'] = 1;
            
            $this->data['AwoNoticia']['estado'] = 1;
		  
            $this->data['AwoNoticia']['created_at'] = date('Y-m-d H:i:s', time());
            
            $this->data['AwoNoticia']['updated_at'] = date('Y-m-d H:i:s', time());
            
            //var_dump($this->data);
            
            //exit;
            
			$this->AwoNoticia->create();
			if ($this->AwoNoticia->save($this->data)) {
				$this->Session->setFlash(__('La noticia ha sido guardada', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La noticia no se ha podido guardar, por favor, int&eacute;ntelo de nuevo.', true));
			}
		}
	}

	function edit($id = null) {
	   
        $config = $this->AwoNoticia->getParams();
            
        $this->set('config', $config);
       
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Noticia no valida', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
            
            if(strlen($this->data['AwoNoticia']['imagen']['name']) > 0)
            {
                $imagen = $this->AwoNoticia->cargaImagen($this->data['AwoNoticia']['imagen']);
                
                $this->data['AwoNoticia']['imagen'] = $imagen;
            }
            else
            {
                unset($this->data['AwoNoticia']['imagen']);
            }
            
            /*if($this->data['AwoNoticia']['archivo']['name'] !== '')
            {
                $archivo = $this->AwoNoticia->cargaArchivo($this->data['AwoNoticia']['archivo']);
                
                $this->data['AwoNoticia']['imagen'] = $archivo;
            }
            else
            {
                unset($this->data['AwoNoticia']['archivo']);
            }*/
              
            $this->data['AwoNoticia']['portada'] = 1;
              
            $this->data['AwoNoticia']['updated_at'] = date('Y-m-d H:i:s', time());
            
			if ($this->AwoNoticia->save($this->data)) {
				$this->Session->setFlash(__('La noticia ha sido actualizada', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La noticia no ha sido actualizada, por favor, int&eacute;ntelo de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->AwoNoticia->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Identificador no v&aacute;lido', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->AwoNoticia->del($id)) {
			$this->Session->setFlash(__('Noticia eliminada', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('La noticia no se ha eliminado, por favor, int&eacute;ntelo de nuevo.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>