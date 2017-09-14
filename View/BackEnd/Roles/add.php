<?php
     include('Controller/RoleController.php');
     $Roles = new RoleController();
?>
<form class="form-horizontal form-material" method="POST">
    <div class="form-group">
        <label class="col-md-12">Role</label>
        <div class="col-md-12">
            <input type="text" name="name" placeholder="Admin" class="form-control form-control-line"> </div>
    </div>

    <div class="form-group">
        <label class="col-md-12">Description</label>
        <div class="col-md-12">
            <textarea rows="5" placeholder="This is ..." class="form-control form-control-line" name="description"></textarea>
        </div>
    </div>
    <!-- Hidding input -->
    <input type="hidden" name="id">
    <input type="hidden" name="created_at" value="<?php echo date("Y-m-d h:i:sa"); ?>">
    <input type="hidden" name="updated_at" value="<?php echo date("Y-m-d h:i:sa"); ?>">
    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit" name="submit" class="btn btn-success">Add</button>
            <button type="reset" class="btn btn-warning">Cancel</button>
        </div>
    </div>
</form>
<?php
    if (isset($_POST['submit'])) {

        $id = $Roles->handleDataBeforeSave($_POST['id']);
        $name = $Roles->handleDataBeforeSave($_POST['name']);
        $description = $Roles->handleDataBeforeSave($_POST['description']);
        $created_at = $Roles->handleDataBeforeSave($_POST['created_at']);
        $updated_at = $Roles->handleDataBeforeSave($_POST['updated_at']);

        $Roles->addRole($id, $name, $description, $created_at, $updated_at);
        
    }

?>