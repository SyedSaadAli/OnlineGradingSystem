<?php 

include('dbcon.php'); 
session_start();
if(isset($_POST['login_btn']))
{

    $Username = $_POST['Username'];
    $Password = $_POST['Password'];

$_SESSION['True'] = 'True' ;

    $query = "SELECT * FROM student";
    $query_run = mysqli_query($db, $query);
    if(mysqli_num_rows($query_run) > 0)        
    {
        while($row = mysqli_fetch_assoc($query_run))
        {
          if($row['Student_ID'] === $Username && $row['Password'] === $Password)
          {

             $_SESSION['Username'] = $Username;
             $_SESSION['Password'] = $Password;

             header('Location: student/view.php');
         }

     }
 }


 $query2 = "SELECT * FROM professor";
 $query_run2 = mysqli_query($db, $query2);
 if(mysqli_num_rows($query_run2) > 0)        
 {
    while($row2 = mysqli_fetch_assoc($query_run2))
    {
      if($row2['Professor_ID'] === $Username && $row2['Password'] === $Password)
      {

         $_SESSION['Username'] = $Username;
         $_SESSION['Password'] = $Password;

         header('Location: professor/index.php');
     }


 }

}



}


?>