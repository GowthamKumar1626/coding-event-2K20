<html>
    <head>
        <title>Level 2 Coding Event</title>
        <link rel="icon" href="tabLogo.png">
  </head>
</html>
	  <?php
	    include_once 'dbconfig.php';

	    if (isset($_GET['fname'])&&isset($_GET['fpart'])) 
	           {
					 $teamname = $_GET["fname"];
					 $part = $_GET["fpart"];
					 $type = 'txt';
					 $query = "SELECT * FROM CODE WHERE TEAM_NAME = '$teamname'";
					 $result = mysqli_query($connection,$query) or die('Error, query failed');
					 list($TEAM_NAME, $PART1, $PART2, $QUESTION1,$QUESTION2,$FILE1,$FILE2) = mysqli_fetch_array($result);
            
                     if($part == $PART1){
                       echo '
                            <tr>
                                 <td>
                                      <img src="data:image/jpeg;base64,'.base64_encode($QUESTION2).'" class="img-thumnail" />
                                 </td>
                            </tr>
                       ';
                     }else{
                       echo '
                            <tr>
                                 <td>
                                      <img src="data:image/jpeg;base64,'.base64_encode($QUESTION1).'"class="img-thumnail" />
                                 </td>
                            </tr>
                       ';
                     }
                
					 
					 
					 if($part == $PART1){
						$query2 = "SELECT OCTET_LENGTH(FILE1) FROM CODE WHERE TEAM_NAME = '$teamname'";
						$result2 = mysqli_query($connection,$query2) or die('Error, query failed');
						list($size) = mysqli_fetch_array($result2);
						$file = 'CODE';
						#header("Content-length: $size");
						#header("Content-type: $type");
						#header("Content-Disposition: attachment; filename=$file");
						#ob_clean();
				     	flush();
		                     $FILE1 = stripslashes($FILE1);
				     	
				     	$arr = explode("\n",$FILE1);
				     	shuffle($arr);
				     	foreach($arr as $value){
				     	    echo $value."<br>";
				     	}
				     	mysqli_close($connection);
				     	exit;
					 }else{
						$query2 = "SELECT OCTET_LENGTH(FILE2) FROM CODE WHERE TEAM_NAME = '$teamname'";
						$result2 = mysqli_query($connection,$query2) or die('Error, query failed');
						list($size) = mysqli_fetch_array($result2);
						$file = 'CODE';
						#header("Content-length: $size");
						#header("Content-type: $type");
						#header("Content-Disposition: attachment; filename=$file");
						#ob_clean();
				     	flush();
		                     $FILE2 = stripslashes($FILE2);
				     	$arr = explode("\n",$FILE2);
				     	shuffle($arr);
				     	foreach($arr as $value){
				     	    echo $value."<br>";
				     	}
				     	mysqli_close($connection);
				     	exit;
					 }
				    
	           }

	       ?>
