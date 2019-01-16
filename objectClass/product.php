<?php
class ProductClass {
    var $domain;
    var $link;
    function __construct( $domain, $link) {
        $this->domain = $domain;
        $this->link = $link;
    }
    function GetFrontProduct() {
        $query = "select * from product order by rand() limit 15";
        $result = mysqli_query($this->link, $query);
        while ($row = mysqli_fetch_array($result)) {
            echo '<div class="col-sm-4">';
            echo '<div class="product-image-wrapper"  style = "min-height:392px;">';
            echo '<div class="single-products">';
            echo '<div class="productinfo text-center">';
            echo '<a href = "'.$this->domain.'product/'.$row["id"].'/">';
            echo '<img src="'.$this->domain.$row["path"].'" alt="" height="196"/>';
            echo '</a>';
            echo '<h2>$'.$row["price"].'</h2>';
            echo '<p>'.$row["name"].'</p>';
            echo '<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>加入購物車</a>';
            echo '</div>';
            // echo '<div class="product-overlay">';
            //     echo '<div class="overlay-content">';
            //         echo '<h2>$'.$row["price"].'</h2>';
            //         echo '<p>'.$row["name"].'</p>';
            //         echo '<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>加入購物車</a>';
            //     echo '</div>';
            // echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';     
        }
    }

    function GetProductDetail($id) {
        $query = "select p.name, p.path, p.id, c.name as catname, b.name_en from product p inner join brand b on b.brand_id = p.brand_id inner join category c on c.cat_id = p.cat_id where id = '$id'";
        $result = mysqli_query($this->link, $query);
        if ($row = mysqli_fetch_array($result)) {
           
            echo '<div class="product-details">';
            echo '<div class="col-sm-6">';
                echo '<div class="view-product">';
                    echo '<img src="'.$this->domain.$row["path"].'" alt="" />';
                echo '</div>';
            echo '</div>';
            echo '<div class="col-sm-6">';
            echo '<div class="product-information">';
                echo '<h2>'.$row["name"].'</h2>';
                echo '<span>';
                echo '<span>HK $'.$row["price"].'</span>';
                echo '<label>數量:</label>';
                echo '<input type="text" value="" />';
                echo '<button type="button" class="btn btn-fefault cart">';
                echo '<i class="fa fa-shopping-cart"></i>/';
                echo '加入購物車';
                echo '</button>';
                echo '</span>';
                echo '<p><b>分類:</b> '.$row["catname"].'</p>';
                echo '<p><b>品牌:</b> '.$row["name_en"].'</p>';
                   
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }    
}
$productClass = new ProductClass($domain, $link);
?>

