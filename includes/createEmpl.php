<!DOCTYPE html>
<head>
<title>TRELOP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="..\style\Common.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
function gohome() {
  window.location.href = "Memployee.html"
} 
</script>

</head>

<?php
    include "dbconn.php";
    session_start();
    

    $id=$_POST['inputid'];
    $name=$_POST['inputname'];

    $statusEmpl=$_POST['inputStatusEmpl'];
    $birthDate=$_POST['inputBirthDate'];
    $startDate=$_POST['inputStartDate'];
    $Address=$_POST['inputAddress'];
    $gender=$_POST['inputGender'];

    $phone=$_POST['inputphone'];
    $phone2=$_POST['inputphone2'];
    $email=$_POST['inputEmail'];
    $bankName=$_POST['inputBankName'];
    $bankNum=$_POST['inputBankNum'];
    $bankAccount=$_POST['inputBankAccount'];
echo '

    
  ';

        $id_query = "SELECT id FROM employee WHERE id = '$id'";
        $id_result = $conn->query($id_query);
        if($id_result->num_rows > 0){
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
                        <h4>משתמש קיים</h4>	
                        <p>משתמש זה קיים במערכת, אנא ודא את הפרטים ונסה</p>
                        <button class="btn btn-primary" type="button" onclick="history.back();" data-dismiss="modal">נסה שנית</button>
                    </div>
                </div>
            </div>
        </div> 
            ';
        }
        else {
           
            $prefix = 972;
            $phone = substr( $phone, 1);
            $new_phone = $prefix . $phone;
            $updateQuery = "INSERT INTO `employee` (`id`, `fullName`,`statusEmpl` , `birthDate`, `startDate`, `address`, `phone`, `phone2`, `email`, `bankName`, `bankNum`, `bankAccount`)
            VALUES ('$id', '$name', '$statusEmpl', '$birthDate', '$startDate',  '$Address', '$new_phone','$phone2', '$email', '$bankName', '$bankNum',  '$bankAccount' ); ";

            $result = $conn->query($updateQuery);
            if(!$result){
                echo "<script type='text/javascript'> alert('אירעה שגיאה בעדכון הפרטים'); </script>";
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
                    window.location.href = "Memployee.html);
               
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
                        <button type="button" class="close" onclick="gohome()"  data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body text-center">
                        <h4>!מעולה</h4>	
                <p>יוזר נוצר בהצלחה</p>

                <form id="sendtomail" method="post" action="send-email.php" >
                <div class="form-group row">
                    <label for="Subject" class="col-sm-2 col-form-label" style="margin-left: 25rem">נושא המייל</label>
                    <input type="text" class="form-control" id="Subjectt" name="Subjectt"  value="Welcome to TRELOP"  >
                </div>
                <div class="form-group row">
                    <label for="to" class="col-sm-2 col-form-label"style="margin-left: 25rem">יעד</label>
                    <input type="email" class="form-control" id="to" name="to" value="'.$email.'" >
                </div>
                <div class="form-group row">
                  <label for="txt" class="col-sm-2 col-form-label"style="margin-left: 25rem">תוכן המייל</label>
                  <textarea class="form-control" id="txt" name="txt" rows="4" style=" text-align: right;">
                    ברוך הבא '.$name.'
                    להלן לינק רישום למערכת 
                    http://sharonshi.mtacloud.co.il/includes/register.php 
                    שם המשתמש הוא מספר תעודת הזהות שלך
                    יש לבחור סיסמה בת 6 תווים (מומלץ לבחור סיסמה 
                    שתכיל לפחות אות אחת ולפחות ספרה אחת)
                    !בהצלחה
                  </textarea>
               </div>
        
               <div class="container">
               <div class="centerButton">
                   <button type="submit" class="btn btn-primary">שלח מייל</button>
               </div>
           </div>
              
              </form>  
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
 //  window.location.href = "Memployee.html"
</script>

</body>

</html>