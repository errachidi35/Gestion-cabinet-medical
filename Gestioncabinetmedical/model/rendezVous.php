<?php

class RendezVous {
    private $id;
    private $patientID;
    private $startevent;
    private $endevent;

    function __construct($id,$patientID,$startevent, $endevent) {
        $this->id = $id;
        $this->patientID = $patientID;
        $this->startevent = $startevent;
        $this->endevent = $endevent;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getPatientID() {
        return $this->patientID;
    }

    public function setPatientID($patientID) {
        $this->patientID = $patientID;
    }

    public function getStartEvent() {
        return $this->startevent;
    }

    public function setStartEvent($startevent) {
        $this->startevent = $startevent;
    }

    public function getEndEvent() {
        return $this->endevent;
    }

    public function setEndEvent($endevent) {
        $this->endevent = $endevent;
    }

}

?>