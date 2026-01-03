<?php
    include("connect.php");

    if
    ( 
    isset($_POST["email"]) &&
    
    isset($_POST["password"])
    )
    {
    
        $email=$conn->real_escape_string($_POST["email"]);
        
        $password=  $conn->real_escape_string($_POST["password"]);

        $sql="select * from tbl_user where email='$email' AND password='$password'";

        $response;
        if(mysqli_num_rows($conn->query($sql))>0)
        {
            $arr=mysqli_fetch_assoc($conn->query($sql));
            $response= json_encode([
                "status"=>true,
                "message"=>"Login Successfully",
                "person"=> $arr,
            ]);
        }
        else
        {
            $response= json_encode([
                "status"=> false,
                "message"=>"Invalid email or pass",
            ]);
        }
    }
    else
    {
        $response= json_encode([
            "status"=>false,
            "message"=> "Insuficient parameters",
            "person"=>null
        ]);
    }
    $conn->close();
    print_r($response);
?>