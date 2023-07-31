<?php

include "../model/rendezVous.php";

class DaoRendezVous {
    
    private $dbh;
    
    public function __construct(){
        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=cabinet', "root", "");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die();
        }
    }


    public function save(RendezVous $rendezvous) {
        // $stm = $this->dbh->prepare("INSERT INTO rendezvous (patientID, start_event, end_event) VALUES (?, ?, ?)");
        // $stm->bindValue(2,$rendezvous->getPatientID());
        // $stm->bindValue(3,$rendezvous->getStartEvent());
        // $stm->bindValue(4,$rendezvous->getEndEvent());
        // return $stm->execute();
        $query = "INSERT INTO rendezvous (patientID, start_event, end_event) VALUES (:patientID, :start, :end)";
        $statement = $this->dbh->prepare($query);
        $statement->execute(array(':patientID' => $rendezvous->getPatientID(), ':start' => $rendezvous->getStartEvent(), 
        ':end' => $rendezvous->getEndEvent()));
    }

    public function load() {
    
        $data = array();
    
        $query = "SELECT * FROM rendezvous ORDER BY start_event DESC";
        $statement = $this->dbh->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
    
        foreach($result as $row) {
            $query = "SELECT * FROM patient WHERE id = :id";  
            $st = $this->dbh->prepare($query);  
            $st->execute(array('id' => $row['patientID'])); 
            $patient = $st->fetch(PDO::FETCH_ASSOC);
    
            $hex = 'rgba(';
    
            // Créez une boucle.
            foreach(array('r', 'g', 'b') as $color) {
                // Nombre aléatoire entre 0 et 255.
                $val = mt_rand(0, 255);
                // Convertissez le nombre aléatoire en une valeur hexadécimale.
                // Concaténez
                $hex .= $val.",";
            }
            $hex .="0.7)";
            
            $data[] = array(
                'id'         => $row["id"],
                'title'      => $patient["Nom"]." ".$patient["Prenom"],
                'patientID'  => $row["patientID"],
                'start'      => $row["start_event"],
                'end'        => $row["end_event"],
                'color'      => $hex,
                'textColor'  => "black"
            );
        }
    
        echo json_encode($data);
    }
    
    public function update($id){
        $query = "
        UPDATE rendezVous 
        SET start_event=:start_event, end_event=:end_event 
        WHERE id=:id
        ";
        $statement = $this->dbh->prepare($query);
        $statement->execute(
         array(
          ':start_event' => $_POST['start'],
          ':end_event' => $_POST['end'],
          ':id'   => $id
         )
        );
    }
    // public function findAll() {
    //     $query = "SELECT * FROM  `rendezvous` WHERE (:start>=start_event AND :start<end_event) OR (:end>start_event AND :end<= end_event) OR (:start<=start_event AND :end>=end_event)";
    //     $st = $this->dbh->prepare($query);
    //     $st->execute(array(
    //     'start' => $_POST['start'],
    //     'end' => $_POST['end'],
    //     ));
    //     $result = $st->fetchAll();
    //     return $result;
    // }

    public function verifyDisponibility($start, $end) {
        $query = "SELECT * FROM rendezvous WHERE (:start >= start_event AND :start < end_event) OR (:end > start_event AND :end <= end_event) OR (:start <= start_event AND :end >= end_event)";
        $statement = $this->dbh->prepare($query);
        $statement->execute(array(':start' => $start, ':end' => $end));
        return ($statement->rowCount() == 0); // Retourne true si la plage horaire est disponible, sinon false
    }

    public function delete($id) {
        $query = "DELETE FROM rendezvous WHERE id = :id";
        $statement = $this->dbh->prepare($query);
        $statement->execute(array(':id' => $id));
    }
}
?>
