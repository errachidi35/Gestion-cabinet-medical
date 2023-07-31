<?php
class paiment
{
    private $ID_pay, $RIB, $CODE_CVC,$Montant,$cin;

    public function __construct($id,$RIB, $CODE_CVC,$cin)
    {
        $this->ID_pay = $id;
        $this->RIB = $RIB;
        $this->CODE_CVC = $CODE_CVC;
        $this->Montant = 4000;
        $this->cin = $cin; 
    }

    public function getRIB()
    {
        return $this->RIB;
    }


    public function setRIB($RIB)
    {
        $this->RIB= $RIB;
    }


    public function getCODE_CVC()
    {
        return $this->CODE_CVC;
    }

    public function setCODE_CVC($CODE_CVC)
    {
        $this->CODE_CVC = $CODE_CVC;
    }

    public function getMontant()
    {
        return $this->Montant;
    }

    public function setMontant($Montant)
    {
        $this->Montant = $Montant;
    }
    public function getCin()
    {
        return $this->cin;
    }

    public function setCin($cin)
    {
        $this->cin = $cin;
    }

}

?>