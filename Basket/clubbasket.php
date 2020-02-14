<?php

include "db.php";
$jugador=new db();
//insertar un jugador
$resultadoInsert=$jugador->insertarJugador($_POST['Nombre'],$_POST['Posición'],$_POST['Número'],$_POST['Edad']);

//Devolver el jugador insertado
if($resultadoInsert==true){
  $resultado=$jugador->devolverUltimoJugador();
  $fila=$resultado->fetch_assoc();
  echo "id: ".$fila["id"]."</br>";
  echo "nombre: ".$fila['Nombre']."</br>";
  echo "posicion: ".$fila['Posición']."</br>";
  echo "numero: ".$fila['Número']."</br>";
  echo "edad: ".$fila['Edad']."</br>";
  echo "<a href='actualizar.php?id=".$fila['id']."&nombre=".$fila['Nombre']."&posicion=".$fila['Posición']."&numero=".$fila['Número']."&edad=".$fila['Edad']."'>Actualizar Registro</a></br>";
  echo "<a href='borrar.php?id=".$fila['id']."'>Borrar Registro</a>";
}else{
  echo "Error en la insercion";
}
//actualizar jugador
$resultadoActualizar=$jugador->actualizarJugador($_POST['id'],$_POST['Nombre'],$_POST['Posición'],$_POST['Número'],$_POST['Edad']);
//Devolver jugador actualizado
if ($resultadoActualizar==true) {
  $resultado=$jugador->devolverJugadorId($_POST['id']);
  $fila=$resultado->fetch_assoc();
  echo "id: ".$fila['id']."</br>";
  echo "nombre: ".$fila['Nombre']."</br>";
  echo "posición: ".$fila['Posición']."</br>";
  echo "numero: ".$fila['Número']."</br>";
  echo "edad: ".$fila['Edad']."</br>";
  echo "<a href='index.php?id=".$fila['id']."&nombre=".$fila['Nombre']."&posicion=".$fila['Posición']."&numero=".$fila['Número']."&edad=".$fila['Edad']."'>Actualizar Registro</a>";
}else{
  echo "Error en la inserción";
}

//borrar un jugador
$resultadoBorrar=$jugador->borrarJugador($_GET['id']);

//Devolver el jugador borrado
if($resultadoBorrar==true){
  echo "Registro ".$_GET["id"]." borrado";
}else{
  echo "Error en el borrado";
}

?>
