<?php
  require_once('RenderClass.php');
  abstract class Human
  {
    const LOW_PV = 20;
    const MEDIUM_PV = 30;
    const HIGH_PV = 40;

    const LOW_POWER = 2;
    const MEDIUM_POWER = 4;
    const HIGH_POWER = 8;

    protected $pv;
    protected $name;
    protected $power;
    protected $render;

    public function __construct($name, $pv, $power)
    {
      $this->setPv($pv);
      $this->setPower($power);
      $this->setName($name);
      $this->render = Render::getInstance();
    }
    public function setPv($pv)
    {
      if($pv === Self::LOW_PV || $pv === Self::MEDIUM_PV || $pv === Self::HIGH_PV) {
        $this->pv = $pv;
      } else {
        throw new Exception('Erreur de valeur pour les points de vie');
      }
    }
    public function getPv()
    {
      return $this->pv;
    }
    private function setName($name)
    {
      $this->name = $name;
    }
    public function getName()
    {
      return $this->name;
    }
    public function setPower($power)
    {
      if($power === Self::LOW_POWER || $power === Self::MEDIUM_POWER || $power === Self::HIGH_POWER) {
        $this->power = $power;
      } else {
        throw new Exception('Erreur de valeur pour les points de puissance');
      }
    }
    public function getPower()
    {
      return $this->power;
    }
    public function attack($enemy)
    {
      $enemy->receiveDamage($this->getPower());
    }
    public function receiveDamage($damage)
    {
      $this->pv = $this->getPv() - $damage;
    }
    public function state()
    {
      if($this->getPv() > 0) {
        return True;
      } else {
        return False;
      }
    }
  }
