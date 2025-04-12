<?php 
require('bdn.php');
require('autho.php');
$sf = Session();


if (isset($_POST['recherche_button'])) {

  $nom = $_POST['recherche_input'] ?? ''; 
  $utilisateur = $connexion->prepare('SELECT * FROM produit WHERE nom LIKE :nom');
  $utilisateur->execute(["nom" => "%$nom%"]);
  $tout = $utilisateur->fetchAll();

} else {

  $tout = recherche();

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>LISTE DES PRODUITS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom border-body sticky-top" style="background-color:white !important;">
  <div class="container ">
    <!-- Logo / Brand -->
    <a class="navbar-brand" href="#"><h2 class="mb-0"><?= $sf ?></h2></a>

    <!-- Bouton burger pour petit écran -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
      aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Contenu collapsible -->
    <div class="collapse navbar-collapse liste_navbar" id="navbarContent">
      <form action="Liste_produit.php" method="post" class="ms-auto w-100 w-lg-auto">
        <div class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center gap-3 formul w-100">
          
          <!-- Dropdown UTILISATEUR -->
          <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">UTILISATEUR</a>
            <ul class="dropdown-menu">
              <li><a href="Liste_utilisateur.php" class="dropdown-item">LISTE</a></li>
              <li><a href="insertion_utilisateur.php" class="dropdown-item">CRÉER</a></li>
            </ul>
          </div>

          <!-- Dropdown PRODUIT -->
          <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">PRODUIT</a>
            <ul class="dropdown-menu">
              <li><a href="Liste_produit.php" class="dropdown-item">LISTE</a></li>
              <li><a href="insertion_produit.php" class="dropdown-item">CRÉER</a></li>
            </ul>
          </div>

          <!-- Déconnexion -->
          <button type="submit" name="deconnect" class="btn btn-danger">DÉCONNECTER</button>
        </div>
      </form>
    </div>
  </div>
</nav>



<div class="head2">   

        <!-- liste_ulilisateur sur le style     -->
        
              


        <div class="liste_ulilisateur">
        <div class="row align-items-center">
          <form aaction="Liste_produit.php" method="post" class="d-flex w-100">
            <div class="col-md-8">
              <h4>LISTE DES PRODUIS</h4>
            </div>

            <div class="input-group col-md-3 recherch" style="max-width: 250px;">
              <input type="text" class="form-control" placeholder="Recherche..." name="recherche_input">
              <button class="btn btn-info" type="submit" name="recherche_button">
                <i class="bi bi-search"></i>
              </button>

            </div>
            <div class="input-group col-md-1 recherch" style="max-width: 250px; margin-left:2px;">
            
              
                <a href="Insertion_produit.php" class="btn-info btn"><i class="bi bi-plus-circle"></i></a>
              
              
            </div>
          </form>
        </div>

           
            <!-- navbar -->
            <div data-aos="flip-left" data-aos-easing="ease-out-cubic">
            <div class="row align-items-center">
           
           
          </div>
            <!-- fin navbar -->
            <div>
                <form action="">
                    <div data-aos="zoom-in"  data-aos-duration="3000">
                        <table class="table table-container">
                            <thead>
                              <tr>

                                <th scope="col">NOM</th>
                                <th scope="col">REFERENCE</th>
                                <th scope="col">CATEGORIE</th>
                                <th scope="col">FOURNISSEUR</th>
                                
                                
                                <th scope="col">PRIX</th>
                                
                                <th scope="col"></th>
                              </tr>
                            </thead>
                            
                              <tbody>
                                <?php foreach($tout as $tous): ?>
                                  <tr>

                                    <td><?= $tous['nom'] ?></td>
                                    <td><?= $tous['reference'] ?></td>
                                    <td><?= $tous['categorie'] ?></td>
                                    <td><?= $tous['fournisseur'] ?></td>
                                    <td><?= $tous['prix'] ?></td>
                                    <td> 
                                   <a href="Insertion_produit.php?id=<?= $tous['id'] ?>"class="btn btn-success text-white">
                                   <i class="bi bi-pen"></i>
                                    </a>

                                    <a href="suppression.php?suppression_produit=<?= $tous['id'] ?>" 
                                      class="btn btn-danger text-white"
                                      onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                                      <i class="bi bi-trash"></i>
                                    </a>

                                    <a href="details.php?idP=<?= $tous['id'] ?>" 
                                      class="btn btn-warning text-white">
                                      <i class="bi bi-eye"></i>
                                    </a>
                                  </tr>
                                <?php endforeach; ?>
                              </tbody>
                             
                          </table>

                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div> 
 
    
<div style="background-color: aqua !important ; padding:31px !important; margin-top:3%;">
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