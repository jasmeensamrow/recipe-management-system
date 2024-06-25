<?php include_once "header.php";?>
<?php @session_start();
include_once "config.php";
$rec=new RecipeManager();
if(isset($_GET['cuisine']) && $_GET['cuisine']):
    $data=$rec->getRecipeByCuisine($_GET['cuisine']);
else:
    $data=$rec->getAllRecipes();
endif;


?>
  <section>
    <?php
    ?>  
    <?php foreach($data as $rw)
        { 
            
        ?>        
      
    <div class="recipe-card">
       <div class="fav">         
           <?php 
           if(isset($_SESSION["userid"])):
           
            $userid=$_SESSION['userid'];
            $res=$rec->chkfav($rw['recipe_id'],$userid);
            if($res==true):?>    
                <a href="delfav.php?rid=<?php echo $rw['recipe_id'];?><?php if(isset($_GET['cuisine'])){?>&cuisine=<?php echo $_GET['cuisine'];}?>"><i class="fa-solid fa-heart" style="color:red"></i></a>
           <?php else:?>
                <a href="fav.php?rid=<?php echo $rw['recipe_id'];?><?php if(isset($_GET['cuisine'])){?>&cuisine=<?php echo $_GET['cuisine'];}?>"><i class="fa-solid fa-heart" style="color:gray"></i></a>
           <?php endif;
           endif;
           ?> 
        </div>
        <a href="recipe-detail.php?rid=<?php echo $rw['recipe_id'];?>"> <img src="recipe/<?php echo $rw['img_url'];?>" alt="Recipe 1" ></a>
            <h2><?php echo $rw['title'];?></h2>
            <?php  /** rating  ***/ ?>
          
            <?php  $av=round($rec->getAverageRating($rw['recipe_id'])); ?>
            <div class="rating">
                <?php for($i=1;$i<=$av;$i++)
                {?>
                <span class="star active">&#9733;</span>
                <?php } 
                for($i=1;$i<=(5-$av);$i++)
                {
                ?>
                <span class="star">&#9733;</span>
                <?php } ?>

                </div>
            <?php if(isset($_SESSION['userid'])):?>
            <form method="post" action="rate_recipe.php" class="rating">
                <input type="hidden" name="recipe_id" value="<?php echo $rw['recipe_id']; ?>">
                <select name="rating">
                <option value="1">1 Star</option>
                <option value="2">2 Stars</option>
                <option value="3">3 Stars</option>
                <option value="4">4 Stars</option>
                <option value="5">5 Stars</option>
                </select>
                <input type="submit" value="Rate">
                </form>
             <?php endif;?>       
            <a class="readmore" href="recipe-detail.php?rid=<?php echo $rw['recipe_id'];?>">Read more</a>
        </div>
     <?php }?>   
      
        <!-- Add more recipe cards here -->
    </section>        
    <footer>
        <p>&copy; 2024 Online Recipe Manager</p>
    </footer>
</body>
</html>