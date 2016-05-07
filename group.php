<?php
$database = new mysqli("localhost", "root", "", "phonebook");
$database->query("SET NAMES 'utf8'");
$result = $database->query("SELECT * FROM group_type");
$data = $result->fetch_all(MYSQLI_ASSOC);
$result2 = $database->query("SELECT * FROM book");
$data2 = $result2->fetch_all(MYSQLI_ASSOC);
?>
<html>
    <head>

        <title>Group</title>
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
                    <td> GroupId</td>
                    <td> GroupName</td>
                    <td> Number of Member</td>
                    <td> ShowMember</td>
                    <td> Delete</td>
                    <td> Edite</td>
                </tr>
                <?php
                foreach ($data as $v) {
                    echo '<tr>';
                    echo '<th>' . $v['id'] . '</th>';
                    echo '<th>' . $v['label'] . '</th>';
                    $count = 0;
                    foreach ($data2 as $c) {
                        if ($v['id'] == $c['grouptype'])
                            $count++;
                    }
                    echo '<th>' . $count . '</th>';
                    echo '<th><a href="showgroup.php?id=' . $v['id'] . '"><img src="images/eye.png"></a>';
                    echo '<th><a href="deletegroup.php?id=' . $v['id'] . '"><img src="images/delete.png"></a>';
                    echo '<th><a href="editgroup.php?id=' . $v['id'] . '"><img src="images/photo.png"></a>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
    </body>
</html>
