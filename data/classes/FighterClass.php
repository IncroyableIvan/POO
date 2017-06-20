<?php
require_once('HumanClass.php');
class Fighter extends Human
{
  private $shield = 5;
  private $stamina = 10;

  public function protect()
  {
    if($this->shield > 0) {
      // On pare l'attaque
      $this->shield = $this->shield - 1;
    } else {
      // On ne pare pas l'attaque
    }
  }
  public function slash($enemy)
  {
    if($this->stamina > 0) {
      $enemy->receiveDamage(20);
      // On poignarde l'ennemi
      $this->stamina = $this->stamina - 1;
    } else {
      // On halete comme un chien
    }
  }
}
