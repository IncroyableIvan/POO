<?php
  require_once('HumanClass.php');
  class ChaosMarine extends Human
  {
    private $fuel = 10;
    private $energyCell = 15;
    private $armor = 3;

    public function attack($enemy)
    {
      $randomEnergy = 0;
      if($this->energyCell > 0) {
        if($this->energyCell < 5) {
          $randomEnergy = rand(1, $this->energyCell);
        } else {
          $randomEnergy = rand(1, 5);
        }
        $enemy->receiveDamage($this->getPower() + $randomEnergy);
        $this->energyCell = $this->energyCell - $randomEnergy;
        $this->regenerateEnergy();
      } else if($this->energyCell == 0) {
        // On ne peut pas attaquer, mais l'énergie se régénère
        $this->regenerateEnergy();
      } else {
        throw new Exception('Erreur de cellule : ' . $this->energyCell);
      }
    }
    public function burn($enemy)
    {
      if($this->fuel > 0) {
        $enemy->receiveDamage($this->getPower() + rand(1, 5));
        $this->fuel = $this->fuel - 1;
      } else if($this->fuel == 0) {
        // On ne peut pas brûler
      } else {
        throw new Exception('Erreur de Fuel, quantité de fuel : ' . $this->fuel);
      }
    }
    public function receiveDamage($damage)
    {
      if(($damage - $this->armor) <= 0) {
        // Aucun dégat n'est fait
      } else {
        $this->pv = $this->getPv() - ($damage - $this->armor);
      }
    }
    private function regenerateEnergy()
    {
      $energy = rand(1, 10);
      $this->energyCell = $this->energyCell + $energy;
    }
  }
