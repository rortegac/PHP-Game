<?php

class Controller {
     
    protected $_model;
    protected $_controller;
    protected $_action;
    protected $_template;
    protected static $_instancia;
 
    public function __construct($model, $controller, $action) {
         
        $this->_controller = $controller;
        $this->_action = $action;
        $this->_model = $model;
        
        // incluimos el modelo y el template
        require_once(ROOT . '/application/models/class_' . strtolower($model) . '.php');
        require_once(ROOT . '/application/views/class_template.php');

        $this->$model = new $model;
        $this->_template = new Template($controller,$action);
 
    }
 
    function set($name,$value) {
        $this->_template->set($name,$value);
    }
 
    function __destruct() {
            // En el destrucor, que llama después de ejecutar las operaciones, crea las vistas.
            $this->_template->render();
    }
         
}

?>