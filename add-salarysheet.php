<?php include 'header.php'; ?>
<?php //header?>
<link rel="stylesheet" href="excelToSql/css/bootstrap.min.css">
		<link rel="stylesheet" href="excelToSql/css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="excelToSql/css/bootstrap-custom.css">

  <tr>
    
	
	<td valign="top" width="17%" style="border-right: #2E005B solid 3px; height:505px;" >
	
	<?php include 'left-menu.php'; ?>
	</td>
	
    <td valign="top" width="83%">
	
	
	<p class="b xlarge mt10px ml10px">Manage Salaries
	<span class="fr mr10px b black" style="font-size:12px;"><a href="manage-salarie-admin.php">View Salary</a></span>
	</p>
	<p class="bdr0 ml10px  m5px mr30px"></p>
	
<?php 
	include 'excelToSql/db.php';
	include 'excelToSql/Excel/reader.php';
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

		

	<div id="wrap" style="width:600px;margin-bottom:100px;margin-top:10px;">
	<div class="container" style="width:700px;">
		<div class="row">
			<div class="span3 hidden-phone"></div>
			<div class="span6" id="form-login">
				<form class="form-horizontal well" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="upload_excel" enctype="multipart/form-data">
					<fieldset>
						<legend>Add Salary Sheet</legend>
						<div class="control-group">
							<!--<div class="control-label">
								<label>Select CSV File</label>
							</div>
							<div class="controls">
								<input type="file" name="csvFile" class="input-large">
							</div>
						</div>
						or-->
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
	
	</div>

    
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/bootstrap-button.js"></script>
		<script type="text/javascript" src="js/application.js"></script>
	
	<p>&nbsp;</p>
	
	
	
	</td>
  </tr>
</table>


<?php include 'footer.php'; ?>
</body>
</html>
