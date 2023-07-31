<?php
require_once('../controller/controller_patient.php');
//$patient = $_SESSION['patient'];

//session_start();

/*if(!isset($utilisateur)){
   header('location:login.html');
};*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/DossierMed.css">
    <script src="https://kit.fontawesome.com/4967bc9bc5.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../image/logo3.png" />
    <title>Hassania Med</title>
</head>
<body>
    <header>
        <figure>
          <img src="../image/logo3.png" />
          <div class="header-text">
            <h1 class="nav-logo-title1">Hassania Med</h1>
            <h5 class="nav-logo-title2">Ensemble pour une meilleure vie</h5>
          </div>
        </figure>
        <nav>
          <ul class="nav-menu">
            <li><a href="acceuil.html"><i class="fa-solid fa-house" style="color: #347cf9;"></i><strong>Accueil</strong></a></li>
            <li><a href="contact"><i class="fa-solid fa-phone" style="color: #347cf9;"></i><strong>Conact</strong></a></li>
            <form method="post" action="../controller/controller_patient.php?action=deconnexion">
            <button class="fa-solid fa-right-from-bracket" style="color: #347cf9;" type="submit" title="Deconnexion">Deconnexion</button>
            </form>
          </ul>
        </nav>
      </header>
      <section>
        <ul class="pagination">
          <li><a href="index.html" class="active">Fiche Personnelle</a></li>
          <li><a href="#">Analyses</a></li>
          <li><a href="#">Ordonnances</a></li>
          <!-- Add more pages as needed -->
        </ul>
      </section>
      <!-- ***********************Fiche Patient************************** -->

    <!-- Autres champs du formulaire -->
    
<form>
      <article>
        <div class="container">
        <h1 class="form-title">Vos informations personnellles</h1>
      
<table class="user-info-table">
    <tr>
        <td><h3 class="table-heading">Nom</h3></td>
        <td class="table-second"><?php echo $_SESSION['patient']->getNom(); ?></td>
    </tr>
    <tr>
        <td><h3 class="table-heading">Prénom</h3></td>
        <td class="table-second"><?php echo $_SESSION['patient']->getPrenom(); ?></td>
    </tr>
    <tr>
        <td><h3 class="table-heading">Date de naissance</h3></td>
        <td class="table-second"><?php echo $_SESSION['patient']->getDateNaissance(); ?></td>
    </tr>
    <tr>
        <td><h3 class="table-heading">CIN</h3></td>
        <td class="table-second"><?php echo $_SESSION['patient']->getCin(); ?></td>
    </tr>
    <tr>
        <td><h3 class="table-heading">Numéro de téléphone</h3></td>
        <td class="table-second"><?php echo $_SESSION['patient']->getTelephone(); ?></td>
    </tr>
    <tr>
        <td><h3 class="table-heading">E-mail</h3></td>
        <td class="table-second"><?php echo $_SESSION['patient']->getEmail(); ?></td>
    </tr>
</table>


          </div>
        </article>
         
        
     
    
  
    
</body>

</html>
