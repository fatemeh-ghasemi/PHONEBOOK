<!DOCTYPE html>
<?php
$database = new mysqli("localhost", "root", "", "phonebook");
$database->query("SET NAMES 'utf8'");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $qry = "SELECT * FROM book WHERE fname LIKE'%$_REQUEST[fname]%' and lname LIKE'%$_REQUEST[lname]%'";
    $res = $database->query($qry);
    if ($res == false) {
        $data = null;
    }
    $data = $res->fetch_all(MYSQLI_ASSOC);
}
?>
<html>
    <head>

        <title>Search</title>
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
                <h4>FirstName : </h4><input type="text" name="fname">
                <h4>LastName : </h4><input type="text" name="lname">
                <input type="submit" value="Search" name="save">
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                echo '<table border="1">';
                echo '<tr>';
                echo '<td> FirdtName</td>';
                echo ' <td> LastName</td>';
                echo ' <td> Email</td>';
                echo '  <td> Phone</td>';
                echo'  <td> Mobile</td>';
                echo '</tr>';

                foreach ($data as $v) {
                    echo '<tr>';
                    echo '<th>' . $v['fname'] . '</th>';
                    echo '<th>' . $v['lname'] . '</th>';
                    echo '<th>' . $v['email'] . '</th>';
                    echo '<th>' . $v['phone'] . '</th>';
                    echo '<th>' . $v['mobilephone'] . '</th>';
                    echo '</tr>';
                }

                echo '</table>';
            }
            ?>
        </div>
    </body>
</html>
