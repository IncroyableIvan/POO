<?php
require_once('HumanClass.php');
class Thief extends Human
{
  private $cloak = 5;
  private $agility = 10;

  public function hide()
  {
    if($this->cloak > 0) {
      // On évite le coup
      $this->cloak = $this->cloak - 1;
    } else {
      // On n'évite pas le coup
    }
  }
  public function stab()
  {
    if($this->agility > 0) {
      $enemy->receiveDamage(15);
      // On poignarde l'ennemi
      $this->agility = $this->agility - 1;
    } else {
      // On échoue
    }
  }
}
