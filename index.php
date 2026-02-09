<?php require_once("includes/header.php"); ?>

<?php echo $contentStart; ?>
<form method="POST">
  <div class="mb-3">
    <label class="form-label" for="name">Name</label>
    <input
      class="form-control"
      id="name"
      name="name"
      value="<?= htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
      placeholder="Bitte gib deinen Namen ein:"
      required
    />
  </div>

  <div class="mb-3">
    <label class="form-label" for="randomNumber">Zufällige Zahl (1–10)</label>
    <input
      type="number"
      id="randomNumber"
      name="randomNumber"
      class="form-control"
      min="1"
      max="10"
      value="<?= htmlspecialchars($_POST['randomNumber'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
      placeholder="z.B.  5"
      required
    />
  </div>

  <div class="my-3">
    <label class="form-label" for="selectMulti">Multi-Faktor</label>
    <select class="form-select" id="selectMulti" name="selectMulti" required>
      <option value="">Bitte wählen:</option>
      <option value="2">2</option>
      <option value="4">4</option>
      <option value="6">6</option>
      <option value="8">8</option>
      <option value="10">10</option>
      <option value="ownLetter">Eigene Zahl</option>
    </select>
  </div>

  <button type="submit" class="btn btn-danger">Absenden</button>
</form>
<?php echo $contentEnd; ?>

<?php
if (isset($_POST['name'], $_POST['randomNumber'], $_POST['selectMulti'])): ?>
  <?php
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $randomNumber = (int) $_POST['randomNumber'];
    $selectMulti = (int) $_POST['selectMulti'];
    $finalNumber = $randomNumber * $selectMulti;
  ?>

    <?= $contentStart ?>
    <h2>Hallo <?= $name; ?>!<br />Wie geht es dir?</h2>
    <p><span class='fw-bold'><?= $randomNumber; ?></span> <span style="font-size: 11px;">
      (Deine Zahl)</span> x <span class='fw-bold'><?= $selectMulti; ?></span> <span style="font-size: 11px;">
      (Dein auswählter Multi-Faktor)</span> ergibt: <span class='fw-bold'><?= $finalNumber; ?></span></p>
    <?= $contentEnd ?>
<?php endif; ?>



<?php require_once("includes/footer.php"); ?>