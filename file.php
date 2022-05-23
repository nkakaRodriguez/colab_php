<html>
<head>
    <title>file upload</title>
</head>
<body>
    <?php include "tableheader.php"?>
    
    <div
  class="bg-image d-flex justify-content-center align-items-center"
  style="
    background-image: url('images/wave.jpg');
    height: 100vh; background-repeat:no-repeat; background-size:cover;
  ">
<b><h1 class=" text-center" >file upload</h1><b>
    <br>
    <br>
<form enctype="multipart/form-data" action="file_upload.php" name="form" method="post" class="">
				Select File
					<input type="file" name="file" id="file" /></td>
				<button	type="submit" class="btn btn-success"name="submit" id="submit" value="Submit">submit</button>
			</form>
    </div>
</body>
</html>