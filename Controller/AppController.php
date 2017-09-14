<?php
// AppController
include_once('Config/database.php');
class AppController extends db {
    public $getData;
    public $executeQuery;

    public function __construct() {
        parent::connectDatabase();
    }
    public function getDataFromDatabase($query){
        $this->getData = $this->connection->query($query);
        if (!$this->getData) {
            return false;
        }else {
            $rows = array();
            if ($this->getData->num_rows > 0) {
                while ($row = $this->getData->fetch_assoc()) {
                    $rows[] = $row;
                }
                return $rows;
            }else {
                return Null;
            }
        

        }
    }
    public function executeDatabaseQuery($query) {
        $this->executeQuery = $this->connection->query($query);
        if (!$this->executeQuery) {
            echo $this->connection->error;
        }
        return $this->executeQuery;

    }

    public function handleDataBeforeSave($value) {

        $escapeString = $this->connection->real_escape_string($value);
        $escapeString = addslashes($value); //add / before '', "", \ and Null 
        $escapeString = htmlspecialchars($value); //covert html tag
        $escapeString = trim($value); // escape space
        $escapeString = ucfirst($value); //capitalize first letter
        //$escapeString = str_replace(" ", "-", $value);// alias name
        // $escapeString = implode("-", $value);
        //var_dump($value) or die();
        if (!$escapeString) {
            return false;
        }
        return $escapeString;
    }
    public function redirect($controller, $action) {
         echo "<script>window.location = '?controller=".$controller."&action=".$action."'</script>";
    }

    public function uploadImage($dir, $sub_dir, $image) {

        $old_dir = "Webroot/files/".$dir."/".$sub_dir;
        if (!is_dir($old_dir)) {
            mkdir("Webroot/files/".$dir."/".$sub_dir);
            $new_dir = "Webroot/files/".$dir."/".$sub_dir;
        }else {
            $new_dir = $old_dir;
        }
        $image_name = date("Y-m-d")."-".$image;
        $path_tmp = $_FILES['image']['tmp_name'];
        $path = $new_dir."/".$image_name;
        $upload = move_uploaded_file($path_tmp, $path);
        return $image_name;

    }
}
?>