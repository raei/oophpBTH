 <?php
// ===========================================================================================
//
// CDice.php
//
// Description: A class for a dice
//
// Author: Ralf Eriksson
//


class CDice {  
    
    
    private $iLastThrows = Array();

    // -------------------------------------------------------------------------------------------
    //
    // Throw a dice, return the value.
    //
    public function Roll() {
        return rand(1,6);
    }

    // -------------------------------------------------------------------------------------------
    //
    // Throw a dice repeatedly, return the value(s).
    //
     
    public function RollRepeatedly($aNumber) {
        $this->iLastThrows = Array();
        for($i=1; $i<=$aNumber; $i++) {
            $this->iLastThrows[$i] = $this->Roll();
        }        
        return $this->iLastThrows;
    }
  
    // -------------------------------------------------------------------------------------------
    //
    // Return an array of the last throws.
    //
    public function GetLastThrows() {
        return $this->iLastThrows;
    }

} // End of class
?> 