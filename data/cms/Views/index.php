<?php
  $content = "
  <h1>COUCOU</h1>
  <img src='http://pucca78000.p.u.pic.centerblog.net/jizafmql.gif'>
  ";

  require_once('../Controllers/IndexController.php');
  $index = new Index('Accueil', $content);
  $index->display();
