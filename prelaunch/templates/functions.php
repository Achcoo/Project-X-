<?php
require 'dbconfig.php';

//act_points is the points that will give to the person who refer this new person.
//points is the number will give to the new person to sign up.
function checkuser($fid, $ffname, $flname, $email, $gender, $link, $soc_net, $points, $referred_by, $act_points){
    $check = mysql_query("select * from user where id='$fid'");
	$check = mysql_num_rows($check);
	echo "<script>console.log('Im on functions')</script>";
	if (empty($check)) { // if new user . Insert a new record
		echo "<script>console.log('Soy nuevo')</script>";
		if ($soc_net == 'facebook')	{
			$query = "INSERT INTO user (id,first_name,last_name,fb_link,gender,email,points,login_date,num_persons,referred_by) VALUES ('$fid','$ffname','$flname, $link, $gender, $email, $points, now(), 0, $referred_by')";
			mysql_query($query);
			$query = mysql_query("UPDATE user SET points='$points' where id='$referred_by'");
			mysql_query($query);
		}
		else if ($soc_net == 'linkedin')	{
			$query = "INSERT INTO user (id,first_name,last_name,li_link,gender,email,points,login_date,num_persons,referred_by) VALUES ('$fid','$ffname','$flname, $link, $gender, $email, $points, now(), 0, $referred_by')";
			mysql_query($query);
			$query = mysql_query("UPDATE user SET points='$act_points' where id='$referred_by'");
			mysql_query($query);
		}
		else if ($soc_net == 'instagram')	{
			$query = "INSERT INTO user (id,first_name,last_name,insta_link,gender,email,points,login_date,num_persons,referred_by) VALUES ('$fid','$ffname','$flname, $link, $gender, $email, $points, now(), 0, $referred_by')";
			mysql_query($query);
			$query = mysql_query("UPDATE user SET points='$act_points' where id='$referred_by'");
			mysql_query($query);
		}
		else if ($soc_net == 'googleplus')	{
			$query = "INSERT INTO user (id,first_name,last_name,gplus_link,gender,email,points,login_date,num_persons,referred_by) VALUES ('$fid','$ffname','$flname, $link, $gender, $email, $points, now(), 0, $referred_by')";
			mysql_query($query);
			$query = mysql_query("UPDATE user SET points='$act_points' where id='$referred_by'");
			mysql_query($query);
		}
		else if ($soc_net == 'twitter')	{
			$query = "INSERT INTO user (id,first_name,last_name,tw_link,gender,email,points,login_date,num_persons,referred_by) VALUES ('$fid','$ffname','$flname, $link, $gender, $email, $points, now(), 0, $referred_by')";
			mysql_query($query);
			$query = mysql_query("UPDATE user SET points='$act_points' where id='$referred_by'");
			mysql_query($query);
		}
	}
	else{
		echo "<script>console.log('No soy nuevo')</script>";
	}
	mysql_close();
}?>
