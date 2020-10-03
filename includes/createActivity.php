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

    </script>

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <div id="common"></div>

    <div class="main_container">
        <h2>יצירת פעילות</h2>


        <form id="emplForm" method="post" action="createtheActivity.php">

            <h5>פרטי פעילות</h5>

            <div class="form-row">

                <div class="form-group col">
                    <label for="inputName">שם הפעילות</label>
                    <input type="text" class="form-control" name="inputName">
                </div>

                <div class="form-group col">
                    <label for="inputLength">עלות</label>
                    <input type="number" class="form-control" name="inputcost">
                </div>


            </div>

            <div class="form-row">
                <div class="form-group col">
                    <label for="inputName">תאריך התחלה</label>
                    <input type="date" class="form-control" name="inpustartdate">
                </div>

                <div class="form-group col">
                    <label for="inputName">תאריך סיום</label>
                    <input type="date" class="form-control" name="inpufindate">
                </div>

            </div>

            <div class="form-row">

                <div class="form-group col">
                    <label for="inputNotes">הערות</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="notes" rows="3"></textarea>
                </div>
            </div>

            <div class="form-row">

                <div class="form-group col">
                    <label for="inputNotes">מפעיל פעילות</label>
                    <select class="form-control" name="empname" id="exampleFormControlSelect1">
                    <?php

// Check connection
if ($conn->connect_error) { 
    echo '<h4 class="alert-danger">תקלה בהתחברות למסד הנתונים: '. $conn->connect_error .'</h4>';
    } 
    else { 
       $inputsearch=$_POST["inputsearch"]; 
          
       $sql = "SELECT `fullName` AS empname FROM `employee`";
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {  
       while($row = $result->fetch_assoc()) {

    echo '
                    <option>'.$row["empname"].'</option>
                   
                    ';
                            }
                                            }
                        else
                        echo ' <option>מפעיל יעודכן בהמשך</option>';
                }
            ?>  
                    </select>
                </div>
            </div>

            <div class="container">
                <div class="centerButton">
                    <button type="submit" class="btn btn-primary" >שמירה</button>
                </div>
            </div>
        </form>
    </div>




</html>