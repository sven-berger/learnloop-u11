<?php require_once("includes/header.php"); ?>

<?= $contentStart; ?>
<form method="POST">
  <div class="mb-3">
    <label class="form-label" for="name">Name</label>
    <input
      class="form-control"
      id="name"
      name="name"
      placeholder="Bitte gib deinen Namen ein."
      required
    />
    <label class="form-label" for="multiNumber">Multi-Faktor</label>
    <select>
      <option name="One">1</option>
      <option name="Two">2</option>
      <option name="Three">3</option>
      <option name="Four">4</option>
      <option name="Five">5</option>
    </select>
  </div>

  <div class="mb-3">
    <label class="form-label" for="randomNumber">
      Zufällige Zahl (1–10)
    </label>
    <input
      type="number"
      id="randomNumber"
      name="randomNumber"
      class="form-control"
      min="1"
      max="10"
      placeholder="z.B. 5"
      required
    />
  </div>
  <button type="submit" class="btn btn-primary">
    Absenden
  </button>
</form>
<?= $contentEnd; ?>

<?php if (isset($_POST['name'], $_POST['randomNumber'])): ?>
  <?php
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $randomNumber = (int) $_POST['randomNumber'];
    $finalNumber = ($randomNumber * 10);
  ?>
  
  <?= $contentStart; ?>
  <h2>Hallo <?= $name; ?>, wie geht es dir?</h2>
    <p>Deine Zahl (<?= $randomNumber; ?>) x 10 ergibt: <?= $finalNumber; ?></p>
  <?= $contentEnd; ?>
<?php endif; ?>

<?php require_once("includes/footer.php"); ?>