<link rel="stylesheet" type="text/css" href="druck.css" media="print" />
<link rel="stylesheet" type="text/css" href="layout.css" media="screen" /> 
<div id=main>

<?php
	//error_reporting(0);
	
	//-----------------------Datenbank Zugriff-----------------------
	$host = "localhost";
	$database = "hpb";
	$user = "root";
	$pw = "";
	$link = mysql_connect($host, $user, $pw);
	mysql_select_db($database, $link);
	//---------------------------------------------------------------
	
	if($_POST["erstellen"]) {
		$username = $_POST['username'];
		$passwort = $_POST['passwort'];
		$passwort = md5($passwort);

		$sql = "Insert Into hp_benutzer (be_username,be_passwort) VALUES (".$username.",\"".$passwort."\")";
		mysql_query($sql);
		
		$sql = "SELECT be_pid FROM hp_benutzer Where be_username =".$username." AND be_passwort = \"".$passwort."\"";
		$fields = mysql_query($sql, $link);
			
		while($v = mysql_fetch_object($fields))
		{
			$be_pid = $v->be_pid;
		}	
	
		$sql = "Insert Into hp_webseite (we_be_pid,we_name) VALUES (".$be_pid.",".$_POST["webname"].")";
		mysql_query($sql);
		
		
	}
	
?>

<html>
	<head>
		<title>Homepage Baukasten</title>
	</head>
	<body>		
		
		<div id=head></div><div id=menue>
	<?php
		echo "</br><H1>Menü</br></H1>";
	?>
	
	

	</div><div id=content><div id=inhalt><div id=titel>

		Homepage-Baukasten	
			
	</div><div id=inhalt2>
	
		Erstellen Sie sich ihre eigene Webseite<br/><br/>
		<form action="login.php" method="post">
		Name der Webseite: <input type="text" name="webname" /><br />
		Username: <input type="text" name="username" /><br />
		Passwort: <input type="password" name="passwort" /><br />
		<input type="submit" value="erstellen" name="erstellen"/>
		</form>

	</div></div></div>
	
	
	
	</body>
</html>