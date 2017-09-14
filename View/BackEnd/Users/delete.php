<?php
    include('Controller/UserController.php');
    $Users = new UserController();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
         $Users_data = $Users->viewUser($id);
        if ($Users_data != NULL) {
	        foreach ($Users_data as $key => $User) {
                if ($User['id'] == $id) {
                	$Users->deleteUser($id);
                }
	        }
	    }
    }
?>