<?php
	class cInhalt{
		function cInhalt(){
			//-----------------------Datenbank Zugriff-----------------------
			$host = "localhost";
			$database = "hpb";
			$user = "root";
			$pw = "";
			$link = mysql_connect($host, $user, $pw);
			mysql_select_db($database, $link);
			//---------------------------------------------------------------
			
			$sql = "SELECT in_maintext FROM hp_inhalt 
				INNER JOIN hp_webseite ON we_pid = in_we_pid
				WHERE we_name = \"".$_GET['name']."\"
				AND in_pid = ".$_GET["mid"];
		
			$fields = mysql_query($sql, $link);
			
			while($v = mysql_fetch_object($fields))
			{
				$maintext = $v->in_maintext;
			
				echo $maintext;
			}
		}
	}
?>