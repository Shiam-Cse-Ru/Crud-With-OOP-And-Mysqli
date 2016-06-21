<?php 

class Databse{


	public $host=DB_HOST;
	PUBLIC $user=DB_USER;
	public $pass=DB_PASS;
	public $dbname=DB_NAME;
	public $link;
	public $error;

	public function __construct(){

		$this->ConnectDb();

	}
	//connect database
	private function ConnectDb(){


		$this->link=new mysqli($this->host,$this->user,$this->pass,$this->dbname);
		if (!$this->link) {
			$this->error="Connection Fail".$this->link->connect_error;
			return false;
		}
	}

//select data
	 public function Select($query){
   $result=$this->link->query($query) or die($this->link->error.__LINE__);
	 if ($result->num_rows>0) {
     return $result;

	 }

	else
 {
	 	return false;
	}

	}

	//insert data

	public function Insert($query){
   $insert_row=$this->link->query($query) or die($this->link->error.__LINE__);


if ($insert_row) {
	header("location:index.php?msg=".urlencode('Data Insert Successfully.'));
	exit();

}
    else
     {
    die("Error: (".$this->link->errno.")".$this->link-error);
      
	 }


}

//update data
	public function Update($query){
   $update_row=$this->link->query($query) or die($this->link->error.__LINE__);


if ($update_row) {
	header("location:index.php?msg=".urlencode('Data Update Successfully.'));
	exit();

}
    else
     {
    die("Error: (".$this->link->errno.")".$this->link-error);
      
	 }


}

	public function Delete($query){
   $delete_row=$this->link->query($query) or die($this->link->error.__LINE__);


if ($delete_row) {
	header("location:index.php?msg=".urlencode('Data Delete Successfully.'));
	exit();

}
    else
     {
    die("Error: (".$this->link->errno.")".$this->link-error);
      
	 }


}

}





 ?>