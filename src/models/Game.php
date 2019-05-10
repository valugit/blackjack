<?php

// namespace Models;

// use Models\Player;
// use Models\Dealer;
// use Models\Deck;

require_once "Player.php";
require_once "Dealer.php";
require_once "Deck.php";

class Game {
  private $player;
  private $dealer;
  private $deck;

  public function __construct() {
    $this->dealer = new Dealer;
    $this->deck = new Deck;
  }

  public function setPlayer($player) {
    $this->player = new Player($player);
  }

  public function setGame() {
    $this->deck->shuffleDeck();
    $this->player->takeCard($this->deck->handOut(2));
    $this->dealer->takeCard($this->deck->handOut(1));
  }
  
  public function getPlayerName() {
    return $this->player->getName();
  }

  public function getPlayerHand() {
    return $this->player->getHand();
  }

  public function getPlayerHandValue() {
    return $this->player->countCards();
  }

  public function playerHit() {
    $this->player->takeCard($this->deck->handOut(1));
  }

  public function playerStatus() {
    if ($this->player->countCards() == 21) {
      return "GG";
    } elseif ($this->player->countCards() > 21) {
      return "86";
    }
  }

  public function getDealerHand() {
    return $this->dealer->getHand();
  }

  public function getDealerHandValue() {
    return $this->dealer->countCards();
  }

  public function dealerMove() {
    while ($this->dealer->countCards() < 17) {
      $this->dealer->takeCard($this->deck->handOut(1));
    }
  }

  public function dealerStatus() {
    if ($this->dealer->countCards() == 21) {
      return "GG";
    } elseif ($this->dealer->countCards() > 21) {
      return "86";
    } else {
      if ($this->dealer->countCards() > $this->player->countCards()) {
        return "GG";
      } elseif ($this->dealer->countCards() < $this->player->countCards()) {
        return "86";
      } else {
        return "tie";
      }
    }
  }

  public function save() {
    return [
      "player" => $this->player,
      "dealer" => $this->dealer,
      "deck" => $this->deck
    ];
  }

  public function load($savedGame) {
    $this->player = $savedGame["player"];
    $this->dealer = $savedGame["dealer"];
    $this->deck = $savedGame["deck"];
  }
}