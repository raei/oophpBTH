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
        
 	<h1>Kursmoment 02/03</h1> 
    <h2>Mitt eget Hangman</h2>
    <h3>Uppgiften tärning/matematiska funktioner</h3>
    <ol>
        <li><a href="dice/dice.php">Dice/Math</a></li>                  
    </ol>    
     <h3>Tankar kring momentet</h3>
    <p>
        Ett kul moment. Har jobbat en del med Hangman i Java miljö.
        Så det var en hel del saker jag kände igen. Det var 
        dock en en del skillnader mot mina tidigare lösningar i Java.
        Framförallt att du kunde utnyttja sträng-metoderna
        för att fixa hanteringen av hemliga ordet samt inmatat tecken då
        de olika kraven skulle fixas. Måste nog kolla om jag kan göra 
        desamma i Java när jag har tid över.
    </p>
    <p>    
        Det blev en del koll på befintlig kod för att få till det. 
        Jag dokumenterade all kod så att jag fick en bra känsla för
        hur koden fungerar vilket jag tycker gav mycket. Blev en hel
        del kollande i PHP manualen för att förstå hur metoderna fungerade.
    </p>     
    
     <h4>Tankenöt 1</h4>   
     <p>
        Skapade en egen metod DrawHuvud() som gör ett lokalt metodanrop
        på den befintliga metoden GetHuvud() som redan var skapad i klassen.       
     </p>

    <h4>Tankenöt 2</h4>   
    <p>     
        Började träna på SVG som var nytt för mig.
        Jag började med att skriva egna svg koder, ovaler, elipser mm.
        När jag förstod hur det var uppbyggt testade jag först Inscape
        men gick sedan över till Illustrator för att rita min egen gubbe.
        Den är väl inte den snyggaste men jag satsade på att förstå hur
        svg koden skulle hanteras i de olika stegen från bildprogram till 
        implementering.
    </p>
        
   <h1>Kursmoment 04</h1> 
    <h2>Funktioner, klasser och objekt</h2>
        
        <h3>Uppgiften kasta gris</h3>
        <ol>
            <li><a href="pigGame/pig.php" target="_blank">Pig Game</a></li>                  
        </ol>  
       
     <h3>Min syn på Objektorientering, funktionsorientering</h3>
    <p>
        Jag är en förespråkare av objektorinterad programmering. Jag tycker att
        det ger en otroligt bra struktur på koden. Funktionsorientering kan vara
        bra i vissa lägen när programmet inte är så stort. När du t.ex. behöver
        funktioner för att lösa uppgifter i ditt program.        
     </p>
     <p>
        Jag har jobbat mycket med Java-programmering vilket gör att
        jag har mest erfarenhet av objektorienterad programmering. 
        Därför känns det bra att PHP har implementerar det. Variablers
        synlighet, konstruktor och metodernas uppbyggnad är ju
        väldigt likt Java så det känns skönt.
     </p>
     <p>
          Jag bestämde mig att bygga tärningsspelet pig som
        jag tidigare inte provat på. Jag började med en spelare
        men gick sedan över till att göra spelet komplett. 
     </p>
     <p>
        Det blev en hel del funderande, programmerande, testande och 
       tänkande innan den slutliga lösningen blev klar. Projektet var helt klart
       lärorikt, jag fick en bra syn på hur PHP fungerar i objektorienterad miljö. 
           När väl klassen med spelare blev klar så blev det
        lite lättare att få struktur på spelet.
        Det som var nytt för mig var att lagra variabler
        i gömda formulär och sedan skicka in det i koden
        och instansiera objekt med dessa värden hela tiden.
        Det tog ett tag innan poletten trillade ner.
        Sedan var det lite strul att få värdet att återgå
        till startvärdet, då du slår en etta i din runda men
        det löste sig till slut. Jag känner mig nöjd med
        projektet och ser fram emot att ta tag i nästa
        projekt. Vi får se om det går lättare nu när jag
        börjat komma igång med objektorienterad PHP.
     </p>      
        
   <h1>Kursmoment 05</h1> 
    <h2>Objektorienterad programmering i PHP</h2>
        <p>
            Jag bestämde mig för att följa Mikaels kod och
            bygga vidare på den. För att på det viset kunna läsa och försöka förstå
            hur programmet är uppbyggt. Tycker jag förstår koden bra men att skriva
            allt själv är jag inte riktigt redo för ännu utan det behövs mer träning
            och förståelse hur PHP fungerar i den objektorieterade världen. 
        </p>       
        <p>
            Sessioner var det som intresserade mig mest samt hur du kan rita ut kort.
            Att lagra objekt i sessioner kommer jag att kunna utnyttja mera då jag
            tycker det var ett bra upplägg i den spelutvecklingen vi har sysslat med på slutet.
            Jag letade länge på nätet efter olika sätt att rita upp korten. Jag hittade
            flera länkar men den sista hittade jag hittade på forumet som jag tyckte 
            var den som var bäst <a href="http://svg-cards.sourceforge.net/" target="_blank">http://svg-cards.sourceforge.net/</a>
            Det var en SVG variant som jag kommer att använda om jag ska bygga
            några flera kortspel i framtiden. Det fick räcka med CSS varianten den
            här gången. Jag gjorde lite design förändringar på high och low spelet.
            Jag fixade så att ett kort ligger ute med ryggen upp vid start så att det
            ser mera realistiskt ut vid spel. Ändrade kortdesignen så att det
            blev tydligare att se vilket kort som ligger ute på spelplanen.
        </p>
        <p>
            Det var en hel del att klura på. Jag fick rita upp ett schema över klasserna
            för att förstå hur de sammarbetade i programmet. Det gjorde att jag enklare 
            att förstå alla anrop i koden. Har inte kommit på någon
            annan klasskonstruktion jag tycker att det hela var bra organiserat.
        </p>
        <p>
            Nåt jag skulle vilja vidareutveckla är designen på korten med hjälp av SVG samt
            att få High och Low att endast visa två kort vid spel det skulle kännas mer realistiskt.
            Att kunna spela med en insats av något slag samt en highscorelista med  
            resultat på vem som lyckats göra flest antal rätta gissningar.
            Dessa tillägg skulle vara kul att fixa vid ett senare tillfälle.        
        </p>        
        <p>
            <a href="http://www.student.bth.se/~raer12/oophp/kmom05/highLow/highlow.php">Spela HighLow</a>       
        </p>
        
        <h1>Kursmoment 06</h1> 
    <h2>Databaser, SQL och PHP</h2>
        <p>
            Momentet gick bra. Jag känner att det här är ett område jag behärskar
            ganska bra. Det enda som var lite klurigt var att fixa vänsök så att den visade
            namnet och utrustning på de personer jag gjorde en sökning på.
            Den blev bra till slut och jag känner mig nöjd med uppgiften.
         </p>
         <p>
            En sak som tog lite tid att fixa var inloggning till skolans PHPMyAdmin, men som tur var hade
            jag gjort det en gång förut så det löste sig. Men det är en hel del fixande med lösen mm innan 
            allt fungerar. Väl inloggad så fungerar PHPMyAdmin bra. Jag har jobbat
            i det tidigare så jag känner mig trygg i den miljön. Jag jobbar hellre i det gränssnittet än i konsolmiljön.            
        </p>   
        <p>
            Nya kunskaper som att koppla databasen med mysqli och samt att definera globala konstanter med hjälp av define() 
            var bra att lära sig. Att jobba mot vyer var också lärorikt.       
        </p>        
        <p>
            Jag har jobbat med databaser förut men mest med Access men på senare tid
            har MySql tagit över. Jag tycker att SQL-språket är det enklaste dataspråket du kan jobba med. 
            Det är däremot mer problematiskt att bygga upp en databas med rätt relationer och data.
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