<?php
include("init.inc.php");

include('autocomplete.class.php');

$myAC = new AutoCompleteHelper($myDB);


if(isset($_GET['term']) && isset($_GET['col']) )
{
	
	//definisco la variabile di ricerca dell'utente
	$term = $_GET['term'];
	$column = $_GET['col'];
	$table = 'obiettivi';
	
	if( !empty($column) )
	{
		echo $myAC->AutoComplete($table, $column, $term);
	}
	
}




?>