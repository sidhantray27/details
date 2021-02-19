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
  //if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {array_push($errors, "Only letters and white space allowed");}
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {array_push($errors, "Invalid email format");}
  

  if (count($errors) == 0) {

    $query = "SELECT id FROM users WHERE name='$name' AND email='$email'";
    $results = mysqli_query($db,$query);
    if (mysqli_num_rows($results) == 1) {
      $id=mysqli_fetch_assoc($results)['id'];
      $query1 = "UPDATE users SET name='$name' , phone = '$phone' , email = '$email' , gender = '$gender' , district = '$district' , address = '$address' WHERE id = '$id'";
      mysqli_query($db, $query1);
    }
    else{
      $query2 = "INSERT INTO users (name, phone, email, gender, district, address) 
              VALUES('$name', '$phone', '$email', '$gender', '$district', '$address')";
      mysqli_query($db, $query2);

    }
    header('location: index.php');
  }
}
  if (isset($_POST['dele'])) {
    // receive all input values from the form
    $id = mysqli_real_escape_string($db, $_POST['hidden-id']);
        $query="DELETE FROM users where id = '$id'";
        mysqli_query($db,$query);

    }

  ?>