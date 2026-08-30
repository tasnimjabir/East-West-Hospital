<div class="header-wrap">
    <div class="header">
        <a href='index.php'><img src="img/logo.png" alt=""></a>
        <div class="login-wrap">
            <?php 
            require("connection.php");
            if(!isset($_SESSION['patient_id'])){
                if(isset($_SESSION['name']) && $_SESSION['name'] == "admin"){  
                echo "<button class='account'><a href='admin-department.php'>".$_SESSION['name']."</a></button>";
            }else{
                echo "<button><a href='signup.php'>Sign up</a></button>";
                echo "<button><a href='login.php'>Log in</a></button>";
            }
            }
            else{
                echo "<button class='account'><a href='#'>".$_SESSION['name']."</a></button>";
            }
            ?>
        </div>
        
    </div>
    
</div>