<?php
// AppModel
include_once('Config/database.php');
class AppModel extends db {

    public $insert;
    public $show;
    public $update;
    public $view;
    public $delete;
    public $conditions;

    public function insert($table, $fields, $data) {
        $this->insert = "INSERT INTO $table($fields) VALUES($data)";
        if (!$this->insert) {
            return false;
        }else {
            return $this->insert;
        }
    }

    public function update($table, $data, $conditions) {
        $this->update = "UPDATE $table SET $data WHERE $conditions";
        if (!$this->update) {
            return false;
        }else {
            return $this->update;
        }
    }

    public function show($table, $data) {
        $this->show = "SELECT $data FROM $table ORDER BY id DESC";
        if (!$this->show) {
            return false;
        }else {
            return $this->show;
        }
    }

    public function view($table, $data, $conditions) {
        $this->view  = "SELECT $data FROM $table WHERE $conditions";
        if (!$this->view) {
            return false;
        }else {
            return $this->view;
        }
    }

    public function delete($table, $conditions) {
        $this->delete = "DELETE FROM $table WHERE $conditions";
        if (!$this->delete) {
            return false;
        }else {
            return $this->delete;
        }
    }
}
?>