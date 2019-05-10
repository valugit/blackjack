<?php include "../views/head.php"; ?>

<main class="bettingTable">
  <section>
    <?php if (!isset($gameStatus)): ?>
      <form method="POST" action="/?controller=game&action=new">
        <button type="submit" name="hit" class="deck">Hit</button>
      </form>
    <?php endif ?>
  </section>
  <section class="players">
    <div>
      <h2>Dealer</h2>
      <ul class="hand">
        <?php foreach ($dealerHand as $card): ?>
          <li><?php echo $card->getCard() ?></li>
        <?php endforeach ?>
      </ul>
    </div>
    <div>
      <?php if (isset($gameStatus)): ?>
        <h4 class="<?php echo $messageColor ?>"><?php echo $gameStatus ?></h4>
        <form method="POST" action="/?controller=game&action=new">
          <button type="submit" name="reset">Play again!</button>
        </form>
      <?php endif ?>
    </div>
    <div>
      <ul class="hand">
        <?php foreach ($playerHand as $card): ?>
          <li><?php echo $card->getCard() ?></li>
        <?php endforeach ?>
      </ul>
      <h2><?php echo $playerName ?></h2>
    </div>
  </section>
  <section>
    <?php if (!isset($gameStatus)): ?>
      <form method="POST" action="/?controller=game&action=new">
        <button type="submit" name="stand">Stand</button>
      </form>
      <form method="POST" action="/?controller=game&action=new">
        <button type="submit" name="reset">New Game</button>
      </form>
    <?php endif ?>
  </section>
</main>

<?php include "../views/foot.php"; ?>