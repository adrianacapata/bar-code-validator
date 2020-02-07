<?php
require_once ('./QRValidator/RulesFactory.php');

class Validator
{
    public function check($qrCode)
    {
        $codeToCheck = $this->noHyphens($qrCode);
        $codeToCheck = $this->noSpaces($codeToCheck);

        $qrLength = strlen($codeToCheck);
        $rulesFactory = new RulesFactory();
        $rulesFactory::selectRule($codeToCheck, $qrLength);

        return $qrCode;
    }
    
    private function noHyphens($string)
    {

        return str_replace("-", "", $string);
    }

    private function noSpaces($string)
    {

        return str_replace(" ", "", $string);
    }

    public function hasError()
    {
        if (isset($_SESSION["validationErrors"])) {

            return $_SESSION["validationErrors"];
        }

        return false;
    }
}
