<HTML>
    <HEAd>
        <title> Class Assignment Form </title> 
    </HEAd>
    <BODY>
    <?php  // creating a database connection 

	$db_sid = 
	"(DESCRIPTION =
	(ADDRESS = (PROTOCOL = TCP)(HOST = DELL)(PORT = 1521))
	(CONNECT_DATA =
	(SERVER = DEDICATED)
	(SERVICE_NAME = affan)
	)
	)";            // Your oracle SID, can be found in tnsnames.ora  ((oraclebase)\app\Your_username\product\11.2.0\dbhome_1\NETWORK\ADMIN) 
  
   $db_user = "scott";   // Oracle username e.g "scott"
   $db_pass = "0515879378";    // Password for user e.g "1234"
   $con = oci_connect($db_user,$db_pass,$db_sid); 
   if($con) 
      {  }//echo "Connected successfully";} 
   else 
      { die('Could not connect to Oracle: '); } 
    ?>
        <center> <B>HAMAREY BACHCHEY</B> </center>
        <center> <B>CLASS ASSIGNMENT FORM</B> </center>
        <br>
        <form form name = "input" action="class_assignment.php" method="post">
            <TABLE>
                <TR> <TD> Student ID </TD> <TD> <input type="text" name="std_id"/> </TD></TR>
                <TR> <TD> Current Class </TD> <TD> <input type="text" name="curr_class" placeholder="Grade"/> <input type="text" name="curr_class_sec" placeholder="Section"/> </TD></TR>
                <TR> <TD> New Class </TD> <TD> <input type="text" name="new_class" placeholder="Grade"/> <input type="text" name="new_class_sec" placeholder="Section"/> </TD></TR>
                <TR align="left" valign="top"> <TD> Reason for change </TD> <TD><textarea name="change" rows="4" cols="50"> </textarea> </TD></TR>
                <TR> <TD> Approved by </TD> <TD> <input type="text" name="app_name"/> </TD></TR>
            </TABLE>
            <br>
            <input type="submit" value="Submit" name = "sub_button"/>
        </form>
    </BODY>
    <?php
        if($_POST["sub_button"])
        {
            $id = $_POST["std_id"];
            $new_grade = $_POST["new_class"];
            $new_sec = $_POST["new_class_sec"];
            $old_grade = $_POST["curr_class"];
            $old_sec = $_POST["curr_class_sec"];
            
            $q = "select * from current_student where student_id = '$id'";
            $query_id = oci_parse($con, $q);		
            $r = oci_execute($query_id);

            $old_row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);

            if($old_row == NULL)
            {
                die('Student does not exist');
            }
            else
            {
                $m_sec = $old_row['CLASS_SECTION'];
                if($old_row['CLASS_GRADE'] != $old_grade || $m_sec != $old_sec)
                    {die('Class grade/section does not match');}
                if($new_sec == NULL || $new_grade == NULL)
                    {die('One of the value(s) is missing: New Grade, New Section');}
        
                $q = "update CURRENT_STUDENT set CLASS_GRADE = $new_grade, CLASS_SECTION = '$new_sec' where STUDENT_ID = '$id'";
                $query_id = oci_parse($con, $q);		
                $r = oci_execute($query_id);
                if($r)
                    {echo "UPDATED";}
                else
                    {die('Could not update');}

                $q2 = "select student_id, max(serial_no) as sno from student_log where student_id = '$id' group by student_id";
                $query_id2 = oci_parse($con, $q2);		
                $r2 = oci_execute($query_id2);
                
                $row = oci_fetch_array($query_id2, OCI_BOTH+OCI_RETURN_NULLS);
                $today = date("d/m/Y H:i:s");
                if($row == NULL)
                {
                    $q = "Insert into student_log (student_id, serial_no, change_type, change,date_time) Values ('$id',100,'Student Grade', $old_grade,to_date('$today', 'DD/MM/YYYY HH24:MI:SS'))";
                    $query_id = oci_parse($con, $q);		
                    $r = oci_execute($query_id);
                    
                    $q = "Insert into student_log (student_id, serial_no, change_type, change,date_time) Values ('$id',101,'Student Section', '$old_sec' ,to_date('$today', 'DD/MM/YYYY HH24:MI:SS'))";
                    $query_id = oci_parse($con, $q);
                    $r = oci_execute($query_id);
                }
                else
                {
                    // student exists
                    $sno = $row['SNO'] + 1;
                    $q = "Insert into student_log (student_id, serial_no, change_type, change,date_time) Values ('$id',$sno,'Student Grade', $old_grade,to_date('$today', 'DD/MM/YYYY HH24:MI:SS'))";
                    $query_id = oci_parse($con, $q);		
                    $r = oci_execute($query_id);

                    $sno = $sno + 1;
                    $q = "Insert into student_log (student_id, serial_no, change_type, change,date_time) Values ('$id',$sno,'Student Section', '$old_sec' ,to_date('$today', 'DD/MM/YYYY HH24:MI:SS'))";
                    $query_id = oci_parse($con, $q);		
                    $r = oci_execute($query_id);
                }
            }
        }
    ?>
</HTML>