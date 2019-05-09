<?php include "../views/head.php"; ?>

<main>
  <h2>Start a new game</h2>
  <form method="POST" action="/?controller=game&action=new">
    <label for="player">Player Name:</label>
    <input type="text" id="player" name="nickname" placeholder="Jean-Guy">
    <button type="submit">Play</button>
  </form>
</main>

<?php include "../views/foot.php"; ?>