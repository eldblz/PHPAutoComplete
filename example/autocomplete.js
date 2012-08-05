$(document).ready(function()
{
	$("#city").autocomplete({source: "example.php?tbl=cities&col=city"});
	$("#country").autocomplete({source: "example.php?tbl=countries&col=country"});	
});