<?php
include('autocomplete.class.php');


//.Database connection info:
$Hostname = 'localhost:3307';
$Database = 'test';
$Username = 'root';
$Password = '';

try
{
	$myAutoCompleteHelper = new AutoCompleteHelper($Hostname, $Username, $Password, $Database);


	if(isset($_GET['term']) && isset($_GET['col']) )
	{
		
		//Assigning friendly var names
		$term = $_GET['term'];
		$column = $_GET['col'];
		$table = 'cities';
		
		if( !empty($column) )
		{
			echo $myAutoCompleteHelper->AutoComplete($table, $column, $term);
		}
		
	}
}
catch (Exception $e) 
{
    echo '<br>Caught exception: ',  $e->getMessage(), "<br>";
}




?>