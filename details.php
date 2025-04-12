<?php
require('bdn.php');
require('autho.php');
Session();

if(isset($_GET['id'])){
    $id = $_GET['id'];
$utilisateur = $connexion->prepare('SELECT * FROM utilisateur WHERE id = :e');
$utilisateur->execute([
    "e" => $id,
]);
$tout = $utilisateur->fetch();
}

if(isset($_GET['idP'])){
    $id = $_GET['idP'];;
    $utilisateur = $connexion->prepare('SELECT * FROM produit WHERE id = :e');
    $utilisateur->execute([
      "e" => $id,
    ]);
    $tout = $utilisateur->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Voyage +Aos/Aos/dist/aos.css">
    <!-- <link rel="stylesheet" href="./style.css"> -->
    <link rel="stylesheet" href="./style3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <title>Personne</title>
</head>
<body>
    <div class="head">      
        <div  class="details">
            <?php if(isset($_GET['id'])){ ?>
                <div class="row">
                <div class="col-sm-6 img"><img src="./<?= $tout['imag'] ?>" alt="Image" class="custom-image"> </div>
                <div class="col-sm-6"> 
                                      
                    <span class="detail-label"><h3>NOM : </span><?= $tout['nom'] ?>
                    <P></P>
                    <span class="detail-label"><h3>PRENOM : </span><?= $tout['prenom'] ?> 
                    <P></P>                          
                    <span class="detail-label"><h3>TEL :</span> <?= $tout['contact'] ?> 
                    <P></P> 
                    <span class="detail-label"><h3>EMAIL :</span> <?= $tout['email'] ?> 
                    <P></P>
                    <span class="detail-label"><h3>ADRESSE :</span> <?= $tout['adresse'] ?> 
                    <P></P>
                    <span class="detail-label"><h3>TEL :</span> <?= $tout['contact'] ?> 
                    <P></P>
                    <h3>
                    <a href="Liste_utilisateur.php" style="color: white; text-decoration: none;" class="btn btn-danger"><i class="bi bi-arrow-left"></i> RETOUR</a>

                </div>
            </div>
            <?php }else{ ?>
                <div class="container-fluid">
                <div class="col-lg-10 col-md-12  text-center">
                    <h4 style="margin-left:13%;">DETAILS</h4>        
                </div><br>
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-md-12 details-container">
                        
                        <div class="detail-row">
                            <div class="detail-item detail-left">
                            <h3><span class="detail-label">NOM :</span> <?= $tout['nom'] ?></h3>
                            </div>
                            <div class="detail-item detail-right">
                            <h3><span class="detail-label">PRENOM :</span> <?= $tout['reference'] ?></h3>
                            </div>
                        </div>

                        <div class="detail-row">
                            <div class="detail-item detail-left">
                            <h3><span class="detail-label">TEL :</span> <?= $tout['categorie'] ?></h3>
                            </div>
                            <div class="detail-item detail-right">
                            <h3><span class="detail-label">EMAIL :</span> <?= $tout['fournisseur'] ?></h3>
                            </div>
                        </div>

                        <div class="detail-row">
                            <div class="detail-item detail-left">
                            <h3><span class="detail-label">ADRESSE :</span> <?= $tout['entrepot'] ?></h3>
                            </div>
                            <div class="detail-item detail-right">
                            <h3><span class="detail-label">TEL :</span> <?= $tout['codeBare'] ?></h3>
                            </div>
                        </div>

                        <div class="detail-row">
                            <div class="detail-item detail-left">
                            <h3><span class="detail-label">NOM :</span> <?= $tout['prix'] ?></h3>
                            </div>
                            <div class="detail-item detail-right">
                            <h3><span class="detail-label">PRENOM :</span> <?= $tout['lotSerie'] ?></h3>
                            </div>
                        </div>

                        <div class="detail-row">
                            <div class="detail-item detail-left">
                            <h3><span class="detail-label">TEL :</span> <?= $tout['matierPremier'] ?></h3>
                            </div>
                            <div class="detail-item detail-right">
                            <h3><span class="detail-label">EMAIL :</span> <?= $tout['produitFini'] ?></h3>
                            </div>
                        </div>

                        <div class="detail-row">
                            <div class="detail-item detail-left">
                            <h3><span class="detail-label">ADRESSE :</span> <?= $tout['zone'] ?></h3>
                            </div>
                            <div class="detail-item detail-right">
                            <h3><span class="detail-label">TEL :</span> <?= $tout['datePeremption'] ?></h3>
                            </div>
                        </div>

                        <div class="detail-row">
                            <div class="detail-item detail-left">
                            <h3><span class="detail-label">EMAIL :</span> <?= $tout['dateFabrication'] ?></h3>
                            </div>
                            <div class="detail-item detail-right">
                            <h3><span class="detail-label">ADRESSE :</span> <?= $tout['produit'] ?></h3>
                            </div>
                        </div>

                        <div class="detail-row">
                            <div class="detail-item detail-left">
                            <h3><span class="detail-label">TEL :</span> <?= $tout['stock'] ?></h3>
                            </div>
                        </div>

                        <div class="detail-row">
                            
                        </div>
                        <div class="col-lg-10 col-md-12  text-center">
                            
                            <a href="Liste_produit.php" class="btn btn-danger">
                            <i class="bi bi-arrow-left"></i> RETOUR
                            </a>        
                        </div>
                            
                        </div>
                    </div>
                </div>

            <?php } ?>

            
        </div>
    </div>

    <script src="Voyage +Aos/Aos/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
</body>
</html>