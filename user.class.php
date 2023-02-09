<?php

class User
{
    private $name;
    private $surname;
    private $birthday;
    private $sex;
    private $country;

    private $id;
    //error message
    public $successMessage;
    public $errorMessage;
    public $errorLogin;
    public $error;

    public $data = 0;

    /* public function __construct($name, $surname, $birthday, $sex, $country)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->birthday = $birthday;
        $this->sex = $sex;
        $this->country = $country;

        //  $this->id = time();
        if ($this->validationField($name, $surname, $birthday, $sex, $country) == false) {
        };
    }*/
    //GET PEOPLE
    public function getPeople($id)
    {
        $servername = "localhost";
        $username = "sqluser";
        $password = "password";
        $dbname = "phptest";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($id > 3) {
            $sql = "SELECT id, name, surname, birthday, sex, country 
                FROM user
                WHERE id > $id";
            $result = $conn->query($sql);
            foreach ($result as $row) {
                echo $row['name'];
                echo ' ';
                echo $row['surname'];
                echo ' ';
                echo $row['birthday'];
                echo ' ';
                echo $row['sex'];
                echo ' ';
                echo $row['country'];
                echo '<br>';
            }
        } elseif ($id < 3) {
            $sql = "SELECT id, name, surname, birthday, sex, country 
            FROM user
            WHERE id < $id";
            $result = $conn->query($sql);
            foreach ($result as $row) {
                echo $row['name'];
                echo ' ';
                echo $row['surname'];
                echo ' ';
                echo $row['birthday'];
                echo ' ';
                echo $row['sex'];
                echo ' ';
                echo $row['country'];
                echo '<br>';
            }
        } elseif ($id == 3){
            $sql = "SELECT id, name, surname, birthday, sex, country 
            FROM user
            WHERE id = $id";
            $result = $conn->query($sql);
            foreach ($result as $row) {
                echo $row['name'];
                echo ' ';
                echo $row['surname'];
                echo ' ';
                echo $row['birthday'];
                echo ' ';
                echo $row['sex'];
                echo ' ';
                echo $row['country'];
                echo '<br>';
            }
        }
    }

    //VALIDATION METHOD
    public function validationField($name, $surname, $birthday, $sex, $country)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->birthday = $birthday;
        $this->sex = $sex;
        $this->country = $country;
        if (empty($this->name)) {
            echo '<p style="color: red">Field Name is empty</p>';
        } elseif (empty($this->surname)) {
            echo '<p style="color: red">Field Surname is empty</p>';
        } elseif (empty($this->birthday)) {
            echo '<p style="color: red">Field Birthday Password is empty</p>';
        } elseif (empty($this->sex)) {
            echo '<p style="color: red">Field Sex is empty</p>';
        } elseif (empty($this->country)) {
            echo '<p style="color: red">Field Country is empty</p>';
        } elseif (!preg_match("#[a-z]+#", $this->name)) {
            echo '<p style="color: red">Name should be have letters</p>';
        } elseif (!preg_match("#[a-z]+#", $this->surname)) {
            echo '<p style="color: red">Surname should be have letters</p>';
        } else {
            $this->insertUser($this->name, $this->surname, $this->birthday, $this->sex, $this->country);
        }
    }
    //INSERT METHOD
    public function insertUser($name, $surname, $birthday, $sex, $country)
    {

        $servername = "localhost";
        $username = "sqluser";
        $password = "password";
        $dbname = "phptest";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if($sex = 0){
            $sex = 'f';
        } elseif($sex = 1){
            $sex = 'm';
        }

        $sql = "INSERT INTO user (name, surname, birthday, sex, country)
        VALUES ('$name', '$surname', '$birthday', '$sex', '$country')";

        if (mysqli_query($conn, $sql)) {
            echo " Add successfully";

            $previous_name = session_name("$name");
            echo "The previous session name was $previous_name<br />";

            header("Location: index.php");
            exit();
        } else {
            echo "Error add record: " . mysqli_error($conn);
        }
        $conn->close();
    }
    //DELETE METHOD
    public function delete($id)
    {
        $servername = "localhost";
        $username = "sqluser";
        $password = "password";
        $dbname = "phptest";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "DELETE FROM user WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
            header("Location: index.php");
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
    //UPDATE METHOD
    public function update($id, $name, $surname, $birthday, $sex, $country)
    {
        $servername = "localhost";
        $username = "sqluser";
        $password = "password";
        $dbname = "phptest";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE user 
            SET name = '$name', surname = '$surname', birthday = '$birthday', 
            sex = '$sex', country = '$country' 
            WHERE id = '$id'";

        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
            header("Location: index.php");
            echo $sql;
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
        $conn->close();
    }
}
