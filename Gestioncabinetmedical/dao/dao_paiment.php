<?php
include "../model/paiment.php";
class DaoPaiment
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
    public function save(paiment $paiment)
    {
        $stm = $this->dbh->prepare("INSERT INTO paiment(RIB,CODE_VER,Montant,cin) VALUES (?,?,?,?)");
        $stm->bindValue(1, $paiment->getRIB());
        $stm->bindValue(2, $paiment->getCODE_CVC());
        $stm->bindValue(3, $paiment->getMontant());
        $stm->bindValue(4,$paiment->getCin());
        $stm->execute();
    }

}

?>