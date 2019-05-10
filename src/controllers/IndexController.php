<?php

// namespace Controllers;

class IndexController {

  public function home() {
    $_SESSION = [];

    include "../views/index/home.php";
  }

  public function game() {
    include "../views/index/game.php";
  }
}