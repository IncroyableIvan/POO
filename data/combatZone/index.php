<?php
  require_once('Class/SpaceMarineClass.php');
  require_once('Class/ChaosMarineClass.php');
  require_once('Class/CombatClass.php');

  $vulkor = new SpaceMarine('Vulkor', Human::MEDIUM_PV, Human::LOW_POWER);
  $taklur = new ChaosMarine('Talkur', Human::MEDIUM_PV, Human::LOW_POWER);
  $combat = new Combat();
  $combat->fullCombat($vulkor, $taklur);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="css/style.css" rel="stylesheet">
    <title>BAGARRE !!!!!!!!</title>
  </head>
  <body>
    <header></header>
    <footer></footer>
  </body>
</html>
