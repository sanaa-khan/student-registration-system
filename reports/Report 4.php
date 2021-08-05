<html>

<head>
	<title>Humarey Bachay </title>
</head>

<body>

	<h1 align = middle> Humarey Bachay </h1>
	<h1 align = middle> Dormant Students </h1>
	
	</br>
	</br>
	
	<p align = middle style="font-size:20px"> <b>Enter student ID or student name to get detail of student </b> </p>
	
	<form name="input" action="Report 4.php" method="post">
	<TABLE style="margin-left:auto;margin-right:auto;">
		<TR>
			<TD>
				Student ID:
			</TD>
			
			<TD>
				<input type="text" name="studentid"/>
			</TD>	
			
			<TD>
				<input type = "submit" name = "idinput"/>
			</TD>
		</TR>
		
		<TR>
			<TD>
				Student Name:
			</TD>
			
			<TD>
				<input type="text" name="studentname"/>
			</TD>

			<TD>
				<input type = "submit" name = "nameinput"/>
			</TD>
		</TR>
		
	</TABLE>
	</form>
	
	</br>
	</br>
	

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

	if( isset($_POST["idinput"]) )
	{
		
		$q3 = 	"select sa.student_id, sa.name, sa.gender, cs.class_grade, cs.class_section, sa.enroll_date, sa.cnic, fa.fname, mo.fname as mname, ga.fname as gname, sa.home_address, sa.date_of_birth, sa.email, sa.contact_number
				from student_archive sa, current_student cs, father fa, mother mo, guardian ga
				where sa.student_id = '".$_POST["studentid"]."' and sa.student_id = cs.student_id and fa.fatherid = sa.father_id and mo.motherid = sa.mother_id and ga.guardianid = sa.guardian_id";
					
		$query_id3 = oci_parse($con, $q3); 		
		$r3 = oci_execute($query_id3); 
		
		$q4 = 	"select sa.student_id, sa.name, sa.gender, cs.class_grade, cs.class_section
				from student_archive sa, current_student cs
				where sa.student_id = cs.student_id and sa.student_id != '".$_POST["studentid"]."' and sa.mother_id in 		(	select mother_id
																																from student_archive
																																where student_id = '".$_POST["studentid"]."'
																															)
																									and sa.father_id in 	(	select father_id
																																from student_archive
																																where student_id = '".$_POST["studentid"]."'
																								
																															)";
					
		$query_id4 = oci_parse($con, $q4); 		
		$r4 = oci_execute($query_id4); 
		

		echo "<p align = middle style='font-size:20px'>Following are the details </p>";
		echo "<TABLE border = 1 style='margin-left:auto;margin-right:auto;'>";
		echo "<TR> 
					<TH> Student ID  </TH>
					<TH> Student Name  </TH>
					<TH> Gender  </TH>
					<TH> Class </TH>
					<TH> Section </TH>
					<TH> Enroll Date </TH>
					<TH> CNIC </TH>
					<TH> Father Name </TH>
					<TH> Mother Name </TH>
					<TH> Guardian Name </TH>
					<TH> Home Address </TH>
					<TH> Date of Birth </TH>
					<TH> Email </TH>
					<TH> Contact Number </TH>
				</TR>";

		while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)) 
		{ 
			echo 	"<TR>".
						"<TD><textarea rows = '5' cols = '10'>".$row["STUDENT_ID"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["NAME"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["GENDER"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["CLASS_GRADE"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["CLASS_SECTION"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["ENROLL_DATE"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["CNIC"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["FNAME"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["MNAME"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["GNAME"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["HOME_ADDRESS"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["DATE_OF_BIRTH"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["EMAIL"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["CONTACT_NUMBER"]."</textarea></TD>".
					"</TR>"; 
		
		}
		

		echo "</TABLE>";
		
		echo "<TABLE border = 1 style='margin-left:auto;margin-right:auto;'>";
		echo "<p align = middle style='font-size:20px'>Following are the siblings </p>";
		echo "<TR> 
					<TH> Student ID  </TH>
					<TH> Student Name  </TH>
					<TH> Gender  </TH>
					<TH> Class </TH>
					<TH> Section </TH>
				</TR>";
		
		while($row = oci_fetch_array($query_id4, OCI_BOTH+OCI_RETURN_NULLS)) 
		{ 
			echo 	"<TR>".
						"<TD><textarea rows = '5' cols = '10'>".$row["STUDENT_ID"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["NAME"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["GENDER"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["CLASS_GRADE"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["CLASS_SECTION"]."</textarea></TD>".
					"</TR>"; 
		
		}
		
		echo "</TABLE>";

	}
	
	elseif( isset($_POST["nameinput"]) )
	{
		
		
		$q3 = 	"select sa.student_id, sa.name, sa.gender, cs.class_grade, cs.class_section, sa.enroll_date, sa.cnic, fa.fname, mo.fname as mname, ga.fname as gname, sa.home_address, sa.date_of_birth, sa.email, sa.contact_number
		from student_archive sa, current_student cs, father fa, mother mo, guardian ga
		where sa.name = '".$_POST["studentname"]."' and sa.student_id = cs.student_id and fa.fatherid = sa.father_id and mo.motherid = sa.mother_id and ga.guardianid = sa.guardian_id";
					
		$query_id3 = oci_parse($con, $q3); 		
		$r3 = oci_execute($query_id3); 
		
		$q4 = 	"select sa.student_id, sa.name, sa.gender, cs.class_grade, cs.class_section
		from student_archive sa, current_student cs
		where sa.student_id = cs.student_id and sa.name != '".$_POST["studentname"]."' and sa.mother_id in 		(	select mother_id
																													from student_archive
																													where name = '".$_POST["studentname"]."'
																												)
																						and sa.father_id in 	(	select father_id
																													from student_archive
																													where name = '".$_POST["studentname"]."'
																						
																												)";
			
		$query_id4 = oci_parse($con, $q4); 		
		$r4 = oci_execute($query_id4); 

		
		echo "<TABLE border = 1 style='margin-left:auto;margin-right:auto;'>";
		echo "<p align = middle style='font-size:20px'>Following are the details </p>";
		echo "<TR> 
					<TH> Student ID  </TH>
					<TH> Student Name  </TH>
					<TH> Gender  </TH>
					<TH> Class </TH>
					<TH> Section </TH>
					<TH> Enroll Date </TH>
					<TH> CNIC </TH>
					<TH> Father Name </TH>
					<TH> Mother Name </TH>
					<TH> Guardian Name </TH>
					<TH> Home Address </TH>
					<TH> Date of Birth </TH>
					<TH> Email </TH>
					<TH> Contact Number </TH>
				</TR>";

		while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)) 
		{ 
			echo 	"<TR>".
						"<TD><textarea rows = '5' cols = '10'>".$row["STUDENT_ID"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["NAME"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["GENDER"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["CLASS_GRADE"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["CLASS_SECTION"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["ENROLL_DATE"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["CNIC"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["FNAME"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["MNAME"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["GNAME"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["HOME_ADDRESS"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["DATE_OF_BIRTH"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["EMAIL"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["CONTACT_NUMBER"]."</textarea></TD>".
					"</TR>"; 
		
		}
		
			
		echo "</TABLE>";	
		
		
		echo "<TABLE border = 1 style='margin-left:auto;margin-right:auto;'>";
		echo "<p align = middle style='font-size:20px'>Following are the siblings </p>";
		echo "<TR> 
					<TH> Student ID  </TH>
					<TH> Student Name  </TH>
					<TH> Gender  </TH>
					<TH> Class </TH>
					<TH> Section </TH>
				</TR>";
		
		while($row = oci_fetch_array($query_id4, OCI_BOTH+OCI_RETURN_NULLS)) 
		{ 
			echo 	"<TR>".
						"<TD><textarea rows = '5' cols = '10'>".$row["STUDENT_ID"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["NAME"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["GENDER"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["CLASS_GRADE"]."</textarea></TD>".
						"<TD><textarea rows = '5' cols = '10'>".$row["CLASS_SECTION"]."</textarea></TD>".
					"</TR>"; 
		
		}
		
		echo "</TABLE>";
	}


?>



</body>
</html>