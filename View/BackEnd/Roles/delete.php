<?php
    include('Controller/RoleController.php');
    $Roles = new RoleController();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
         $Roles_data = $Roles->viewRole($id);
        if ($Roles_data != NULL) {
	        foreach ($Roles_data as $key => $Role) {
                if ($Role['id'] == $id) {
                	$Roles->deleteRole($id);
                }
	        }
	    }
    }
?>