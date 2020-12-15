<?php
//Controller

require_once 'studentview.php';
require_once 'Student.php';
$stdView=new StudentView();
$stdView->show_AllStudents();

$stObj= new Student(2);

$stdView->showStudentDetails($stObj);

if (isset($_REQUEST["id"]))
{
    $stObj=new Student(($_REQUEST["id"]));

    $stdView->showStudentDetails($stObj);
}
?>