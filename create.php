<?php

include('user.class.php');

$name = strip_tags($_POST['name']);
$surname = strip_tags($_POST['surname']);
$birthday = strip_tags($_POST['birthday']);
$sex = trim(strip_tags($_POST['sex']));
$country = trim(strip_tags($_POST['country']));

//$user = new User($name, $surname, $birthday, $sex, $country);
if (isset($_POST['userSubmit'])) {
    $user = new User();
    $adduser = $user->validationField($name, $surname, $birthday, $sex, $country);
} elseif (($_REQUEST['action_type'] == 'delete') && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $user = new User();

    $deleteUser = $user->delete($id);
}
