<?php
namespace app\index\controller;

class Customer extends Common{

    public function index(){
        $z=input('zt',1,'intval');
    	$key=mb_convert_encoding(input('key'), "UTF-8", "GBK");;
    	switch ($z) {
    		case 1: $title="重点客户";
    			break;
    		case 2: $title="已成交客户";
    			break;
    		default: $title="公共资源";
    			break;
    	}
    	$where['zt']=$z;
    	if($z && !session('user.type')){
    		$where['uid']=session('user.id');
    	}
    	if($key){$where['title']=array('like','%'.$key.'%');}
    	$list=db('customer')->where($where)->order('addtime desc')->paginate(15);
    	$this->assign('title',$title);
    	$this->assign('zt',$z);
    	$this->assign('list', $list);
        return $this->fetch();
    }

    public function add(){
    	$this->assign('title','添加客户');
    	return  $this->fetch();
    }

    public function edit(){
    	$id=input('id');
        $where=array('c.id'=>$id);
        if(!session('user.type')){$where['uid']=session('user.id');}
        $check=db('customer')->alias('c')->join('admin a','c.uid=a.id')->field('c.*,a.name')->where($where)->whereOr('c.zt',0)->find();
        if(!$check){$this->error('没有权限');}
        $list=db('ccon')->alias('c')->join('admin a','c.uid=a.id')->field('c.*,a.name')->where('cid',$id)->order('time desc')->select();
        $this->assign('xm',$check);
        $this->assign('title','客户跟进');
        $this->assign('list',$list);
        return $this->fetch('add');
    }

    public function runadd(){
    	$cid=input('cid');
    	if($cid){
    		$data=array(
    			'id'=>$cid,
    			'lxr'=>input('lxr'),	
    			'lx'=>input('lxr'),	
    			'adr'=>input('lxr'),
    			'zt' =>input('zt'),
    			'uptime'=>time()
    		);
    		if(input('zy')=='zy'){$data['uid']=session('user.id');$data['zt']=1;}
    		$data2=array(
    			'uid'=>session('user.id'),
    			'cid'=>$cid,
    			'content'=>input('content'),
    			'time'=>time()
    		);
    		db('customer')->update($data);
    		$rs=db('ccon')->insert($data2);
    		if($rs){return 'ok';}else{return 0;}
    	}else{
    		$data=array(
    			'title'=>input('title'),
    			'lxr'=>input('lxr'),	
    			'lx'=>input('lx'),	
    			'adr'=>input('adr'),
    			'uid'=>session('user.id'),
    			'zt' =>1,
    			'addtime'=>time(),
    			'uptime'=>time()
    		);
    		$id=db('customer')->insertGetId($data);
    		if(input('content')){
    			$data2=array(
    			'uid'=>session('user.id'),
    			'cid'=>$id,
    			'content'=>input('content'),
    			'time'=>time()
    			);
    			$rs=db('ccon')->insert($data2);
    		}else{$rs=1;}

    		if($id && $rs){return $id;}else{return 0;}
    	}
    }
}
