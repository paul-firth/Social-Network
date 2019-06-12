<?php
/* Functions for PM database example. */

/* Load sample data, an array of associative arrays. */
include "pms.php";

/* Search sample data for $name or $year or $state from form. */
function search($query) {
    global $pms; 
    
    if (!empty($query)) {
		$results = array();
		foreach ($pms as $pm) {
		    if (stripos($pm['name'], $query) !== FALSE || stripos($pm['from'], $query) !== FALSE || stripos($pm['too'], $query) !== FALSE || stripos($pm['state'], $query) !== FALSE) {
				$results[] = $pm;
		    }
	}
	$pms = $results;
    }
	return $pms;
	
}
?>
