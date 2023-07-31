<?php
require_once('../controller/controller_patient.php');
//$patient = $_SESSION['patient'];

//session_start();

/*if(!isset($utilisateur)){
   header('location:login.html');
};*/
?>
<!DOCTYPE html>
<html>

<head>
    <title>Gérer votre rendez-vous</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" type="text/css" href="../css/sideRV.css">
    <link rel="stylesheet" type="text/css" href="../css/calendrier2.css">
    <link rel="stylesheet" type="text/css" href="../css/rv.css">
    <link rel="stylesheet" type="text/css" href="../css/header.css">


    <!-- <link rel="stylesheet" href="css\fichePatient.css"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
              <form method="post" action="../controller/controller_patient.php?action=deconnexion">
                <button class="fa-solid fa-right-from-bracket" style="color: #347cf9;" type="submit" title="Deconnexion">Deconnexion</button>
              </form>             
            </ul>
          </nav>
    </header>
    <div class="main d-flex">
        <div class="sidebar">
            <div class="doctor_info">
                <img alt="" src="../image/secretaire.png" class="doc_img"></img>
                <div class="nom_docteur">
                    <h4>Docteur</h4>
                </div>
            </div>
            <div class="sidebar_list">
                <a class="<?php echo 'list_item'.($_SERVER['REQUEST_URI']=="/cabinetS1/"?' active':'')?> "
                    onclick="changeactive(this)" href="gestionRendezVous.php">
                    <img class="fad fa-calendar-alt icon" alt="" src="../image/appointments.png"></img>
                    <div>prise de rendez-vous</div>
                </a>
                <a class="<?php echo 'list_item'.($_SERVER['REQUEST_URI']=="../GestionRDV/rendezVous.php"?' active':'')?> "
                    onclick=" changeactive(this)" href="rendezVous.php">
                    <img class="fad fa-calendar-alt icon" alt="" src="../image/deadline.png"></img>
                    <div>liste rendez-vous</div>
                </a>
                <a class="list_item" onclick="changeactive(this)" href="../index.html">
                    <img class="fad fa-calendar-alt icon" alt="" src="../image/logout.png"></img>
                    <div>logout</div>
                </a>
            </div>
            <script>
            const changeactive = (e) => {
                // e.preventDefault()
                let data = document.querySelectorAll(".list_item");
                data.forEach((e) => {
                    e.classList.remove('active')
                });
                e.classList.add('active')
            }
            </script>
        </div>
        <div class="dashboard">
            <div class="calendar">
                <div class="main_cal d-flex">
                    <?php include("calendrier.php")?>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
</script>
<footer></footer>
</html>