<?php
  require_once('RenderClass.php');
  class Combat
  {
    private $turn = 0;
    private $render;

    public function __construct() {
      $this->render = Render::getInstance();
    }
    public function initiative()
    {
      $rand1 = rand(1, 1000);
      $rand2 = rand(1, 1000);
      if($rand1 > $rand2) {
        // Joueur1 joue en premier
        return 1;
      } else if($rand2 > $rand1) {
        // Joueur2 joue en premier
        return 2;
      } else {
        return False;
        // Initiative égale, à gérer;
      }
    }
    // Simule un tour de combat
    public function combatTurn($spaceMarine, $chaosMarine)
    {
      $chaosMarineName = $chaosMarine->getName();
      $spaceMarineName = $spaceMarine->getName();
      $initiative = $this->initiative();
      switch ($initiative) {
        // Le Joueur1 attaque
        case 1:
          $this->render->message($spaceMarine->getName() . " attaque " . $chaosMarine->getName());
          $rand = rand(1,2);
          if($rand == 1) {
            $spaceMarine->attack($chaosMarine);
          } else if($rand == 2) {
            $spaceMarine->slash($chaosMarine);
          }
          break;
        // Le Joueur2 attaque
        case 2:
        $this->render->message($chaosMarine->getName() . " attaque " . $spaceMarineName, "text-decoration:underline");
        $rand = rand(1,2);
          if($rand == 1) {
            $this->render->message($chaosMarineName . " utilise son Bolter à energie ");
            $chaosMarine->attack($spaceMarine);
          } else if($rand == 2) {
            $this->render->message($chaosMarineName . " utilise son Lance-flamme ");
            $chaosMarine->burn($spaceMarine);
          }
          break;
        // On ne fait rien et on lance un nouveau tour
        case False:
          break;
        default:
          throw new Exception("Erreur lors de l'initiative :" . $initiative);
          break;
      }
    }
    public function fullCombat($spaceMarine, $chaosMarine)
    {
      while (True) {
        $this->combatTurn($spaceMarine, $chaosMarine);
        if($spaceMarine->state() == False && $chaosMarine->state() == True) {
          $this->render->success('Le CHAOS a vaincu');
          return True;
          // Le ChaosMarine a gagné
        } else if($chaosMarine->state() == False && $spaceMarine->state() == True) {
          $this->render->success('La LOI a vaincu');
          return True;
          // Le SpaceMarine a gagné
        } else if($chaosMarine->state() == False && $spaceMarine->state() == False) {
          $this->render->info('Match NUL !');
          return True;
          // Match nul
        } else if ($chaosMarine->state() == True && $spaceMarine->state() == True) {
          // Les deux sont vivants, on continue
        }
        $this->turn = $this->turn + 1;
      }
    }
  }
