<?php
	class cInhalt_be{
		function cInhalt_be(){
			//-----------------------Datenbank Zugriff-----------------------
			$host = "localhost";
			$database = "hpb";
			$user = "root";
			$pw = "";
			$link = mysql_connect($host, $user, $pw);
			mysql_select_db($database, $link);
			//---------------------------------------------------------------
			
			if($_POST["erstellen"]){
				
				$sql = "SELECT we_pid FROM hp_webseite
				WHERE we_name = \"".$_GET['name']."\" GROUP BY we_pid";
		
				$fields = mysql_query($sql, $link);
				while($v = mysql_fetch_object($fields))
				{
					$sql = "Insert Into hp_inhalt (in_we_pid,in_name) VALUES (\"".$v->we_pid."\",\"".$_POST["n_titel"]."\")";
					mysql_query($sql, $link);
					echo "Die Daten wurden geändert!";
					$hostname = $_SERVER['HTTP_HOST'];
					$path = dirname($_SERVER['PHP_SELF']);
					header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/index.php?name='.$_SESSION['hp_name'].'&mid=0');
				}
			}
			if($_POST["del"])
			{
				$sql = "DELETE FROM hp_inhalt WHERE in_pid = ".$_POST["se_id"];
				mysql_query($sql);
				$hostname = $_SERVER['HTTP_HOST'];
				$path = dirname($_SERVER['PHP_SELF']);
				header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/index.php?name='.$_SESSION['hp_name'].'&mid=0');
			}
			if($_POST["layout"]){
				$sql = "SELECT we_pid FROM hp_webseite
				WHERE we_name = \"".$_GET['name']."\" GROUP BY we_pid";
		
				$fields = mysql_query($sql, $link);
				while($v = mysql_fetch_object($fields))
				{
					$sql = "Update hp_webseite SET we_layout = \"".$_POST["layout"]."\" WHERE we_pid = ".$v->we_pid;
					mysql_query($sql, $link);
					echo "Die Daten wurden geändert!";
				}
				$hostname = $_SERVER['HTTP_HOST'];
				$path = dirname($_SERVER['PHP_SELF']);
				header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/index.php?name='.$_SESSION['hp_name'].'&mid=0');
			}
			if($_POST["bearbeiten"]){
				$sql = "Update hp_inhalt SET in_maintext = \"".$_POST["main"]."\" WHERE in_pid = ".$_GET["mid"];
				mysql_query($sql, $link);
				echo "Die Daten wurden geändert!";
			}
			/*
			if($_POST["aendern"]){
				$sql = "Update hp_webseite SET we_name = \"".$_POST["webname"]."\" WHERE we_name = ".$_GET["name"];
				mysql_query($sql, $link);
				echo "Die Daten wurden geändert!";
			}*/

			$sql = "SELECT in_maintext FROM hp_inhalt 
				INNER JOIN hp_webseite ON we_pid = in_we_pid
				WHERE we_name = \"".$_GET['name']."\"
				AND in_pid = ".$_GET["mid"];
		
			$fields = mysql_query($sql, $link);
			
			?>
			<form method="POST" action="#">
			<?php
				while($v = mysql_fetch_object($fields))
				{
					$maintext = $v->in_maintext;
					?>
					<textarea name="main" cols="80" rows="20"><? echo $maintext; ?></textarea>
					<br/><input type="submit" name="bearbeiten" value="bearbeiten">
					<?php
				}
			?></form><?php
			/*
			if(!$_GET["mid"])
			{
				?>
				Die Daten Ihrer Homepage<br/><br/>
				<form action="#" method="post">
				Name der Homepage: <input type="text" name="webname" /><br />
				Username: <input type="text" name="username" /><br />
				Passwort: <input type="password" name="passwort" /><br />
				<input type="submit" name="aendern" value="aendern" />
				</form>
				<?php
			}*/
			if($_GET["mid"] == 0)
			{
							
				$sql = "SELECT * FROM hp_webseite
				Where we_name = \"".$_GET["name"]."\"";
				
				$fields = mysql_query($sql, $link);
						
				while($v = mysql_fetch_object($fields))
				{
					$webseite = $v->we_name;
				}	
				?>
				<form method="POST" action="#">
				<table border=0><tr><td>Layout</td><td>
				<select name="layout">
				<?php
				$sql = "SELECT la_pid,la_name FROM hp_layout";
		
				$fields = mysql_query($sql, $link);
				while($v = mysql_fetch_object($fields))
				{
					$name = $v->la_name;
						
					?><option value = <? echo $name; ?>><? echo $name; ?></option><?
					
				}
				?>
				</td></tr><tr><td></td><td>
				<input type="submit" name="lay" value="generieren">
				</td></tr>
				</table>	
				
				<br/>
				<table border=0>
				<tr>
				<form method="POST" action="#">
				<td>Seite</td><td>
				<input type="text" name="n_titel"></input>
				</td></tr><tr><td></td><td>
				<input type="submit" name="erstellen" value="erstellen">
				</td></tr>
				</table>				
				
				</br>
				<form method="POST" action="#">
				<table border=0><tr><td>Seite</td><td>
				<select name="se_id">
				<?
				$sql = "SELECT we_pid FROM hp_webseite
				WHERE we_name = \"".$_GET['name']."\" GROUP BY we_pid";
		
				$fields = mysql_query($sql, $link);
				while($v = mysql_fetch_object($fields))
				{
					$sql = "Select in_pid,in_name From hp_inhalt WHERE in_we_pid = ".$v->we_pid." Order BY in_pid";
					
					$fields = mysql_query($sql);
					while($v = mysql_fetch_object($fields))
					{
						$id = $v->in_pid;
						$name = $v->in_name;
						
						?><option value = <? echo $id; ?>><? echo $name; ?></option><?
					}
				}
				?>
				</select>
				</td></tr><tr><td></td><td><input type="submit" name="del" value="löschen!"></input></td></tr>
				</table>
				</form>
				<?php
			}
		}
	}
?>