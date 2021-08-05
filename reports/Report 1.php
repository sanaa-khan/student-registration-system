<HTML>
    <HEAd>
        <title> Student per Class Form </title> 
    </HEAd>
    <BODY>
    <?php  // creating a database connection 

	$db_sid = 
	"(DESCRIPTION =
	(ADDRESS = (PROTOCOL = TCP)(HOST = sanakhan)(PORT = 1521))
	(CONNECT_DATA =
	(SERVER = DEDICATED)
	(SERVICE_NAME = sanakhan)
	)
	)";            // Your oracle SID, can be found in tnsnames.ora  ((oraclebase)\app\Your_username\product\11.2.0\dbhome_1\NETWORK\ADMIN) 
  
   $db_user = "scott";   // Oracle username e.g "scott"
   $db_pass = "1234";    // Password for user e.g "1234"
   $con = oci_connect($db_user,$db_pass,$db_sid); 
   if($con) 
      {  }//echo "Connected successfully";} 
   else 
      { die('Could not connect to Oracle: '); } 
    ?>
        <center> <B>HAMAREY BACHCHEY</B> </center>
        <center> <B>STUDENTS PER CLASS FORM</B> </center>
        <br>
        <form form name = "input" action="Report 1.php" method="post">
            SEARCH <input type="text" name="value"/>
            <select name = "stype">
                <option value="Name">Name</option>
                <option value="ID">ID</option>
                <option value="Grade">Grade</option>
            </select>
            <input type="submit" value="Search" name = "search_button"/> <BR><BR>
            DELETE  <input type="text" name="delvalue"/>
            <select name = "dtype">
                <option value="Name">Name</option>
                <option value="ID">ID</option>
            </select>
            <input type="submit" value="Delete" name = "del_button"/>
        </form>
    </BODY>
    
    <?php
        if($_POST["del_button"])
        {
            $dval = $_POST['delvalue'];
            if($dval == NULL)
                {die('Search box was empty');}
            if($_POST['dtype'] == "Name")
            {
                $q = "select * from student_archive where NAME = '$dval' and STATUS = 'Current'";
                $query_id = oci_parse($con, $q);		
                $r = oci_execute($query_id);
                if($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS))
                {
                    $del_id = $row['STUDENT_ID'];
                    
                    $q = "delete from current_student where STUDENT_ID = '$del_id'";
                    $query_id = oci_parse($con, $q);		
                    $r = oci_execute($query_id);

                    $q = "update student_archive set status = 'Dropout' where STUDENT_ID = '$del_id'";
                    $query_id = oci_parse($con, $q);	
                    $r = oci_execute($query_id);

                    echo "Record Deleted, student is now a dropout<br>";
                }
                else
                    echo "Student name is not a current student or does not exist";
            }
            else if ($_POST['dtype'] == "ID")
            {
                $q = "select * from current_student where STUDENT_ID = '$dval'";
                $query_id = oci_parse($con, $q);		
                $r = oci_execute($query_id);
                if($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS))
                {
                    $del_id = $row['STUDENT_ID'];
                    
                    $q = "delete from current_student where STUDENT_ID = '$del_id'";
                    $query_id = oci_parse($con, $q);		
                    $r = oci_execute($query_id);

                    $q = "update student_archive set status = 'Dropout' where STUDENT_ID = '$del_id'";
                    $query_id = oci_parse($con, $q);	
                    $r = oci_execute($query_id);

                    echo "Record Deleted, student is now a dropout<br>";
                }
                else
                    echo "Student does not exist";
            }
        }
        if($_POST["search_button"])
        {
            $sval = $_POST['value'];
            if($sval == NULL)
                {die('Search box was empty');}
            if($_POST['stype'] == "Name")
            {
                $q = "select * from student_archive where NAME = '$sval' and STATUS = 'Current'";
                $query_id = oci_parse($con, $q);		
                $r = oci_execute($query_id);
                echo "<TABLE>".
                 "<TR><TD><B> ID </B></TD> <TD><B> Name </B></TD> <TD><B> DOB </B></TD> <TD><B> Gender </B></TD></TR>";
                if($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS))
                {
                    echo  "<TR>".
                        "<TD style = width:150px>".$row['STUDENT_ID']."</TD>".
                        "<TD style = width:150px>".$row['NAME']."</TD>".
                        "<TD style = width:150px>".$row['DATE_OF_BIRTH']."</TD>".
                        "<TD style = width:150px>".$row['GENDER']."</TD>".
                     "</TR>";
                     echo "</TABLE><HR style=border-width:2><BR>";
                }
                else
                    echo "Student is not a current student or does not exist";
                
            }
            else if ($_POST['stype'] == "ID")
            {
                $q = "select * from student_archive where STUDENT_ID = '$sval' and STATUS = 'Current'";
                $query_id = oci_parse($con, $q);		
                $r = oci_execute($query_id);
                echo "<TABLE>".
                 "<TR><TD><B> ID </B></TD> <TD><B> Name </B></TD> <TD><B> DOB </B></TD> <TD><B> Gender </B></TD></TR>";
                if($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS))
                {
                    echo  "<TR>".
                        "<TD style = width:150px>".$row['STUDENT_ID']."</TD>".
                        "<TD style = width:150px>".$row['NAME']."</TD>".
                        "<TD style = width:150px>".$row['DATE_OF_BIRTH']."</TD>".
                        "<TD style = width:150px>".$row['GENDER']."</TD>".
                     "</TR>";
                     echo "</TABLE><HR style=border-width:2><BR>";
                }
                else
                    echo "Student is not a current student or does not exist";
            }
            else if ($_POST['stype'] == "Grade")
            {
                echo "<B>Grade: ".$sval."</B><BR>";
                $q = "select * from current_student where CLASS_GRADE = $sval";
                $query_id = oci_parse($con, $q);		
                $r = oci_execute($query_id);
                echo "<TABLE>".
                 "<TR><TD><B> ID </B></TD> <TD><B> Name </B></TD> <TD><B> DOB </B></TD> <TD><B> Gender </B></TD></TR>";
                while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS))
                {
                    $sid = $row['STUDENT_ID'];
                    $q5 = "select * from student_archive where STUDENT_ID = '$sid' and STATUS = 'Current'";
                    $query_id5 = oci_parse($con, $q5);		
                    $r5 = oci_execute($query_id5);
                    $row1 = oci_fetch_array($query_id5, OCI_BOTH+OCI_RETURN_NULLS);
                    echo  "<TR>".
                        "<TD style = width:150px>".$row1['STUDENT_ID']."</TD>".
                        "<TD style = width:150px>".$row1['NAME']."</TD>".
                        "<TD style = width:150px>".$row1['DATE_OF_BIRTH']."</TD>".
                        "<TD style = width:150px>".$row1['GENDER']."</TD>".
                     "</TR>";
                }
                echo "</TABLE><HR style=border-width:2><BR>";
            }
        }
        $q = "select * from current_student order by class_grade";
        $query_id = oci_parse($con, $q);		
        $r = oci_execute($query_id);

        $q3 = "select * from current_student order by class_grade";
        $query_id3 = oci_parse($con, $q3);		
        $r3 = oci_execute($query_id3);
        $next = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
    ?>    
        <center> <H2>List of Students</H2> </center>
        <?php
        $heading = 0;
        $count = 0;
        $prev_class;
        $prev_sec;
        echo "<B><U>Class: ".$next['CLASS_GRADE'].$next['CLASS_SECTION']."</B></U>";
            echo "<TABLE>".
                 "<TR><TD><B> ID </B></TD> <TD><B> Name </B></TD> <TD><B> DOB </B></TD> <TD><B> Gender </B></TD></TR>";
            while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS))
            {
                $next = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
                $pclass = $row['CLASS_GRADE'];
                $psec = $row['CLASS_SECTION'];
                $nclass = $next['CLASS_GRADE'];
                $nsec = $next['CLASS_SECTION'];


                if($heading == 1)
                {
                    echo "<B><U>Class: ".$pclass.$psec."</B></U>";
                    echo "<TABLE>".
                         "<TR><TD><B> ID </B></TD> <TD><B> Name </B></TD> <TD><B> DOB </B></TD> <TD><B> Gender </B></TD></TR>";
                    $heading = 0;
                }
                
                //echo "inside loop <br>";
                $count = $count + 1;
                $id = $row['STUDENT_ID'];
                $q2 = "select * from student_archive where student_id = $id";
                $query_id2 = oci_parse($con, $q2);		
                $r2 = oci_execute($query_id2);
                $data = oci_fetch_array($query_id2, OCI_BOTH+OCI_RETURN_NULLS);
                echo  "<TR>".
                        "<TD style = width:150px>".$data['STUDENT_ID']."</TD>".
                        "<TD style = width:150px>".$data['NAME']."</TD>".
                        "<TD style = width:150px>".$data['DATE_OF_BIRTH']."</TD>".
                        "<TD style = width:150px>".$data['GENDER']."</TD>".
                     "</TR>";
                if($psec != $nsec || $pclass != $nclass)
                {
                    echo "</TABLE>";
                    echo "<B>Total Students: ".$count."</B><HR>";
                    $heading = 1;
                    $count = 0;
                }
            }
        ?>
    </TABLE>

    
</HTML>