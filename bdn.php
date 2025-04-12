<?php

try{
    $connexion = new PDO('mysql:host=localhost;dbname=test_francky', 'root', '');
    
    
}catch(PDOException $e){
    echo "ce pas bon" .$è->getMessage();
  
}

?>