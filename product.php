<?php
require_once __DIR__ . '/header.php';
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>分類</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <?=$categoryMenu[1] ?>
                    </div><!--/category-products-->
                
                    <div class="brands_products"><!--brands_products-->
                        <h2>品牌</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <?=$brandMenu[1] ?>
                            </ul>
                        </div>
                    </div><!--/brands_products-->
                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <?php 
                    $page = 1;
                    if ($_GET["page"]) {
                        $page = $_GET["page"];
                    }
                    $keyword = '';
                    if ($_GET["keyword"]) {
                        $keyword = $_GET["keyword"];
                    }
                    if ($_GET["category"]) {
                        $pages = $productClass->GetCategoryProduct(str_replace('/', '', $_GET["category"]), $page, $keyword);
                    } else if ($_GET["brand"]) {
                        $pages = $productClass->GetBrandProduct(str_replace('/', '', $_GET["brand"]), $page, $keyword);
                    }
                ?>
                <div class="row">
                    <div class="col-sm-12" style = "text-align:center;">
                        <?=$pages ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?php
require_once __DIR__ . '/footer.php';
?>