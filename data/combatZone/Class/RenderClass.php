<?php
  class Render
  {
    private $color = "black";
    private $errorColor = "red";
    private $successColor = "green";
    private $infoColor = "blue";

    private static $_instance = null;
    private function __construct() {

    }
    public static function getInstance()
    {
      if(is_null(self::$_instance)) {
        self::$_instance = new Render();
      }
      return self::$_instance;
    }
    public function message($string)
    {
      echo "<p style='color:" . $this->color ."'>" . $string . "</p><br>";
    }
    public function error($string)
    {
      echo "<p style='color:" . $this->errorColor ."'>" . $string . "</p></br>";
    }
    public function success($string)
    {
      echo "<p style='color:" . $this->successColor ."'>" . $string . "</p></br>";
    }
    public function info($string)
    {
      echo "<p style='color:" . $this->infoColor ."'>" . $string . "</p></br>";
    }
  }
