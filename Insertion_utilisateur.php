<?php
require('bdn.php');
require('autho.php');

$sf = Session();
// Vérifie si l'ID de l'utilisateur à mettre à jour est présent dans l'URL
if (isset($_GET['Insertion_utilisateur'])) {
    $id_utilisateur = $_GET['Insertion_utilisateur'];

    // Prépare et exécute la requête pour récupérer les informations de l'utilisateur
    $utilisateur = $connexion->prepare('SELECT * FROM utilisateur WHERE id = :id');
    $utilisateur->execute(['id' => $id_utilisateur]);
    $detail = $utilisateur->fetch(PDO::FETCH_ASSOC);

    // Vérifie si l'utilisateur existe
    if (!$detail) {
        echo "Utilisateur non trouvé.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Voyage+Aos/Aos/dist/aos.css">
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Modification Utilisateur</title>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
    const passwordField = document.getElementById('motDePasse');
    const confirmationField = document.getElementById('confirmationkk');
    const confirmationPassword = document.getElementById('confirmationPassword');
    const erreurDiv = document.querySelector('.erreur');

    const enregistrement = document.querySelector('.enregistrement');
  

    if (passwordField) {
      passwordField.addEventListener('input', function () {
        if (confirmationField) {
          confirmationField.style.display = this.value.trim() !== '' ? 'block' : 'none';
        }

        // Optionnel : réinitialiser le message d'erreur quand on modifie le mot de passe
        if (erreurDiv) erreurDiv.innerText = '';
      });
    }

    if (confirmationPassword) {
      confirmationPassword.addEventListener('input', function () {
        if (passwordField && erreurDiv) {
          if (confirmationPassword.value !== passwordField.value) {
            erreurDiv.innerText = "Votre mot de passe n'est pas identique";
        erreurDiv.style.color = "red";
        erreurDiv.style.fontSize = "14px";

        enregistrerBtn.disabled = true;
      } else {
        erreurDiv.innerText = "Votre mot de passe est identique";
        erreurDiv.style.color = "blue";

        enregistrerBtn.disabled = false;
          }
        }
      });
    }
  });

  function confirmerEtRediriger() {
      if (confirm('Voulez-vous vraiment modifier ce produit ?')) {
        return true; // Laisse le bouton faire son travail
      } else {
        // Redirige si l'utilisateur refuse
        window.location.href = 'Liste_utilisateur.php';
        return false;
      }
    }
</script>

    
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom border-body sticky-top" style="background-color:white !important;">
  <div class="container">
    <a class="navbar-brand" href="#"><h2> <?= $sf ?></h2></a>

    <!-- Form Section -->
    <form action="Liste_utilisateur.php" method="post" class="d-flex flex-wrap justify-content-end align-items-center gap-2">
      
     
      
      <!-- UTILISATEUR Dropdown -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            UTILISATEUR
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="insertion_utilisateur.php" class="dropdown-item" style="text-decoration: none; font-family: arial;">CRER</a>
            </li>
            <li>
              <a href="Liste_utilisateur.php" class="dropdown-item" style="text-decoration: none; font-family: arial;">LISTE</a>
            </li>
          </ul>
        </li>
      </ul>
       <!-- PRODUIT Dropdown -->
       <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            PRODUIT
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="insertion_produit.php" class="dropdown-item" style="text-decoration: none; font-family: arial;">CRER</a>
            </li>
            <li>
              <a href="Liste_produit.php" class="dropdown-item" style="text-decoration: none; font-family: arial;">LISTE</a>
            </li>
          </ul>
        </li>
      </ul>
      
      <!-- DECONNECTER Button -->
      <button type="submit" name="deconnect" class="btn btn-danger">DECONNECTER</button>
    </form>
  </div>
</nav>

    <div class="head">    
        <div class="Insertion_produit">
        <?php if(isset($_GET['Insertion_utilisateur'])){ ?>
            <div data-aos="flip-left" data-aos-easing="ease-out-cubic">
                <h4>MODIFICATION UTILISATEUR</h4>
            </div>
            <div class="list">
                <form action="class.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($detail['ID']) ?>">

                    <div class="mb-3 row">
                        <label for="nom" class="col-sm-4 col-form-label">Nom <span style="color:red;">(*)</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nom" name="nom" value="<?= htmlspecialchars($detail['nom']) ?>" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="prenom" class="col-sm-4 col-form-label">Prénom <span style="color:red;">(*)</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="prenom" name="prenom" value="<?= htmlspecialchars($detail['prenom']) ?>" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="mdp" class="col-sm-4 col-form-label">Mot de passe <span style="color:red;">(*)</span></label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="mdp" name="mdp">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-sm-4 col-form-label">Adresse email <span style="color:red;">(*)</span></label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($detail['email']) ?>" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="contact" class="col-sm-4 col-form-label">Contact <span style="color:red;">(*)</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="contact" name="contact" value="<?= htmlspecialchars($detail['contact']) ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="adresse" class="col-sm-4 col-form-label">Adresse</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="adresse" name="adresse" value="<?= htmlspecialchars($detail['adresse']) ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="image" class="col-sm-4 col-form-label">Image </label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" id="image" name="image" value="<?= htmlspecialchars($detail['imag']) ?>">
                        </div>
                    </div>
<br>
                    <div>
                    <button type="submit" class="btn btn-info" style="color: white; text-decoration: none;"  name="update_utilisateur" onclick="return confirmerEtRediriger();" > Confirmer </button>

                        <a href="Liste_utilisateur.php" class="btn btn-danger">Retour</a>
                    </div>
                </form>
                <?php }else{ ?>
                  <div data-aos="flip-left" data-aos-easing="ease-out-cubic">
                  <h4>CREATION UTILISATEUR</h4>
              </div>
              <div class="list">
                <form action="isertion.php" method="POST" enctype="multipart/form-data">
                    <div class="container" data-aos="zoom-in-up"  data-aos-duration="3000">
                                                 
                          <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">NOM <span style="color:red;">(*)</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="inputPassword" name="nom" required>
                            </div>
                          </div>

                          <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">PRENOM <span style="color:red;">(*)</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="inputPassword" name="prenom" required>
                            </div>
                          </div>


                          <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">ADRESSE EMAIL <span style="color:red;">(*)</span></label>
                            <div class="col-sm-8">
                              <input type="email" class="form-control" id="inputPassword" name="email" required>
                            </div>
                          </div>

                          <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">CONTACTE <span style="color:red;">(*)</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="inputPassword" name="contact" required >
                            </div>
                          </div>

                          <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">ADRESSE </label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="inputPassword" name="adresse" required>
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label for="image" class="col-sm-4 col-form-label">IMAGE </label>
                            <div class="col-sm-8">
                              <input type="file" class="form-control" id="image" name="image" required>
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">MOT DE PASSE <span style="color:red;">(*)</span></label>
                            <div class="col-sm-8">
                              <input type="password" class="form-control" id="motDePasse" name="mdp" required>
                            </div>
                          </div>
                          
                          
                          <div class="erreur"></div>

                          
                          <div class="mb-3 row" id="confirmationkk" style="display: none;">
                          <label for="confirmationPassword" class="col-sm-4 col-form-label">CONFIRMATION <span style="color:red;">*</span></label>
                          <div class="col-sm-8">
                            <input type="password" class="form-control" id="confirmationPassword" name="confirmationk" required>
                          </div>
                        </div>
                    </div><br>
                    <div>
                          
                        <button id="enregistrerBtn" class="btn btn-info" name="Enregistrer" style="color: white; text-decoration: none;">ENREGISTRER</button>
                        
                        <a href="Liste_utilisateur.php" style="color: white; text-decoration: none;" class="btn btn-danger">Retour</a>                        
                        
                        
                    </div>
                </form>
              <?php };?>
            </div>
        </div>
    </div>

    <div style="background-color: aqua !important !important; padding:31px !important;">
    <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4"></div>
            <div class="col-sm-4"></div>
        </div>
</div>


    <script src="Voyage +Aos/Aos/dist/aos.js"></scrip>
    <script src="./scrip.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
</body>
</html>






