<?php
    include "dbconn.php";
    session_start();
    ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Create employee</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../style/common.css">
    <link rel="stylesheet" href="../style/employee.css">
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


    <script>
        $(document).ready(function() {
            $(function() {
                $("#common").load("Common.html");
            });
        });
    </script>

</head>

<body>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <div id="common"></div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $projid =$_POST['projid'];
        $clientname=$_POST['clientname'];
        $inputstartdate=$_POST['inputstartdate'];
        $inputfinishdate=$_POST['inputfinishdate'];
        $notes=$_POST['notes'];
        
        if(!isset($_POST["activities"]))  
        { 
         /* if (is_array($activities))
            {
          //  for ($i=0;$i<4;$i++)
           {
                echo  "<script type='text/javascript'>alert('אירעה $activities[0]ון הפרטים');</script>";

                         $updateQuery = "INSERT INTO `proj` ( `client name`, `startdate`, `findate` , `notes`, `activity1`) VALUES
          ( $clientname, '$inputstartdate',  '$inputfinishdate' , $notes , (SELECT `id` FROM `activities` WHERE `name` = '$activities[0]') ); ";

              //  print ($qty[$i]);

              INSERT INTO `proj` (`id`, `client name`, `startdate`, `findate`, `notes`, `conterct`, `activity1`, `activity2`, `temp`, `activity3`, `activity4`, `activity5`) 
              VALUES (NULL, '123456', '2020-09-01', '2020-09-30', 'הערות', NULL, NULL, NULL, NULL, NULL, NULL, NULL); 
            }
         }
         foreach ($_POST['activities'] as $activities) {
            echo  "<script type='text/javascript'>alert('אירעה $activities[0]ון הפרטים');</script>";
, (SELECT `id` FROM `activities` WHERE `name` = '$activities[1]'), (SELECT `id` FROM `activities` WHERE `name` = '$activities[2]') 
         , (SELECT `id` FROM `activities` WHERE `name` = '$activities[3]')
            } (SELECT `id` FROM `clients` WHERE `name` = '$activities[1]')
            , 'activity2', 'activity3' ,'activity4'
         */

         $flag = "true";
         $updateQuery = "INSERT INTO `project` (`id`, `clientid`, `startdate`, `findate`, `notes`)  VALUES
          ( '$projid' , (SELECT `id` FROM `clients` WHERE `name` = '$clientname'), '$inputstartdate',   '$inputfinishdate', '$notes' 
          );  ";
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
                             <button class="btn btn-success" type="button"   data-dismiss="modal">נסה שנית</button>
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
                     <p>הפרוייקט נוצר בהצלחה.</p>
                     <button class="btn btn-success"  type="button"   data-dismiss="modal"><span>להמשך יצירה לחץ</span> <i class="material-icons">&#xE5C8;</i></button>
                 </div>
             </div>
         </div>
     </div> 
             ';
         }


        }
     
    }

    if(isset($_POST["activities"]))  
    { 
     $activities=$_POST['activities'];
     foreach ($_POST['activities'] as $activities) {
         $sql = "UPDATE `activities` SET `projid` = '$projid' WHERE `activities`.`id` =  (SELECT `id` FROM `activities` WHERE `name` = '$activities');   ";
         $result = $conn->query($sql);
       }
     $file=$_POST["file"];
     }

    ?>
    <div class="main_container">
        <h2>יצירת פרוייקט</h2>


        <form id="emplForm" method="post" action="createproj.php">

            <h5>שיוך לפרוייקט</h5>

            <div class="form-row">

        <div class="form-group col-sm-8">
            
                    <label for="inputLength">קוד פרוייקט</label>
                    <input type="number" class="form-control" name="projid" value="<?php echo $projid; ?>">
              
                </div>
                </div>

            <div class="form-row">

                <div class="form-group col">


                    <label for="clientname">שיוך לקוח</label>  
                    <select class="form-control" name="clientname" id="clientname"  >    
                    <option >בחר לקוח </option>
                    <?php

                    // Check connection
                    if ($conn->connect_error) { 
                        echo '<h4 class="alert-danger">תקלה בהתחברות למסד הנתונים: '. $conn->connect_error .'</h4>';
                        } 
                        else { 
                            $sql = "SELECT `name` AS clientname FROM `clients`";  
                           $result = $conn->query($sql);
                           if ($result->num_rows > 0) { 
                              if (isset($clientname)) {
                                echo "<option selected>$clientname</option>";
                            }
                             
                        while($row = $result->fetch_assoc()) {

                        echo '
                        <option>'.$row["clientname"].'</option>
                         ';
                            }
                                            }
                        else
                        echo ' <option>לקוח יעודכן בהמשך</option>';
                         }
                        ?>  
                    </select>
                </div>



            </div>

            <h5>פרטי פרוקייט</h5>
            <div class="form-row">

                <div class="form-group col">
                    <label for="bankName">תאריך התחלה</label>
                    <input type="date" class="form-control" id="inputstartdate" name="inputstartdate" value="<?php echo $inputstartdate; ?>">
                </div>
                <div class="form-group form-check col">
                    <label for="bankNum">תאריך סיום</label>
                    <input type="date" class="form-control" id="inputfinishdate" name="inputfinishdate" value="<?php echo $inputfinishdate; ?>">
                  
                </div>
               
               
            </div>

            <div class="form-row">

            <div class="form-group col">
                <label for="inputNotes">הערות</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="notes" rows="3"><?php if(isset($_POST["notes"]))  
        {  echo $notes; }?></textarea>
            </div>
            <input id="submit_button" class="btn btn-link" type="submit" value="צור פרוייקט">
            </div>

            <div class="form-row">

                <div class="form-group col">
                    <label for="activities">שיוך פעילות</label>
                    <select class="form-control" name="activities[]" id="activities" multiple>
                    <?php

                 // פעילויות נבחרות 
                if (isset($activities)) {
                   
                    
                    foreach ($_POST['activities'] as $activities) {
                    echo "<option selected>$activities</option>";

                    }}
 
                    // Check connection
                    if ($conn->connect_error) { 
                        echo '<h4 class="alert-danger">תקלה בהתחברות למסד הנתונים: '. $conn->connect_error .'</h4>';
                        } 
                        else { 

                            $inputstartdate=$_REQUEST["inputstartdate"];
                            $inputfinishdate=$_REQUEST["inputfinishdate"];
                            $sql = "SELECT `name` AS activname FROM `activities` WHERE startdate BETWEEN '$inputstartdate' AND '$inputfinishdate' ";  
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {  
                        while($row = $result->fetch_assoc()) {

                        echo '
                        <option>'.$row["activname"].'</option>

                        ';
                            }
                                            }
                        else
                        echo ' <option>פעילות תעודכן בהמשך</option>';
                        }
                        ?>  

                    </select>
                </div>
                <input id="submit_button" class="btn btn-link" type="submit" value="שייך פעילויות לפרוייקט">
            </div>
<?php


            /*        if ($conn->connect_error) { 
                        echo '<h4 class="alert-danger">תקלה בהתחברות למסד הנתונים: '. $conn->connect_error .'</h4>';
                        } 
                        else { 
                    $sql = "SELECT cost FROM `activities` WHERE name LIKE $activities";  
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {  
                        $totalcost = $result +$totalcost;

                  }
                  
                } */

                ?>
          



            <div class="form-row">

            <div class="form-group col-sm8">
                <div class="custom-file">
                <input type="file" class="custom-file-input" name="file" id="customFile">
                <label class="custom-file-label" for="customFile">הוספת חוזה</label>
                </div>
            </div>
            </div>

            <div class="container">
                <div class="centerButton">
                    <button type="submit" class="btn btn-primary">שמירה</button>
                </div>
            </div>
        </form>

    </div>



</html>