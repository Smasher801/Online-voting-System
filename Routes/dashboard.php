<?php

session_start();

if(!isset($_SESSION['userdata'])){
    
    header("location:../");

}



  $userdata = $_SESSION['userdata'];
  $groupsdata = $_SESSION['groupsdata'];


   if($_SESSION['userdata']['status']==0){
       $status = '<b style="color:red">  Not Voted </b>';
   }
   else {
    $status = '<b style="color:green"> Voted </b>';
   }


?>


<html >
<head>
    
    <title>Online Voting System - Dashboard</title>

    <link rel="stylesheet" href="../CSS/stylesheet.css">

</head>
<body  >

    <style>
           
           #backbtn{
            padding: 5px;
            border-radius: 5px;
             background-color: #48dbfb;
               color:aliceblue;
               float:left;
               margin : 10px;
    
           }

           #Logbtn {
                    
            padding: 5px;
            border-radius: 5px;
             background-color: #48dbfb;
               color:aliceblue;
               float:right;
               margin : 10px;


           }

           #profile{
               /* float:left; */
               text-align : left;
               /* margin-left = 50px; */
           }

           #profile{
                 
               background-color  : white;
               width : 30%;
               padding : 20px; 
               float:left;

           }

           #group{

            background-color  : white;
               width : 55%;
               padding : 20px; 
               float : right;

           }

           #votebtn{

            padding: 5px;
            border-radius: 5px;
            font-size : 15px;
             background-color: #48dbfb;
               color:aliceblue;
               /* float:left; */
    
               
           }

           #mainSection{
            
                 padding : 10px;


           }

           #voted{
                  
            padding: 5px;
            border-radius: 5px;
            font-size : 15px;
             background-color: green;
               color:aliceblue;


           }


    </style>
     
     <div id="mainSection">
                 <div id="headerSection">
                 <a href="../">  <button id="backbtn" >   Back</button>  </a>
                      <a href="logout.php">  <button id="Logbtn"> Log out</button> </a>
                      <center><h1>Online Voting System</h1></center> 
                 </div>
                 <hr>

                 <div>

                    <div id="profile">

                             <b>Name:</b><?php  echo $userdata['name'] ?> <br><br>
                             <b>mobile:</b> <?php  echo $userdata['mobile'] ?>  <br><br>
                             <b>Address:</b> <?php  echo $userdata['address'] ?>  <br><br>
                             <b>Status:</b> <?php  echo $status ?>  <br><br>

                    </div>

                     <div id="group">

                              <?php
                                     
                                     if($_SESSION['groupsdata']){
                                        
                                           for($i=0;$i< count($groupsdata);$i++){
                                                  ?>
                                                  
                                                  <div>

                                                      <b>Group Name: <?php echo $groupsdata[$i]['name'] ?></b> <br><br>
                                                      <b>Votes : <?php echo $groupsdata[$i]['votes'] ?> </b> <br>
                                                      <form action="../api/vote.php" method="POST" >
                                                          <input type="hidden" name="gvotes"  value="<?php  echo $groupsdata[$i]['votes'] ?>" >
                                                          <input type="hidden" name="gid"  value="<?php  echo $groupsdata[$i]['id'] ?>" >
                                                          <?php
                                                                   if($_SESSION['userdata']['status']==0){
                                                                         ?>
                                                                               <input type="submit" name="votebtn" value="Vote" id="votebtn"><br>
                                                                         <?php

                                                                         
                                                                   }
                                                                   else{
                                                                    ?>
                                                                          <button disabled type="button" name="votebtn"  value="Vote" id="voted">Voted</button><br>
                                                                          <?php
                                                                   }
                                                          ?>
                                                          <!-- <input type="hidden" name="" id=""> -->
                                                          
                                                      </form>
                                                  </div>
                                                  <hr>

                                                  <?php
                                           }

                                     }

                                     else {

                                        // 25:25
                                     }

                              ?>


                     </div>


                 </div>
            
     </div>

   
    
    
</body>
</html>