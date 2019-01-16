<?php
class BrandClass {
    var $domain;
    var $link;
    function __construct( $domain, $link) {
        $this->domain = $domain;
        $this->link = $link;
    }
    function GetBrandMenu() {
        $query = "select count(*) as total, b.brand_id, b.name_en from brand b inner join product p on p.brand_id = b.brand_id group by b.brand_id order by total desc limit 20";
        $result = mysqli_query($this->link, $query);
        $topMenu = '';
        $sideMenu = '';
        while ($row = mysqli_fetch_array($result)) {
            $topMenu .= '<li><a href="'.$this->domain.'brand/'.$row["brand_id"].'/">'.$row["name_en"].'</a></li>';
            $sideMenu .= '<li><a href="'.$this->domain.'brand/'.$row["brand_id"].'/"> <span class="pull-right">('.$row["total"].')</span>'.$row["name_en"].'</a></li>';
        }
        return [$topMenu, $sideMenu];
    }
}
$brandClass = new BrandClass($domain, $link);
?>