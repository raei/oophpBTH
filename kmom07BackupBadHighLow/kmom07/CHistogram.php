<?php

// ===========================================================================================
//
// CHistogram.php
//
// Description: A class for a histogram
//
// Author: Ralf Eriksson
//



class CHistogram {// Start of class
 
    // Alla funktionerna följer inom klassdefinitionen
    
    // -------------------------------------------------------------------------------------------
    //
    // Returns a printable string, containing the key-value-pairs.
    //
    public function ShowValues($anArray) {
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
    public function Average($anArray) {
        return array_sum($anArray) / count($anArray);
    }


    // -------------------------------------------------------------------------------------------
    //
    // Calculate and return the average of the values.
    //
    public function PrintGraf($anArray) {
    
        $res = Array();
    
        // Calculate occurences for each key
        foreach($anArray as $key => $value) {
            @$res[$value] .= '*';
        }
    
        ksort($res);
        return $this->ShowValues($res);
    }
 
 
} // End of class
?>
