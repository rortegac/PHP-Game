<?php
class Template {
     
    protected $variables = array();
    protected $_controller;
    protected $_action;
     
    function __construct($controller,$action) {
        $this->_controller = $controller;
        $this->_action = $action;
    }
 
    // Seteamos las variables
    function set($name,$value) {
        $this->variables[$name] = $value;
    }
 
    // Se llama a este método para cargar las vistas correspondientes y mostrarlas    
    function render() {
        extract($this->variables);
         
            if (file_exists(ROOT . '/application/views/' . strtolower($this->_controller) . '/header.php')) {
                include (ROOT . '/application/views/' . strtolower($this->_controller) . '/header.php');
            } else {
                include (ROOT . '/application/views/header.php');
            }
 
        include (ROOT . '/application/views/' . strtolower($this->_controller) . "/" . strtolower($this->_action) . '.php');       
             
            if (file_exists(ROOT . '/application/views/' . strtolower($this->_controller) . '/footer.php')) {
                include (ROOT . '/application/views/' . strtolower($this->_controller) . '/footer.php');
            } else {
                include (ROOT . '/application/views/footer.php');
            }
    }
 
}