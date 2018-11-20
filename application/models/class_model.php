<?php

class Model {
    protected $_model;
 
    function __construct() { 
        $this->_model = get_class($this);
    }
 
    function __destruct() {
    }
}