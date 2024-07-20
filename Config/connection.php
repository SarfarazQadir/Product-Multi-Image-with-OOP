<?php

class Database{

private $conn ;

public function connection(){
    $this->conn = new mysqli("localhost","root","","crud_db");
    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
}
public function insert($name,$price,$quantity,$folder,$date,$discription){
    $query = "INSERT INTO `products`( `name`, `price`, `quantity`, `image`, `date`, `discription`) VALUES ('$name','$price','$quantity','$folder','$date','$discription')";
    $result = mysqli_query($this->conn,$query);
    if($result){
        return $result;
    }else{
        return false;
    }
}
public function fetch(){
    $query = "SELECT * FROM `products`";
    $result = mysqli_query($this->conn,$query);
    if($result){
        return $result;
    }else{
        return false;
    }
}
public function delete($id){
    $query = "DELETE FROM `products` WHERE id = $id";
    $result = mysqli_query($this->conn,$query);
    if($result){
        return $result;
    }else{
        return false;
    }
}
public function edit($id){
    $query = "SELECT * FROM `products` WHERE id = $id";
    $result = mysqli_query($this->conn,$query);
    if($result){
        return $result;
    }else{
        return false;
    }
}
public function update($id,$name,$price,$quantity,$folder,$date,$discription){
    $query = "UPDATE `products` SET `name`='$name',`price`='$price',`quantity`='$quantity',`image`='$folder',`date`='$date',`discription`='$discription' WHERE id = $id";
    $result = mysqli_query($this->conn,$query);
    if($result){
        return $result;
    }else{
        return false;
    }
}
}
$database = new Database();
$database->connection();
?>