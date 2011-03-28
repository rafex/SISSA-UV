<?

class Configuracion {

        private $fecha_inicial;
        private $fecha_final;

        
        function __construct(){
                include_once 'conectar.php';
                $conx=new Conexion();
                $conx->getConexion();                
                $sql = mysql_query("SELECT * FROM configuraciones_ss_fca") or die(mysql_error());
                $rows = mysql_fetch_array($sql);
                $this->fecha_inicial=$rows['fecha_inicio'];
                $this->fecha_final=$rows['fecha_fin'];                                                               
         
        }
        
        public function config(){

        }
        
        public function getFechaInicio(){
                return $this->fecha_inicial;
        }
        
        public function getFechaFinal(){
                return $this->fecha_final;
        }





}





?>
