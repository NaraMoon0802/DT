<?php
namespace product\lib;

class Image{
public static imageFileUp($img_name, $tmp_name){
    move_uploaded_file($tmp_name, "../images/upload/".$img_name);
    $url = "http://localhost/DT/product/images/upload/".$img_name;
    return $url;
}
}
?>