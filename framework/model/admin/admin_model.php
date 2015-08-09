<?php
/*****************************************************************************************
	文件： {phpok}/model/admin/admin_model.php
	备注： 管理员涉及到的操作
*****************************************************************************************/
if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");}
class admin_model extends admin_model_base
{
	public function __construct()
	{
		parent::__construct();
	}

	//所有非系统管理员
	public function all_manager()
	{
		$sql = "SELECT id,account,fullname FROM ".$this->db->prefix."adm WHERE status=1 AND if_system=0";
		return $this->db->get_all($sql);
	}
}

?>