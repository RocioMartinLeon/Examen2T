<?php
class db
{
  private $host="127.0.0.1";
  private $user="root";
  private $pass="";
  private $db_name="clubbasket";
  private $conexion;
  private $error=false;
  private $error_msj="";

  function __construct()
  {
    $this->conexion=new mysqli($this->host,$this->user,$this->pass,$this->db_name);
    if ($this->conexion->connect_errno){
      $this->$error=true;
      $this->error_msj="No se ha podido realizar la conexión a la base de datos";
    }
  }
  public function hayError(){
    return $this->error;
  }
  public function msjError(){
    return $this->error_msj;
  }
  public function realizarConsulta($sql){
    $table=[];
    if($this->error==false){
      $resultado=$this->conexion->query($sql);
      while($fila=$resultado->fetch_assoc()){
        $table[]=$fila;
      }
      return $table;
    }else{
      $this->error_msj="Error al realizar la consulta".$sql;
      return null;
    }
  }

  public function devolverUltimoJugador (){
    if($this->error==false)

    if($this->error==false){
      $resultado=$this->conexion->query("SELECT * FROM Jugadores ORDER BY id DESC LIMIT 1");
      return $resultado;
    }else{
      return null;
    }
  }

  //function insercion contra la tabla Jugadores
  public function devolverJugadorId($id){
    if($this->error==false){
      $resultado = $this->conexion->query("SELECT * FROM Jugadores WHERE id=".$id);
      return $resultado;
    }else{
      return null;
    }
  }
  public function insertarJugador ($nombre,$posicion,$numero,$edad){
    if($this->error==false)
    {
      $insert_sql="INSERT INTO Jugadores(id,Nombre,Posición,Número,Edad)
      VALUES (NULL, '".$nombre."', '".$posicion."', '".$numero."', '".$edad."',)";
      if (!$this->conexion->query($insert_sql)) {
        echo "Falló la inserción de la tabla: (" . $this->conexion->errno . ")" . $this->error;
        return false;
      }
      return true;
    }else{
      return false;
    }
  }
  //function actualizar contra la tabla jugadoress
  public function actualizarJugador($id,$nombre,$posicion,$numero,$edad){
    if($this->error==false)
    {
      $insert_sql="UPDATE Jugadores SET Nombre='".$nombre."', Posición='".$posicion."', Número='".$numero."',Edad=".$edad." WHERE id=".$id;
      if (!$this->conexion->query($insert_sql)) {
        echo "Falló la actualizacion de la tabla: (" . $this->conexion->errno . ") " . $this->conexion->error;
        return false;
      }
      return true;
    }else{
      return false;
    }
  }

  //function borrar contra la tabla jugadores
  public function borrarJugador($id){
    if($this->error==false)
    {
      $insert_sql="DELETE FROM Jugadores WHERE id=".$id;
      if (!$this->conexion->query($insert_sql)) {
        echo "Falló el borrado del usuario: (" . $this->conexion->errno . ") " . $this->conexion->error;
        return false;
      }
      return true;
    }else{
      return false;
    }
  }
}

?>
