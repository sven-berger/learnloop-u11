<?php require_once("includes/header.php"); ?>

<?= $contentStart; ?>
<form method="POST">
  <div class="mb-3">
    <label class="form-label" for="name">Name</label>
    <input
      class="form-control"
      id="name"
      name="name"
      value="<?= htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
      placeholder="Bitte gib deinen Namen ein."
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
      placeholder="z.B. 5"
      required
    />
  </div>

  <div class="my-3">
    <label class="form-label" for="selectMulti">Multi-Faktor</label>
    <select class="form-select" id="selectMulti" name="selectMulti" required>
      <option value="2">2</option>
      <option value="4">4</option>
      <option value="6">6</option>
      <option value="8">8</option>
      <option value="10">10</option>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Absenden</button>
</form>
<?= $contentEnd; ?>

<?php
if (isset($_POST['name'], $_POST['randomNumber'], $_POST['selectMulti'])) {
  $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
  $randomNumber = (int) $_POST['randomNumber'];
  $selectMulti = (int) $_POST['selectMulti'];

  if ($randomNumber < 1 || $randomNumber > 10) {
    echo $contentStart . "<p class='text-danger fw-semibold'>Zahl muss zwischen 1 und 10 liegen.</p>" . $contentEnd;
  } elseif ($selectMulti < 2 || $selectMulti > 10) {
    echo $contentStart . "<p class='text-danger fw-semibold'>Multi-Faktor muss zwischen 2 und 10 liegen.</p>" . $contentEnd;
  } else {
    $finalNumber = $randomNumber * $selectMulti;

    echo $contentStart;
    echo "<h2>Hallo {$name}, wie geht es dir?</h2>";
    echo "<p>Deine Zahl (<span class='fw-bold'>{$randomNumber}</span>) x <span class='fw-bold'>{$selectMulti}</span> ergibt: <span class='fw-bold'>{$finalNumber}</span></p>";
    echo $contentEnd;
  }
}
?>

<?php require_once("includes/footer.php"); ?>