<?php
// Categories model
include_once('Config/database.php');
include_once('Model/AppModel.php');

class CategoryModel extends AppModel {
    
	public $category;
    public $fields = "id, code, name, parent_id, created_at, updated_at";
    public $data;
    public $conditions;

	public function __construct() {
		parent::connectDatabase();
	}

    public function addCategory($id, $code, $name, $parent_id, $created_at, $updated_at) {

        $this->data = "'$id', '$code', '$name', '$parent_id', '$created_at', '$updated_at'";

        $this->category = $this->insert('categories', $this->fields, $this->data);
        if (!$this->category) {
        	return false;
        }else {
        	return $this->category;
        }
    }

    public function editCategory($id, $code, $name, $parent_id, $updated_at) {

        $this->data = "code = '$code', name = '$name', parent_id = '$parent_id', updated_at = '$updated_at'";
        $this->conditions = "id = '$id'";

        $this->category = $this->update('categories', $this->data, $this->conditions);
        if (!$this->category) {
            return false;
        }else {
            return $this->category;
        }
    }

    public function viewCategory($id) {
        $this->data = "*";
        $this->conditions = "id = $id";
        $this->category = $this->view('categories', $this->data, $this->conditions);
        if (!$this->category) {
            return false;
        }else {
            return $this->category;
        }
    }

    public function indexCategory() {
        $this->data = "*";
        $this->category = $this->show('categories', $this->data);
        if (!$this->category) {
            return false;
        }else {
            return $this->category;
        }
    }

    public function deleteCategory($id) {
        $this->conditions = "id = $id";
        $this->category = $this->delete('categories', $this->conditions);
        if (!$this->category) {
            return false;
        }else {
            return $this->category;
        }
    }

    
}
?>