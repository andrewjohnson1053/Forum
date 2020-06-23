<?php
    
    
    class CSRF
    {
        private $token;
        private $place_token;
        
        /**
         * CSRF constructor.
         */
        public function __construct()
        {
            echo "<input type='hidden' name='token' value='" . $this->createToken() . "'/>";
            $this->setToken();
        }
        
        private function createToken()
        {
            return $this->token = bin2hex(random_bytes(32));
        }
        
        private function setToken()
        {
            $_SESSION['token'] = $this->token;
        }
        
    }