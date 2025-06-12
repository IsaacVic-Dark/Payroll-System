<?php

/**
 * dd
 * 
 * dump the results & die
 * 
 * @param mixed $data view to be created
 * 
 * @return string
 */

function dd($var) {
    //to do
    // debug_print_backtrace();
    if(php_sapi_name() === 'cli') {
        var_dump($var);
        die();
    }

    ini_set("highlight.keyword", "#a50000;  font-weight: bolder");
    ini_set("highlight.string", "#5825b6; font-weight: lighter; ");

    ob_start();
    highlight_string("<?php\n" . var_export($var, true) . "?>");
    $highlighted_output = ob_get_clean();

    $highlighted_output = str_replace(["&lt;?php", "?&gt;"], '', $highlighted_output);

    echo $highlighted_output;
    die();
}
function login()  {
    
}

function logout()  {
    
}

function check_auth()  {
    
}