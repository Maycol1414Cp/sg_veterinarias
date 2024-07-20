<?php
define("CONTROLADOR_DEFECTO", "sessiones_login");
define("ACCION_DEFECTO", "index");

define("RUTA_BASE",$_SERVER['DOCUMENT_ROOT']."/");
define("HTTP_BASE","http://127.0.0.1/sg_veterinarias");
define('ROOT_DIR',RUTA_BASE.'sg_veterinarias');
define('ROOT_CORE',RUTA_BASE.'sg_veterinarias/core');
define('ROOT_UPLOAD',RUTA_BASE.'sg_veterinarias/uploads');
define('ROOT_VIEW',RUTA_BASE.'sg_veterinarias/view');
define('ROOT_REPORT',RUTA_BASE.'sg_veterinarias/reports');
define('ROOT_REPORT_DOWN',RUTA_BASE.'sg_veterinarias/reports_download');
define("URL_RESOURCES", HTTP_BASE."/public/");
//JWT TOKEN
define('SECRET_KEY','MIEMPRESA.MBmxKMifghY7d55sghvTlB1jyAjB3uN0g6ZDdOXpz21');  // secret key can be a random string and keep in secret from anyone
define('ALGORITHM','HS256');   // Algorithm used to sign the token



?>