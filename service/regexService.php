<?php
// MAKE IT A CLASS FOR IT TO BE MODULABLE...
    // $regexPassword = "/[\w\!\?\-. ]{10,30}/";
    // $regexUserName = "/[\w\!\?\-. ]{3,30}/";
    //$regexMessage = "/[\w\!\?\-.\(\)\"\'\]{3,8000}/";

    function verifyUserName($string)
    {
        $regexUserName = "/[\w\!\?\-. ]{3,30}/";
        return preg_match($regexUserName, $string);
    }

    function verifyPassword($string)
    {
        $regexPassword = "/[\w\!\?\-. ]{10,30}/";
        return preg_match($regexPassword, $string);
    }

    function verifyTacheName($string)
    {
        $regexTache = "/[\w\!\?\-.\(\)\"\']{3,8000}/";
        return preg_match($regexTache, $string);
    }
?>
