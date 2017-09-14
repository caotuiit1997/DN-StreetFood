<?php
    include('Controller/CategoryController.php');
    $Categories = new CategoryController();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $Categories_data = $Categories->viewCategory($id);
        if ($Categories_data != NULL) {

?>
<form class="form-horizontal form-material" method="POST">
    <div class="form-group">
        <?php foreach ($Categories_data as $key => $category) {
            ?>
        <label class="col-md-12">Code</label>
        <div class="col-md-12">
            <input type="text" name="code" placeholder="Drk_001" class="form-control form-control-line" required="true" value="<?php echo $category['code']; ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-12">Name</label>
        <div class="col-md-12">
            <input type="text" name="name" placeholder="Starter" class="form-control form-control-line" required="true"  value="<?php echo $category['name']; ?>">
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
        $code =$Categories->handleDataBeforeSave($_POST['code']);
        $name = $Categories->handleDataBeforeSave($_POST['name']);
        $parent_id = $Categories->handleDataBeforeSave($_POST['parent_id']);
        // $created_at = $Categories->handleDataBeforeSave($_POST['created_at']);
        $updated_at = $Categories->handleDataBeforeSave($_POST['updated_at']);

        $Categories->editCategory($id, $code, $name, $parent_id, $updated_at);
        
    }

?>