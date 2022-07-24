<?php

function src($fileName, $type = 'full')
{
    $path = './uploads/images/manipulated/';

    //full mean full size image
    if ($type != 'full')
        $path .= $type . '/';

    return $path . $fileName;
}
