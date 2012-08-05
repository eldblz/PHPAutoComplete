<?php
include('../autocomplete.class.php');


//.Database connection info:
$Hostname = 'localhost:3307';
$Database = 'test';
$Username = 'root';
$Password = '';

$AllowedTables = array('cities', 'countries');
$AllowedColumns = array('city', 'country');

try
{
	
	//Check if all required variables are set.
	if(isset($_GET['term']) && !empty($_GET['term']) && isset($_GET['col']) && !empty($_GET['col']) && isset($_GET['tbl']) && !empty($_GET['tbl']) )
	{
		//Assigning friendly var names
		$term = $_GET['term'];
		$column = $_GET['col'];
		$table = $_GET['tbl'];
		
		
		//Check if required table and column are allowed
		if( in_array($table, $AllowedTables) && in_array($column, $AllowedColumns) )
		{
			//.Create new obj
			$myAutoCompleteHelper = new AutoCompleteHelper($Hostname, $Username, $Password, $Database);
			
			//.Query database and return json encoded results for jqeury autocomplete
			echo $myAutoCompleteHelper->AutoComplete($table, $column, $term);
		}
		
	}
}
catch (Exception $e) 
{
    echo '<br>Caught exception: ',  $e->getMessage(), "<br>";
}



?>