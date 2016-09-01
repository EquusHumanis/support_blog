<?php
session_start();
$db = mysqli_connect("localhost", "root", "troiswa", "blog");
// $error = "";
// $error404 = "";
$page = "articles";

$access = ["content", "articles", "article", "register", "login"];
$access_in = ["content", "articles", "article", "comments", "comment", "create", "logout"];
if(isset($_SESSION["id"]))
{
	if(isset($_GET["page"]) && in_array($_GET["page"], $access_in))
	{
		$page = $_GET["page"];
	}	
}
else
{
	if(isset($_GET["page"]) && in_array($_GET["page"], $access))
	{
		$page = $_GET["page"];
	}	
}

$traitementList = ["create_article", "create_comment", "delete_article", "delete_comment", "login", "logout", "modif_article", "register"];
if(in_array($page, $traitementList))
{
	require("controllers/traitement_".$page.".php");
}
require("controllers/skel.php");
?>