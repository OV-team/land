<?php ob_start();?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <title>RISE-Multipurpose Html Template</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <!-- Bootstrap Css -->
    <link href="bootstrap-assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Style -->
    <link href="plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="plugins/owl-carousel/owl.theme.css" rel="stylesheet">
    <link href="plugins/owl-carousel/owl.transitions.css" rel="stylesheet">
    <link href="plugins/Icons/et-line-font/style.css" rel="stylesheet">
    <link href="plugins/animate.css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <!-- Icons Font -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet/less" type="text/css" href="css/blocks.less" />

</head>

<body>
    <!-- Preloader -->
    <div class="preloader"><i class="fa fa-circle-o-notch fa-spin fa-2x"></i></div>
    <!-- /Preloader -->

     <!-- block menu -->
    <?php include 'blocks/menu.php';?>
    <!-- /block menu -->

     <!-- header menu -->
    <?php include 'blocks/header.php';?>
    <!-- /header menu -->

    <!-- products menu -->
    <?php include 'blocks/products.php';?>
    <!-- /products menu -->

    <!-- how menu -->
    <?php include 'blocks/how.php';?>
    <!-- /how menu -->

    <!-- feautures menu -->
    <?php include 'blocks/feautures.php';?>
    <!-- /feautures menu -->

    <!-- certificates menu -->
    <?php include 'blocks/certificates.php';?>
    <!-- /certificates menu -->

    <!-- portfolio menu -->
    <?php include 'blocks/portfolio.php';?>
    <!-- /portfolio menu -->

   <!-- custom menu -->
    <?php include 'blocks/custom.php';?>
    <!-- /custom menu -->

    <!-- countdown menu -->
    <?php include 'blocks/countdown.php';?>
    <!-- /countdown menu -->


    <!-- team menu -->
    <?php include 'blocks/team.php';?>
    <!-- /team menu -->


    <!-- testimonials menu -->
    <?php include 'blocks/testimonials.php';?>
    <!-- /testimonials menu -->


    <!-- contact menu -->
    <?php include 'blocks/contact.php';?>
    <!-- /contact menu -->


    <!-- mapLocation menu -->
    <?php include 'blocks/mapLocation.php';?>
    <!-- /mapLocation menu -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="bootstrap-assets/js/bootstrap.min.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/less.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/blocks.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <!-- JS PLUGINS -->
    <script src="plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="plugins/waypoints/jquery.waypoints.min.js"></script>
    <script src="plugins/countTo/jquery.countTo.js"></script>
    <script src="plugins/inview/jquery.inview.min.js"></script>
    <script src="plugins/WOW/dist/wow.min.js"></script>


</body>

</html>

<?php
$content = ob_get_clean();
$content = str_replace('~{title}~', 'example title', $content);
$image = str_replace('~{img}~', 'img/sliders/Slide.jpg', $content);
echo $image;
?>