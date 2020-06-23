<?php
    
    
    class Database
    {
        
        /*All of these functions returns an mysqli object if
        connection is established or returns null otherwise*/
        
        /**
         * @var string
         */
        private $db_name;
        /**
         * @var string
         */
        private $host;
        /**
         * @var string
         */
        private $user_name;
        /**
         * @var string
         */
        private $password;
        /**
         * @var false|mysqli
         */
        private $link;
        
        /**
         * Database constructor.
         * @param string $host
         * @param string $db_name
         * @param string $user_name
         * @param string $password
         */
        public function __construct($host, $db_name, $user_name, $password)
        {
            $this->db_name = strval($db_name);
            $this->host = strval($host);
            $this->user_name = strval($user_name);
            $this->password = strval($password);
            $this->link = mysqli_connect($this->host, $this->user_name, $this->password, $this->db_name);
            if (mysqli_connect_error()) {
                $this->link = null;
                // return null;
                die("Connection Error");
            } else {
                //echo "Connection SuccessFull";
                //return $this->link;
            }
        }
        
        // Function to check if the connection is established or not...
        
        /**
         * @param string $new_name
         * @return false|mysqli|null
         */
        public function changeDBName($new_name)
        {
            $this->db_name = strval($new_name);
            $this->link = mysqli_connect($this->host, $this->user_name, $this->password, $this->db_name);
            if (mysqli_connect_error()) {
                $this->link = null;
                //return null;
                die("Connection Error");
            } else {
                //echo "Connection SuccessFull";
                //return $this->link;
            }
        }
        
        /* -------------------------------------------------- SQL Functions --------------------------------------------*/
        
        /*
         * Usage :
         * This Function is used to perform any Database operations on the database.
         * The $query is the SQL query you want to perform. In place of the variables
         * just put a '?'.
         * $parameterTypes is the string containing the parameter data types --- i : integer
         *                                                                       s : string
         *                                                                       d : double
         *                                                                       b : blob
         * you can give multiple parameters by creating the string of codes in order of parameters.
         *
         * $parameter is an array of parameters that are passed to the query.
         *
         * **** Note **** : If no parameter is passed to the string then pass an empty string and an empty array.
         */
        
        /**
         * @param string $new_host
         * @return false|mysqli|null
         */
        public function changeHost($new_host)
        {
            $this->host = strval($new_host);
            $this->link = mysqli_connect($this->host, $this->user_name, $this->password, $this->db_name);
            if (mysqli_connect_error()) {
                $this->link = null;
                //return null;
                die("Connection Error");
            } else {
                //echo "Connection SuccessFull";
                //return $this->link;
            }
        }
        
        /**
         * @param string $new_username
         * @return false|mysqli|null
         */
        public function changeUserName($new_username)
        {
            $this->user_name = strval($new_username);
            $this->link = mysqli_connect($this->host, $this->user_name, $this->password, $this->db_name);
            if (mysqli_connect_error()) {
                $this->link = null;
                //return null;
                die("Connection Error");
            } else {
                //echo "Connection SuccessFull";
                //return $this->link;
            }
        }
        
        /*---------------------------------------- Variables Declarations ---------------------------------------------*/
        
        /**
         * @param string $new_password
         * @return void
         */
        public function changePassword($new_password)
        {
            $this->password = strval($new_password);
            $this->link = mysqli_connect($this->host, $this->user_name, $this->password, $this->db_name);
            if (mysqli_connect_error()) {
                $this->link = null;
                //return null;
            } else {
                //echo "Connection SuccessFull";
                //return $this->link;
            }
        }
        
        /**
         * @return false|mysqli
         */
        public function getLink()
        {
            return $this->link;
        }
        
        /**
         * @return bool
         */
        public function isLinked()
        {
            return (boolean)$this->link;
        }
        
        /**
         * @param string $query
         * @param string $parameterTypes
         * @param array|mixed $parameters
         * @return bool|false|mysqli_result
         */
        public function perform($query, $parameterTypes = "", $parameters = array())
        {
            if ($this->link) {
                if (sizeof($parameters) == 0) {
                    $result = mysqli_query($this->link, $query);
                    if (mysqli_num_rows($result) > 0) {
                        return $result;
                    }
                    return false;
                }
                $stmnt = $this->link->prepare($query);
                $parameterNum = substr_count($query, '?');
                if ((strlen($parameterTypes) == sizeof($parameters)) && $parameterNum == strlen($parameterTypes)) {
                    for ($i = 0; $i < sizeof($parameters); $i += 1) {
                        switch (substr($parameterTypes, $i, 1)) {
                            case '' :
                                {
                                    break;
                                }
                            case 's' :
                                {
                                    $parameters[$i] = $this->cleanInput($parameters[$i]);
                                    break;
                                }
                            case 'i' :
                                {
                                    $parameters[$i] = (int)$parameters[$i];
                                    break;
                                }
                            case 'd' :
                                {
                                    $parameters[$i] = (double)$parameters[$i];
                                    break;
                                }
                            case 'b' :
                                {
                                    $parameters[$i] = $parameters[$i];
                                    break;
                                }
                            default :
                                {
                                    echo "Invalid Type String";
                                    return false;
                                    break;
                                }
                        }
                    }
                    $stmnt->bind_param($parameterTypes, ...$parameters);
                    if ($stmnt->execute()) {
                        return $stmnt->get_result();
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                die("Connection Failed");
            }
        }
        
        /**
         * @param string $input
         * @return string
         */
        private function cleanInput($input)
        {
            return mysqli_real_escape_string($this->link, $input);
        }
    }