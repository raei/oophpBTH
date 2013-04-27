 <?php
// ===========================================================================================
//
// CRoom.php
//
// Description: A class for presenting a room in an adventure game.
//
// Author: Ralf Eriksson
//


class CRoom {  

    // -------------------------------------------------------------------------------------------
    //
    // Member variables
    //
    // http://php.net/manual/en/language.oop5.constants.php
    //
    protected $iMysqli;
    public $iId;
    public $iTitle;
    public $iDescription;
    public $iGraphics;
    public $iConnections;
    public $iActions;
    

    // -------------------------------------------------------------------------------------------
    //
    // Constructor
    // http://www.php.net/manual/en/language.oop5.decon.php
    //
    function __construct() {
        ;
    }


    // -------------------------------------------------------------------------------------------
    //
    // Destructor
    // http://www.php.net/manual/en/language.oop5.decon.php
    //
    function __destruct() {
        ;
    }


    // -------------------------------------------------------------------------------------------
    //
    // Connect to the database.
    //
    //
    protected function ConnectToDatabase() {

        require_once('config.php');
        $this->iMysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        !mysqli_connect_error() or die("Connect failed: ".mysqli_connect_error()."<br>");
    }


    // -------------------------------------------------------------------------------------------
    //
    // Read info from database, store in member variables.
    //
    //
    public function ReadFromDatabase($aIdRoom) {

        // Connect
        $this->ConnectToDatabase();       

        // Sanitize
        $idRoom = $this->iMysqli->real_escape_string($aIdRoom);

        // Prepare query
        $query = <<<EOD
SELECT * FROM rum WHERE id = '{$idRoom}';
SELECT * FROM rumkoppling WHERE id_Rum1 = '{$idRoom}';
EOD;

        // Perform query
        $res = $this->iMysqli->multi_query($query) 
            or die("Could not query database, query =<br/><pre>{$query}</pre><br/>{$this->iMysqli->error}");

        // Store all resultsets
        $results = Array();
        $i = 0;
        do {
            $results[$i++] = $this->iMysqli->store_result();        
        } while($this->iMysqli->more_results() && $this->iMysqli->next_result());
                                   

        // Check if there is a database error
        !$this->iMysqli->errno or die("<p>Query =<br/><pre>{$query}</pre><br/>Error code: {$this->iMysqli->errno} ({$this->iMysqli->error})</p>");

        // Use resultset 0
        $row = $results[0]->fetch_object();

        $this->iId          = $row->id;
        $this->iTitle       = $row->namn;
        $this->iDescription = $row->beskrivning;
        $this->iGraphics    = $row->grafik;


        // Use resultset 1
        $this->iConnections = "";
        while($row = $results[1]->fetch_object()) {  
            $this->iConnections .= '<li>';
            $this->iConnections .= "<a href='{$_SERVER['PHP_SELF']}?id={$row->id_Rum2}'>{$row->namn}</a> ";
            $this->iConnections .= '</li>';            
        }       

        // Close
        $results[0]->close(); 
        $results[1]->close(); 
        $this->iMysqli->close(); 
    }//end method ReadFromDatabase
    
     // -------------------------------------------------------------------------------------------
    //
    // return numbers of rooms
    //
    //
    public function CountRooms() {
        
        // Connect
        $this->ConnectToDatabase();            
        // Prepare query
        $query = <<<EOD
        SELECT COUNT(*) FROM rum;
EOD;
        // Perform query
        $res = $this->iMysqli->query($query) 
            or die("Could not query database, query =<br/><pre>{$query}</pre><br/>{$this->iMysqli->error}");
            
        $row = $res->fetch_row();          
        return $row[0];   
        
        $this->iMysqli->close(); 
        
    }//end countrooms
    

} // End of class

?> 