<?php
    /*  http://net-beta.net/ubench/
    TODO: access levels, perm checks, relationships
    TODO: loose coupling (allow modules to only notify the core to induce custom-named events)
    TODO: query indices
    TODO: non-random GUID hash object storage
    TODO: http://stackoverflow.com/questions/3849415
    TODO: declare all vars; undeclared ones 10 times slower
    check for function calls in for loops
    remove @s (reportedly slow) -> harmless errors should be hidden with 0 or E_NONE
    TODO: minimize magics
    TODO: check full paths for includes
    TODO: static functions are 4 times faster
    TODO: switch to singleton (faster / saves memory)
    [v]p[s]rintf is 10x faster than echo("$ $ $"); echo (1,2,3) is also faster
    TODO: add unset()s
    use $_SERVER['REQUEST_TIME'] instead of microtime for start time
    change switch to else if (faster)
    TODO: move templating to client-side
    ++$i is faster than $ i++
    TODO: Use ip2long() and long2ip() to store IP addresses as integers instead of strings
    TODO: avoid global variable changes; cache using local-scope vars first
    TODO: isset($foo[5]) is faster than strlen($foo) > 5
    int list keys are always faster than str list keys
    avoiding classes speeds things up
    array_push is slower than array[] =
    strpos is faster than strstr
    str{5} is 2x faster than substr(str,5,1)
    @ is faster than error_reporting(0)
    isset() is 5x faster than @
    file_get_contents is faster than file
    for code unlikely to throw exceptions, it's faster to use exception trapping.
    for code likely to throw exceptions, it's faster to check your values rather than raising exceptions.
    === null is 2x faster than is_null
    + is 2x faster than array_merge
    if is faster than shorthand
    nested if is logically faster than &&
    $a = 'func'; $a() is faster than call_user_func, but slower than just calling the function
    avoid $_GLOBALS at all costs; avoid global a,b,c too (2x slower than local vars)
    never use while(next())
    foreach is faster with key
    foreach as &var is 3x faster if loop involves writing to var.
    recursion is 3x slower than not
    it is faster to strtolower+strpos than to stripos.
    (int) is faster than intval
    array() is marginally faster than (array)
    === is up to 12 times faster than == in all comparisons
    calculating length in each loop for calendar_highlight_today.js
    */

    if (!defined('USE_POP_REDIRECTION')) {
        define('USE_POP_REDIRECTION', false);
    }

    set_time_limit(3); // preferred; prevents DDoS?
    define ('DOMAIN', 'http://' . $_SERVER['SERVER_NAME'] . '/');
    define ('DATA_PATH', PATH . '../../../formdata/');
    define ('CACHE_PATH', PATH . 'cache/');
    define ('MODULE_PATH', PATH . 'modules/');
    define ('LIBRARY_PATH', PATH . 'lib/');
    define ('VIEWS_PATH', PATH . 'views/');
    define ('TEMPLATE_PATH', VIEWS_PATH . 'templates/');
    define ('STATIC_PATH', 'static/'); // cannot be changed
    define ('SITE_TEMPLATE', '../../../static/templates/template.inc');
    define ('DEFAULT_TEMPLATE', 'default.html');
    define ('TEMPLATE_SAFE_MODE', true); // prevent PHP scripts in templates
    define ('FS_FETCH_HARD_LIMIT', 1000); // when should Query give up?
    define ('TEMPLATE_COMPRESS', true); // use compressor = more CPU, less bandwidth
    define ('SITE_SECRET', '5ubraNa2'); // for ajax
    define ('WRITE_ON_MODIFY', true); // if false, Model.put() is required

    // SUBDIR: exclude prefix slash, include trailing slash.
    // define ('SUBDIR', substr (PATH, strlen ($_SERVER['DOCUMENT_ROOT'])));
    define ('SUBDIR', 'pop/');

    define ('WIN', 5);
    $win = WIN;
    define ('FAIL', 6);
    $fail = FAIL;

    // you CAN store this info elsewhere by including an external file
    // e.g. include ('/var/etc/my_folder/mysql_info.php');
    define ('MYSQL_USER', '');
    define ('MYSQL_PASSWORD', '');
    define ('MYSQL_HOST', '');
    define ('MYSQL_DB', '');

    $modules = array(
        'Model',
        'View',
        'Query',
        'AjaxField',
        'User',
        'Newsletter'
    );
