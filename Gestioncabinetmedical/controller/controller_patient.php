<?php
include "../dao/dao_patient.php";

session_start();

$action = $_GET['action'] ?? '';
$dao = new DaoPatient();

switch ($action) {
    case 'inscription':
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $datenaissance = $_POST['dateNaissance'];
        $cin=$_POST['cin'];

        if (isset($nom, $prenom, $telephone, $email, $password, $datenaissance,$cin)) {
            $patient = new patient(0,$nom, $prenom, $email, $telephone, $password, $datenaissance,$cin);
            $dao->save($patient);
            header('location: ../index.html');
        }else {
            echo "echec de connexion!";
        }
        break;
    case 'login':
        $email = $_POST['email'];
        $password = $_POST['password'];

        $patient = $dao->findpatient($email, $password);///return un objet de type patient 
        if ($patient != null) {
            //session_start();
            $_SESSION['patient'] = $patient;
            header('location: ../view/acceuil.html');///Aceuille
        } else {
            header('location: ../index.html');
        }
        break;
    case 'deconnexion':
            session_destroy();
            header('location:../index.html');
    
}
?>

