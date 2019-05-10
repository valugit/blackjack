<?php

// namespace Models;

// use Models\Card;

require "Card.php";

class Deck {
  private $cards= [];

  public function __construct() {
    $values = range(2,10);
    $values = array_merge($values,['J', 'Q', 'K', 'A']);
    $suits = ["&hearts;", "&diams;", "&spades;", "&clubs;"];

    foreach ($values as $value) {
      foreach ($suits as $suit) {
        $this->cards[] = new Card($value, $suit);
      }
    }
  }

  public function shuffleDeck() {
    shuffle($this->cards);
  }

  public function handOut($n){
    $cards = array_splice($this->cards, 0, $n);
    return $cards;
  }
}