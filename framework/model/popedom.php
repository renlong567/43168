<?php
/*****************************************************************************************
	文件： {phpok}/model/popedom.php
	备注： 后台管理员权限类
*****************************************************************************************/
if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");}
class popedom_model_base extends phpok_model
{
	public function __construct()
	{
		parent::model();
	}

	public function __destruct()
	{
		parent::__destruct();
		unset($this);
	}
}

?>