<?php
    session_start();
    $user_name=$_REQUEST['u1'];
    $password=$_REQUEST['p1'];
    $role=$_REQUEST['r1'];
    
    $connect=pg_connect("host=localhost user=postgres dbname=nccproject password=santoshsahu");
    $result=pg_query($connect,"select * from logindetails");
    
    $flag=0;
    while(($row=pg_fetch_row($result))){
        
       if($row[0]==$user_name && $row[1]==$password && $row[2]==$role){
            
            $flag=1;
            break;
        }
        //echo$row[0];
    }
    
    if($flag==1){
        
        $_SESSION['username']=$user_name;
        echo"Valid";
        //ob_start();
        //header("Location:user.html");
        
    }else{
        
        echo"Invalid";
        //header("Location:invalid.html");
        
        
    }
    
    ?>

