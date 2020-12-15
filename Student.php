<?php
require_once ("My_DB.php");
require_once 'HobbyModel.php';

class Student
{
    public $Id;
    public $FullName;
    public $Address;
    public $HobbyArrayObj;

    function __construct($id)
    {
        $db=Dbconnection::getInstance();
        if ($id !="")
        {
            $sql="select * from student WHERE ID=$id";
            //mysql_query($sql);
            $StudentDataSet = mysql_query($sql) or die(mysql_error());
            if($row = mysql_fetch_array($StudentDataSet))
            {
                $this->FullName=$row["FullName"];
                $this->Address=$row["Address"];
                $this->Id=$id;
                $sql="select * from studenthobby WHERE StudentID=".$id;
                $AllHobbyID = mysql_query($sql)or die(mysql_error());
                $i=0;
                while ($row1 = mysql_fetch_array($AllHobbyID))
                {
                    $this->HobbyArrayObj[$i]=new Hobby($row1["HobbyID"]);
                    $i++;
                }
            }
        }
    }
    public static function SelectAllStudentsInDB()
    {
        $db=Dbconnection::getInstance();
        $sql="select * from student ORDER BY FullName";
        //mysql_query($sql);
        $StudentDataSet= mysql_query($sql) or die(mysql_error());
        $i=0;
        $Result;
        while ($row=mysql_fetch_array($StudentDataSet))
        {
            $MyObj = new student($row["Id"]);
            $Result[$i]=$MyObj;
            $i++;
        }
        return $Result;
    }
}
?>