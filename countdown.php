<?php
    function countdown($number) {
        if($number > 0){
            echo "$number <br>";
            countdown($number-1);
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Count Down</title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>  
            <h1>CountDown</h1>
            <form action="countdown.php" method="post">
            <label>Numero</label>
            <input type="text" name="number"><br>
            <input type="submit"></input>
            </form>
            <p>
            <?php
                $number=$_POST['number'];
                    if(isset($_POST['number'])){
                        echo countdown($number);
                    }else{
                        echo "Nessuna stampa";
                    }
            ?>
            </p>
            <br>
            <p><a href="index.html">Torna alla pagina principale</a></p>
    </body>
</html>