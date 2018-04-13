<?php

namespace Admin\Controller;

use Think\Controller;

class UserController extends CommonController{

	//add方法
	public function add(){
	
		if(IS_POST){
			
			$model = M('User');
			
			$data = $model -> create();
		
			$data['addtime'] = time();
			
			$result = $model -> add($data);
			
			if($result){
			
				$this -> success('添加成功！',U('showList'),3);
			}else{
				
				$this -> error('添加失败！');
			}
		}else{
			
			$data = M('Dept') -> field('id,name') -> select();
		
			$this -> assign('data',$data);
			
			$this -> display();
		}
	}

	//showList
	public function showList(){
		
		$model = M('User');
		
		$count = $model -> count();
	
		$page = new \Think\Page($count,1);	
		
		$page -> rollPage = 5;
		$page -> lastSuffix = false;
		$page -> setConfig('prev','上一页');
		$page -> setConfig('next','下一页');
		$page -> setConfig('last','末页');
		$page -> setConfig('first','首页');
		
		$show = $page -> show();
		
		$data = $model -> limit($page -> firstRow,$page -> listRows) -> select();
		
		$this -> assign('data',$data);
		$this -> assign('show',$show);
	
		$this -> display();
	}

	//charts方法
	public function charts(){
		
		$model = M();
		
		$data = $model -> field('t2.name as deptname,count(*) as count') -> table('sp_user as t1,sp_dept as t2') -> where('t1.dept_id = t2.id') -> group('deptname') -> select();
		
		$str = '[';
		
		foreach ($data as $key => $value) {
			$str .= "['" . $value['deptname'] . "'," . $value['count'] . "],";
		}
	
		$str = rtrim($str,',') . ']';
		//[['总裁办',1],['程序部',2],['管理部',2],['财务部',1],['运营部',1]]
		//传递给模版
		$this -> assign('str',$str);
		//展示模版
		$this -> display();
	}
}