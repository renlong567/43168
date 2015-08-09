<?php
/***********************************************************
	Filename: {phpok}/model/config.php
	Note	: 配置信息，此信息主要存储在data目录下
***********************************************************/
if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");}
class config_model_base extends phpok_model
{
	function __construct()
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