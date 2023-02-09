<?php
session_start();

$servername = "localhost";
$username = "sqluser";
$password = "password";
$dbname = "phptest";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sessData = !empty($_SESSION['sessData']) ? $_SESSION['sessData'] : '';
?>
<html>

<head>
    <title>Account</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</head>

<body>

    <div id="showresult">
        <div>
            <div id="showaddup"></div>
            <br><br>
            <a href="addUser.php">
                <!-- <a href="addUser.php">-->
                <button id="addupbtn" type="button" name="addupbtn" class="btn btn-success">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true">
                    </span>
                    Create Data
                </button></a>
            <!--</a>-->
            &nbsp;&nbsp;&nbsp;&nbsp;

            <span id="zoom" aria-hidden="true">
                <form method="post" action="userlist.class.php">
                    <div class="input-group w-25 p-3">
                        <input name="id" type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </span>

            <?php
            $sql = "SELECT id, name, surname, birthday, sex, country 
                    FROM user";
            $result = $conn->query($sql); ?>

            <table id="tbl" class="table table-hover table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th>№</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Birthday</th>
                        <th>Sex</th>
                        <th>Country</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php if (!empty($result) && $result->num_rows > 0) {
                        $count = 0;
                        foreach ($result as $row) {
                            $count++;
                    ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['surname']; ?></td>
                                <td><?php echo $row['birthday']; ?></td>
                                <td><?php echo $row['sex']; ?></td>
                                <td><?php echo $row['country']; ?></td>
                                <td>
                                    <a href="updateUser.php?id=
                                <?php echo $row['id']; ?>" class="glyphicon glyphicon-pencil">
                                    </a>
                                    &nbsp;&nbsp;

                                    <a href="create.php?action_type=delete&id=
                                <?php echo $row['id']; ?>" class="glyphicon glyphicon-remove">
                                    </a>
                                    <!--     &nbsp;&nbsp;
                            <a href="add.html" class="glyphicon glyphicon-plus">
                            </a>-->
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="6">No member(s) found...</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>