<?
include_once 'conectar.php';
class Evaluar extends Conexion {
    
    private $criterio;
    private $matricula;
    
    function __construct($m,$c){
        $this->criterio=$c;
        $this->matricula=$m;
        //echo $this->criterio."-".$this->matricula;
    
    }

    
    public function inicia(){
        $this->getConexion();
        $sql="SELECT MatriculaAlu FROM evaluacion_".$this->criterio." WHERE MatriculaAlu='".$this->matricula."' ;";    
        $result=mysql_query($sql) or die(mysql_error());
        if(!mysql_fetch_array($result)){
            mysql_query("INSERT INTO evaluacion_".$this->criterio." (MatriculaAlu) values('".$this->matricula."');") or die(mysql_error());
        }
    }
    
    public function listaCampos($i){
        $this->getConexion();
        $listaCampos=array();
        $sql="SELECT evaluar FROM criterios_ss_fca WHERE nombreCriterio='".$this->criterio."' ; ";
        $result=mysql_query($sql) or die(mysql_error());
        while($fila=mysql_fetch_array($result)){
            array_push($listaCampos,utf8_encode($fila['evaluar']));
        }
        return $listaCampos[$i];
    }
    
    public function todosCampos(){
        $this->getConexion();
        $listaCampos=array();
        $sql="SELECT evaluar FROM criterios_ss_fca WHERE nombreCriterio='".$this->criterio."' ; ";
        $result=mysql_query($sql) or die(mysql_error());
        while($fila=mysql_fetch_array($result)){
            array_push($listaCampos,utf8_encode($fila['evaluar']));
        }
        return $listaCampos;
    }
    
    public function numCampos(){
        $this->getConexion();
        $sql="SELECT count(nombreCriterio) as total FROM criterios_ss_fca WHERE nombreCriterio='".$this->criterio."' ;";
        $result=mysql_query($sql) or die(mysql_error());
        $fila=mysql_fetch_array($result);
        return $fila['total'];
/*        if($fila=mysql_fetch_array($result)){
#            return $fila['total'];
#        }else{
#            return 1;
#        }*/
        
    }
    
    
    public function hayCalf($campo){
        $this->getConexion();
        $hayC;
        $sql="SELECT `".$campo."` as actual FROM `evaluacion_".$this->criterio."` WHERE MatriculaAlu='".$this->matricula."' ;";
        $result=mysql_query($sql) or die(mysql_error());
        $fila=mysql_fetch_array($result);
        $numero=$fila['actual'];
        //if(preg_match("/^(+|-)?[0-9]+$/",$numero) && is_float($numero) && $numero!=-1 ){
        if($numero!=-1){
            $hayC=true;
        }elseif(is_null($numero) || $numero==-1) {
            $hayC=false;
        }
        return $hayC;

    }

    public function mostrarCalif($i){
        $this->getConexion();
        $sql="SELECT * FROM `evaluacion_".$this->criterio."` WHERE MatriculaAlu='".$this->matricula."' ;";
        $result=mysql_query($sql) or die(mysql_error());
        $fila=mysql_fetch_array($result);
        return $fila[$i];        
        
    }


    public function guardarCalf($valores){
        $this->getConexion();
        $mensaje;
        if(!is_null($valores) || !(count($valores)==0)){
            $calificacion=explode(",",$valores);
            $columnasTabla=array();
            $sql="SELECT * FROM `evaluacion_".$this->criterio."` ;";
            $result=mysql_query($sql) or die(mysql_error());
            
            for($i=1;$i<=$this->numCampos();$i++){
                array_push($columnasTabla,utf8_encode(mysql_field_name($result,$i)));
                $tmp=-1;
                if(is_null($calificacion[($i-1)]) || $calificacion[($i-1)]=="" || $calificacion[($i-1)]==" "){
                    $tmp=-1;            
                }else{
                    $tmp=$calificacion[($i-1)];        
                }
                
                if($this->hayCalf($columnasTabla[($i-1)])){
                    $sql="SELECT `".$columnasTabla[($i-1)]."` as actual FROM `evaluacion_".$this->criterio."` WHERE MatriculaAlu='".$this->matricula."' ;";
                    $result2=mysql_query($sql) or die(mysql_error());
                    $fila=mysql_fetch_array($result2);
                    $numero=$fila['actual'];
                    if($numero!=$tmp){
                        $mensaje=false;                       
                        echo "Ya tiene esta calificación en: <strong>".$this->listaCampos(($i-1))."</strong><br>";
                    }                    
                }else{

                    $sql="UPDATE `evaluacion_".$this->criterio."` SET `".$columnasTabla[($i-1)]."`=".$tmp." WHERE MatriculaAlu='".$this->matricula."' ;";
                    mysql_query($sql) or die(mysql_error());
                    $mensaje=true;
                    
                }
                
            } // recupera las columnas para poder insertar
            if($mensaje){
                echo "<p style='color:#1cc91c;'><strong>La calificación se han guardado correctamente.</strong></p>";
            }
            
        }// end if
    }

}







?>
