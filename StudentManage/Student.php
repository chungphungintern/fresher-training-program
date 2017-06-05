<?php 
session_start();

const SIZE_FILE_PROFILE_ALLOW = 2097152; 

class Student
{
	private $id;
	public $name;
	private $age;
	private $sex;
	private $fileAttach;

	public function addStudent(array $arr)
	{
		$this->id = $arr[0];
		$this->name = $arr[1];
		$this->age = $arr[2];
		$this->sex = $arr[3];
		$this->fileAttach = $arr[4];
		return $arr;
	}

	// Get all students
	public function getStudentsList()
	{
		return $_SESSION['students'] ?? array();
	}

	// Get detail student by id
	public function getStudent($id)
	{
		// Get all to find a student
		$students = $this->getStudentsList();

		// Get student by id
		foreach ($students as $student) {
			if ($student[0] == $id) {
				return $student;
			}
		}

		return array();
	}

	// Delete student by id
	public function deleteStudent($id)
	{
		// Get all to find a student
		$students = $this->getStudentsList();

		// Get student by id and excute delete
		foreach ($students as $key => $student) {
			if ($student[0] == $id) {
				unset($students[$key]);
			}
		}

		// Update SESSION Students
		$_SESSION['students'] = $students;

		return $students;
	}

	// Add file profile of student
	public function addFileProfile($tmp_name_file)
	{
		$path = "data/";
		return move_uploaded_file($tmp_name_file, $path.$this->fileAttach);
	}

	// Check file profile function
	public function checkFile($sizeFile)
	{
		$flag = true;
		if ($this->fileAttach == NULL) {
			return false;
		} else {
			if ($sizeFile > SIZE_FILE_PROFILE_ALLOW) {
				return false;
			}
		}

		return $flag;
	}

	// Add, edit student
	public function updateStudent(array $arr)
	{
		// Get all students
		$students = $this->getStudentsList();

		// Update
		$flag_update = false;
		foreach ($students as $key => $student) {
			if ($student[0] == $this->id) {
            	$students[$key] = $this->addStudent($arr);
            	$flag_update = true; 
        	}
		}

		// Add
		if (!$flag_update) {
			$students[] = $this->addStudent($arr);
		}

		// Update SESSION Students
		$_SESSION['students'] = $students;

		return $students;	
	}
}

?>
