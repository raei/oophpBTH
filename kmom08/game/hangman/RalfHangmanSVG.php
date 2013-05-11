<?php
// ===========================================================================================
//
// RalfHangmanSVG.php
//
// Class for drawing the hangman picture. Can draw parts of it.
// The picture is drawn using SVG Illustrator 6 (http://www.w3.org/Graphics/SVG/)
//

class RalfHangmanSVG {

    // ------------------------------------------------------------------------------------
    //
    // Internal variables
    //

    // ------------------------------------------------------------------------------------
    //
    // Constructor
    // Automatically called when the object is created.
    // http://se2.php.net/manual/en/language.oop5.decon.php
    //
    public function __construct() {
            ;
    }//end function __construct


    // ------------------------------------------------------------------------------------
    //
    // Destructor
    // Automatically called when the object is destroyed.
    // http://se2.php.net/manual/en/language.oop5.decon.php
    //
    public function __destruct() {
            ;
    }//end function __destruct

    // ------------------------------------------------------------------------------------
    //
    // Create the whole picture and return as string
    //
    public function DrawPicture() {        

        $hogerarm = $this->GetHogerArm();
        $vansterarm = $this->GetVansterArm();
        $vansterben = $this->GetVansterBen();
        $hogerben = $this->GetHogerBen();
        $kroppen = $this->GetKroppen();
        $huvud = $this->GetHuvud();
        $repet = $this->GetRepet();
        $stolpen = $this->GetStolpen();
        $kullen = $this->GetKullen();
        $header = $this->GetSvgHeader();

        $html = <<<EOD
                {$header}
                {$kullen}
                {$stolpen}
                {$kroppen} 
                {$hogerarm} 
                {$vansterarm} 
                {$vansterben} 
                {$hogerben}	
                {$repet} 		
                {$huvud}
                </svg>
EOD;

        return $html;
    }//end function DrawPicture

    // ------------------------------------------------------------------------------------
    //
    // Create a part of the picture and return as string
    //
    public function GetSVGHeader() {

        $html = <<<EOD
            <svg  
            xmlns="http://www.w3.org/2000/svg" 
            xmlns:xlink="http://www.w3.org/1999/xlink" 
            x="0px" y="0px" 
            version="1.1"
            width="250px" 
            height="235px" 
            viewBox="0 0 250 235" 
            enable-background="new 0 0 250 235" 
            xml:space="preserve">
EOD;
        return $html;
    }//end function GetSVGHeader

    // ------------------------------------------------------------------------------------
    //
    // Create the some parts of/whole picture and return as string
    //
    public function DrawPartsOfPicture($aNumberOfParts=9) {
        
        $html = $this->GetSvgHeader();
        switch ($aNumberOfParts) { 
            case 0:               
                return;
                break;
            case 1:                 
                $html .= $this->GetKullen();
                break;
            case 2:
                $html .= $this->GetKullen();
                $html .= $this->GetStolpen();
                break;
            case 3:
                $html .= $this->GetKullen();
                $html .= $this->GetStolpen();
                $html .= $this->GetRepet();
                break;
            case 4:
                $html .= $this->GetKullen();
                $html .= $this->GetStolpen();
                $html .= $this->GetRepet();
                $html .= $this->GetHuvud();
                break;
            case 5:
                $html .= $this->GetKullen();
                $html .= $this->GetStolpen();
                $html .= $this->GetRepet();
                $html .= $this->GetHuvud();                
                $html .= $this->GetKroppen();
                break;
            case 6:
                $html .= $this->GetKullen();
                $html .= $this->GetStolpen();
                $html .= $this->GetRepet();
                $html .= $this->GetHuvud();                
                $html .= $this->GetKroppen();
                $html .= $this->GetHogerArm();
                break;
            case 7:
                $html .= $this->GetKullen();
                $html .= $this->GetStolpen();
                $html .= $this->GetRepet();
                $html .= $this->GetHuvud();                
                $html .= $this->GetKroppen();
                $html .= $this->GetHogerArm();
                $html .= $this->GetVansterArm();
                break;
            case 8:
                $html .= $this->GetKullen();
                $html .= $this->GetStolpen();
                $html .= $this->GetRepet();
                $html .= $this->GetHuvud();                
                $html .= $this->GetKroppen();
                $html .= $this->GetHogerArm();
                $html .= $this->GetVansterArm();
                $html .= $this->GetHogerBen();
                break;
            case 9:
                $html .= $this->GetKullen();
                $html .= $this->GetStolpen();
                $html .= $this->GetRepet();
                $html .= $this->GetHuvud();                
                $html .= $this->GetKroppen();
                $html .= $this->GetHogerArm();
                $html .= $this->GetVansterArm();
                $html .= $this->GetHogerBen();
                $html .= $this->GetVansterBen(); 
                break;
        }//end switch
        
        $html .= "</svg>";

        return $html;            
    }//end function DrawPartsOfPicture

    // ------------------------------------------------------------------------------------
    //
    // Create a part of the picture and return as string
    //
    

    public function GetKullen() {

        $html = <<<EOD
        <!--HÄR KOMMER KULLEN -->
        <g id="kullen">
        <path fill="none" stroke="000" stroke-miterlimit="10" d="M230.454,219.226c0-35.229-47.579-63.737-106.379-63.737h4.04
        c-66.987,0-121.191,28.508-121.191,63.737"/>
        <line fill="none" stroke="#00632E" stroke-miterlimit="10" x1="9.051" y1="207.29" x2="3.333" y2="198.804"/>
        <line fill="none" stroke="#00632E" stroke-miterlimit="10" x1="13.208" y1="203.047" x2="19.941" y2="183.991"/>
        <line fill="none" stroke="#00632E" stroke-miterlimit="10" x1="22.186" y1="198.804" x2="25.594" y2="185.206"/>
        <line fill="none" stroke="#00632E" stroke-miterlimit="10" x1="31.611" y1="192.004" x2="32.06" y2="175.687"/>
        <line fill="none" stroke="#00632E" stroke-miterlimit="10" x1="41.486" y1="185.206" x2="41.486" y2="170.525"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="16.574" y1="207.29" x2="13.208" y2="198.899"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="25.594" y1="190.274" x2="25.594" y2="185.206"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="37.895" y1="187.74" x2="38.344" y2="170.525"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="13.208" y1="211.372" x2="9.051" y2="198.899"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="50.912" y1="183.846" x2="50.912" y2="164.241"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="55.401" y1="177.865" x2="68.417" y2="155.488"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="64.377" y1="175.687" x2="75.15" y2="164.241"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="79.639" y1="170.525" x2="87.089" y2="159.229"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="64.377" y1="187.357" x2="61.909" y2="177.865"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="59.889" y1="187.74" x2="58.093" y2="182.611"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="44.628" y1="193.519" x2="44.179" y2="183.991"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="35.202" y1="197.008" x2="33.855" y2="192.004"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="31.611" y1="203.047" x2="29.367" y2="198.899"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="25.594" y1="207.29" x2="23.89" y2="203.047"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="81.883" y1="185.206" x2="83.364" y2="179.133"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="97.144" y1="166.677" x2="98.49" y2="164.241"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="101.184" y1="164.241" x2="103.938" y2="156.755"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="89.514" y1="164.241" x2="94.451" y2="152.571"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="106.121" y1="160.499" x2="108.366" y2="152.571"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="75.15" y1="166.677" x2="81.883" y2="156.755"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="87.089" y1="179.133" x2="87.089" y2="175.687"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="75.15" y1="182.611" x2="75.15" y2="177.41"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="94.451" y1="177.41" x2="97.144" y2="174.043"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="129.91" y1="164.241" x2="136.867" y2="156.755"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="136.867" y1="166.677" x2="146.068" y2="161.717"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="143.825" y1="170.525" x2="153.7" y2="161.717"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="164.176" y1="164.241" x2="165.563" y2="156.536"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="136.867" y1="156.755" x2="136.867" y2="152.571"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="160.091" y1="159.229" x2="160.433" y2="155.488"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="167.896" y1="174.043" x2="173.492" y2="162.763"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="176.762" y1="177.41" x2="184.32" y2="166.677"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="146.068" y1="175.727" x2="153.7" y2="169.965"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="114.2" y1="197.008" x2="115.996" y2="185.206"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="91.983" y1="192.004" x2="97.817" y2="183.991"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="69.764" y1="198.804" x2="75.15" y2="193.519"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="102.561" y1="196.162" x2="98.49" y2="188.755"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="69.764" y1="198.804" x2="64.377" y2="191.106"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="50.912" y1="198.804" x2="55.401" y2="188.755"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="41.486" y1="205.136" x2="44.628" y2="198.804"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="72.457" y1="188.755" x2="75.15" y2="180.011"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="87.089" y1="192.004" x2="91.983" y2="175.687"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="124.075" y1="185.177" x2="124.075" y2="182.169"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="133.389" y1="185.206" x2="133.389" y2="174.043"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="148.763" y1="185.177" x2="148.763" y2="179.133"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="164.176" y1="182.154" x2="176.762" y2="174.043"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="179.51" y1="190.274" x2="189.384" y2="180.011"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="195.219" y1="194.505" x2="200.829" y2="188.755"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="208.909" y1="205.136" x2="214.969" y2="198.804"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="195.219" y1="182.611" x2="199.268" y2="175.687"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="202.485" y1="179.133" x2="208.909" y2="174.043"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="211.939" y1="187.74" x2="214.969" y2="183.991"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="220.58" y1="198.804" x2="226.413" y2="191.631"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="224.395" y1="205.169" x2="230.454" y2="200.974"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="162.228" y1="203.047" x2="164.176" y2="196.162"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="143.825" y1="199.604" x2="146.068" y2="192.004"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="129.91" y1="196.162" x2="129.91" y2="187.74"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="164.176" y1="188.755" x2="153.7" y2="183.672"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="180.542" y1="199.604" x2="180.542" y2="195.804"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="195.219" y1="203.095" x2="195.219" y2="199.604"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="211.939" y1="211.372" x2="220.58" y2="207.29"/>
        <line fill="none" stroke="#41A62A" stroke-miterlimit="10" x1="227.425" y1="213.166" x2="238.861" y2="207.29"/>
        </g>
EOD;
        return $html;
    }//end function GetKullen

    // ------------------------------------------------------------------------------------
    //
    // Create a part of the picture and return as string
    //
    public function GetStolpen() {

        $html = <<<EOD
        <!-- HÄR KOMMER STOLPEN -->
        <g id="stolpen">
        <line fill="none" stroke="#673B15" stroke-width="8" stroke-miterlimit="10" x1="114.649" y1="9.386" x2="206.216" y2="9.386"/>
        <line fill="none" stroke="#673B15" stroke-width="2" stroke-miterlimit="10" x1="120.036" y1="46.626" x2="159.652" y2="9.386"/>
        <line fill="#B07F48" stroke="#673B15" stroke-width="8" stroke-miterlimit="10" x1="120.036" y1="175.687" x2="120.036" y2="14.772"/>
        </g>
EOD;
        return $html;
    }//end function GetStolpen

    // ------------------------------------------------------------------------------------
    //
    // Create a part of the picture and return as string
    //
    public function GetRepet() {

        $html = <<<EOD
        <!-- HÃR KOMMER REPET -->  
        <g id="repet">
        <line fill="#B8CB0C" stroke="#FFF" stroke-width="2" stroke-miterlimit="10" x1="200.829" y1="4" x2="200.829" y2="45.744"/>
        </g>
EOD;
        return $html;
    }//end function GetRepet

    // ------------------------------------------------------------------------------------
    //
    // Create a part of the picture and return as string
    //
    public function GetHuvud() {

        $html = <<<EOD
        <!-- HÄR KOMMER HUVUDET -->  
        <g id="huvud">
        <ellipse fill="none" stroke="#FFF" stroke-miterlimit="10" cx="201.107" cy="59.149" rx="11.376" ry="14.14"/>
        <ellipse fill="none" stroke="#FFF" stroke-miterlimit="10" cx="196.243" cy="53.595" rx="2.024" ry="2.413"/>
        <ellipse fill="none" stroke="#FFF" stroke-miterlimit="10" cx="204.322" cy="53.595" rx="2.024" ry="2.413"/>
        <path fill="none" stroke="#FFF" stroke-miterlimit="10" d="M194.896,65.322c0-1.737,2.206-3.143,4.934-3.143"/>
        <path fill="none" stroke="#FFF" stroke-miterlimit="10" d="M203.869,65.322c0-1.737-2.206-3.143-4.934-3.143"/>
        <ellipse fill="none" stroke="#FFF" stroke-miterlimit="10" cx="199.872" cy="57.654" rx="1.614" ry="1.085"/>
        </g>
EOD;
        return $html;
    }//end function GetHuvud

    // ------------------------------------------------------------------------------------
    //
    // Create a part of the picture and return as string
    //
    public function GetKroppen() {

        $html = <<<EOD
        <!-- HÄR KOMMER KROPPEN -->
        <g id="kroppen">
        <ellipse fill="none" stroke="#FFF" stroke-miterlimit="10" cx="200.839" cy="97.527" rx="15.149" ry="24.238"/>
        </g>
EOD;
        return $html;
    }//end function GetKroppen

    // ------------------------------------------------------------------------------------
    //
    // Create a part of the picture and return as string
    //
    public function GetVansterArm() {

        $html = <<<EOD
        <!-- HÄR KOMMER VÄNSTER ARM -->  
        <g id="vansterarm">
        <line fill="none" stroke="#FFF" stroke-miterlimit="10" x1="188.384" y1="83.737" x2="168.635" y2="101.903"/>
        <line fill="none" stroke="#FFF" stroke-miterlimit="10" x1="163.176" y1="100.557" x2="168.82" y2="101.23"/>
        <line fill="none" stroke="#FFF" stroke-miterlimit="10" x1="169.228" y1="102.622" x2="164.563" y2="105.362"/>
        <line fill="none" stroke="#FFF" stroke-miterlimit="10" x1="169.532" y1="102.339" x2="170.206" y2="107.986"/>
        </g>
EOD;
        return $html;
    }//end function GetVansterArm

    // ------------------------------------------------------------------------------------
    //
    // Create a part of the picture and return as string
    //
    public function GetHogerArm() {

        $html = <<<EOD
        <!-- HÄR KOMMER HÖGER ARM -->
        <g id="hogerarm">
        <line fill="none" stroke="#FFF" stroke-miterlimit="10" x1="213.969" y1="85.083" x2="232.82" y2="102.576"/>
        <line fill="none" stroke="#FFF" stroke-miterlimit="10" x1="232.82" y1="103.239" x2="232.148" y2="109.208"/>
        <line fill="none" stroke="#FFF" stroke-miterlimit="10" x1="232.739" y1="103.135" x2="237.167" y2="105.666"/>
        <line fill="none" stroke="#FFF" stroke-miterlimit="10" x1="234.004" y1="103.119" x2="237.861" y2="100.07"/>
        </g>
EOD;
        return $html;
    } //end function GetHogerArm

    // ------------------------------------------------------------------------------------
    //
    // Create a part of the picture and return as string
    //
    public function GetVansterBen() {

        $html = <<<EOD
        <!-- HÄR KOMMER VÄNSTER BEN -->  
        <g id="vansterben">
        <polyline fill="none" stroke="#FFF" stroke-miterlimit="10" points="175.762,142.935 186.867,145.705 185.69,144.657 
        195.79,120.418 	"/>
        </g>
EOD;
        return $html;
    }//end function GetVansterBen

    // ------------------------------------------------------------------------------------
    //
    // Create a part of the picture and return as string
    //
    public function GetHogerBen() {

        $html = <<<EOD
        <!-- HÃR KOMMER HÖGER BEN -->  
        <g id="hogerben">
        <polyline fill="none" stroke="#FFF" stroke-miterlimit="10" points="225.413,142.935 214.307,145.705 215.483,144.657 
        205.385,120.418 "/>
        </g>

EOD;
        return $html;
    }//end function GetHogerBen

    public function DrawHuvud() {            
        $html = $this->GetHuvud();
        return $html;            
    }//end function DrawHuvud
} // End of class
?>