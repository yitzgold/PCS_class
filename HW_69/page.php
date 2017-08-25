<?php
require_once 'framework.php';
class Page extends Framework{
    private $content;
    public function setContent($content){
        $this->content = $content;
    }
    public function getContent(){
        echo $this->content;
    }
}
?>