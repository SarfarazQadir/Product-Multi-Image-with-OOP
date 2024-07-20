<?php

include "../Config/connection.php";

$id = $_GET['id'];

$result = $database->delete($id);
if($result){
    echo"
    <script>
    alert('Delete Success')
    window.location.href='fetch.php'
    </script>
    ";
}else{
    echo"
    <script>
    alert('Delete Failed')
    window.location.href='fetch.php'
    </script>
    ";
}

?>