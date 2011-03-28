<?
include_once 'conectar.php';
class Sesion extends Conexion {

    function __construct(){

    
    }
    
    public function iniciar($usr,$pw){
        $this->getConexion();

        $result=mysql_query("SELECT * FROM `usuarios_ss_fca` WHERE contrasenia=password('$pw') and usuario='$usr';") or die(mysql_error());
        if($rows=mysql_fetch_array($result)){

            $_SESSION['usuario']=$rows['nombre'];
            $_SESSION['nivel']=$rows['nivel'];
            $_SESSION['activa']=true;
            return true;
        }else{

            return false;
        }
    }
    
    public function cerrar(){
        $_SESSION['activa']=false;
        session_unset();
        session_destroy();
    }


}

?>

