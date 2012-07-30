<?php
//--------------------------------------------------------------------------
// AutoComplete Class
//	@author: Filippo Mascoli - eldblz@nxo.it
//  @version: 1.0 BETA
//--------------------------------------------------------------------------

class AutoCompleteHelper
{
	private $DB;
	
	//--------------------------------------------------------------------------
	
	function __construct($DBobj)
	{
		$this->DB = & $DBobj;
	}	
	
	//--------------------------------------------------------------------------
	// AutoComplete
	//		parameters: 
	//			$table (string) - Database table
	//			$column (string) - Database field value for autocomplete
	//			$term  (string) - User input to match autocomplete
	//		return: 
	//			json encoded string
	//		Description: 
	//			Build the query and call AutoCompleteQuery function
	//--------------------------------------------------------------------------
	function AutoComplete($table, $column, $term, $limit=50)
	{
		if( !empty($column) && !empty($table) && !empty($term) )
		{
			//.Build the query 
			$query = "SELECT " . $column . " FROM " . $table . " WHERE " . $column . " LIKE '".$term."%' GROUP BY " . $column . " LIMIT " .$limit . ";";
			return $this->AutoCompleteQuery($query, $column);
		}
		else
		{
			throw new Exception('Missing parameters: table, column and/or term.');
			return FALSE;
		}
	}

	//--------------------------------------------------------------------------
	// AutoCompleteQuery
	//		parameters: 
	//			$query (string) - Database query for autocomplete
	//		return: 
	//			json encoded string
	//		Description: 
	//			Query the database and return matching autocomplete values
	//--------------------------------------------------------------------------
	function AutoCompleteQuery($query, $column)
	{
		if(!empty($query) && !empty($column))
		{
			//.Query
			$res = $this->DB->Query($query, 0);
			
			//query execution ok?
			if($res)
			{
				
				while ($row = mysql_fetch_array($res, MYSQL_ASSOC)) 
				{
					//Create a new array to return values to be json encoded as requested by Jquery
					//Creo una nuova array per restituire i valori come richiesti da JQuery
					$values[]['value'] = $row[$column];
				}
				
				//Return result json encoded
				//Ritorno il risultato json encoded.
				return json_encode($values);
			}
			else
			{
				throw new Exception('Query: [' . $query . '] execution failed.');
				return FALSE;
			}
		}
		else
		{
			throw new Exception('Missing parameters: query and/or column.');
			return FALSE;
		}
	}
}

?>