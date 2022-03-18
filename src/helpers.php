<?php

/**
 * from dot notation string to "property.anotherproperty.." to $instance->property->anotherproperty
 *
 * @param $instance
 * @param $str
 * @return mixed
 */

if (! function_exists('dot_to_property')) {
    function dot_to_property($instance, $str)
    {
        if ($instance == '') {
            return;
        }

        $params = explode('.', $str);

        try {
            foreach ($params as $param) {
                $instance = $instance->{$param};
            }
        } catch (Exception $e) {
        }

        return $instance;
    }
}
