<?php
// ======================================================================
//
// common.php
//
// Description: Use for header, footer and more...
//
// Author: Ralf Eriksson
//


// ---------------------------------------------------------------------
//
// Common header
//
$header = <<<EOD
<div id="header"></div>
        <div id ="navigation">
<ul id="nav">
	<li><a href="me.php">HEM</a>	</li>	
	<li><a href="redovisning.php">REDOVISNING</a>	</li>		
	<li><a href="#">PROJEKT</a>
		<ul><!-- Begin Sub Level -->			
			<li><a href="hangman.php">Hangman</a></li>
			<li><a href="dice.php">Dice</a></li>
                        <li><a href="pigGame/pig.php" target="_blank">Pig</a></li>
                        <li><a href="card.php">Kort</a></li>
                        <li><a href="hand.php">Hand</a></li>
                        <li><a href="deck.php">Kortlek</a></li>
                        <li><a href="session.php">Sessioner</a></li>                        
                        <li><a href="highLow/highlow.php">High Low</a></li>
		</ul><!-- End Sub Level -->	</li>	
        <li><a href="source.php">KÄLLKOD</a></li>
	<li><a href="http://validator.w3.org/check/referer">XHTML</a></li>
	<li><a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a></li>
</ul>
        </div>
        
EOD;

// --------------------------------------------------------------------
//
// Common footer
//
$footer = <<<EOD
<div id = "footer">
<div id = "footer_wrapper">
	<div id = "copyright"> &copy; Ralf Eriksson, 2013</div><!-- end copyright -->
	<div id = "testerImg">
		
    		<a href="http://validator.w3.org/check?uri=referer">
    			<img src="http://www.w3.org/Icons/valid-xhtml10" 
    			alt="Valid XHTML 1.0 Strict" height="31" width="88" />
    		</a>  		
			<a href="http://jigsaw.w3.org/css-validator/check/referer">
    			<img style="border:0;width:88px;height:31px"
        		src="http://jigsaw.w3.org/css-validator/images/vcss"
        		alt="Valid CSS!" />
        	</a>
		
  </div><!-- end testerImg -->
  </div><!-- end footer_wrapper -->
</div><!-- end footer -->
EOD;
?>