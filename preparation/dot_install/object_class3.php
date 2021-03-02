<?php 
class Post{
    public $text;
    public $likes;

    public function __construct($textNew, $likesNew){
        $this->text=$textNew;
        $this->likes=$likesNew;
    }
    public function show(){
        printf("%sは%d個", $this->text, $this->likes);
    }
}

$posts[0]= new Post("リンゴ", 3);
$posts[1]= new Post("みかん", 10);

$posts[0]->show();
echo "<br>".PHP_EOL;
$posts[1]->show();