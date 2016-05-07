<!DOCTYPE html>
<?php
$database = new mysqli("localhost", "root", "", "phonebook");
$database->query("SET NAMES 'utf8'");
$id = $_REQUEST['id'];

$result2 = $database->query("SELECT * FROM group_type ");
$data2 = $result2->fetch_all(MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lid = 0;
    $la = $_REQUEST['options'];
    foreach ($data2 as $x) {
        if ($la == $x['label']) {
            $lid = $x['id'];
            break;
        }
    }
    $qry = "UPDATE book SET fname='$_REQUEST[fname]',lname='$_REQUEST[lname]',phone='$_REQUEST[phone]',email='$_REQUEST[email]',grouptype=$lid,mobilephone='$_REQUEST[mobile]' WHERE id=$id ";
    $res = $database->query($qry);
}

$result = $database->query("SELECT * FROM book WHERE id=$id");
$data = $result->fetch_assoc();
if ($data == false) {

    echo $db->error;
}
?>
<html>
    <head>

        <title>Edit contact</title>
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
                <h5>FirstName : </h5><input type="text" name="fname" value="<?php echo $data['fname']; ?>">
                <h5>LastName : </h5><input type="text" name="lname" value="<?php echo $data['lname']; ?>">
                <h5>Email  : </h5><input type="text" name="email" value="<?php echo $data['email']; ?>">
                <h5>Phone :<img src="images/telephone.png"> </h5><input type="text" name="phone" value="<?php echo $data['phone']; ?>">
                <h5>mobile :<img src="images/cellphone.png"> </h5><input type="text" name="mobile" value="<?php echo $data['mobilephone']; ?>">
                <h5>Group_type : </h5><select name="options">
                    <?php
                    $s = "";

                    foreach ($data2 as $v) {
                        if ($v['id'] == $data['grouptype'])
                            $s = "selected";
                        if ($data['grouptype'] == 0)
                            $s = "";
                        echo '<option $s>' . $v['label'] . '</option>';
                    }
                    ?>

                </select>
                <input type="submit" value="SAVE" name="save">
            </form>
        </div>
    </body>
</html>
