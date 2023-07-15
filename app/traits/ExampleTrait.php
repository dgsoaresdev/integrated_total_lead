<?php 

namespace app\traits;

trait ExampleTrait{

    // private $continue;

    // public function __construct() {
    //     $this->continue = false;
    // }

    public function ExampleTraitFunction()
    {
        $continue = true;
        
        if ( !$continue ) {
            throw new \Exception('Não continuar');
        
        }
    }

    private function TraitTest()
    {
        return 'TraitTest';
    }
}
