<!DOCTYPE html>
<?php 
	include 'db.php';
	include 'Excel/reader.php';
    function uploadFile($fieldName, $fileType, $folderName, $name = "")
    {
        $flg = 0;
        $MaxID = "";
        $ext = "";
        $uploadfile = "";
        if (isset($fieldName) AND $fieldName['name'] != '')
        {
            $flg = 1;
            $allowed_filetypes = $fileType;
            $max_filesize = 1048576;
            $filename = $fieldName['name'];
            if ($name == "")
                $MaxID = time() . time() . rand(1, 100);
            else
                $MaxID = $name;
            $ext = substr($filename, strpos($filename, '.'), strlen($filename) - 1);
			if($ext==".xlsx")
				$ext=".xls";
            if (!in_array($ext, $allowed_filetypes))
                echo "<h1>The file you attempted to upload is not allowed...</h1>";
            else if (filesize($fieldName['tmp_name']) > $max_filesize)
                echo "<h1>The file you attempted to upload is too large...</h1>";
            else 
            {
                $uploadfile = $folderName . "/" . $MaxID . $ext;
                if (move_uploaded_file($fieldName['tmp_name'], $uploadfile) == FALSE)
                {
                    echo "<h1>Error in Uploading File...</h1>";
                    $MaxID = "";
                }
                else
                    $MaxID = $MaxID . $ext;
            }
        }
        return $MaxID;
    }
    if(isset($_POST['submit']))
	{
		if($_FILES['csvFile']['name']!="")
		{
			$fileName=uploadFile($_FILES['excelFile'],array(".csv"),"excel_file");
			$row=0;
			if(($handle = fopen("excel/".$fileName , "r")) !== FALSE) 
			{
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
				{
					$num = count($data);
					//print_r($data);
					$query="INSERT INTO StudentData(FirstName,LastName,MobileNo,City)VALUES('".$data[0]."','".$data[1]."','".$data[2]."','".$data[3]."')";
					mysql_query($query);
				}
				fclose($handle);
			}
		}
		else if($_FILES['excelFile']['name']!="")
		{
			$fileName=uploadFile($_FILES['excelFile'],array(".xls",".xlsx"),"excel_file");
			$data = new Spreadsheet_Excel_Reader();
			$data->read('excel_file/'.$fileName);
			for($i=1;$i<=$data->sheets[0]['numRows'];$i++)
			{
				$firstname=$data->sheets[0]['cells'][$i][1];
				$lastname=$data->sheets[0]['cells'][$i][2];
				$mobile=$data->sheets[0]['cells'][$i][3];
				$city=$data->sheets[0]['cells'][$i][4];
				$query="INSERT INTO StudentData(FirstName,LastName,MobileNo,City)VALUES('".$firstname."','".$lastname."','".$mobile."','".$city."')";
				mysql_query($query);
			}
		}
	}
	if(isset($_POST['delete']))
	{
		mysql_query("DELETE FROM StudentData");
	}
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Import Excel To Mysql Database Uing PHP :www.9code.in</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Import Excel File To MySql Database Using php">

		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="css/bootstrap-custom.css">


		<!-- HTML5 Shim, for IE6-IE8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
		<![endif]-->


        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
       	<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-38395785-1']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		</script>

	</head>
	<body>    

	<!-- Navbar
    ================================================== -->

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container"> 
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#">Import Excel To MySql Eith PHP</a>
				<div class="nav-collapse collapse">
					<ul class="nav">
						<li class="active"><a href="http://www.9code.in">www.9code.in</a></li>
						<li><a href="http://facebook.com/9Codeweb">Like Me On Facebook</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div id="wrap">
	<div class="container">
		<div class="row">
			<div class="span3 hidden-phone"></div>
			<div class="span6" id="form-login">
				<form class="form-horizontal well" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="upload_excel" enctype="multipart/form-data">
					<fieldset>
						<legend>Import Excel To MySql</legend>
						<div class="control-group">
							<div class="control-label">
								<label>Select CSV File</label>
							</div>
							<div class="controls">
								<input type="file" name="csvFile" class="input-large">
							</div>
						</div>
						or
						<div class="control-group">
							<div class="control-label">
								<label>Select Excel File</label>
							</div>
							<div class="controls">
								<input type="file" name="excelFile" class="input-large">
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
							<button type="submit" id="submit" name="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			<div class="span3 hidden-phone"></div>
		</div>
		<form name="del" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div class="control-group">
				<div class="controls">
					<button type="submit" id="delete" name="delete" class="btn btn-primary button-loading" data-loading-text="Loading...">Delete Data</button>
				</div>
			</div>
		</form>
		<table class="table table-bordered">
			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Mobile</th>
				<th>City</th>
			</tr>
			<?php
				$res=mysql_query("SELECT * FROM StudentData");
				while($row=mysql_fetch_array($res))
				{
				?>
					<tr>
						<td><?php echo $row['StudentID']; ?></td>
						<td><?php echo $row['FirstName']; ?></td>
						<td><?php echo $row['LastName']; ?></td>
						<td><?php echo $row['MobileNo']; ?></td>
						<td><?php echo $row['City']; ?></td>
					</tr>
				<?php
				}
			?>
		</table>
	</div>
	<div id="push"></div>
	<p class="download">
          			<a href="https://github.com/arianraptor/bootstrap-responsive-login-form" class="btn-primary btn">Download Code</a>
    			</p>
	</div>

    <!-- Footer
    ================================================== -->
    <footer class="footer" id="footer">
      <div class="container">
        <ul class="footer-links">
          <li><a href="http://www.9code.in">Blog</a></li>
          <li class="muted">&middot;</li>
          <li><a href="http://twitter.com/vegadhardik">Twitter</a></li>
          <li class="muted">&middot;</li>
          <li><a href="http://facebook.com/9Codeweb">Facebook</a></li>
        </ul>
      </div>
    </footer>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/bootstrap-button.js"></script>
		<script type="text/javascript" src="js/application.js"></script>

	</body>
</html>