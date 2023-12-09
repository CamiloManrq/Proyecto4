<?php 
include_once('../config/config.php');
include('../config/database.php');

class pacientes{
 public $conexion;
 function __construct()
 {
    $db = new database();
    $this->conexion = $db->connectToDatabase();
 }
 function save($params){
    $nombres =$params['nombres'];
    $apellidos =$params['apellidos'];
    $email =$params['email'];
    $celular =$params['celular'];
    $enfermedades =$params['enfermedades'];
    $duraciondelasecion =$params['duraciondelasecion'];
    $fecha =$params['fecha'];
    $imagen =$params['imagen'];

    $insert="INSERT INTO pacientes VALUES (NULL,'$nombres','$apellidos','$email','$celular','$enfermedades','$duraciondelasecion','$imagen','$fecha')";
    return mysqli_query($this->conexion, $insert);
 }


function getALL(){
   $sql= "SELECT * FROM pacientes ORDER BY fecha ASC";
   return mysqli_query($this->conexion,$sql);
}

function getOne ($id)
{
   $sql = "SELECT*FROM pacientes WHERE id = $id";
   return mysqli_query($this->conexion,$sql);
}

function update($params){
   $nombres =$params['nombres'];
   $apellidos =$params['apellidos'];
   $email =$params['email'];
   $celular =$params['celular'];
   $enfermedades =$params['enfermedades'];
   $duraciondelasecion =$params['duraciondelasecion'];
   $fecha =$params['fecha'];
   $imagen =$params['imagen'];
   $id = $params['id'];

   $update = "UPDATE pacientes SET nombres='$nombres', apellidos='$apellidos', email='$email', celular='$celular',
   enfermedades='$enfermedades', duraciondelasecion='$duraciondelasecion', fecha='$fecha', imagen='$imagen'
   WHERE id = $id     ";
   return mysqli_query($this->conexion, $update);
}

function delete($id){
   $delete = "DELETE FROM pacientes WHERE id = $id";
   return mysqli_query($this->conexion,$delete);

}
}

?>