<?php
  require_once('HumanClass.php'); // On charge le code
  class SpaceMarine extends Human // Création de la classe SpaceMarine qui hérite de ka
  {
    private $fuel = 10; // On définie 2 propriétés qui ne peuvent être modifiées
    private $ammo = 30;
    private $armor = 3;

    public function attack($enemy) // Création méthode attack qui est surchargée par rapport à la méthode attack de HumanClass
    {
      $ammoCount = 0;
      if($this->ammo > 0) {
        if($this->ammo <  10) {
          $ammoCount = rand(1, $this->ammo);
        } else {
          $ammoCount = rand(1, 10);
        }
        $enemy->receiveDamage($this->getPower() + $ammoCount);
        $this->ammo = $this->ammo - $ammoCount;
      } else if($this->ammo == 0) {
        $this->ammo = 30;
      } else {
        throw new Execption('Erreur de chargeur, quantité de balle : ' . $this->ammo);
      }
    }
    public function slash($enemy)
    {
      if($this->fuel > 0) {
        $enemy->receiveDamage($this->getPower() + rand(0, 5));
        $this->fuel = $this->fuel - 1;
      } else if($this->fuel == 0) {
        // On ne peut pas attaquer au corps à corps
      } else {
        throw new Execption('Erreur de Fuel, quantité de fuel : ' . $this->fuel);
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
  }
