<?php

class Route{

    private $defaultController = "ErrorController";
    private $defaultMethod = "show_404";
    private $defaultParams = [];

    protected $controller;
    protected $method;
    protected $params;

    private $routeList = [];

    public function __construct(){
        $this->controller = $this->defaultController;
        $this->method = $this->defaultMethod;
        $this->params = $this->defaultParams;
    }

    public function filterUrl(){

        $preferedRoute = new stdClass();
        $preferedRoute->controller = $this->controller;
        $preferedRoute->method = $this->method;
        $preferedRoute->params = $this->params;

        $url = $this->parseUrl(); // Breakdown URL menjadi array berisi kumpulan bagian url yang dipisah dengan '/'
        $requestMethod = $_SERVER['REQUEST_METHOD']; // Assign $requestMethod dengan request method dari server (POST atau GET)

        foreach ($this->routeList as $route) {      // Tracing list route yang sudah terdaftar satu per satu
            
            if($requestMethod === 'GET' && $route->type === 'GET'){     // Jika $request method dan tipe route GET
                
                if(isset($_GET["url"])){                                // Jika parameter 'url' pada URL ada, jalankan:

                    $routeNames = explode('/', $route->name);           // Breakdown nama route menjadi array berisi kumpulan bagian url yang dipisah dengan '/'
                    unset($routeNames[0]);                              // Setelah dibreakdown ternyata elemen pertama bernilai '' atau bisa dibilang kosongan. Maka dari itu elemen pertama diunset atau dihilangkan
                    $routeNames = array_values($routeNames);            // Setelah proses unset, elemen pertama yang harusnya indexnya [0] disini jadi [1]. Solusinya yaitu ditata kembali menggunakan array_values()

                    if(count($url) == count($routeNames))               // Jika jumlah elemen url dan route sama, jalankan:
                    {
                        $wrongUrl = 0;                                  // Ini untuk menghitung jumlah ketidakcocokan elemen url dengan route
                        $tempParams = [];                               // Ini adalah tempat sementara untuk menampung parameter
                        
                        for ($i=0; $i < count($url); $i++) {            // ( LOOP ) Tahap pencocokkan setiap elemen url dengan route

                            if($url[$i] != $routeNames[$i])             // Jika elemen url dan route tidak sama, dan..
                            {
                                if(substr($routeNames[$i], 0, 1) == '{' && substr($routeNames[$i], (strlen($routeNames[$i]) - 1), 1) == '}') // Elemen route itu dibungks dengan {}, maka:
                                {
                                    $tempParams[] = $url[$i];           // Tampung elemen route tersebut karena itu merupakan parameter
                                }
                                else {
                                    $wrongUrl++;                        // Kalo itu buka parameter, inkremen $wrongUrl karena kedua elemen tersebut memang tidak sama
                                    break;
                                }
                            }

                        }                                               // ( LOOP END )

                        if($wrongUrl == 0)                              // Jika tidak ada ketidakcocokan, maka 
                        {
                            $preferedRoute->controller = $route->controller;
                            $preferedRoute->method = $route->method;
                            $preferedRoute->params[] = $tempParams;
                        }

                    }

                }
                elseif (!isset($_GET["url"])) {                         // Jika parameter 'url' pada URL tidak ada, berarti dia di HOME/Welcome page
                    $preferedRoute->controller = $this->routeList[0]->name == '/' ? $this->routeList[0]->controller : $this->defaultController;
                    $preferedRoute->method =  $this->routeList[0]->name == '/' ? $this->routeList[0]->method : $this->defaultMethod;
                    $preferedRoute->params[] = [];
                }

            }
            elseif ($requestMethod === 'POST' && $route->type === 'POST') {

                if($_SERVER['REQUEST_URI'] === $route->name){           // URI adalah url yang ditulis setelah host. Jadi kalo pake virtual host dan document root diset di public ga usah pake full directory.
                    
                    // parse objek ke fungsi proses url

                    $preferedRoute->controller = $route->controller;
                    $preferedRoute->method = $route->method;
                    $preferedRoute->params[] = (object) $_POST;
                    // $preferedRoute = $route;
                    // $this->processUrl($route);

                }

            }

        }

        $this->processUrl($preferedRoute);

    }

    public function processUrl($route){

        // Disini direktori awal adalah public, karena ingat: file ini dipanggil oleh require_once di index.php
        if(file_exists('../app/controllers/'.$route->controller.'.php')){

            $this->controller = $route->controller;

        };

        require_once('../app/controllers/'.$this->controller.'.php');

        $this->controller = new $this->controller; // Membuat instance dari class controller yang ada. Ini digunakan untuk mencari method pada class yang dijadikan instance apakah ada atau tidak.

        if(isset($route->method))
        {
            if(method_exists($this->controller, $route->method))
            {
                
                $this->method = $route->method;
                
            }
        }

        $this->params = $route->params; // array_values() memperbaiki index array supaya berawal dari 0

        call_user_func_array([$this->controller, $this->method], $this->params); // Memanggil method pada class controller dengan parameter. Fungsi ini sangat keren. Bisa langsung panggil method dari file yang beda tanpa instantiate classnya padahal juga nggak inherit class tsb.

    }

    public function parseUrl(){
        if(isset($_GET["url"])){

            /*Basically menjadikan URL yang user masukkan menjadi beberapa elemen array dipisahkan oleh tanda '/' */
            return explode('/', filter_var(rtrim($_GET["url"], '/'), FILTER_SANITIZE_URL));

        }
    }

    public function make($name, $controller, $method, $type){ // jangan buat fungsi dengan nama yang sama dengan class, karena nanti dianggap constructor

        $route = new stdClass();
        $route->name = $name;
        $route->controller = $controller;
        $route->method = $method;
        $route->type = $type;

        $this->routeList[] = $route;

    }

    public function getRouteList(){
        return $this->routeList;
    }

}