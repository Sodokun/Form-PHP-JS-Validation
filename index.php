<?php 
include("con_db.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- displays site properly based on user's device -->
  <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
  <!-- Normalize -->
  <link rel="stylesheet" href="css/normalize.css">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- FontAwesome -->
  <script src="https://kit.fontawesome.com/f74cd672dd.js" crossorigin="anonymous"></script>
  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <!-- CSS -->
  <link rel="stylesheet" href="css/style.css">
  
  <title>Proyecto Formulario | Conexión PHP-SQL</title>

</head>
<body class="container row">

  <?php 
  include("registrar.php");
  ?>
  <section class="col-12">
    <div >
      
      <div class="highlight">
        <p> Reclama tu prueba gratuita 
        <?php 
        if ($user_reg["COUNT(*)"] == 0) {
          echo "y se el <strong>Primer Usuario";
        } elseif ($user_reg["COUNT(*)"] == 1) {
          echo "y únete a <strong> 1 Usuario Registrado";
        } else {
          echo "y únete a <strong>".$user_reg["COUNT(*)"]." Usuarios Registrados";
        }
        
        ?>  
      
      </strong>
        </p> 
      </div>

      <form id="form" method="post" action="" autocomplete="off">
        <div class="wrapper">
          <input type="text" placeholder="Nombre" id="Fname" name="Fname" class="inpt">
          <img src="images/icon-error.svg" alt="error-ico" id="Fname-ico" class="inpt-ico">
          <i class="fa-solid fa-circle-check inpt-ico-g" id="Fname-ico-g" ></i>
        </div>
        <p id="Fname-empty" class="omit">El Nombre no puede estar vacío</p>
        <p id="Fname-pat" class="omit">El Nombre solo puede contener letras y espacios</p>

        <div class="wrapper">
          <input type="text" placeholder="Apellido" id="Lname" name="Lname" class="inpt">
          <img src="images/icon-error.svg" alt="error-ico" id="Lname-ico" class="inpt-ico">
          <i class="fa-solid fa-circle-check inpt-ico-g" id="Lname-ico-g" ></i>
        </div>
        <p id="Lname-empty" class="omit">El Apellido no puede estar vacío</p>
        <p id="Lname-pat" class="omit">El Apellido solo puede contener letras y espacios</p>

        <div class="wrapper">
          <input type="text" placeholder="Correo Electrónico " id="mail" name="mail" class="inpt">
          <img src="images/icon-error.svg" alt="error-ico" id="mail-ico" class="inpt-ico">
          <i class="fa-solid fa-circle-check inpt-ico-g" id="mail-ico-g" ></i>
        </div>
        <p id="mail-empty" class="omit">El E-mail no puede estar vacío</p>
        <p id="mail-pat" class="omit">El E-mail debe poseer la siguiente estructura example@correo.com</p>

        <div class="wrapper">
          <input type="password" placeholder="Contraseña" id="pass" name="pass" class="inpt">
          <img src="images/icon-error.svg" alt="error-ico" id="pass-ico" class="inpt-ico">
          <i class="fa-solid fa-circle-check inpt-ico-g" id="pass-ico-g" ></i>
        </div>
        <p id="pass-empty" class="omit">La contraseña no puede estar vacía</p>
        <p id="pass-pat" class="omit">La contraseña debe contener de 8 a 12 caracteres,<br> al menos 1 letra mayúscula, 1 letra minúscula y 1 número</p>

        <input type="submit" value="Reclama tu prueba gratuita" id="submit" class="inpt submt" name=register> 

        <p class="condition">Al darle click al botón, estas aceptando nuestros <a href="#">Términos y Condiciones</a></p> 

      </form>
      
    </div>



  </section>
   
  <footer class="col-12">
    <p class="attribution"> 
      Coded by <a href="#">Sodokun</a>.
    </p>
  </footer>

  <script src="validation.js"></script>
</body>
</html>