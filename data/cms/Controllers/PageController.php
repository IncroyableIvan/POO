<?php
  require_once ('../Library/RenderClass.php');
  class Page
  {
    protected $title;
    protected $content;
    protected $render;
    protected $menu;

    public function __construct($title, $content)
    {
      $this->render = Render::getInstance();
      $this->title = $title;
      $this->content = $content;
      $this->menu = file_get_contents('../Views/menu.php');
    }
    /*
    * display
    * Input : None
    * Output : Output a complété HTML page using Render Singleton
    */
    public function display()
    {
      $template = file_get_contents('../Views/template.php'); // "file_get_contents" ouvre un fichier, prend son contenu et l'affiche
      echo $this->render->render($this->menu, $this->title, $this->content, $template);
    }
  }
