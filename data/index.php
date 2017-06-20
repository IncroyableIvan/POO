<?php
  require_once('./classes/FighterClass.php');
  require_once('./classes/ThiefClass.php');
  require_once('./classes/WizardClass.php');
  require_once('./classes/MageClass.php');

  $richard = new Human('Richard', Human::MEDIUM_PV, Human::LOW_POWER);
  $jean = new Thief('Jean', Human::LOW_PV, Human::MEDIUM_POWER);

  echo($jean->getPv());
  echo("<br>");
  $richard->slash($jean);
  echo($jean->getPv());
  echo("<br>");
