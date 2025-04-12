<?php
require('bdn.php');

    function recherche() {
        global $connexion;
        $produits = $connexion->prepare('SELECT * FROM produit');
        $produits->execute();
        $resultats = $produits->fetchAll();
        return $resultats;
    }
    function recherche_utilisateur() {
        global $connexion;
        $produits = $connexion->prepare('SELECT * FROM utilisateur');
        $produits->execute();
        $resultats = $produits->fetchAll();
        return $resultats;
    }

    function Session(){
        session_start();
        
        $login = isset($_SESSION['user']['logines']) ? $_SESSION['user']['logines'] : '';
        
        if($login == ' ' OR empty($login)){
            echo "<script>document.location='index.php'</script>";
            exit();
        }
        return $_SESSION['user']['logines'];
        
    }


?>