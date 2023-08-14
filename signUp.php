<?php


$mysqli = require __DIR__ . "/database.php";

$email = $mobile = $fname = $mname = $lname = $familyname = $password = $password_confirmation = $day = $month = $year = $is_superuser = "";
$emailErr = $mobileErr = $nameErr = $passwordErr = $password_confirmationErr = $dobErr = "";


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
    
    $sql="INSERT INTO user (password_hash,email,fname,mname,lname,familyname,mobile,day,month,year) VALUES('$password_hash','$userEmail',
    '$fname','$lname','$mname',' $familyname','$mobile',' $day',' $month','  $year')";
    
    $response= array();
    if($mysqli->query($sql) === True){
        $response['message']="Data stored successfully";
    }else{
        $response['message']="Error: ".$sql."<br>.$mysqli->error";
    
    }
    echo json_encode($response);
    }
    $mysqli->close();
// Password hash generation


// $sql = "INSERT INTO user (fname, mname, lname, familyname, mobile, email, password_hash, day, month, year, is_superuser)
//         VALUES ('$fname',')";
        
// $stmt = $mysqli->stmt_init();

// if (!$stmt->prepare($sql)) {
//     die("SQL error: " . $mysqli->error);
// }

// $is_superuser = 0; // Default value for regular users
// if (isset($_POST["is_superuser"]) && $_POST["is_superuser"] === "yes") {
//     $is_superuser = 1; // Set to 1 if the user is a superuser
// }

// $stmt->bind_param("ssssissiiii", $_POST["fname"], $_POST["mname"], $_POST["lname"], $_POST["familyname"], $_POST["mobile"], $_POST["email"], $password_hash, $_POST["day"], $_POST["month"], $_POST["year"], $is_superuser);

// if ($stmt->execute()) {
//     header("Location: signup-success.html");
//     exit;
// } else {
//     if ($mysqli->errno === 1062) {
//         die("Email already taken");
//     } else {
//         die($mysqli->error . " " . $mysqli->errno);
//     }
// }
?>
