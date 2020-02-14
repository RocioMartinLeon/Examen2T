<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Jugadores Basket</title>
</head>
<body>
  INSERTAR<br>
  <form action="clubbasket.php" method="post">
    Nombre:<br>
    <input type="text" name="Nombre" value=""><br>
    Posición:<br>
    <input type="text" name="Posición" value=""><br>
    Número:<br>
    <input type="text" name="Número" value=""><br>
    Edad:<br>
    <input type="text" name="Edad" value=""><br>
    <input type="submit" name="" value="Insetar"><br>
  </form>
  ACTUALIZAR<br>
  <form action="actualizardB.php" method="post">
    Id:<br>
    <input type="text" name="id" value=<?=$_GET['id']?> readonly><br>
    Nombre:<br>
    <input type="text" name="Nombre" value="<?=$_GET['Nombre']?>"><br>
    Posición:<br>
    <input type="text" name="Posición" value="<?=$_GET['Posición']?>"><br>
    Número:<br>
    <input type="text" name="Número" value=<?=$_GET['Número']?>><br>
    Edad:<br>
    <input type="text" name="Edad" value=<?=$_GET['Edad']?>><br>
    <input type="submit" name="" value="Actualizar">
  </form>

</body>
</html>
