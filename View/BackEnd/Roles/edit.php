<?php
    include('Controller/RoleController.php');
    $Roles = new RoleController();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $Roles_data = $Roles->viewRole($id);
        if ($Roles_data != NULL) {

?>
<form class="form-horizontal form-material" method="POST">
    <div class="form-group">
        <?php foreach ($Roles_data as $key => $role) {
            ?>
        <label class="col-md-12">Role</label>
        <div class="col-md-12">
            <input type="text" name="name" placeholder="Admin" class="form-control form-control-line" value="<?php echo $role['name']?>"> </div>
    </div>

    <div class="form-group">
        <label class="col-md-12">Description</label>
        <div class="col-md-12">
            <textarea rows="5" placeholder="<?php echo $role['description']?>" class="form-control form-control-line" name="description"></textarea>
        </div>
    </div>
    <!-- Hidding input -->
    <input type="hidden" name="updated_at" value="<?php echo date("Y-m-d h:i:sa"); ?>">
    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit" name="submit" class="btn btn-success">Update</button>
            <button type="reset" class="btn btn-warning">Cancel</button>
        </div>
    </div>
</form>
<?php
            }
        }
    }
    if (isset($_POST['submit'])) {
        $name = $Roles->handleDataBeforeSave($_POST['name']);
        $description = $Roles->handleDataBeforeSave($_POST['description']);
        $updated_at = $Roles->handleDataBeforeSave($_POST['updated_at']);

        $Roles->editRole($id, $name, $description, $updated_at);
        
    }

?>