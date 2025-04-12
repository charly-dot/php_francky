<?php
require('bdn.php');
require('autho.php');

$sf = Session();
var_dump($sf);




if (isset($_POST['recherche_button'])) {

    $nom = $_POST['recherche_input'] ?? ''; 
    $utilisateur = $connexion->prepare('SELECT * FROM utilisateur WHERE nom LIKE :nom');
    $utilisateur->execute(["nom" => "%$nom%"]);
    $tout = $utilisateur->fetchAll();
  
  } else {
  
    $tout = recherche_utilisateur();
  
  }


if(isset($_POST['deconnect'])){
    // Détruire la session et rediriger
    session_unset(); // Libère toutes les variables de session
    session_destroy(); // Détruit la session
    // header('Location: index.php');
    echo "<script>document.location='index.php'</script>";
    exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Voyage +Aos/Aos/dist/aos.css">
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>LISTE UTILISATEUR</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

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
    
<div class="head2">
    <div class="liste_ulilisateur">
      <h4>LISTE DES UTILISATEURS</h4>
      <div>
      <div data-aos="zoom-in"  data-aos-duration="3000">
          <table class="table table-container" >
              <thead>
                  <tr>
                      
                      <th scope="col">NOM</th>
                      <th scope="col">PRENOM</th>
                      <th scope="col">ADRESSE EMAIL</th>
                      <th scope="col">CONTACTE</th>
                      <th scope="col"></th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach($tout as $tous): ?>
                  <tr>

                      <td><?= $tous['nom'] ?></td>
                      <td><?= $tous['prenom'] ?></td>
                      <td><?= $tous['email'] ?></td>
                      <td>+261<?= $tous['contact'] ?></td>
                      <td class="d-flex flex-wrap gap-1">
                          <a href="details.php?id=<?= $tous['ID'] ?>" class="btn btn-warning text-white"><i class="bi bi-eye"></i></a>
                          <a href="Insertion_utilisateur.php?Insertion_utilisateur=<?= $tous['ID'] ?>"
                          class="btn btn-success text-white">
                          <i class="bi bi-pen"></i>
                        </a>

                          <a href="suppression.php?suppression_utilisateur=<?= $tous['ID'] ?>"
                            class="btn btn-danger text-white"
                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                            <i class="bi bi-trash"></i>
                          </a>
                          <!-- Formulaire d’activation/désactivation -->
                          <form action="traitement.php" method="post" class="d-inline">
                              <input type="hidden" name="id_utilisateur" value="<?= $tous['ID'] ?>">
                              <?php if ($tous['type'] == 0): ?>
                                  <button type="submit" name="activer" class="btn btn-secondary"><i class="bi bi-skip-end-fill"></i></button>
                              <?php else: ?>
                                  <button type="submit" name="desactiver" class="btn btn-secondary"><i class="bi bi-stop-circle"></i></button>
                              <?php endif; ?>
                          </form>
                      </td>
                  </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
      </div>

      
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

    <?php 
     require('footer.php');
    ?>
    <script src="Voyage +Aos/Aos/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
