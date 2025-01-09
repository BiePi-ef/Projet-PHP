<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="https://bootswatch.com/5/pulse/bootstrap.css">

</head>

<body>

  <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">NEWS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto">

          <li class="nav-item">
            <a class="nav-link" href="?page=message">Taches</a>
          </li>

          <?php if(!isset($_SESSION['userData'])) {  ?>
          <li class="nav-item">
            <a class="nav-link" href="?page=inscription">Inscription</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="?page=connexion">Connexion</a>
          </li>

          <?php } else { ?>
            <li class="nav-item">
            <a  class="nav-link" href="">Connecté en tant que [<?=$_SESSION['userData']['userName']?>]</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="?page=deconnexion">Deconnexion</a>
          </li>
          <?php } ?>

        </ul>

      </div>
    </div>
  </nav>