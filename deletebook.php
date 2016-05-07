<!DOCTYPE html>
<?php
$database = new mysqli("localhost", "root", "", "phonebook");
$database->query("SET NAMES 'utf8'");
$id = $_REQUEST['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_REQUEST['confirm'] == 'YES') {
        $result = $database->query("DELETE  FROM book WHERE id=$id");
        header("Location: first.php");
        exit();
    } else {
        header("Location: first.php");
        exit();
    }
}
?>
<html>
    <head>

        <title>Delete contact</title>
        <link href="global.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div>
            <a href="first.php"><button>Contact</button> </a>
            <a href="group.php"><button> Group</button> </a>
            <a href="add.php"><button> Add new contact</button> </a>
            <a href="addgroup.php"><button> Add new group</button> </a>
            <a href="search.php"><button> Search </button> </a>
            <form action="" method="post">
                <h2>Do you want to delete this item ?</h2>
                <input type="submit" name="confirm" value="YES">
                <input type="submit" name="confirm" value="NO">

            </form>
        </div>
    </body>
</html>
