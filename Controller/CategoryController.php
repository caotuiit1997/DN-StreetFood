<?php
// Category Controller
include("Model/Category.php");
include("Controller/AppController.php");

class CategoryController extends AppController {
    public $Category;


    public function __construct() {
    	
    	parent::connectDatabase();
    	 $this->Category = new CategoryModel();

    }

    public function addCategory($id, $code, $name, $parent_id, $created_at, $updated_at) {

    	$sqlQuery = $this->Category->addCategory($id, $code, $name, $parent_id, $created_at, $updated_at);
    	$excuteSQLQuery = $this->executeDatabaseQuery($sqlQuery);

    	if (!$excuteSQLQuery) {
    		echo "Add new category has been failed";
    	}else {
    		$this->redirect('Categories', 'index');
    	}
    }

    public function editCategory($id, $code, $name, $parent_id, $updated_at) {

    	$sqlQuery = $this->Category->editCategory($id, $code, $name, $parent_id, $updated_at);
    	$excuteSQLQuery = $this->executeDatabaseQuery($sqlQuery);

    	if (!$excuteSQLQuery) {
    		echo "Edit new category has been failed";
    	}else {
    		$this->redirect('Categories', 'index');
    	}
    }

    public function viewCategory($id) {
        $sqlQuery = $this->Category->viewCategory($id);
        $data = $this->getDataFromDatabase($sqlQuery);
        if (!$data) {
            echo "No records found".$this->connection->error;
        }else {
            return $data;
        }
    }
    public function indexCategory() {
        $sqlQuery = $this->Category->indexCategory();
        $data = $this->getDataFromDatabase($sqlQuery);
        if (!$data) {
            echo "No records found".$this->connection->error;
        }else {
            return $data;
        }
    }
    public function deleteCategory($id) {
        $sqlQuery = $this->Category->deleteCategory($id);
        $excuteSQLQuery = $this->executeDatabaseQuery($sqlQuery);
        if (!$excuteSQLQuery) {
            echo "Record hasn't been deleted".$this->connection->error;
        }else {
           $this->redirect('Categories', 'index');
        }
    }

}
?>