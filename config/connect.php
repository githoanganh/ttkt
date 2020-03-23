<?php 
$conn = mysqli_connect('localhost','root','','da3');
if ($conn){
    mysqli_query($conn,"SET NAMES 'utf8'");
    
}else{
    die('Kết nối thất bại');
}
?>