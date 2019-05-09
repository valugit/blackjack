<?php

require_once "../src/models/Game.php";
require_once "../src/models/Player.php";
require_once "../src/models/Dealer.php";
require_once "../src/models/Deck.php";

class GameController {

  private $game;

  public function new() {
    $this->game = new Game();

    if (isset($_SESSION["saved_game"])) {
      $this->game->load($_SESSION["saved_game"]);
    } else {
      if (isset($_POST["nickname"]) && is_string($_POST["nickname"])) {
        $this->game->setPlayer($_POST["nickname"]);
        $this->game->setGame();
      }
    }

    if (isset($_POST["hit"])) {
      $this->hit();
    } elseif (isset($_POST["stand"])) {
      $this->stand();

      if ($this->stand() == "GG") {
        $gameStatus = "The house always wins.";
        $messageColor = "loose";
      } elseif ($this->stand() == "tie") {
        $gameStatus = "It's a tie.";
        $messageColor = "tie";
      } else {
        $gameStatus = "I play to win! GG!";
        $messageColor = "win";
      }
    } elseif (isset($_POST["reset"])) {
      $this->reset();
    }

    $playerName = $this->game->getPlayerName();
    $playerHand = $this->game->getPlayerHand();
    $playerHandValue = $this->game->getPlayerHandValue();

    $dealerHand = $this->game->getDealerHand();
    $dealerHandValue = $this->game->getDealerHandValue();

    if ($this->game->playerStatus() == "GG") {
      $gameStatus = "I play to win! GG!";
      $messageColor = "win";
    } elseif ($this->game->playerStatus() == "86") {
      $gameStatus = "The house always wins.";
      $messageColor = "loose";
    }

    $_SESSION["saved_game"] = $this->game->save();

    include "../views/index/game.php";
  }

  private function hit() {
    $this->game->playerHit();

    if ($this->game->playerStatus() == "GG") {
      $gameStatus = "I play to win! GG!";
      $messageColor = "win";
    } elseif ($this->game->playerStatus() == "86") {
      $gameStatus = "The house always wins.";
      $messageColor = "loose";
    }
  }

  private function reset() {
    $playerName = $this->game->getPlayerName();

    $this->game = new Game();

    $this->game->setPlayer($playerName);
    $this->game->setGame();
  }

  private function stand() {
    $this->game->dealerMove();

    return $this->game->dealerStatus();
  }
}
