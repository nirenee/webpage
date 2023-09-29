
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Alvaro Sánchez Pinedo e Irene Onsurbe">
    <meta name="description" content="Practica1PCW">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>DAW</title>
</head>

<body>

<main>

    <?php
   
    include "php/estiloseleccion.php";

    
    
   
    $usu =$_SESSION['usuario'];
    $sql ="SELECT * from usuarios, paises where nomusuario = '$usu'";
    $qwey = mysqli_query($conec,$sql);
    $row = mysqli_fetch_array($qwey);


    $usuario = $_POST['usuarioreg'];
    $pass = $_POST['contrasena1'];
    $pass2 = $_POST['contrasena2'];
    $email = $_POST['email'];
    $sexo = $_POST['sexo'];
    $fnacimiento = $_POST['nacimiento'];
    $ciudad = $_POST['ciudad'];
    $pais = $_POST['pais'];

    $foto = $_FILES['fotousu'];
    $tmpname=$_FILES['fotousu']['tmp_name'];
    $img = $_FILES['fotousu'] ['name'];
    $tipo = $_FILES['fotousu']['type'];
    $id = $row['idusuario'];

    $destino= 'imgusuario/'. $img;
    
    if( $pass != $pass2 ){
        echo "Las contraseñas no iguales";
    }else{
        if($img == ''){
            $sql = "UPDATE usuarios SET clave = '$pass',email='$email',sexo='$sexo',fnacimiento='$fnacimiento',ciudad='$ciudad',pais='$pais' WHERE nomusuario='$usu';";
                if(isset($_POST['borrar'])){
                $img="usu.png";
                $sql = "UPDATE usuarios SET clave = '$pass',email='$email',sexo='$sexo',fnacimiento='$fnacimiento',ciudad='$ciudad',foto = '$img',pais='$pais' WHERE nomusuario='$usu';";
                $sql2 = "UPDATE usuarios SET pais = '3' WHERE nomusuario='$usu'";
                }
        }else{
             $sql = "UPDATE usuarios SET clave = '$pass',email='$email',sexo='$sexo',fnacimiento='$fnacimiento',ciudad='$ciudad',foto = '$img',pais='$pais' WHERE nomusuario='$usu';";
        }
        $qwey2 = mysqli_query($conec,$sql);
        $qwey3 = mysqli_query($conec,$sql2);

        }
        echo'Enhorabuena los cambios se han realizado con exito';
        if(is_uploaded_file($tmpname)){
            copy($tmpname,$destino);
           }
    
    

?>
        <a href="index.php" class="peticioninput"> Volver al Inicio </a>

<?php


    include "php/footer.php";
   





?>
</main>
</body>

</html>