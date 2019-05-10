<?php

// namespace Models;

class Card {
  private $value;
  private $suit;

  public function __construct($value, $suit) {
    $this->value = $value;
    $this->suit = $suit;
  }

  public function getValue() {
    return $this->value;
  }

  public function getSuit() {
    return $this->suit;
  }

  public function getCard() {
    return $this->value . $this->suit;
  }
}
