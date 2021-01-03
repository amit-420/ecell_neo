<?php 
    $conn = mysqli_connect('localhost','ecell_neo','4epl2L5^','portal_data');
    
    //check connection
    if(!$conn){
        echo 'Connection error' . mysqli_connect_error();
    }

?>