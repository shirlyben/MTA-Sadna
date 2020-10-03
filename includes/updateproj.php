<?php
    include "dbconn.php";
    session_start();
    

    $projid =$_POST['projid'];
    $clientname=$_POST['projclientnameid'];
    $inputstartdate=$_POST['inputstartdate'];
    $inputfinishdate=$_POST['inputfinishdate'];
    $notes=$_POST['notes'];
    


               
            $updateQuery = "UPDATE `project` SET `findate`='$inputfinishdate', `startdate` = '$inputfinishdate', `notes` = '$notes' WHERE `project`.`id` = '$projid' ";
           
            $result = $conn->query($updateQuery);
            if(!$result){
                echo "<script type='text/javascript'> alert('אירעה שגיאה בעדכון פרטי הפרוייקט'); </script>";
            } else{
                echo "<script type='text/javascript'> alert('פרטי הפרוייקט עודכנו בהצלחה'); </script>";
            }


      // מעדכן פעילויות      
    if(isset($_POST["activities"]))  
    { 
     $activities=$_POST['activities'];
     foreach ($_POST['activities'] as $activities) {
         $sql = "UPDATE `activities` SET `projid` = '$projid' WHERE `activities`.`id` =  (SELECT `id` FROM `activities` WHERE `name` = '$activities');   ";
         $result = $conn->query($sql);
         if(!$result){
            echo "<script type='text/javascript'> alert('אירעה שגיאה בעדכון פרטי פעילות הפרוייקט'); </script>";
           }
       }
     $file=$_POST["file"];
     }
        
   

    $conn->close();
?>

<!DOCTYPE html>
<head>
  <title> update employee</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<script type="text/javascript">
   window.location.href = "Mproj.html"
</script>

</body>

</html>