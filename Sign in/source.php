<?php
 $connect = mysqli_connect("localhost", "id12826284_coding_event", "pratyarth2020", "id12826284_pratyarth2020");
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>Coding Area</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <link rel="icon" href="tabLogo.png">
      </head>
      <body>
           <br /><br />
           <div class="container" style="width:500px;">
                <table class="table table-bordered">
                     <tr>
                          <th>Question</th>
                     </tr>
                <?php
                $teamname = $_GET["fname"];
                $part = $_GET["fpart"];
                $query = "SELECT * FROM CODE WHERE TEAM_NAME='$teamname'";
                $result = mysqli_query($connect, $query);
                while($row = mysqli_fetch_array($result))
                {
                     if($part == $row['PART1']){
                       echo '
                            <tr>
                                 <td>
                                      <img src="data:image/jpeg;base64,'.base64_encode($row['QUESTION1'] ).'" class="img-thumnail" />
                                 </td>
                            </tr>
                       ';
                     }else{
                       echo '
                            <tr>
                                 <td>
                                      <img src="data:image/jpeg;base64,'.base64_encode($row['QUESTION2'] ).'"class="img-thumnail" />
                                 </td>
                            </tr>
                       ';
                     }
                }
                ?>
                </table>
                <h3 align="left">Upload Your Code Here</h3><br />
                <form method="post" enctype="multipart/form-data">
                     <input type="file" name="code" id="code" />
                     <br />
                     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />
                </form>
                <br />
                <style>
                    .registration-btn{
                        top: 10px;
                        right:20px;
                        position: absolute;
                        text-decoration: none;
                        color: #000;
                        border: 2px solid transparent;
                        border-radius: 20px;
                        background-image: linear-gradient(#fff, #fff),radial-gradient(circle at top left, #19d7fa, #fd00da);
                        background-origin: border-box;
                        background-clip: content-box, border-box;
                      
                    }
  
  .registration-btn span{
    display: block;
    padding: 8px 22px;
}

                </style>
			    
                </div>
                <br />
           </div>
           
      </body>
    <a href="https://jumble-code.000webhostapp.com/" class="registration-btn"><span>Good to go!!</span></a>
 </html>
 <script>
 $(document).ready(function(){
      $('#insert').click(function(){
           var file_name = $('#code').val();
           if(file_name == '')
           {
                alert("Please Select a Code File");
                return false;
           }
           else
           {
                var extension = $('#code').val().split('.').pop().toLowerCase();
                if(jQuery.inArray(extension, ['c++','py','pl','c','java','sql','html','php','txt']) == -1)
                {
                     alert('Invalid Coding File');
                     $('#code').val('');
                     return false;
                }
           }
      });
 });
 </script>
 <?php
  
  if(isset($_POST["insert"]))
 {
      $teamname = $_GET["fname"];
      $part = $_GET["fpart"];
      $file = addslashes(file_get_contents($_FILES["code"]["tmp_name"]));
      $query = "SELECT * FROM CODE WHERE TEAM_NAME='$teamname'";
      $result = mysqli_query($connect, $query);
      while($row = mysqli_fetch_array($result)){
        if($part == $row['PART1']){
          $query = "UPDATE CODE SET FILE2='$file' WHERE TEAM_NAME='$teamname'";
        }else{
          $query = "UPDATE CODE SET FILE1='$file' WHERE TEAM_NAME='$teamname'";
        }
      }
      if(mysqli_query($connect, $query))
      {
           echo '<script>alert("File Is Uploaded Successfully")</script>';
      }
 }
  ?>
