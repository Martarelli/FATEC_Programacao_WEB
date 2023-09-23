<?php 

namespace App;

use App\Controllers\HomeController;

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

    public function url() 
    {
        if ( isset( $_GET['url'] ) ) {

            $path = $_GET['url'];
            $path = rtrim($path, '/');
            $path = filter_var($path, FILTER_SANITIZE_URL); 

            $path = explode('/', $path);

            $this->controller  = $this->verificaArray( $path, 0 );
            $this->action      = $this->verificaArray( $path, 1 );

            if ( $this->verificaArray( $path, 2 ) ) {
                unset( $path[0] );
                unset( $path[1] );
                $this->params = array_values( $path );
            }
        }
    }

    public function run() 
    {
        if ($this->controller) {
            $this->controllerName = ucwords($this->controller) . 'Controller';
            $this->controllerName = preg_replace('/[^a-zA-Z]/i', '', $this->controllerName);
        } else {
            $this->controllerName = "HomeController";
        }

        $this->controllerFile   = $this->controllerName . '.php';
        $this->action           = preg_replace('/[^a-zA-Z]/i', '', $this->action);

        if (!$this->controller) {
            $this->controller = new HomeController($this);
            $this->controller->index();
        }

        if (!file_exists(PATH . '/App/Controllers/' . $this->controllerFile)) {
            throw new Exception("Página não encontrada.", 404);
        }

        $nomeClasse     = "\\App\\Controllers\\" . $this->controllerName;
        $objetoController = new $nomeClasse($this);

        if (!class_exists($nomeClasse)) {
            throw new Exception("Erro na aplicação", 500);
        }
        
        if (method_exists($objetoController, $this->action)) {
            $objetoController->{$this->action}($this->params);
            return;
        } else if (!$this->action && method_exists($objetoController, 'index')) {
            $objetoController->index($this->params);
            return;
        } else {
            throw new Exception("Nosso suporte já esta verificando desculpe!", 500);
        }
        throw new Exception("Página não encontrada.", 404);
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