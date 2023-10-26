<?php
    class Person{
        function __construct(){
            $this->fiscalCode = $fiscalCode; 
            $this->firstname = $firstName;
            $this->lastname = $lastName;
        }
        function getFiscalCode(){
            return $this->$fiscalCode;
        }
        function getFirstName(){
            return $this->$firstName;
        }
        function getLastName(){
            return $this->$lastName;
        }
        private $fiscalCode;
        private $firstName;
        private $lastName;
    }

    interface IStorePersons { //access person
        function Get();
        function Add($firstName, $lastName);
        function Edit($fiscalCode, $firstName, $lastName);
        function Remove($fiscalCode);
    }

    class PersonsInSession implements IStorePersons {

        function __construct(){
            session_start();
            if(!isset($_SESSION['person'])){
                $_SESSION['person'] = array();
            }
        }

        function get($fiscalCode){
            return $_SESSION['person'];
        }

        function add($firstName, $lastName){
            $person = new Person ($firstName, $lastName);
            array_push($_SESSION['person'] .$person);
        }

        function edit($fiscalCode, $firstName, $lastName){
            $index = array_search($fiscalCode, $_SESSION['person'])
            if( !== false){
                $person[$index] = $newName;
            }
        }

        function remove($fiscalCode){
            if(($index = array_search($name, $_SESSION['person'])) !== false){
                unset($_SESSION['person'][$index]);
            }
        }

    }

    class PersonsImMysql implements IStorePersons {

    } 

   
    $personRepository = new PersonInSession();

    if(isset ($_POST['action'])){

        switch($_POST['action']){
            case 'create':
                $personRepository->add($_POST['firstName'], $_POST['lastName']);
                break;
            case 'update':
                $personRepository->edit($_POST['fiscalCode'],$_POST['firstName'], $_POST['lastName']);
                break;
            case 'delete':
                $personRepository->remove($_POST['fiscalCode']);
                break;
                
        }
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Person</title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>  
            <h1>Person</h1>
            <table>
                <th>
                    <td>Fiscal Code</td>
                    <td colspan="2"></td>
                </th>
                <tr>
                    <td>
                        <form method="post">
                            <input type="hidden" name="action" value="update">
                            <input type="text" name="fiscalCode" value="<?php echo $; ?>">
                            <input type="text" name="firstName" value="<?php echo $name; ?>">
                            <input type="text" name="lastName" value="<?php echo $name; ?>">
                            <input type="submit" value="UPDATE">
                        </form>
                    </td>
                    <td>
                        <form method ="post">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="name" value="<?php echo $name; ?>">
                            <input type="submit" value="DELETE">
                        </form>
                    </td>               
                </tr>
            </table>
            
            <form method="post">
                <input type="hidden" name="action" value="create">
                <label>Add person: </label>
                <input type="text" name="name">
                <input type="submit" value="CREATE">
            </form>
            <br>
            <p><a href="index.html">Torna alla pagina principale</a></p>
    </body>
</html>