<?php

namespace Core;

class CoreRoutes
{
    private $method;
    private $url;
    private $arr;

    function __construct()
    {
        $this->start();

        require_once "../app/config/Routes.php";

        $this->execute();

    }

    /**
     * Get uri and method
     */
    private function start()
    {

        $this->method = $_SERVER['REQUEST_METHOD'];

        $this->url  = $this->prepareUri($_SERVER['REQUEST_URI']);

    }
    private function execute()
    {
        
        if($this->checkCompatibility() != -1)
        {

            switch($this->method)
            {
                case 'GET':
                    $this->executaGet($this->checkCompatibility());
                    break;

                case 'POST':
                    $this->executePost($this->checkCompatibility());
                    break;
           }

        }else{
            echo "Implementar erro!! function execute!!";
        }
    }
    private function executePost(int $idRoute)
    {   
        $route = $this->arr[$idRoute];

        $this->verifyMethod($route['Call']);

    }
    /**
     * 
     */
    private function executaGet(int $idRoute)
    {
        $route = $this->arr[$idRoute];
        if(is_callable($route['Call']))
        {
            $route['Call']();
        }
        else
        {
            $this->verifyMethod($route['Call']);
        }
        //is_callable
    }

    /**
     * Verify method extis 
     */
    private function verifyIsset(array $method){
        if(isset($method[0]))
        {
            if(isset($method[1]))
            {
                $ver = 1;
            }
        }
        else
        {
            $ver = 0;
        }
        return $ver;
    }
    private function verifyMethod(string $method)
    {
        $arrMethod = explode('@',$method);
        $arrVe = $this->verifyIsset($arrMethod);
        if($arrVe)
        {
            $control = "Control\\".$arrMethod[0];

            if(class_exists($control))
            {
                if(method_exists($control,$arrMethod[1]))
                {
                    call_user_func_array(
                        [
                            new $control,
                            $arrMethod[1]
                        ],[]
                    );
                }
                else
                {
                    echo "Não exite o method";
                }

            }
            else
            {
                //Não exite control
            }

        }else{
            echo "Não exist";
        }

        
        
    }
    /**
     * Verify compatibility
     */
    private function checkCompatibility(){
        if($this->searchRoute() != -1)
        {
            $methodRoute = $this->arr[$this->searchRoute()]['Method'];
            
            if($methodRoute == $this->method)
            {
                $idRoute = $this->searchRoute();

            }
            elseif($methodRoute == "All")
            {
                $idRoute = $this->searchRoute();
            }
            else
            {
                $idRoute = -1;
            }
        }else{
            /**
             * Implementar erro 
             */
            $idRoute = -1;
        }
        return $idRoute;
        
    }
    /**
     * Search routes
     */
    private function searchRoute()
    {
        $sougthRoute = "/".implode('/',$this->url);
        $i = 0;
        $position = -1;
        foreach($this->arr as $uniRoute)
        {
           if($uniRoute['Route'] == $sougthRoute)
           {
                $position = $i;
           }
           $i++;
        }
        return $position;
    }
    /**
     * 
     */
    private function route($path, $call, $methods='GET')
    {
        $this->arr[] = array(
            "Route" => $path,
            "Call"  => $call,
            "Method" => $methods 
        );
    }
    /**
     * Prepara a uri 
     */
    private function prepareUri(string $uri):array
    {
        $arr = explode('/',$uri);

        $arr = array_filter($arr);

        if(!$arr)
        {
           $arr = array(
               1 => "home"
           );
        }
        
        return $arr;
    }

}