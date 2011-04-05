<?
    @ include_once '../clases/conectar.php';

        function sin_acentos_espacios($text){
            $text=elimina_acentos($text);
            $text=espacios_blancos($text);
            return $text;
        }

        function elimina_acentos($text){
                $text=trim($text);
                $text = htmlentities($text, ENT_QUOTES, 'UTF-8');
		        //$text = strtolower($text);
		        $patron = array (
			        // Espacios, puntos y comas por guion
			        //'/[\., ]+/' => '-',
         
			        // Vocales
			        '/&agrave;/' => 'a',
			        '/&egrave;/' => 'e',
			        '/&igrave;/' => 'i',
			        '/&ograve;/' => 'o',
			        '/&ugrave;/' => 'u',

			        '/&Agrave;/' => 'A',
			        '/&Egrave;/' => 'E',
			        '/&Igrave;/' => 'I',
			        '/&Ograve;/' => 'O',
			        '/&Ugrave;/' => 'U',
         
			        '/&aacute;/' => 'a',
			        '/&eacute;/' => 'e',
			        '/&iacute;/' => 'i',
			        '/&oacute;/' => 'o',
			        '/&uacute;/' => 'u',
			        
			        '/&Aacute;/' => 'A',
			        '/&Eacute;/' => 'E',
			        '/&Iacute;/' => 'I',
			        '/&Oacute;/' => 'O', 
			        '/&Uacute;/' => 'U',
			                 
			        '/&acirc;/' => 'a',
			        '/&ecirc;/' => 'e',
			        '/&icirc;/' => 'i',
			        '/&ocirc;/' => 'o',
			        '/&ucirc;/' => 'u',
         
			        '/&atilde;/' => 'a',
			        '/&etilde;/' => 'e',
			        '/&itilde;/' => 'i',
			        '/&otilde;/' => 'o',
			        '/&utilde;/' => 'u',
         
			        '/&auml;/' => 'a',
			        '/&euml;/' => 'e',
			        '/&iuml;/' => 'i',
			        '/&ouml;/' => 'o',
			        '/&uuml;/' => 'u',
         
			        '/&auml;/' => 'a',
			        '/&euml;/' => 'e',
			        '/&iuml;/' => 'i',
			        '/&ouml;/' => 'o',
			        '/&uuml;/' => 'u',
         
			        // Otras letras y caracteres especiales
			        '/&aring;/' => 'a',
			        '/&ntilde;/' => 'n',
         
			        // Agregar aqui mas caracteres si es necesario
 
		);
 
		$text = preg_replace(array_keys($patron),array_values($patron),$text);
		return $text;
                
        }

        function espacios_blancos($cadena){
                $cadena = trim($cadena);
                $cadena = ereg_replace( "([     ]+)", "", $cadena );
                return $cadena;
        }
        
        function hola(){
                echo "hola mundo!";
        }
        
        function fecha(){
            echo (date('d')."/".date('m')."/".date('o'));
        }
        
        function hora(){
            echo (date('g').":".date('i')." ".date('A'));
        }
        
        function conectar(){
            $db= new Conexion();
            $db->getConexion();
        }
        
        function sql($sql){
            $db=new Conexion();
            return $db->consultaSql($sql);
        }
       
?>
