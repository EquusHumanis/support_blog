<?php
var_dump($_POST);
if(isset($_POST["login"], $_POST["pwd"]))
{
	$name = mysqli_real_escape_string($db, $_POST["login"]);
	$pwd = mysqli_real_escape_string($db, $_POST["pwd"]);
	// var_dump($_POST);

	if(empty($name) || empty($pwd))
	{
		$error = "Veuillez compléter tous les champs...";
	}
	else
	{
		$req = "SELECT * FROM users WHERE login = '".$name."'";
		$res = mysqli_query($db, $req);

		while($adminTab = mysqli_fetch_assoc($res))
		{	
			$idAdmin = $adminTab['id'];
			$loginAdmin = $adminTab['login'];
			$pwdAdmin = $adminTab['password'];
		}

		if(isset($idAdmin, $loginAdmin, $pwdAdmin))
		{
			if($name === $loginAdmin && md5($pwd) === $pwdAdmin)
			{
				$_SESSION["id"] = $idAdmin;
				$_SESSION["admin"] = $loginAdmin;

				header("Location: index.php?page=articles");
				exit;
			}
			else if($name != $loginAdmin || md5($pwd) != $pwdAdmin)
			{
				$error = "L'identifiant ou le mot de passe est incorrecte...";
			}
		}else{
			$error = "L'identifiant ou le mot de passe est incorrecte...";
		}
	}
}

?>