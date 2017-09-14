<!DOCTYPE html>
<html lang="en">
 <head>
 <title>DN - FoodyStreet | Home</title>
 <meta charset="utf-8">
 <link rel="icon" href="Webroot/images/favicon.ico">
 <script>
    $(document).ready(function(){
      $( ".block1" ).mouseover(function() {
        $(this).addClass( "blur" );
      });
      $( ".block1" ).mouseout(function() {
        $(this).removeClass( "blur" );
      });
      $().UItoTop({ easingType: 'easeOutQuart' });
    }) 
 </script>
 <!--[if lt IE 8]>
   <div style=' clear: both; text-align:center; position: relative;'>
     <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
       <img src="Webroot/http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
     </a>
  <![endif]-->
  <!--[if lt IE 9]>

    <script src="Webroot/js/html5shiv.js"></script>
    <link rel="stylesheet" media="screen" href="Webroot/css/ie.css">
  <![endif]-->
  <!--[if lt IE 10]>
    <link rel="stylesheet" media="screen" href="Webroot/css/ie1.css">
  <![endif]-->

 </head>
 <?php include("View/frontend/layouts/static_header.php"); ?>
 <body class="page1">
    <?php include("View/frontend/layouts/header.php"); ?>
    <?php include("View/frontend/home.php"); ?>
    <?php include("View/frontend/layouts/footer.php"); ?>  
 </body>

</html>
<script>
    $(document).ready(function(){ 
       $(".bt-menu-trigger").toggle( 
        function(){
          $('.bt-menu').addClass('bt-menu-open'); 
        }, 
        function(){
          $('.bt-menu').removeClass('bt-menu-open'); 
        } 
      ); 
    }) 
</script>