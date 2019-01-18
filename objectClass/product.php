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
            $this->PrintProduct($row["id"], $row["path"], $row["price"], $row["name"]);
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
                echo '<input type="text" value="1" />';
                echo '<button type="button" class="btn btn-fefault cart">';
                echo '<i class="fa fa-shopping-cart"></i>';
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
    
    function GetCategoryProduct($category, $page, $keyword) {
        $offset = ($page - 1) * 15;  
        $query = "select p.id, p.path, p.price, p.name from product p inner join category c on p.cat_id = c.cat_id where c.name = '$category' ";
        if ($keyword != '') {
            $query .= " and p.name like '%$keyword%' ";
        }
        $query .= " order by p.id desc limit $offset, 15";
        $result = mysqli_query($this->link, $query);
        while ($row = mysqli_fetch_array($result)) {
            $this->PrintProduct($row["id"], $row["path"], $row["price"], $row["name"]);  
        }

        $query = "select count(*) as total from product p inner join category c on p.cat_id = c.cat_id where c.name = '$category'";
        if ($keyword != '') {
            $query .= " and p.name like '%$keyword%' ";
        }
        $result = mysqli_query($this->link, $query);
        $total = 0;
        $pages = '';
        $previous = '<a href = "'.$this->domain.'category/'.$category.'/&page='.($page - 1);
        if ($keyword != '') {
            $previous .= '&keyword='.$keyword;
        }
        $previous .= '">上一頁</a> ';
        $next = ' <a href = "'.$this->domain.'category/'.$category.'/&page='.($page + 1);
        if ($keyword != '') {
            $next .= '&keyword='.$keyword;
        }
        $next .= '">下一頁</a>';
        if ($row = mysqli_fetch_array($result)) {
            $total = $row["total"];
            $totalPage = $total / 15;
        }
        if ($page > 1) {
            $pages .= $previous;
        } else {
            $pages .= '<a href = "" style = "cursor: not-allowed;color:gray;"> 上一頁 </a>';
        }
        $pages .= '第'.$page.'頁';
        if ($page < $totalPage) {
            $pages .= $next;
        } else {
            $pages .= '<a href = "#" style = "cursor: not-allowed;color:gray;"> 下一頁 </a>';
        }

        return $pages;
    }

    function GetBrandProduct($brand, $page) {
        $offset = ($page - 1) * 15;  
        $query = "select p.id, p.path, p.price, p.name from product p inner join brand b on p.brand_id = b.brand_id where b.name_en = '$brand'";
        if ($keyword != '') {
            $query .= " and p.name like '%$keyword%' ";
        }
        $query .= " order by p.id desc limit $offset, 15";
        $result = mysqli_query($this->link, $query);
        while ($row = mysqli_fetch_array($result)) {
            $this->PrintProduct($row["id"], $row["path"], $row["price"], $row["name"]);   
        }

        $query = "select count(*) as total from product p inner join brand b on p.brand_id = b.brand_id where b.name_en = '$brand'";
        if ($keyword != '') {
            $query .= " and p.name like '%$keyword%' ";
        }
        $result = mysqli_query($this->link, $query);
        $total = 0;
        $pages = '';
        $previous = '<a href = "'.$this->domain.'brand/'.$brand.'/&page='.($page - 1);
        if ($keyword != '') {
            $previous .= '&keyword='.$keyword;
        }
        $previous .= '">上一頁</a> ';
        $next = ' <a href = "'.$this->domain.'brand/'.$brand.'/&page='.($page + 1);
        if ($keyword != '') {
            $next .= '&keyword='.$keyword;
        }
        $next .= '">下一頁</a>';
        if ($row = mysqli_fetch_array($result)) {
            $total = $row["total"];
            $totalPage = $total / 15;
        }
        if ($page > 1) {
            $pages .= $previous;
        } else {
            $pages .= '<a href = "" style = "cursor: not-allowed;color:gray;"> 上一頁 </a>';
        }
        $pages .= '第'.$page.'頁';
        if ($page < $totalPage) {
            $pages .= $next;
        } else {
            $pages .= '<a href = "#" style = "cursor: not-allowed;color:gray;"> 下一頁 </a>';
        }

        return $pages;        
    }
    
    function PrintProduct($id, $path, $price, $name) {
        echo '<div class="col-sm-4">';
        echo '<div class="product-image-wrapper"  style = "min-height:392px;">';
        echo '<div class="single-products">';
        echo '<div class="productinfo text-center">';
        echo '<a href = "'.$this->domain.'product/'.$id.'/">';
        echo '<img src="'.$this->domain.$path.'" alt="" height="196"/>';
        echo '</a>';
        echo '<h2>$'.$price.'</h2>';
        echo '<p>'.$name.'</p>';
        echo '<a href="javascript:AddToCart('.$id.', 1);" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>加入購物車</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';   
    }
}
$productClass = new ProductClass($domain, $link);
?>

