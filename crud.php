<?php
   session_start();

    if(!isset($_SESSION['names'])){
        $_SESSION['names'] = array();
    }
 
    $names = $_SESSION['names'];
    $names = array('Ale', 'Matteo', 'Alesso');//TODO 

    if(isset ($_POST['action'])){
        $name = $_POST['name'];

        switch($_POST['action']){
            case 'create':
                $names[] = $name;
                break;
                
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

            <label>Names :</label>
            <table>
                <?php           
                    foreach($names as $name){     
                ?>
                <tr>
                
                <td>

                    <form action="crud.php" method="post">
                        <input type="text" name="name" value="<?php echo $name; ?>">
                        <input type="submit"></input>     
                    </form>
                </td>
                            </tr>
                <?php
                            
                            }
                        ?>
            </table>
            
            
            <br>
            <p><a href="index.html">Torna alla pagina principale</a></p>
    </body>
</html>