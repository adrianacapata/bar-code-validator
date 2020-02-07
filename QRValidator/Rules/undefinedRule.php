<?php

require_once ('AbstractRule.php');

class undefinedRule extends AbstractRule
{
    public function validateRule($qrCode, $message=null)
    {
        if (!$message) {
            $message = "The $qrCode is not valid";
        }
        
        unset($_SESSION["validationErrors"]);
        $_SESSION["validationErrors"] = $message;

        return true;
    }
}
