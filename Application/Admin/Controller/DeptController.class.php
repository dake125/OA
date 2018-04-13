<?php
//命名空间声明
namespace Admin\Controller;
//引入父类控制器
use Think\Controller;
//声明类并且继承父类
class DeptController extends CommonController{

	//展示实例化的结果
	public function shilihua(){
		//普通实例化方法
		//$model = new \Admin\Model\DeptModel();
		//实例化自定义模型 D
		//$model = D('Dept');	//其实例化结果和使用普通new方法是一样的
		//$model = D();	//实力了父类模型

		//实例化父类
		//$model = M('Dept');	//关联数据表
		$model = M();	//实例化父类模型，不关联数据表
		dump($model);
	}

	//add方法使用
	public function tianjia(){
		//实例化模型
		$model = M('Dept');	//直接使用基本的增删改查可以使用父类模型
		//声明数组(关联数组)
		/*$data = array(
					'name'	=>	'财务部',
					'pid'	=>	'0',
					'sort'	=>	'2',
					'remark'=>	'这是财务部门'
				);
		$result = $model -> add($data);//增加操作
		*/

		//批量添加
		$data = array(
					array(
							'remark'	=>	'权力最高的部门',
							'name'		=>	'总裁办',
							'sort'		=>	'4',
							'pid'		=> 	'0'
						),
					array(
							'remark'=>	'123',
							'name'	=>	'公关部',
							'sort'	=> 	'3',
							'pid'	=>	'0',
						)
				);
		//批量添加
		$result = $model -> addAll($data);
		dump($result);
	}

	//save方法的使用
	public function xiugai(){
		//实例化模型
		$model = M('Dept');
		//修改操作
		$data = array(
					'id'	=>	'2',
					'sort'	=>	'22',
					'remark'=>	'今天发工资'
				);
		$result = $model -> save($data);
		//打印
		dump($result);
	}

	//查询
	public function chaxun(){
		//实例化模型
		$model = M('Dept');
		//select部门
		$data = $model -> select();	//查询全部
		$data = $model -> select(13);	//指定id
		$data = $model -> select('2,14');	//指定id集合

		//find部分
		$data = $model -> find();	//limit 1
		$data = $model -> find(13);	//指定id
		//打印
		dump($data);
	}

	//删除操作
	public function shanchu(){
		//实例化模型
		$model = M('Dept');
		//删除操作
		//$result = $model -> delete();	//false
		//$result = $model -> delete(14);//删除指定id
		$result = $model -> delete('1,13');	//删除多个id记录
		//打印
		dump($result);
	}

	//add方法
	public function add(){
		//判断请求类型
		if(IS_POST){
			//处理表单提交
			//$post = I('post.');
			//写入数据
			$model = D('Dept');
			//数据对象创建
			$data = $model -> create();	//不传递参数则接收post数据
			//判断验证结果
			if(!$data){
				//提示用户验证失败
				//dump($model -> getError());die;
				$this -> error($model -> getError());exit;
			}
			dump($data);die;
			$result = $model -> add();
			//判断返回值
			if($result){
				//成功
				$this -> success('添加成功',U('showList'),3);
			}else{
				//失败
				$this -> error('添加失败');
			}
		}else{
			//查询出顶级部门
			$model = M('Dept');
			$data = $model -> where('pid = 0') -> select();
			//展示数据
			$this -> assign('data',$data);
			//展示模版
			$this -> display();
		}
	}

	//showList
	public function showList(){
		//模型实例化
		$model = M('Dept');
		//查询
		$data = $model -> order('sort asc') -> select();
		//二次遍历查询顶级部门
		foreach ($data as $key => $value) {
			if($value['pid'] > 0){
				//查询pid对应的部门信息
				$info = $model -> find($value['pid']);
				//只需要保留其中的name
				$data[$key]['deptname'] = $info['name'];
			}
		}
		//使用load方法载入文件
		load('@/tree');
		$data = getTree($data);
		//dump($data);die;
		//传递模版
		$this -> assign('data',$data);
		//展示模版
		$this -> display();
	}

	//edit
	public function edit(){
		if(IS_POST){
			//处理post请求
			$post = I('post.');
			//实例化
			$model = M('Dept');
			//保存操作
			$result = $model -> save($post);
			//判断结果成功与否
			if($result !== false){
				//修改成功
				$this -> success('修改成功',U('showList'),3);
			}else{
				//修改失败
				$this -> error('修改失败');
			}
		}else{
			//接收id
			$id = I('get.id');
			//实例化模型
			$model = M('Dept');
			//查询部门信息
			$data = $model -> find($id);
			//查询全部的部门信息，给下拉列表使用
			$info = $model -> where("id != $id") -> select();
			//变量分配
			$this -> assign('data',$data);
			$this -> assign('info',$info);
			//展示模版
			$this -> display();
		}
	}

	//del
	public function del(){
		//接收参数
		$id = I('get.id');
		//模型实例化
		$model = M('Dept');
		//删除
		$result = $model -> delete($id);
		//判断结果
		if($result){
			//删除成功
			$this -> success('删除成功！');
		}else{
			//删除失败
			$this -> error('删除失败！');
		}
	}
}