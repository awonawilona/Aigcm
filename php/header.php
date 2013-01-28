<?php

    require_once('./php/classes/awback.class.php');
    
    //session_start();
    
    if(isset($_SESSION['usuario']))
    {
        $sessUser =  
        
            'Socio: '.
            
            $_SESSION['usuario']->username.
            
            '&nbsp;'.
            
            '<a href="index.php?op=finSess">'.
                
                'Finalizar Sesi&oacute;n'.
            
            '</a>';
    }
    else
    {
        $sessUser = NULL;
    }
    
    if(sizeof($_POST) > 0)
    {
        $clase = new awback();

        $login = $clase->login($_POST['username'], $_POST['passwd']);
        
        if($login)
        {                        
            $user = new stdClass();
            
            $user->username = $_POST['username'];
            
            $_SESSION['usuario'] = $user;
        }
    }

?>

<div id="header">
		<h1><a href="index.php" id="logo"><img src="img/logo.png" alt="Aigcm"/></a>
		</h1>
		<div id="rrss">
			<a href="http://es-es.facebook.com/pages/AIGCM-Asociaci%C3%B3n-de-Ingenieros-Ge%C3%B3logos-de-la-Comunidad-de-Madrid/281945748483509" target="_blank"><img src="img/rrss_fb.png" alt="Facebook"/></a>					
			<a href="http://www.linkedin.com/groups?home=&gid=4212231&trk=anet_ug_hm" target="_blank"><img src="img/rrss_ln.png" alt="Linkedin"/></a>
			<a href="http://aigcm.blogspot.com" target="_blank"><img src="img/rrss_bl.png" alt="Blogger"/></a>
			<a href="mailto:info@aigcm.es"><img src="img/rrss_em.png" alt="email" /></a>
		</div>
		<form action="#" method="post">
            
            <?php
                
            if(!is_null($sessUser))
            {
                echo $sessUser;
            }
            else
            {
                
            ?>
            
			<label for="usuario">Socio: </label>
			<input type="text" name="username" />
			<input type="password" name="passwd" />
            <input type="submit" value="ir"/>
            
            <?php
            
            }
            
            ?>
		</form>
			<div id="menu"> 
				<a href="historia.php">Historia</a>
				<a href="objetivo.php">Objetivo</a>
				<a href="socios.php">Socios</a>
				<a href="formacion.php">Formaci&oacute;n</a>
				<a href="profesional.php">Profesional</a>
				<a href="documentacion.php">Documentaci&oacute;n</a>
			</div>
	</div>