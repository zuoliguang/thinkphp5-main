<?php
namespace app\core;
use think\Model;
use think\Db;
use think\Config;

class MYModel extends Model
{
	function __construct()
	{
		parent::__construct();
		$this->DB = Db::connect(Config::get('database.db_local')); // 链接 db_local 配置的数据库
	}
}