<?php
// Execute delete
if (!empty($_POST['delete']))
{
    require ("Student.php");
    $id = $_POST['id'] ?? '';
    $students = new Student();
    $students->deleteStudent($id);
}
 
header("Location:index.php");

?>

