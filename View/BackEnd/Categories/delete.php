<?php
    include('Controller/CategoryController.php');
    $Categories = new CategoryController();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
         $Categories_data = $Categories->viewCategory($id);
        if ($Categories_data != NULL) {
	        foreach ($Categories_data as $key => $category) {
                if ($category['id'] == $id) {
                	$Categories->deleteCategory($id);
                }
	        }
	    }
    }
?>