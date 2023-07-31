<?php
include "../model/patient.php";

class DaoPatient
{

    private $dbh;

    public

    function __construct()
    {
        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=cabinet', "root", "");
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function save(patient $patient)
    {
        $stm = $this->dbh->prepare("INSERT INTO patient(Nom,Prenom,telephone,email,password,dateNaissance,cin) VALUES (?, ?, ?, ?, ?,?,?)");
        $stm->bindValue(1, $patient->getNom());
        $stm->bindValue(2, $patient->getPrenom());
        $stm->bindValue(3, $patient->getTelephone());
        $stm->bindValue(4, $patient->getEmail());
        $stm->bindValue(5, $patient->getPassword());
        $stm->bindValue(6, $patient->getDateNaissance());
        $stm->bindValue(7, $patient->getCin());
        $stm->execute();
    }

    public function findpatient($email, $password)
    {
        $patient = null;
        $stm = $this->dbh->prepare("SELECT * FROM patient where email=? AND password=?");
        $stm->bindValue(1, $email);
        $stm->bindValue(2, $password);
        $stm->execute();

        $result = $stm->fetch(PDO::FETCH_ASSOC);
        if (!empty($result)) {
            $patient = new patient($result['id'],$result['Nom'],$result['Prenom'],$result['email'],$result['telephone'],$result['password'], $result['dateNaissance'],$result['cin']);
        }
        return $patient;
    }
}

?>