$(document).ready(function()
{
	$("#ambito").autocomplete({source: "autocomplete.php?col=ambito"});
	$("#area").autocomplete({source: "autocomplete.php?col=area"});
	$("#servizio").autocomplete({source: "autocomplete.php?col=servizio"});
});