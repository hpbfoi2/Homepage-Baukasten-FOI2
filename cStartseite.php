<?php
	class cStartseite{
		function cStartseite(){
			
			?>
			Erstellen Sie sich ihre eigene Webseite<br/><br/>
			<form action="login.php?mid=1" method="post">
			Name der Webseite: <input type="text" name="webname" /><br />
			Username: <input type="text" name="username" /><br />
			Passwort: <input type="password" name="passwort" /><br />
			<input type="submit" value="erstellen" />
			</form>
			<?php
		}
	}
?>