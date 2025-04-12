<?php
require_once('bdn.php');
session_start();

function Authentification($NOM, $PSS) {
    global $connexion;

    //if (!isset($_SESSION['maxTries'])) {
    //    $_SESSION['maxTries'] = 5;
    //}

    if (!empty($NOM) && !empty($PSS)) {
        //$email = $connexion->prepare('SELECT * FROM utilisateur WHERE email = :a');
        //$email->execute(["a" => $NOM]);
        //$email = $email->fetch();

        $utilisateur = $connexion->prepare('SELECT nom,mdp,type,email,imag FROM utilisateur WHERE mdp = :e AND nom = :a');
        $utilisateur->execute([
            "e" => $PSS,
            "a" => $NOM,
        ]);

        $tout = $utilisateur->fetch();
        


        return $tout;

    }
}

// Si une requête AJAX est envoyée
if (isset($_GET['nom']) && isset($_GET['mdp'])) {

    $resultats = Authentification($_GET['nom'], $_GET['mdp']);
    
    echo $resultats['imag'];

    $_SESSION['user'] = [ 
        'logines' => $_GET['nom'],
        'img' => 'test_sesssion'
    ];

    echo json_encode($resultats);
}
?>
