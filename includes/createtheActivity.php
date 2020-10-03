<!DOCTYPE html>
<head>
<title> create employee</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>


<?php
    include "dbconn.php";
    session_start();
    

    $name=$_POST['inputName'];
    $cost=$_POST['inputcost'];
    $start=$_POST['inpustartdate'];
    $finish=$_POST['inpufindate'];
    $notes=$_POST['notes'];
    $empname=$_POST['empname'];
    
function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

$empQuery = "SELECT * FROM `activities` WHERE (startdate BETWEEN '$start' AND '$finish') AND employeid=(SELECT `id` FROM `employee` WHERE `fullName` = '$empname') ";
$result = $conn->query($empQuery);
if($result->num_rows > 0){
    echo '
    <link rel="stylesheet" href="..\style/modalwarning.css">
    <script>
     $(document).ready(function(){
       
          $("#myModal").modal();
        });
      </script>

    <!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE86B;</i>
					<i class="material-icons">&#xE86B;</i>
					<i class="material-icons">&#xE645;</i>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span>&times;</span></button>
			</div>
			<div class="modal-body text-center">
				<h4>העובד תפוס </h4>	
				<p>העובד תפוס בתאריכים המצויינים, אנא שנה את הפרטים ונסה שנית.</p>
				<button class="btn btn-primary" type="button" onclick="history.back();" data-dismiss="modal">נסה שנית</button>
			</div>
		</div>
	</div>
</div> 
    ';
    
} else{

    $updateQuery = "INSERT INTO `activities` (`name`, `cost`,  `startdate`, `finishdate`, `notes`,`employeid`)
    VALUES ('$name', '$cost',  '$start', '$finish','$notes' , (SELECT `id` FROM `employee` WHERE `fullName` = '$empname') ); ";
    $result = $conn->query($updateQuery);
    if(!$result){
        echo '
        <link rel="stylesheet" href="..\style/errormodal.css">
        <script>
         $(document).ready(function(){
           
              $("#myModal").modal();
            });
          </script>
        <!-- Modal HTML -->
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <div class="icon-box">
                            <i class="material-icons">&#xE5CD;</i>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body text-center">
                        <h4>שגיאה</h4>	
                        <p>הפרטים לא הצליחו להתעדכן</p>
                        <button class="btn btn-success" type="button" onclick="history.back();"  data-dismiss="modal">נסה שנית</button>
                    </div>
                </div>
            </div>
        </div>  
       
          ';
    } else{
        echo '
        <link rel="stylesheet" href="..\style/modalsucc.css">
        <script>
        $(document).ready(function(){
          
             $("#myModal").modal();
           });
         </script>
         <script type="text/javascript">
         function homefun() {
            window.location.href = "MActivity.html);
       
         }
          </script>

        <!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header justify-content-center">
				<div class="icon-box">
					<i class="material-icons">&#xE876;</i>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body text-center">
				<h4>מעולה!</h4>	
				<p>הפעילות נוצרה בהצלחה.</p>
				<button class="btn btn-success"  type="button"  onclick="homefun()" data-dismiss="modal"><span>להמשך עבודה</span> <i class="material-icons">&#xE5C8;</i></button>
			</div>
		</div>
	</div>
</div> 
        ';
    }
  }

    $conn->close();
?>



<body>
<script type="text/javascript">
  // window.location.href = "MActivity.html"
</script>

</body>



</html>