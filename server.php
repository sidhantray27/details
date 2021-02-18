<?php

session_start();

// initializing variables
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', 'Sidhu@27', 'intern');

if (isset($_POST['add_detail'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $district = mysqli_real_escape_string($db, $_POST['district']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  //$phone = mysqli_real_escape_string($db, $_POST['phone']);

  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($phone)) { array_push($errors, "Phone Number is required"); }
  if (empty($email)) { array_push($errors, "Mail Id is required"); }
  if (empty($gender)) { array_push($errors, "Gender is required"); }
  if (empty($district)) { array_push($errors, "District is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }

  if (count($errors) == 0) {

    $query = "INSERT INTO users (name, phone, email, gender, district, address) 
            VALUES('$name', '$phone', '$email', '$gender', '$district', '$address')";
    mysqli_query($db, $query);
    //<script language="javascript">
    //alert("Your Complain is lodged successfully") ;
    //</script>
    header('location: index.php');
  }
}
//if (isset($_GET['edit'])) {
  /*  $id = $_GET['edit'];
    $update = true;
    $result = mysqli_query($db, "SELECT * FROM users WHERE id=$id");

    if (count($result) == 1 ) {
        $row = mysqli_fetch_array($result);
        $name = $row['name'];
        $phone = $row['phone'];
        $email = $row['email'];
        $gender = $row['gender'];
        $district = $row['district'];
        $address = $row['address'];
    }
}*/
if (isset($_POST['show'])) {
    // receive all input values from the form
    $gender = mysqli_real_escape_string($db, $_POST['gender']);
    $dist = mysqli_real_escape_string($db, $_POST['district']);
    //$phone = mysqli_real_escape_string($db, $_POST['phone']);
  
    if (empty($gender) && empty($district)) {  }
    else{
        if(empty($gender)){
            $query="SELECT * FROM users where district='$district' ORDER BY id DESC";
        }
        if(empty($district)){
            $query="SELECT * FROM users where gender='$gender' ORDER BY id DESC";
        }
        $query="SELECT * FROM users where gender='$gender' && district='$district' ORDER BY id DESC";

    }
    //header('location: index.php?query="$query");
  }

  ?>