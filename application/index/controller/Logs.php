<?php
namespace app\index\controller;

class Logs extends Common{

    public function edit(){
    	$t=input('t',0,'intval');
        $time=input('time')?strtotime(input('time')):mktime(0,0,0,date('m'),1,date('Y'));
        $user=db('admin')->where('zt',0)->select();
        if(session('user.type')){$uid=input('uid')?:session('user.id');}else{$uid=session('user.id');}
        $list=db('logs')->alias('l')->join('admin a','l.uid=a.id')->field('l.*,a.name')
        ->where('l.type',$t)->where('uid',$uid)->where('time','>= time',$time)->order('time desc')->select();
        $this->assign('t',$t);
        $this->assign('u',$user);
        $this->assign('uid',$uid);
        $this->assign('time',$time);
        $this->assign('list',$list);
        return $this->fetch();
    }

    public function runadd(){
    	$t=input('cid');
    	$data=array(
            'type'=>$t,
            'content'=>input('content'),
            'uid'=>session('user.id'),
            'time'=>time()
        );
        if(db('logs')->insert($data)){
            return 1;
        }else{ return 0;}
    }
}
