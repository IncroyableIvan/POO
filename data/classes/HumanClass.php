<?php
  abstract class Human
  {
    const LOW_PV = 100;
    const MEDIUM_PV = 150;
    const HIGH_PV = 200;

    const LOW_PM = 10;
    const MEDIUM_PM = 20;
    const HIGH_PM = 30;

    const LOW_POWER = 2;
    const MEDIUM_POWER = 4;
    const HIGH_POWER = 8;

    private $pv;
    private $pm;
    private $name;
    private $power;

    public function __construct($name, $pv, $pm, $power)
    {
      $this->setPv($pv);
      $this->setPm($pm);
      $this->setPower($power);
      $this->setName($name);
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
    public function setPm($pm)
    {
      if($pm === Self::LOW_PM || $pm === Self::MEDIUM_PM || $pm === Self::HIGH_PM) {
        $this->pm = $pm;
      } else {
        throw new Exception('Erreur de valeur pour les points de mana');
      }
    }
    public function getPm()
    {
      return $this->pm;
    }
    private function setName($name)
    {
      $this->name = $name;
    }
    public function getName($name)
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
    public function dealDamage($enemy)
    {
      $enemy->receiveDamage($this->getPower() * 5);
    }
    public function receiveDamage($damage)
    {
      $this->pv = $this->getPv() - $damage;
    }
  }
