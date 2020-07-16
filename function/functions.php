<?php
include('conn/clsdbase.php');

#-.add a new promotion.
Function _setup_promotion($name,$message,$target){
	
	$database = new database();
	
	$name    = sanitize($name);
    $message = sanitize($message);
	$target  = sanitize($target);
	
	$q = "INSERT 
	      INTO 
		 `tbl_setup`
		  (`promotion_name`,`message`,`target`,`date_created`)
		   VALUES
		  (:param_1,:param_2,:param_3,:param_4)
		   ON 
		   DUPLICATE KEY
		   UPDATE 
		  `date_created` = :param_5";
		  
	$database->query($q);	
	
	$database->bind(':param_1', trim($name));
	$database->bind(':param_2', trim($message));
	$database->bind(':param_3', trim($target));
	$database->bind(':param_4', DATE('Y-m-d H:m:s'));	
	$database->bind(':param_5', DATE('Y-m-d H:m:s'));	
	
	$database->execute();
	
	$id = $database->lastInsertId();
	
	return $id;
}

#-.validate if email is well constructed.
Function valid_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) 
        && preg_match('/@.+\./', $email);
}
#-.get integers from a combinations of integers and chars.
Function get_int_from_string($stngval){
	$int = intval(preg_replace('/[^0-9]+/', '', $stngval), 10);
	return $int;
}
#-.get chars from a combination of chars + integers.
Function get_letter_from_alphanumeric($stngval){
	$char = preg_replace('/[0-9]/','',$stngval);
	return $char;
}
#-.do clean up of user input.
Function sanitize($var){
	if(is_array($var)){
		return array_map('sanitize',$var);
	}
	else{
		if(get_magic_quotes_gpc()){
			$var = stripslashes($var);
		}
		//$var = str_replace("'","\'",$var);
		return $var;
	}
}
?>