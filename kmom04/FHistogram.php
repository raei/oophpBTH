 <?php
// ===========================================================================================
//
// FHistogram.php
//
// Description: Functions for a histogram
//
// Author: Ralf Eriksson
//


// -------------------------------------------------------------------------------------------
//
// Returns a printable string, containing the key-value-pairs.
//
function histogramShowValues($anArray) {
    $s = "";
    foreach($anArray as $key => $value) {
        $s .= "{$key} => {$value}<br />";
    }
    return $s;
}


// -------------------------------------------------------------------------------------------
//
// Calculate and return the average of the values.
//
function histogramAverage($anArray) {
    return array_sum($anArray) / count($anArray);
}

// -------------------------------------------------------------------------------------------
//
// Calculate and return the average of the values.
//
function histogramPrintGraf($anArray) {
    
    $res = Array();
    
    // Calculate occurences for each key
    foreach($anArray as $key => $value) {
        @$res[$value] .= '*';
    }
    
    ksort($res);
    return histogramShowValues($res);
}

?> 
