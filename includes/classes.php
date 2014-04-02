<?php 
  class Login_Process 
  {	
  
		function query($sql) 
		{
		$sql = mysql_query($sql);
		$num_rows = mysql_num_rows($sql);
		$result = mysql_fetch_assoc($sql);
		return array("num_rows"=>$num_rows,"result"=>$result,"sql"=>$sql);
		}
				
		function queryup($sql) 
		{
		$sql = mysql_query($sql);
		return array("sql"=>$sql);
		}
				
		function login($username, $password, $table, $url) 
	   {
		$pass=md5($password);
		$query = $this->query("SELECT * FROM $table WHERE username='$username' AND password='$pass' and status=9");
			if($query['num_rows'] == 1) 
			{
			$this->setsession($username, $pass, $table);				
			} else {
			$query1 = $this->query("SELECT * FROM $table WHERE username='$username' AND password='$pass' and status !=9");
			
			if($query1['num_rows'] == 1) 
			{
			return "You don't have premission.";					
			}
			return "Login info not correct.";
			}	
		    header("Location:".$url); 
			
	    
	  }
				  
				   function setsession($username, $password, $table) 
				   {
					$query2 = $this->query("SELECT * FROM $table WHERE username='$username' AND password='$password' limit 0,1");
					ini_set("session.gc_maxlifetime", Session_Lifetime); 
					session_start();
					$_SESSION[$table]['id']      = $query2['result']['id'];
					$_SESSION[$table]['username']    = $query2['result']['username'];
					$_SESSION[$table]['status']      = $query2['result']['status'];
					
				   }
				    
				
				
				
		function login1($username, $password, $table, $url) 
	   {
		$pass=md5($password);
		$query = $this->query("SELECT * FROM $table WHERE username='$username' AND password='$pass' and bsa_status=9");
			if($query['num_rows'] == 1) 
			{
			$this->setsession1($username, $pass, $table);				
			} else {
			$query1 = $this->query("SELECT * FROM $table WHERE username='$username' AND password='$pass' and bsa_status!=9");
			
			if($query1['num_rows'] == 1) 
			{
			return "You don't have premission.";					
			}
			return "Login info not correct.";
			}	
		    header("Location:".$url); 
			
	    
	  }
				  
				   function setsession1($username, $password, $table) 
				   {
					$query2 = $this->query("SELECT * FROM $table WHERE username='$username' AND password='$password' limit 0,1");
					ini_set("session.gc_maxlifetime", Session_Lifetime); 
					session_start();
					$_SESSION[$table]['id']      = $query2['result']['bsa_id'];
					$_SESSION[$table]['username']    = $query2['result']['username'];
					$_SESSION[$table]['status']      = $query2['result']['bsa_status'];
					$_SESSION[$table]['master_status']      = $query2['result']['master_status'];
				   }
				
				
				
				
				
				
				
				
				
				
				
				   
			      function edit_password($pword, $id) 
				  {
						 $new = md5($pword);
						$this->queryup("UPDATE ".USERS." SET password = '$new' WHERE id = '$id'");		
	
							return "Password update successfull.";
					}	
				 
				 function Mail_Reset_Password($email)
				 {
					$query = $this->query("SELECT email FROM ".USERS." WHERE email = '$email'");
					if($query['num_rows'] > 0)
					{
					$subject = 'Password Request';
					$password=rand(0,999999);
					 $pword=md5($password);
					
					$up=$this->query("UPDATE ".USERS." SET password = '$pword' WHERE email = '$email'");
	                 

					 $message = '
					Dear '.$email.',
					
					Your password for the '.Site_Name.' has been requested.
					your new password is '.$password.'
					
					
					Thanks 
						'.Email_From.'';
				
						mail($email, $subject, $message, $headers, '-f'.Email_Address);
					return "Please check your mail for new password.";
															
					}
					 
					return "Invalid Email.";
				
				}
				
				
/*	function User_Created($username, $email, $code) {

	$subject = 'Welcome to '.Site_Name;
	
	$message = '
	Dear '.$username.',

	Welcome to eswadeshi. Signing up to the '.Site_Name.'.';
	
	// if admin approvial is true.
	
	$message .= '
	Thanks 
		'.Email_From.'';

		mail($email, $subject, $message, $headers);
}*/
/*function newsletter($from, $subject, $to, $description,$emailid) 
  {

	if($to=="all"){
	$sel=mysql_query("select email from users");
	while($a=mysql_fetch_assoc($sel))
   {
     $message = '
	Dear '.$a['email'].',

	This is your new login details for signing up to the '.$description.'.';
	
	// if admin approvial is true.
	
	$message .= '
	Thanks 
		'.$from.'';

		mail($a['email'], $subject, $message, $headers);
    }
	
	}
	
	
	if($to=="users"){
		$a=explode(",",$emailid);
		
		
		


		   foreach($a as $v){
		    $headers  = "From: Eswadeshi <info@eswadeshi.com>\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		
	  $message = '
		   Dear '.$v.',
	
		This is your newsletter details for  '.$description.'.';
		
		// if admin approvial is true.
		
		$message .= '
		Thanks 
			'.$from.'';
	
			mail($v, $subject, $message, $headers);
			
		}
		  
		}
		
	   	   
	
		
		
	
   }
*/						
   }
					
?>