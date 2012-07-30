<?php


include('lib/autocomplete.class.php');
$myAutoCompleteHelper = new AutoCompleteHelper($myDB);


if(isset($_GET['term']) && isset($_GET['col']) )
{
	
	//Assigning friendly var names
	$term = $_GET['term'];
	$column = $_GET['col'];
	$table = 'obiettivi';
	
	if( !empty($column) )
	{
		echo $myAutoCompleteHelper->AutoComplete($table, $column, $term);
	}
	
}




?>