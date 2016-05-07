<!DOCTYPE html>
<?php
$database = new mysqli("localhost", "root", "", "phonebook");
$database->query("SET NAMES 'utf8'");
$id = $_REQUEST['id'];

$result = $database->query("SELECT * FROM book WHERE grouptype=$id ");
$data = $result->fetch_all(MYSQLI_ASSOC);
?>
<html>
    <head>

        <title>Show group</title>
        <link href="global.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div>
            <a href="first.php"><button>Contact</button> </a>
            <a href="group.php"><button> Group</button> </a>
            <a href="add.php"><button> Add new contact</button> </a>
            <a href="addgroup.php"><button> Add new group</button> </a>
            <a href="search.php"><button> Search </button> </a>

            <table border="1">
                <tr>
                    <td> FirdtName</td>
                    <td> LastName</td>
                    <td> Email</td>
                    <td> Phone</td>
                    <td> Mobile</td>
                </tr>
                <?php
                foreach ($data as $v) {
                    echo '<tr>';
                    echo '<th>' . $v['fname'] . '</th>';
                    echo '<th>' . $v['lname'] . '</th>';
                    echo '<th>' . $v['email'] . '</th>';
                    echo '<th>' . $v['phone'] . '</th>';
                    echo '<th>' . $v['mobilephone'] . '</th>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>

    </body>
</html>
