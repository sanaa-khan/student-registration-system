<html>

<head>
	<title>Humarey Bachay </title>
</head>

<body>

	<h1 align = middle> Humarey Bachay </h1>
	<h1 align = middle> Dormant Students </h1>
	
	</br>
	</br>
	
	<p align = middle style="font-size:20px"> <b>Enter number of years and/or number of months to check dormant students </b> </p>
	
	<form name="input" action="Report 3.php" method="post">
	<TABLE style="margin-left:auto;margin-right:auto;">
		<TR>
			<TD>
				Months:
			</TD>
			
			<TD>
				<input type="number" name="months"/>
			</TD>	
		</TR>
		
		<TR>
			<TD>
				Years:
			</TD>
			
			<TD>
				<input type="number" name="years"/>
			</TD>
		</TR>
		
		<TR>
			<TD>
				<input type = "submit" name = "input"/>
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

	if( isset($_POST["input"]) )
	{
		$inputmonths = 0;
		$inputyears = 0;
	
		if ( is_numeric( $_POST["months"] ) )
		{
			$inputmonths = $_POST["months"];
		}
		
		if ( is_numeric( $_POST["years"] ) )
		{
			$inputyears = $_POST["years"];
		}
		
		$months = $inputmonths + ($inputyears * 12) ;

	  
		$q3 = 	"select student_id, name, gender
				from student_archive
				where student_id in (select student_id from dormant_student
									where ADD_MONTHS(dormant_start_date,".$months.") < SYSDATE )";
					
		$query_id3 = oci_parse($con, $q3); 		
		$r3 = oci_execute($query_id3); 

		echo "<TABLE width = 500 border = 1 style='margin-left:auto;margin-right:auto;'>";
		echo "<p align = middle style='font-size:20px'>Following are the records </p>";
		echo "<TR> <TH> Student ID  </TH> <TH> Student Name  </TH> <TH> Gender  </TH></TR>";

		while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)) 
		{ 
			echo 	"<TR>".
						"<TD>".$row["STUDENT_ID"]."</TD>".
						"<TD>".$row["NAME"]."</TD>".
						"<TD>".$row["GENDER"]."</TD>".
					"</TR>"; 
		}
		
		echo "</TABLE>";
			
	}


?>




</body>
</html>