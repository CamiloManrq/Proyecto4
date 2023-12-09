<?php 
include_once('../config/config.php');
include('paciente.php');
 if (isset($_POST) && !empty($_POST)){
    $p=new pacientes();
    if ($_FILES['imagen']['name']!==''){
        $_POST['imagen']= saveimage($_FILES);
    }
    $save = $p->save($_POST);
    if ($save){
        $mensaje = '<div class="alert alert-success"> Sesion registrada </div>';
         }else{
            $mensaje = '<div class="alert alert-danger"> Error al registrar </div>';
         }
 }


?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Sesion </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <?php include('../menu.php') ?>
    <div class='container'>
        <?php
        if(isset($mensaje)){
            echo $mensaje;
        }
        ?>
        <h2 clase='text-center mb-2' >Registrar sesion</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="row mb-2">
                <div class="cold">
                    <input type="text" name="nombres" id="nombres" placeholder="nombres del paciente" class="form-control"/>
                </div>
                <div class= "col">
                    <input type="text" name="apellidos" id="apellidos" placeholder="apellidos del paciente" class="form-control"/>
                </div>
            </div>

            <div class="row mb-2">
                <div class="cold">
                    <input type="text" name="email" id="email" placeholder="email del paciente" class="form-control"/>
                </div>
                <div class= "col">
                    <input type="number" name="celular" id="celulars" placeholder="celular del paciente" class="form-control"/>
                </div>
            </div>

            <div class="row mb-2">
                <div class="cold">
                    <textarea name="enfermedades" id="enfermedades" placeholder="enfermedades del paciente"  class="form-control" ></textarea>
                </div>
                <div class= "col">
                    <input type="text" name="duraciondelasecion" id="duraciondelasecion" placeholder="duracion de la secion" class="form-control"/>
                </div>
            </div>


            <div class="row mb-2">
                <div class="cold">
                <input type="datetime-local" name="fecha" id="fecha"  class="form-control"/>
                </div>
                <div class= "col">
                    <input type="file" name="imagen" id="imagen"  class="form-control"/>
                </div>
                <button class="btn btn-succes">Registrar</button>
            </div>













        </form>
    </div>
</body>
</html>