<?php
/**
 * Created by PhpStorm.
 * User: islam
 * Date: 18/11/2016
 * Time: 18:05
 */

// start session.
if(!isset($_SESSION)) {
    session_start();
}

// Directory separator.
defined("DS") || define("DS", DIRECTORY_SEPARATOR);

// Check if it is defined do nothing, otherwise define the constant.
// Website domain name with http.
defined("WEBSITE_URL") || define("WEBSITE_URL", "http://".$_SERVER['SERVER_NAME']);

// Root path.
defined("ROOT_PATH") || define("ROOT_PATH", realpath(dirname(__FILE__).DS."..".DS));

// Classes folder.
defined("CLASSES_FOLDER") || define("CLASSES_FOLDER", "classes");

// Pages folder.
defined("PAGES_FOLDER") || define("PAGES_FOLDER", "pages");

// Modules folder.
defined("MODULES_FOLDER") || define("MODULES_FOLDER", "modules");

// Include folder.
defined("INCLUDE_FOLDER") || define("INCLUDE_FOLDER", "include");

// Templates folder.
defined("TEMPLATE_FOLDER") || define("TEMPLATE_FOLDER", "template");

// Add all above directories to the include path.
set_include_path(
    implode(
        PATH_SEPARATOR, array(
            realpath(ROOT_PATH.DS.CLASSES_FOLDER),
            realpath(ROOT_PATH.DS.PAGES_FOLDER),
            realpath(ROOT_PATH.DS.MODULES_FOLDER),
            realpath(ROOT_PATH.DS.INCLUDE_FOLDER),
            realpath(ROOT_PATH.DS.TEMPLATE_FOLDER),
            get_include_path()
        )
    )
);