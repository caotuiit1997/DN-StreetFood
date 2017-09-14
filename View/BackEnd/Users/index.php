<?php
    include('Controller/UserController.php');
    $Users= new UserController();
    $Users_data = $Users->indexUser();
    if ($Users_data != NULL) {
?>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1; 
                foreach ($Users_data as $key => $user) {
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['address']; ?></td>
                <td><?php echo $user['phone']; ?></td>
                <td><?php echo $user['role_id']; ?></td>
                <td><?php echo $user['created_at']; ?></td>
                <td><?php echo $user['updated_at']; ?></td>
                <td>
                <?php
                     if ($user['status'] == 0) {
                        echo "Inactive";
                     }else {
                        echo "Active";
                     }
                 ?>
                 </td>
                <td>
                    <a class="btn btn-primary" href="?controller=Users&action=view&id=<?php echo $user['id'];?> " title="Edit">View</a>
                    <a class="btn btn-info" href="?controller=Users&action=edit&id=<?php echo $user['id'];?> " title="Edit">Edit</a>
                    <a class="btn btn-danger" href="?controller=Users&action=delete&id=<?php echo $user['id'];?> " title="Delete">Delete</a>
                </td>
            </tr>  
            <?php
                $i++;
                }
            }
            ?>
            </tr>
        </tbody>
    </table>
</div>