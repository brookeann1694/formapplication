<html>

   <head>
      <title>Project Submission Tracker (HTML/PHP/MYSQL)</title>
   </head>

   <body>
      <?php
         //Set Database Connection String
         if(isset($_POST['add'])) {
            $dbhost = 'db-mysql-mtg-14981-do-user-9057563-0.b.db.ondigitalocean.com:25060';
            $dbuser = 'doadmin';
            $dbpass = 'vmfgowz9s3x40idw';
            $dbname = 'defaultdb';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
         
          //Test Database Connection
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
               //echo "Database Connection Fialed";
            }
                        
          //Set variables for POST data
            $project_title = $_POST['project_title'];
            $project_owner = $_POST['project_owner'];
            $submission_date = $_POST['submission_date'];
            
          //Insert Data into Table from Form
            mysqli_select_db($conn, $dbname);
            $sql = "INSERT INTO project_tbl (project_title, project_owner, submission_date)
            VALUES
            ('$project_title','$project_owner','$submission_date')";
            //('$_POST[project_title]','$_POST[project_owner]','$_POST[submission_date]')";

          //Validate if Query completed successfully.
            if (!mysqli_query($conn,$sql))
            {
             die('Error: ' . mysql_error());
             //echo "Failed to write to the database";
            } 
            //echo "successfully added record to database";
           
          //Close mysql connection
            mysqli_close($conn);       
          
          //Redirect back to app form or any browser
           //header("Location: https://sample-app-2utwd.ondigitalocean.app/");
           header("Location: index.php");
            
           exit;
            
         } else {
      ?>
   
      <form method = "post" action = "<?php $_PHP_SELF ?>">
         <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
            <tr>
               <td width = "250">Project Title</td>
               <td>
                  <input name = "project_title" type = "text" id = "project_title">
               </td>
            </tr>
         
            <tr>
               <td width = "250">Project Owner</td>
               <td>
                  <input name = "project_owner" type = "text" id = "project_owner">
               </td>
            </tr>
         
            <tr>
               <td width = "250">Submission Date [   yyyy-mm-dd ]</td>
               <td>
                  <input name = "submission_date" type = "text" id = "submission_date">
               </td>
            </tr>
      
            <tr>
               <td width = "250"> </td>
               <td> </td>
            </tr>
         
            <tr>
               <td width = "250"> </td>
               <td>
                  <input name = "add" type = "submit" id = "add"  value = "SUBMIT">
               </td>
            </tr>
         </table>
      </form>
   <?php
      }
   ?>
   </body>
</html>
