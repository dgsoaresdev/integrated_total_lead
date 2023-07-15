<?php
    
    namespace app\classes;
    //===============
    // Just a test markup for an example traits
    //===============
    // Call the trait path
    use app\traits\ExampleTrait;
    //===============
    //  END - Just a test markup for an example traits
    //===============

    class Integrations extends GetWPquery{
        use ExampleTrait;           
        // Construct
        public function __construct($param1 = "")
        {
            parent::__construct();

        }
         // method to get the posts
        public function getPosts($post_id = "")
        {
            // Call method from extend class "GetWPquery->Posts_GetWPquery" from wp_query
            $loop = $this->Posts_GetWPquery();
            //$loop = $this->TraitTest();
            return $loop;
            
        }
        //===============
        // Just a test markup for an example traits
        //===============
        // Call the trait function 
        public function getTrait()
        {
           
           return $this->TraitTest();
            
        }
        //===============
        //  END - Just a test markup for an example traits
        //===============

    }