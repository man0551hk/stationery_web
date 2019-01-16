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
                    if (isset($_GET["id"])) {
                        $id = $_GET["id"];
                        $productClass->GetProductDetail($id);
                    }
                ?>
            </div>
        </div>
    </div>
</section>

<?php
require_once __DIR__ . '/footer.php';
?>