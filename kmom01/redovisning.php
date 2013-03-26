<?php

$html = <<<EOD
<div id="main-content">   
<div id="left-col">	
	<h1>Kursmoment 01</h1> 
    <h2>Intro till PHP i webbmilj�</h2>
    <h3>Uppgifterna</h3>
    <ol>
        <li><a href="hello/hello.php">Hello</a></li>
        <li><a href="hello/strings.php">String</a></li>            
    </ol>    
     <h3>Tankar kring momentet</h3>
    <p>
        F�rsta kursmomenten k�ndes bra. Eftersom jag kan en
        hel del av det h�r sedan tidigare s� hade jag inga st�rre problem att
        l�sa uppgifterna eller att komma ig�ng med labbmilj�n. Uppl�gget var
        lite annorlunda d� redovsningssidan skulle g�ras mot f�reg�ende kurs.
        Men det �r bra att f� prova p� olika include varianter av header, 
        main och footer. Att jobba med HEREDOC str�nghantering var ocks� en ny varianter
        som jag tyckte var bra att prova p�. Att k�ra kodtest �r kanon 
        d� ser du vilka problem  som uppst�r direkt. Kan vara tungt ibland men du 
        l�r dig en massa n�r du r�ttar koden. Sammantaget s� k�ndes det som en 
        bra komma-ig�ng �vning och jag ser fram emot att f� lite st�rre utmaningar 
        i kommande kursmoment.
    </p>  

    <h3>Min syn p� PHP och programmering i webbmilj�</h3> 
        <p>
            Jag tycker det ska bli kul att utveckla min
            kunskaper inom omr�det. D� jag parallellt med studierna
            k�r egna kurser i webbprogrammering d�r PHP ing�r. Det g�r
            att jag hela tiden kan ta med mig nyvunna kunskaper 
            in i mitt eget arbete. Har provat p� lite asp och jsp 
            kodning tidigare. Har p� senare tid b�rjat programmera i 
            <a href="http://www.sublimetext.com/2" target="_blank">Sublime Text</a> som 
            jag tycker �r en bra editor med m�nga finesser.            
        </p>

     <h3>Min erfarenhet av programmering och datorer</h3>   
        <p>
            B�rjade min datakarri�r med en Amiga 500 tror det var -92.
            Jag har programmerat sedan 1997 d� jag gick min f�rsta
            programmerings grundkurs i Java p� H�gskolan G�vle. Jag har
            sedan dess jobbat med Java programmering p� min skola. Har �ven k�rt
            databaser och webbdesign. Har pulat lite med h�rdvaran ocks� men har 
            f�tt �vergett det d� all tid nu l�ggs p� programmering och webbutveckling.
        </p>

     <h4>Tanken�t 1</h4>   
     <p>
        Matade in en bokstav direkt i adressf�ltet ist�llet f�r formul�ret.
        D� kunde jag utesluta vilka tecken som var med i ordet. Det gjorde att
        jag sedan kunde fylla i formul�ret med de r�tta bokst�verna och slippa 
        bli h�ngd.  
     </p>

    <h4>Tanken�t 2</h4>   
    <p>     
        Index f�ljer ju med i URL adressen det g�r att du vet vilket ord i listan
        som anv�nds genom att kolla k�llkoden. F�rsta ordet ligger p� plats 8 = php 
        och andra ordet p� plats 3 = tant. Det �r ju inte alltid man kommer �t 
        k�llkoden :)
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