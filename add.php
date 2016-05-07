<!DOCTYPE html>
<?php
$database = new mysqli("localhost", "root", "", "phonebook");
$database->query("SET NAMES 'utf8'");
$result = $database->query("SELECT * FROM group_type");
$data = $result->fetch_all(MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $label = $_REQUEST["options"];
    $qry1 = "SELECT * FROM group_type";
    $result1 = $database->query($qry1);
    if ($result1 == false) {
        echo $database->error;
    }
    $data1 = $result1->fetch_all(MYSQLI_ASSOC);

    $id = "";
    foreach ($data1 as $v) {
        if ($v['label'] == $label)
            $id = $v['id'];
    }
    $qry2 = "INSERT INTO book(fname, lname, phone, email, grouptype,mobilephone) VALUES "
            . "('$_REQUEST[fname]','$_REQUEST[lname]','$_REQUEST[phone]','$_REQUEST[email]','$id','$_REQUEST[mobile]')";
    $result2 = $database->query($qry2);
}
?>
<html>
    <head>

        <title>Add contact</title>
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
                <h5>FirstName : </h5><input type="text" name="fname">
                <h5>LastName : </h5><input type="text" name="lname">
                <h5>Email  : </h5><input type="text" name="email">
                <h5>Phone :<img src="images/telephone.png"> </h5><input type="text" name="phone">
                <h5>mobile :<img src="images/cellphone.png"> </h5><input type="text" name="mobile">
                <h5>Group_type : </h5><select name="options">
                    <?php
                    foreach ($data as $v) {
                        echo '<option>' . $v['label'] . '</option>';
                    }
                    ?>

                </select>
                <input type="submit" value="SAVE" name="save">
            </form>
        </div>
    </body>
</html>
