<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include 'templates/head.view.php' ?>
    </head>

<body class="">
  <div class="wrapper">
    <?php include 'templates/sidebar.view.php' ?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php include 'templates/navbar.view.php' ?>
      <div class="content">
          <div class="row">
              <div class="col-12">
                  <h1>Bienvenido <?php echo $_SESSION['usuario']['nombre'] ?></h1>
              </div>
          </div>
      </div>
      <?php include 'templates/footer.view.php' ?>
    </div>
  </div>

    <?php include 'templates/scripts.view.php' ?>
  
</body>

</html>