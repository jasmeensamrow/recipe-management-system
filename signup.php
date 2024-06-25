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
            let em=f.email;
            let pw=f.password;                            
                        
            if(username.value=='')
                { 
                    document.getElementById('usererror').innerHTML= "User Name should not be blank ";   
                    return false;
                }
            if(email.value=="")
            {
                   document.getElementById('emailerror').innerHTML= " Email Should not be blank ";
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
    <h2>Sign Up</h2>
    <div class="mess"></div>    
    <form method="post" onsubmit="return validate(this)" name="f1">
            <label for="username">User Name</label>
            <input type="text" id="username" name="username" >
             <span id="usererror" class="error-color"></span> 

            <label for="email">Email</label>
            <input type="email" id="email" name="email" >
             <span id="emailerror" class="error-color"></span> 

            <label for="password">Password</label>
            <input type="password" id="password" name="password" >
             <span id="passerror" class="error-color"></span> 

            <button type="submit" name="submit">Sign Up</button>
        </form>
        <p>
        <?php
// Check if form is submitted
if(isset($_POST["submit"])){
    // Retrieve form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate data (you can add more validation)
    if (empty($username) || empty($email) || empty($password)) {
        echo "All fields are required.";
        exit;
    }

    $result=$rec->adduser($username,$email,$password);
    
    if ($result>0) {
       
        $_SESSION['uname']=$username;
        $_SESSION['userid']=$result;
        echo "Registration Successfull";
    ?>
    <script>
        function delay()
        {
            window.location="index.php";
        }
        setInterval("delay()",2000);
        </script>
    
   <?php } else {
        echo "Unable to Insert";
    }

    
} 
?>
        </p>
        <p class="text-center">Already have an account? <a href="login.php">Log in</a></p>
  
    </div>
<?php include_once "footer.php";?>