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
(ADDRESS = (PROTOCOL = TCP)(HOST = DESKTOP-S1CKQJU)(PORT = 1521))
(CONNECT_DATA =
  (SERVER = DEDICATED)
  (SERVICE_NAME = ali17)
)
)";
$db_user = "scott";
$db_pass = "ali12345";
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
    <h3 style ="text-align:center;">STUDENT ADMISSION FORM</h3>
    
    <form form name = "insertion" action="student_admission.php" method = "post">
    
    
        <table>
        <tr>
        <td><p class ="serif">&nbsp;<b>Students Information:</b></p></td>
        <td></td>
        <td></td>
        <td></td>
        <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<div id = "photo_logo"><img src = "photo.jpeg" width = "100" height = "90" /></div>
        </tr>
        <tr>
        <td>&emsp;Name:</td>
        <td><input type = "text" name = "stu_name"/></td>
        <td></td>
        <td></td>
        <td style = "text-align:right"><input type = "file" name ="photoupload" id = "photoupload">
        </tr>
        <tr>
        <td>&emsp;Date of Birth:</td>
        <td><input type = "date" name = "stu_dob"/></td>
        <td></td>
        <td></td>
        <td></td>
        </tr>
        <tr>
        <td>&emsp;Gender:</td>
        <td><input type="radio" name="stu_gender" value="M" /> Male
	         <input type="radio" name="stu_gender" value="F" /> Female</td>
        <td></td>
        <td></td>
        <td></td>
        </tr>
        <td>&emsp;CNIC:</td>
        <td><input type = "text" name = "stu_cnic"/></td>
        <td></td>
        <td></td>
        <td></td>
        </tr>
        <tr>
        <td>&emsp;Blood Type:</td>
        <td><select name = "stu_blood"><option value = "A+">A+</option>
        <option value = "B+">A+</option>
        <option value = "AB+">AB+</option>
        <option value = "O+">O+</option>
        <option value = "A-">A-</option>
        <option value = "B-">B-</option>
        <option value = "AB-">AB-</option>
        <option value = "O-">O-</option>
        </select>
        </tr>
        <tr>
        <td><p class = "serif">&nbsp;<b>Parents Information:</b></p></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        </tr>
        <tr>
        <td>&emsp;Mother Name:</td>
        <td><input type = "text" name = "mother_name"/></td>
        <td>&emsp;Father Name:</td>
        <td><input type = "text" name = "father_name"/></td>
        <td></td>
        </tr>
        <tr>
        <td>&emsp;Mother Contact:</td>
        <td><input type = "text" name = "mother_contact"/></td>
        <td>&emsp;Father Contact:</td>
        <td><input type = "text" name = "father_contact"/></td>
        <td></td>
        </tr>
        <tr>
        <td>&emsp;Mother CNIC:</td>
        <td><input type = "text" name = "mother_cnic"/></td>
        <td>&emsp;Father CNIC:</td>
        <td><input type = "text" name = "father_cnic"/></td>
        <td></td>
        </tr>
        <tr>
        <td>&emsp;Mother Email:</td>
        <td><input type = "text" name = "mother_email"/></td>
        <td>&emsp;Father Email:</td>
        <td><input type = "text" name = "father_email"/></td>
        <td></td>
        </tr>
        <tr>
        <td>&emsp;Mother Address:</td>
        <td><input type = "text" name = "mother_address"/></td>
        <td>&emsp;Father Address:</td>
        <td><input type = "text" name = "father_address"/></td>
        <td></td>
        </tr>
        <tr>
        <td><p class = "serif">&nbsp;<b>Guardian Information:</b></p></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        </tr>
        <tr>
        <td>&emsp;Guardian Name:</td>
        <td><input type = "text" name = "guardian_name"/></td>
        <td></td>
        <td></td>
        <td></td>
        </tr>
        <tr>
        <td>&emsp;Guardian Contact:</td>
        <td><input type = "text" name = "guardian_contact"/></td>
        <td></td>
        <td></td>
        <td></td>
        </tr>
        <tr>
        <td>&emsp;Guardian CNIC:</td>
        <td><input type = "text" name = "guardian_cnic"/></td>
        <td></td>
        <td></td>
        <td></td>
        </tr>
        <tr>
        <td>&emsp;Guardian Gender:</td>
        <td><input type="radio" name="guardian_gender" value="M" /> Male
	         <input type="radio" name="guardian_gender" value="F" /> Female</td>
        <td></td>
        <td></td>
        <td></td>
        </tr>
        <tr>
        <td>&emsp;Relation:</td>
        <td><input type = "text" name = "guardian_relation"/></td>
        <td></td>
        <td></td>
        <td></td>
        </tr>
        <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><h3 style ="text-align:center;">For Staff Only</h3></td>
        <td></td>
        </tr>
        <tr>
        <td>&emsp;Fee Amount:</td>
        <td><input type = "number" name = "fee_amount"/></td>
        <td></td>
        <td></td>
        <td></td>
        </tr>
        <tr>
        <td>&emsp;Discount:</td>
        <td><input type = "number" name = "discount"/></td>
        <td></td>
        <td></td>
        <td></td>
        </tr>
        <tr>
        <td>&emsp;Final Amount:</td>
        <td><input type = "number" name = "final_amount"/></td>
        <td></td>
        <td></td>
        <td></td>
        </tr>
        <tr>
        <td>&emsp;Fee Fully Paid :</td>
        <td><input type="radio" name="fee_paid" value="yes" /> Yes
	         <input type="radio" name="fee_paid" value="no" /> No</td>
        <td></td>
        <td></td>
        <td></td>
        </tr>
        <tr>
        <td>&emsp;Challan:</td>
        <td><input type = "number" name = "challan_number"/></td>
        <td></td>
        <td></td>
        <td></td>
        </tr>
        <tr>
        <td>&emsp;Date:</td>
        <td><input type = "date" name = "currentdate"/></td>
        <td></td>
        <td></td>
        <td></td>
        </tr>
        </table>
    <br>
    <br>
    &emsp;<input type ="submit" value = "Enroll Student" name = "Submitted" />
    </form>
<?php
    if($_POST["Submitted"])
    {
        $studentname = $_POST["stu_name"];
        //$studentdob = $_POST["stu_dob"];
        $studentdob = date('Y-m-d',strtotime($_POST["stu_dob"]));
        $studentgender = $_POST["stu_gender"];
        $studentcnic = $_POST["stu_cnic"];
        $studentbloodgroup = $_POST["stu_blood"];

        $mothername = $_POST["mother_name"];
        $fathername = $_POST["father_name"];
       
        $mothercontact = $_POST["mother_contact"];
        $fathercontact = $_POST["father_contact"];
       
        $mothercnic = $_POST["mother_cnic"];
        $fathercnic = $_POST["father_cnic"];
        
        $motheremail = $_POST["mother_email"];
        $fatheremail = $_POST["father_email"];
        
        $motheraddress = $_POST["mother_address"];
        $fatheraddress = $_POST["father_address"];
       
        $guardianname = $_POST["guardian_name"];
        $guardiancontact = $_POST["guardian_contact"];
        $guardiancnic = $_POST["guardian_cnic"];
        $guardiangender = $_POST["guardian_gender"];
        $guardianrelation = $_POST["guardian_relation"];

        $feeamount = $_POST["fee_amount"];
        $feediscount = $_POST["discount"];
        $feefinalamount = $_POST["final_amount"];
        $feepaid = $_POST["fee_paid"];
        $feechallan = $_POST["challan_number"];
        //$currdate = $_POST["currentdate"];

        $currdate = date('Y-m-d',strtotime($_POST["currentdate"]));

      //  echo"$studentname"."<br>";
      //  echo"$studentdob"."<br>";
      //  echo"$studentgender"."<br>";
      //  echo"$studentcnic"."<br>";
       // echo"$studentbloodgroup"."<br>";

       // echo"$mothername"."<br>";
       // echo"$fathername"."<br>";
       // echo"$mothercontact"."<br>";
      // echo"$fathercontact"."<br>";

        //echo"$mothercnic"."<br>";

        $guardianval = NULL;
        $motherval = NULL;
        $fatherval = NULL;
        $stdval = NULL;
        if ($feechallan == NULL || $feepaid == NULL || $feefinalamount == NULL || $feediscount == NULL || $feeamount == NULL || $guardianrelation == NULL || $guardiangender == NULL || $guardiancnic == NULL || $guardiancontact == NULL || $guardianname == NULL || $fatheraddress == NULL || $motheraddress == NULL || $motheremail == NULL || $fatheremail == NULL || $mothercnic == NULL || $fathercnic == NULL || $mothercontact == NULL || $fathercontact == NULL || $mothername == NULL || $fathername == NULL || $studentname == NULL || $studentdob == NULL || $studentgender == NULL)
        {
            die("One or more fields left empty!! Please try again.");
        }
        //Guardian.
        $q = "select GUARDIANID from guardian where cnic = '$guardiancnic'";
        $query_id = oci_parse($con,$q);
        $r = oci_execute($query_id);
        if ($r)
        {
            while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS))
            {
                echo $row['GUARDIANID']."<br>";
                
            }
            
            if ($row == NULL)//Guardian not already there.
            {
                $q = "select max(GUARDIANID) as GUARD from guardian";
                $query_id = oci_parse($con,$q);
                $r = oci_execute($query_id);
                if ($r)
                {
                    $row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
                    $guardianval = $row['GUARD'];
                    $guardianval = $guardianval+1;
                    //echo "GUARDIAN VALUE IS "."$guardianval"."<br>";
                    $q = "insert into guardian values('$guardianval','$guardianrelation','$guardianname','$guardiangender','$guardiancnic',NULL,NULL,NULL,NULL,NULL,'$guardiancontact',NULL,NULL)";
                    $query_id = oci_parse($con,$q);
                    $r = oci_execute($query_id);
                    if($r)
                    {
                       // echo "Guardian updated successfully."."<br";
                    }
                    else
                    {
                        echo "Guardian updation failed."."<br";
                    }
                }
                else
                {
                    
                    echo "Error finding max guardian value."."<br";
                }
            }
            else
            {
                $guardianval = $row['GUARDIANID'];
                echo "Guardian already present!"."<br>";
            }
            
        }
        else
        {
            echo "Error while finding guardian!"."<br";

        }
        //Mother.
        $q = "select MOTHERID from mother where cnic = '$mothercnic'";
        $query_id = oci_parse($con,$q);
        $r = oci_execute($query_id);
        if ($r)
        {
            $row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
            if ($row == NULL)//Mother not already there.
            {
                $q = "select max(MOTHERID) as MOTHERVAL from mother";
                $query_id = oci_parse($con,$q);
                $r = oci_execute($query_id);
                if ($r)
                {
                    $row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
                    $motherval = $row['MOTHERVAL'];
                    $motherval = $motherval + 1;
                    //echo "MOTHER VALUE IS "."$motherval"."<br>";
                    $q = "insert into mother values('$motherval','$mothername','$mothercnic','$motheraddress',NULL,NULL,NULL,'$motheremail','$mothercontact',NULL,NULL)";
                    $query_id = oci_parse($con,$q);
                    $r = oci_execute($query_id);
                    if($r)
                    {
                        //echo "Mother updated successfully."."<br";
                    }
                    else
                    {
                        echo "Mother updation failed."."<br";
                    }
                }
                else
                {
                    echo "Error finding max mother value."."<br";
                }

            }
            else
            {
                $motherval = $row['MOTHERID'];
                echo "Mother already present!"."<br>";
            }
        }
        else
        {
            echo "Error while finding mother!"."<br>";
        }
        //Father.
        $q = "select FATHERID from father where cnic = '$fathercnic'";
        $query_id = oci_parse($con,$q);
        $r = oci_execute($query_id);
        if ($r)
        {
            $row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
            if ($row == NULL)//Mother not already there.
            {
                $q = "select max(FATHERID) as FATHERVAL from father";
                $query_id = oci_parse($con,$q);
                $r = oci_execute($query_id);
                if ($r)
                {
                    $row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
                    $fatherval = $row['FATHERVAL'];
                    $fatherval = $fatherval + 1;
                    //echo "FATHER VALUE IS "."$fatherval"."<br>";
                    $q = "insert into father values('$fatherval','$fathername','$fathercnic','$fatheraddress',NULL,NULL,NULL,'$fatheremail','$fathercontact',NULL)";
                    $query_id = oci_parse($con,$q);
                    $r = oci_execute($query_id);
                    if($r)
                    {
                        //echo "Father updated successfully."."<br";
                    }
                    else
                    {
                        echo "Father updation failed."."<br";
                    }
                }
                else
                {
                    echo "Error finding max father value."."<br";
                }

            }
            else
            {
                $fatherval = $row ['FATHERID'];
                echo "Father already present!"."<br>";
            }
        }
        else
        {
            echo "Error while finding father!"."<br>";
        }
        $q = "select max(STUDENT_ID) as STDVAL from student_archive";
        $query_id = oci_parse($con,$q);
        $r = oci_execute($query_id);
        if($r)
        {
            //echo "Stdval found!";
            $row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
            $stdval = $row['STDVAL'];
            //echo $stdval;
            $stdval = $stdval+1;
            //echo "STD VAL : ".$stdval;
            $q = "insert into student_archive values('$stdval','$studentname','$studentgender',TO_DATE('$currdate','yyyy/mm/dd'),'$studentcnic','$fatherval','$motherval','$guardianval','$fatheraddress',TO_DATE('$studentdob','yyyy/mm/dd'),'$studentbloodgroup',NULL,NULL,NULL)";
            $query_id = oci_parse($con,$q);
            $r = oci_execute($query_id);
            if ($r)
            {
                echo "Student updation successful."."<br";
                /*if ($guardianval != NULL)
                {
                    $q = "update student_archive set GUARDIAN_ID = '$guardianval' where STUDENT_ID = '$stdval'";
                    $query_id = oci_parse($con,$q);
                    $r = oci_execute($query_id);
                    if ($r)
                    {
                        echo "Student Guardian updated successfully";
                    }
                     else
                    {
                        echo "Failed to update student guardian!"."<br>";
                    }
                    }
                if ($motherval != NULL)
                {
                    $q = "update student_archive set MOTHER_ID = '$motherval' where STUDENT_ID = '$stdval'";
                    $query_id = oci_parse($con,$q);
                    $r = oci_execute($query_id);
                    if ($r)
                    {
                         echo "Student Mother updated successfully";
                    }
                    else
                    {
                        echo "Failed to update student mother!"."<br>";
                    }
                }
                if ($fatherval != NULL)
                {
                    $q = "update student_archive set FATHER_ID = '$fatherval' where STUDENT_ID = '$stdval'";
                    $query_id = oci_parse($con,$q);
                    $r = oci_execute($query_id);
                    if ($r)
                    {
                        echo "Student Father updated successfully";
                    }
                    else
                    {
                        echo "Failed to update student father!"."<br>";
                    }
                }*/
            }
            else
            {
                echo "Student updation failed."."<br";
            }
                //echo $stdval;    
        }
        else
        {
            echo "Error finding max student value, please try again.";
            echo "<br>";
        }
    }
?>
</body>
</html>
