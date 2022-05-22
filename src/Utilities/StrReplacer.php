<?php

namespace Zofe\Rapyd\Utilities;

class StrReplacer
{
    private const START = '{{';
    private const END = '}}';
    private array $values = [];
    private $default;

    public function __construct($values = [], $default = null)
    {
        $this->values = $values;
        $this->default = $default;
    }

    public function replace($string = null): string
    {
        $start = preg_quote(self::START);
        $end = preg_quote(self::END);

        return preg_replace_callback("/{$start}(.+?){$end}/u", [$this, 'replaceVars'], $string);
    }

    private function replaceVars(array $match): string
    {
        $matched = $match[0];
        $name = $match[1];
        $default = is_null($this->default) ? $matched : $this->default;

        return isset($this->values[$name]) ? $this->values[$name] : $default;
    }
}
