<?php
// ===========================================================================================
//
// CDiceSvg.php 
//
// Description: A class for a dice with a graphical representation.
//
// Author: Ralf Eriksson
//

require_once("CDice.php");

class CDiceSvg extends CDice {  

    // -------------------------------------------------------------------------------------------
    //
    // Member variables
    //
    private $iScale     = 0.40;
    private $iWidth     = 250;
    private $iHeight    = 250;

    
    // -------------------------------------------------------------------------------------------
    //
    // Return a string with the Svg-representation of the dice
    //
    public function GetSvg($aDice) {

        $html = $this->GetSvgHeader();
        
        switch($aDice) {
            case '1': $html .= $this->GetDice1(); break;
            case '2': $html .= $this->GetDice2(); break;
            case '3': $html .= $this->GetDice3(); break;
            case '4': $html .= $this->GetDice4(); break;
            case '5': $html .= $this->GetDice5(); break;
            case '6': $html .= $this->GetDice6(); break;
            case '7': $html .= $this->StartDice(); break;
        }
        
        $html .= "</svg>";
                
        return $html;
    }


    // ------------------------------------------------------------------------------------
    //
    // Create the Svg header
    //
    public function GetSVGHeader() {
        
    $html = <<<EOD
    <svg 
         baseProfile="full"
         xmlns="http://www.w3.org/2000/svg"
         xmlns:xlink="http://www.w3.org/1999/xlink"
         xmlns:ev="http://www.w3.org/2001/xml-events"
             width="{$this->iWidth}"
       height="{$this->iHeight}"
       id="dice">
      <defs
         id="defs1">
       </defs>
EOD;

        return $html;
    }

    
    // ------------------------------------------------------------------------------------
    //
    // Create a part of the picture and return as string
    //
    public function GetDice1() {
        /*
        $html = <<<EOD
        <!-- Here is dice 1 -->
        <g id="dice1">
              <g transform="scale({$this->iScale})">
                  <path style="fill:#FFF;stroke:#000;stroke-width:7;" d="M71.4594727,553.5C34.0805664,553.5,3.5,522.9189453,3.5,485.5400391
                      V71.4594727C3.5,34.0820312,34.0805664,3.5,71.4594727,3.5h414.0805664C522.9179688,3.5,553.5,34.0820312,553.5,71.4594727
                      v414.0805664C553.5,522.9189453,522.9179688,553.5,485.5400391,553.5H71.4594727z"/>
                  <circle style="fill:#000;stroke:#000;stroke-width:5;" cx="278.5" cy="278.5" r="57.1152344"/> 
              </g>
        </g>*/
        
        $html = <<<EOD
                
               <?xml version="1.0" encoding="UTF-8" standalone="no"?>
<!-- Created with Inkscape (http://www.inkscape.org/) -->

<svg
   xmlns:dc="http://purl.org/dc/elements/1.1/"
   xmlns:cc="http://creativecommons.org/ns#"
   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
   xmlns:svg="http://www.w3.org/2000/svg"
   xmlns="http://www.w3.org/2000/svg"
   xmlns:xlink="http://www.w3.org/1999/xlink"
   xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
   xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
   width="200"
   height="196.24298"
   id="svg6450"
   version="1.1"
   inkscape:version="0.48.4 r9939"
   sodipodi:docname="diceOneCopy.svg">
  <metadata
     id="metadata22024">
    <rdf:RDF>
      <cc:Work
         rdf:about="">
        <dc:format>image/svg+xml</dc:format>
        <dc:type
           rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
        <dc:title></dc:title>
      </cc:Work>
    </rdf:RDF>
  </metadata>
  <defs
     id="defs6452">
    <inkscape:perspective
       sodipodi:type="inkscape:persp3d"
       inkscape:vp_x="0 : 526.18109 : 1"
       inkscape:vp_y="0 : 1000 : 0"
       inkscape:vp_z="744.09448 : 526.18109 : 1"
       inkscape:persp3d-origin="372.04724 : 350.78739 : 1"
       id="perspective6458" />
    <inkscape:perspective
       id="perspective6405"
       inkscape:persp3d-origin="0.5 : 0.33333333 : 1"
       inkscape:vp_z="1 : 0.5 : 1"
       inkscape:vp_y="0 : 1000 : 0"
       inkscape:vp_x="0 : 0.5 : 1"
       sodipodi:type="inkscape:persp3d" />
    <filter
       color-interpolation-filters="sRGB"
       inkscape:collect="always"
       id="filter10343">
      <feGaussianBlur
         inkscape:collect="always"
         stdDeviation="0.74285713"
         id="feGaussianBlur10345" />
    </filter>
    <linearGradient
       inkscape:collect="always"
       xlink:href="#linearGradient9356"
       id="linearGradient6387"
       gradientUnits="userSpaceOnUse"
       gradientTransform="translate(-156.86107,344.60697)"
       x1="264.28571"
       y1="573.26208"
       x2="264.28571"
       y2="649.31946" />
    <linearGradient
       inkscape:collect="always"
       id="linearGradient9356">
      <stop
         style="stop-color:#f9f8f8;stop-opacity:1"
         offset="0"
         id="stop9358" />
      <stop
         id="stop9364"
         offset="0.07006675"
         style="stop-color:#ececec;stop-opacity:1" />
      <stop
         style="stop-color:#e8e7e7;stop-opacity:1"
         offset="0.93328261"
         id="stop9366" />
      <stop
         style="stop-color:#b4b3b4;stop-opacity:1"
         offset="1"
         id="stop9360" />
    </linearGradient>
    <linearGradient
       inkscape:collect="always"
       xlink:href="#linearGradient9376"
       id="linearGradient6389"
       gradientUnits="userSpaceOnUse"
       gradientTransform="translate(-156.86107,344.60697)"
       x1="248.757"
       y1="634.69067"
       x2="249.81441"
       y2="664.505" />
    <linearGradient
       inkscape:collect="always"
       id="linearGradient9376">
      <stop
         style="stop-color:#dad9d9;stop-opacity:1;"
         offset="0"
         id="stop9378" />
      <stop
         id="stop9384"
         offset="0.27966022"
         style="stop-color:#dad9d9;stop-opacity:1" />
      <stop
         style="stop-color:#000000;stop-opacity:1"
         offset="1"
         id="stop9380" />
    </linearGradient>
    <radialGradient
       inkscape:collect="always"
       xlink:href="#linearGradient9498"
       id="radialGradient6391"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(1,0,0,0.84931512,0,14.207706)"
       cx="103.59114"
       cy="94.287537"
       fx="103.59114"
       fy="94.287537"
       r="25.809397" />
    <linearGradient
       inkscape:collect="always"
       id="linearGradient9498">
      <stop
         style="stop-color:#ffffff;stop-opacity:1;"
         offset="0"
         id="stop9500" />
      <stop
         style="stop-color:#ffffff;stop-opacity:0;"
         offset="1"
         id="stop9502" />
    </linearGradient>
    <filter
       color-interpolation-filters="sRGB"
       inkscape:collect="always"
       id="filter9518">
      <feGaussianBlur
         inkscape:collect="always"
         stdDeviation="0.71376063"
         id="feGaussianBlur9520" />
    </filter>
    <radialGradient
       inkscape:collect="always"
       xlink:href="#linearGradient9498"
       id="radialGradient6393"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(1,0,0,0.84931512,0,14.207706)"
       cx="103.59114"
       cy="94.287537"
       fx="103.59114"
       fy="94.287537"
       r="25.809397" />
    <linearGradient
       inkscape:collect="always"
       xlink:href="#linearGradient9462"
       id="linearGradient6395"
       gradientUnits="userSpaceOnUse"
       x1="72.832001"
       y1="20.394878"
       x2="72.832001"
       y2="36.658333" />
    <linearGradient
       inkscape:collect="always"
       id="linearGradient9462">
      <stop
         style="stop-color:#a40000;stop-opacity:1"
         offset="0"
         id="stop9464" />
      <stop
         style="stop-color:#ef2929;stop-opacity:1"
         offset="1"
         id="stop9466" />
    </linearGradient>
  </defs>
  <sodipodi:namedview
     id="base"
     pagecolor="#ffffff"
     bordercolor="#666666"
     borderopacity="1.0"
     inkscape:pageopacity="0.0"
     inkscape:pageshadow="2"
     inkscape:zoom="0.35"
     inkscape:cx="-390.41348"
     inkscape:cy="71.126403"
     inkscape:document-units="px"
     inkscape:current-layer="layer1"
     showgrid="false"
     inkscape:window-width="1366"
     inkscape:window-height="706"
     inkscape:window-x="-8"
     inkscape:window-y="-8"
     inkscape:window-maximized="1"
     fit-margin-top="0"
     fit-margin-left="0"
     fit-margin-right="0"
     fit-margin-bottom="0"
     showborder="false"
     inkscape:showpageshadow="false" />
  <g
     inkscape:label="Capa 1"
     inkscape:groupmode="layer"
     id="layer1"
     transform="translate(-740.41348,-281.27931)">
    <g
       id="g10389"
       transform="matrix(2.5064772,0,0,2.5064772,566.1418,-2020.2948)">
      <rect
         style="opacity:0.72244903;fill:#888a85;fill-opacity:1;stroke:#888a85;stroke-width:0.44291338;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none;filter:url(#filter10343)"
         id="rect10391"
         width="74.285713"
         height="74.285713"
         x="73.031769"
         y="920.25488"
         ry="14.818748"
         rx="14.818748" />
      <rect
         ry="14.818748"
         y="918.75488"
         x="70.281769"
         height="74.285713"
         width="74.285713"
         id="rect10393"
         style="fill:url(#linearGradient6387);fill-opacity:1;stroke:url(#linearGradient6389);stroke-width:0.44291338;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none"
         rx="14.818748" />
      <path
         sodipodi:type="arc"
         style="opacity:0.76326533;fill:url(#radialGradient6391);fill-opacity:1;stroke:none;filter:url(#filter9518)"
         id="path10395"
         sodipodi:cx="103.59114"
         sodipodi:cy="94.287537"
         sodipodi:rx="25.809397"
         sodipodi:ry="21.920311"
         d="m 129.40054,94.287537 c 0,12.106253 -11.55526,21.920313 -25.8094,21.920313 -14.254135,0 -25.809396,-9.81406 -25.809396,-21.920313 0,-12.106254 11.555261,-21.920311 25.809396,-21.920311 14.25414,0 25.8094,9.814057 25.8094,21.920311 z"
         transform="matrix(0.85722043,0,0,0.54843965,4.3208718,879.77879)" />
      <path
         transform="matrix(0.35622593,0,0,0.43953684,96.878109,941.41108)"
         d="m 129.40054,94.287537 c 0,12.106253 -11.55526,21.920313 -25.8094,21.920313 -14.254135,0 -25.809396,-9.81406 -25.809396,-21.920313 0,-12.106254 11.555261,-21.920311 25.809396,-21.920311 14.25414,0 25.8094,9.814057 25.8094,21.920311 z"
         sodipodi:ry="21.920311"
         sodipodi:rx="25.809397"
         sodipodi:cy="94.287537"
         sodipodi:cx="103.59114"
         id="path10397"
         style="opacity:0.76326533;fill:url(#radialGradient6393);fill-opacity:1;stroke:none;filter:url(#filter9518)"
         sodipodi:type="arc" />
      <path
         sodipodi:type="arc"
         style="fill:url(#linearGradient6395);fill-opacity:1;stroke:none"
         id="path10399"
         sodipodi:cx="72.832001"
         sodipodi:cy="28.526606"
         sodipodi:rx="8.1317282"
         sodipodi:ry="8.1317282"
         d="m 80.963729,28.526606 c 0,4.491029 -3.640699,8.131728 -8.131728,8.131728 -4.49103,0 -8.131728,-3.640699 -8.131728,-8.131728 0,-4.49103 3.640698,-8.131729 8.131728,-8.131729 4.491029,0 8.131728,3.640699 8.131728,8.131729 z"
         transform="matrix(0.87675745,0,0,0.87675745,43.568626,930.88683)" />
      <path
         style="fill:#ffffff;fill-opacity:1;stroke:none"
         d="m 100.3263,956.68402 c -0.0243,0.23968 -0.0238,0.4673 -0.0238,0.7134 0,3.93754 3.17267,7.13399 7.11021,7.13399 3.93755,0 7.13401,-3.19645 7.13401,-7.13399 0,-0.2461 5.5e-4,-0.47372 -0.0237,-0.7134 -0.39709,3.56154 -3.44272,6.32547 -7.11023,6.32547 -3.6675,0 -6.68935,-2.76393 -7.08643,-6.32547 z"
         id="path10413"
         inkscape:connector-curvature="0" />
    </g>
  </g>
</svg>             
              
EOD;

        return $html;
    }
    

        // ------------------------------------------------------------------------------------
    //
    // Create a part of the picture and return as string
    //
    public function GetDice2() {
        
      /*  $html = <<<EOD
                /*
   <!-- Here is dice 2 -->
  <g id="dice2">
        <g transform="scale({$this->iScale})">
        <path style="fill:#FFF;stroke:#000;stroke-width:7;" d="M553.5,485.5400391
                C553.5,522.9189453,522.9179688,553.5,485.5390625,553.5H71.4589844C34.0820312,553.5,3.5,522.9199219,3.5,485.5410156
                V71.4599609C3.5,34.0820312,34.0820312,3.5,71.4589844,3.5h414.0800781C522.9179688,3.5,553.5,34.0820312,553.5,71.4599609
                V485.5400391z"/>
             <circle style="fill:#000;stroke:#000;stroke-width:5;" cx="439.9746094" cy="439.9736328" r="57.1152344"/> 
            <circle style="fill:#000;stroke:#000;stroke-width:5;" cx="117.0258789" cy ="117.0263672" r="57.1147461"/> 
            
        </g>
  </g>
        
        <?xml version="1.0" encoding="UTF-8" standalone="no"?>
<!-- Created with Inkscape (http://www.inkscape.org/) -->
*/
$html = <<<EOD
        <?xml version="1.0" encoding="UTF-8" standalone="no"?>
<!-- Created with Inkscape (http://www.inkscape.org/) -->

<svg
   xmlns:dc="http://purl.org/dc/elements/1.1/"
   xmlns:cc="http://creativecommons.org/ns#"
   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
   xmlns:svg="http://www.w3.org/2000/svg"
   xmlns="http://www.w3.org/2000/svg"
   xmlns:xlink="http://www.w3.org/1999/xlink"
   version="1.1"
   width="200.02678"
   height="196.21823"
   id="svg6450">
  <defs
     id="defs6452">
    <linearGradient
       x1="264.28571"
       y1="573.26208"
       x2="264.28571"
       y2="649.31946"
       id="linearGradient6387"
       xlink:href="#linearGradient9356"
       gradientUnits="userSpaceOnUse"
       gradientTransform="translate(-156.86107,344.60697)" />
    <linearGradient
       id="linearGradient9356">
      <stop
         id="stop9358"
         style="stop-color:#f9f8f8;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9364"
         style="stop-color:#ececec;stop-opacity:1"
         offset="0.07006675" />
      <stop
         id="stop9366"
         style="stop-color:#e8e7e7;stop-opacity:1"
         offset="0.93328261" />
      <stop
         id="stop9360"
         style="stop-color:#b4b3b4;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="248.757"
       y1="634.69067"
       x2="249.81441"
       y2="664.505"
       id="linearGradient6389"
       xlink:href="#linearGradient9376"
       gradientUnits="userSpaceOnUse"
       gradientTransform="translate(-156.86107,344.60697)" />
    <linearGradient
       id="linearGradient9376">
      <stop
         id="stop9378"
         style="stop-color:#dad9d9;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9384"
         style="stop-color:#dad9d9;stop-opacity:1"
         offset="0.27966022" />
      <stop
         id="stop9380"
         style="stop-color:#000000;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <radialGradient
       cx="103.59114"
       cy="94.287537"
       r="25.809397"
       fx="103.59114"
       fy="94.287537"
       id="radialGradient6391"
       xlink:href="#linearGradient9498"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(1,0,0,0.84931512,0,14.207706)" />
    <linearGradient
       id="linearGradient9498">
      <stop
         id="stop9500"
         style="stop-color:#ffffff;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9502"
         style="stop-color:#ffffff;stop-opacity:0"
         offset="1" />
    </linearGradient>
    <radialGradient
       cx="103.59114"
       cy="94.287537"
       r="25.809397"
       fx="103.59114"
       fy="94.287537"
       id="radialGradient6393"
       xlink:href="#linearGradient9498"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(1,0,0,0.84931512,0,14.207706)" />
    <linearGradient
       x1="72.832001"
       y1="20.394878"
       x2="72.832001"
       y2="36.658333"
       id="linearGradient6395"
       xlink:href="#linearGradient9462"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       id="linearGradient9462">
      <stop
         id="stop9464"
         style="stop-color:#a40000;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9466"
         style="stop-color:#ef2929;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="264.28571"
       y1="573.26208"
       x2="264.28571"
       y2="649.31946"
       id="linearGradient6311"
       xlink:href="#linearGradient9356-5"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(4,0,0,4,-783.13173,-2030.3009)" />
    <linearGradient
       id="linearGradient9356-5">
      <stop
         id="stop9358-1"
         style="stop-color:#f9f8f8;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9364-4"
         style="stop-color:#ececec;stop-opacity:1"
         offset="0.07006675" />
      <stop
         id="stop9366-2"
         style="stop-color:#e8e7e7;stop-opacity:1"
         offset="0.93328261" />
      <stop
         id="stop9360-0"
         style="stop-color:#b4b3b4;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="248.757"
       y1="634.69067"
       x2="249.81441"
       y2="664.505"
       id="linearGradient6313"
       xlink:href="#linearGradient9376-4"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(4,0,0,4,-783.13173,-2030.3009)" />
    <linearGradient
       id="linearGradient9376-4">
      <stop
         id="stop9378-1"
         style="stop-color:#dad9d9;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9384-4"
         style="stop-color:#dad9d9;stop-opacity:1"
         offset="0.27966022" />
      <stop
         id="stop9380-6"
         style="stop-color:#000000;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="264.28571"
       y1="573.26208"
       x2="264.28571"
       y2="649.31946"
       id="linearGradient6584"
       xlink:href="#linearGradient9356-5"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(4,0,0,4,-707.14278,-2038.767)" />
    <linearGradient
       x1="248.757"
       y1="634.69067"
       x2="249.81441"
       y2="664.505"
       id="linearGradient6586"
       xlink:href="#linearGradient9376-4"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(4,0,0,4,-707.14278,-2038.767)" />
    <linearGradient
       x1="72.832001"
       y1="20.394878"
       x2="72.832001"
       y2="36.658333"
       id="linearGradient6379"
       xlink:href="#linearGradient9462-5"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       id="linearGradient9462-5">
      <stop
         id="stop9464-2"
         style="stop-color:#a40000;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9466-3"
         style="stop-color:#ef2929;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="72.832001"
       y1="20.394878"
       x2="72.832001"
       y2="36.658333"
       id="linearGradient6381"
       xlink:href="#linearGradient9462-5"
       gradientUnits="userSpaceOnUse" />
    <radialGradient
       cx="103.59114"
       cy="94.287537"
       r="25.809397"
       fx="103.59114"
       fy="94.287537"
       id="radialGradient6383"
       xlink:href="#linearGradient9498-2"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(1,0,0,0.84931512,0,14.207706)" />
    <linearGradient
       id="linearGradient9498-2">
      <stop
         id="stop9500-1"
         style="stop-color:#ffffff;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9502-6"
         style="stop-color:#ffffff;stop-opacity:0"
         offset="1" />
    </linearGradient>
    <filter
       color-interpolation-filters="sRGB"
       id="filter9518-9">
      <feGaussianBlur
         id="feGaussianBlur9520-2"
         stdDeviation="0.71376063" />
    </filter>
    <radialGradient
       cx="103.59114"
       cy="94.287537"
       r="25.809397"
       fx="103.59114"
       fy="94.287537"
       id="radialGradient6385"
       xlink:href="#linearGradient9498-2"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(1,0,0,0.84931512,0,14.207706)" />
    <linearGradient
       x1="264.28571"
       y1="573.26208"
       x2="264.28571"
       y2="649.31946"
       id="linearGradient6311-7"
       xlink:href="#linearGradient9356-50"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(2.5064772,0,0,2.5064772,-377.02689,-1071.0829)" />
    <linearGradient
       id="linearGradient9356-50">
      <stop
         id="stop9358-8"
         style="stop-color:#f9f8f8;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9364-0"
         style="stop-color:#ececec;stop-opacity:1"
         offset="0.07006675" />
      <stop
         id="stop9366-7"
         style="stop-color:#e8e7e7;stop-opacity:1"
         offset="0.93328261" />
      <stop
         id="stop9360-3"
         style="stop-color:#b4b3b4;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="248.757"
       y1="634.69067"
       x2="249.81441"
       y2="664.505"
       id="linearGradient6313-6"
       xlink:href="#linearGradient9376-40"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(2.5064772,0,0,2.5064772,-377.02689,-1071.0829)" />
    <linearGradient
       id="linearGradient9376-40">
      <stop
         id="stop9378-8"
         style="stop-color:#dad9d9;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9384-5"
         style="stop-color:#dad9d9;stop-opacity:1"
         offset="0.27966022" />
      <stop
         id="stop9380-5"
         style="stop-color:#000000;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <filter
       color-interpolation-filters="sRGB"
       id="filter10343-3">
      <feGaussianBlur
         id="feGaussianBlur10345-0"
         stdDeviation="0.74285713" />
    </filter>
  </defs>
  <g
     transform="translate(-190.41347,-366.74708)"
     id="layer1">
    <rect
       width="74.285713"
       height="74.285713"
       rx="14.818749"
       ry="14.818749"
       x="96.107147"
       y="683.7193"
       transform="matrix(2.5064772,0,0,2.5064772,-41.696109,-1341.9614)"
       id="rect10549"
       style="opacity:0.72244903;fill:#888a85;fill-opacity:1;stroke:#888a85;stroke-width:0.44291338;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none;filter:url(#filter10343-3)" />
    <rect
       width="186.19545"
       height="186.19545"
       rx="37.142857"
       ry="37.142857"
       x="192.30145"
       y="368.00562"
       id="rect10551"
       style="fill:url(#linearGradient6311-7);fill-opacity:1;stroke:url(#linearGradient6313-6);stroke-width:1.11015224;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none" />
    <path
       d="m 129.40054,94.287537 a 25.809397,21.920311 0 1 1 -51.618796,0 25.809397,21.920311 0 1 1 51.618796,0 z"
       transform="matrix(2.1486035,0,0,1.3746515,26.971959,270.313)"
       id="path10553"
       style="opacity:0.76326533;fill:url(#radialGradient6385);fill-opacity:1;stroke:none;filter:url(#filter9518-9)" />
    <path
       d="m 129.40054,94.287537 a 25.809397,21.920311 0 1 1 -51.618796,0 25.809397,21.920311 0 1 1 51.618796,0 z"
       transform="matrix(0.89287215,0,0,1.1016891,258.96455,424.79293)"
       id="path10555"
       style="opacity:0.76326533;fill:url(#radialGradient6383);fill-opacity:1;stroke:none;filter:url(#filter9518-9)" />
    <path
       d="m 80.963729,28.526606 a 8.1317282,8.1317282 0 1 1 -16.263456,0 8.1317282,8.1317282 0 1 1 16.263456,0 z"
       transform="matrix(2.1975725,0,0,2.1975725,180.48806,338.25868)"
       id="path10565"
       style="fill:url(#linearGradient6381);fill-opacity:1;stroke:none" />
    <path
       d="m 80.963729,28.526606 a 8.1317282,8.1317282 0 1 1 -16.263456,0 8.1317282,8.1317282 0 1 1 16.263456,0 z"
       transform="matrix(2.1975725,0,0,2.1975725,70.203057,453.55663)"
       id="path10567"
       style="fill:url(#linearGradient6379);fill-opacity:1;stroke:none" />
    <path
       d="m 212.46489,518.2167 c -0.0609,0.60075 -0.0597,1.17128 -0.0597,1.78812 0,9.86936 7.95223,17.88119 17.82159,17.88119 9.86938,0 17.88123,-8.01183 17.88123,-17.88119 0,-0.61684 0.001,-1.18737 -0.0594,-1.78812 -0.99532,8.92692 -8.6291,15.85465 -17.82163,15.85465 -9.19254,0 -16.76673,-6.92773 -17.76198,-15.85465 z"
       id="path10579"
       style="fill:#ffffff;fill-opacity:1;stroke:none" />
    <path
       d="m 322.74986,402.91875 c -0.0609,0.60075 -0.0597,1.17128 -0.0597,1.78812 0,9.86936 7.9522,17.88119 17.82156,17.88119 9.86938,0 17.88125,-8.01183 17.88125,-17.88119 0,-0.61684 0,-1.18737 -0.0595,-1.78812 -0.99532,8.92692 -8.62912,15.85465 -17.82165,15.85465 -9.1925,0 -16.7667,-6.92773 -17.76197,-15.85465 z"
       id="path10583"
       style="fill:#ffffff;fill-opacity:1;stroke:none" />
  </g>
</svg>
    

    
EOD;

        return $html;
    }
    
    // ------------------------------------------------------------------------------------
    //
    // Create a part of the picture and return as string
    //
    public function GetDice3() {
        
     /*
        $html = <<<EOD
  <!-- Here is dice 3 -->
  <g id="dice3">
        <g transform="scale({$this->iScale})">
        <path style="fill:#FFF;stroke:#000;stroke-width:7;" d="M553.5,485.5400391
                C553.5,522.9189453,522.9179688,553.5,485.5390625,553.5H71.4589844C34.0820312,553.5,3.5,522.9199219,3.5,485.5410156
                V71.4599609C3.5,34.0820312,34.0820312,3.5,71.4589844,3.5h414.0800781C522.9179688,3.5,553.5,34.0820312,553.5,71.4599609
                V485.5400391z"/>
            <circle style="fill:#000;stroke:#000;stroke-width:5;" cx="439.9746094" cy="439.9736328" r="57.1152344"/> 
            <circle style="fill:#000;stroke:#000;stroke-width:5;" cx="117.0258789" cy="117.0263672" r="57.1147461"/>             
            <circle style="fill:#000;stroke:#000;stroke-width:5;" cx="278.5" cy="278.5" r="57.1152344"/> 
        </g>
  </g>
      * 
      */
      $html = <<<EOD
              
        <?xml version="1.0" encoding="UTF-8" standalone="no"?>
<!-- Created with Inkscape (http://www.inkscape.org/) -->

     
<svg
   xmlns:dc="http://purl.org/dc/elements/1.1/"
   xmlns:cc="http://creativecommons.org/ns#"
   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
   xmlns:svg="http://www.w3.org/2000/svg"
   xmlns="http://www.w3.org/2000/svg"
   xmlns:xlink="http://www.w3.org/1999/xlink"
   version="1.1"
   width="200.02678"
   height="196.21823"
   id="svg6864">
  <defs
     id="defs6866">
    <linearGradient
       x1="72.832001"
       y1="20.394878"
       x2="72.832001"
       y2="36.658333"
       id="linearGradient6369"
       xlink:href="#linearGradient9462"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       id="linearGradient9462">
      <stop
         id="stop9464"
         style="stop-color:#a40000;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9466"
         style="stop-color:#ef2929;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="72.832001"
       y1="20.394878"
       x2="72.832001"
       y2="36.658333"
       id="linearGradient6371"
       xlink:href="#linearGradient9462"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       x1="72.832001"
       y1="20.394878"
       x2="72.832001"
       y2="36.658333"
       id="linearGradient6373"
       xlink:href="#linearGradient9462"
       gradientUnits="userSpaceOnUse" />
    <radialGradient
       cx="103.59114"
       cy="94.287537"
       r="25.809397"
       fx="103.59114"
       fy="94.287537"
       id="radialGradient6375"
       xlink:href="#linearGradient9498"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(1,0,0,0.84931512,0,14.207706)" />
    <linearGradient
       id="linearGradient9498">
      <stop
         id="stop9500"
         style="stop-color:#ffffff;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9502"
         style="stop-color:#ffffff;stop-opacity:0"
         offset="1" />
    </linearGradient>
    <filter
       color-interpolation-filters="sRGB"
       id="filter9518">
      <feGaussianBlur
         id="feGaussianBlur9520"
         stdDeviation="0.71376063" />
    </filter>
    <radialGradient
       cx="103.59114"
       cy="94.287537"
       r="25.809397"
       fx="103.59114"
       fy="94.287537"
       id="radialGradient6377"
       xlink:href="#linearGradient9498"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(1,0,0,0.84931512,0,14.207706)" />
    <linearGradient
       x1="264.28571"
       y1="573.26208"
       x2="264.28571"
       y2="649.31946"
       id="linearGradient6299"
       xlink:href="#linearGradient9356"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(2.5064773,0,0,2.5064773,-377.02695,-945.11669)" />
    <linearGradient
       id="linearGradient9356">
      <stop
         id="stop9358"
         style="stop-color:#f9f8f8;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9364"
         style="stop-color:#ececec;stop-opacity:1"
         offset="0.07006675" />
      <stop
         id="stop9366"
         style="stop-color:#e8e7e7;stop-opacity:1"
         offset="0.93328261" />
      <stop
         id="stop9360"
         style="stop-color:#b4b3b4;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="248.757"
       y1="634.69067"
       x2="249.81441"
       y2="664.505"
       id="linearGradient6301"
       xlink:href="#linearGradient9376"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(2.5064773,0,0,2.5064773,-377.02695,-945.11669)" />
    <linearGradient
       id="linearGradient9376">
      <stop
         id="stop9378"
         style="stop-color:#dad9d9;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9384"
         style="stop-color:#dad9d9;stop-opacity:1"
         offset="0.27966022" />
      <stop
         id="stop9380"
         style="stop-color:#000000;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <filter
       color-interpolation-filters="sRGB"
       id="filter10343">
      <feGaussianBlur
         id="feGaussianBlur10345"
         stdDeviation="0.74285713" />
    </filter>
  </defs>
  <g
     transform="translate(-190.41347,-492.71337)"
     id="layer1">
    <rect
       width="74.285713"
       height="74.285713"
       rx="14.818748"
       ry="14.818748"
       x="-3.8928561"
       y="783.7193"
       transform="matrix(2.5064773,0,0,2.5064773,208.95161,-1466.6429)"
       id="rect10609"
       style="opacity:0.72244903;fill:#888a85;fill-opacity:1;stroke:#888a85;stroke-width:0.44291338;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none;filter:url(#filter10343)" />
    <rect
       width="186.19545"
       height="186.19545"
       rx="37.142857"
       ry="37.142857"
       x="192.30144"
       y="493.97189"
       id="rect10611"
       style="fill:url(#linearGradient6299);fill-opacity:1;stroke:url(#linearGradient6301);stroke-width:1.11015236;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none" />
    <path
       d="m 129.40054,94.287537 a 25.809397,21.920311 0 1 1 -51.618796,0 25.809397,21.920311 0 1 1 51.618796,0 z"
       transform="matrix(2.1486036,0,0,1.3746515,26.971952,396.27929)"
       id="path10613"
       style="opacity:0.76326533;fill:url(#radialGradient6377);fill-opacity:1;stroke:none;filter:url(#filter9518)" />
    <path
       d="m 129.40054,94.287537 a 25.809397,21.920311 0 1 1 -51.618796,0 25.809397,21.920311 0 1 1 51.618796,0 z"
       transform="matrix(0.89287219,0,0,1.1016891,258.96457,550.75923)"
       id="path10615"
       style="opacity:0.76326533;fill:url(#radialGradient6375);fill-opacity:1;stroke:none;filter:url(#filter9518)" />
    <path
       d="m 80.963729,28.526606 a 8.1317282,8.1317282 0 1 1 -16.263456,0 8.1317282,8.1317282 0 1 1 16.263456,0 z"
       transform="matrix(2.1975726,0,0,2.1975726,125.34556,524.38044)"
       id="path10617"
       style="fill:url(#linearGradient6373);fill-opacity:1;stroke:none" />
    <path
       d="m 80.963729,28.526606 a 8.1317282,8.1317282 0 1 1 -16.263456,0 8.1317282,8.1317282 0 1 1 16.263456,0 z"
       transform="matrix(2.1975726,0,0,2.1975726,180.48805,464.22498)"
       id="path10625"
       style="fill:url(#linearGradient6371);fill-opacity:1;stroke:none" />
    <path
       d="m 80.963729,28.526606 a 8.1317282,8.1317282 0 1 1 -16.263456,0 8.1317282,8.1317282 0 1 1 16.263456,0 z"
       transform="matrix(2.1975726,0,0,2.1975726,70.203058,579.52294)"
       id="path10627"
       style="fill:url(#linearGradient6369);fill-opacity:1;stroke:none" />
    <path
       d="m 267.60738,589.04051 c -0.0609,0.60075 -0.0596,1.17127 -0.0596,1.78812 0,9.86935 7.95222,17.88118 17.82158,17.88118 9.86938,0 17.88123,-8.01183 17.88123,-17.88118 0,-0.61685 0.001,-1.18737 -0.0594,-1.78812 -0.9953,8.92691 -8.6291,15.85464 -17.82163,15.85464 -9.19251,0 -16.76671,-6.92773 -17.76198,-15.85464 z"
       id="path10631"
       style="fill:#ffffff;fill-opacity:1;stroke:none" />
    <path
       d="m 212.46488,644.18301 c -0.0609,0.60075 -0.0597,1.17127 -0.0597,1.78812 0,9.86935 7.95223,17.88118 17.82158,17.88118 9.86938,0 17.88123,-8.01183 17.88123,-17.88118 0,-0.61685 0.001,-1.18737 -0.0594,-1.78812 -0.9953,8.92692 -8.6291,15.85464 -17.82163,15.85464 -9.1925,0 -16.7667,-6.92772 -17.76197,-15.85464 z"
       id="path10639"
       style="fill:#ffffff;fill-opacity:1;stroke:none" />
    <path
       d="m 322.74988,528.88505 c -0.0609,0.60075 -0.0597,1.17128 -0.0597,1.78812 0,9.86936 7.95222,17.88119 17.82158,17.88119 9.86938,0 17.88123,-8.01183 17.88123,-17.88119 0,-0.61684 10e-4,-1.18737 -0.0594,-1.78812 -0.9953,8.92692 -8.6291,15.85465 -17.82163,15.85465 -9.19251,0 -16.76671,-6.92773 -17.76198,-15.85465 z"
       id="path10643"
       style="fill:#ffffff;fill-opacity:1;stroke:none" />
  </g>

</svg>

        
        
        
        
EOD;

        return $html;
    }
    
    // ------------------------------------------------------------------------------------
    //
    // Create a part of the picture and return as string
    //
    public function GetDice4() {
    /*    
        $html = <<<EOD
  <!-- Here is dice 4 -->
  <g id="dice4">
        <g transform="scale({$this->iScale})">
                <path style="fill:#FFF;stroke:#000;stroke-width:7;" d="M71.4594727,553.5C34.0805664,553.5,3.5,522.9179688,3.5,485.5390625
                V71.4589844C3.5,34.0820312,34.0805664,3.5,71.4594727,3.5h414.0805664C522.9179688,3.5,553.5,34.0820312,553.5,71.4589844
                v414.0800781C553.5,522.9179688,522.9179688,553.5,485.5400391,553.5H71.4594727z"/>
            <circle style="fill:#000;stroke:#000;stroke-width:5;" cx="117.0263672" cy="439.9746094" r="57.1152344"/> 
            <circle style="fill:#000;stroke:#000;stroke-width:5;" cx="439.9746094" cy="439.9746094" r="57.1152344"/> 
            <circle style="fill:#000;stroke:#000;stroke-width:5;" cx="439.9736328" cy="117.0258789" r="57.1147461"/>             
            <circle style="fill:#000;stroke:#000;stroke-width:5;" cx="117.0258789" cy="117.0253906" r="57.1152344"/> 
        </g>
  </g>
      */  
 $html = <<<EOD
         
   <?xml version="1.0" encoding="UTF-8" standalone="no"?>
    <!-- Created with Inkscape (http://www.inkscape.org/) -->

<svg
   xmlns:dc="http://purl.org/dc/elements/1.1/"
   xmlns:cc="http://creativecommons.org/ns#"
   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
   xmlns:svg="http://www.w3.org/2000/svg"
   xmlns="http://www.w3.org/2000/svg"
   xmlns:xlink="http://www.w3.org/1999/xlink"
   version="1.1"
   width="200.02678"
   height="196.21823"
   id="svg7075">
  <defs
     id="defs7077">
    <linearGradient
       x1="72.832001"
       y1="20.394878"
       x2="72.832001"
       y2="36.658333"
       id="linearGradient6357"
       xlink:href="#linearGradient9462"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       id="linearGradient9462">
      <stop
         id="stop9464"
         style="stop-color:#a40000;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9466"
         style="stop-color:#ef2929;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="72.832001"
       y1="20.394878"
       x2="72.832001"
       y2="36.658333"
       id="linearGradient6359"
       xlink:href="#linearGradient9462"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       x1="72.832001"
       y1="20.394878"
       x2="72.832001"
       y2="36.658333"
       id="linearGradient6361"
       xlink:href="#linearGradient9462"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       x1="72.832001"
       y1="20.394878"
       x2="72.832001"
       y2="36.658333"
       id="linearGradient6363"
       xlink:href="#linearGradient9462"
       gradientUnits="userSpaceOnUse" />
    <radialGradient
       cx="103.59114"
       cy="94.287537"
       r="25.809397"
       fx="103.59114"
       fy="94.287537"
       id="radialGradient6365"
       xlink:href="#linearGradient9498"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(1,0,0,0.84931512,0,14.207706)" />
    <linearGradient
       id="linearGradient9498">
      <stop
         id="stop9500"
         style="stop-color:#ffffff;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9502"
         style="stop-color:#ffffff;stop-opacity:0"
         offset="1" />
    </linearGradient>
    <filter
       color-interpolation-filters="sRGB"
       id="filter9518">
      <feGaussianBlur
         id="feGaussianBlur9520"
         stdDeviation="0.71376063" />
    </filter>
    <radialGradient
       cx="103.59114"
       cy="94.287537"
       r="25.809397"
       fx="103.59114"
       fy="94.287537"
       id="radialGradient6367"
       xlink:href="#linearGradient9498"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(1,0,0,0.84931512,0,14.207706)" />
    <linearGradient
       x1="264.28571"
       y1="573.26208"
       x2="264.28571"
       y2="649.31946"
       id="linearGradient6285"
       xlink:href="#linearGradient9356"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(2.5064772,0,0,2.5064772,-377.0269,-945.11664)" />
    <linearGradient
       id="linearGradient9356">
      <stop
         id="stop9358"
         style="stop-color:#f9f8f8;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9364"
         style="stop-color:#ececec;stop-opacity:1"
         offset="0.07006675" />
      <stop
         id="stop9366"
         style="stop-color:#e8e7e7;stop-opacity:1"
         offset="0.93328261" />
      <stop
         id="stop9360"
         style="stop-color:#b4b3b4;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="248.757"
       y1="634.69067"
       x2="249.81441"
       y2="664.505"
       id="linearGradient6287"
       xlink:href="#linearGradient9376"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(2.5064772,0,0,2.5064772,-377.0269,-945.11664)" />
    <linearGradient
       id="linearGradient9376">
      <stop
         id="stop9378"
         style="stop-color:#dad9d9;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9384"
         style="stop-color:#dad9d9;stop-opacity:1"
         offset="0.27966022" />
      <stop
         id="stop9380"
         style="stop-color:#000000;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <filter
       color-interpolation-filters="sRGB"
       id="filter10343">
      <feGaussianBlur
         id="feGaussianBlur10345"
         stdDeviation="0.74285713" />
    </filter>
  </defs>
  <g
     transform="translate(-190.41347,-492.7133)"
     id="layer1">
    <rect
       width="74.285713"
       height="74.285713"
       rx="14.818748"
       ry="14.818748"
       x="96.107147"
       y="783.7193"
       transform="matrix(2.5064772,0,0,2.5064772,-41.696121,-1466.6429)"
       id="rect10647"
       style="opacity:0.72244903;fill:#888a85;fill-opacity:1;stroke:#888a85;stroke-width:0.44291338;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none;filter:url(#filter10343)" />
    <rect
       width="186.19545"
       height="186.19545"
       rx="37.142857"
       ry="37.142857"
       x="192.30144"
       y="493.97189"
       id="rect10649"
       style="fill:url(#linearGradient6285);fill-opacity:1;stroke:url(#linearGradient6287);stroke-width:1.11015236;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none" />
    <path
       d="m 129.40054,94.287537 a 25.809397,21.920311 0 1 1 -51.618796,0 25.809397,21.920311 0 1 1 51.618796,0 z"
       transform="matrix(2.1486035,0,0,1.3746515,26.971951,396.2793)"
       id="path10651"
       style="opacity:0.76326533;fill:url(#radialGradient6367);fill-opacity:1;stroke:none;filter:url(#filter9518)" />
    <path
       d="m 129.40054,94.287537 a 25.809397,21.920311 0 1 1 -51.618796,0 25.809397,21.920311 0 1 1 51.618796,0 z"
       transform="matrix(0.89287217,0,0,1.1016891,258.96454,550.75923)"
       id="path10653"
       style="opacity:0.76326533;fill:url(#radialGradient6365);fill-opacity:1;stroke:none;filter:url(#filter9518)" />
    <path
       d="m 80.963729,28.526606 a 8.1317282,8.1317282 0 1 1 -16.263456,0 8.1317282,8.1317282 0 1 1 16.263456,0 z"
       transform="matrix(2.1975726,0,0,2.1975726,70.20305,464.22499)"
       id="path10661"
       style="fill:url(#linearGradient6363);fill-opacity:1;stroke:none" />
    <path
       d="m 80.963729,28.526606 a 8.1317282,8.1317282 0 1 1 -16.263456,0 8.1317282,8.1317282 0 1 1 16.263456,0 z"
       transform="matrix(2.1975726,0,0,2.1975726,180.48805,464.22499)"
       id="path10663"
       style="fill:url(#linearGradient6361);fill-opacity:1;stroke:none" />
    <path
       d="m 80.963729,28.526606 a 8.1317282,8.1317282 0 1 1 -16.263456,0 8.1317282,8.1317282 0 1 1 16.263456,0 z"
       transform="matrix(2.1975726,0,0,2.1975726,70.20305,579.52294)"
       id="path10665"
       style="fill:url(#linearGradient6359);fill-opacity:1;stroke:none" />
    <path
       d="m 80.963729,28.526606 a 8.1317282,8.1317282 0 1 1 -16.263456,0 8.1317282,8.1317282 0 1 1 16.263456,0 z"
       transform="matrix(2.1975726,0,0,2.1975726,180.48805,579.52294)"
       id="path10667"
       style="fill:url(#linearGradient6357);fill-opacity:1;stroke:none" />
    <path
       d="m 322.74985,644.18301 c -0.0609,0.60075 -0.0596,1.17127 -0.0596,1.78812 0,9.86935 7.9522,17.88118 17.82155,17.88118 9.86938,0 17.88124,-8.01183 17.88124,-17.88118 0,-0.61685 0.001,-1.18737 -0.0594,-1.78812 -0.99527,8.92692 -8.6291,15.85464 -17.82163,15.85464 -9.1925,0 -16.7667,-6.92772 -17.76197,-15.85464 z"
       id="path10675"
       style="fill:#ffffff;fill-opacity:1;stroke:none" />
    <path
       d="m 212.46488,644.18301 c -0.0609,0.60075 -0.0597,1.17127 -0.0597,1.78812 0,9.86935 7.95222,17.88118 17.82157,17.88118 9.86938,0 17.88124,-8.01183 17.88124,-17.88118 0,-0.61685 0.001,-1.18737 -0.0594,-1.78812 -0.99532,8.92692 -8.62909,15.85464 -17.82162,15.85464 -9.19254,0 -16.76673,-6.92772 -17.76198,-15.85464 z"
       id="path10677"
       style="fill:#ffffff;fill-opacity:1;stroke:none" />
    <path
       d="m 212.46488,528.88505 c -0.0609,0.60076 -0.0597,1.17128 -0.0597,1.78813 0,9.86935 7.95222,17.88118 17.82157,17.88118 9.86938,0 17.88124,-8.01183 17.88124,-17.88118 0,-0.61685 0.001,-1.18737 -0.0594,-1.78813 -0.99532,8.92692 -8.62909,15.85465 -17.82162,15.85465 -9.19254,0 -16.76673,-6.92773 -17.76198,-15.85465 z"
       id="path10679"
       style="fill:#ffffff;fill-opacity:1;stroke:none" />
    <path
       d="m 322.74985,528.88505 c -0.0609,0.60076 -0.0596,1.17128 -0.0596,1.78813 0,9.86935 7.9522,17.88118 17.82155,17.88118 9.86938,0 17.88124,-8.01183 17.88124,-17.88118 0,-0.61685 0.001,-1.18737 -0.0594,-1.78813 -0.99527,8.92692 -8.6291,15.85465 -17.82163,15.85465 -9.1925,0 -16.7667,-6.92773 -17.76197,-15.85465 z"
       id="path10681"
       style="fill:#ffffff;fill-opacity:1;stroke:none" />
  </g>
  
</svg>

        
        
EOD;

        return $html;
    }
    
    // ------------------------------------------------------------------------------------
    //
    // Create a part of the picture and return as string
    //
    public function GetDice5() {        
    
       /*
        $html = <<<EOD
  <!-- Here is dice 5 -->
  <g id="dice5">
        <g transform="scale({$this->iScale})">
        
         <path style="fill:#FFF;stroke:#000;stroke-width:7;" d="M71.4594727,553.5C34.0805664,553.5,3.5,522.9189453,3.5,485.5400391
                V71.4594727C3.5,34.0820312,34.0805664,3.5,71.4594727,3.5h414.0805664C522.9179688,3.5,553.5,34.0820312,553.5,71.4594727
                v414.0805664C553.5,522.9189453,522.9179688,553.5,485.5400391,553.5H71.4594727z"/>        
            <circle style="fill:#000;stroke:#000;stroke-width:5;" cx="117.0263672" cy="439.9746094" r="57.1152344"/> 
            <circle style="fill:#000;stroke:#000;stroke-width:5;" cx="439.9746094" cy="439.9746094" r="57.1152344"/> 
            <circle style="fill:#000;stroke:#000;stroke-width:5;" cx="439.9731445" cy="117.0258789" r="57.1147461"/>            
            <circle style="fill:#000;stroke:#000;stroke-width:5;" cx="278.5" cy="278.5" r="57.1152344"/> 
            <circle style="fill:#000;stroke:#000;stroke-width:5;" cx="117.0258789" cy="117.0256348" r="57.1154785"/> 
        </g>
  </g>             
       */
          $html = <<<EOD
                  <?xml version="1.0" encoding="UTF-8" standalone="no"?>
<!-- Created with Inkscape (http://www.inkscape.org/) -->

<svg
   xmlns:dc="http://purl.org/dc/elements/1.1/"
   xmlns:cc="http://creativecommons.org/ns#"
   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
   xmlns:svg="http://www.w3.org/2000/svg"
   xmlns="http://www.w3.org/2000/svg"
   xmlns:xlink="http://www.w3.org/1999/xlink"
   version="1.1"
   width="200.02678"
   height="196.21823"
   id="svg7219">
  <defs
     id="defs7221">
    <linearGradient
       x1="72.832001"
       y1="20.394878"
       x2="72.832001"
       y2="36.658333"
       id="linearGradient6357"
       xlink:href="#linearGradient9462"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       id="linearGradient9462">
      <stop
         id="stop9464"
         style="stop-color:#a40000;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9466"
         style="stop-color:#ef2929;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="72.832001"
       y1="20.394878"
       x2="72.832001"
       y2="36.658333"
       id="linearGradient6359"
       xlink:href="#linearGradient9462"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       x1="72.832001"
       y1="20.394878"
       x2="72.832001"
       y2="36.658333"
       id="linearGradient6361"
       xlink:href="#linearGradient9462"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       x1="72.832001"
       y1="20.394878"
       x2="72.832001"
       y2="36.658333"
       id="linearGradient6363"
       xlink:href="#linearGradient9462"
       gradientUnits="userSpaceOnUse" />
    <radialGradient
       cx="103.59114"
       cy="94.287537"
       r="25.809397"
       fx="103.59114"
       fy="94.287537"
       id="radialGradient6365"
       xlink:href="#linearGradient9498"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(1,0,0,0.84931512,0,14.207706)" />
    <linearGradient
       id="linearGradient9498">
      <stop
         id="stop9500"
         style="stop-color:#ffffff;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9502"
         style="stop-color:#ffffff;stop-opacity:0"
         offset="1" />
    </linearGradient>
    <radialGradient
       cx="103.59114"
       cy="94.287537"
       r="25.809397"
       fx="103.59114"
       fy="94.287537"
       id="radialGradient6367"
       xlink:href="#linearGradient9498"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(1,0,0,0.84931512,0,14.207706)" />
    <linearGradient
       x1="264.28571"
       y1="573.26208"
       x2="264.28571"
       y2="649.31946"
       id="linearGradient6285"
       xlink:href="#linearGradient9356"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(4,0,0,4,-793.71635,-2038.8008)" />
    <linearGradient
       id="linearGradient9356">
      <stop
         id="stop9358"
         style="stop-color:#f9f8f8;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9364"
         style="stop-color:#ececec;stop-opacity:1"
         offset="0.07006675" />
      <stop
         id="stop9366"
         style="stop-color:#e8e7e7;stop-opacity:1"
         offset="0.93328261" />
      <stop
         id="stop9360"
         style="stop-color:#b4b3b4;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="248.757"
       y1="634.69067"
       x2="249.81441"
       y2="664.505"
       id="linearGradient6287"
       xlink:href="#linearGradient9376"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(4,0,0,4,-793.71635,-2038.8008)" />
    <linearGradient
       id="linearGradient9376">
      <stop
         id="stop9378"
         style="stop-color:#dad9d9;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9384"
         style="stop-color:#dad9d9;stop-opacity:1"
         offset="0.27966022" />
      <stop
         id="stop9380"
         style="stop-color:#000000;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="72.832001"
       y1="20.394878"
       x2="72.832001"
       y2="36.658333"
       id="linearGradient6343"
       xlink:href="#linearGradient9462-0"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       id="linearGradient9462-0">
      <stop
         id="stop9464-1"
         style="stop-color:#a40000;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9466-6"
         style="stop-color:#ef2929;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="72.832001"
       y1="20.394878"
       x2="72.832001"
       y2="36.658333"
       id="linearGradient6345"
       xlink:href="#linearGradient9462-0"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       x1="72.832001"
       y1="20.394878"
       x2="72.832001"
       y2="36.658333"
       id="linearGradient6347"
       xlink:href="#linearGradient9462-0"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       x1="72.832001"
       y1="20.394878"
       x2="72.832001"
       y2="36.658333"
       id="linearGradient6349"
       xlink:href="#linearGradient9462-0"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       x1="72.832001"
       y1="20.394878"
       x2="72.832001"
       y2="36.658333"
       id="linearGradient6351"
       xlink:href="#linearGradient9462-0"
       gradientUnits="userSpaceOnUse" />
    <radialGradient
       cx="103.59114"
       cy="94.287537"
       r="25.809397"
       fx="103.59114"
       fy="94.287537"
       id="radialGradient6353"
       xlink:href="#linearGradient9498-0"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(1,0,0,0.84931512,0,14.207706)" />
    <linearGradient
       id="linearGradient9498-0">
      <stop
         id="stop9500-8"
         style="stop-color:#ffffff;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9502-8"
         style="stop-color:#ffffff;stop-opacity:0"
         offset="1" />
    </linearGradient>
    <filter
       color-interpolation-filters="sRGB"
       id="filter9518-1">
      <feGaussianBlur
         id="feGaussianBlur9520-0"
         stdDeviation="0.71376063" />
    </filter>
    <radialGradient
       cx="103.59114"
       cy="94.287537"
       r="25.809397"
       fx="103.59114"
       fy="94.287537"
       id="radialGradient6355"
       xlink:href="#linearGradient9498-0"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(1,0,0,0.84931512,0,14.207706)" />
    <linearGradient
       x1="264.28571"
       y1="573.26208"
       x2="264.28571"
       y2="649.31946"
       id="linearGradient6269"
       xlink:href="#linearGradient9356-9"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(2.5064773,0,0,2.5064773,-377.02695,-945.11669)" />
    <linearGradient
       id="linearGradient9356-9">
      <stop
         id="stop9358-3"
         style="stop-color:#f9f8f8;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9364-4"
         style="stop-color:#ececec;stop-opacity:1"
         offset="0.07006675" />
      <stop
         id="stop9366-3"
         style="stop-color:#e8e7e7;stop-opacity:1"
         offset="0.93328261" />
      <stop
         id="stop9360-1"
         style="stop-color:#b4b3b4;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="248.757"
       y1="634.69067"
       x2="249.81441"
       y2="664.505"
       id="linearGradient6271"
       xlink:href="#linearGradient9376-8"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(2.5064773,0,0,2.5064773,-377.02695,-945.11669)" />
    <linearGradient
       id="linearGradient9376-8">
      <stop
         id="stop9378-8"
         style="stop-color:#dad9d9;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9384-9"
         style="stop-color:#dad9d9;stop-opacity:1"
         offset="0.27966022" />
      <stop
         id="stop9380-8"
         style="stop-color:#000000;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <filter
       color-interpolation-filters="sRGB"
       id="filter10343-3">
      <feGaussianBlur
         id="feGaussianBlur10345-0"
         stdDeviation="0.74285713" />
    </filter>
  </defs>
  <g
     transform="translate(-190.41347,-492.7133)"
     id="layer1">
    <rect
       width="74.285713"
       height="74.285713"
       rx="14.818748"
       ry="14.818748"
       x="-3.8928561"
       y="883.7193"
       transform="matrix(2.5064773,0,0,2.5064773,208.95161,-1717.2907)"
       id="rect10729"
       style="opacity:0.72244903;fill:#888a85;fill-opacity:1;stroke:#888a85;stroke-width:0.44291338;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none;filter:url(#filter10343-3)" />
    <rect
       width="186.19545"
       height="186.19545"
       rx="37.142857"
       ry="37.142857"
       x="192.30144"
       y="493.97189"
       id="rect10731"
       style="fill:url(#linearGradient6269);fill-opacity:1;stroke:url(#linearGradient6271);stroke-width:1.11015236;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none" />
    <path
       d="m 129.40054,94.287537 a 25.809397,21.920311 0 1 1 -51.618796,0 25.809397,21.920311 0 1 1 51.618796,0 z"
       transform="matrix(2.1486036,0,0,1.3746515,26.971952,396.27929)"
       id="path10733"
       style="opacity:0.76326533;fill:url(#radialGradient6355);fill-opacity:1;stroke:none;filter:url(#filter9518-1)" />
    <path
       d="m 129.40054,94.287537 a 25.809397,21.920311 0 1 1 -51.618796,0 25.809397,21.920311 0 1 1 51.618796,0 z"
       transform="matrix(0.89287219,0,0,1.1016891,258.96457,550.75925)"
       id="path10735"
       style="opacity:0.76326533;fill:url(#radialGradient6353);fill-opacity:1;stroke:none;filter:url(#filter9518-1)" />
    <path
       d="m 80.963729,28.526606 a 8.1317282,8.1317282 0 1 1 -16.263456,0 8.1317282,8.1317282 0 1 1 16.263456,0 z"
       transform="matrix(2.1975726,0,0,2.1975726,125.34556,524.38045)"
       id="path10737"
       style="fill:url(#linearGradient6351);fill-opacity:1;stroke:none" />
    <path
       d="m 80.963729,28.526606 a 8.1317282,8.1317282 0 1 1 -16.263456,0 8.1317282,8.1317282 0 1 1 16.263456,0 z"
       transform="matrix(2.1975726,0,0,2.1975726,70.203058,464.225)"
       id="path10743"
       style="fill:url(#linearGradient6349);fill-opacity:1;stroke:none" />
    <path
       d="m 80.963729,28.526606 a 8.1317282,8.1317282 0 1 1 -16.263456,0 8.1317282,8.1317282 0 1 1 16.263456,0 z"
       transform="matrix(2.1975726,0,0,2.1975726,180.48805,464.225)"
       id="path10745"
       style="fill:url(#linearGradient6347);fill-opacity:1;stroke:none" />
    <path
       d="m 80.963729,28.526606 a 8.1317282,8.1317282 0 1 1 -16.263456,0 8.1317282,8.1317282 0 1 1 16.263456,0 z"
       transform="matrix(2.1975726,0,0,2.1975726,70.203058,579.52295)"
       id="path10747"
       style="fill:url(#linearGradient6345);fill-opacity:1;stroke:none" />
    <path
       d="m 80.963729,28.526606 a 8.1317282,8.1317282 0 1 1 -16.263456,0 8.1317282,8.1317282 0 1 1 16.263456,0 z"
       transform="matrix(2.1975726,0,0,2.1975726,180.48805,579.52295)"
       id="path10749"
       style="fill:url(#linearGradient6343);fill-opacity:1;stroke:none" />
    <path
       d="m 267.60738,589.04042 c -0.0609,0.60081 -0.0596,1.17141 -0.0596,1.78813 0,9.86937 7.95222,17.8812 17.82158,17.8812 9.86938,0 17.88123,-8.01183 17.88123,-17.8812 0,-0.61672 0.001,-1.18732 -0.0594,-1.78813 -0.9953,8.92695 -8.6291,15.85473 -17.82163,15.85473 -9.19251,0 -16.76671,-6.92778 -17.76198,-15.85473 z"
       id="path10751"
       style="fill:#ffffff;fill-opacity:1;stroke:none" />
    <path
       d="m 322.74988,644.18292 c -0.0609,0.60081 -0.0597,1.17141 -0.0597,1.78825 0,9.86925 7.95222,17.88108 17.82158,17.88108 9.86938,0 17.88123,-8.01183 17.88123,-17.88108 0,-0.61684 10e-4,-1.18744 -0.0594,-1.78825 -0.9953,8.92695 -8.6291,15.85473 -17.82163,15.85473 -9.19251,0 -16.76671,-6.92778 -17.76198,-15.85473 z"
       id="path10757"
       style="fill:#ffffff;fill-opacity:1;stroke:none" />
    <path
       d="m 212.46488,644.18292 c -0.0609,0.60081 -0.0597,1.17141 -0.0597,1.78825 0,9.86925 7.95223,17.88108 17.82158,17.88108 9.86938,0 17.88123,-8.01183 17.88123,-17.88108 0,-0.61684 0.001,-1.18744 -0.0594,-1.78825 -0.9953,8.92695 -8.6291,15.85473 -17.82163,15.85473 -9.1925,0 -16.7667,-6.92778 -17.76197,-15.85473 z"
       id="path10759"
       style="fill:#ffffff;fill-opacity:1;stroke:none" />
    <path
       d="m 212.46488,528.88503 c -0.0609,0.60081 -0.0597,1.17128 -0.0597,1.78812 0,9.86938 7.95223,17.88121 17.82158,17.88121 9.86938,0 17.88123,-8.01183 17.88123,-17.88121 0,-0.61684 0.001,-1.18731 -0.0594,-1.78812 -0.9953,8.92695 -8.6291,15.85466 -17.82163,15.85466 -9.1925,0 -16.7667,-6.92771 -17.76197,-15.85466 z"
       id="path10761"
       style="fill:#ffffff;fill-opacity:1;stroke:none" />
    <path
       d="m 322.74988,528.88503 c -0.0609,0.60081 -0.0597,1.17128 -0.0597,1.78812 0,9.86938 7.95222,17.88121 17.82158,17.88121 9.86938,0 17.88123,-8.01183 17.88123,-17.88121 0,-0.61684 10e-4,-1.18731 -0.0594,-1.78812 -0.9953,8.92695 -8.6291,15.85466 -17.82163,15.85466 -9.19251,0 -16.76671,-6.92771 -17.76198,-15.85466 z"
       id="path10763"
       style="fill:#ffffff;fill-opacity:1;stroke:none" />
  </g>

</svg>
        
EOD;

        return $html;
    }
    
    // ------------------------------------------------------------------------------------
    //
    // Create a part of the picture and return as string
    //
    public function GetDice6() {
        /*
        $html = <<<EOD
  <!-- Here is dice 6 -->
  <g id="dice6">
        <g transform="scale({$this->iScale})">
         <path style="fill:#FFF;stroke:#000;stroke-width:7;" d="M71.4594727,553.5C34.0805664,553.5,3.5,522.9179688,3.5,485.5390625
                V71.4589844C3.5,34.0820312,34.0805664,3.5,71.4594727,3.5h414.0805664C522.9179688,3.5,553.5,34.0820312,553.5,71.4589844
                v414.0800781C553.5,522.9179688,522.9179688,553.5,485.5400391,553.5H71.4594727z"/>
            <circle style="fill:#000;stroke:#FFF;stroke-width:5;" cx="117.0263672" cy="439.9746094" r="57.1152344"/> 
            <circle style="fill:#000;stroke:#FFF;stroke-width:5;" cx="439.9746094" cy="439.9746094" r="57.1152344"/> 
            <circle style="fill:#000;stroke:#FFF;stroke-width:5;" cx="439.9736328" cy="117.0258789" r="57.1147461"/> 
           
            <circle style="fill:#000;stroke:#000;stroke-width:5;" cx="117.0263672" cy="117.0253906" r="57.1152344"/> 
            <circle style="fill:#000;stroke:#000;stroke-width:5;" cx="439.9736328" cy="278.5004883" r="57.1147461"/> 
            <circle style="fill:#000;stroke:#000;stroke-width:5;" cx="117.0258789" cy="278.5" r="57.1152344"/> 
        </g>
  </g>
         * 
         * 
         */
  $html = <<<EOD
          
          <?xml version="1.0" encoding="UTF-8" standalone="no"?>
<!-- Created with Inkscape (http://www.inkscape.org/) -->

<svg
   xmlns:dc="http://purl.org/dc/elements/1.1/"
   xmlns:cc="http://creativecommons.org/ns#"
   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
   xmlns:svg="http://www.w3.org/2000/svg"
   xmlns="http://www.w3.org/2000/svg"
   xmlns:xlink="http://www.w3.org/1999/xlink"
   version="1.1"
   width="199.98073"
   height="196.21823"
   id="svg7695">
  <defs
     id="defs7697">
    <filter
       color-interpolation-filters="sRGB"
       id="filter10343">
      <feGaussianBlur
         id="feGaussianBlur10345"
         stdDeviation="0.74285713" />
    </filter>
    <linearGradient
       x1="264.28571"
       y1="573.26208"
       x2="264.28571"
       y2="649.31946"
       id="linearGradient6323"
       xlink:href="#linearGradient9356"
       gradientUnits="userSpaceOnUse"
       gradientTransform="translate(-156.86107,344.60697)" />
    <linearGradient
       id="linearGradient9356">
      <stop
         id="stop9358"
         style="stop-color:#f9f8f8;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9364"
         style="stop-color:#ececec;stop-opacity:1"
         offset="0.07006675" />
      <stop
         id="stop9366"
         style="stop-color:#e8e7e7;stop-opacity:1"
         offset="0.93328261" />
      <stop
         id="stop9360"
         style="stop-color:#b4b3b4;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="248.757"
       y1="634.69067"
       x2="249.81441"
       y2="664.505"
       id="linearGradient6325"
       xlink:href="#linearGradient9376"
       gradientUnits="userSpaceOnUse"
       gradientTransform="translate(-156.86107,344.60697)" />
    <linearGradient
       id="linearGradient9376">
      <stop
         id="stop9378"
         style="stop-color:#dad9d9;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9384"
         style="stop-color:#dad9d9;stop-opacity:1"
         offset="0.27966022" />
      <stop
         id="stop9380"
         style="stop-color:#000000;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <radialGradient
       cx="103.59114"
       cy="94.287537"
       r="25.809397"
       fx="103.59114"
       fy="94.287537"
       id="radialGradient6327"
       xlink:href="#linearGradient9498"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(1,0,0,0.84931512,0,14.207706)" />
    <linearGradient
       id="linearGradient9498">
      <stop
         id="stop9500"
         style="stop-color:#ffffff;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9502"
         style="stop-color:#ffffff;stop-opacity:0"
         offset="1" />
    </linearGradient>
    <filter
       color-interpolation-filters="sRGB"
       id="filter9518">
      <feGaussianBlur
         id="feGaussianBlur9520"
         stdDeviation="0.71376063" />
    </filter>
    <radialGradient
       cx="103.59114"
       cy="94.287537"
       r="25.809397"
       fx="103.59114"
       fy="94.287537"
       id="radialGradient6329"
       xlink:href="#linearGradient9498"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(1,0,0,0.84931512,0,14.207706)" />
    <linearGradient
       x1="72.832001"
       y1="20.394878"
       x2="72.832001"
       y2="36.658333"
       id="linearGradient6331"
       xlink:href="#linearGradient9462"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       id="linearGradient9462">
      <stop
         id="stop9464"
         style="stop-color:#a40000;stop-opacity:1"
         offset="0" />
      <stop
         id="stop9466"
         style="stop-color:#ef2929;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="72.832001"
       y1="20.394878"
       x2="72.832001"
       y2="36.658333"
       id="linearGradient6333"
       xlink:href="#linearGradient9462"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       x1="72.832001"
       y1="20.394878"
       x2="72.832001"
       y2="36.658333"
       id="linearGradient6335"
       xlink:href="#linearGradient9462"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       x1="72.832001"
       y1="20.394878"
       x2="72.832001"
       y2="36.658333"
       id="linearGradient6337"
       xlink:href="#linearGradient9462"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       x1="72.832001"
       y1="20.394878"
       x2="72.832001"
       y2="36.658333"
       id="linearGradient6339"
       xlink:href="#linearGradient9462"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       x1="72.832001"
       y1="20.394878"
       x2="72.832001"
       y2="36.658333"
       id="linearGradient6341"
       xlink:href="#linearGradient9462"
       gradientUnits="userSpaceOnUse" />
  </defs>
  <g
     transform="translate(-190.41347,-492.70236)"
     id="layer1">
    <g
       transform="matrix(2.5064772,0,0,2.5064772,16.14179,-1808.8663)"
       id="g10765">
      <rect
         width="74.285713"
         height="74.285713"
         rx="14.818748"
         ry="14.818748"
         x="73.031769"
         y="920.25488"
         id="rect10767"
         style="opacity:0.72244903;fill:#888a85;fill-opacity:1;stroke:#888a85;stroke-width:0.44291338;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none;filter:url(#filter10343)" />
      <rect
         width="74.285713"
         height="74.285713"
         rx="14.818748"
         ry="14.818748"
         x="70.281769"
         y="918.75488"
         id="rect10769"
         style="fill:url(#linearGradient6323);fill-opacity:1;stroke:url(#linearGradient6325);stroke-width:0.44291338;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none" />
      <path
         d="m 129.40054,94.287537 a 25.809397,21.920311 0 1 1 -51.618796,0 25.809397,21.920311 0 1 1 51.618796,0 z"
         transform="matrix(0.85722043,0,0,0.54843965,4.3208718,879.77879)"
         id="path10771"
         style="opacity:0.76326533;fill:url(#radialGradient6327);fill-opacity:1;stroke:none;filter:url(#filter9518)" />
      <path
         d="m 129.40054,94.287537 a 25.809397,21.920311 0 1 1 -51.618796,0 25.809397,21.920311 0 1 1 51.618796,0 z"
         transform="matrix(0.35622593,0,0,0.43953684,96.878109,941.41108)"
         id="path10773"
         style="opacity:0.76326533;fill:url(#radialGradient6329);fill-opacity:1;stroke:none;filter:url(#filter9518)" />
      <path
         d="m 80.963729,28.526606 a 8.1317282,8.1317282 0 1 1 -16.263456,0 8.1317282,8.1317282 0 1 1 16.263456,0 z"
         transform="matrix(0.87675745,0,0,0.87675745,21.568626,930.88683)"
         id="path10777"
         style="fill:url(#linearGradient6331);fill-opacity:1;stroke:none" />
      <path
         d="m 80.963729,28.526606 a 8.1317282,8.1317282 0 1 1 -16.263456,0 8.1317282,8.1317282 0 1 1 16.263456,0 z"
         transform="matrix(0.87675745,0,0,0.87675745,65.568626,930.88683)"
         id="path10779"
         style="fill:url(#linearGradient6333);fill-opacity:1;stroke:none" />
      <path
         d="m 80.963729,28.526606 a 8.1317282,8.1317282 0 1 1 -16.263456,0 8.1317282,8.1317282 0 1 1 16.263456,0 z"
         transform="matrix(0.87675745,0,0,0.87675745,21.568626,906.88683)"
         id="path10781"
         style="fill:url(#linearGradient6335);fill-opacity:1;stroke:none" />
      <path
         d="m 80.963729,28.526606 a 8.1317282,8.1317282 0 1 1 -16.263456,0 8.1317282,8.1317282 0 1 1 16.263456,0 z"
         transform="matrix(0.87675745,0,0,0.87675745,65.568626,906.88683)"
         id="path10783"
         style="fill:url(#linearGradient6337);fill-opacity:1;stroke:none" />
      <path
         d="m 80.963729,28.526606 a 8.1317282,8.1317282 0 1 1 -16.263456,0 8.1317282,8.1317282 0 1 1 16.263456,0 z"
         transform="matrix(0.87675745,0,0,0.87675745,21.568626,952.88683)"
         id="path10785"
         style="fill:url(#linearGradient6339);fill-opacity:1;stroke:none" />
      <path
         d="m 80.963729,28.526606 a 8.1317282,8.1317282 0 1 1 -16.263456,0 8.1317282,8.1317282 0 1 1 16.263456,0 z"
         transform="matrix(0.87675745,0,0,0.87675745,65.568626,952.88683)"
         id="path10787"
         style="fill:url(#linearGradient6341);fill-opacity:1;stroke:none" />
      <path
         d="m 78.3263,956.68402 c -0.0243,0.23968 -0.0238,0.4673 -0.0238,0.7134 0,3.93754 3.17267,7.13399 7.11021,7.13399 3.93755,0 7.13401,-3.19645 7.13401,-7.13399 0,-0.2461 5.5e-4,-0.47372 -0.0237,-0.7134 -0.39709,3.56154 -3.44272,6.32547 -7.11023,6.32547 -3.6675,0 -6.68935,-2.76393 -7.08643,-6.32547 z"
         id="path10791"
         style="fill:#ffffff;fill-opacity:1;stroke:none" />
      <path
         d="m 122.3263,956.68402 c -0.0243,0.23968 -0.0238,0.4673 -0.0238,0.7134 0,3.93754 3.17267,7.13399 7.11021,7.13399 3.93755,0 7.13401,-3.19645 7.13401,-7.13399 0,-0.2461 5.5e-4,-0.47372 -0.0237,-0.7134 -0.39709,3.56154 -3.44272,6.32547 -7.11023,6.32547 -3.6675,0 -6.68935,-2.76393 -7.08643,-6.32547 z"
         id="path10793"
         style="fill:#ffffff;fill-opacity:1;stroke:none" />
      <path
         d="m 122.3263,978.68402 c -0.0243,0.23968 -0.0238,0.4673 -0.0238,0.7134 0,3.93754 3.17267,7.13399 7.11021,7.13399 3.93755,0 7.13401,-3.19645 7.13401,-7.13399 0,-0.2461 5.5e-4,-0.47372 -0.0237,-0.7134 -0.39709,3.56154 -3.44272,6.32547 -7.11023,6.32547 -3.6675,0 -6.68935,-2.76393 -7.08643,-6.32547 z"
         id="path10795"
         style="fill:#ffffff;fill-opacity:1;stroke:none" />
      <path
         d="m 78.3263,978.68402 c -0.0243,0.23968 -0.0238,0.4673 -0.0238,0.7134 0,3.93754 3.17267,7.13399 7.11021,7.13399 3.93755,0 7.13401,-3.19645 7.13401,-7.13399 0,-0.2461 5.5e-4,-0.47372 -0.0237,-0.7134 -0.39709,3.56154 -3.44272,6.32547 -7.11023,6.32547 -3.6675,0 -6.68935,-2.76393 -7.08643,-6.32547 z"
         id="path10797"
         style="fill:#ffffff;fill-opacity:1;stroke:none" />
      <path
         d="m 78.3263,932.68402 c -0.0243,0.23968 -0.0238,0.4673 -0.0238,0.7134 0,3.93754 3.17267,7.13399 7.11021,7.13399 3.93755,0 7.13401,-3.19645 7.13401,-7.13399 0,-0.2461 5.5e-4,-0.47372 -0.0237,-0.7134 -0.39709,3.56154 -3.44272,6.32547 -7.11023,6.32547 -3.6675,0 -6.68935,-2.76393 -7.08643,-6.32547 z"
         id="path10799"
         style="fill:#ffffff;fill-opacity:1;stroke:none" />
      <path
         d="m 122.3263,932.68402 c -0.0243,0.23968 -0.0238,0.4673 -0.0238,0.7134 0,3.93754 3.17267,7.13399 7.11021,7.13399 3.93755,0 7.13401,-3.19645 7.13401,-7.13399 0,-0.2461 5.5e-4,-0.47372 -0.0237,-0.7134 -0.39709,3.56154 -3.44272,6.32547 -7.11023,6.32547 -3.6675,0 -6.68935,-2.76393 -7.08643,-6.32547 z"
         id="path10801"
         style="fill:#ffffff;fill-opacity:1;stroke:none" />
    </g>
  </g>
  
</svg>

      
        
        
        
EOD;

        return $html;
    }
    
    // ------------------------------------------------------------------------------------
    //
    // Create a part of the picture and return as string
    //
    public function StartDice() {
       /* 
        $html = <<<EOD
        <!-- Here is dice 1 -->
        <g id="dice1">
              <g transform="scale({$this->iScale})">
                  <path style="fill:#FFF;stroke:#000;stroke-width:7;" d="M71.4594727,553.5C34.0805664,553.5,3.5,522.9189453,3.5,485.5400391
                      V71.4594727C3.5,34.0820312,34.0805664,3.5,71.4594727,3.5h414.0805664C522.9179688,3.5,553.5,34.0820312,553.5,71.4594727
                      v414.0805664C553.5,522.9189453,522.9179688,553.5,485.5400391,553.5H71.4594727z"/>
                  <circle style="fill:red;stroke:#000;stroke-width:5;" cx="278.5" cy="278.5" r="57.1152344"/> 
              </g>
        </g>
        * 
        */
        
        $html = <<<EOD
      <?xml version="1.0" encoding="UTF-8" standalone="no"?>
<!-- Created with Inkscape (http://www.inkscape.org/) -->

<svg
   xmlns:dc="http://purl.org/dc/elements/1.1/"
   xmlns:cc="http://creativecommons.org/ns#"
   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
   xmlns:svg="http://www.w3.org/2000/svg"
   xmlns="http://www.w3.org/2000/svg"
   xmlns:xlink="http://www.w3.org/1999/xlink"
   version="1.1"
   width="200"
   height="201.38937"
   id="svg3308">
  <defs
     id="defs3310">
    <linearGradient
       x1="371"
       y1="272.36218"
       x2="397"
       y2="272.36218"
       id="linearGradient4131"
       xlink:href="#linearGradient4122"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(1,0,0,0.86398359,0,55.507248)" />
    <linearGradient
       id="linearGradient4122">
      <stop
         id="stop4124"
         style="stop-color:#babdb6;stop-opacity:1"
         offset="0" />
      <stop
         id="stop4126"
         style="stop-color:#d3d7cf;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="385.54996"
       y1="423.03714"
       x2="385.54996"
       y2="391.21735"
       id="linearGradient4149"
       xlink:href="#linearGradient4143"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       id="linearGradient4143">
      <stop
         id="stop4145"
         style="stop-color:#2e3436;stop-opacity:1"
         offset="0" />
      <stop
         id="stop4147"
         style="stop-color:#2e3436;stop-opacity:0"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="296.92764"
       y1="204.41388"
       x2="335.29044"
       y2="246.96756"
       id="linearGradient4467"
       xlink:href="#linearGradient4453"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       id="linearGradient4453">
      <stop
         id="stop4455"
         style="stop-color:#5c0000;stop-opacity:1"
         offset="0" />
      <stop
         id="stop4457"
         style="stop-color:#cc0000;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="300.0184"
       y1="282.64255"
       x2="337.61392"
       y2="338.32919"
       id="linearGradient4475"
       xlink:href="#linearGradient4453"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       id="linearGradient3208">
      <stop
         id="stop3210"
         style="stop-color:#5c0000;stop-opacity:1"
         offset="0" />
      <stop
         id="stop3212"
         style="stop-color:#cc0000;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="188.05568"
       y1="71.817673"
       x2="224.16241"
       y2="98.558395"
       id="linearGradient4483"
       xlink:href="#linearGradient4453"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       id="linearGradient3215">
      <stop
         id="stop3217"
         style="stop-color:#5c0000;stop-opacity:1"
         offset="0" />
      <stop
         id="stop3219"
         style="stop-color:#cc0000;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="196.41675"
       y1="152.35248"
       x2="231.80135"
       y2="204.76431"
       id="linearGradient4485"
       xlink:href="#linearGradient4453"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       id="linearGradient3222">
      <stop
         id="stop3224"
         style="stop-color:#5c0000;stop-opacity:1"
         offset="0" />
      <stop
         id="stop3226"
         style="stop-color:#cc0000;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="203.7706"
       y1="227.8766"
       x2="238.44749"
       y2="279.2402"
       id="linearGradient4487"
       xlink:href="#linearGradient4453"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       id="linearGradient3229">
      <stop
         id="stop3231"
         style="stop-color:#5c0000;stop-opacity:1"
         offset="0" />
      <stop
         id="stop3233"
         style="stop-color:#cc0000;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="674.68658"
       y1="477.81662"
       x2="688.10907"
       y2="519.5498"
       id="linearGradient4507"
       xlink:href="#linearGradient4501"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       id="linearGradient4501">
      <stop
         id="stop4503"
         style="stop-color:#a40000;stop-opacity:1"
         offset="0" />
      <stop
         id="stop4505"
         style="stop-color:#d14040;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="674.01837"
       y1="628.64252"
       x2="711.61395"
       y2="656.48584"
       id="linearGradient4515"
       xlink:href="#linearGradient4501"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       id="linearGradient3240">
      <stop
         id="stop3242"
         style="stop-color:#a40000;stop-opacity:1"
         offset="0" />
      <stop
         id="stop3244"
         style="stop-color:#d14040;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="543.40509"
       y1="405.38394"
       x2="575.78461"
       y2="434.96661"
       id="linearGradient4519"
       xlink:href="#linearGradient4501"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       id="linearGradient3247">
      <stop
         id="stop3249"
         style="stop-color:#a40000;stop-opacity:1"
         offset="0" />
      <stop
         id="stop3251"
         style="stop-color:#d14040;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="563.33685"
       y1="565.65973"
       x2="598.01379"
       y2="591.34155"
       id="linearGradient4517"
       xlink:href="#linearGradient4501"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       id="linearGradient3254">
      <stop
         id="stop3256"
         style="stop-color:#a40000;stop-opacity:1"
         offset="0" />
      <stop
         id="stop3258"
         style="stop-color:#d14040;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="345.76929"
       y1="-213.28308"
       x2="440.00244"
       y2="-223.63782"
       id="linearGradient4438"
       xlink:href="#linearGradient4432"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       id="linearGradient4432">
      <stop
         id="stop4434"
         style="stop-color:#a40000;stop-opacity:1"
         offset="0" />
      <stop
         id="stop4436"
         style="stop-color:#000000;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="353.25125"
       y1="-177.82069"
       x2="421"
       y2="-223.63782"
       id="linearGradient4447"
       xlink:href="#linearGradient4441"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       id="linearGradient4441">
      <stop
         id="stop4443"
         style="stop-color:#cc0000;stop-opacity:1"
         offset="0" />
      <stop
         id="stop4445"
         style="stop-color:#690000;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="294.53619"
       y1="115.56702"
       x2="333.68192"
       y2="144.5584"
       id="linearGradient4459"
       xlink:href="#linearGradient4453"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       id="linearGradient3269">
      <stop
         id="stop3271"
         style="stop-color:#5c0000;stop-opacity:1"
         offset="0" />
      <stop
         id="stop3273"
         style="stop-color:#cc0000;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="394"
       y1="-12.637817"
       x2="384.67792"
       y2="286.36218"
       id="linearGradient4167"
       xlink:href="#linearGradient4161"
       gradientUnits="userSpaceOnUse" />
    <linearGradient
       id="linearGradient4161">
      <stop
         id="stop4163"
         style="stop-color:#eeeeec;stop-opacity:1"
         offset="0" />
      <stop
         id="stop4165"
         style="stop-color:#d3d7cf;stop-opacity:1"
         offset="1" />
    </linearGradient>
    <linearGradient
       x1="394"
       y1="-12.637817"
       x2="384.67792"
       y2="286.36218"
       id="linearGradient3306"
       xlink:href="#linearGradient4161"
       gradientUnits="userSpaceOnUse"
       gradientTransform="matrix(0.45577571,0,0,0.45577571,-17.590162,380.24699)" />
  </defs>
  <metadata
     id="metadata3313">
    <rdf:RDF>
      <cc:Work
         rdf:about="">
        <dc:format>image/svg+xml</dc:format>
        <dc:type
           rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
        <dc:title></dc:title>
      </cc:Work>
    </rdf:RDF>
  </metadata>
  <g
     transform="translate(-57.736692,-366.18888)"
     id="layer1">
    <path
       d="m 150.34043,566.5355 c -1.03631,-0.32421 -3.03198,-1.24618 -4.43483,-2.04881 -3.86175,-2.20947 -69.024698,-49.45074 -71.486994,-51.82602 -2.637273,-2.54408 -3.777278,-5.39134 -4.689964,-11.71357 -0.367952,-2.54884 -3.254995,-24.52887 -6.415649,-48.8445 -6.550609,-50.39531 -6.577668,-50.78447 -3.917871,-56.35291 2.431988,-5.09151 7.715977,-9.32799 13.771874,-11.0417 6.081525,-1.72097 84.527404,-18.51911 86.482634,-18.51911 2.13884,0 77.22587,16.47019 83.04646,18.21607 6.90957,2.07253 12.48423,7.39031 14.31671,13.657 0.39814,1.36156 0.72389,4.1203 0.72389,6.13055 0,5.09264 -9.89993,101.15992 -10.72076,104.03253 -1.32935,4.65222 -1.85962,5.04351 -41.36849,30.52657 -40.76158,26.29106 -40.80438,26.31763 -44.38988,27.55122 -2.98144,1.02577 -8.0377,1.13353 -10.91713,0.23268 z"
       id="path4030"
       style="fill:url(#linearGradient3306);fill-opacity:1;stroke:none;display:inline" />
    <g
       transform="matrix(0.45577571,0,0,0.45577571,-17.590162,380.24699)"
       id="layer2"
       style="display:inline">
      <path
         d="m 370,142.36218 14,144 14,-144 0,262.50736 c -11.5,6.04788 -28,1.72796 -28,1.72796 l 0,-264.23532 z"
         id="rect4120"
         style="fill:url(#linearGradient4131);fill-opacity:1;stroke:none" />
      <path
         d="m 412.24325,396.16709 -31.46625,-4.94975 -21.92031,12.37437 18.38478,7.42462 12.72792,-0.70711 22.27386,-14.14213 z"
         id="path4133"
         style="fill:url(#linearGradient4149);fill-opacity:1;stroke:none" />
      <path
         d="m 335.29045,232.82543 c 0,15.69127 -7.77197,28.41155 -18.36557,28.41155 -10.59359,0 -19.99723,-12.72028 -19.99723,-28.41155 0,-15.69127 5.63339,-28.41155 17.95763,-28.41155 10.5936,0 20.40517,12.72028 20.40517,28.41155 z"
         id="path4353"
         style="fill:url(#linearGradient4467);fill-opacity:1;stroke:none;display:inline" />
      <path
         d="m 337.61393,310.48586 c 0,15.37744 -7.61653,27.84332 -17.99826,27.84332 -10.38171,0 -19.59728,-12.46588 -19.59728,-27.84332 0,-15.37744 5.52072,-27.84332 17.59848,-27.84332 10.38172,0 19.99706,12.46588 19.99706,27.84332 z"
         id="path4355"
         style="fill:url(#linearGradient4475);fill-opacity:1;stroke:none;display:inline" />
      <path
         d="m 224.16242,98.5584 c 0,14.76849 -7.3149,26.74072 -17.28552,26.74072 -9.9706,0 -18.82122,-11.97223 -18.82122,-26.74072 0,-14.768498 5.30209,-26.740726 16.90158,-26.740726 9.97059,0 19.20516,11.972228 19.20516,26.740726 z"
         id="path4357"
         style="fill:url(#linearGradient4483);fill-opacity:1;stroke:none;display:inline" />
      <path
         d="m 231.80135,178.5584 c 0,14.47312 -7.1686,26.20591 -16.93981,26.20591 -9.77118,0 -18.44479,-11.73279 -18.44479,-26.20591 0,-14.47313 5.19605,-26.20592 16.56355,-26.20592 9.77117,0 18.82105,11.73279 18.82105,26.20592 z"
         id="path4359"
         style="fill:url(#linearGradient4485);fill-opacity:1;stroke:none;display:inline" />
      <path
         d="m 238.4475,253.5584 c 0,14.18366 -7.02522,25.68179 -16.60101,25.68179 -9.57576,0 -18.07589,-11.49813 -18.07589,-25.68179 0,-14.18367 5.09212,-25.6818 16.23227,-25.6818 9.57575,0 18.44463,11.49813 18.44463,25.6818 z"
         id="path4361"
         style="fill:url(#linearGradient4487);fill-opacity:1;stroke:none;display:inline" />
      <g
         transform="matrix(-0.94857232,0,0,0.94857232,1096.0729,-308.80654)"
         id="g4383"
         style="display:inline">
        <path
           d="m 707.68191,490.5584 c 0,16.0115 -7.93058,28.99138 -18.74038,28.99138 -10.80979,0 -20.40534,-12.97988 -20.40534,-28.99138 0,-16.0115 5.74836,-28.99138 18.32412,-28.99138 10.80979,0 20.8216,12.97988 20.8216,28.99138 z"
           id="path4371"
           style="fill:url(#linearGradient4507);fill-opacity:1;stroke:none" />
        <path
           d="m 711.61393,656.48586 c 0,15.37744 -7.61653,27.84332 -17.99826,27.84332 -10.38171,0 -19.59728,-12.46588 -19.59728,-27.84332 0,-15.37744 5.52072,-27.84332 17.59848,-27.84332 10.38172,0 19.99706,12.46588 19.99706,27.84332 z"
           id="path4375"
           style="fill:url(#linearGradient4515);fill-opacity:1;stroke:none" />
        <path
           d="m 579.51184,432.12468 c 0,14.76849 -7.3149,26.74072 -17.28552,26.74072 -9.9706,0 -18.82122,-11.97223 -18.82122,-26.74072 0,-14.7685 5.30209,-26.74073 16.90158,-26.74073 9.97059,0 19.20516,11.97223 19.20516,26.74073 z"
           id="path4377"
           style="fill:url(#linearGradient4519);fill-opacity:1;stroke:none" />
        <path
           d="m 598.01378,591.34154 c 0,14.18366 -7.02522,25.68179 -16.60101,25.68179 -9.57576,0 -18.07589,-11.49813 -18.07589,-25.68179 0,-14.18367 5.09212,-25.6818 16.23227,-25.6818 9.57575,0 18.44463,11.49813 18.44463,25.6818 z"
           id="path4381"
           style="fill:url(#linearGradient4517);fill-opacity:1;stroke:none" />
        <path
           d="m 702.63691,494.01431 c 0,15.69127 -7.77197,28.41155 -18.36557,28.41155 -10.59359,0 -19.99723,-12.72028 -19.99723,-28.41155 0,-15.69127 5.63339,-28.41155 17.95763,-28.41155 10.5936,0 20.40517,12.72028 20.40517,28.41155 z"
           id="path4521"
           style="opacity:0.25;fill:#ffffff;fill-opacity:1;stroke:none" />
        <path
           d="m 705.23505,657.26637 c 0,15.37744 -7.61653,27.84332 -17.99826,27.84332 -10.38171,0 -19.59728,-12.46588 -19.59728,-27.84332 0,-15.37744 5.52072,-27.84332 17.59848,-27.84332 10.38172,0 19.99706,12.46588 19.99706,27.84332 z"
           id="path4525"
           style="opacity:0.25;fill:#ffffff;fill-opacity:1;stroke:none" />
        <path
           d="m 592.1852,594.21248 c 0,14.47312 -7.1686,26.20591 -16.93981,26.20591 -9.77119,0 -18.44479,-11.73279 -18.44479,-26.20591 0,-14.47312 5.19605,-26.20591 16.56355,-26.20591 9.77117,0 18.82105,11.73279 18.82105,26.20591 z"
           id="path4527"
           style="opacity:0.25;fill:#ffffff;fill-opacity:1;stroke:none" />
        <path
           d="m 573.66109,434.96662 c 0,15.06989 -7.46419,27.28645 -17.63829,27.28645 -10.17408,0 -19.20533,-12.21656 -19.20533,-27.28645 0,-15.06989 5.4103,-27.28645 17.24651,-27.28645 10.17408,0 19.59711,12.21656 19.59711,27.28645 z"
           id="path4529"
           style="opacity:0.25;fill:#ffffff;fill-opacity:1;stroke:none" />
      </g>
      <path
         d="m 421,-202.63782 a 47,21 0 1 1 -94,0 47,21 0 1 1 94,0 z"
         transform="matrix(0.72036474,0,0,0.57142857,114.72644,141.15522)"
         id="path4395"
         style="fill:url(#linearGradient4438);fill-opacity:1;stroke:none;display:inline" />
      <path
         d="m 421,-202.63782 c 0,11.59798 -21.04262,24.81712 -47,24.81712 -25.95738,0 -47,-13.21914 -47,-24.81712 0,-11.59798 21.04262,-21 47,-21 25.95738,0 47,9.40202 47,21 z"
         transform="matrix(0.68047113,0,0,0.3704919,129.086,103.30397)"
         id="path4409"
         style="fill:url(#linearGradient4447);fill-opacity:1;stroke:none;display:inline" />
      <path
         d="m 333.68191,144.5584 c 0,16.0115 -7.93058,28.99138 -18.74038,28.99138 -10.80979,0 -20.40534,-12.97988 -20.40534,-28.99138 0,-16.0115 5.74836,-28.99138 18.32412,-28.99138 10.80979,0 20.8216,12.97988 20.8216,28.99138 z"
         id="path4348"
         style="fill:url(#linearGradient4459);fill-opacity:1;stroke:none;display:inline" />
      <path
         d="m 333.29507,145.44219 c 2.9121,13.24091 -1.28547,25.41717 -10.22478,27.3832 -8.93929,1.96603 -19.23517,-7.02265 -22.14726,-20.26356 -2.9121,-13.24091 -0.51914,-25.02027 9.88055,-27.30749 8.93928,-1.96603 19.5794,6.94694 22.49149,20.18785 z"
         id="path4489"
         style="opacity:0.25;fill:#ffffff;fill-opacity:1;stroke:none;display:inline" />
      <path
         d="m 335.46903,233.01413 c 2.85386,12.97609 -1.25976,24.90882 -10.02029,26.83553 -8.7605,1.92671 -18.85046,-6.8822 -21.70431,-19.85829 -2.85386,-12.97609 -0.50876,-24.51986 9.68294,-26.76134 8.76049,-1.92671 19.18781,6.808 22.04166,19.7841 z"
         id="path4491"
         style="opacity:0.25;fill:#ffffff;fill-opacity:1;stroke:none;display:inline" />
      <path
         d="m 337.14951,310.08463 c 2.79678,12.71656 -1.23457,24.41064 -9.81989,26.29882 -8.58529,1.88817 -18.47345,-6.74456 -21.27022,-19.46113 -2.79678,-12.71657 -0.49858,-24.02946 9.48928,-26.22611 8.58528,-1.88818 18.80406,6.67184 21.60083,19.38842 z"
         id="path4493"
         style="opacity:0.25;fill:#ffffff;fill-opacity:1;stroke:none;display:inline" />
      <path
         d="m 226.64951,99.79075 c 2.79678,12.71656 -1.23457,24.41064 -9.81989,26.29882 -8.58529,1.88817 -18.47345,-6.74456 -21.27022,-19.46113 -2.79678,-12.71656 -0.49858,-24.029457 9.48928,-26.226104 8.58528,-1.888174 18.80406,6.671841 21.60083,19.388414 z"
         id="path4495"
         style="opacity:0.25;fill:#ffffff;fill-opacity:1;stroke:none;display:inline" />
      <path
         d="m 234.33638,177.85984 c 2.74084,12.46223 -1.20988,23.92242 -9.62349,25.77284 -8.41359,1.85041 -18.10398,-6.60967 -20.84482,-19.07191 -2.74084,-12.46223 -0.48861,-23.54887 9.2995,-25.70158 8.41357,-1.85041 18.42797,6.53841 21.16881,19.00065 z"
         id="path4497"
         style="opacity:0.25;fill:#ffffff;fill-opacity:1;stroke:none;display:inline" />
      <path
         d="m 241.02951,253.92754 c 2.68603,12.21299 -1.18568,23.44398 -9.43102,25.25739 -8.24532,1.8134 -17.7419,-6.47748 -20.42792,-18.69047 -2.68603,-12.21299 -0.47884,-23.0779 9.11351,-25.18755 8.2453,-1.8134 18.05941,6.40764 20.74543,18.62063 z"
         id="path4499"
         style="opacity:0.25;fill:#ffffff;fill-opacity:1;stroke:none;display:inline" />
    </g>
  </g>
</svg>

                
EOD;

        return $html;
    }
    

} // End of class
?>
