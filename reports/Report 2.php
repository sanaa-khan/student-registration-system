<html>
<style>
body {
    border: 3px solid black;
}
.serif {
    font-family: "Times New Roman", Times,serif;
}
#photo_logo {
    float:left;
    padding-left:200px;
}
</style>
<head>
<title>Student Admission Form </title>
</head>
 
<body>
<?php  // creating a database connection 
 
$db_sid = "(DESCRIPTION =
(ADDRESS = (PROTOCOL = TCP)(HOST = sanakhan)(PORT = 1521))
(CONNECT_DATA =
  (SERVER = DEDICATED)
  (SERVICE_NAME = sanakhan)
)
)";
$db_user = "scott";
$db_pass = "1234";
$con = oci_connect($db_user,$db_pass,$db_sid);
if($con)
{
//echo"Connection to Oracle Successful";
}
else
{
die("Could not connect to Oracle!");
}
?>
    <h2 style ="text-align:center; ">HAMAREY BACHCHEY</h2>
    <h3 style ="text-align:center;">STUDENTS PER CLASS</h3>

    <form form name = "insertion" action="Report 2.php" method = "post">
    <table>
    <tr>
    <td>Enter class grade:</td>
    <td><input type = "text" name = "student_grade"/></td>
    <td>Enter class section:</td>
    <td><input type = "text" name = "student_section"/></td>
    </tr>
    </table>
    &emsp;<input type ="submit" value = "Enter" name = "Submitted" />
    </form>
<table border = 1>
    <tr>
    <td>Number of Students</td>
    <td>Female</td>
    <td>Male</td>
    </tr>
<?php
    if($_POST["Submitted"])
    {
        $grade = $_POST["student_grade"];
        $section = $_POST["student_section"];
        $q = "select count(STUDENT_ID) as COUNTSTUDENTS from current_student where CLASS_GRADE = '$grade' AND CLASS_SECTION = '$section'";
        $query_id = oci_parse($con,$q);
        $r = oci_execute($query_id);
        if ($r)
        {
            while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS))
            {   
                echo "<tr>".
                        "<td>".$row['COUNTSTUDENTS']."</td>";
            } 
            $q = "select count(table1.STUDENT_ID) as COUNTFEMALE
                from current_student table1, student_archive table2
                where table1.CLASS_GRADE = $grade AND table1.CLASS_SECTION = '$section'
                AND table1.STUDENT_ID = table2.STUDENT_ID
                AND ( table2.gender = 'f' or table2.gender = 'F')";
            $query_id = oci_parse($con,$q);
            $r = oci_execute($query_id);
            if($r)
            {
                while ($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS))
                {
                    echo "<td>".$row['COUNTFEMALE']."</td>";
                }
                $q = "select count(table1.STUDENT_ID) as COUNTMALE
                from current_student table1, student_archive table2
                where table1.CLASS_GRADE = $grade AND table1.CLASS_SECTION = '$section'
                AND table1.STUDENT_ID = table2.STUDENT_ID
                AND ( table2.gender = 'm' or table2.gender = 'M')";
                $query_id = oci_parse($con,$q);
                $r = oci_execute($query_id);
                if ($r)
                {
                    while ($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS))
                    {
                        echo "<td>".$row['COUNTMALE']."</td>"."</tr>";
                    }
                }
                else
                {
                    echo "Male queries failed!";
                }
            }
            else
            {
                echo "Females query failed!";
            }
        }
        else
        {
            echo "Invalid grade or section selected!";
        }
    }

?>
</table>
</body>
</html>
