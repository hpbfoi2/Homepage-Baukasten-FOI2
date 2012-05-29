<link rel="stylesheet" type="text/css" href="druck.css" media="print" />
<div id=main>
<?php
	//#####################################################################################################################
	//---------------------------------------------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------
	// Entwickler: Tobias Saathoff
	// Version: 0.2 
	// Letztes Update: 05.05.2012
	//---------------------------------------------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------
	//#####################################################################################################################
	
	//Notizen ausblenden
	error_reporting(0);
	
	//-----------------------Datenbank Zugriff-----------------------
	$host = "localhost";
	$database = "hpb";
	$user = "root";
	$pw = "";
	$link = mysql_connect($host, $user, $pw);
	mysql_select_db($database, $link);
	//---------------------------------------------------------------
	
	
	$sql = "SELECT * FROM hp_webseite
			Where we_name = \"".$_GET["name"]."\"";
	
	$fields = mysql_query($sql, $link);
			
	while($v = mysql_fetch_object($fields))
	{
		$webseite = $v->we_name;
		?><link rel="stylesheet" type="text/css" href="<? echo $v->we_layout; ?>" media="screen" /><?php
	}	
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	session_start();

	$username = $_POST['username'];
	$passwort = $_POST['passwort'];

	$hostname = $_SERVER['HTTP_HOST'];
	$path = dirname($_SERVER['PHP_SELF']);
	
	//User + PW prüfen
	$passwort = md5($passwort);

	$sql = "SELECT be_pid, be_username, be_passwort FROM hp_benutzer 
			WHERE be_username = \"".$username."\" AND be_passwort = \"".$passwort."\"";

	$fields = mysql_query($sql, $link);
			
	while($v = mysql_fetch_object($fields))
	{
		$user_id = $v->be_pid;
		$user = $v->be_username;
		$userpw = $v->be_passwort;
	}	

	// Benutzername und Passwort werden überprüft
	if ($username == $user && $passwort == $userpw) {
		$_SESSION['angemeldet'] = true;
		$_SESSION['id'] = $user_id;	
		$_SESSION['hp_name'] = $webseite;			
		// Weiterleitung zur geschützten Startseite
		if ($_SERVER['SERVER_PROTOCOL'] == 'HTTP/1.1') {
			if (php_sapi_name() == 'cgi') {
				header('Status: 303 See Other');
			}
			else {
				header('HTTP/1.1 303 See Other');
			}
		}

		header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/index.php?name='.$_SESSION['hp_name'].'');
		exit;
		}
	}
	else{
		session_start();
		$hostname = $_SERVER['HTTP_HOST'];
		$path = dirname($_SERVER['PHP_SELF']);
	}
	//---------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------Webseiten Inhalt----------------------------------------------------------
	
	?>
		<div id=head><? echo $webseite; ?></div><div id=menue>
	<?php
		echo "</br><H1>Menü</br></H1>";
	?>
	
	<?php if (isset($_SESSION['angemeldet']) || $_SESSION['angemeldet']) {
		//eingeloggtes Menü

		$sql = "SELECT * FROM hp_inhalt 
				INNER JOIN hp_webseite ON we_pid = in_we_pid
				WHERE we_name = \"".$_SESSION['hp_name']."\"";
		
		$fields = mysql_query($sql, $link);
			
		while($v = mysql_fetch_object($fields))
		{
			$in_pid = $v->in_pid;
			$titel = $v->in_name;
			
			?> <a href="index.php?name=<? echo $_SESSION['hp_name']; ?>&mid=<? echo $in_pid; ?>"><? echo $titel; ?></a></br><?php
		}

		?> <a href="index.php?name=<? echo $_SESSION['hp_name']; ?>&mid=0"><? echo "Einstellungen"; ?></a></br><?php
	?>
	
	<br/>
	
	
	<form method="POST" action="index.php?name=<? echo $_SESSION['hp_name']; ?>">
		<input type="submit" name="logout" value="ausloggen!">
	</form>	
	<?php
	}
	else{ //Nicht eingeloggtes Menü
		$sql = "SELECT * FROM hp_inhalt 
				INNER JOIN hp_webseite ON we_pid = in_we_pid
				WHERE we_name = \"".$webseite."\"";
		
		$fields = mysql_query($sql, $link);
			
		while($v = mysql_fetch_object($fields))
		{
			$in_pid = $v->in_pid;
			$titel = $v->in_name;
			
			?> <a href="index.php?name=<? echo $webseite; ?>&mid=<? echo $in_pid; ?>"><? echo $titel; ?></a></br><?php
		}
		?><br/>
			<form action="index.php?name=<? echo $webseite; ?>" method="post">
			Username: <input type="text" name="username" /><br />
			Passwort: <input type="password" name="passwort" /><br />
			<input type="submit" value="einloggen" />
			</form>
		<?php
	}
	
	?></div><div id=content><div id=inhalt><div id=titel>
	<?php
	
		//Titel
		$sql = "SELECT in_name FROM hp_inhalt 
				INNER JOIN hp_webseite ON we_pid = in_we_pid
				WHERE we_name = \"".$webseite."\"
				AND in_pid = ".$_GET["mid"];
		
		$fields = mysql_query($sql, $link);
			
		while($v = mysql_fetch_object($fields))
		{
			$titel = $v->in_name;
			
			echo $titel;
		}
	
	?>	
	</div><div id=inhalt2><?php
		if (isset($_SESSION['angemeldet']) || $_SESSION['angemeldet']) {
			//Inhalt wenn eingeloggt	
			#Aufruf der cInhalt_be Klasse
			require_once("cInhalt_be.php");
			$Inhalt_be = new cInhalt_be();
		}
		else{
			//Inhalt wenn nicht eingeloggt
			
			#Aufruf der cInhalt Klasse
			require_once("cInhalt.php");
			$Inhalt = new cInhalt();
		}
	?></div></div></div><?php
	
	
	
	//------------------------------------------------------------------------------------------------------------------------
	//------------------------------------------------------------------------------------------------------------------------
		
	if($_POST["logout"])
	{
		header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/logout.php?name='.$_SESSION['hp_name'].'');
	}
?>
	
</div>