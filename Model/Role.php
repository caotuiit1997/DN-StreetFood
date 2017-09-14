<?php
// roles model
include_once('Config/database.php');
include_once('Model/AppModel.php');

class RoleModel extends AppModel {
    
	public $Role;
    public $fields = "id, name, description, created_at, updated_at";
    public $data;
    public $conditions;

	public function __construct() {
		parent::connectDatabase();
	}

    public function addRole($id, $name, $description, $created_at, $updated_at) {

        $this->data = "'$id', '$name', '$description', '$created_at', '$updated_at'";

        $this->Role = $this->insert('roles', $this->fields, $this->data);
        if (!$this->Role) {
        	return false;
        }else {
        	return $this->Role;
        }
    }

    public function editRole($id, $name, $description, $updated_at) {

        $this->data = "name = '$name', description = '$description', updated_at = '$updated_at'";
        $this->conditions = "id = '$id'";

        $this->Role = $this->update('roles', $this->data, $this->conditions);
        if (!$this->Role) {
            return false;
        }else {
            return $this->Role;
        }
    }

    public function viewRole($id) {
        $this->data = "*";
        $this->conditions = "id = $id";
        $this->Role = $this->view('roles', $this->data, $this->conditions);
        if (!$this->Role) {
            return false;
        }else {
            return $this->Role;
        }
    }

    public function indexRole() {
        $this->data = "*";
        $this->Role = $this->show('roles', $this->data);
        if (!$this->Role) {
            return false;
        }else {
            return $this->Role;
        }
    }

    public function deleteRole($id) {
        $this->conditions = "id = $id";
        $this->Role = $this->delete('roles', $this->conditions);
        if (!$this->Role) {
            return false;
        }else {
            return $this->Role;
        }
    }

    
}
?>