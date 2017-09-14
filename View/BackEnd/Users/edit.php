<?php
    include('Controller/UserController.php');
    include('Controller/RoleController.php');

    $Roles = new RoleController();
    $Roles_data = $Roles->indexRole();

    $Users = new UserController();
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $Users_data = $Users->viewUser($id);
        if ($Users_data != NULL) {

?>
<form class="form-horizontal form-material" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <?php
            foreach ($Users_data as $key => $user) {
        ?>
        <label class="col-md-12">Full Name</label>
        <div class="col-md-12">
            <input type="text" name="name" placeholder="Johnathan Doe" class="form-control form-control-line" required="true" value="<?php echo $user['name']?>"> </div>
    </div>

    <div class="form-group">
        <label for="example-email" class="col-md-12">File</label>
        <div class="col-md-12">
            <input type="file" name="image" class="form-control form-control-line" required="true"> </div>
    </div>

    <div class="form-group">
        <label for="example-email" class="col-md-12">Email</label>
        <div class="col-md-12">
            <input type="email" name="email" placeholder="johnathan@admin.com" class="form-control form-control-line" required="true" value="<?php echo $user['email']?>"> </div>
    </div>

    <div class="form-group">
        <label class="col-md-12">Password</label>
        <div class="col-md-12">
            <input type="password" name="password" value="<?php echo $user['password']?>"" class="form-control form-control-line" required="true"  min="6" max="32"> </div>
    </div>

    <div class="form-group">
        <label class="col-md-12">Confirm Password</label>
        <div class="col-md-12">
            <input type="password" name="confirm_password" value="" class="form-control form-control-line" required="true"> </div>
    </div>
    
    <div class="form-group">
        <label class="col-md-12">Date of birth</label>
        <div class="col-md-12">
            <input type="date" name="dob" placeholder="25/09/1997" class="form-control form-control-line" required="true" value="<?php echo $user['dob']?>"> </div>
    </div>

    <div class="form-group">
        <label class="col-md-12">Phone No</label>
        <div class="col-md-12">
            <input type="text"  name="phone" placeholder="123 456 7890" class="form-control form-control-line" required="true" value="<?php echo $user['phone']?>"> </div>
    </div>

    <div class="form-group">
        <label class="col-md-12">Address</label>
        <div class="col-md-12">
            <input type="text" name="address" placeholder="267 Washington DC" class="form-control form-control-line" required="true" value="<?php echo $user['address']?>"> </div>
    </div>

    <div class="form-group">
        <label class="col-sm-12">Role</label>
        <div class="col-sm-12">
            <select class="form-control form-control-line" name="role_id">
                <?php
                foreach ($Roles_data as $key => $role) {
                ?>
                <option value="<?php echo $role['id'];?>"><?php echo $role['name'];?></option>
                <?php
                }
                ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-12">Activate</label>
        <div class="col-md-12">
            <input type="checkbox" checked="true" name="status">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit" name="submit" class="btn btn-success">Add</button>
            <button type="reset" class="btn btn-warning">Cancel</button>
        </div>
    </div>
    <!-- Hidden input -->
    <input type="hidden" name="id" >
    <input type="hidden" name="updated_at" value="<?php echo date("Y-m-d h:i:sa"); ?>">
</form>
<?php
            }
        }
    }
    if (isset($_POST['submit'])) {

        $name = $Users->handleDataBeforeSave($_POST['name']);
        $dob = $Users->handleDataBeforeSave($_POST['dob']);
        $address = $Users->handleDataBeforeSave($_POST['address']);
        $email = $Users->handleDataBeforeSave($_POST['email']);
        $password = $Users->handleDataBeforeSave($_POST['password']);
        $phone = $Users->handleDataBeforeSave($_POST['phone']);
        $confirm_password = $Users->handleDataBeforeSave($_POST['confirm_password']);
        $role_id = $Users->handleDataBeforeSave($_POST['role_id']);
        $updated_at = $Users->handleDataBeforeSave($_POST['updated_at']);
        $status = $Users->handleDataBeforeSave($_POST['status']);

        $unloaded_image = $_FILES['image']['name'];
        $image = $Users->uploadImage('User',$name, $unloaded_image);

        if ($password === $confirm_password) {
            if ($status === 'On') {
                $status = 1;
            }else {
                $status = 0;
            }
            $Users->editUser($id, $name, $image, $dob, $address, $email, $password, $phone, $role_id, $updated_at, $status);
        }else {
            echo "<script>alert('Confirm password is not correct');</script>";
        }
        
    }

?>