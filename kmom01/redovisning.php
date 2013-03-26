<?php

$html = <<<EOD
<div id="main-content">   
<div id="left-col">	
	<h1>Kursmoment 01</h1> 
    <h2>Intro till PHP i webbmiljö</h2>
    <h3>Uppgifterna</h3>
    <ol>
        <li><a href="hello/hello.php">Hello</a></li>
        <li><a href="hello/strings.php">String</a></li>            
    </ol>    
     <h3>Tankar kring momentet</h3>
    <p>
        Första kursmomenten kändes bra. Eftersom jag kan en
        hel del av det här sedan tidigare så hade jag inga större problem att
        lösa uppgifterna eller att komma igång med labbmiljön. Upplägget var
        lite annorlunda då redovsningssidan skulle göras mot föregående kurs.
        Men det är bra att få prova på olika include varianter av header, 
        main och footer. Att jobba med HEREDOC stränghantering var också en ny varianter
        som jag tyckte var bra att prova på. Att köra kodtest är kanon 
        då ser du vilka problem  som uppstår direkt. Kan vara tungt ibland men du 
        lär dig en massa när du rättar koden. Sammantaget så kändes det som en 
        bra komma-igång övning och jag ser fram emot att få lite större utmaningar 
        i kommande kursmoment.
    </p>  

    <h3>Min syn på PHP och programmering i webbmiljö</h3> 
        <p>
            Jag tycker det ska bli kul att utveckla min
            kunskaper inom området. Då jag parallellt med studierna
            kör egna kurser i webbprogrammering där PHP ingår. Det gör
            att jag hela tiden kan ta med mig nyvunna kunskaper 
            in i mitt eget arbete. Har provat på lite asp och jsp 
            kodning tidigare. Har på senare tid börjat programmera i 
            <a href="http://www.sublimetext.com/2" target="_blank">Sublime Text</a> som 
            jag tycker är en bra editor med många finesser.            
        </p>

     <h3>Min erfarenhet av programmering och datorer</h3>   
        <p>
            Började min datakarriär med en Amiga 500 tror det var -92.
            Jag har programmerat sedan 1997 då jag gick min första
            programmerings grundkurs i Java på Högskolan Gävle. Jag har
            sedan dess jobbat med Java programmering på min skola. Har även kört
            databaser och webbdesign. Har pulat lite med hårdvaran också men har 
            fått övergett det då all tid nu läggs på programmering och webbutveckling.
        </p>

     <h4>Tankenöt 1</h4>   
     <p>
        Matade in en bokstav direkt i adressfältet istället för formuläret.
        Då kunde jag utesluta vilka tecken som var med i ordet. Det gjorde att
        jag sedan kunde fylla i formuläret med de rätta bokstäverna och slippa 
        bli hängd.  
     </p>

    <h4>Tankenöt 2</h4>   
    <p>     
        Index följer ju med i URL adressen det gör att du vet vilket ord i listan
        som används genom att kolla källkoden. Första ordet ligger på plats 8 = php 
        och andra ordet på plats 3 = tant. Det är ju inte alltid man kommer åt 
        källkoden :)
    </p>

</div> <!-- END left-col -->			
<div class="clear"></div>
</div> <!-- END main-content -->    	
EOD;

//--------------------
// Skapa och skriv ut sidan

require_once('common.php');
$title = "Redovisning Ralf E";
$charset = "iso-8859-1";
$language = "sv";

$html = <<<EOD
<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{$language}" lang="{$language}">  
    <head>
       <meta http-equiv="Content-Type" content="text/html; charset={$charset}" />
        <title>{$title}</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>
    	<body>
    		<div id="wrapper"> 
    		{$header}	    		      
	        {$html}
	        </div><!-- END wrapper -->       
    		{$footer}
    	</body>
</html>
EOD;
echo $html;
?>