<?php
session_start();
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/objectClass/category.php';
require_once __DIR__ . '/objectClass/brand.php';
require_once __DIR__ . '/objectClass/product.php';
$categoryMenu = $categoryClass->GetCategoryMenu();
$brandMenu = $brandClass->GetBrandMenu();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Hung Hing Stationery Shop 鴻興文具</title>
    <link href="<?=$domain?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=$domain?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=$domain?>css/prettyPhoto.css" rel="stylesheet">
    <link href="<?=$domain?>css/price-range.css" rel="stylesheet">
    <link href="<?=$domain?>css/animate.css" rel="stylesheet">
	<link href="<?=$domain?>css/main.css" rel="stylesheet">
	<link href="<?=$domain?>css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?=$domain?>images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=$domain?>images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=$domain?>images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=$domain?>images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?=$domain?>images/ico/apple-touch-icon-57-precomposed.png">

    <style>
        @media (max-width: 480px) {
            .left-sidebar {
                display:none;
            }
        }
    </style>
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
                            <a href="<?=$domain;?>" style = 'font-size:15px;font-family:arial;font-weight:bold; color: gray'>
                            Hung Hing Stationery 鴻興文具
                            </a>
                            <!-- <img src="images/home/logo.png" alt="" /> -->
						</div>
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<!-- <li><a href=""><i class="fa fa-user"></i> Account</a></li>
								<li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li> -->
								<li><a href="<?=$domain?>cart/"><i class="fa fa-shopping-cart"></i> 購物車 (<span id = "cartTotal">0</span>)</a></li>
								<!-- <li><a href="login.html"><i class="fa fa-lock"></i> Login</a></li> -->
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?=$domain?>"
								<?php
									if (strpos($_SERVER['PHP_SELF'], 'index.php') !== false) {
										echo 'class="active"';
									}
								?>
								>主頁</a></li>
								<li class="dropdown">
									<a href="#"
									<?php
									if (isset($_GET["category"])) {
										echo 'class="active"';
									}
									?>
									>分類<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <?=$categoryMenu[0] ?>
                                    </ul>
                                </li> 
								<li class="dropdown">
									<a href="#"
									<?php
									if (isset($_GET["brand"])) {
										echo 'class="active"';
									}
									?>
									>品牌<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <?=$brandMenu[0] ?>
                                    </ul>
                                </li> 
								
								<li><a href="<?=$domain?>contact/">聯絡我們</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" id = "keyword" placeholder="關鍵字"/>
							<a herf = '#' onclick = 'Search("<?=$_GET["category"]?>", "<?=$_GET["brand"]?>", keyword.value);' class = 'btn btn-default'>搜尋</a>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
    </header><!--/header-->
	

	



	    