<?php
@session_start(); 
include_once "config.php";
//$rec=new RecipeManager();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Manager</title>
   <link rel="stylesheet" href="css/style.css">  
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<!----menu-responsive---->

  <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            $("#menu-expand-collapse").click(function() {
                $("#responsive-menu-list").toggle();
            });
        });
    </script>

    <!----menu-responsive---->

    


   
</head>

<body>
    <header>
        <h1>Online Recipe Manager</h1>
        <div class="search-container">
            <form action="search.php" method="post" class="srch">
                <input type="text" placeholder="Search for recipes..." name="keyword">
                <button type="submit" id="search">Search</button>
            </form>

            <ul class="top-right-menu">           
                <?php if(isset($_SESSION['uname']) && $_SESSION['uname']!=''): ?>
                    <li><a href="signup.php">Welcome <?php echo $_SESSION['uname']; echo $_SESSION['userid'];?></a></li>
                    <li><a href="logout.php">Logout</a></li>
           
                    <?php else:?>
                    <li><a href="signup.php">Signup</a></li>
                    <li><a href="login.php">Login</a></li>
                <?php endif;?>
            </ul>       
        </div>
    </header>
    <nav id="responsive-menu">
        <div id="menu-expand-collapse"><img src="images/menu.png" width="25px"></div>

        <ul class="left-menu"  id="responsive-menu-list">
            <li class="menu-item"><a href="index.php">Home</a></li>
            <?php $cuisine=["Indian","Chinese","Italian","Japanese","Canadian"];
             for($i=0;$i<count($cuisine);$i++)
             {
            ?>
            
            <li class="menu-item"><a href="index.php?cuisine=<?php echo $cuisine[$i];?>"><?php echo $cuisine[$i];?></a></li>
            <?php } ?>
            <?php if(isset($_SESSION['uname']) && $_SESSION['uname']!=''): ?>
            
                <li class="menu-item"><a href="addrecipe.php">Add Recipe</a></li>
            <li class="menu-item"><a href="recipe-list.php">Recipe List</a></li>
            <li class="menu-item"><a href="fav-list.php">My Favouraties</a></li>
            <?php endif;?>
            <!-- <li class="menu-item"><a href="#">Contact</a></li> -->
        </ul>


        <ul class="right-menu">
           
        <?php if(isset($_SESSION['uname']) && $_SESSION['uname']!=''): ?>
            <li><a href="signup.php">Welcome <?php echo $_SESSION['uname']; echo $_SESSION['userid'];?></a></li>
            <li><a href="logout.php">Logout</a></li>
   
            <?php else:?>
            <li><a href="signup.php">Signup</a></li>
            <li><a href="login.php">Login</a></li>
        <?php endif;?>
        </ul>
    </nav>

 




    
   