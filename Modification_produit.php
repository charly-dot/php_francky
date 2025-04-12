<?php
require('autho.php');
Session();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Voyage +Aos/Aos/dist/aos.css">
    <title>Document</title>
    <style>
        .cripte{
            background-color: brown;
            height: auto;
            width: 10rem;
        }
    </style>
</head>
<body>
    <div class="cripte">
        <h1 data-aos="fade-up" 
        data-aos-anchor-placement="bottom-bottom">lesson AOS</h1>
    </div>

    <script src="Voyage +Aos/Aos/dist/aos.js"></script>
    <script>
        AOS.init(); //initialisation les code script
        //attribut ce sont les class id href src
    </script>
</body>
</html>