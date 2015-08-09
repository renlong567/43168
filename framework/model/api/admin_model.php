<?php
/*****************************************************************************************
	文件： {phpok}/model/api/admin_model.php
	备注： 管理员相关操作，这里仅在API接口调用时有效
*****************************************************************************************/
if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");}
class admin_model extends admin_model_base
{
	function __construct()
	{
		parent::__construct();
	}

	public function __destruct()
	{
		parent::__destruct();
		unset($this);
	}

	function get_mail($ifsystem=0)
	{
		$sql = "SELECT id,account,email FROM ".$this->db->prefix."adm WHERE email !='' AND status=1";
		if($ifsystem)
		{
			$sql .= ' AND if_system=1 ';
		}
		$rslist = $this->db->get_all($sql);
		if(!$rslist)
		{
			return false;
		}
		return $rslist;
	}
}

?>