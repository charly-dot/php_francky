<?php
require_once('bdn.php');

$connexion = new PDO('mysql:host=localhost;dbname=test_francky', 'root', '');
$id = $_POST['id'] ?? null;
$nom = $_POST['nom'] ?? null;
$prenom = $_POST['prenom'] ?? null;
$contact = $_POST['contact'] ?? null;
$mdp = $_POST['mdp'] ?? null;
$email = $_POST['email'] ?? null;
$adresse = $_POST['adresse'] ?? null;
$button1 = $_POST['update_utilisateur'] ?? null;
$image = $_FILES['image'] ?? null;



class affichage { 
    public function __construct($id) {  
        $this->id = $id; 
    }

    function recherche() {
        global $connexion;
        $produits = $connexion->prepare('SELECT fournisseur, categorie, entrepot  FROM produit');
        $produits->execute();
        $resultats = $produits->fetchAll();
        return $resultats;
    }

   function recherche_id() {
    global $connexion;
    $utilisateur = $connexion->prepare('SELECT * FROM produit WHERE id = :id');
    $utilisateur->execute(['id' => $this->id]);
    $detail = $utilisateur->fetch(PDO::FETCH_ASSOC);

    if (!$detail) {
        echo "Utilisateur non trouvé.";
        exit;
    }
    return $detail; // <-- correction ici
}
}






class update{

    public function __construct($nom, $prenom, $contact, $mdp, $email, $adresse, $button1, $connexion, $id, $image){

        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->contact = $contact;
        $this->mdp = $mdp;
        $this->email = $email;
        $this->adresse = $adresse;
        $this->button1 = $button1;
        $this->connexion = $connexion;
        $this->id = $id;
        $this->image = $image;
        
    }
    function utilisateur(){
        if(isset($this->button1)){
            
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                echo "<script>document.location='Liste_utilisateur.php'</script>";
                exit; 
            }
    
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                
                $imageName = uniqid() . "_" . basename($this->image['name']);
                $imagePath = 'uploads/' . $imageName;
    
                if (move_uploaded_file($this->image['tmp_name'], $imagePath)) {
    
                } 
            } else {
                $imageName = uniqid() . "_" . basename($this->image['name']);
                $imagePath = 'uploads/' . " ";
                
            }
    
            $insert = $this->connexion->prepare('UPDATE utilisateur SET nom = :nom, prenom = :prenom, mdp = :mdp, email = :email, contact = :contact, adresse = :adresse, imag = :imag WHERE id = :id');$insert->bindValue(':nom', $this->nom, PDO::PARAM_STR);
            $insert->bindValue(':prenom', $this->prenom, PDO::PARAM_STR);
            $insert->bindValue(':mdp', $this->mdp, PDO::PARAM_STR);
            $insert->bindValue(':email', $this->email, PDO::PARAM_STR);
            $insert->bindValue(':contact', $this->contact, PDO::PARAM_STR);
            $insert->bindValue(':adresse', $this->adresse, PDO::PARAM_STR);
            $insert->bindValue(':imag', $imagePath, PDO::PARAM_STR); 
            $insert->bindValue(':id', $this->id, PDO::PARAM_STR);
            
            if ($insert->execute()) {
                echo "<script>document.location='Liste_utilisateur.php'</script>";
            } 
       

        }
        
            
   
    
    }
    
}
$update = new update($nom, $prenom, $contact, $mdp, $email, $adresse, $button1, $connexion, $id, $image);
$update->utilisateur();
?>
