<div class="container-fluid">
    <div class="row bg-title">
        <?php include("page_title.php"); ?>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title"><?php ?></h3>
                <!-- Content -->
                 <?php
                    include ("Controller/PageController.php");
                    $content = new PageController();
                    if (isset($_GET['controller']) && isset($_GET['action'])) {
                        $controller = $_GET['controller'];
                        $action = $_GET['action'];
                        $content->getBackendContent($controller, $action);
                    }else {
                        include("Layouts/home.php");
                    }
                  ?> 
            </div>      
        </div>
    </div>
</div>