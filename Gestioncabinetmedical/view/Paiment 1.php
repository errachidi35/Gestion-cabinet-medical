<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../cssSeparer/header.css">
    <link rel="stylesheet" href="../cssSeparer/Paiment1.css">
    
    <title>Document</title>
</head>
<body>
<header >
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
            <li><form method="post" action="../controller/controller_patient.php?action=deconnexion">
                <a class="fa-solid fa-right-from-bracket" href="../index.html" style="color: #347cf9;" type="submit" title="Deconnexion">Deconnexion</a>
              </form>  
            </li> 
          </ul>
        </nav>

  

</header>

      <article>
        <div class="container">
        <h1 class="form-title">Paiment : Montant à payer 4000dh</h1>
        <form name="FormD" id="paiment" action="../controller/controller_paiment.php?action=paiement" method="post">
          <div class="main-user-info">
            <div class="user-input-box">
              <label for="RIB">RIB</label>
              <input type="text" name="RIB"  placeholder="RIB">
            </div>
            <div class="user-input-box">
              <label for="CODE_CVC">Code CVC</label>
              <input type="password" name="CODE_CVC">
            </div>
            <div class="user-input-box">
              <label for="cin">CIN </label>
              <input type="text" name="cin" required autofocus placeholder="votre cin">
            </div>
            <div class="form-submit-btn">
              <input type="submit" value="Payer">
            </div>
          </div>
        </form>
        
            <article>
              
</body>
</html>