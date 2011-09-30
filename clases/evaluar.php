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

    /*
        Nos da la lista de alumnos por carrera
    */
    public function listaAlumnos($carrera){
        $this->getConexion();
        $sql="SELECT NombreAlu,MatriculaAlu,CriterioAlu FROM alumno_ss_fca WHERE CarreraAlu='$carrera' ORDER BY NombreAlu ";
        $result=mysql_query($sql) or die(mysql_error());
        $fila=mysql_fetch_array($result);

    }

    public function alumno(){
        $this->getConexion();
        $sql="SELECT NombreAlu as alumno FROM alumno_ss_fca WHERE MatriculaAlu='".$this->matricula."' ;";
        $result=mysql_query($sql) or die(mysql_error());
        $fila=mysql_fetch_array($result);
        return $fila['alumno'];
    }

    
    public function inicia($periodo){
        $this->getConexion();
        $sql="SELECT MatriculaAlu FROM evaluacion_".$this->criterio." WHERE MatriculaAlu='".$this->matricula."' AND PeriodoAlu='$periodo' ;";    
        $result=mysql_query($sql) or die(mysql_error());
        if(!mysql_fetch_array($result)){
            mysql_query("INSERT INTO evaluacion_".$this->criterio." (MatriculaAlu,PeriodoAlu) values('".$this->matricula."','$periodo');") or die(mysql_error());
        }
    }

    public function hayComentario($campoEvaluar,$periodo){
        $this->getConexion();
        $sql="SELECT Nota FROM notas_ss_fca WHERE MatriculaAlu='$this->matricula' AND Evaluacion='$campoEvaluar' AND PeriodoAlu='$periodo';";
        $result=mysql_query($sql) or die(mysql_error());
        if($comentario=mysql_fetch_array($result)){
            return $comentario['Nota'];
        }else{
            return "No hay comentarios.";
        }
    }    

    public function comentario($campoEvaluar,$nota,$periodo){
        $this->getConexion();
        if(!is_null($nota) && $nota!="No hay comentarios."){
            //$sql="INSERT INTO `notas_ss_fca` (`MatriculaAlu`, `Evaluacion`, `Nota`, `FechaEntrega`,`PeriodoAlu`) VALUES ('$this->matricula', '$campoEvaluar', '".trim($nota)."', '".date('o-m-d')."', '$periodo' );";
            $sql="INSERT INTO `notas_ss_fca` (`MatriculaAlu`, `Evaluacion`, `Nota`, `FechaEntrega`,`PeriodoAlu`) VALUES ('$this->matricula', '$campoEvaluar', '".trim($nota)."', now(), '$periodo' );";
            $result=mysql_query($sql);
            if($result==0){
                $set="update `notas_ss_fca` SET `Nota`='$nota' WHERE `MatriculaAlu`='$this->matricula' AND `Evaluacion`='$campoEvaluar' AND PeriodoAlu='$periodo' LIMIT 1";
                $result=mysql_query($set);
            }

            if($result){
                echo "<p style='color:#1cc91c;'><strong>Comentario guardado correctamente.</strong></p>";
            }
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
    
    public function listaValoresCampos($i){
        $this->getConexion();
        $listaValoresCampos=array();
        $sql="SELECT valor FROM criterios_ss_fca WHERE nombreCriterio='".$this->criterio."' ; ";
        $result=mysql_query($sql) or die(mysql_error());
        while($fila=mysql_fetch_array($result)){
            array_push($listaValoresCampos,utf8_encode($fila['valor']));
        }
        return $listaValoresCampos[$i];
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
    
    
    public function hayCalf($campo,$periodo){
        $this->getConexion();
        $hayC;
        $sql="SELECT `".$campo."` as actual FROM `evaluacion_".$this->criterio."` WHERE MatriculaAlu='".$this->matricula."' AND PeriodoAlu='$periodo' ;";
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

    public function mostrarCalif($i,$periodo){
        $this->getConexion();
        $sql="SELECT * FROM `evaluacion_".$this->criterio."` WHERE MatriculaAlu='".$this->matricula."' AND PeriodoAlu='$periodo' ;";
        $result=mysql_query($sql) or die(mysql_error());
        $fila=mysql_fetch_array($result);
        return $fila[$i];        
        
    }

    public function evaluacion($indice){
        $this->getConexion();
        $evaluacion=array();
        $sql="SELECT * FROM `evaluacion_".$this->criterio."` ;";
        $result=mysql_query($sql) or die(mysql_error());
        for($i=1;$i<=$this->numCampos();$i++){
                array_push($evaluacion,utf8_encode(mysql_field_name($result,$i)));
        
        }

        return $evaluacion[$indice];
    }

    public function guardarCalf($valores,$periodo){
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
                
                if($this->hayCalf($columnasTabla[($i-1)],$periodo)){
                    $sql="SELECT `".$columnasTabla[($i-1)]."` as actual FROM `evaluacion_".$this->criterio."` WHERE MatriculaAlu='".$this->matricula."' AND PeriodoAlu='$periodo' ;";
                    $result2=mysql_query($sql) or die(mysql_error());
                    $fila=mysql_fetch_array($result2);
                    $numero=$fila['actual'];
					session_start();
					$admin=$_SESSION['nivel'];
                    if($numero!=$tmp && !($admin=='admin')){
                     
                        echo "Ya tiene esta calificación en: <strong>".$this->listaCampos(($i-1))."</strong><br>";
                    }else{
                    	$sql="UPDATE `evaluacion_".$this->criterio."` SET `".$columnasTabla[($i-1)]."`=".$tmp." WHERE MatriculaAlu='".$this->matricula."' AND PeriodoAlu='$periodo' ;";
                    	mysql_query($sql) or die(mysql_error());
						$mensaje=true;
                    	
                    }                  
                }else{

                    $sql="UPDATE `evaluacion_".$this->criterio."` SET `".$columnasTabla[($i-1)]."`=".$tmp." WHERE MatriculaAlu='".$this->matricula."' AND PeriodoAlu='$periodo' ;";
                    mysql_query($sql) or die(mysql_error());
                    $mensaje=true;
                }
                
            } // recupera las columnas para poder insertar
            
            if($mensaje){
                echo "<p style='color:#1cc91c; font-size:15px;'><strong>La calificación se ha guardado correctamente.</strong></p>";
            }
        }// end if
    }

}







?>
