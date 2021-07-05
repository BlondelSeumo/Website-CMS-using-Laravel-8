<?php

/**
* E.Yekta
* cafewebmaster.com
*/
	error_reporting(0);

	define("SLASH", stristr($_SERVER[SERVER_SOFTWARE], "win") ? "\\" : "/");
	
	$path	= ($_POST[path]) ? $_POST[path] : dirname(__FILE__) ;
	$q		= $_POST[q];


	
	function php_grep($q, $path){
		
		$fp = opendir($path);
		while($f = readdir($fp)){
			if( preg_match("#^\.+$#", $f) ) continue; // ignore symbolic links
			$file_full_path = $path.SLASH.$f;
			if(is_dir($file_full_path)) {
				$ret .= php_grep($q, $file_full_path);
			} else if( stristr(file_get_contents($file_full_path), $q) ) {
				$ret .= "$file_full_path\n";
			}
		}
		return $ret;
	}


	if($q){
		$results = php_grep($q, $path);
	}

	
	
	echo <<<HRD

	<pre >
	<form method=post>
		<input name=path size=100 value="$path" /> Path 
		<input name=q size=100 value="$q" /> Query
		<input type=submit>
	</form>
	
		$results
	
	</pre >
	
HRD;

?>