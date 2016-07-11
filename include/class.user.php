<?php 
	include "db_config.php";
	class User{		
		public $db;
		public function __construct(){
			$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
			if(mysqli_connect_errno()) {
				echo "Error: Could not connect to database.";	 
			exit; 
			}
		}
		/*** for registration process ***/
		public function reg_user($username,$password,$email,$phone){
			$password = md5($password);
			$sql="SELECT * FROM register WHERE user_name='$username' OR user_email='$email'";
			
			//checking if the username or email is available in db
			$check =  $this->db->query($sql) ;
			$count_row = $check->num_rows;

			//if the username is not in db then insert to the table
			if ($count_row == 0){
				$sql1="INSERT INTO register SET user_name='$username', user_pass='$password',user_email='$email',user_phone='$phone'";
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
        		return $result;
			}
			else { return false;}
		}
		/*** for login process ***/
		public function check_login($emailusername, $password){        	
        	$password = md5($password);
			$sql2="SELECT user_id from register WHERE user_email='$emailusername' or user_name='$emailusername' and user_pass='$password'";			
			//checking if the username is available in the table
        	$result = mysqli_query($this->db,$sql2);
        	$user_data = mysqli_fetch_array($result);
        	$count_row = $result->num_rows;
	        if ($count_row == 1) {
	            // this login var will use for the session thing
	            $_SESSION['login'] = true; 
	            $_SESSION['user_id'] = $user_data['user_id'];
	            return true;
	        }
	        else{
			    return false;
			}
    	}
    	/*** for displaying the event details ***/
    	public function select(){
    		session_start();
    		$userid=$_SESSION['user_id'];
    		$sql="select * from event where user_id=$userid";
    		$result = mysqli_query($this->db,$sql);
    		return $result;
    	}
    	/*** for displaying public events ***/    	
    	public function public_event(){
    		$sql="select event_date,event_subject,event_text from event where event_type='public' ORDER BY event_date;";
    		$result = mysqli_query($this->db,$sql);
    		return $result;
    	}
    	/*** to get username ***/    	    	
    	public function get_user_name($uid){
    		$sql="SELECT user_name FROM register WHERE user_id = $uid";
	        $result = mysqli_query($this->db,$sql);
	        $user_data = mysqli_fetch_array($result);
	        echo $user_data['user_name'];
    	}
    	/*** to get event id ***/    	    	
		public function get_event_id($uid){
    		$sql="SELECT event_id FROM event WHERE user_id = $uid";
	        $result = mysqli_query($this->db,$sql);
	        $user_data = mysqli_fetch_array($result);
	        echo $user_data['event_id'];
    	}
    	/*** function to delete event ***/		
    	public function delete_event($table,$uid){
    		$sql="DELETE FROM $table WHERE event_id =".$uid;
	        $result = mysqli_query($this->db,$sql);
	        return $result;
    	}
		
    	/*** starting the session ***/
	    public function get_session(){    
	        return $_SESSION['login'];
	    }
    	/*** destroying the session ***/
	    public function user_logout() {
	        $_SESSION['login'] = FALSE;
	        session_destroy();
	    }
    	/*** function to fetch event details ***/	    
	    public function Fetch($id){
			$sql="select * from event where event_id=".$id;
			$result = mysqli_query($this->db,$sql);
			return $result;
		}
    	/*** function to update event ***/		
		public function update($event_id,$event_date,$event_type,$event_subject,$event_text){
			$sql="UPDATE event SET event_type='$event_type', event_date='$event_date', event_subject='$event_subject', event_text='$event_text' WHERE event_id=".$event_id;
		    $res = mysqli_query($this->db,$sql);
    		return $res;
		}
    	/*** function to add event ***/		
		public function add_event($user_id,$event_date,$event_type,$event_subject,$event_text){
				$sql="INSERT INTO event SET user_id='$user_id', event_date='$event_date', event_type='$event_type', event_subject='$event_subject', event_text='$event_text'";
				$result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
        		return $result;
		}	
	}
?>