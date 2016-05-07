<!DOCTYPE html>
<?php
$database = new mysqli("localhost", "root", "", "phonebook");
$database->query("SET NAMES 'utf8'");
$result = $database->query("SELECT * FROM group_type");
$data = $result->fetch_all(MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $label = $_REQUEST['name'];
    $size = count($data);
    $c = 0;
    foreach ($data as $v) {
        if ($v['label'] != $label)
            $c++;
        else {
            break;
        }
    }
    if ($c == $size) {
        $qry2 = "INSERT INTO group_type(label) VALUES ('$_REQUEST[name]')";
        $result2 = $database->query($qry2);
        header("location:group.php");
        exit();
    } else {
        header("location:group.php");
        exit();
    }
}
?>
<html>
    <head>

        <title>Add group</title>
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
                <h4>GroupName : </h4><input type="text" name="name">

                <input type="submit" value="SAVE" name="save">
            </form>
        </div>
    </body>
</html>
