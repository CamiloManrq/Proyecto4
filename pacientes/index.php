<?php 
include_once('../config/config.php');
include('paciente.php');

$p = new pacientes();
$data= $p->getALL();

if ( isset ($_GET['id']) && !empty($_GET['id'])){
  $remove = $p->delete($_GET['id']);
  if ($remove){
    header('location: index.php');
  }else {
    $mensaje = '<div class="alert alert-danger" role="alert" > Error al eliminar </div>';
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Secciones</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
     <?php include('../menu.php') ?>
    <div class="container"></div>
    <h2 class="text-center mb-2" > Calendario</h2>
       <div class= row>
        <?php
        while($pt = mysqli_fetch_object($data)) {
            $date= $pt->fecha;
            echo"<div class='col'>";
            echo"<div class='border border-info pb-2'>";
            echo "<h5> <img src=".ROOT."/images/$pt->imagen' width='50' /> $pt->nombres $pt->apellidos  </h5>";
            echo "<p> <b>Fecha:</b>".date('D', strtotime($date))." ".date('d-M-Y H:i', strtotime($date))." </p>";
            echo"<div class='text-center'>";
            echo "<div class='center'> <a class='btn btn-success' href='". ROOT ."/pacientes/edit.php?id=$pt->id' >Modificar</a> - <a class='btn btn-danger' href='". ROOT ."/pacientes/index.php?id=$pt->id' >Eliminar</a> </div>";
            echo"</div>";
            echo"</div>";
            echo"</div>";

        }
        
        
        
        ?>

       </div>
</body>
</html>