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
<ul id="nav">
			<li><a href="me.php">HEM</a></li>
			<li><a href="redovisning.php">REDOVISNING</a></li>
			<li><a href="source.php">K�LLKOD</a></li>
			<li><a href="hangman.php">HANGMAN</a></li>
			<li><a href="http://validator.w3.org/check/referer">XHTML</a></li>
			<li><a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a></li>
</ul>
EOD;

// --------------------------------------------------------------------
//
// Common footer
//
$footer = <<<EOD
<div id = "footer">
<div id = "footer_wrapper">
	<div id = "copyright"> &copy; Ralf Eriksson, 2013</div><!-- end copyright -->
<<<<<<< HEAD
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
		
=======
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
>>>>>>> branch 'master' of https://github.com/raei/oophp.git
  </div><!-- end testerImg -->
  </div><!-- end footer_wrapper -->
</div><!-- end footer -->
EOD;
?>
