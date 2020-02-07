<?php

require_once ('AbstractRule.php');

class undefinedRule extends AbstractRule
{
    public function validateRule($barcode, $message=null)
    {
        if (!$message) {
            $message = "The $barcode is not valid";
        }
        
        unset($_SESSION["validationErrors"]);
        $_SESSION["validationErrors"] = $message;

        return true;
    }
}
