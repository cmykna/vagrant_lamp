<?php
/**
 * Microsite General Functions
 *
 * @author HMH Web Team
 * @author Bryan Schultz bryan.schultz@hmhpub.com
 * @author Terence Bodola terence.bodola@hmhpub.com
 * @author Kyle Crawford kyle.crawford@hmhpub.com
 * @author Seth Cardoza seth.cardoza@hmhpub.com
 *
 * @copyright Copyright (c) 1995-2011 Houghton Mifflin Harcourt. All rights reserved.
 *
 *
 * @package Microsite System Templates
 * @subpackage System/Function
 * @since Microsite 2.0.0
 * @version 3.0.0 (honeybadger)
 */

/*
 ***************************************************************************
 *	Strip http and https from links for HTML5
 ***************************************************************************
*/
	function stripHTTP($input) {
		/*$toReplace = array("http:", "https:");
		$replaceWith = array("http:", "https:");
		$cleanHTTP = str_replace($toReplace, $replaceWith, $input);
		$input = $cleanHTTP;*/
		return $input;
	}
/*
 ***************************************************************************
 *	Add Dashes to slugs
 ***************************************************************************
*/
	function addDashes($input) {
		$toReplace = array(" ");
		$replaceWith = array("-");
		$cleanSlug = str_replace($toReplace, $replaceWith, $input);
		$input = $cleanSlug;
		return $input;
	}
/*
 ***************************************************************************
 *	Check for Boolean Values
 ***************************************************************************
*/
	function booleanCheck($input) {
		// Arrays of acceptable boolean values
		$falseArray = array(false, FALSE, 0);
		$trueArray 	= array(true , TRUE , 1);
		// If input was null or false, force to input integer
		if($input == NULL) { $input = (int) 0; return $input; }
		// Scan arrays looking for acceptable boolean from input
		// Otherwise throw back error message
		if(in_array($input, $falseArray, true)) {
			$input = (int) 0;
			return $input;
		} else if(in_array($input, $trueArray, true)) {
			$input = (int) 1;
			return $input;
		} else {
		die("<b>Warning:</b> Invalid argument supplied at <b>Function:</b> ".__FUNCTION__." in <b>File:</b> ".__FILE__." on <b>Line:</b> ".__LINE__.". The argument can contain only
<pre>
+------------------+
| Boolean Values   |
+---------+--------+
|  false  |  true  |
|  FALSE  |  TRUE  |
|  0      |  1     |
+---------+--------+
| Default Value    |
+---------+--------+
|  false           |
+---------+--------+
</pre>");
		}
	}
/*
 ***************************************************************************
 *	Check for rel="" Values
 ***************************************************************************
*/
	function relCheck($input) {
		// Arrays of acceptable boolean values
		$falseArray = array(false, FALSE, 0);
		$trueArray 	= array(true , TRUE , 1);
		// If input was null or false, force to input integer
		if($input == NULL) { $input = (int) 0; }
		// Scan arrays looking for acceptable rel="" from input
		// Otherwise throw back error message
		if(in_array($input, $falseArray, true)) {
			$input = (int) 0;
			return $input;
		} else if(in_array($input, $trueArray, true)) {
			$input = (int) 1;
			return $input;
		} else {
		die("<b>Warning:</b> Invalid argument supplied at <b>Function:</b> ".__FUNCTION__." in <b>File:</b> ".__FILE__." on <b>Line:</b> ".__LINE__.". The argument can contain only
<pre>
+------------------+
| rel=\"\" Values  |      
+---------+--------+
|  false  |  true  |
|  FALSE  |  TRUE  |
|  0      |  1     |
+---------+--------+
| Default Value    |
+---------+--------+
|  false           |
+---------+--------+
</pre>");
		}
	}
/*
 ***************************************************************************
 *	Check for Valid States
 ***************************************************************************
*/
	function checkState($input) {
		// Full State Names Array
		$stateFullName = array("alabama", "alaska", "arizona", "arkansas", "california", "colorado", "connecticut", "delaware", "district of columbia", "florida", "georgia", "hawaii", "idaho", "illinois", "indiana", "iowa", "kansas", "kentucky", "louisiana", "maine", "maryland", "massachusetts", "michigan", "minnesota", "mississippi", "missouri", "montana", "nebraska", "nevada", "new hampshire", "new jersey", "new mexico", "new york", "north carolina", "north dakota", "ohio", "oklahoma", "oregon", "pennsylvania", "rhode island", "south carolina", "south dakota", "tennessee", "texas", "utah", "vermont", "virginia", "washington", "west virginia", "wisconsin", "wyoming", "national", "international");
		// Abbreviated State Names Array
		$stateAbbrName = array("ak", "al", "ar", "az", "ca", "co", "ct", "dc", "de", "fl", "ga", "hi", "ia", "id", "il", "in", "ks", "ky", "la", "ma", "md", "me", "mi", "mn", "mo", "ms", "mt", "nc", "nd", "ne", "nh", "nj", "nm", "nv", "ny", "oh", "ok", "or", "pa", "ri", "sc", "sd", "tn", "tx", "ut", "va", "vt", "wa", "wi", "wv", "wy", "na", "int");
		// If value is null, force national
		if($input == NULL) { $input = "national"; }
		// Scan arrays looking for acceptable values from input
		// Otherwise throw back error message
		if(in_array($input, $stateFullName, true)) {
			$key = array_search($input, $stateFullName);
			$convertToAbbr = $stateAbbrName[$key];
			$input = $convertToAbbr;
			return $input;
		} 
		if(in_array($input, $stateAbbrName, true)) {
			$key = array_search($input, $stateAbbrName);
			$input = $stateAbbrName[$key];
			return $input;
		} else {
			die("
			<b>Warning:</b> Invalid argument supplied at <b>Function:</b> ".__FUNCTION__." in <b>File:</b> ".__FILE__." on <b>Line:</b> ".__LINE__.". The argument can contain only
<pre>
+------------------------------------+--+------------------------------------+
| State Values                       										 |
+--------------------------+---------+--+------------------------------------+
|  'alabama'               |  'al'   |	|  'alaska'                |  'ak'   |
|  'arizona'               |  'az'   |	|  'arkansas'              |  'ar'   |
|  'california'            |  'ca'   |	|  'colorado'              |  'co'   |
|  'connecticut'           |  'ct'   |	|  'delaware'              |  'de'   |
|  'district of columbia'  |  'dc'   |	|  'florida'               |  'fl'   |
|  'georgia'               |  'ga'   |	|  'hawaii'                |  'hi'   |
|  'idaho'                 |  'id'   |	|  'illinois'              |  'il'   |
|  'indiana'               |  'in'   |	|  'iowa'                  |  'ia'   |
|  'kansas'                |  'ks'   |	|  'kentucky'              |  'ky'   |
|  'louisiana'             |  'la'   |	|  'maine'                 |  'me'   |
|  'maryland'              |  'md'   |	|  'massachusetts'         |  'ma'   |
|  'michigan'              |  'mi'   |	|  'minnesota'             |  'mn'   |
|  'mississippi'           |  'ms'   |	|  'missouri'              |  'mo'   |
|  'montana'               |  'mt'   |	|  'nebraska'              |  'ne'   |
|  'nevada'                |  'nv'   |	|  'new hampshire'         |  'nh'   |
|  'new jersey'            |  'nj'   |	|  'new mexico'            |  'nm'   |
|  'new york'              |  'ny'   |	|  'north carolina'        |  'nc'   |
|  'north dakota'          |  'nd'   |	|  'ohio'                  |  'oh'   |
|  'oklahoma'              |  'ok'   |	|  'oregon'                |  'or'   |
|  'pennsylvania'          |  'pa'   |	|  'rhode island'          |  'ri'   |
|  'south carolina'        |  'sc'   |	|  'south dakota'          |  'sd'   |
|  'tennessee'             |  'tn'   |	|  'texas'                 |  'tx'   |
|  'utah'                  |  'ut'   |	|  'vermont'               |  'vt'   |
|  'virginia'              |  'va'   |	|  'washington'            |  'wa'   |
|  'west virginia'         |  'wv'   |	|  'wisconsin'             |  'wi'   |
|  'wyoming'               |  'wy'   |	|						   |		 |
+--------------------------+---------+--+------------------------------------+
| Optional Values                   										 |
+--------------------------+---------+--+------------------------------------+
|  'national'              |  'na'   |	|  'international'         |  'int'  |
+--------------------------+---------+--+------------------------------------+
| Default Value                											     |
+--------------------------+---------+--+------------------------------------+
|  'na'                              |	|									 |
+--------------------------+---------+--+------------------------------------+
</pre>");
		}
    }
/*
 ***************************************************************************
 *	Retrieve File Size
 ***************************************************************************
*/
	function getFileSize($file) {
		$size = (filesize($file)/1024);
		($size > 1024) ? $ext = " Mb" : $ext = " kb";
		if($ext == " Mb") {
			$size = ($size/1024);
			$output = round($size,2).$ext;
		} else {
			$output = round($size).$ext;
		}
		return $output;	
	}
/*
 ***************************************************************************
 *	Retrieve Files with String Matched Cases
 ***************************************************************************
*/
	//This function will take a directory and an array of string matches for file
	// names and return the files with names that meet the string match criteria
	//
	// $dir          string    any full directory path (in quotes)
	// $strMatches   array     any values to compare individual file names against
	//

	function fileHarvester($dir, $strMatches) {
		
		if($handle = opendir($dir)) {
			while(false !== ($file = readdir($handle))) {
        		if ($file != "." && $file != ".." && $file != "index.html" && $file != "index.php" && $file != "_notes") {
					if($strMatches != NULL) { 
						$cnt = count($strMatches);
						for($i = 0; $i < $cnt; $i++) {
							if(strpos($file, $strMatches[$i]) !== false) {
								$checkpoint[$i] = "yes";	
							} else { 
								$checkpoint[$i] = "no";
							}
						}
						if(!in_array("no", $checkpoint)) {
							$matches[] = $file;	
						}
					} elseif($strMatches == NULL) {
						$matches[] = $file;
					}
				}
    		}
			closedir($handle);
		}
		return $matches;
	}
/* End of file general.inc.php */
/* Location: system/functions/general.inc.php */
?>
