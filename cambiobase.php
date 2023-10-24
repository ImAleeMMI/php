
<?php
    function baseConvert($number, $base){
        if($number == 0){ 
            return "";
        }
        else{
            return baseConvert(intval($number / $base), $base).($number % $base);
            
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cambio Base</title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Cambio Base</h1>
            <form action="cambiobase.php" method="post">
            <label>Numero</label>
            <input type="text" name="number">
            <label>Base</label>
            <input type="text" name="base"><br>
            <input type="submit"></input>
            </form>
            <p>
            <?php
                $number=$_POST['number'];
                $base=$_POST['base'];
                if(isset($_POST['number'])){
                    echo baseConvert($number, $base);
                    
                }else{
                    echo "Nessuna stampa";
                }
            ?>
            </p>
            <br>
            <a href="index.html">Torna alla pagina principale</a>
    </body>
</html>