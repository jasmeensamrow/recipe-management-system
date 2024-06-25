<?php 
@session_start();
include_once "config.php";
$rec=new RecipeManager();
$result=$rec->addFavour($_GET['rid'],$_SESSION['userid']);
if($result==true)
{   if(isset($_GET['cuisine'])):
    header("location:index.php?cuisine=".$_GET['cuisine']);
    else:
    header("location:index.php");
    endif;
}
else
{
    header("location:index.php");
}