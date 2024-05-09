<?php

defined('LARAVEL_START') or die();

defined('STDIN') or define('STDIN', fopen("php://stdin", "r"));

if (version_compare(PHP_VERSION, '8.2') === -1) {
    exit('You need at least PHP '.'8.2'.' to install this application.');
}

ob_start(); // Start output buffering at the beginning of the script
session_start();
error_reporting(1);

ini_set('display_errors', 1);
error_reporting(E_ALL);

// In your PHP script
ini_set('log_errors', 1);

$_SESSION['errors'] = [];
$_SESSION['fields'] = [];


if ($_SERVER['REQUEST_URI'] == '/' ) {
    header('Location: /install/wellcome'); exit();
}

// ensure pathname
if ($_SERVER['REQUEST_URI'] == '/install/' || $_SERVER['REQUEST_URI'] == '/install' ) {
   header('Location: /install/wellcome'); exit();
}

// request gent pathanem
$path = explode('/install/', current(explode('?', $_SERVER['REQUEST_URI'], 2)));
$prefix = $path[0];
$path = $path[1];

if ($path =='' || str_contains($path[1], '/')) {
    header("Location: {$prefix}/install/wellcome"); exit;
}

//page titles
$pages = array(
    'wellcome' => 'Wellcome to du7 admin Installer',
    'permissions' => 'Permissions',
    'requirements' =>'Requirements',
    'database' => 'Database Connection',
    'information' => 'General Information',
    'migrate' => 'Database Migrate',
    'seed' => 'Database Seeding',
    'create-user' => 'Create User',
    'success' =>'Success',
    'fails' => 'Fails',
);

if (!array_key_exists($path, $pages)) {
    header("Location: {$prefix}/install/"); exit;
}

define('PAGES', $pages);
define('PREFIX', "{$prefix}");
define('CURRENT_URI', "{$prefix}/install/{$path}");
define('CURRENT_PATH', $path);

/**
 * Get current page title
 *
 * @return string
 */
function get_title(): string{

    return PAGES[CURRENT_PATH];
}

/**
 * Get current page content
 */
function get_page_content() {
    $related_path =  "/pages/" .CURRENT_PATH.".php";
    $page = __DIR__ . $related_path;

    if(!file_exists($page)){
        exit("<center>Current page not found. <code>{$related_path}</code></center>");
    }

    require $page;
}

/**
 * make or get page url
 *
 * @param string|null
 * @return string;
 */
function url($path = null) : string {

    if($path == null){
        return PREFIX . "/install/". CURRENT_PATH;
    }

    return PREFIX . "/install/{$path}";
}

/**
 * Get next url
 *
 * @param null|string
 * @return string
 */
function next_url($path = null) : string {

    if($path == null){
        $path = CURRENT_PATH;
    }

    $pages = array_keys(PAGES);

    // search array value next index
    $next = array_search($path, $pages) + 1;

    if(!array_key_exists($next, $pages)){
        return "";
    }

    return PREFIX. "/install/{$pages[$next]}";
}

/**
 * Previus url
 *
 * @param null|string
 * @return string
 */
function prev_url($path = null) : string {

    if($path == null){
        $path = CURRENT_PATH;
    }

    $pages = array_keys(PAGES);

    // search array value next index
    $prev = array_search($path, $pages) - 1;

    if(!array_key_exists($prev, $pages)){
        return "";
    }

    return PREFIX. "/install_files/{$pages[$prev]}";
}

/**
 * get laravel url
 *
 * @return string
 */
function _laravel_url()  {

    // GET URL HTTP AND PORT
    $url = $_SERVER['HTTP_HOST'];

    if(!str_contains( $url, ':' )){
        $port = $_SERVER['SERVER_PORT'];

        if ($port!= 80 && $port!= 443) {
            $url.= ':'. $port;
        }
    }

    //scheme
    if(!str_contains($url, '://')){
        // get current url scheme
        $scheme = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        $url = $scheme . "://" . $url;
    }


    $url = $url . PREFIX;

    return $url;
}

/**
 * Get Laravel basepath
 *
 * @param null|string
 * @return string
 */
if(!function_exists('laravel_path')){

    function laravel_path($path = "") : string {

        if($path == ''){
            return dirname(getcwd());
        }

        $path = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $path);
        return dirname(getcwd()). DIRECTORY_SEPARATOR. $path;
    }

}

ini_set('error_log', laravel_path('error.log'));

/**
 * Check .env file
 */
if(!file_exists($target= laravel_path('.env'))){
    $source = laravel_path('.env.example');
    if(!file_exists($source)){
        ob_end_clean();
        throw new Exception(".env.example not found", 1);
    }

    //copy
    if (!copy($source, $target)) {
        ob_end_clean();
        throw new Exception("Fail: copy ~/.env.example to ~/.env", 1);
    }
}

/**
 * Ensure cms temp directory
 */
if (!is_dir($target = laravel_path('storage/cms'))) {
    if (!mkdir($target, 0777, true)) {
        ob_end_clean();
        // Directory creation failed, throw an error or handle it accordingly
        throw new Exception("Failed to create directory: $target");
    }
}

/**
 * get Installer path
 *
 * @param mixed $path
 * @return string
 */
function installer_path($path = "") : string {
    if($path == ""){
        return laravel_path("public/install_files");
    }
    return laravel_path("public/install_files/{$path}");
}


/**
 * Response json
 */
function json_response($message = "", $code = 200, $data = null){

    ob_end_clean();
    // clear the old headers
    header_remove();
    // set the actual code
    http_response_code($code);
    // set the header to make sure cache is forced
    header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
    // treat this as json
    header('Content-Type: application/json');
    $status = array(
        200 => '200 OK',
        400 => '400 Bad Request',
        422 => 'Unprocessable Entity',
        500 => '500 Internal Server Error'
    );
    // ok, validation error, or failure
    header('Status: '.$status[$code]);

    $result = array(
        'status' => $code < 300, // success or not?,
        'code' => $code,
        'message' => $message
    );

    if(is_array($data)){
        $result['data'] = $data;
    }

    // return the encoded json
    echo json_encode($result);
    exit();
}

/**
 * Get post input
 *
 * @param string $key
 * @param string $default
 *
 * @return mixed
 */
function _post(string $key, $default = "") {
    if(isset($_POST[$key])){
        return $_POST[$key];
    }
    return $default;
}

/**
 * include env
 */
require __DIR__ . DIRECTORY_SEPARATOR . 'env.php';
require __DIR__ . DIRECTORY_SEPARATOR . 'db.php';

/**
 * Page gard
 *
 * @return boolean
 */
function permission($key = CURRENT_PATH, $value = null) {

    $pages = array(
        'wellcome' => true,
        'permissions' => false,
        'requirements' =>false,
        'database' => false,
        'information' => false,
        'migrate' => false,
        'seed' => false,
        'create-user' => false,
        'success' => false,
        'fails' => false,
    );

    $file = laravel_path('storage/cms/installer.php');
    if (!file_exists($file)) {
        file_put_contents($file, "<?php \n return ". var_export($pages, true). ';');
    }else {
        $pages = require $file;
    }

    // set
    if(is_bool($value)){

        $current = [];
        $next = [];
        foreach (array_keys($pages) as $name) {
            if(!array_key_exists($key, $current)){
                $current [$name] = true;
            }else {
                $next[$name] = false;
            }
        }

        $pages = array_merge($current, $next);

        file_put_contents($file, "<?php \n return ". var_export($pages, true). ';');
        return true;
    }

    // get
    $status = false;

    if(array_key_exists($key, $pages)){
        $status = $pages[$key] == true;
    }

    return $status;
}

/**
 *
 * @param string $key
 * @param string $default
 */
function _old($key, $default = '')  {
    $fields = [] ;

    if(array_key_exists('fields', $_SESSION) && is_array($_SESSION['fields'])){
        $fields = $_SESSION['fields'];
    }

    if(array_key_exists($key, $fields)){
        echo $fields[$key];
    }

    echo $default;
}

/**
 * Redirect to
 *
 * @param string $pathname
 * @return Redirect
 */
function redirectTo(string $pathname) {
    ob_end_clean(); // Clean and discard the output buffer before sending headers
    header("Location: ". PREFIX. $pathname);
    exit();
}

/**
 * installer log
 *
 * @param string $line
 * @param bool $replace
 * @return bool
 */
 function installer_log($line, $replace = false) {
    $path = laravel_path('storage/logs/installer.log');

    if(!file_exists($path) || $replace){
        file_put_contents($path, '');
    }

    // Generate the log message with a timestamp
    $logMessage = "[" . date("Y-m-d H:i:s") . "] " . $line . "\n";

    // Write the log message to the file
    if (file_put_contents($path, $logMessage, FILE_APPEND) !== false) {
        sleep(1);
        return true; // Log write successful
    }
    return false; // Log write failed
}

/**
 * ensure post request
 *
 * @return boolean
 */
function isAjax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}

/**
 * ensure post method
 *
 * @return boolean
 */
function isPost() {
    return isset($_SERVER['REQUEST_METHOD']) && strtolower($_SERVER['REQUEST_METHOD']) === 'post';
}

/**
 * Boot laravel framework
 */
function bootOnFramework()
{
    $autoloadFile = laravel_path('vendor/autoload.php');
    if (!file_exists($autoloadFile)) {
        throw new Exception('Unable to find autoloader: ~/vendor/autoload.php');
    }
    require $autoloadFile;

    $appFile = laravel_path('bootstrap/app.php');
    if (!file_exists($appFile)) {
        throw new Exception('Unable to find app loader: ~/bootstrap/app.php');
    }
    /** @var Application $app */
    $app = require_once $appFile;
    $kernel = $app->make('Illuminate\Contracts\Console\Kernel');
    $kernel->bootstrap();
}

/**
 * Page end remove database connection etc
 *
 * @return void
 */
function endPage() {

    // if($db ){
    //     $db->close();
    // }

    if ( url() === url('success') ){
        clean_installation();
    }

    exit();
}

