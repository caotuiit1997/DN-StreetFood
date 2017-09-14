<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
  <h4 class="page-title">
  	<?php
  	if (isset($_GET['controller']) && isset($_GET['action'])) {
        $controller = $_GET['controller'];
        $action = $_GET['action'];
        echo ucfirst($controller)." - ".ucfirst($action);
    }else {
    	echo "DASHBOARD";
    }
  	?>
  </h4>
 </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <?php if (isset($_GET['controller'])) { ?>
    <a href="?controller=<?php echo $controller;?>&action=add" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"> Add</a>
    <?php
          }
    ?>
    <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li class="active">
        <?php
            if(isset($controller)) {
            ?>
            <a href="?controller=<?php echo $controller;?>&action=index" title="Back"><?php echo ucfirst($controller);?></a>
            <?php
            }else {
            	echo "Home";
            }
        ?>         	
         </li>
    </ol>
</div>
<!-- /.col-lg-12 -->