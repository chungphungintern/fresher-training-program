<?php 
require 'Student.php';

$student = new Student();
$students = $student->getStudentsList();

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
			<h2>Students list</h2>  
			<a href="add-student.php"><button class="btn-primary">New student</button></a>
		  	<table class="table table-striped">
		    	<thead>
		      		<tr>
			        	<th>ID</th>
			        	<th>Fullname</th>
			        	<th>Age</th>
			        	<th>Sex</th>
			        	<th>File profile</th>
			        	<th>Action</th>
		      		</tr>
		    	</thead>
		    	<tbody>
		    	<?php foreach ($students as $student) { ?>
			      	<tr>
				        <td><?php echo $student[0]; ?></td>
				        <td><a href="add-student.php?id=<?php echo $student[0]; ?>"><?php echo $student[1]; ?> </a></td>
				        <td><?php echo $student[2]; ?></td>
				        <td><?php echo $student[3]; ?></td>
				        <td><?php echo $student[4]; ?></td>
				        <td>
				        	<form method="post" action="delete-student.php">
                        		<input type="hidden" value="<?php echo $student[0]; ?>" name="id"/>
                        		<input onclick="return confirm('Do you want to delete this student?');" type="submit" value="Delete" name="delete"/>
                    		</form>
                    	</td>
			      	</tr>
			    <?php } ?>
			    </tbody>
		  	</table>
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</body>
</html>