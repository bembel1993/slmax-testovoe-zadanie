<?php
if (!empty($_GET['id'])) {

    session_start();
    $sessData = !empty($_SESSION['sessData']) ? $_SESSION['sessData'] : '';

    $id = $_GET['id'];
    $servername = "localhost";
    $username = "sqluser";
    $password = "password";
    $dbname = "phptest";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT name, surname, birthday, sex, country 
            FROM user
            WHERE id = $id";
    $result1 = $conn->query($sql);

 //   $result = !empty($sessData['userData']) ? $sessData['userData'] : $result1;
 //   unset($_SESSION['sessData']['userData']);
}

//$actionLabel = !empty($_GET['id']) ? 'Edit' : 'Add';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Update</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="script.js"></script>
</head>

<body>
    <!-- <header>
            <div>
                <p>
                    <button type="button" class="btn btn-info btn-lg" style="float: right">
                        <span class="glyphicon glyphicon-log-out"></span>

                        <a href="logout.php">Log out</a>
                    </button>
                </p>
            </div>
           <h2>Hello <?php //echo $_SESSION['user']; 
                        ?><h2>
        </header>-->

    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-6 col-lg-6 col-xl-4 text-bg-dark p-3">
                    <div id="showresult">
                        <div>
                            <div class="col-md-12">
                                <h2>
                                    <?php //echo $id;
                                    //   echo $actionLabel;
                                    ?> Update Member
                                </h2>
                            </div>
                            <div class="col-md-6">
                                <form id="addupdateForm" method="post" action="update.php?id=<?php echo $id; ?>">
                                    <?php
                                    if (!empty($result1) && $result1->num_rows > 0) {
                                        foreach ($result1 as $result) {

                                    ?>
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="name" value="<?php echo !empty($result['name']) ? $result['name'] : ''; ?>" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Surname</label>
                                                <input type="text" class="form-control" name="surname" value="<?php echo !empty($result['surname']) ? $result['surname'] : ''; ?>" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Birthday</label>
                                                <input type="text" class="form-control" name="birthday" value="<?php echo !empty($result['birthday']) ? $result['birthday'] : ''; ?>" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Sex</label>
                                                <input type="text" class="form-control" name="sex" value="<?php echo !empty($result['sex']) ? $result['sex'] : ''; ?>" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control" name="country" value="<?php echo !empty($result['country']) ? $result['country'] : ''; ?>" required="">
                                            </div>

                                            <a href="" id="backbtn" class="btn btn-secondary">Back</a>
                                            <input type="hidden" id="update" name="id" value="<?php echo !empty($memberData['id']) ? $memberData['id'] : ''; ?>">
                                            <input id="" type="submit" name="userUpdate" class="btn btn-primary" value="Submit">
                                    <?php
                                        }
                                    } else {
                                        echo 'error';
                                    }
                                    ?>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
</body>

</html>