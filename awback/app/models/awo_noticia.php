<?php
class AwoNoticia extends AppModel {
    
    /** 
	 * Arreglo asociativo con los objetos de Imagick para crear los thumbnails
	 * El índice del arreglo es el nombre con el que se guardará el archivo 
	 * y el valor es el objeto Imagick
	 * 
	 * @var array
	 */
	protected $_thumbnails = array ();
	/** 
	 * Arreglo con las medidas con que se generarán los thumbnails
	 * 
	 * @var array
	 */
	protected $_thumbsSizes = array ();
	/** 
	 * Arreglo con las configuraciones por default
	 * 
	 * @var array
	 */
	protected $_config = array ();
	/** 
	 * Path en el que se guardarán las imágenes.
	 * 
	 * @var string
	 */
	protected $_path = null;
	/** 
	 * Arreglo que contiene los resultados de las creaciones de los thumbnails
	 * 
	 * @var array
	 */
	public $result = array ();
	/** 
	 * Método que inicializa los objetos de thumbnail.
	 * 
	 * @param array $params
	 * @throws Thumbnails_Exception
	 */
    
	var $name = 'AwoNoticia';
	var $validate = array(
		'titulo' => array('notempty'),
		'estado' => array('numeric')
		//'created_at' => array('date'),
		//'updated_at' => array('date')
	);
    
    var $order = 'created_at DESC';
    
    function getParams()
    {
        $params = $this->query('SELECT gal_max_size FROM awo_config');
        
        return $params;
    }
    
    function cargaArchivos($data)
    {
        $archivos = array();
        
        $dir = 'img/noticias/img';
        
        $infoArchivo = $data['AwoNoticia']['imagen'];
        
        if($infoArchivo !== '')
        {
            $saveAs = $dir.DS.$infoArchivo['name'];
        
            if(!file_exists($saveAs))
            {
                if(move_uploaded_file($infoArchivo['tmp_name'], $saveAs))
                {
                    $photos = array($infoArchivo['name']);
                    
                    $photoDir = WWW_ROOT.DS.$dir.DS;
                    
                    $thumbs = new thumbs($photoDir, $photos, "thumbs/", false, 0, 100, false, 120, 120);
                    
                    $thumbs->creates_thumbs();
                    
                    $archivos['imagen'] = $infoArchivo['name'];
                }
            }
        }
        else
        {
            $archivos['imagen'] = 'vacio';
        }
        
        if(isset($data['AwoNoticia']['archivo']))
        {
           $dir = 'img/noticias/archivos';
        
            $infoArchivo = $data['AwoNoticia']['archivo'];
            
            if($infoArchivo !== '')
            {
                $saveAs = $dir.DS.$infoArchivo['name'];
            
                if(!file_exists($saveAs))
                {
                    if(move_uploaded_file($infoArchivo['tmp_name'], $saveAs))
                    {
                        $archivos['archivo'] = $infoArchivo['name'];
                    }
                }
            }
            else
            {
                $archivos['archivo'] = 'vacio';
            } 
        }
        else
        {
            $archivos['archivo'] = 'vacio';
        }
        
        return $archivos;     
    }
    
    function cargaArchivo($data)
    {
        $dir = 'img/noticias/archivos';
        
        $infoArchivo = $data;
        
        $saveAs = $dir.DS.$infoArchivo['name'];
        
        if(!file_exists($saveAs))
        {
            if(move_uploaded_file($infoArchivo['tmp_name'], $saveAs))
            {
                return $infoArchivo['name'];
            }
        }
    }
    
    function cargaImagen($data)
    {
        $dir = 'img/noticias/img';
        
        $infoArchivo = $data;
        
        $saveAs = $dir.DS.$infoArchivo['name'];
        
        if(!file_exists($saveAs))
        {
            if(move_uploaded_file($infoArchivo['tmp_name'], $saveAs))
            { 
                $photos = array($infoArchivo['name']);
                
                $photoDir = WWW_ROOT.DS.$dir.DS;
                
                $thumbs = new thumbs($photoDir, $photos, "thumbs/", false, 0, 100, false, 120, 120);
                
                $thumbs->creates_thumbs();
                
                $archivos['imagen'] = $infoArchivo['name'];
                
                return $infoArchivo['name'];
            }
        }
    }

}


/**
 * Ahora las clases para la creación de los thumbnails
 */


class files
{
    /**
    * GetFileList
    *
    * Creates an array with a list of files of a given dir. 
    * You can choice specific types of files or all files of the dir.
    *
    * @param string $directory The dir name that have the files you want
    * to create the filelist
    * @param mixed $type File types that will be added to the list. That can be:
    * images, pages, videos or docs. Default is all files of the dir.
    * @param boolean $print_list For debugging
    * @return array
    * @access public
    * @since Nov 11, 2003
    * @version Aug 1, 2004
    */
    function get_file_list($directory, $type = "img_creation", $print_list = false)
    {
        // Checks the dir
        if(!is_dir($directory))
        {
            $this->_error("Invalid Directory: " . $diretorio, E_USER_ERROR);
        }
        
        // File types regex
        Switch($type)
        {
            Case "img_creation":
                $types_regex = "jpeg|jpg|png";
            break;

            Case "img_creation_gif":
                $types_regex = "jpeg|jpg|png|gif";
            break;

            Case "img":
                $types_regex = "gif|jpeg|jpg|png|bmp";
            break;

            Case "pag":
                $types_regex = "txt|htm|html|php|asp|aspx";
            break;

            Case "vid":
                $types_regex = "avi|swf|mpg|mpeg|wmv|asx|mov";
            break;

            Case "doc":
                $types_regex = "txt|doc|rtf|xsl";
            break;

            Default:
                $types_regex = false;
        }
        
        // Open dir handle
        if(!$dir_handle = @opendir($directory))
        {
            $this->_error("I couldn't open the dir: " . $directory, E_USER_ERROR);
        }
        
        // Initilization of the list array
        $file_list = array();
        
        // Starts dir navigation
        while (false !== ($file = @readdir($dir_handle)))
        { 
            if ($file == "." || $file == "..")
            { 
                continue;
            }
            
            // The list will be generate with specific types, according to the regex
            if($types_regex)
            {
                if(eregi( "\.(" . $types_regex . ")$", $file))
                {
                    $file_list[] = $file;
                }
            }

            // The list will be generate with all dir's files
            else
            {
                // Add only files to the list
                if(is_file($directory . $file))
                {
                    $file_list[] = $file;
                }
            }
        }
        
        // Close dir handle
        @closedir($dir_handle);
        
        // Has no files in the dir
        if(!sizeof($file_list))
        {
            $this->_error("The directory: " . $directory . " is empty!", E_USER_NOTICE);
        }

        // If debugging...
        if($print_list)
        {
            echo "<pre>";
            print_r($file_list);
            echo "</pre>";
        }
        
        // Returns file list
        return $file_list;
    }

    /**
    * Prints errors messages
    *
    * @param string $mensagem The error message
    * @param integer $tipo Error type
    * @access private
    * @since Jan 19, 2004
    */
	function _error($mensagem, $tipo)
	{
        if($tipo == E_USER_ERROR)
        {
            $topo = "Error!";
        }
        else
        {
            $topo = "Notification";
        }

        echo "<span style=\"background-color: #FFD7D7\"><font face=verdana size=2><font color=red><b>" . $topo . "</b></font>: " . $mensagem . "</font></span><br><br>";

        if($tipo == E_USER_ERROR)
        {
            exit;
        }
	}
}


class thumbs extends files
{
    /**#@+
    * @access public
    */
    /**
    * Originals images dir. Eg: "imagens/"
    * @var string $_directory
    */
    var $_directory;

    /**
    * File list of $directory that will be generate thumbs
    * @var array $_file_list
    */
    var $_file_list = array();

    /**
    * Directory that the thumbs will be saved. Eg: "thumbs/"
    * @var string $_thumbs_directory
    */
    var $_thumbs_directory;

    /**
    * Thumbs name that will be attached to image original name 
    * @var string $_thumbs_name
    */
    var $_thumbs_name;

    /**
    * 0-100 value of thumbs JPEG quality
    * @var integer $_thumbs_quality
    */
    var $_thumbs_quality;

    /**
    * Original image dimensions percent that will be given to the thumbs
    * @var integer $_thumbs_percent
    */
    var $_thumbs_percent;

    /**
    * Unique width to all the thumbs
    * @var integer $_thumbs_width
    */
    var $_thumbs_width;

    /**
    * Unique height to all the thumbs
    * @var integer $_thumbs_height
    */
    var $_thumbs_height;

    /**
    * Grayscale thumbnails?
    * @var boolean $_gray_scale
    */
    var $_gray_scale;
    /**#@-*/

    /**#@+
    * @access private
    */
    /**
    * Server has GIF Write Support?
    * @var boolean $_gif
    */
    var $_gif;    

    /**
    * Images info (getimagesize())
    * @var array $_original_info
    */
    var $_original_info = array();
    /**#@-*/

    // {{{ construtor
    /**
    * Sets class vars. Checks if the server has images creation support.
    * If doesn't gave, creates files list. Creates thumbs dir, if inexistent.
    * If you don't give the $file_list parameter, the class will generate thumbs of all images of the dir.
    * If you don't give the $thumbs_directory parameter, you must give $thumbs_name parameter and vice versa.
    * Or give both.
    * You must give $thumbs_percent or $thumbs_width + $thumbs_height, but don't both. If you give both
    * ($thumbs_percent + $thumbs_width&$thumbs_height) the system will use $thumbs_percent
    *
    * @since Jan 19, 2004
    * @version Aug 01, 2004
    * @access public
    */
    function thumbs($directory, $file_list = false, $thumbs_directory = false, $thumbs_name = false, $_gray_scale = false, $thumbs_quality = 80, $thumbs_percent = 35, $thumbs_width = false, $thumbs_height = false)
    {
        // Check if the server has GD library on PHP
        if(!function_exists("ImageCreateTrueColor")) // gd 2.*
        {
            if(!function_exists("ImageCreate")) // gd 1.*
            {
                $this->_error("You can't run this script because your PHP hasn't GD library (1.* or 2.*) loaded.", E_USER_ERROR);
            }
        }
        
        // Checks if the server has gif writing support
        $this->checks_gif_support();

        // Checks the dir
        if(!is_dir($directory))
        {
            $this->_error("Invalid directory: <B>" . $directory . "</B>", E_USER_ERROR);
        }
        else
        {
            $this->_directory = $directory;
        }
        
        // If gave the file list, but it doesn't and array, raise an error
        if($file_list && !is_array($file_list))
        {
            $this->_error("The parameter <B>\$file_list</B> must be an array", E_USER_ERROR);
        }
        // File list doesn't given. So, creates it!
        elseif(!$file_list)
        {   
            // Get the list with all images, included GIFs
            if($this->_gif)
            {
                $this->_file_list = $this->get_file_list($this->_directory, "img_creation_gif");
            }
            // Get the list with all images, but GIFs
            else
            {
                $this->_file_list = $this->get_file_list($this->_directory);
            }
        }
        else
        {
            if(!sizeof($file_list))
            {
                $this->_error("The file list is empty..", E_USER_ERROR);
            }
            $this->_file_list = $file_list;
        }

        // Sets other class vars
        if(!$thumbs_directory && !$thumbs_name)
        {
            $this->_error("You must give at once one type that of the thumbanils will be saved (directory or name). The class assumed the directory <B>\"thumbs\"</B>.", E_USER_NOTICE);
            $thumbs_directory = "thumbs/";
        }

        $this->_gray_scale = $_gray_scale;
        $this->_thumbs_name = $thumbs_name;
        $this->_thumbs_quality = $thumbs_quality;
        $this->_thumbs_percent = $thumbs_percent;
        $this->_thumbs_width = $thumbs_width;
        $this->_thumbs_height = $thumbs_height;
        $this->_thumbs_directory = $thumbs_directory;
        
        if(!$this->_thumbs_percent && !$this->_thumbs_width)
        {
            $this->_error("You must give at once one type that of the thumbanils dimensions (percent or unique sizes). The class assumed 35%", E_USER_NOTICE);
            $this->_thumbs_percent = 35;
        }
    }
    // }}}

    // {{{ creates_thumbs()
    /**
    * Generate the Thumbnails
    *
    * @since Jan 19, 2004
    * @version Aug 01, 2004
    * @access public
    */
    function creates_thumbs()
    {
        /**
        * Creates the thumbs dir, if inexistent
        */
        $this->_thumbs_directory = $this->_directory . $this->_thumbs_directory;
        
        if(!is_dir($this->_thumbs_directory))
        {
            if(!@mkdir($this->_thumbs_directory, 0777))
            {
                $this->_error("I couldn't create thumbs dir", E_USER_ERROR);
            }
            @chmod($this->_thumbs_directory, 0777);
        }

        // Loop in file list
        for($i = 0; $i < count($this->_file_list); ++$i)
        {
            // Path of the original image
            $file = $this->_directory . $this->_file_list[$i];

            // Checks if the file exists
            if(!file_exists($file))
            {
                $this->_error("Inexistent file: <B>" . $file . "</B>. Thumbnail didn't created.", E_USER_NOTICE);
                continue;
            }

            /**
            * Gets info about the original image. 
            */
            $this->_original_info = getimagesize($file);

            // Regex for checking if the file is valid
            $regex = "^image\/(pjpeg|jpeg|png";
            // Add GIF if the server has GIF Write Support
            if($this->_gif)
            {
                $regex .= "|gif";
            }
            $regex .= ")$";

            // Checks if the file is a valid image
            if(!eregi($regex, $this->_original_info["mime"]) || !sizeof($this->_original_info))
            {
                $msg = "They must be JPEG or PNG";
                if($this->_gif)
                {
                    $msg .= " or GIF";
                }
                $msg .= ".";
                $this->_error("Invalid image: <B>" . $file . "</B>. " . $msg, E_USER_NOTICE);
                continue;
            }       

            // Sets thumb name
            if($this->_thumbs_name)
            {
                /**
                * Original image name - index [1][0] of array $extension
                * Original image extension - index [2][0] of array $extension
                */
                preg_match_all("/(.*)\.(.*)$/i", $this->_file_list[$i], $extension);
                
                // $thumb = directory + original_file_name + thumbs_name + original_file_extension
                $thumb = $this->_thumbs_directory . $extension[1][0] . $this->_thumbs_name . "." . $extension[2][0];
            }
            else
            {
                $thumb = $this->_thumbs_directory . $this->_file_list[$i];
            }

            // Thumbs dimensions. If a percent was given, calculate the values
            if($this->_thumbs_percent)
            {
                $this->_thumbs_width = (integer)($this->_original_info[0] / 100 * $this->_thumbs_percent);
				$this->_thumbs_height = (integer)($this->_original_info[1] / 100 * $this->_thumbs_percent);
            }
            
            // Creates the thumbnail
            $this->resize_image($file, $thumb);
        }
        // end for
    }
    // }}}

    // {{{ resize_image()
    /**
    * Creates the thumbnail
    *
    * @param string $image
    * @param string $newimage
    * @since Jan 19, 2004
    * @access private
    */
	function resize_image($image, $newimage)
	{
		return $this->resize_image_using_gd($image, $newimage);
	}
    // }}}

    // {{{ resize_image_using_gd
    /**
    * Creates the thumbnail
    *
    * @param string $image
    * @param string $newimage
    * @since Jan 19, 2004
    * @version Feb 05, 2004
    * @access private
    */
	function resize_image_using_gd($image, $newimage)
	{
        // Thumb dimensions, calculated on creates_thumbs() or a unique value
        $newwidth  = $this->_thumbs_width;
        $newheight = $this->_thumbs_height;

        // Image info
        $width  = $this->_original_info[0];
        $height = $this->_original_info[1];
        $type   = $this->_original_info[2];

        if($im = $this->read_image_from_file($image, $type))
        {
            // This was a bug.. corrected in Feb 05, 2004
            /*if ($newheight && ($width < $height))
            {
                $newwidth = ($newheight / $height) * $width;
            }
            else
            {
                $newheight = ($newwidth / $width) * $height;
            }*/

            if (function_exists("ImageCreateTrueColor") && !$this->_gray_scale)
            {
                $im2 = ImageCreateTrueColor($newwidth,$newheight);
		    }
            else
            {
                $im2 = ImageCreate($newwidth,$newheight);
            }

            // Check if needs to create the thumbs into grayscale, if yes, do it
            $this->_gray_scale_go($im2);

            if (function_exists("ImageCopyResampled"))
            {
                ImageCopyResampled($im2,$im,0,0,0,0,$newwidth,$newheight,$width,$height);
		    }
            else
            {
                ImageCopyResized($im2,$im,0,0,0,0,$newwidth,$newheight,$width,$height);
            }

            if ($this->write_image_to_file($im2, $newimage, $type))
            {
                return true;
            }
        }

        $this->_error("I couldn't create the thumb: <B>" . $newimage . "</B>", E_USER_NOTICE);
        return false;
	}
    // }}}
    
    // {{{ read_image_from_file()
    /**
    * Creates image handle
    *
    * @param string $filename
    * @param integer $type
    * @since Jan 19, 2004
    * @access private
    */
    function read_image_from_file($filename, $type)
    {
	   $imagetypes = ImageTypes();

        switch ($type)
        {
            case 1 :
                if ($imagetypes & IMG_GIF)
                {
                    return ImageCreateFromGIF($filename);
                }
            case 2 :
                if ($imagetypes & IMG_JPEG)
                {
                    return ImageCreateFromJPEG($filename);
                }
                break;
            case 3 :
                if ($imagetypes & IMG_PNG)
                {
                    return ImageCreateFromPNG($filename);
                }
                break;
            default:
                $this->_error("Invalid type given to read_image_from_file() of file <B>" . $filename . "</B>", E_USER_NOTICE);
                return false;
        }
	}
    // }}}

    // {{{ write_image_to_file()
    /**
    * Writes the new image
    *
    * @param resource $im
    * @param string $filename
    * @param integer $type
    * @since Jan 19, 2004
    * @access private
    */
	function write_image_to_file($im, $filename, $type)
	{
        switch ($type)
        {
            case 1 :
                $result = ImageGif($im, $filename);
                @chmod($filename, 0777);
                return $result;
            case 2 :
                $result = ImageJpeg($im, $filename, $this->_thumbs_quality);
                @chmod($filename, 0777);
                return $result;
            case 3 :
                $result = ImagePNG($im, $filename);
                @chmod($filename, 0777);
                return $result;
            default:
                $this->_error("Invalid image type: <B>" . $filename . "</B>", E_USER_NOTICE);
                return false;
        }
	}
    // }}}

    // {{{ _gray_scale_go()
    /**
    * Turns the thumbnails into grayscale
    *
    * @param resource $im
    * @since Feb 05, 2004
    * @access private
    */
    function _gray_scale_go(&$im)
    {
        if($this->_gray_scale)
        {
            for ($c = 0; $c < 256; $c++)
            {
                ImageColorAllocate($im, $c,$c,$c); 
            }
        }
    }
    // }}}

    // {{{ checks_gif_support()
    /**
    * Checks if the server has GIF write support
    *
    * @since Aug 01, 2004
    * @access private
    */
    function checks_gif_support()
    {
        $imagetypes = ImageTypes();

        if ($imagetypes & IMG_GIF)
        {
            $this->_gif = true;
        }
        else
        {
            $this->_gif = false;
        }
    }
    // }}}
}

?>