<?php
include "../dao/dao_patient.php";
include "../dao/dao_rv.php";

session_start();

$action = $_GET['action'] ?? '';
$dao = new DaoPatient();
$daoRV = new DaoRendezVous();

switch ($action) {
    case 'chercherPatient':
        $cin = $_POST['cin'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        if (!empty($cin)) {
            if(isset($email,$password)){
                $patient = $dao->findpatient($email, $password);}
            else{
                echo "email et password non trouve";
            }
            if ($patient != null) {
                $data = array(
                    'id'   => $patient->getId(),
                    'Nom'   => $patient->getNom(),
                    'Prenom'   => $patient->getPrenom(),
                    'telephone'   => $patient->getTelephone(),
                    'email'   => $patient->getEmail(),
                    'password'   => $patient->getPassword(),
                    'dateNaissance'   => $patient->getDateNaissance(),
                    'cin'   => $patient->getCin()
                );
                echo json_encode($data);
            } else {
                $dat = [];
                echo json_encode($dat);
            }
        } else {
            echo "Paramètre 'cin' manquant.";
        }
        break;
    case 'delete':
        $id = $_POST['id'];

        if (isset($id)) {
            $daoRV->delete($id); // supprimer un rendez-vous suivant l'id de quel patient
        } else {
            echo "Paramètre 'id' manquant.";
        }
        break;
    case 'insert':
        $patientID = $_POST['patientID'];
        $start = $_POST['start'];
        $end = $_POST['end'];

        if (isset($patientID, $start, $end)) {
            // Vérifier si la plage horaire est disponible
            $isAvailable = $daoRV->verifyDisponibility($start, $end);
            
            if ($isAvailable) {
                $rv = new RendezVous(0,$patientID, $start, $end);
                // Insérer le nouveau rendez-vous
                $daoRV->save($rv);
                $data = [];
                echo json_encode($data);
            } else {
                $dat = ["plage indisponible"];
                echo json_encode($dat);
            }
        } else {
            echo "Paramètres manquants.";
        }
        break;

    case 'load':
        $daoRV->load();
        break;

    case 'update':
        $id = $_POST["id"];
        if(isset($id)){
            $daoRV->update($id);
        }
        else{
            echo "id manquant";
        }
        break;
    
}
?>

