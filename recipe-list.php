<?php include_once "header.php";?>
<?php @session_start();
include_once "config.php";
$rec=new RecipeManager();
$data=$rec->getAllRecipesByUser($_SESSION['userid']);

 
?> 
    <div class="list-container">
        <h2>Recipe List</h2>
        <table>
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>Recipe Title</th>
                    <th width="50%"> Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            
            <?php foreach($data as $rw)
                {       ?>  
            <tr>
                    <td><img src="recipe/<?php echo $rw['img_url'];?>" height="90" width="90"></td>
                    <td><?php echo $rw['title'];?></td>
                    <td><?php echo $rw['description'];?></td>
                    
                    <td class="edit-delete-links">
                        <a href="edit-recipe.php?rid=<?php echo $rw['recipe_id'];?>">Edit</a>
                        <a href="del-recipe.php?rid=<?php echo $rw['recipe_id'];?> ">Delete</a>
                    </td>
                </tr>
                <?php }?>
                
                
            </tbody>
        </table>
    </div>
<?php include_once "footer.php";?>