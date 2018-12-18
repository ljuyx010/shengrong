<?php
namespace app\common\taglib;
use think\template\TagLib;
use think\Db;
class Li extends TagLib{
	/* 定义标签列表*/
    protected $tags = [
        // 标签定义： attr 属性列表 close 是否闭合（0 或者1 默认1） alias 标签别名 level 嵌套层次
        'list' => ['attr' => 't,limit,order', 'close' => 1],
    ];
    
    //获得指定栏目id的文章列表
    public function tagList($attr, $content){
        $tj = $attr['t'];
        $n=$attr['limit'];
        $order=$attr['order']?:'id desc';
        $str = '<?php ';
        $str .= '$field = array("a.name,l.*");';
        $str .= '$_article_list = db("logs")->alias("l")->join("admin a","l.uid=a.id")->field($field)->where("l.type",'.$tj.')->order("'.$order.'")->limit('.$n.')->select();';
        $str .= 'foreach($_article_list as $k => $_list_value){';
        $str .= 'extract($_list_value);';
        $str .= '?>';
        $str .= $content;
        $str .= '<?php ';
        $str .= '}';
        $str .= '?>';
        return $str;
    }
}