<?php
/* SVN FILE: $Id$ */
/**
 * Short description for file.
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * Short description for class.
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class AppController extends Controller {
    
   /* var $components = array("Auth");
    
    function beforeFilter() 
    {
            if (isset($this->Auth)) {
            $this->Auth->userModel = 'AwoUsuario';
            $this->Auth->loginAction = array('controller'=>'awo_usuarios', 'action'=>'login');
            $this->Auth->loginRedirect = array('controller'=>'awo_usuarios', 'action'=>'index');
        }
        
        if($this->Session->check('AwoUsuario') == false)
        {
            $this->redirect('/awo_usuarios/login');
            $this->Session->setFlash('The URL you\'ve followed requires you login.');
        }
    }*/
    
}
?>