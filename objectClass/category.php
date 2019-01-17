<?php
class CategoryClass {
    var $domain;
    var $link;
    function __construct( $domain, $link) {
        $this->domain = $domain;
        $this->link = $link;
    }
    function GetCategoryMenu() {
        $query = "select count(*) as total, c.cat_id, c.name from category c inner join product p on p.cat_id = c.cat_id group by c.cat_id";
        $result = mysqli_query($this->link, $query);
        $topMenu = '';
        $sideMenu = '';
        while ($row = mysqli_fetch_array($result)) {
            $topMenu .= '<li><a href="'.$this->domain.'category/'.$row["cat_id"].'/">'.$row["name"].'</a></li>';
            $sideMenu .= '<div class="panel panel-default">';
            $sideMenu .= '<div class="panel-heading">';
            $sideMenu .= '<h4 class="panel-title"><a href="'.$this->domain.'category/'.$row["name"].'/">'.$row["name"].' ('.$row["total"].')</a></h4>';
            $sideMenu .= '</div>';
            $sideMenu .= '</div>';
        }
        return [$topMenu, $sideMenu];
    }
}
$categoryClass = new CategoryClass($domain, $link);
?>