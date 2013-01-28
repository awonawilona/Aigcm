<?php
class AwoConfigsController extends AppController {

	var $name = 'AwoConfigs';
	var $helpers = array('Html', 'Form');
    
    var $components = array('Perfil');
    
    function index()
    {
        $this->AwoConfig->recursive = 0;   
        $this->set('awoConfig', $this->paginate());
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
    
    function edit($id = null)
    {
        Configure::write('debug', '0');
         
        if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Configuraci&oacute;n no v&aacute;lida', true));
			$this->redirect(array('action' => 'edit/1'));
		}
		if (!empty($this->data)) {
              
            $modulosInstalados = new stdClass();
            
            $modulosInstalados->noticias = $this->data['AwoConfig']['modulo1'];
            
            $modulosInstalados->galerias = $this->data['AwoConfig']['modulo2'];
            
            $modulosInstalados->bibliotecas = $this->data['AwoConfig']['modulo3'];
            
            $this->AwoConfig->guardaModulos($modulosInstalados);
              
            $archivos = '';
              
            if((int)$this->data['AwoConfig']['tipoArch1'] == 1)
            {
                $archivos .= 'PDF,';
                
                $this->data['AwoConfig']['tipoArch1'] = NULL;
            }
            
            if((int)$this->data['AwoConfig']['tipoArch2'] == 1)
            {
                $archivos .= 'WWW,';
                
                $this->data['AwoConfig']['tipoArch2'] = NULL;
            }
            
            if((int)$this->data['AwoConfig']['tipoArch3'] == 1)
            {
                $archivos .= 'DOC,';
                
                $this->data['AwoConfig']['tipoArch3'] = NULL;
            }
            
            if((int)$this->data['AwoConfig']['tipoArch4'] == 1)
            {
                $archivos .= 'XLS,';
                
                $this->data['AwoConfig']['tipoArch4'] = NULL;
            }
            
            $archivos = rtrim($archivos, ',');  
          
            $this->data['AwoConfig']['bibl_file_type'] = $archivos;
		  
			if ($this->AwoConfig->save($this->data)) {
				//$this->Session->setFlash(__('La configuraci&oacute;n ha sido actualizada', true));
				$this->redirect(array('action' => 'edit/1'));
			} else {
				//$this->Session->setFlash(__('La configuraci&oacute;n no ha sido actualizada, por favor, int&eacute;ntelo de nuevo.', true));
			}
		}
		if (empty($this->data)) {
		  
            $modulos = $this->AwoConfig->getModulos();
            
            $this->set('modulos', $modulos);
            
			$this->data = $this->AwoConfig->read(null, $id);
		}
    }
}
?>