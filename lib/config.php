<?php

// constants to be used througout application
define("company_email", "affableit@gmail.com");
define("no_reply_email","no-reply@affableitsolutions.com");
define("angelo_email","angelo@affableitsolutions.com");


define("DB_HOST","localhost");

/* public db user credentials to view public page */
define("PUBLIC_DB_USERNAME","affaedco_pubview");
define("PUBLIC_DB_PASSWORD","pubicviewer");

/* private db user credentials to modify db */
define("DB_DATA_USERNAME","affaedco_data");
define("DB_DATA_PASSWORD","d@T@0R6@N1ZR");

/* name of database where listings and listings data can be found */
define("LISTINGS_DB_NAME","affaedco_listings");


define('ROOT_DIR', realpath(dirname(__FILE__)) .'/');
define('APP_DIR', ROOT_DIR .'cms/');

?>
