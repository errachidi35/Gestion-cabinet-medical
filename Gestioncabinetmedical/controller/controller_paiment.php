<?php
include "../dao/dao_paiment.php";
require_once('../controller/controller_patient.php');


$action = $_GET['action'];
$dao = new DaoPaiment();

switch ($action){
    case 'paiement':
        $RIB= $_POST['RIB'];
        $CODE_CVC = $_POST['CODE_CVC'];
        $cin = $_POST['cin'];
        if (isset($RIB,$CODE_CVC,$cin) && $cin==$_SESSION['patient']->getCin()) {
            $paiment = new paiment(0,$RIB,$CODE_CVC,$cin);
            $dao->save($paiment);
            header('location: ../view/acceuil.html');
        }else {
            echo "<script>alert('Échec de connexion!');</script>";
            echo "<script>window.history.back();</script>";
        }
        break;
}
?>

