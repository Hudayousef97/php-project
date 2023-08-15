<?php


$conn = require __DIR__ . "/database.php";




if($_SERVER["REQUEST_METHOD"]=="POST"){
    $data=json_decode(file_get_contents("php://input"),true);
    print_r($data);
    $password_hash = password_hash($data["password"], PASSWORD_DEFAULT);
    $userName=$data['password'];
    $userEmail=$data['email'];
    $fname=$data['fname'];
    $lname=$data['lname'];
    $mname=$data['mname'];
    $familyname=$data['familyname'];
    $mobile=$data['mobile'];
    $day=$data['day'];
    $month=$data['month'];
    $year=$data['year'];
    
    $sql="INSERT INTO user (password_hash,email,fname,mname,lname,familyname,mobile,`day`,`month`,`year`) VALUES('$password_hash','$userEmail',
    '$fname','$mname','$lname',' $familyname','$mobile','$day','$month','$year')";
    
    $response= array();
    
    if($conn->query($sql) === True){
        $response['message']="Data stored successfully";
        echo json_encode($response);
       
    }else{

        $response['message']="Error: ".$sql."<br>.$conn->error";
        echo json_encode($response);
    
    }
    // echo json_encode($response);
   
    }
   
    $conn->close();

?>
