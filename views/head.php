<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Blackjack</title>
  <link rel="icon" href="favicon.ico">
  <link rel="stylesheet" href="styles/style.css">
</head>
<body>
 <header>
  <h1>Blackjack</h1>

  <?php if (isset($_SESSION["saved_game"])):?>
    <form method="POST" action="/?controller=index&action=home">
      <button type="submit" name="end">EndGame</button>
    </form>
  <?php endif ?>
 </header>