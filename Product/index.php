<?php

include "../Config/connection.php";

if(isset($_POST['btninsert'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $date = isset($_POST['date']) ? $_POST['date'] : null;
    $discription = $_POST['discription'];
    $imagecount = count($_FILES['image']['name']);
    $folder = array();
    for($i = 0; $i < $imagecount; $i++){
        $imagename = $_FILES['image']['name'][$i];
        $tmp = $_FILES['image']['tmp_name'][$i];

        $extension = explode('.',$imagename);
        $extension = strtolower(end($extension));

        $uniq = uniqid().'.'. $extension;   
        move_uploaded_file($tmp,"../Images/".$uniq);

        $folder[]= $uniq;
    }

    $folder = json_encode($folder);
    $res = $database->insert($name,$price,$quantity,$folder,$date,$discription);
    if($res){
        echo "<script>
        alert('Data Inserted');
        window.location.href = 'index.php';
        </script>";
    }else{
    echo "<script>
    alert('Data Not Inserted');
    window.location.href = 'index.php';
    </script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Product Multiple Image</title>
<style>
    body {
        background-color: #f4f7f6;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    form {
        max-width: 600px;
        margin: 50px auto;
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
    }
    form:hover {
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
    }
    input[type="text"],
    input[type="number"],
    input[type="file"],
    input[type="date"],
    input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: all 0.3s ease-in-out;
    }
    input[type="text"]:focus,
    input[type="number"]:focus,
    input[type="file"]:focus,
    input[type="date"]:focus,
    input[type="submit"]:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }
    input[type="submit"] {
        background: #007bff;
        color: #fff;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background: #0056b3;
    }
    h2 {
        text-align: center;
        margin-bottom: 20px;
    }
</style>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <h2>Add New Product</h2>
    <input type="text" placeholder="Enter Product Name" name="name" required><br>
    <input type="number" placeholder="Enter Product Price" name="price" required><br>
    <input type="number" placeholder="Enter Product Quantity" name="quantity" required><br>
    <input type="file" placeholder="Enter Product Image" multiple name="image[]" required><br>
    <input type="date" placeholder="Enter Product Date" name="date"><br>
    <input type="text" placeholder="Enter Product Description" name="discription" required><br>
    <input type="submit" class="btn btn-warning" name="btninsert" value="Add Data">
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>
