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
  
  <div class="my-3">
    <label class="form-label" for="multiNumber">Multi-Faktor</label>
    <select class="form-select" id="selectMulti" name="selectMulti">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
  </div>
  
  <button type="submit" class="btn btn-primary">
    Absenden
  </button>
</form>
<?= $contentEnd; ?>

<?php if (isset($_POST['name'], $_POST['randomNumber'], $_POST['selectMulti'])): ?>
  <?php
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $randomNumber = (int) $_POST['randomNumber'];
    $selectMulti = (int) $_POST['selectMulti'];
    $finalNumber = ($randomNumber * $selectMulti);
  ?>
  
  <?= $contentStart; ?>
  <h2>Hallo <?= $name; ?>, wie geht es dir?</h2>
    <p>Deine Zahl (<span class="fw-bold"><?= $randomNumber; ?></span>) x <span class="fw-bold"><?= $selectMulti; ?></span> (Deine ausgewählte Zahl) ergibt: <?= $finalNumber; ?></p>
  <?= $contentEnd; ?>
<?php endif; ?>

<?php require_once("includes/footer.php"); ?>