<?php
    session_start();

    if(!inset($_SESSION['names'])){

        $_SESSION['names'] = array();
    }
        $names = $_SESSION['names'];
    if(inset($_POST['action'])){

        $names = $_POST['name']
        switch($_POST['action']){
            case 'CREATE';
                $name = $_POST['name'];
                break
            case 'UPDATE';
                echo "";
                break
            case 'DELETE';
                echo "";
                break    
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Crud</title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>  
            <h1>Esercizio Crud</h1>
            <form action="crud.php" method="post">
            <label>Nome :</label>
            <input type="hidden" name="name" value="">
            <input type="submit"></input>
            </form>
            <p>
            <?php

            ?>
            </p>
            <br>
            <p><a href="index.html">Torna alla pagina principale</a></p>
    </body>
</html>