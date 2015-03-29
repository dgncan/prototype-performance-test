<?php
/**
 * Created by PhpStorm.
 * User: dogancan
 */
function __autoload($class)
{
    require  $class . '.php';
}

/**
 * https://gist.github.com/hadl/5721816
 *
 * Calculate a precise time difference.
 * @param string $start result of microtime()
 * @param string $end result of microtime(); if NULL/FALSE/0/'' then it's now
 * @return flat difference in seconds, calculated with minimum precision loss
 */
function microtime_diff($start, $end = null)
{
    if (!$end) {
        $end = microtime();
    }
    list($start_usec, $start_sec) = explode(" ", $start);
    list($end_usec, $end_sec) = explode(" ", $end);
    $diff_sec = intval($end_sec) - intval($start_sec);
    $diff_usec = floatval($end_usec) - floatval($start_usec);

    return floatval($diff_sec) + $diff_usec;
}