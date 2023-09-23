<?php 
class App
{
    private $controller;
    private $controllerFile;
    private $action;
    private $params;
    private $controllerName;

    public function __construct()
    {
        define ('APP_HOST', $_SERVER['HTTP_HOST'] . 'FAATEC_Programacao_WEB\MVC' );
        define ('PATH', realpath('./'));
        define ('TITLE', 'Aplicação MVC em PHP');
        define ('DB_HOST', 'localhost');
        define ('DB_USER', 'root');
        define ('DB_PASSWORD', '');
        define ('DB_NAME', 'exemplo_mvc');
        define ('DB_DRIVER', 'my_sql');

        $this->url();
    }

    /**
     * Get the value of controller
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Get the value of controllerFile
     */
    public function getControllerFile()
    {
        return $this->controllerFile;
    }

    /**
     * Get the value of action
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Get the value of params
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Get the value of controllerName
     */
    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function url ()
    {
        
    }
    public function run ()
    {
        
    }
    public function verificaArray ($array, $key)
    {
        if(isset($array[$key]) && !empty($array[$key]))
        {
            return $array[$key];
        }
        return null;
    }

}
?>