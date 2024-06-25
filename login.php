<?php include_once "header.php";?>
<?php @session_start();
include_once "config.php";
$rec=new RecipeManager();
 
?>  

<!----form-valid---->

    <script type="text/javascript">

         function validate(f)
            {
            let un=f.username;
            let pw=f.password;                            
                        
            if(username.value=='')
                { 
                    document.getElementById('usererror').innerHTML= "User Name should not be blank ";   
                    return false;
                }
            
            if(password.value=="")
                 {
                    document.getElementById('passerror').innerHTML= " Password should not be blank";
                    return false;
             }
                return true;
            }
    </script>


    <!----form-valid---->


    <div class="signup-container">
        <h2>Sign In</h2>
        <form method="post" onsubmit="return validate(this)" name="f1">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
                <span id="usererror" class="error-color"></span>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <span id="passerror" class="error-color"></span>
            </div>
            <button type="submit" name="submit">Sign In</button>
        </form>
        <?php
// Check if form is submitted

if (isset($_POST['submit'])) {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate data (you can add more validation)
    if (empty($username) ||  empty($password)) {
        echo "All fields are required.";
        exit;
    }

    $result=$rec->chkuser($username,$password);

    if ($result>0) {
       
        $_SESSION['uname']=$username;
        $_SESSION['userid']=$result;
        header("location:index.php");

     ?>   
         
   <?php } else {
        echo "Invalid username or password";
    }

    
} 
?>
        <p class="text-center">Don't have an account? <a href="signup.php">Sign Up</a></p>
    </div>

    <?php include_once "footer.php";?>