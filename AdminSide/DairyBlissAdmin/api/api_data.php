<?php
    include("connect.php");
    $q="select * from tbl_banner where status=1";
    $result=$conn->query($q);
    $banner_array=array();
    $category_array=array();

    while( $row=mysqli_fetch_assoc($result) ){
        array_push($banner_array,$row);
    }

    $q="select * from tbl_category";
    $result=$conn->query($q);
    while( $row=mysqli_fetch_assoc($result) ){
        array_push($category_array,$row);
    }

  
    $coupon_array=array();
    $q="select * from tbl_coupon";
    $result=$conn->query($q);
    while( $row=mysqli_fetch_assoc($result) ){
        array_push($coupon_array,$row);
    }

    $product_array=array();
    $q="select * from tbl_product";
    $result=$conn->query($q);
    while( $row=mysqli_fetch_assoc($result) ){
        array_push($product_array,$row);
    }

    $q="select * from tbl_user";
    $result=$conn->query($q);
    $user_data=mysqli_fetch_assoc($result);

    $response= json_encode([
        "status"=>true,
        "message"=>"Getting Data",
        "banner_data"=>$banner_array,
        "category_data" =>$category_array,
        "coupon_data"=>$coupon_array,
        "product_data"=>$product_array,
   ]);
    echo $response;
    $conn->close();







?>