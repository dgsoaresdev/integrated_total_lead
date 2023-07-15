<?php 

    namespace app\classes;

    abstract class GetWPquery {

        private $limit_if_single;
        private $limit_if_loop;
        private $post_type_name;

        public function __construct($param1 = "")
        {
            $this->limit_if_single = 1; // set posts_per_page if single post
            $this->limit_if_loop = -1; // set posts_per_page if single loop
            $this->post_type_name = 'integraleadtotal'; // set post_type name
        }

        protected function Posts_GetWPquery($param1 = "",$param2 = "",$param3 = "")
        {

            if( !empty( $param2 ) ) {
                $args = array(
                    'post_type'   => $this->post_type_name,
                    'posts_per_page' => $this->limit_if_single,
                    'p' => $param2,
                );

            } else {
            	$args = array(
                    'post_type'   => $this->post_type_name,
                    'posts_per_page' =>  $this->limit_if_loop,
            	);
            }
            
            $loop = new \WP_Query( $args );
            // return loop posts
            return $loop; 

        }

    }