<?php
require_once('bdn.php');
session_start();

// $NOM = $_POST['nom'];
// $PSS = $_POST['mdp'];



function hhh($NOM,$PSS) {
    global $connexion;

    if (!isset($_SESSION['maxTries'])) {
        $_SESSION['maxTries'] = 5;
    }

    if(!empty($NOM) && !empty($PSS)){
        $email = $connexion->prepare('SELECT * FROM utilisateur WHERE  email = :a');
        $email->execute([
            "a" => $NOM,
        ]);
        $email = $email->fetch();

        $utilisateur = $connexion->prepare('SELECT * FROM utilisateur WHERE mdp = :e AND nom = :a');
        $utilisateur->execute([
            "e" => $PSS,
            "a" => $NOM,
        ]);
        $tout = $utilisateur->fetch();
         var_dump($email["email"] . "fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff");
        // var_dump($email);
        
        if ($tout != [] || $email != []) {

            if($tout['type'] != false || $email['type'] != false){

                $_SESSION['maxTries'] = 15;
                $_SESSION['user'] = [ 
                    'logines' => $NOM, 
                    'mdp' => $PSS 
                ];
                // var_dump($email['type']);
                echo "<script>document.location='Liste_utilisateur.php'</script>";

            }else if ($_SESSION['maxTries'] <= 0) {
                return "email";
                // var_dump($email['type']);  
            }else{
                return "formulaire";
                // var_dump($email['type']);
            }
      

        } else {

            $_SESSION['maxTries']--;
            if ($_SESSION['maxTries'] <= 0) {
                return "email";
            }
            if ($_SESSION['maxTries'] <= 2 AND $_SESSION['maxTries'] >= 2) {
                echo "<script>alert('VOUS AVEZ UNE SEUL S');</script>";
            }
            return "vide";
        } 
       
       
    }else{ 
        $_SESSION['maxTries']--;
        if ($_SESSION['maxTries'] <= 2 AND $_SESSION['maxTries'] >= 2) {
            echo "<script>alert('VOUS AVEZ UNE SEUL TENTATIVE');</script>";

        }
        if ($_SESSION['maxTries'] <= 0) {
            return "email";
        }
        return "formulaire";       
    } 
}




class affichage {
    
    public function __construct() {
       
    }

    function recherche() {
        global $connexion;
        $produits = $connexion->prepare('SELECT fournisseur, categorie, entrepot  FROM produit');
        $produits->execute();
        $resultats = $produits->fetchAll();
        return $resultats;
    }
  
}

// Appel de la fonction après sa définition





?>
