<?php
class PageController {

	public function getBackendContent($controller, $action) {
		
        if(!$action) {
        	$file_path = "View/BackEnd/".$controller."/index.php";

        	if (file_exists($file_path)) {
                include($file_path);
            }else {
                include("View/BackEnd/404.php");
            }
        }else {
        	$file_path = "View/BackEnd/".$controller."/".$action.".php";
        	if (file_exists($file_path)) {
                include($file_path);
            }else {
                include("View/BackEnd/404.php");
            }
        }
        
	}

	public function getPageTitle($controller, $action) {
        	
    }
}
?>