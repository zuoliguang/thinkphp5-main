<?php
namespace app\model;
use app\core\MYModel; // 自定义类

class Test extends MYModel
{
	function __construct() {
		parent::__construct();
	}

	protected $table = 'tttt';

	public static function get_defult_user()
	{
		return ['id'=>1223,'name'=>'zuoliguang'];
	}

	// 增加
	public function add($test)
	{
		// 单个添加
		$this->DB->table('tttt')->insert($test);
		return $this->DB->table('tttt')->getLastInsID();
	}
	public function add_batch($data)
	{
		// 批量添加
		return $this->DB->table('tttt')->insertAll($data);
	}


	// 查找
	public function get_by_id($id)
	{
		// return $this->DB->query("SELECT * FROM tttt WHERE id = :id", ['id'=>$id]);
		return $this->DB->table('tttt')->where('id', $id)->find();
	}
	public function getAll()
	{
		return $this->DB->query("SELECT * FROM tttt");
	}


	// 更新
	public function edite($id, $test)
	{
		// 更新1
		return $this->DB->table('tttt')->where('id', $id)->update($test);
		// 更新2
		// $test['id'] = $id; // 含有主键
		// return $this->DB->table('tttt')->update($test);
		// 更新某个字段的值
		// return $this->DB->table('tttt')->where('id',1)->setField('string', 'thinkphp');
		// 自增或自减一个字段的值
		// return $this->DB->table('tttt')->where('id', 1)->setInc('count', 10); // count 字段加 10
		// return $this->DB->table('tttt')->where('id', 2)->setInc('count', 10); // count 字段加 10
		// return $this->DB->table('tttt')->where('id', 6)->setDec('count', 10); // count 字段减 10
		// return $this->DB->table('tttt')->where('id', 7)->setDec('count', 10); // count 字段减 10
		// 快捷更新
		// return $this->DB->table('tttt')->where('id',3)->inc('count',8)->exp('string','UPPER(string)')->update();
	}


	// 删除 返回删除的条数
	public function del($id, $condition='')
	{
		// 根据主键删除
		if (!is_array($id) && empty($condition)) {
			return $this->DB->table('tttt')->delete($id); // 单个 1
			// return $this->DB->table('tttt')->where('id', $id)->delete(); // 单个 2
		} elseif (is_array($id) && empty($condition)) {
			return $this->DB->table('tttt')->delete($id); // 批量
		} elseif (!is_array($id) && !empty($condition)) {
			// 条件删除
			return $this->DB->table('tttt')->where('id', $condition, $id)->delete();
		} else {
			return false;
		}
	}
}