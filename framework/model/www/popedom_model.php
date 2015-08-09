<?php
/*****************************************************************************************
	文件： {phpok}/model/www/popedom_model.php
	备注： 读取权限
*****************************************************************************************/
if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");}
class popedom_model extends popedom_model_base
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

	//判断是否有阅读权限
	//pid，为项目ID
	//groupid，为会员组ID
	public function check($pid,$groupid=0,$type='read')
	{
		$popedom = $this->_popedom_list($groupid);
		if(!$popedom){
			return false;
		}
		if(in_array($type.':'.$pid,$popedom)){
			return true;
		}
		return false;
	}

	private function _popedom_list($groupid)
	{
		$sql = "SELECT popedom FROM ".$this->db->prefix."user_group WHERE id='".$groupid."' AND status=1";
		$rs = $this->db->get_one($sql);
		if(!$rs || !$rs['popedom']){
			return false;
		}
		$popedom = unserialize($rs['popedom']);
		if(!$popedom[$this->site_id]){
			return false;
		}
		return explode(",",$popedom[$this->site_id]);
	}
}

?>