<?php
require_once 'Student.php';

class StudentView
{
    public function show_AllStudents()
    {
        $Result=Student::SelecetAllStudentsInDB();
        for ($i=0;$i<count($Result);$i++)
        {
            echo ("<a href=StudentController.php?id=".$Result[$i]->Id.">".$Result[$i]->FullName."</a><br>");
        }
    }
    public function showStudentDetails($StdObj)
    {
        echo "<table border='2'><tr><td>Id</td><td>".$StdObj->Id."</td></tr>";
        echo "<tr><td>Full Name</td><td>".$StdObj->FullName."</td></tr>";
        echo "<tr><td>Address</td><td>".$StdObj->Address."</td></tr>";
        echo "<tr><td>Hobbies Played</td></tr>";
        for ($i=0;$i<count($StdObj->HobbyArrayObj);$i++)
        {
            echo "<br>".$StdObj->HobbyArrayObj[$i]->HobbyName;
        }
        echo "</td></tr>";
        echo "</table>";
    }
}

?>