<?
include_once 'conectar.php';
class Sesion extends Conexion {

    private $valores;

    function __construct(){
   		session_start();   
    }

    public function getValores($str){
        return $this->valores["$str"];

    }
    
    public function iniciar($usr,$pw){
        $this->getConexion();
        session_start();
        $result=mysql_query("SELECT * FROM `alumno_ss_fca` WHERE PassAlu='$pw'and MatriculaAlu='$usr' LIMIT 1;") or die(mysql_error());
        if($rows=mysql_fetch_array($result)){
            //$this->valores=array("activa"=>true , "nombre"=>$rows['nombre'] , "nivel"=>$rows['nivel'] );
            $_SESSION['nombre']=$rows['NombreAlu'];
            /*$_SESSION['nivel']=$rows['nivel'];*/
            $_SESSION['activa']=true;
            return true;
        }else{

            return false;
        }
    }
    
    public function cerrar(){
        $this->valores=array( "activa"=>false);
        session_unset();
        session_destroy();
    }


}

?>

