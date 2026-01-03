<?php
    include('connect.php');
    $id=$_GET['x'];
    $q=mysqli_query($conn,"delete from tbl_category where id=$id");
    if ($q) {
        echo"<script>alert('Deleted')
        window.location.href='category.php'</script>";
    }
    else{
        echo"<script>alert('Not Deleted')</script>";
    }
?>
