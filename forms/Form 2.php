<!doctype html>

<html>
	<head>
        <title>Student Accompanying Form</title>
	</head>
    
	<body>
        <div style ='margin-left:20%;
                    margin-top:2%;
                    padding-bottom:30px;
                    border:1px solid black;
                    width:60%'>
		<form action="form2.php" method="post">
            <h1 style='margin-left:35%'>HAMARAY BACHCHEY</h1>
            <h2 style='margin-left:35%'>STUDENT ACCOMPANYING FORM</h2>

            <br> <br>

            <div style='padding-left:20%'><b><u>Student Information:</u></b></div>
            <br> 

            <table style = 'padding-left:34%' cellpadding="10px">
                <tr>
                    <td>ID</td>
                    <td>:</td>
                    <td><input type="text" name="s_id"/></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td><input type="text" name="s_name"/></td>
                </tr>
                <tr>
                    <td>Class Grade</td>
                    <td>:</td>
                    <td><input type="text" name="s_grade"/></td>
                </tr>
                <tr>
                    <td>Class Section</td>
                    <td>:</td>
                    <td><input type="text" name="s_section"/></td>
                </tr>
            </table>

            <br>
            <hr>
            <br>
            <br>

            <div style='padding-left:20%'><b><u>Accompanying Guardian Information:</u></b></div>
            <br>

            <table style = 'padding-left:25%' cellpadding="10px">
                <tr>
                    <td>ID</td>
                    <td>:</td>
                    <td><input type="text" name="g_id"/></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td><input type="text" name="g_name"/></td>
                </tr>
                <tr>
                    <td>Contact No</td>
                    <td>:</td>
                    <td><input type="number" name="g_contact"/></td>
                </tr>
                <tr>
                    <td>Pregnant</td>
                    <td>:</td>
                    <td>
                        <input type="checkbox" name="pregnant" value="1">Yes</input>
                        <input type="checkbox" name="pregnant" value="0">No</input>
                    </td>
                </tr>
                <tr>
                    <td>Reasons for Parents Absence</td>
                    <td>:</td>
                    <td><textarea name="reason" rows="4" cols="22"></textarea></td>
                </tr>
            </table>

            <br>
            <br>
            <div style='padding-left:47%'><input type="submit" value="Save Data" style='background-color:black; color:white; border-radius:5px; height:50px; width:150px'/></div>
        </form>
        </div>
	</body>
</hmtl>

<?php

// establishing connection to database
$db_sid = 
"(DESCRIPTION =
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
      {  } 
   else 
      { die('Could not connect to Oracle: '); } 

        $sID = $_POST["s_id"];
        $sName = $_POST["s_name"];

        $cGrade = $_POST["s_grade"];
        $cSection = $_POST["s_section"];

        $gID = $_POST["g_id"];
        $gName = $_POST["g_name"];
        $gContact = $_POST["g_contact"];

        $pStatus = $_POST['pregnant'];
        $res = $_POST['reason'];

        $q7 = "select * from current_student where student_id=$sID";
		$query_id7 = oci_parse($con, $q7); 		
        $r = oci_execute($query_id7); 

        while($row = oci_fetch_array($query_id7, OCI_BOTH+OCI_RETURN_NULLS)) 
		{ 
            if ($row['CLASS_GRADE'] == $cGrade and $row['CLASS_SECTION'] == $cSection) {
               // student enrolled in that class
            } 

            else {
                echo "<h3 style='text-align: center'>Student not enrolled in that class.</h3><br>";
                die;
            }
        }

        $q1 = "select * from guardian where guardianid=$gID";
		$query_id1 = oci_parse($con, $q1); 		
        $r = oci_execute($query_id1); 
        
        if (!$r) {
            echo "<h3 style='text-align: center'>Invalid Guardian ID.</h3><br>";
            die;
        }
		
		while($row = oci_fetch_array($query_id1, OCI_BOTH+OCI_RETURN_NULLS)) 
		{ 
            $g = $row['GENDER'];
        }

        if ($g != 'F') {
            echo "<h3 style='text-align: center'>Accompanying guardian must be female.</h3><br>";
        }

        else {
            $q="update guardian set pregnancyStatus=$pStatus, contactno=$gContact where guardianid=$gID";
	        $query_id = oci_parse($con, $q); 		
            $r = oci_execute($query_id); 

            $q2="select * from student_archive where student_id=$sID";
	        $query_id2 = oci_parse($con, $q2); 		
            $r = oci_execute($query_id2);

            $prevGID;

            while($row = oci_fetch_array($query_id2, OCI_BOTH+OCI_RETURN_NULLS)) 
            { 
                    $prevGID = $row['GUARDIAN_ID'];
            }

            $q5="update student_archive set guardian_id=$gID where student_id=$sID";
	        $query_id5 = oci_parse($con, $q5); 		
            $r = oci_execute($query_id5); 

            $q3="select * from student_log where student_id=$sID";
	        $query_id3 = oci_parse($con, $q3); 		
            $r = oci_execute($query_id3);

            $serialNo = '100';

            while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)) 
            { 
                $serialNo = $row['SERIAL_NO'];
            }

            $serialNo = $serialNo + 1;

            $q4="insert into student_log (student_id, serial_no, change_type, change, date_time)".
                "values($sID, $serialNo, 'Guardian ID', $prevGID, sysdate)";
	        $query_id4 = oci_parse($con, $q4); 		
            $r = oci_execute($query_id4);

            if ($r) {
                echo "<h3 style='text-align: center'>Records updated.</h3><br>";
            }

            else   
                echo "<h3 style='text-align: center'>Records not updated.</h3><br>";
        }
    
?>