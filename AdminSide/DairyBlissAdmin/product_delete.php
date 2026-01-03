<?php
    include('connect.php');
    $id=$_GET['x'];
    $q=mysqli_query($conn,"delete from tbl_product where pid=$id");
    if ($q) {
        echo"<script>alert('Deleted')
        window.location.href='product.php'</script>";
    }
    else{
        echo"<script>alert('Not Deleted')</script>";
    }
?>
