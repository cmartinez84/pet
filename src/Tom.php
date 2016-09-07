<?php
  class Tom
  {
    private $name;
    private $satiety;
    private $attention;
    private $rest;

    function __construct($name)
    {
        $this->name = $name;
        $this->satiety = 100;
        $this->attention =100;
        $this->rest = 100;
    }
    function setName($name)
    {
      if($name){
        $this->name = $name;
      }
    }
    function getName(){
      return $this->name;
    }
    function setSatiety($value)
    {
        $this->satiety += $value;
    }
    function getSatiety(){
      return $this->satiety;
    }
    function setAttention($value)
    {
          $this->attention += $value;
    }
    function getAttention(){
      return $this->attention;
    }
    function setRest($value)
    {
          $this->rest += $value;
    }
    function getRest(){
      return $this->rest;
    }
    /////// cookies
    function save()
    {
      $_SESSION['tomCookie']= $this;
    }

    static function getAll()
    {
        return $_SESSION['tomCookie'];
    }

    static function deleteAll()
    {
        $_SESSION['tomCookie'] = "";
    }


  }

 ?>
