<!DOCTYPE html>
<?php
    function factorial($number){
        if($number == 0){ 
            return 1;
        }
        else{
            return $number * factorial($number - 1);
        }
    }
?>

<html>
    <head>
        <title>Fattoriale</title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Factorial</h1>
            <form action="fattoriale.php" method="post">
            <label>Numero</label>
            <input type="text" name="number"><br>
            <input type="submit"></input>
            </form>
            <p>
            <?php
            
                if(isset($_POST['number'])){
                    $number=$_POST['number'];
                    echo "Il numero fattoriale di "  .$number. ' è ' .factorial($number) ;
                }else{
                    echo "Nessuna stampa";
                }
                
            ?>
            </p>
            <br>
            <a href="index.html">Torna alla pagina principale</a>
    </body>
</html>