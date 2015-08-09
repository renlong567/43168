<?php
/*****************************************************************************************
	文件： {phpok}/model/admin/rewrite_model.php
	备注： 伪静态页后台相关操作
*****************************************************************************************/
if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");}
class rewrite_model extends rewrite_model_base
{
	public function __construct()
	{
		parent::__construct();
	}

	public function __destruct()
	{
		parent::__destruct();
		unset($this);
	}

	public function save($data)
	{
		return $this->db->insert_array($data,'rewrite','replace');
	}

	public function delete($id)
	{
		$sql = "DELETE FROM ".$this->db->prefix."rewrite WHERE id='".$id."' AND site_id='".$this->site_id."'";
		return $this->db->query($sql);
	}
}

?>