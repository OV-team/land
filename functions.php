<?php

function isDevExecuting()
{
    if( file_exists('C:\users\Will') )
        return 'olgert';

    if( file_exists('C:\users\r1') )
        return 'vadim';

    return false;
}

function arrayMerge($a, $b)
{
    foreach($b as $key => $val)
    {
        if(array_key_exists($key, $a) && is_array($val))
            $a[$key] = arrayMerge($a[$key], $b[$key]);
        else
            $a[$key] = $val;
    }

    return $a;
}