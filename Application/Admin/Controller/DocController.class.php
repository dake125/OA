<?php
//声明命名空间
namespace Admin\Controller;
//引入父类
use Think\Controller;
//声明类并且继承父类
class DocController extends CommonController{

	//add方法
	public function add(){
		//判断请求类型
		if(IS_POST){
			//接收数据
			$post = I('post.');
			//实例化模型
			$model = D('Doc');
			//数据保存
			$result = $model -> saveData($post,$_FILES['file']);
			//判断保存结果
			if($result){
				//成功
				$this -> success('添加成功!',U('showList'),3);
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
		//查询数据
		$model = M('Doc');
		$data = $model -> select();	//查询全部
		//传递给模版
		$this -> assign('data',$data);
		//展示模版
		$this -> display();
	}

	//download方法
	public function download(){
		//接收id
		$id = I('get.id');
		//查询数据
		$data = M('Doc') -> find($id);
		//下载代码
		$file = WORKING_PATH . $data['filepath'];
		//输出文件
		header("Content-type: application/octet-stream");
		header('Content-Disposition: attachment; filename="' . basename($file) . '"');
		header("Content-Length: ". filesize($file));
		//输出缓冲区
		readfile($file);
	}

	//showContent方法
	public function showContent(){
		//接收id
		$id = I('get.id');
		//查询数据
		$data = M('Doc') -> find($id);
		//输出内容，并且还原被转移的字符
		echo htmlspecialchars_decode($data['content']);
	}

	//edit方法
	public function edit(){
		//判断请求类型
		if(IS_POST){
			//处理数据的提交
			$post = I('post.');
			//实例化自定义模型
			$model = D('Doc');
			//调用updateData方法实现数据的保存
			$result = $model -> updateData($post,$_FILES['file']);
			//判断返回值
			if($result){
				//成功
				$this -> success('修改成功！',U('showList'),3);
			}else{
				//失败
				$this -> error('保存失败！');
			}
		}else{
			//接收id
			$id = I('get.id');
			//查询数据
			$data = M('Doc') -> find($id);
			//变量分配
			$this -> assign('data',$data);
			//展示模版
			$this -> display();
		}
	}

	public function tt(){
		$m = D('Doc');
		dump($m -> test());
	}
}