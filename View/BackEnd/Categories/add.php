<?php
    include('Controller/CategoryController.php');
    $Categories = new CategoryController();
?>
<form class="form-horizontal form-material" method="POST">
    <div class="form-group">
        <label class="col-md-12">Code</label>
        <div class="col-md-12">
            <input type="text" name="code" placeholder="Drk_001" class="form-control form-control-line" required="true" >
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-12">Name</label>
        <div class="col-md-12">
            <input type="text" name="name" placeholder="Starter" class="form-control form-control-line" required="true" >
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-12">Parent Categories</label>
        <div class="col-sm-12">
            <select class="form-control form-control-line" name="parent_id">
                <option value="<?php echo 0 ?>">No parent</option>}
                <?php
                     $parent_category = $Categories->indexCategory();
                     foreach ($parent_category as $key => $parent) {
                ?>
                <option value="<?php echo $parent['id']?>"><?php echo $parent['name']?></option>
                <?php
                     }
                ?>
            </select>
        </div>
    </div>
    <!-- Hidden input -->
    <input type="hidden" name="id" >
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

        $id = $Categories->handleDataBeforeSave($_POST['id']);
        $code =$Categories->handleDataBeforeSave($_POST['code']);
        $name = $Categories->handleDataBeforeSave($_POST['name']);
        $parent_id = $Categories->handleDataBeforeSave($_POST['parent_id']);
        $created_at = $Categories->handleDataBeforeSave($_POST['created_at']);
        $updated_at = $Categories->handleDataBeforeSave($_POST['updated_at']);

        $Categories->addCategory($id, $code, $name, $parent_id, $created_at, $updated_at);
        
    }

?>