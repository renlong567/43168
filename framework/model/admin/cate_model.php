<?php
/*****************************************************************************************
	文件： {phpok}/model/admin/cate_model.php
	备注： 分类后台操作
*****************************************************************************************/
if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");}
class cate_model extends cate_model_base
{
	public function __construct()
	{
		parent::__construct();
	}

	public function save($data,$id=0)
	{
		if(!$data || !is_array($data)){
			return false;
		}
		if($id){
			return $this->db->update_array($data,"cate",array("id"=>$id));
		}else{
			return $this->db->insert_array($data,"cate");
		}
	}

}

?>