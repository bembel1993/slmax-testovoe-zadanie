<?php

include('user.class.php');

$getId = $_POST['id'];

$userList = new Userlist($getId);

class Userlist
{
    private $id;
    private $peopleId = array();

    public function __construct($id)
    {

        if ($user = new User()) {
            $getUser = $user->getPeople($id);
            $this->peopleId = $getUser;

            echo $this->peopleId;
        } else {
            echo 'Object User not create';
        }
    }
}
