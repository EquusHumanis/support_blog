<?php
	if(isset($_POST["choixLangage"], $_POST["choixCategorie"], $_POST["titre"], $_POST["objectif"], $_POST["textBox"]))
	{

		$titre = mysqli_real_escape_string($db, $_POST["titre"]);
		$contenu = mysqli_real_escape_string($db, $_POST["textBox"]);
		$objectif = mysqli_real_escape_string($db, $_POST["objectif"]);
		$langage = mysqli_real_escape_string($db, $_POST["choixLangage"]);
		$categorie = intval($_POST["choixCategorie"]);

		$res = mysqli_query($db, "INSERT INTO lessons (lang, `category`, `date`, `title`, `goal`, `content`) VALUES ('".$langage."', '".$categorie."', CURDATE(), '".$titre."', '".$objectif."', '".$contenu."')");

		if($res == false)
		{
			if (mysqli_errno($db) == 1062)
				$error = "Ce titre existe déjà";

			else
				$error = 'Internal server error';
				var_dump($error);
		}
		else{
			header("Location: index.php?page=bloc-cours&lang=$langage&cat=$categorie");
			exit;
		}
	}
?>				