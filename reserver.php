<?php
$error = "<div>
          <script> alert('❌ Ce créneau est déjà réservé. Veuillez choisir une autre date ou heure.');</script>
        </div>";

$success = "<div>
          <script> alert('✅ Consultation enregistrée avec succès.');</script>
        </div>";

if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['btn'])) {
  if (!empty($_POST['name']) or !empty($_POST['email']) or !empty($_POST['tele']) or !empty($_POST['date']) or !empty($_POST['time']) or !empty($_POST['consultation']) or !empty($_POST['text']) or !empty($_POST['cni'])) {
    require_once "db-connexion\db.php";

    $verf = $pdo->prepare("SELECT COUNT(*) FROM patiants WHERE date=? AND time=? AND cni=?");
    $verf->execute([$_POST['date'], $_POST['time'], $_POST['cni']]);

    $count = $verf->fetchColumn();

    if ($count > 0) {
      echo $error;
    } else {
      $stmt = $pdo->prepare("INSERT INTO patiants (name, email, tele, date, time, consultation, text, cni) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->execute([$_POST['name'], $_POST['email'], $_POST['tele'], $_POST['date'], $_POST['time'], $_POST['consultation'], $_POST['text'], $_POST['cni']]);
      echo $success;
    }
  } else {
    echo "<div>
          <script> alert('Remplir tous les champs.');</script>
        </div>";
  }
}

?>

<!-- <!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <title>Formulaire de Consultation</title>
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
  <style>
    body {
      background: #3498db40;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }

    .form-container {
      background: white;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 600px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #3498db;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: 600;
    }

    input,
    select,
    textarea {
      width: 100%;
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 15px;
    }

    textarea {
      resize: vertical;
    }

    button {
      background: #3498db;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 8px;
      width: 100%;
      font-size: 16px;
      cursor: pointer;
    }

    button:hover {
      background: #2980b9;
    }
  </style>
</head>

<body>

  <div class="form-container">
    <h2>Prise de Rendez-vous</h2>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
      <div class="form-group">
        <label for="name">Nom complet</label>
        <input type="text" id="name" name="name" />
      </div>

      <div class="form-group">
        <label for="name">Nº CNI</label>
        <input type="text" id="name" name="cni" />
      </div>

      <div class="form-group">
        <label for="email">Adresse e-mail</label>
        <input type="email" id="email" name="email" />
      </div>

      <div class="form-group">
        <label for="tele">Téléphone</label>
        <input type="number" id="tele" name="tele" />
      </div>

      <div class="form-group">
        <label for="date">Date</label>
        <input type="date" id="date" name="date" />
      </div>

      <div class="form-group">
        <label for="time">Heure</label>
        <select id="time" style="width: 100%; padding: 0.5rem; border: 1px solid #ddd; border-radius: 4px;" name="time">
          <option value="">Sélectionnez une heure</option>
          <option value="09:00">09:00</option>
          <option value="10:00">10:00</option>
          <option value="11:00">11:00</option>
          <option value="14:00">14:00</option>
          <option value="15:00">15:00</option>
          <option value="16:00">16:00</option>
          <option value="17:00">17:00</option>
        </select>
      </div>

      <div class="form-group">
        <label for="consultation">Type de consultation</label>
        <select id="type" style="width: 100%; padding: 0.5rem; border: 1px solid #ddd; border-radius: 4px;" name="consultation">
          <option value="">Sélectionnez un type</option>
          <option value="standard">Consultation standard (25€)</option>
          <option value="specialized">Consultation spécialisée (40€)</option>
          <option value="home">Consultation à domicile (50€)</option>
          <option value="video">Téléconsultation (25€)</option>
        </select>
      </div>

      <div class="form-group">
        <label for="text">Message / Symptômes</label>
        <textarea id="text" name="text" rows="4"></textarea>
      </div>

      <button type="submit" name="btn">Envoyer</button><br><br>
      
    </form>
    <a href="index.php"class="btn btn-success border border-darck">Retour a la page d'accueil</a>
  </div>



</body>

</html> -->

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire de Consultation</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
</head>

<body style="background-color:rgba(0, 153, 255, 0.35);">
  <div class="container mt-5 mb-5">
    <h2 class="text-center mb-4">Réserver une Consultation</h2>
    <form method="post" class="row g-3">
      <div class="col-md-6">
        <label for="name" class="form-label">Nom Complet</label>
        <input type="text" name="name" class="form-control" placeholder="Entrez votre nom complet">
      </div>

      <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" placeholder="example@gmail.com">
      </div>

      <div class="col-md-6">
        <label for="tele" class="form-label">Téléphone</label>
        <input type="text" name="tele" class="form-control" placeholder="06XXXXXXXX">
      </div>

      <div class="col-md-6">
        <label for="cni" class="form-label">CNI</label>
        <input type="text" name="cni" class="form-control" placeholder="Carte Nationale">
      </div>

      <div class="col-md-6">
        <label for="date" class="form-label">Date</label>
        <input type="date" name="date" class="form-control">
      </div>

      <div class="col-md-6">
        <label for="time" class="form-label">Heure</label>
        <input type="time" name="time" class="form-control">
      </div>

      <div class="col-12">
        <label for="consultation" class="form-label">Type de Consultation</label>
        <select name="consultation" class="form-select">
          <option selected disabled>Choisir...</option>
          <option value="standard">Consultation standard (25€)</option>
          <option value="specialized">Consultation spécialisée (40€)</option>
          <option value="home">Consultation à domicile (50€)</option>
          <option value="video">Téléconsultation (25€)</option>
        </select>
      </div>

      <div class="col-12">
        <label for="text" class="form-label">Message (optionnel)</label>
        <textarea name="text" class="form-control" rows="3" placeholder="Votre message..."></textarea>
      </div>

      <div class="col-12 text-center">
        <button type="submit" name="btn" class="btn btn-success px-5">Envoyer</button>
        <a href="index.php" name="btn" class="btn btn-primary px-5">Retour a la page de d'accueil</a>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
