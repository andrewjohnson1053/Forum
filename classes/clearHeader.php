<?php
    /**
     * @param string $finalPage
     * @return string
     */
    function setFinalPage($finalPage)
    {
        return strval($finalPage);
    }
    
    
    /**
     * @param string $finalLocation
     */
    function authFailed($finalLocation)
    {
        header("Location: clearHeader.php?auth=failed&final=" . $finalLocation);
    }
    
    /**
     * @param array $sessionParameters
     * @param string $finalLocation
     */
    function authSuccess($sessionParameters, $finalLocation)
    {
        if (sizeof($sessionParameters) == 0) {
            header("Location: clearHeader.php?auth=success&final=" . $finalLocation);
        } else {
            $keyArray = array_keys($sessionParameters);
            $valueArray = array_values($sessionParameters);
            for ($i = 0; $i < sizeof($sessionParameters); $i += 1) {
                $_SESSION[$keyArray[$i]] = strval($valueArray[$i]);
            }
            header("Location: clearHeader.php?auth=success&final=" . $finalLocation);
        }
    }
    
    /**
     * ---------------- Procedure For Clearing Request header ------------------*
     *      If authentication is failed, redirects to a page called clearHeader.php
     *      with "$_GET arguments auth=failed"
     *      which then again redirects to the original authentication page
     *      which is set by the setFinalPage(string Address) function.
     */
    
    if (array_key_exists('auth', $_GET)) {
        if ($_GET['auth'] == 'failed') {
            unset($_POST);
            // echo "<script>alert('Auth Failed')</script>";
            header("Location: " . strval($_GET['final']));
        } else if ($_GET['auth'] == 'success') {
            unset($_POST);
            // echo "<script>alert('Auth Failed')</script>";
            header("Location: " . strval($_GET['final']));
        }
    }
    
    /*
     * Example :
     *
     * if(authentication_failed){
     *      authFailed();
     * }
     * */