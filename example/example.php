<?php
include('../autocomplete.class.php');


//.Database connection info:
$Hostname = 'localhost:3307';
$Database = 'test';
$Username = 'root';
$Password = '';

try
{
	
	//Check if all required variables are set.
	if(isset($_GET['term']) && !empty($_GET['term']) && isset($_GET['col']) && !empty($_GET['col']) && isset($_GET['tbl']) && !empty($_GET['tbl']) )
	{
		//Assigning friendly var names
		$term = $_GET['term'];
		$column = $_GET['col'];
		$table = $_GET['tbl'];
		
		//.Create new obj
		$myAutoCompleteHelper = new AutoCompleteHelper($Hostname, $Username, $Password, $Database);
		
		//.Query database and return json encoded results for jqeury autocomplete
		echo $myAutoCompleteHelper->AutoComplete($table, $column, $term);
		
	}
}
catch (Exception $e) 
{
    echo '<br>Caught exception: ',  $e->getMessage(), "<br>";
}



?>