<?php

    class Integrations {        

        protected $nome;
        public $array_posts;        

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
        }

    }