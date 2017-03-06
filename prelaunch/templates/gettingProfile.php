<?php
    echo "<script>console.log('En 2')</script>"; 
    $id = $_POST['id'];
    $firstname = $_POST['name'];
    $lastname = $_POST['lname'];
    $email = $_POST['em'];
    $link = $_POST['ln'];
    $social_net = $_POST['sn'];
    $points = $_POST['points'];
    $gender = $_POST['gen'];
    
    echo "<script>console.log('En 2')</script>";
    if(isset($firstname) && !empty($id) &&
    isset($email) && isset($link) && isset($social_net)) { 
		require 'db.php';
        $bd=Db::getInstance();
        $sql = "INSERT INTO user (id,first_name,last_name,fb_link,gender,email,points,login_date,num_persons,referred_by) VALUES ('{$id}','{$firstname}','{$lastname}', '{$link}', '{$gender}', '{$email}', '{$points}', now(), 0, '')";
        $stmt=$bd->ejecutar($sql);
        //Se cierra conexion1
        $stmt=$bd->desconectar(); 

        echo "<script>console.log('En 21')</script>";
		//checkuser($id,$firstname,$lastname,$email,"",$link,$social_net, $points,"", $points);  
	}
?>