<?php
require __DIR__ . '/vendor/autoload.php';
use InvalidArgumentException;
use Sunrise\Vin\Vin;

class modVin {

    function __construct($app) {
        $this->app = &$app;
        $out = false;
        $mode = $app->vars("_route.mode");
        $this->init();
        if ($mode > '' && $mode !== 'init') {
            method_exists($this,$mode) ? $out=@$this->$mode() : null;
        } 
        if ($out) echo $out;
        die;
    }

    function init() {

    }

    function getvin($number = 'WBANJ51020CV06259') {
        
        try {
            $vin = new Vin($number);
            $this->vin = (object)[
                'vin'      => $vin->getVin()
               ,'wmi'      => $vin->getWmi()
               ,'vds'      => $vin->getVds()
               ,'vis'      => $vin->getVis()
               ,'region'   => $vin->getRegion()
               ,'country'  => $vin->getCountry()
               ,'vendor'   => $vin->getManufacturer()
               ,'year'     => $vin->getModelYear()
           ];
        } catch (InvalidArgumentException $e) {
            $this->vin = (object)[
                'vin'      => null
               ,'wmi'      => null
               ,'vds'      => null
               ,'vis'      => null
               ,'region'   => null
               ,'country'  => null
               ,'vendor'   => null
               ,'year'     => null
            ];
        }
    }

    function css() {
        $app = &$this->app;
        $file = '_'.$app->route->params[1];
        $vin = $app->route->params[0];
        $this->getvin($vin);
        $css = file_get_contents(__DIR__. '/'.$file);
        if (!$css) {
            http_response_code(404);
        } else {
            $this->vin->vendor > '' ? $css = str_replace('undefined.jpg',strtolower($this->vin->vendor).'.jpg',$css) : null;
            header("Content-type: text/css; charset=utf-8");
            echo $css;
        }
        die;
    }
}
?>