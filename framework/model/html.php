<?php
/*****************************************************************************************
	文件： {phpok}/model/html.php
	备注： HTML生成基础类
*****************************************************************************************/
if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");}
class html_model_base extends phpok_model
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