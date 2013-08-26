<?php

/**
 * Dirty hack to create missing APC functions provided by APCu (PHP 5.5)
 */

$funcs = array(
    'add',
    'cache_info',
    'cas',
    'clear_cache',
    'dec',
    'delete',
    'exists',
    'fetch',
    'inc',
    'sma_info',
    'store',
);

foreach ($funcs as $func) {
    eval("function apc_$func() { return call_user_func_array('apcu_$func', func_get_args()); }");
}
