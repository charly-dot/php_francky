<?php

require('bdn.php');
require('autho.php');
Session();

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$contact = $_POST['contact'];
$mdp = $_POST['mdp'];
$email = $_POST['email'];
$adresse = $_POST['adresse'];
$CONFIRMATION = $_POST['confirmationk'];


if (isset($_POST['Enregistrer'])) {

   if(($mdp) == ($CONFIRMATION)){
    if (!empty($nom) && !empty($prenom) && !empty($contact) && !empty($mdp) && !empty($email) && !empty($adresse)) {
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>document.location='Liste_utilisateur.php'</script>";
            exit;
        }

        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            
            $imageName = uniqid() . "_" . basename($_FILES['image']['name']);
            $imagePath = 'uploads/' . $imageName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {

            } else {
                echo ("nsdf");
                // echo "<script>document.location='insertion_utilisateur.php'</script>";
                exit; 
            }
        } else {
            echo "Aucune image téléchargée ou erreur pendant l'upload.";
            exit; 
        }

        $insert = $connexion->prepare('INSERT INTO utilisateur(id, nom, prenom, mdp, email, contact, adresse, imag, type)VALUES(NULL, :nom, :prenom, :mdp, :email, :contact, :adresse, :imag, :type)');
        $insert->bindValue(':nom', $nom, PDO::PARAM_STR);
        $insert->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $insert->bindValue(':mdp', $mdp, PDO::PARAM_STR);
        $insert->bindValue(':email', $email, PDO::PARAM_STR);
        $insert->bindValue(':contact', $contact, PDO::PARAM_STR);
        $insert->bindValue(':adresse', $adresse, PDO::PARAM_STR);
        $insert->bindValue(':imag', $imagePath, PDO::PARAM_STR); 
        $insert->bindValue(':type', 0, PDO::PARAM_STR); 
        if ($insert->execute()) {
            echo "<script>document.location='Liste_utilisateur.php'</script>";
        } else {
            echo "<script>document.location='Liste_utilisateur.php'</script>";
        }
    } else {
        echo "<script>document.location='Liste_utilisateur.php'</script>";
    }
   }else{
    echo "<script>document.location='insertion_utilisateur.php'</script>";
   }
} else {
    echo "<script>document.location='Liste_utilisateur.php'</script>";
}




?>
