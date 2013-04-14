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
        
 	<h1>Kursmoment 02/03</h1> 
    <h2>Mitt eget Hangman</h2>
    <h3>Uppgiften t�rning/matematiska funktioner</h3>
    <ol>
        <li><a href="dice/dice.php">Dice/Math</a></li>                  
    </ol>    
     <h3>Tankar kring momentet</h3>
    <p>
        Ett kul moment. Har jobbat en del med Hangman i Java milj�.
        S� det var en hel del saker jag k�nde igen. Det var 
        dock en en del skillnader mot mina tidigare l�sningar i Java.
        Framf�rallt att du kunde utnyttja str�ng-metoderna
        f�r att fixa hanteringen av hemliga ordet samt inmatat tecken d�
        de olika kraven skulle fixas. M�ste nog kolla om jag kan g�ra 
        desamma i Java n�r jag har tid �ver.
    </p>
    <p>    
        Det blev en del koll p� befintlig kod f�r att f� till det. 
        Jag dokumenterade all kod s� att jag fick en bra k�nsla f�r
        hur koden fungerar vilket jag tycker gav mycket. Blev en hel
        del kollande i PHP manualen f�r att f�rst� hur metoderna fungerade.
    </p>     
    
     <h4>Tanken�t 1</h4>   
     <p>
        Skapade en egen metod DrawHuvud() som g�r ett lokalt metodanrop
        p� den befintliga metoden GetHuvud() som redan var skapad i klassen.       
     </p>

    <h4>Tanken�t 2</h4>   
    <p>     
        B�rjade tr�na p� SVG som var nytt f�r mig.
        Jag b�rjade med att skriva egna svg koder, ovaler, elipser mm.
        N�r jag f�rstod hur det var uppbyggt testade jag f�rst Inscape
        men gick sedan �ver till Illustrator f�r att rita min egen gubbe.
        Den �r v�l inte den snyggaste men jag satsade p� att f�rst� hur
        svg koden skulle hanteras i de olika stegen fr�n bildprogram till 
        implementering.
    </p>
        
   <h1>Kursmoment 04</h1> 
    <h2>Funktioner, klasser och objekt</h2>
        
        <h3>Uppgiften kasta gris</h3>
        <ol>
            <li><a href="pigGame/pig.php" target="_blank">Pig Game</a></li>                  
        </ol>  
       
     <h3>Min syn p� Objektorientering, funktionsorientering</h3>
    <p>
        Jag �r en f�respr�kare av objektorinterad programmering. Jag tycker att
        det ger en otroligt bra struktur p� koden. Funktionsorientering kan vara
        bra i vissa l�gen n�r programmet inte �r s� stort. N�r du t.ex. beh�ver
        funktioner f�r att l�sa uppgifter i ditt program.        
     </p>
     <p>
        Jag har jobbat mycket med Java-programmering vilket g�r att
        jag har mest erfarenhet av objektorienterad programmering. 
        D�rf�r k�nns det bra att PHP har implementerar det. Variablers
        synlighet, konstruktor och metodernas uppbyggnad �r ju
        v�ldigt likt Java s� det k�nns sk�nt.
     </p>
     <p>
          Jag best�mde mig att bygga t�rningsspelet pig som
        jag tidigare inte provat p�. Jag b�rjade med en spelare
        men gick sedan �ver till att g�ra spelet komplett. 
     </p>
     <p>
        Det blev en hel del funderande, programmerande, testande och 
       t�nkande innan den slutliga l�sningen blev klar. Projektet var helt klart
       l�rorikt, jag fick en bra syn p� hur PHP fungerar i objektorienterad milj�. 
           N�r v�l klassen med spelare blev klar s� blev det
        lite l�ttare att f� struktur p� spelet.
        Det som var nytt f�r mig var att lagra variabler
        i g�mda formul�r och sedan skicka in det i koden
        och instansiera objekt med dessa v�rden hela tiden.
        Det tog ett tag innan poletten trillade ner.
        Sedan var det lite strul att f� v�rdet att �terg�
        till startv�rdet, d� du sl�r en etta i din runda men
        det l�ste sig till slut. Jag k�nner mig n�jd med
        projektet och ser fram emot att ta tag i n�sta
        projekt. Vi f�r se om det g�r l�ttare nu n�r jag
        b�rjat komma ig�ng med objektorienterad PHP.
     </p>      
        
   <h1>Kursmoment 05</h1> 
    <h2>Objektorienterad programmering i PHP</h2>
        <p>
            Jag best�mde mig f�r att f�lja Mikaels kod och
            bygga vidare p� den. F�r att p� det viset kunna l�sa och f�rs�ka f�rst�
            hur programmet �r uppbyggt. Tycker jag f�rst�r koden bra men att skriva
            allt sj�lv �r jag inte riktigt redo f�r �nnu utan det beh�vs mer tr�ning
            och f�rst�else hur PHP fungerar i den objektorieterade v�rlden. 
        </p>       
        <p>
            Sessioner var det som intresserade mig mest samt hur du kan rita ut kort.
            Att lagra objekt i sessioner kommer jag att kunna utnyttja mera d� jag
            tycker det var ett bra uppl�gg i den spelutvecklingen vi har sysslat med p� slutet.
            Jag letade l�nge p� n�tet efter olika s�tt att rita upp korten. Jag hittade
            flera l�nkar men den sista hittade jag hittade p� forumet som jag tyckte 
            var den som var b�st <a href="http://svg-cards.sourceforge.net/" target="_blank">http://svg-cards.sourceforge.net/</a>
            Det var en SVG variant som jag kommer att anv�nda om jag ska bygga
            n�gra flera kortspel i framtiden. Det fick r�cka med CSS varianten den
            h�r g�ngen. Jag gjorde lite design f�r�ndringar p� high och low spelet.
            Jag fixade s� att ett kort ligger ute med ryggen upp vid start s� att det
            ser mera realistiskt ut vid spel. �ndrade kortdesignen s� att det
            blev tydligare att se vilket kort som ligger ute p� spelplanen.
        </p>
        <p>
            Det var en hel del att klura p�. Jag fick rita upp ett schema �ver klasserna
            f�r att f�rst� hur de sammarbetade i programmet. Det gjorde att jag enklare 
            att f�rst� alla anrop i koden. Har inte kommit p� n�gon
            annan klasskonstruktion jag tycker att det hela var bra organiserat.
        </p>
        <p>
            N�t jag skulle vilja vidareutveckla �r designen p� korten med hj�lp av SVG samt
            att f� High och Low att endast visa tv� kort vid spel det skulle k�nnas mer realistiskt.
            Att kunna spela med en insats av n�got slag samt en highscorelista med  
            resultat p� vem som lyckats g�ra flest antal r�tta gissningar.
            Dessa till�gg skulle vara kul att fixa vid ett senare tillf�lle.        
        </p>        
        <p>
            <a href="http://www.student.bth.se/~raer12/oophp/kmom05/highLow/highlow.php">Spela HighLow</a>       
        </p>
        
        <h1>Kursmoment 06</h1> 
    <h2>Databaser, SQL och PHP</h2>
        <p>
            Momentet gick bra. Jag k�nner att det h�r �r ett omr�de jag beh�rskar
            ganska bra. Det enda som var lite klurigt var att fixa v�ns�k s� att den visade
            namnet och utrustning p� de personer jag gjorde en s�kning p�.
            Den blev bra till slut och jag k�nner mig n�jd med uppgiften.
         </p>
         <p>
            En sak som tog lite tid att fixa var inloggning till skolans PHPMyAdmin, men som tur var hade
            jag gjort det en g�ng f�rut s� det l�ste sig. Men det �r en hel del fixande med l�sen mm innan 
            allt fungerar. V�l inloggad s� fungerar PHPMyAdmin bra. Jag har jobbat
            i det tidigare s� jag k�nner mig trygg i den milj�n. Jag jobbar hellre i det gr�nssnittet �n i konsolmilj�n.            
        </p>   
        <p>
            Nya kunskaper som att koppla databasen med mysqli och samt att definera globala konstanter med hj�lp av define() 
            var bra att l�ra sig. Att jobba mot vyer var ocks� l�rorikt.       
        </p>        
        <p>
            Jag har jobbat med databaser f�rut men mest med Access men p� senare tid
            har MySql tagit �ver. Jag tycker att SQL-spr�ket �r det enklaste dataspr�ket du kan jobba med. 
            Det �r d�remot mer problematiskt att bygga upp en databas med r�tt relationer och data.
        </p>              
        
        <p>
              <a href="http://www.student.bth.se/~raer12/oophp/kmom06/search/friendSearchGoogle.php" target="_blank">Friend Search</a>    
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