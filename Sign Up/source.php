<?PHP

    $teamname = $_GET['rteam'];
    $contestant1 = $_GET['rcon1'];
    $year1 = $_GET['rc1study'];
    $branch1 = $_GET['rbranch1'];
    
    $contestant2 = $_GET['rcon2'];
    $year2 = $_GET['rc2study'];
    $branch2 = $_GET['rbranch2'];
    $ph = $_GET['rphone'];
    
	// Database Connection code
	$servername = "localhost";
	$username = "id12826284_coding_event";
	$password = "pratyarth2020";
	$dbname = "id12826284_pratyarth2020";
    
    $con = mysqli_connect($servername,$username,$password,$dbname);
	if(!$con)
	{
		die("Error : ".mysqli_connect_error());
	}
    $sql = "INSERT INTO `REG`(`TEAM_NAME`, `CONTESTANT1`, `YEAROFSTUDY1`, `BRANCH1`, `CONTESTANT2`, `YEAROFSTUDY2`, `BRANCH2`,`PHONENUMBER`) VALUES ('$teamname','$contestant1','$year1','$branch1','$contestant2','$year2','$branch2','$ph');";
	
	if(mysqli_query($con,$sql))
		{
			echo "Registration Done Successfully...";
		}
		else
		{
			echo "Something went Wrong...";
		}
	mysqli_close($con);
?>