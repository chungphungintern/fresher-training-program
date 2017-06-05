<?php
require 'Student.php';

$students = new Student();

if (isset($_GET['id'])) {
	$id = $_GET['id'] ?? '';
	$student = $students->getStudent($id);
	$idEdit = $student[0];
	$nameEdit = $student[1];
	$ageEdit = $student[2];
	$sexEdit = $student[3];
	$fileAttachEdit = $student[4];
}

if (isset($_POST['submit'])) {
	$id = $_POST['id'] ?? '';
	$name = $_POST['name'] ?? '';
	$age = $_POST['age'] ?? '';
	$sex = $_POST['sex'] ?? '';
	$fileAttach = $_FILES['fileAttach']['name'] ?? '';

	$student = array($id, $name, $age, $sex, $fileAttach);
	$students->updateStudent($student);
}

?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	</head>
	<body>
		<div class="container">
			<form action="" method="POST" role="form" enctype="multipart/form-data">
				<legend>New student</legend>
			
				<div class="form-group">
					<label for="">ID Student</label>
					<input type="text" class="form-control" id="id" name="id" value="<?php echo $idEdit ?? ''; ?>">
				</div>
				<div class="form-group">
					<label for="">Full name</label>
					<input type="text" class="form-control" id="name" name="name" value="<?php echo $nameEdit ?? ''; ?>">
				</div>
				<div class="form-group">
					<label for="">Age</label>
					<input type="text" class="form-control" id="age" name="age" value="<?php echo $ageEdit ?? ''; ?>">
				</div>
				<div class="form-group">
					<label for="">Sex</label>
					<input type="text" class="form-control" id="sex" name="sex" value="<?php echo $sexEdit ?? ''; ?>">
				</div>
				<div class="form-group">
					<label for="">File attach</label>
					<input type="file" class="form-control" id="fileAttach" name="fileAttach" value="<?php echo $fileAttachEdit ?? ''; ?>">
				</div>
			
				<button type="submit" class="btn btn-primary" name="submit">Add</button>
				<a href="index.php">Back</a>
			</form>
		</div>
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</body>
</html>
