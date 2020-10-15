<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page

/*
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: includes/login.php");
    exit;
}*/
?>

<!DOCTYPE html>
<html lang="en">


<!-- Bootstrap CSS -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <link rel="stylesheet" href="style/home.css">
 <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
   <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
   <script>
       $(document).ready(function(){
           $(".hamburger").click(function(){
              $(".wrapper").toggleClass("collapse");
           });
       });
   </script>
      <script>
      function sendsms(from,to,text) {
        alert('נכנס לפונקציה'); 
        const package = require("com.nexmo:client:4.+")
        //compile 'com.nexmo:client:4.+'

        alert('from =' +from); 
        alert('to ='+ to); 
        alert('text =' +text);



alert('done'); 

      }
   </script>
</head>


<div id="common" class="wrapper">
 <div class="wrapper">
   <div class="top_navbar">
     <div class="hamburger">
        <div class="one"></div>
        <div class="two"></div>
        <div class="three"></div>
     </div>
     <div class="top_menu">
      <div class="logo"> <img src="images/logo.png" alt = "logo" id = "logo" width= 150%; height=85%;></div>
       <h1><b><?php 
         $idname=$_SESSION["username"];
                      
         $sql = "SELECT fullName AS fn FROM `employee` WHERE id LIKE '$idname'";
         $result = $conn->query($sql);
         if ($result->num_rows > 0) {  
         while($row = $result->fetch_assoc()) {
          echo htmlspecialchars($row["fn"]);
         }
        }
      
       
       ?></b> שלום</h1>
       <ul>
         <li><a href="https://www.instagram.com/shahar.dogs/" target="_blank">
           <i class="fab fa-instagram" style="font-size:36px;"></i></a></li>
        
         <li><a href="#">
           <i class="fas fa-envelope"style="font-size:36px;" ></i>
           </a></li>
    
       </ul>
     </div>
   </div>
   
   <div class="sidebar">
       <ul>
         <li><a href="includes/Mproj.html">
           <span class="icon"><i class="fas fa-suitcase" style="font-size:36px;" ></i></span>
           <span class="title">ניהול פרויקטים</span></a></li>
         <li><a href="includes/MActivity.html">
           <span class="icon"><i class="fas fa-folder" style="font-size:36px;"></i></span>
           <span class="title">ניהול פעילויות</span>
           </a></li>
         <li><a href="includes/Memployee.html">
           <span class="icon"><i class="fas fa-address-book" style="font-size:36px;" ></i></span>
           <span class="title">ניהול עובדים</span>
           </a>
          </li>

           <li><a href="includes/timesheet.html">
             <span class="icon"><i class="fas fa-user-clock" style="font-size:36px;" ></i></span>
             <span class="title">דיווח שעות </span>         
               </a>
           </li>
         
          <li>
                 <a href="includes/Mclient.html">
                     <span class="icon"><i class="fas fa-users" style="font-size:36px;" ></i></span>
                     <span class="title">ניהול לקוחות</span>
                 </a>
           </li>
          
            <li>
                 <a href="includes/logout.php"  >
                    
                     <span class="title">
                        התנתקות
                    </span>
                 </a>
            </li>
            <li>
                 <a href="includes/reset-password.php" >
                     
                     <span class="title" >
                     אפס סיסמה
                    </span>
                 </a>
            </li>
             
        
     </ul>
   </div>

   <div class="mainContainer">



     <!--אם מנהל אז שיוצגו הפעילות הבאות :-->   
     <?php 
         $idname=$_SESSION["username"];
                      
         $sql = "SELECT statusEmpl FROM `employee` WHERE id LIKE '$idname'";
         $result = $conn->query($sql);
         if ($result->num_rows > 0) {  
         while($row = $result->fetch_assoc()) {
           if($row["fn"] == "מנהל")
         {

         }
          echo '
          <div >
           
          <form>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">from</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="from">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">to</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="to">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">text</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="txt">
      </div>
    </div>
  
    
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" onsubmit="" class="btn btn-primary">שלח הודעה</button>
      </div>
    </div>
  </form>
          </div>
          ';
         }
        }
      
       
       ?>

     <!--ימי הולדת ולשלוח SMS מזל טוב
    SELECT fullName , phone ,birthDate FROM `employee` WHERE birthDate BETWEEN '2020-10-06' and '2020-09-13';
    -->   
     <!--פעילויות שמתרחשות השבוע
    SELECT * FROM activities WHERE startDate BETWEEN '2020-06-10' AND '2020-06-13';
    -->   
     <!--פרויקטים שמתרחשים השבוע
    SELECT * FROM `project` WHERE startdate BETWEEN '2020-10-06' and '2020-10-13'
    -->   

      <!--אם כללי אז שיוצגו הפעילות הבאות :-->   
       <!--פעילויות שמתרחשות השבוע עבורי 
       SELECT * FROM activities INNER JOIN employee on activities.employeid= employee.id WHERE activities.startDate BETWEEN '2020-06-10' AND '2020-06-13'AND employee.id like '204398937'
      -->  

   </div>
 
  
</html>
