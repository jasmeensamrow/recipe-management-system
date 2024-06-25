<?php
@session_start();
include_once "config.php";
$rec=new RecipeManager();
 $rw=$rec->deleteFav($_GET['rid'],$_SESSION['userid']);
 if ($rw) {
    
   if(isset($_GET['cuisine'])):
      header("location:index.php?cuisine=".$_GET['cuisine']);
      else:
      header("location:index.php");
      endif;
   } ?>
   