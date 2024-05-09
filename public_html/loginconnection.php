<?php
      include "db_conn.php";

      if(isset($_POST["Submit_Button"]))
      {

        $username = $_POST["username"];
        $password = $_POST["password"]; 
        $_SESSION['roomId'] = "";
        $_SESSION['tenantIC'] = NULL;

 
          $sql = "SELECT * 
              FROM tenant
              WHERE tenantUsername = '$username' 
              AND tenantPassword = '$password'";
            
          $sendsql = mysqli_query($conn, $sql);
        
          if($sendsql)
          {
            if(mysqli_num_rows($sendsql) > 0)
            {	
              while($row = mysqli_fetch_assoc($sendsql))
              {
                $_SESSION['tenantUsername'] = $row['tenantUsername'];	
                $_SESSION['tenantName'] = $row['tenantName'];			 
                //not yet register rent 
                $_SESSION['tenantID'] = $row['tenantID'];
                $getId = $_SESSION['tenantID'];
              }
                $sql = "SELECT *  FROM details WHERE tenantID = '$getId' ";
                $sendsql = mysqli_query($conn, $sql);
                if($sendsql)
                {
                  if(mysqli_num_rows($sendsql) > 0)
                  {	
                    while($row = mysqli_fetch_assoc($sendsql))
                    {	
                      //if tenant already register before
                      //get hostel id in order to get room ID
                      $getHostel = $row['hostelID'];
                      $_SESSION['hostel'] = $getHostel;
                      
                    }

                    
                  }
                }
                  $sql = "SELECT *
                  FROM rent_room R 
                  JOIN hostel H
                  ON R.hostelID = H.hostelID 
                  JOIN details D 
                  ON H.hostelID = D.hostelID 
                  WHERE D.hostelID = '$getHostel' 
                  AND D.tenantID = '$getId' ";

                  $sendsql = mysqli_query($conn, $sql);
                  if($sendsql)
                  {
                    if(mysqli_num_rows($sendsql) > 0)
                    {	
                      while($row = mysqli_fetch_assoc($sendsql))
                      {	
                        //get hostel id
                        $_SESSION['roomId'] = $row['roomID'];
                        $_SESSION['tenantIC'] = $row['tenantIC'];
                        $ic = $_SESSION['tenantIC'];
                      }                     
                    }
                  }  
                  
                  $ic = $_SESSION['tenantIC'];
                    echo "<script> 
                        alert('You have successfully login, Welcome $username !');
                        window.location.href='../index.php';
                      </script>"; 
                    exit();
            }
            else 
            {
              echo "<script>alert('You enter the wrong password')</script>";
                // echo "<script>window.location = 'loginPageOperator.php'</script>";
            }
          }
          else
          {
            "query fail";
          }	
        }

?>