<?php 
function connection(){
    global $conn;
$conn = mysqli_connect("localhost",'root','','rakketapp');
}
?>