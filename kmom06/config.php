<?php
// ==================================================================
// User Settings -- CHANGE HERE
//
// On ssh.student.bth.se, protect the password in this file by 
// executing the following command (in the same directory as the file)
// 
//  sudo chgrp_www-data
// 
/* EXAMPLE
 
mos@sweet: ls -l config.php 
-rw-r--r-- 1 mos 500 407 2009-09-29 23:06 config.php
mos@sweet: sudo chgrp_www-data
[sudo] password for mos: 
mos@sweet: ls -l config.php 
-rw-r----- 1 mos www-data 407 2009-09-29 23:06 config.php
mos@sweet: 
*/
//
 
// Database
define('DB_USER',     'raer12');                    // <-- mysql db user
define('DB_PASSWORD', 'PNV=4Dd%');        // <-- mysql db password
define('DB_DATABASE', 'raer12');                    // <-- mysql db name
define('DB_HOST',     'blu-ray.student.bth.se'); // <-- mysql server host