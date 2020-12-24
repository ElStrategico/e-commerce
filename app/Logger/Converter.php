<?php

namespace App\Logger;

class Converter
{
    /**
     * @param array $data
     * @return string
     */
    public static function message(array $data)
    {
        $converted = "\n";

        foreach($data as $tag => $value)
        {
            if(is_bool($value))
            {
                $value = $value ? 'true' : 'false';
            }

            $converted .= "\t<$tag>$value</$tag>\n";
        }

        $converted = substr($converted, 0, -1);

        return $converted;
    }
}
