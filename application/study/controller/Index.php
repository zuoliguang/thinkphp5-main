<?php
namespace app\study\controller;
use app\core\MYController; // 自定义类
use think\Config;
use think\Request;

use app\model\Test;

class Index extends MYController
{
	function __construct() {
		parent::__construct();
		// Request::instance()->user = ['id'=>1223,'name'=>'zuoliguang']; // 手动注入用户的信息 1
		Request::instance()->bind('user', \app\model\Test::get_defult_user()); // 手动注入用户的信息 2
	}

	// 首页展示
    public function index()
    {
        return 'Hello World!';
        // 数据输出友好
        // return json(['a'=>1,'b'=>2]);
        // return xml(['a'=>1,'b'=>2]);
    }

    // 跳转
    public function test_redirect()
    {
    	$this->success('测试跳转成功', 'study/index/index');
    	// $this->error('新增失败');
    }

    // 当有空操作时
    public function _empty($name)
    {
    	return '空操作:'.$name;
    }

    // 查看当前访问地址元素信息
    public function test_pinfo(Request $request)
    {
		$module = $request->module(); // 模块
		$controller = $request->controller(); // 控制器
		$action = $request->action(); // 函数
		$langset = $request->langset(); // 语言
		$header = $request->header(); // 头信息
		$user = $request->user; // 获取初始化时注入的用户信息
		var_dump($module);
		var_dump($controller);
		var_dump($action);
		var_dump($langset);
		var_dump($header);
		var_dump($user);
    }

    public function test_model()
    {
    	$test = new Test();
    	var_dump($test);
    }

    public function test_db()
    {
    	$test = new Test();

    	// $id = 1;
    	// $data = $test->get_by_id($id); //查询
    	// return json($data);

    	// $data = $test->getAll(); //获取所有
    	// return json($data);
    	
    	// $insertId = $test->add(['count'=>99,'string'=>'this is an shenqideguodu! 中国话！']); // 新增
    	// var_dump($insertId);
    	
    	// $data = [
    	// 	['count'=>5],
    	// 	['count'=>4]
    	// ];
    	// $res = $test->add_batch($data); // 批量新增
    	// var_dump($res);
    	
    	// $id = 6;
    	// $updateData = ['count'=>100,'string'=>'更新测试！jjj']; // 更新
    	// $res = $test->edite($id, $updateData);
    	// var_dump($res);
    	
    	// $res = $test->del(1); // 删除
    	// $res = $test->del([4,5]);
    	// $res = $test->del(8, ">=");
    	// var_dump($res);
    	

    }

    public function test_view()
    {
        $data = [
            'name'=>'zuoliguang'
        ];
    	return $this->fetch('study/index', $data);
    }

    public function test_ext()
    {
    	
    }

    public function test_comm()
    {
    	
    }

    public function test_nosql()
    {
    	
    }

    public function test_hook()
    {
    	
    }
}
