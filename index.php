
<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Voyage +Aos/Aos/dist/aos.css">
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script>
        var tentative = 4;
        function Tentative(){
            document.getElementById("nom").value = " ";
            document.getElementById("mdp").value = " ";
            document.getElementById("nom").disabled = true;
            document.getElementById("mdp").disabled = true;
            document.getElementById("alert_interface").innerText = "Vous avez atteint le nombre maximal de tentatives de connexion"; 
                        document.getElementById("alert_interface").style.color = "red";
                        document.getElementById("alert_interface").style.fontSize = "14px";
        }
        function Connection(){
            var nom = document.getElementById("nom").value;
            var mdp = document.getElementById("mdp").value;
            var ajax = new XMLHttpRequest();
            
            ajax.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200 ){                    
                    var course = JSON.parse(ajax.responseText);
                    if(course == false){
                        document.getElementById("alert_interface").innerText = "Votre Nom ou votre mot de passe est incorrecte"; 
                        document.getElementById("alert_interface").style.color = "red";
                        document.getElementById("alert_interface").style.fontSize = "14px";
                        tentative = tentative - 1;
                        if(tentative == 0){
                            Tentative();
                        }
                        
                    }else{
                        
                        if(course[2] == 1){
                            document.getElementById("alert_interface").innerText = "Votre compte est désactivé. Veuillez contacter l'administrateur pour le réactiver"; 
                            document.getElementById("alert_interface").style.color = "green";
                            document.getElementById("alert_interface").style.fontSize = "14px";
                            
                        }else{
                            document.location='Liste_utilisateur.php';
                        }
                        
                    }
                }                 
            };
            ajax.open("GET", "verification_copy.php?nom=" + encodeURIComponent(nom) + "&mdp=" + encodeURIComponent(mdp), true);
            ajax.send()
        }
    </script>
    <title>Authentification</title>
</head>
<body>
    <div class="head" >       
        <div class="formulaire" ><br>
            <div class="col-lg-10 col-md-12  text-center">
            <div data-aos="flip-left" data-aos-easing="ease-out-cubic"  data-aos-duration="3000"><h2 class="text-color:primary;">LOGIN</h2></div>
            <label for="exampleFormControlInput1" class="form-label" id="alert_interface"> </label><br>
            </div>
            <br>

            <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="3000">          
                <label for="exampleFormControlInput1" class="form-label">Nom ou e-email :</label>    
                <input type="text" class="form-control" id="nom"  name="nom"><br>
                        
                        <label for="exampleFormControlInput1" class="form-label" >Mot de passe :</label>
                        <input type="password" class="form-control" id="mdp" name="mdp">
                    </div><br>
                        <div class="col-lg-10 col-md-12  text-center">
                            <div data-aos="zoom-in" data-aos-duration="3000" class="pt-3">
                                <button class="btn btn-primary" name="verifier" type="submit" onclick = "Connection();">SE CONNECTER</button>
                            </div>
                            <br>
                            <div>

                               <a href="#" target="_blank" rel="noopener noreferrer"><label for="exampleFormControlInput1" class="form-label" >MOT DE PASSE OUBLIE </label></a> 
                            </div>
                        </div>

            

        </div>
    </div>

    <script src="Voyage +Aos/Aos/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
</body>
</html>