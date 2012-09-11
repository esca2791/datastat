<?php

	//include("resources/database.php");  /******You would include this when using the file to connect****/

class classExample
{

	//protected $dbh;
	
	/*public function __construct($dbh){
		$this->dbh=$dbh;
	}*/
	
	public function examplePublicFunction($nametosearch){
		echo "</br></br>This was printed by instantiating an instance of a class, as defined in index.php";
		echo "</br><strong>Name to display:  $nametosearch<strong>";
	}
	
}