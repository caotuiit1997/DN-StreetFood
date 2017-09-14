<?php
// Role Controller
include_once("Model/Role.php");
include_once("Controller/AppController.php");

class RoleController extends AppController {
    public $Role;


    public function __construct() {
    	
    	parent::connectDatabase();
    	 $this->Role = new RoleModel();

    }

    public function addRole($id, $name, $description, $created_at, $updated_at) {

    	$sqlQuery = $this->Role->addRole($id, $name, $description, $created_at, $updated_at);
    	$excuteSQLQuery = $this->executeDatabaseQuery($sqlQuery);

    	if (!$excuteSQLQuery) {
    		echo "Add new Role has been failed";
    	}else {
    		$this->redirect('Roles', 'index');
    	}
    }

    public function editRole($id, $name, $description, $updated_at) {

    	$sqlQuery = $this->Role->editRole($id, $name, $description, $updated_at);
    	$excuteSQLQuery = $this->executeDatabaseQuery($sqlQuery);

    	if (!$excuteSQLQuery) {
    		echo "Edit new Role has been failed";
    	}else {
    		$this->redirect('Roles', 'index');
    	}
    }

    public function viewRole($id) {
        $sqlQuery = $this->Role->viewRole($id);
        $data = $this->getDataFromDatabase($sqlQuery);
        if (!$data) {
            echo "No records found".$this->connection->error;
        }else {
            return $data;
        }
    }
    public function indexRole() {
        $sqlQuery = $this->Role->indexRole();
        $data = $this->getDataFromDatabase($sqlQuery);
        if (!$data) {
            echo "No records found".$this->connection->error;
        }else {
            return $data;
        }
    }
    public function deleteRole($id) {
        $sqlQuery = $this->Role->deleteRole($id);
        $excuteSQLQuery = $this->executeDatabaseQuery($sqlQuery);
        if (!$excuteSQLQuery) {
            echo "Record hasn't been deleted".$this->connection->error;
        }else {
           $this->redirect('Roles', 'index');
        }
    }

}
?>