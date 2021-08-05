<!doctype html>

<html>
	<head>
		<title>Parent Report</title>
	</head>
    
	<body>
    <form action="parent.php" method="post">
		<h1 align="middle">HAMARAY BACHCHEY</h1>
        <h1 align="middle">Parent Info</h1>
            <br>

            <div style='padding-left:37%'>
            <table>
                <tr>
                    <td>Name : <input type="text" name="name"/></td>
                    <td>ID : <input type="text" name="id"/></td>
                </tr>
            </table>
            </div>
            <br>
            <br>
            <div style='padding-left:47%'><input type="submit" value="Generate Report"/></div>
        </form>
        </div>
    </form>
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

   $name = $_POST['name'];
   $id = $_POST['id'];

   $con = oci_connect($db_user,$db_pass,$db_sid); 
   if($con) 
      {  
		if (!empty($id)) { // search using id

			$father = false;
			$mother = false;
           
            $q = "select fname, fatherid, cnic, address, dob, bloodgroup, status, email, contactno from father where fatherid=$id";
			$query_id = oci_parse($con, $q); 		
			$r = oci_execute($query_id); 
	
			echo"<br><hr><br>"; 
	
			while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) 
			{ 
				$father = true;

				echo "<h3 style='text-align: center'><u>Parent Details:</u></h3>";

					$n = $row['FNAME'];
					$i = $row['FATHERID'];
					$c = $row["CNIC"];
					$a = $row["ADDRESS"];
					$d = $row["DOB"];
					$b = $row["BLOODGROUP"];
					$s = $row["STATUS"];
					$e = $row["EMAIL"];
					$cn = $row["CONTACTNO"];

					echo 
					"<div style ='margin-left:37%';>
					<table border=1 cellpadding=5 width=500>
						<tr align=middle>
							<th>Name</th>
							<td>$n</td>
						</tr>
						<tr align=middle>
							<th>ID</th>
							<td>$i</td>
						</tr>
						<tr align=middle>
							<th>CNIC</th>
							<td>$c</td>
						</tr>
						<tr align=middle>
							<th>Address</th>
							<td>$a</td>
						</tr>
						<tr align=middle>
							<th>Date of Birth</th>
							<td>$d</td>
						</tr>
						<tr align=middle>
							<th>Blood group</th>
							<td>$b</td>
						</tr>
						<tr align=middle>
							<th>Availaibility Status</th>
							<td>$s</td>
						</tr>
						<tr align=middle>
							<th>Email</th>
							<td>$e</td>
						</tr>
						<tr align=middle>
							<th>Contact #</th>
							<td>$cn</td>
						</tr>
					</table>
					</div>";
			}

			if (!$father) {
				$q1 = "select fname, motherid, cnic, address, dob, bloodgroup, status, email, contactno, pregnancyStatus from mother where motherid=$id";
				$query_id1 = oci_parse($con, $q1); 		
				$r = oci_execute($query_id1); 
		
				while($row = oci_fetch_array($query_id1, OCI_BOTH+OCI_RETURN_NULLS)) 
				{ 
					$mother = true;

					echo "<h3 style='text-align: center'><u>Info:</u></h3>";

					$n = $row['FNAME'];
					$i = $row['MOTHERID'];
					$c = $row["CNIC"];
					$a = $row["ADDRESS"];
					$d = $row["DOB"];
					$b = $row["BLOODGROUP"];
					$s = $row["STATUS"];
					$e = $row["EMAIL"];
					$cn = $row["CONTACTNO"];
					$p = $row["PREGNANCYSTATUS"];

					echo 
					"<div style ='margin-left:37%';>
					<table border=1 cellpadding=5>
						<tr align=middle>
							<th>Name</th>
							<td>$n</td>
						</tr>
						<tr align=middle>
							<th>ID</th>
							<td>$i</td>
						</tr>
						<tr align=middle>
							<th>CNIC</th>
							<td>$c</td>
						</tr>
						<tr align=middle>
							<th>Address</th>
							<td>a$a</td>
						</tr>
						<tr align=middle>
							<th>Date of Birth</th>
							<td>$d</td>
						</tr>
						<tr align=middle>
							<th>Blood group</th>
							<td>$b</td>
						</tr>
						<tr align=middle>
							<th>Availaibility Status</th>
							<td>$s</td>
						</tr>
						<tr align=middle>
							<th>Email</th>
							<td>$e</td>
						</tr>
						<tr align=middle>
							<th>Contact #</th>
							<td>$cn</td>
						</tr>
						<tr align=middle>
							<th>Pregnancy Status</th>
							<td>$p</td>
						</tr>
					</table></div>";
				}
			}

			if (!$mother and !$father) {
				echo "<h3 style='text-align: center'>Invalid parent ID.</h3><br>";
                die;
			}

			$q3 = "select student_id, name, guardian_id from student_archive where father_id=$id or mother_id=$id";
			$query_id3 = oci_parse($con, $q3); 		
			$r = oci_execute($query_id3); 

			$flag = true;
			$flag2 = true;

			while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)) 
			{ 
				if ($flag) {
					echo "<h3 style='text-align:center'><u>All Children:</u></h3>";
					$flag = false;
				}

				$sName = $row['NAME'];
				$stID = $row['STUDENT_ID'];
				$gID = $row['GUARDIAN_ID'];

				$cGrade;
				$cSec;
				$gName;
				$gCNIC;
				$gRelation;
					
				$q4 = "select class_grade, class_section from current_student where student_id=$stID";
				$query_id4 = oci_parse($con, $q4); 		
				$r = oci_execute($query_id4); 

				while($row1 = oci_fetch_array($query_id4, OCI_BOTH+OCI_RETURN_NULLS)) 
				{ 
					$cGrade = $row1['CLASS_GRADE'];
					$cSec = $row1['CLASS_SECTION'];
				}

				$q5 = "select relation, fname, cnic from guardian where guardianid=$gID";
				$query_id5 = oci_parse($con, $q5); 		
				$r = oci_execute($query_id5); 

				while($row2 = oci_fetch_array($query_id5, OCI_BOTH+OCI_RETURN_NULLS)) 
				{ 
					$gRelation = $row2['RELATION'];
					$gName = $row2['FNAME'];
					$gCNIC = $row2['CNIC'];
				} 

				if ($flag2) {
					echo 
					"<div style ='margin-left:20%';>
					<table border=1 cellpadding=5>
						<tr align=middle>
							<th style='width:150px'>Student ID</th>
							<th style='width:150px'>Name</th>
							<th style='width:150px'>Class</th>
							<th style='width:150px'>Guardian ID</th>
							<th style='width:150px'>Guardian Name</th>
							<th style='width:150px'>Guardian CNIC</th>
							<th style='width:150px'>Relation to Guardian</th>
					</tr></div>";

					$flag2 = false;
				}

				echo 
				"<table border=1 cellpadding=5>
					<tr align=middle>
						<td style='width:150px'>$stID</td>
						<td style='width:150px'>$sName</td>
						<td style='width:150px'>$cGrade$cSec</td>
						<td style='width:150px'>$gID</td>
						<td style='width:150px'>$gName</td>
						<td style='width:150px'>$gCNIC</td>
						<td style='width:150px'>$gRelation</td>
					</tr>
				</table>";
			}
		}

		else if (!empty($name)) { // search using name

			$father = false;
			$mother = false;

			$pid;
           
            $q = "select fname, fatherid, cnic, address, dob, bloodgroup, status, email, contactno from father where fname='$name'";
			$query_id = oci_parse($con, $q); 		
			$r = oci_execute($query_id); 
	
			echo"<hr>"; 
	
			while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) 
			{ 
				$father = true;

				echo "<h3 style='text-align: center'><u>Info:</u></h3>";

					$n = $row['FNAME'];
					$i = $row['FATHERID'];
					$c = $row["CNIC"];
					$a = $row["ADDRESS"];
					$d = $row["DOB"];
					$b = $row["BLOODGROUP"];
					$s = $row["STATUS"];
					$e = $row["EMAIL"];
					$cn = $row["CONTACTNO"];

					echo 
					"<div style ='margin-left:37%';>
					<table border=1 cellpadding=5>
						<tr align=middle>
							<th>Name</th>
							<td>$n</td>
						</tr>
						<tr align=middle>
							<th>ID</th>
							<td>$i</td>
						</tr>
						<tr align=middle>
							<th>CNIC</th>
							<td>$c</td>
						</tr>
						<tr align=middle>
							<th>Address</th>
							<td>a$a</td>
						</tr>
						<tr align=middle>
							<th>Date of Birth</th>
							<td>$d</td>
						</tr>
						<tr align=middle>
							<th>Blood group</th>
							<td>$b</td>
						</tr>
						<tr align=middle>
							<th>Availaibility Status</th>
							<td>$s</td>
						</tr>
						<tr align=middle>
							<th>Email</th>
							<td>$e</td>
						</tr>
						<tr align=middle>
							<th>Contact #</th>
							<td>$cn</td>
						</tr>
					</table></div>";

					$pid = $row['FATHERID'];
			}

			if (!$father) {
				$q1 = "select fname, motherid, cnic, address, dob, bloodgroup, status, email, contactno, pregnancyStatus from mother where fname='$name'";
				$query_id1 = oci_parse($con, $q1); 		
				$r = oci_execute($query_id1); 
		
				while($row = oci_fetch_array($query_id1, OCI_BOTH+OCI_RETURN_NULLS)) 
				{ 
					$mother = true;

					echo "<h3 style='text-align: center'><u>Info:</u></h3>";

					$n = $row['FNAME'];
					$i = $row['MOTHERID'];
					$c = $row["CNIC"];
					$a = $row["ADDRESS"];
					$d = $row["DOB"];
					$b = $row["BLOODGROUP"];
					$s = $row["STATUS"];
					$e = $row["EMAIL"];
					$cn = $row["CONTACTNO"];
					$p = $row["PREGNANCYSTATUS"];

					echo 
					"<div style ='margin-left:37%';>
					<table border=1 cellpadding=5>
						<tr align=middle>
							<th>Name</th>
							<td>$n</td>
						</tr>
						<tr align=middle>
							<th>ID</th>
							<td>$i</td>
						</tr>
						<tr align=middle>
							<th>CNIC</th>
							<td>$c</td>
						</tr>
						<tr align=middle>
							<th>Address</th>
							<td>a$a</td>
						</tr>
						<tr align=middle>
							<th>Date of Birth</th>
							<td>$d</td>
						</tr>
						<tr align=middle>
							<th>Blood group</th>
							<td>$b</td>
						</tr>
						<tr align=middle>
							<th>Availaibility Status</th>
							<td>$s</td>
						</tr>
						<tr align=middle>
							<th>Email</th>
							<td>$e</td>
						</tr>
						<tr align=middle>
							<th>Contact #</th>
							<td>$cn</td>
						</tr>
						<tr align=middle>
							<th>Pregnancy Status</th>
							<td>$p</td>
						</tr>
					</table></div>"; 

						$pid = $row['MOTHERID'];
				}
			}

			if (!$mother and !$father) {
				echo "<h3 style='text-align: center'>Invalid parent name.</h3><br>";
                die;
			}

			$q3 = "select student_id, name, guardian_id from student_archive where father_id=$pid or mother_id=$pid";
			$query_id3 = oci_parse($con, $q3); 		
			$r = oci_execute($query_id3); 

			$flag = true;
			$flag2 = true;

			while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)) 
			{ 
				if ($flag) {
					echo "<h3 style='text-align:center'><u>All Children:</u></h3>";
					$flag = false;
				}

				$sName = $row['NAME'];
				$stID = $row['STUDENT_ID'];
				$gID = $row['GUARDIAN_ID'];

				$cGrade;
				$cSec;
				$gName;
				$gCNIC;
				$gRelation;
					
				$q4 = "select class_grade, class_section from current_student where student_id=$stID";
				$query_id4 = oci_parse($con, $q4); 		
				$r = oci_execute($query_id4); 

				while($row1 = oci_fetch_array($query_id4, OCI_BOTH+OCI_RETURN_NULLS)) 
				{ 
					$cGrade = $row1['CLASS_GRADE'];
					$cSec = $row1['CLASS_SECTION'];
				}

				$q5 = "select relation, fname, cnic from guardian where guardianid=$gID";
				$query_id5 = oci_parse($con, $q5); 		
				$r = oci_execute($query_id5); 

				while($row2 = oci_fetch_array($query_id5, OCI_BOTH+OCI_RETURN_NULLS)) 
				{ 
					$gRelation = $row2['RELATION'];
					$gName = $row2['FNAME'];
					$gCNIC = $row2['CNIC'];
				} 

				if ($flag2) {
					echo
					"<div style ='margin-left:20%';> 
					<table border=1 cellpadding=5>
						<tr align=middle>
							<th style='width:150px'>Student ID</th>
							<th style='width:150px'>Name</th>
							<th style='width:150px'>Class</th>
							<th style='width:150px'>Guardian ID</th>
							<th style='width:150px'>Guardian Name</th>
							<th style='width:150px'>Guardian CNIC</th>
							<th style='width:150px'>Relation to Guardian</th>
					</tr></div>";

					$flag2 = false;
				}

				echo 
				"<table border=1 cellpadding=5>
					<tr align=middle>
						<td style='width:150px'>$stID</td>
						<td style='width:150px'>$sName</td>
						<td style='width:150px'>$cGrade$cSec</td>
						<td style='width:150px'>$gID</td>
						<td style='width:150px'>$gName</td>
						<td style='width:150px'>$gCNIC</td>
						<td style='width:150px'>$gRelation</td>
					</tr>
				</table>";
			}
        }
      } 
   else 
      { die('Could not connect to Oracle: '); 

    } 
?>