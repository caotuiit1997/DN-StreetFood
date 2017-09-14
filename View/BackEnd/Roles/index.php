<?php
    include('Controller/RoleController.php');
    $Roles= new RoleController();
    $Roles_data = $Roles->indexRole();
    if ($Roles_data != NULL) {
?>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Role</th>
                <th>Description</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1; 
                foreach ($Roles_data as $key => $role) {
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $role['name'];?></td>
                <td><?php echo $role['description'];?></td>
                <td><?php echo $role['created_at'];?></td>
                <td><?php echo $role['updated_at'];?></td>
                <td>
                    <a class="btn btn-primary" href="?controller=Roles&action=view&id=<?php echo $role['id'];?> " title="Edit">View</a>
                    <a class="btn btn-info" href="?controller=Roles&action=edit&id=<?php echo $role['id'];?> " title="Edit">Edit</a>
                    <a class="btn btn-danger" href="?controller=Roles&action=delete&id=<?php echo $role['id'];?> " title="Delete">Delete</a>
                </td>
            </tr>  
            <?php
                $i++;
                }
            }
            ?>
        </tbody>
    </table>
</div>