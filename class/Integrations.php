<?php

    class Integrations {        

        protected $nome;
        public $array_posts;
        //const ESPECIE = "Humana";
        //public $site;

        public function __construct($param1 = "")
        {

        }

        public function getPosts($post_id = "") 
        {
        
            if( !empty( $post_id ) ) {
                $args = array(
                    'post_type'   => 'integraleadtotal',
                    'posts_per_page' => 1,
                    'p' => $post_id,
                );

            } else {
            	$args = array(
                    'post_type'   => 'integraleadtotal',
                    'posts_per_page' => -1,
            	);
            }

            $loop = new WP_Query( $args );
            return $loop;

           // return array('teste'=>1);

        }

        // // public function setNome($novoNome)
        // // {
        // //     $this->nome = $novoNome;
        // // }
        // public function getTitle()
        // {
            
        //     return $this->array_posts;
        // }

        // public function falarNome(){
        //     echo $this->nome;
        // }
        // public function falarSite(){
        //     echo $this->site;
        // }
    }