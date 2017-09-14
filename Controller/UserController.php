<?php
// User Controller
include_once("Model/User.php");
include_once("Controller/AppController.php");

class UserController extends AppController {
    public $User;


    public function __construct() {
    	
    	parent::connectDatabase();
    	 $this->User = new UserModel();

    }

    public function addUser($id, $name, $image, $dob, $address, $email, $password, $phone, $role_id, $created_at, $updated_at, $status) {

    	$sqlQuery = $this->User->addUser($id, $name, $image, $dob, $address, $email, $password, $phone, $role_id, $created_at, $updated_at, $status);

    	$excuteSQLQuery = $this->executeDatabaseQuery($sqlQuery);

    	if (!$excuteSQLQuery) {
    		echo "Add new User has been failed";
    	}else {
    		$this->redirect('Users', 'index');
    	}
    }

    public function editUser($id, $name, $image, $dob, $address, $email, $password, $phone, $role_id, $updated_at, $status) {

    	$sqlQuery = $this->User->editUser($id, $name, $image, $dob, $address, $email, $password, $phone, $role_id, $updated_at, $status);

    	$excuteSQLQuery = $this->executeDatabaseQuery($sqlQuery);

    	if (!$excuteSQLQuery) {
    		echo "Edit new User has been failed";
    	}else {
    		$this->redirect('Users', 'index');
    	}
    }

    public function viewUser($id) {
        $sqlQuery = $this->User->viewUser($id);
        $data = $this->getDataFromDatabase($sqlQuery);
        if (!$data) {
            echo "No records found".$this->connection->error;
        }else {
            return $data;
        }
    }
    public function indexUser() {
        $sqlQuery = $this->User->indexUser();
        $data = $this->getDataFromDatabase($sqlQuery);
        if (!$data) {
            echo "No records found".$this->connection->error;
        }else {
            return $data;
        }
    }
    public function deleteUser($id) {
        $sqlQuery = $this->User->deleteUser($id);
        $excuteSQLQuery = $this->executeDatabaseQuery($sqlQuery);
        if (!$excuteSQLQuery) {
            echo "Record hasn't been deleted".$this->connection->error;
        }else {
           $this->redirect('Users', 'index');
        }
    }

}
?>