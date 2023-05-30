<?php

$conn = mysqli_connect("localhost","root","","food_db");


$result = mysqli_query($conn,"SELECT * FROM messages");

$data = array();
while($row = mysqli_fetch_assoc($result))
{
    $data[]=$row;
}

echo json_encode($data);
?>