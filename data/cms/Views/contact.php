<?php
  $content = "
  <h1>CONTACT</h1>
  <iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2821.897307043734!2d4.8615654903209755!3d45.770287698583054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f4ea85718bc503%3A0xd8b25d38030c2!2sIT-Akademy!5e0!3m2!1sfr!2sfr!4v1498036523495' width='600' height='450' frameborder='0' style='border:0' allowfullscreen></iframe>
  ";

  require_once('../Controllers/ContactController.php');
  $contact = new Contact('Contact', $content);
  $contact->display();
