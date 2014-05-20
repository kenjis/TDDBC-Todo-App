<?php

class Todo implements JsonSerializable
{
    private $id;
    private $subject;
    
    public function __construct($subject) {
        $this->subject = $subject;
    }

    public function getId() {
        return $this->id;
    }

    public function getSubject() {
        return $this->subject;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setSubject($subject) {
        $this->subject = $subject;
    }
    
    public function jsonSerialize()
    {
        return ['id' => $this->id, 'subject' => $this->subject];
    }
}
