<?php

include "../Config/connection.php";

$i = 0;
$result = $database->fetch();
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
<title>Fetch Data</title>
</head>
<body>

<table class="table">
    <thead>
        <tr>
            <th hidden>#</th>
            <th>ID</th>
            <th>NAME</th>
            <th>PRICE</th>
            <th>QUANTITY</th>
            <th>IMAGE</th>
            <th>DATE</th>
            <th>DISCRIPTION</th>
            <th colspan="2">ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($result as $row) :
        
        ?>
        <tr>
            <td hidden><?php echo $i++ ; ?></td>
            <td><?php echo $row['id']?> </td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['price']?></td>
            <td><?php echo $row['quantity']?></td>
            <td style = "display: flex; align-items: center; gap: 10px;">
                <?php 
                foreach(json_decode($row['image']) as $image) :?>
                <img src="../Images/<?php echo $image; ?>" width="100px" height="100px">
            <?php endforeach;?>
            <td><?php echo $row['date']?></td>
            <td><?php echo $row['discription']?></td>
            <td>
                <a href="update.php?id=<?php echo $row['id']?>" class="btn btn-success" >UPDATE</a>
                <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger" >DELETE</a>
            </td>
            </tr>
            <?php endforeach;?>
    </tbody>
</table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>

