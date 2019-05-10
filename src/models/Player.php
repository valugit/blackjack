<?php

// namespace Models;

class Player {
  private $name = '';
  private $hand = [];

  public function __construct($name = "Jean-Guy") {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }

  public function takeCard($cards) {
    $this->hand = array_merge($this->hand, $cards);
  }

  public function getHand() {
    return $this->hand;
  }

  public function countCards() {
    $total = 0;
    $aceNumber = 0;

    foreach ($this->hand as $card) {
      $cardValue = $card->getValue();
      
      if (is_numeric($cardValue)) {
        $total += $cardValue;
      } else if ($cardValue == 'A') {
        $aceNumber += 1;
      } else {
        $total += 10;
      }
    }

    if ($aceNumber != 0) {
      for ($i=0; $i < $aceNumber; $i++) { 
        if (($total + 11) > 21) {
          $total += 1;
        } else {
          $total += 11;
        }
      }
    }

    return $total;
  }
}