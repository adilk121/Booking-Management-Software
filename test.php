<?php require_once("includes/dbsmain.inc.php");  ?>
<?php include('header.php'); ?>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script> 
  $( function() {
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    $( "#name" ).autocomplete({source: availableTags});
  } );
  </script>  
  <center>
<input type="text" name="name" id="name" placeholder="Enter value" onkeyup="test();">
<p id="show"></p>
</center>

<script>
    function test()
    {
       
       var name=$("#name").val();
       
               $.ajax({
            url:"test_ajax.php",
            type:"POST",
            data:{name:name},
            success:function(data){
          
            document.getElementById("show").innerHTML=data;
            }
        });
    }

</script>




















