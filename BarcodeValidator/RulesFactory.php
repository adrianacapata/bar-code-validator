<?php

require_once ('Rules/n10Rule.php');
require_once ('Rules/n13Rule.php');
require_once ('Rules/undefinedRule.php');

class RulesFactory {
    public static function selectRule($barcode, $length)
    {
        session_start();
        switch ($length) {
            case 10:
                $rule = new n10Rule();
                $rule->validateRule($barcode);

                break;
            case 13:
                $rule = new n13Rule();
                $rule->validateRule($barcode);

                break;
            default :
                $rule = new undefinedRule();
                $rule->validateRule($barcode);

                break;
        }
    }
}
