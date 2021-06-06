

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php echo form_open_multipart('permohonan/testadd');?>
	<?php echo "<input type='file' name='userfile' size='20' />"; ?>
	<?php echo "<input type='submit' name='submit' value='upload' /> ";?>
	<?php echo "</form>"?>
</body>
</html>