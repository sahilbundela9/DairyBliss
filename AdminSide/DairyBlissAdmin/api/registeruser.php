<?php
    include("connect.php");

    if
    (isset($_POST["username"]) && 
    isset($_POST["email"]) &&
    isset($_POST["phone"]) &&
    isset($_POST["password"])
    )
    {
        $username=$conn->real_escape_string($_POST["username"]);
        $email=$conn->real_escape_string($_POST["email"]);
        $phone=$conn->real_escape_string($_POST["phone"]);
        $password=$conn->real_escape_string($_POST["password"]);

        $sql="INSERT INTO tbl_user(username,email,phone,password,address,pincode,status)
            VALUES('$username','$email','$phone','$password','','',true)";

$response;
        if($conn->query($sql)===TRUE)
        {
            $response= json_encode([
                "status"=>true,
                "message"=>"User Registred",
                "person"=>[
                    "id"=>$conn->insert_id,
                    "username"=>$username,
                    "email"=>$email,
                    "phone"=>$phone,
                    "password"=>$password,
                    "address"=>"",
                    "pincode"=>"",
                    "status"=>true
                ]
            ]);
        }
        else
        {
            $response= json_encode([
                "status"=> false,
                "message"=>"not suffient parameter"
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