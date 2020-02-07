<?php
require_once('./BarcodeValidator/RulesFactory.php');

class Validator
{
    public function check($barcode)
    {
        $codeToCheck = $this->noHyphens($barcode);
        $codeToCheck = $this->noSpaces($codeToCheck);

        $barcodeLength = strlen($codeToCheck);
        $rulesFactory = new RulesFactory();
        $rulesFactory::selectRule($codeToCheck, $barcodeLength);

        return $barcode;
    }
    
    private function noHyphens($string)
    {

        return str_replace('-', '', $string);
    }

    private function noSpaces($string)
    {

        return str_replace(' ', '', $string);
    }

    public function hasError()
    {
        if (isset($_SESSION['validationErrors'])) {

            return $_SESSION['validationErrors'];
        }

        return false;
    }
}
