<?php
/*****************************************************************************************
	文件： {phpok}/model/admin/opt_model.php
	备注： 选项组管理
*****************************************************************************************/
if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");}
class opt_model extends opt_model_base
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

	public function group_del($id)
	{
		if(!$id) return false;
		$sql = "DELETE FROM ".$this->db->prefix."opt_group WHERE id='".$id."'";
		$this->db->query($sql);
		$sql = "DELETE FROM ".$this->db->prefix."opt WHERE group_id='".$id."'";
		$this->db->query($sql);
		return true;
	}

	public function group_save($title,$id=0)
	{
		if(!$id){
			return $this->db->insert_array(array("title"=>$title),"opt_group");
		}else{
			return $this->db->update_array(array("title"=>$title),"opt_group",array("id"=>$id));
		}
	}

	public function opt_save($data,$id=0)
	{
		if(!$id){
			return $this->db->insert_array($data,"opt");
		}else{
			return $this->db->update_array($data,"opt",array("id"=>$id));
		}
	}

	public function opt_del($id)
	{
		if(!$id) return false;
		$sql = "DELETE FROM ".$this->db->prefix."opt WHERE id='".$id."'";
		return $this->db->query($sql);
	}
}

?>