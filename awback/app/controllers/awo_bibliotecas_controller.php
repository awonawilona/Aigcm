<?php
class AwoBibliotecasController extends AppController {

	var $name = 'AwoBibliotecas';
	var $helpers = array('Html', 'Form', 'Ajax', 'Javascript', 'Paginator');
    
    var $components = array('Perfil');

	function index()
    {
		$this->AwoBiblioteca->recursive = 0;
		$this->set('awoBibliotecas', $this->paginate());
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
			$this->Session->setFlash(__('Invalid AwoBiblioteca', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('awoBiblioteca', $this->AwoBiblioteca->read(null, $id));
	}

	function add() {
	   
        $config = $this->AwoBiblioteca->getBibliotecaParams();
            
        $this->set('config', $config);
       
		if (!empty($this->data)) {
		  
           /* var_dump($this->data);
            
            exit;*/
            
            $this->data['AwoBiblioteca']['privada'] = $this->data['AwoBiblioteca']['socios'];
              
            $tipo = $this->AwoBiblioteca->validaTipo($this->data);
            
            $this->data['AwoBiblioteca']['tipo'] = $tipo;
            
            $archivo = $this->AwoBiblioteca->cargaArchivo($this->data);
            
            $this->data['AwoBiblioteca']['archivo'] = $archivo;
            
            $this->data['AwoBiblioteca']['estado'] = 1;
          
            $this->data['AwoBiblioteca']['created_at'] = date('Y-m-d H:i:s', time());
            
            $this->data['AwoBiblioteca']['updated_at'] = date('Y-m-d H:i:s', time());
            
            unset($this->data['AwoBiblioteca']['Tipo de Archivo']);
            
            unset($this->data['AwoBiblioteca']['Archivo']);
            
            unset($this->data['AwoBiblioteca']['socios']);
            
            /*var_dump($this->data);
            
            exit;*/
          
			$this->AwoBiblioteca->create();
			if ($this->AwoBiblioteca->save($this->data)) {
				$this->Session->setFlash(__('La biblioteca ha sido guardada', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La biblioteca no se ha podido registrar, por favor, int&eacute;ntelo de nuevo.', true));
			}
		}
	}

	function edit($id = null) {
	       
        $config = $this->AwoBiblioteca->getBibliotecaParams();
            
        $this->set('config', $config);
       
		if (!$id && empty($this->data)) {          
			$this->Session->setFlash(__('Biblioteca no v&aacute;lida', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
              
            if(isset($this->data['AwoBiblioteca']['socios']))
                {
                  $this->data['AwoBiblioteca']['privada'] = $this->data['AwoBiblioteca']['socios']; 
                  
                  unset($this->data['AwoBiblioteca']['socios']); 
                }
                else
                {
                    $this->data['AwoBiblioteca']['privada'] = 0;
                }
                 
                
                
                //unset($this->data['AwoBiblioteca']['socios']);
			 
                $this->data['AwoBiblioteca']['updated_at'] = date('Y-m-d H:i:s', time());
                
                
            
           /* var_dump($this->data);
            
            exit;*/
          
			if ($this->AwoBiblioteca->save($this->data)) {
             
				$this->Session->setFlash(__('La biblioteca ha sido actualizada', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La biblioteca no se ha actualizado, por favor, int&eacute;ntelo de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->AwoBiblioteca->read(null, $id);
            
            $idArch = $this->AwoBiblioteca->getIdArch($this->data);
            
            $this->set('idTipoArch', $idArch);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Identificador no v&aacute;lido', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->AwoBiblioteca->del($id)) {
			$this->Session->setFlash(__('Biblioteca eliminada', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('La biblioteca no ha sido eliminada, por favor, int&eacute;ntelo de nuevo.', true));
		$this->redirect(array('action' => 'index'));
	}
    

}
?>