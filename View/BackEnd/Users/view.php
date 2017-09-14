<?php
    include('Controller/UserController.php');
    $Users= new UserController();
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $Users_data = $Users->viewUser($id);
        if ($Users_data != NULL) {
?>
<!-- .row -->
<div class="row">
    <div class="col-md-4 col-xs-12">
        <div class="white-box">
            <div class="user-bg">
            <?php
                foreach($Users_data as $key => $user) {
            ?>
            <img width="100%" alt="user" src="<?php echo 'Webroot/files/User/'.$user['name'].'/'.$user['image']; ?>">
                <div class="overlay-box">
                    <div class="user-content">
                        <a href="javascript:void(0)"><img src="<?php echo 'Webroot/files/User/'.$user['name'].'/'.$user['image']; ?>" class="thumb-lg img-circle" alt="img"></a>
                        <h3 class="text-white"><?php echo $user['name']; ?></h3>
                        <h5 class="text-white"><?php echo $user['email']; ?></h5> </div>
                </div>
            </div>
            <div class="user-btm-box">
                <div class="col-md-6 col-sm-6 text-center">
                    <p class="text-purple">Active</p>
                    <h2><?php echo ($user['status'] == 0) ? "Inactive": "Active"; ?></h2> </div>
                <div class="col-md-6 col-sm-6 text-center">
                    <p class="text-blue">Role</p>
                    <h2><?php echo $user['role_id']; ?></h2> </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-xs-12">
        <div class="white-box">
            <form class="form-horizontal form-material">
                
                <div class="form-group">
                    <label class="col-md-12">Date of birth</label>
                    <div class="col-md-12">
                        <input type="text" value="<?php echo $user['dob']; ?>" class="form-control form-control-line" disabled="true"> </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Phone No</label>
                    <div class="col-md-12">
                        <input type="text" value="<?php echo $user['phone']; ?>" class="form-control form-control-line" disabled="true"> </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Address</label>
                    <div class="col-md-12">
                        <input type="text" value="<?php echo $user['address']; ?>" class="form-control form-control-line" disabled="true"> </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <a class="btn btn-info" href="?controller=Users&action=edit&id=<?php echo $user['id'];?> " title="Edit">Edit</a>
                        <a class="btn btn-danger" href="?controller=Users&action=delete&id=<?php echo $user['id'];?> " title="Delete">Delete</a>
                    </div>
                </div>
                <?php
                     } //End of foreach
                    } //End of if check data null or not
                   } //End of if get id
                ?>
            </form>
        </div>
    </div>
</div>
<!-- /.row -->