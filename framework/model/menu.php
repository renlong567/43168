<?php
/***********************************************************
	Filename: {phpok}/model/menu.php
	Note	: 导航菜单管理
***********************************************************/
if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");}
class menu_model_base extends phpok_model
{
	var $site_id = 0;
	function __construct()
	{
		parent::model();
	}

	public function __destruct()
	{
		parent::__destruct();
		unset($this);
	}

	function get_one($id)
	{
		$sql = "SELECT * FROM ".$this->db->prefix."menu WHERE id='".$id."'";
		return $this->db->get_one($sql);
	}
}
?>