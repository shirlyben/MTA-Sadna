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
        <h2>הצגת עובדים</h2>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">קוד</th>
                    <th scope="col">שם</th>
                    <th scope="col">תוכן</th>
                    <th scope="col">אורך</th>
                    <th scope="col">סטאטוס</th>
                    <th scope="col">הערות</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check connection
                 if ($conn->connect_error) { 
                     echo '<h4 class="alert-danger">תקלה בהתחברות למסד הנתונים: '. $conn->connect_error .'</h4>';
                     } 
                     else { 
                        $sql = "SELECT id , name, content , length, status, notes FROM activities ";
                        $result = $conn->query($sql);
                if ($result->num_rows > 0) {  
                    $linenum =1;
                    while($row = $result->fetch_assoc()) {
                       
                 echo ' <tr>
                <td>'.$row["id"].'</td>
                <td>'.$row["name"].'</td>
                <td>'.$row["content"].'</td>
                <td>'.$row["length"].'</td>
                <td>'.$row["status"].'</td>
                <td>'.$row["notes"].'</td>
                <td>
                    <button id="but1" class="btn btn-link" value=""> עדכון</button>
                </td>
            </tr>';
            $linenum++;
        }
    }
    else
echo '<h4 class="card-title"> לא נמצאו תוצאות</h4>';
}
?>  

        </tbody>
    </table>

    <a href="../includes/createActivity.html" class="btn btn-primary btn-lg">+</a>

</div>


</html>