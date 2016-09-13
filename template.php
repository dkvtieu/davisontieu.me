<?php
    ob_start();
    
    class Page {
 
        var $page;
        
        function Page () {
            $this->page = join('', file('static/templates/template.inc'));
        }
        
        function parse($file) {
            ob_start();
            include_once ($file);
            $buffer = ob_get_contents();
            ob_end_clean();
            return $buffer;
        }
        
        public function replace_tags ($tags = array()) {
            global $defined_tags;
            if (sizeof($defined_tags) == 0) {
                $defined_tags = array();
            }
            if (sizeof ($tags) > 0) {
                // replace special tags
                //user-defined items
                foreach ($tags as $tag => $data) {
                    $data = (file_exists($data))    //decides on
                          ? $this->parse($data)     //file replacement or
                          : $data;                  //string replacement.
                    $this->page = str_ireplace("<!--self.$tag-->", $data, $this->page);
                }
                // repeat for defined tags (defined in conf)
                foreach ($defined_tags as $tag => $data) {
                    $this->page = str_ireplace("<!--self.$tag-->", $data, $this->page);
                }
            }
        }
        public function output() {
            echo ($this->page);
        }
    }
    
    function page_out ($options) {
        $pj=new Page();
        $pj->replace_tags($options);
        $pj->output();
    } 
?>
