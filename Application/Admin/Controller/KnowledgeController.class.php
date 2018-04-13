<?php
//声明命名空间
namespace Admin\Controller;
//引入父类
use Think\Controller;
//声明类并且继承父类
class KnowledgeController extends CommonController{

	//add方法
	public function add(){
		//请求类型判断
		if(IS_POST){
			//如果是post 则处理请求
			$post = I('post.');
			//实例化自定义模型
			$model = D('Knowledge');
			//数据保存方法
			$result = $model -> addData($post,$_FILES['thumb']);
			//判断结果
			if($result){
				//成功
				$this -> success('添加成功！',U('showList'),3);
			}else{
				//失败
				$this -> error('添加失败！');
			}
		}else{
			//展示模版
			$this -> display();
		}
	}

	//showList方法
	public function showList(){
		//获取数据
		$data = M('Knowledge') -> select();
		//传递给模版
		$this -> assign('data',$data);
		//展示模版	
		$this -> display();
	}

	//download方法
	public function download(){
		//获取id
		$id = I("get.id");
		//查询数据信息
		$data = M('Knowledge') -> find($id);
		//下载代码
		$file = WORKING_PATH . $data['picture'];
		header("Content-type: application/octet-stream");
		header('Content-Disposition: attachment; filename="' . basename($file) . '"');
		header("Content-Length: ". filesize($file));
		readfile($file);
	}
}