<html>
<head>
<title>Auto complete text field</title>
<meta charset="utf-8">
<style>
.container{
	padding:20px;
}

#skill_input{
	height:25px;
	font-size:16px;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
$(function() {
    $("#skill_input").autocomplete({
        source: "search.php",
        
    });
});
</script>
</head>
<body>
<div class="container">
<h4>Autocomplete textfield</h4>

<form method="post" action="submit.php">


<label>Skills:</label>
<input type="text" id="skill_input" name="val"/>
<input type="submit" name="submit" value="Submit"/>
</form>

</div>



</body>
</html>