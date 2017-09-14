<?php
    include('Controller/CategoryController.php');
    $Categories = new CategoryController();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $Categories_data = $Categories->viewCategory($id);
        if ($Categories_data != NULL) {
?>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>Name</th>
                <th>Parent Category</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1; 
                foreach($Categories_data as $key => $category) {
            ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $category['code'];?></td>
                <td><?php echo $category['name'];?></td>
                <td>
                <?php
                    if ($category['parent_id'] == 0) {
                        echo "No parent";
                    }else {
                        $parent_categories = $Categories->viewCategory($category['parent_id']);
                        foreach ($parent_categories as $key => $parent) {
                        ?>
                        <a href='?controller=Categories&action=view&id=<?php echo $parent['id'];?>'><?php echo $parent['name']; ?></a>
                        <?php
                        }
                    }
                ?>
                </td>
                <td><?php echo $category['created_at'];?></td>
                <td><?php echo $category['updated_at'];?></td>
                <td>
                    <a class="btn btn-info" href="?controller=Categories&action=edit&id=<?php echo $category['id'];?>" title="Edit">Edit</a>
                    <a class="btn btn-danger" href="?controller=Categories&action=delete&id=<?php echo $category['id'];?>" title="Delete">Delete</a>
                </td>
            </tr>
            <?php
                $i++;
                }
            }
        }
            ?>
        </tbody>
    </table>
</div>