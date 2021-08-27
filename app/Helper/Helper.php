<?php
function test_helper($text)
{
    $data = '';
    for ($i=0;$i<strlen($text);$i++)
    {
        $data.= \Illuminate\Support\Str::random(5);
    }
    if (strlen($data) > 20){
        $data = \Illuminate\Support\Str::random(20);
    }
    return $data;
}
