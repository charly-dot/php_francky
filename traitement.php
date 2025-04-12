<?php
// Connexion à la base de données
$connexion = new PDO('mysql:host=localhost;dbname=test_francky', 'root', '');

// update utilisateur

$enregistrement_produit = $_POST['enregistrement_produit'] ?? null;
$nom = $_POST['nom'] ?? null;
$prenom = $_POST['prenom'] ?? null;
$contact = $_POST['contact'] ?? null;
$mdp = $_POST['mdp'] ?? null;
$email = $_POST['email'] ?? null;
$adresse = $_POST['adresse'] ?? null;


// Récupération des données du formulaire
$enregistrement_produit = $_POST['enregistrement_produit'] ?? null;
$nom = $_POST['nom'] ?? null;
$reference = $_POST['reference'] ?? null;
$stock = $_POST['stock'] ?? null;
$zone = $_POST['zone'] ?? null;
$entrepot = $_POST['entrepot'] ?? null;
$code_bare = $_POST['code_bare'] ?? null;
$prix = $_POST['prix'] ?? null;
$finit = $_POST['finit'] ?? null;
$produit = $_POST['produit'] ?? null;
$lot_serie = $_POST['lot_serie'] ?? null;
$date_peremption = $_POST['date_peremption'] ?? null;
$date_fabrication = $_POST['date_fabrication'] ?? null;
$categorie_selecte = $_POST['categorie_selecte'] ?? null;
$entrepot_select = $_POST['entrepot_select'] ?? null;
$fournisseur_select = $_POST['fournisseur_select'] ?? null;
$id_update = $_POST['id_update'] ?? null;
$update_produit = $_POST['update_produit'] ?? null;




class Insertion {
    private $enregistrement_produit, $nom, $reference,  $zone, $entrepot, $prix;
    private $finit, $lot_serie, $date_peremption, $date_fabrication, $connexion, $code_bare;
    private $produit, $categorie_selecte, $entrepot_select, $fournisseur_select,$stock, $id_update, $update_produit;
    
    public function __construct($connexion, $enregistrement_produit, $nom, $reference, $zone, $entrepot, $prix, $finit, $lot_serie, $date_peremption, $date_fabrication, $code_bare, $produit, $categorie_selecte, $entrepot_select, $fournisseur_select, $stock,  $id_update, $update_produit) {
        $this->connexion = $connexion;
        $this->enregistrement_produit = $enregistrement_produit;
        $this->nom = $nom;
        $this->reference = $reference;
       
        
        $this->zone = $zone;
        $this->entrepot = $entrepot;
        $this->prix = $prix;
        $this->finit = $finit;
        $this->lot_serie = $lot_serie;
        $this->date_peremption = $date_peremption;
        $this->date_fabrication = $date_fabrication;
        $this->code_barre = $code_bare;
        $this->produit = $produit;
        $this->categorie_selecte = $categorie_selecte;
        $this->entrepot_select = $entrepot_select;
        $this->fournisseur_select = $fournisseur_select;
        $this->stock = $stock;
        $this->id_update = $id_update;
        $this->update_produit = $update_produit;
        
    }

    public function insertion() {
        if (isset($this->enregistrement_produit)) {
            $insert = $this->connexion->prepare('
                INSERT INTO produit (
                    nom, reference, categorie, fournisseur, entrepot, codeBare, prix,
                    lotSerie, matierPremier, produitFini, zone, datePeremption, dateFabrication, produit, stock
                ) VALUES (
                    :nom, :reference, :categorie, :fournisseur, :entrepot, :codeBare, :prix,
                    :lotSerie, :matierPremier, :produitFini, :zone, :datePeremption, :dateFabrication, :produit, :stock
                )
            ');
    
            $insert->bindValue(':nom', $this->nom, PDO::PARAM_STR);
            $insert->bindValue(':reference', $this->reference, PDO::PARAM_STR);
            $insert->bindValue(':categorie', $this->categorie_selecte, PDO::PARAM_STR);
            $insert->bindValue(':fournisseur', $this->fournisseur_select, PDO::PARAM_STR);
            $insert->bindValue(':entrepot', $this->entrepot_select, PDO::PARAM_STR);
            $insert->bindValue(':codeBare', $this->code_barre, PDO::PARAM_STR);
            $insert->bindValue(':prix', $this->prix, PDO::PARAM_STR);
            $insert->bindValue(':lotSerie', $this->lot_serie, PDO::PARAM_STR);
            $insert->bindValue(':matierPremier', $this->lot_serie, PDO::PARAM_STR); 
            $insert->bindValue(':produitFini', $this->finit, PDO::PARAM_STR);
            $insert->bindValue(':zone', $this->zone, PDO::PARAM_STR);
            $insert->bindValue(':datePeremption', $this->date_peremption, PDO::PARAM_STR);
            $insert->bindValue(':dateFabrication', $this->date_fabrication, PDO::PARAM_STR);
            $insert->bindValue(':produit', $this->produit, PDO::PARAM_STR);
            $insert->bindValue(':stock', $this->stock, PDO::PARAM_STR);
    
            if ($insert->execute()) {
                echo "<script>document.location='Liste_produit.php'</script>";
            } else {
                echo "<script>document.location='Insertion_produit.php'</script>";
            }
        } else if (isset($this->update_produit))  {
            
            $insert = $this->connexion->prepare('
            UPDATE produit SET 
                nom = :nom, reference = :reference, categorie = :categorie, fournisseur = :fournisseur,
                entrepot = :entrepot, codeBare = :codeBarre, prix = :prix, lotSerie = :lotSerie, 
                matierPremier = :matierePremiere, produitFini = :produitFini, zone = :zone, 
                datePeremption = :datePeremption, dateFabrication = :dateFabrication, produit = :produit,
                stock = :stock 
            WHERE id = :id_update
        ');
        
        $insert->bindValue(':nom', $this->nom, PDO::PARAM_STR);
        $insert->bindValue(':reference', $this->reference, PDO::PARAM_STR);
        $insert->bindValue(':categorie', $this->categorie_selecte, PDO::PARAM_STR);
        $insert->bindValue(':fournisseur', $this->fournisseur_select, PDO::PARAM_STR);
        $insert->bindValue(':entrepot', $this->entrepot_select, PDO::PARAM_STR);
        $insert->bindValue(':codeBarre', $this->code_barre, PDO::PARAM_STR);
        $insert->bindValue(':prix', $this->prix, PDO::PARAM_STR); // ou PARAM_INT selon le type
        $insert->bindValue(':lotSerie', $this->lot_serie, PDO::PARAM_STR);
        $insert->bindValue(':matierePremiere', $this->lot_serie, PDO::PARAM_STR); // corrigé
        $insert->bindValue(':produitFini', $this->finit, PDO::PARAM_STR);
        $insert->bindValue(':zone', $this->zone, PDO::PARAM_STR);
        $insert->bindValue(':datePeremption', $this->date_peremption, PDO::PARAM_STR);
        $insert->bindValue(':dateFabrication', $this->date_fabrication, PDO::PARAM_STR);
        $insert->bindValue(':produit', $this->produit, PDO::PARAM_STR);
        $insert->bindValue(':stock', $this->stock, PDO::PARAM_STR); // ou PARAM_INT
        $insert->bindValue(':id_update', $this->id_update, PDO::PARAM_INT);
        
        if ($insert->execute()) {
            echo "<script>document.location='Liste_produit.php'</script>";
        } else {
            echo "<script>document.location='Insertion_produit.php'</script>";
            // Pour debug : print_r($insert->errorInfo());
        }
        
            
        }else {
            echo "<script>document.location='Insertion_produit.php'</script>";
        }
    }
    
}


$activer = $_POST['activer'] ?? null;
$desactiver = $_POST['desactiver'] ?? null;
$id = $_POST['id_utilisateur'] ?? null;

class Update {

    private $desactiver;
    private $activer;
    private $id;
    private $connexion;

    public function __construct($desactiver, $activer, $id, $connexion){
        $this->desactiver = $desactiver;
        $this->activer = $activer;
        $this->id = $id;
        $this->connexion = $connexion;
    }

    public function update_bouton(){
        if ($this->activer !== null) {
            $stmt = $this->connexion->prepare("UPDATE utilisateur SET type = 1 WHERE ID = :id");
            $stmt->execute(['id' => $this->id]);
            echo "<script>alert('Utilisateur activé'); window.location.href='Liste_utilisateur.php';</script>";
        }

        if ($this->desactiver !== null) {
            $stmt = $this->connexion->prepare("UPDATE utilisateur SET type = 0 WHERE ID = :id");
            $stmt->execute(['id' => $this->id]);
            echo "<script>alert('Utilisateur désactivé'); window.location.href='Liste_utilisateur.php';</script>";
        }
    }
}

// Exécution de la classe
$update = new Update($desactiver, $activer, $id, $connexion);
$update->update_bouton();


$insertion = new Insertion(
    $connexion,
    $enregistrement_produit,
    $nom,
    $reference,
    $zone,
    $entrepot,
    $prix,
    $finit,
    $lot_serie,
    $date_peremption,
    $date_fabrication,
    $code_bare,
    $produit,
    $categorie_selecte,
    $entrepot_select,
    $fournisseur_select,
    $stock,
    $id_update,
    $update_produit
);

$insertion->insertion();
?>
