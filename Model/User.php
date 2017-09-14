<?php
// Users model
include_once('Config/database.php');
include_once('Model/AppModel.php');

class UserModel extends AppModel {
    
	public $User;
    public $fields = "id, name, image, dob, address, email, password, phone, role_id, created_at, updated_at, status";
    public $data;
    public $conditions;

	public function __construct() {
		parent::connectDatabase();
	}

    public function addUser($id, $name, $image, $dob, $address, $email, $password, $phone, $role_id, $created_at, $updated_at, $status) {

        $this->data = "'', '$name', '$image', '$dob', '$address', '$email', '$password', '$phone', $role_id, '$created_at', '$updated_at', '$status'";

        $this->User = $this->insert('Users', $this->fields, $this->data);
        if (!$this->User) {
        	return false;
        }else {
        	return $this->User;
        }
    }

    public function editUser($id, $name, $image, $dob, $address, $email, $password, $phone, $role_id,  $updated_at, $status) {

        $this->data = "name = '$name', image = '$image', dob = '$dob', address = '$address', email = '$email', password = '$password', role_id = '$role_id', updated_at = '$updated_at', status = '$status'";

        $this->conditions = "id = '$id'";

        $this->User = $this->update('Users', $this->data, $this->conditions);
        if (!$this->User) {
            return false;
        }else {
            return $this->User;
        }
    }

    public function viewUser($id) {
        $this->data = "*";
        $this->conditions = "id = $id";
        $this->User = $this->view('Users', $this->data, $this->conditions);
        if (!$this->User) {
            return false;
        }else {
            return $this->User;
        }
    }

    public function indexUser() {
        $this->data = "*";
        $this->User = $this->show('Users', $this->data);
        if (!$this->User) {
            return false;
        }else {
            return $this->User;
        }
    }

    public function deleteUser($id) {
        $this->conditions = "id = $id";
        $this->User = $this->delete('Users', $this->conditions);
        if (!$this->User) {
            return false;
        }else {
            return $this->User;
        }
    }

    
}
?>