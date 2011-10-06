<?
include_once 'conectar.php';
class Sesion extends Conexion {

    private $valores;

    function __construct(){
   
    }

    public function getValores($str){
        return $this->valores["$str"];

    }
    
    public function iniciar($usr,$pw){
        $this->getConexion();
        //session_start();
        $result=mysql_query("SELECT * FROM `usuarios_ss_fca` WHERE contrasenia=password('$pw') and usuario='$usr';") or die(mysql_error());
        if($rows=mysql_fetch_array($result)){
            $this->valores=array("activa"=>true , "nombre"=>$rows['nombre'] , "nivel"=>$rows['nivel'] );
            $_SESSION['nombre']=$rows['nombre'];
            $_SESSION['nivel']=$rows['nivel'];
            $_SESSION['activa']=true;
         
            
            return true;
        }else{

            return false;
        }
    }
    
	public function iniciarAlu($usr,$pw){
        $this->getConexion();
		//session_start();
		$periodo=0;
		
		$query2="SELECT periodoalu FROM alumno_ss_fca WHERE matriculaalu='$matricula'";
        $result2=mysql_query($query2) or die(mysql_error());
        $rows2=mysql_fetch_array($result2);
        $periodo=$rows2['periodoalu'];
		
        $query="SELECT EvaluacionHist,periodoalu FROM historial_alumno_ss_fca WHERE matriculaalu='$usr' ";
        $result=mysql_query($query) or die(mysql_error());
		        
        	
	        	
	        	
        
        	while ($rows=mysql_fetch_array($result))
        	{
	        	$calif=$rows['EvaluacionHist'];
	        	if(empty($calif)){
	        		$periodo=$rows['periodoalu'];
	        	}
	        }
	                
        $query="SELECT nombrealu,periodoalu FROM alumno_ss_fca WHERE passalu=password('$pw') and matriculaalu='$usr' and periodoalu='$periodo' ;";
        $result=mysql_query($query) or die(mysql_error());
        if($rows=mysql_fetch_array($result)){
            $this->valores=array("activa"=>true , "nombre"=>$rows['nombrealu'] ,"matricula"=>"$usr" ,"nivel"=>"alumno","periodo"=>$periodo );
            $_SESSION['nombre']=$rows['nombrealu'];
            $_SESSION['nivel']="alumno";
            $_SESSION['matricula']=$usr;
            $_SESSION['activa']=true;
            $_SESSION['periodo']=$periodo;
            
            return true;
        }else{

            return false;
        }
    }
	
    public function cerrar(){
        $this->valores=array( "activa"=>false);
		$_SESSION['activa']=false;
        session_unset();
        session_destroy();
		$this->desconectar();
    }


}

?>

