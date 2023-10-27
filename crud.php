<?php
    class Person 
    {
        function __construct($firstName, $lastName) 
        {
            $this->id = uniqid(); 
            $this->firstName = $firstName;
            $this->lastName = $lastName;
        }
        
        function getId() { return $this->id; }
        function getFirstName() { return $this->firstName; }
        function getLastName() { return $this->lastName; }
        
        function setFirstName($firstName) { $this->firstName = $firstName; }
        function setLastName($lastName) { $this->lastName = $lastName; }

        private $id;
        private $firstName;
        private $lastName;
    }

    interface IStorePersons 
    { 
        function get();
        function add($firstName, $lastName);
        function edit($id, $firstName, $lastName);
        function remove($id);
    }

    class PersonsInSession implements IStorePersons 
    {

        function __construct()
        {
            session_start();
            if(!isset($_SESSION['persons'])){ $_SESSION['persons'] = array(); }
        }
        function get() { return $_SESSION['persons']; }

        function add($firstName, $lastName)
        {
            $person = new Person ($firstName, $lastName);
            $_SESSION['persons'][$person->getId()] = $person;
        }
        function edit($id, $firstName, $lastName)
        {
            $person = $_SESSION['persons'][$id];
            $person->setFirstName($firstName);
            $person->setLastName($lastName);
        }
        function remove($id) { unset($_SESSION['persons'][$id]); }
    }

    $personRepository = new PersonsInSession();
    
    if(isset ($_POST['action']))
    {
        switch($_POST['action'])
        {
            case 'create':
                $personRepository->add($_POST['firstName'], $_POST['lastName']);
                break;
            case 'update':
                $personRepository->edit($_POST['id'], $_POST['firstName'], $_POST['lastName']);
                break;
            case 'delete':
                $personRepository->remove($_POST['id']);
                break;  
        }
    }
        $persons = $personRepository->get();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Person</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>  
        <h1>Person</h1>
        <table>
            <?php foreach($persons as $person) { ?>
            <tr>
                <td>
                    <form method="post">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="id" value="<?php echo $person->getId(); ?>">
                        <label>First Name: </label>
                        <input type="text" name="firstName" value="<?php echo $person->getFirstName(); ?>">
                        <label>Last Name: </label>
                        <input type="text" name="lastName" value="<?php echo $person->getLastName(); ?>">
                        <input type="submit" value="UPDATE">
                    </form>
                </td>
                <td>
                    <form method ="post">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?php echo $person->getId(); ?>">
                        <input type="submit" value="DELETE">
                    </form>
                </td>               
            </tr>
               <?php } ?>
        </table>
                <form method="post">
                    <input type="hidden" name="action" value="create">
                    <label>Add person: </label>
                    <input type="text" name="firstName">
                    <input type="text" name="lastName">
                    <input type="submit" value="CREATE">
                </form>
            <br>
            <p><a href="index.html">Torna alla pagina principale</a></p>
    </body>
</html>