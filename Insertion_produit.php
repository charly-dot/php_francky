<?php

require('class.php');
require('autho.php');

$sf = Session();
if(isset($_GET['id'])){
  $id = $_GET['id'];

  $select = new affichage($id);
  $tout = $select->recherche();

  $touts = $select->recherche_id();

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
    <title>INSERTION DE PRODUIT</title>
  <script>
    function confirmerEtRediriger() {
      if (confirm('Voulez-vous vraiment modifier ce produit ?')) {
        return true; // Laisse le bouton faire son travail
      } else {
        // Redirige si l'utilisateur refuse
        window.location.href = 'Liste_produit.php';
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
            
            <div class="list">
              <form action="traitement.php" method="POST">
              
              <?php if(isset($_GET['id'])){ ?>
                <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="3000">
                <div data-aos="flip-left" data-aos-easing="ease-out-cubic"><h4>MODIFICATION PRODUIT</h4></div><br>

                <input type="hidden" class="form-control" id="REFERENCE" name="id_update" value="<?= htmlspecialchars($touts['id']) ?>">
                                                    

                                                  <div class="mb-3 row">
                                                     <label for="REFERENCE" class="col-sm-4 col-form-label">NOM </label>
                                                     <div class="col-sm-8">
                                                       <input type="text" class="form-control" id="REFERENCE" name="nom" value="<?= htmlspecialchars($touts['nom']) ?>" disabled>
                                                     </div>
                                                   </div>

                                                   <div class="mb-3 row">
                                                     <label for="fournisseur" class="col-sm-4 col-form-label">STOCK INITIAL </label>
                                                     <div class="col-sm-8">
                                                       <input type="text" class="form-control" id="fournissur" name="stock" value="<?= htmlspecialchars($touts['stock']) ?>" disabled>
                                                     </div>
                                                   </div> 
                         
                                                   <div class="mb-3 row">
                                                     <label for="REFERENCE" class="col-sm-4 col-form-label">REFERENCE </label>
                                                     <div class="col-sm-8">
                                                       <input type="text" class="form-control " id="REFERENCE" name="reference" value="<?= htmlspecialchars($touts['reference']) ?>" >
                                                     </div>
                                                   </div>
                         
                                                   
                                                     
                                                   <div class="row">
                                                     <div class="col-sm-4">
                                                       <label for="categorie" class="form-label">CATEGORIE</label>
                                                       <select class="form-select" name="categorie_selecte" id="categorie">
                                                         <option value="Électronique">Électronique</option>
                                                           <option value="Alimentaire">Alimentaire</option>
                                                           <option value="Bâtiment">Bâtiment</option>
                                                       </select>
                                                     </div>
                         
                                                     <div class="col-sm-4">
                                                       <label for="categorie" class="form-label">ENTREPOT</label>
                                                       <select class="form-select" name="entrepot_select" id="categorie">
                                                           <option value="Entrepôt Central">Entrepôt Central</option>
                                                           <option value="Entrepôt Nord">Entrepôt Nord</option>
                                                           <option value="Entrepôt Sud">Entrepôt Sud</option>
                                                       </select>
                                                     </div>
                         
                                                     <div class="col-sm-4">
                                                       <label for="categorie" class="form-label">FOURNISSEUR</label>
                                                         <input type="text" class="form-control " name="fournisseur_select" value="<?= htmlspecialchars($touts['fournisseur']) ?>" disabled>
                                                    
                                                     </div>
                                                    </div>
                         
                                                    <!-- champs pour le fournniseur -->
                                                   <div class="mb-3 row">
                         
                                                   <div style="display: inline-flex; align-items: center; gap: 10px; margin-top:20px;">
                                                     <div class="col-sm-4">
                                                     <label for="categorie" >ZONE</label>
                                                     </div>
                                                     <div class="col-sm-8">
                                                         <select  class="form-select" name="zone" id="ZONE">
                                                         <option value="zone_1">ZONE 1</option>
                                                         <option value="zone_2">ZONE 2</option>
                                                         <option value="zone_3">ZONE 3</option>
                                                       </select>
                                                     </div>
                                                     </div>
                                                   </div>
                         
                                                   <!-- fin champs pour le fournniseur -->
                         
                         
                                                   <br><div class="mb-3 row">
                                                         <a href="#" id="toggleFacultatif"> Autre champs facultatifs</a>                            
                                                   </div>
                                                  <!-- facultatif -->
                                                  <div class="mb-3 row" id="facultatifField" style="display: none;">
                                                   <div class="mb-3 row">
                                                     <div class="col-sm-4">
                                                         <input type="text" class="form-control" placeholder="CODE BARE" name="code_bare" value="<?= htmlspecialchars($touts['codeBare']) ?>">
                                                       </div>
                                                       <div class="col-sm-4">
                                                         <input type="text" class="form-control" placeholder="PRIX" name="prix" value="<?= htmlspecialchars($touts['prix']) ?>">
                                                       </div>
                                                       <div class="col-sm-4">
                                                         <input type="text" class="form-control"  placeholder=" PRODUIT FINIT" id="produit" name="finit" value="<?= htmlspecialchars($touts['produitFini']) ?>">
                                                       </div>
                         
                                                       <div class="row" style="margin-top:6px;">
                                                         <div class="col-sm-6">
                                                           <input type="text" class="form-control" placeholder="MATIER PREMIER" id="finit" name="produit" value="<?= htmlspecialchars($touts['matierPremier']) ?>">
                                                         </div>
                                                         <div class="col-sm-6">
                                                           <input type="text" class="form-control" name="lot_serie" placeholder="LOT/SERIE" value="<?= htmlspecialchars($touts['lotSerie']) ?>">
                                                         </div>
                                                         <!-- champ de date -->
                                                       <div id="date" style="display: none;">
                                                         <div class="row" style="margin-top:6px;">
                                                           <div class="col-sm-6">
                                                               
                                                             <input type="date" class="form-control" name="date_peremption" placeholder="Date de péremption" value="<?= htmlspecialchars($touts['datePeremption']) ?>">
                                                           </div>
                                                           <div class="col-sm-6"> 
                                                             <input type="date" class="form-control" name="date_fabrication" placeholder="Date de fabrication" value="<?= htmlspecialchars($touts['dateFabrication']) ?>">
                                                           </div>
                                                         </div>
                                                       </div>  
                                                       <!-- fin champ de date -->
                                                       </div> 
                                                     </div>
                                                   </div>
                                                 <!--fin facultatif -->              
                          
                                   
                                                   <div class="pt-3">
                                                   <button type="submit" class="btn btn-primary"  style="color: white; text-decoration: none;"  name="update_produit" onclick="return confirmerEtRediriger();"> Confirmer </button>
                                                    <a href="Liste_produit.php" style="color: white; text-decoration: none;" class="btn btn-danger">ANNULER</a>                        
                                                   </div>
                                       
              <?php } else{?>
                <div data-aos="flip-left" data-aos-easing="ease-out-cubic"><h2>CREATION PRODUIT</h2></div>
                <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="3000"><br>
                                                 
                        <div class="mb-3 row">
                            <label for="nom" class="col-sm-4 col-form-label">NOM<span style="color:red;"> (*)</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="nom" name="nom" required>
                            </div>
                          </div>

                          <div class="mb-3 row">
                            <label for="REFERENCE" class="col-sm-4 col-form-label">REFERENCE<span style="color:red;"> (*)</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="REFERENCE" name="reference" required>
                            </div>
                          </div>

                          
                          <div class="mb-3 row">
                            <label for="fournisseur" class="col-sm-4 col-form-label">STOCK INITIAL<span style="color:red;"> (*)</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="fournissur" name="stock" required>
                            </div>
                          </div>    
                          <div class="row">
                            <div class="col-sm-4">
                              <label for="categorie" class="form-label">CATEGORIE</label>
                              <select class="form-select" name="categorie_selecte" id="categorie">
                                <option value="Électronique">Électronique</option>
                                  <option value="Alimentaire">Alimentaire</option>
                                  <option value="Bâtiment">Bâtiment</option>
                              </select>
                            </div>

                            <div class="col-sm-4">
                              <label for="categorie" class="form-label">ENTREPOT</label>
                              <select class="form-select" name="entrepot_select" id="categorie">
                                  <option value="Entrepôt Central">Entrepôt Central</option>
                                  <option value="Entrepôt Nord">Entrepôt Nord</option>
                                  <option value="Entrepôt Sud">Entrepôt Sud</option>
                              </select>
                            </div>

                            <div class="col-sm-4">
                              <label for="categorie" class="form-label">FOURNISSEUR<span style="color:red;"> (*)</span></label>
                              <select class="form-select" name="fournisseur_select"  id="fournisseur" required> 
                                  <option ></option>                               
                                  <option value="Global Supply Co.">Global Supply Co.</option>
                                  <option value="ransAfrica Logistics">ransAfrica Logistics</option>
                                  <option value="Eco Matériel SARL">Eco Matériel SARL</option>
                                  <option value="Fournipro Distribution">Fournipro Distribution</option>
                                  <option value="FastTrade International">FastTrade International</option>
                              </select>
                            </div>
                           </div>

                           <!-- champs pour le fournniseur -->
                          <div class="mb-3 row" id="additionalField" style="display: none;">
                            <div style="display: inline-flex; align-items: center; gap: 10px; margin-top:20px;">
                              <div class="col-sm-4">
                                <label for="categorie" >ZONE</label>
                              </div>
                              <div class="col-sm-8">
                                  <select  class="form-select" name="zone" id="ZONE">
                                    <option value="zone_1">ZONE 1</option>
                                    <option value="zone_2">ZONE 2</option>
                                    <option value="zone_3">ZONE 3</option>
                                  </select>
                              </div>
                            </div>
                          </div>
                          <br>
                         

                          <!-- fin champs pour le fournniseur -->


                          <div class="mb-3 row">
                                <a href="#" id="toggleFacultatif"> Autres champs facultatifs</a>                            
                          </div>
                         <!-- facultatif -->
                         <div class="mb-3 row" id="facultatifField" style="display: none;">
                          <div class="mb-3 row">
                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="CODE BARE" name="code_bare">
                              </div>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="PRIX" name="prix">
                              </div>
                              <div class="col-sm-4">
                                <input type="text" class="form-control"  placeholder=" PRODUIT FINIT" id="produit" name="finit">
                              </div>

                              <div class="row" style="margin-top:6px;">
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" placeholder="MATIER PREMIER" id="finit" name="produit">
                                </div>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" name="lot_serie" placeholder="LOT ET SERIE" >
                                </div><br>
                                <!-- champ de date -->
                              <div id="date" style="display: none;">
                              <br>
                                <div class="row" style="margin-top:6px;">
                                  <div class="col-sm-6">
                                      <label for="">Date de péremption</label>
                                    <input type="date" class="form-control" name="date_peremption" placeholder="Date de péremption">
                                  </div>
                                  <div class="col-sm-6"> 
                                  <label for="">Date de fabrication</label>
                                    <input type="date" class="form-control" name="date_fabrication" placeholder="Date de fabrication">
                                  </div>
                                </div>
                              </div>  
                              <!-- fin champ de date -->
                              </div> 
                            </div>
                          </div>
                        <!--fin facultatif -->              
 
                          
                          <div class="pt-3">
                            <button type="submit" class="btn btn-info" style="color: white; text-decoration: none;" name="enregistrement_produit">ENREGISTRER</button>
                            <a href="Liste_produit.php" style="color: white; text-decoration: none;" class="btn btn-danger">ANNULER</a>                        
                          </div>
              
              <?php }?>


                   
                       
              </form>
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
   


    <script src="./scrip.js"></script>
    <script src="Voyage +Aos/Aos/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>