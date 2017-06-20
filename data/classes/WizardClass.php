<?php
require_once('HumanClass.php');
class Wizard extends Human
{
  private $stick = 5;
  private $fireball = 10;
  private $iceball = 8;

  public function stun()
  {
    if($this->stick > 0) {
      $enemy->receiveDamage(15);
      $this->stick = $this->stick - 1;
      // On étourdi l'ennemi
    } else {
      // On loupe notre attaque
    }
  }
  public function burn()
  {
    if($this->fireball > 0) {
      $enemy->receiveDamage(25);
      $this->fireball = $this->fireball - 1;
      // On brûle l'ennemi
    } else {
      // On loupe notre attaque
    }
  }
  public function freeze()
  {
    if($this->iceball > 0) {
      $enemy->receiveDamage(25);
      $this->iceball = $this->iceball - 1;
      // On gel l'ennemi
    } else {
      // On loupe notre attaque
    }
  }
}
