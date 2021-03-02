<?php
//Post型というデータ型の構造の説明{}
class Post{
    public $text;//メンバー変数＝クラス内で値を保持する
    public $likes; 
    //public $value;

    public function show (){//メンバーメソッド
        printf("%s(%d)".PHP_EOL,$this->text, $this->likes); 
    }
}
//var_dump($posts);//失敗！

//↓ここで始めて配列が形成される
$posts[0]=new Post();
//Postクラスに$posts[0](配列）インスタンスが形成された時点でキーにメンバー変数が格納された。
print_r($posts).PHP_EOL;
//→Array ( [0] => Post Object ( [text] => [likes] => ) )
echo "<br>";
$posts[0]->text="hello";//引数"hello"を$posts[0]のメンバー変数textに格納する
$posts[0]->likes=0;
$posts[1]=new Post(); 
//Postクラスに$posts[1](配列)インスタンスが形成された。
$posts[1]->text="hello again";
$posts[1]->likes=0;
var_dump($posts);
$posts[0]->show(); //$posts[0]のときのshow関数
$posts[1]->show(); //$posts[1]のときのshow関数
?>