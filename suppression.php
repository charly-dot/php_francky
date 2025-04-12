
<?php
require('bdn.php');

if(isset($_GET['suppression_utilisateur'])){  
$id = $_GET['suppression_utilisateur'];
$supprimer = $connexion->prepare('DELETE FROM utilisateur WHERE id = :id LIMIT 1');
$supprimer->bindValue(':id', $id, PDO::PARAM_INT);
$verification = $supprimer->execute();
if($verification){
    echo "<script>document.location='Liste_utilisateur.php'</script>";
}
}

if(isset($_GET['suppression_produit'])){  
    $id = $_GET['suppression_produit'];
    $supprimer = $connexion->prepare('DELETE FROM produit WHERE id = :id LIMIT 1');
    $supprimer->bindValue(':id', $id, PDO::PARAM_INT);
    $verification = $supprimer->execute();
    if($verification){
        echo "<script>document.location='Liste_produit.php'</script>";
        // echo"mety";
    }
    }

?>