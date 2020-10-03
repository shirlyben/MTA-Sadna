<?php
 include 'dbconn.php';
 session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Employee page</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../style/Common.css">
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
    <script>
        $(document).ready(function() {
            $(".hamburger").click(function() {
                $(".wrapper").toggleClass("collapse");
            });
        });
    </script>


</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <div id="common"></div>

    <div class="main_container">
    <h2> עדכון פרוייקט</h2>

            <nav class="navbar navbar-light col-sm-10">
                <form class="form-inline" method="POST" action="showserchproj.php">
                    <input class="form-control" type="search" name="inputsearch" placeholder="הזן קוד פרוייקט המיועד לעדכון" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit" herf="showserchproj.php">חפש</button>
                </form>
            </nav>

     
        <div id="formEmpl" >


            <div class="form-row">
            <?php

            // Check connection
            if ($conn->connect_error) { 
                echo '<h4 class="alert-danger">תקלה בהתחברות למסד הנתונים: '. $conn->connect_error .'</h4>';
                } 
                else { 
                   $inputsearch=$_POST["inputsearch"]; 
                      
                   $sql = "SELECT project.id AS id, clients.name as cn, startdate , findate , notes FROM `project` INNER JOIN clients ON clientid=clients.id 
                    WHERE project.id LIKE '$inputsearch'";
                   $result = $conn->query($sql);
                   if ($result->num_rows > 0) {  
                   while($row = $result->fetch_assoc()) {

                echo '<form id="emplForm" method="post" action="updateproj.php">

                <h5>שיוך לפרוייקט</h5>

                <div class="form-row">

                <div class="form-group col-sm-8">
            
                        <label for="inputLength">קוד פרוייקט</label>
                        <input type="number" class="form-control" name="projid" value="'.$row["id"].'" readonly>
                  
                    </div>
                    </div>

                <div class="form-row">

                <div class="form-group col">


                    <label for="clientname">שיוך לקוח</label>  
                    <input type="text" class="form-control" name="projclientnameid" value="'.$row["cn"].'" readonly>

                    </div>
                    </div>

                    <h5>פרטי פרוקייט</h5>
                    <div class="form-row">
        
                        <div class="form-group col">
                            <label for="bankName">תאריך התחלה</label>
                            <input type="date" class="form-control" id="inputstartdate" name="inputstartdate" value="'.$row["startdate"].'" >
                        </div>
                        <div class="form-group form-check col">
                            <label for="bankNum">תאריך סיום</label>
                            <input type="date" class="form-control" id="inputfinishdate" name="inputfinishdate" value="'.$row["findate"].'">
                          
                        </div>
                       
                    </div>

                    <div class="form-row">

            <div class="form-group col">
                <label for="inputNotes">הערות</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="notes" rows="3">'.$row["notes"].'</textarea>
            </div>
            </div>

            <div class="form-row">

                <div class="form-group col">
                    <label for="activities">שיוך פעילות</label>
                    <select class="form-control" name="activities[]" id="activities" multiple>
                    ';

                    $start = $row["startdate"];
                    $fin= $row["findate"];
                    
                    $secondsql = "SELECT `name` AS activname FROM `activities`
                    WHERE startdate BETWEEN '$start' AND '$fin' ";
                $secondresult = $conn->query($secondsql);
                        if ($secondresult->num_rows > 0) {  
                        while($row = $secondresult->fetch_assoc()) {
                            echo '
                            <option>'.$row["activname"].'</option>
    
                            ';
                        }
                    }
                    $idproj=$row["id"];
                    $thirdsql = "SELECT name  AS selectedactive  FROM `activities` where projid LIKE '$idproj' ";
                   $thirdresult = $conn->query($thirdsql);
                           if ($thirdresult->num_rows > 0) {  
                           while($row = $thirdresult->fetch_assoc()) {
                               echo '
                               <option selected>'.$row["selectedactive"].'</option>
       
                              ';
                           }
                        }
                       

               


                       echo'
                       </select>
                       </div>
                       </div>


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
                <button type="submit" class="btn btn-primary">עדכן</button>
            </div>
        </div>
                ';
                           
                     }  } 
                        else
                        echo '<h4> המשתמש לא קיים במערכת</h4>';
                }
            ?>  
            </form>
        </div>
    </div>



</html>