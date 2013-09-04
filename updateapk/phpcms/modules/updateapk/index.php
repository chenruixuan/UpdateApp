<?php
defined('IN_PHPCMS') or exit('No permission resources.');
//模型缓存路径
define('CACHE_MODEL_PATH',CACHE_PATH.'caches_model'.DIRECTORY_SEPARATOR.'caches_data'.DIRECTORY_SEPARATOR);
pc_base::load_app_func('util','content');
pc_base::load_app_class('admin','admin',0);
pc_base::load_sys_class('form','',0);
class index extends admin {
	private $db;
	function __construct() {
		$this->db = pc_base::load_model('content_model');
		$this->_userid = param::get_cookie('_userid');
		$this->_username = param::get_cookie('_username');
		$this->_groupid = param::get_cookie('_groupid');
	}
	
	//不带action执行的函数
	public function init(){
		//应用市场列表
		$this->db->table_name=$this->db->db_tablepre."updateapk";
		$result=$this->db->listinfo('',"id ASC",1,50);
		include $this->admin_tpl('list');
	}
	//添加应用市场
	public function addMarket(){
		if(isset($_POST['dosubmit'])){
			//上传文件
			$file_name=time().".apk";
			$filename=$_SERVER["DOCUMENT_ROOT"]."/app/".$file_name;
			$filename=str_replace('\\', '/', $filename);
			move_uploaded_file($_FILES['m_file']['tmp_name'], $filename);
			$name=$_POST['m_name'];
			$version=$_POST['m_version'];
			$code=$_POST['m_code'];
			$msg=$_POST['m_msg'];
			$this->db->table_name=$this->db->db_tablepre."updateapk";
			$data=array('name'=>$name,'version'=>$version,'url'=>$file_name,'updatetime'=>time(),'code'=>$code,'msg'=>$msg);
			$this->db->insert($data);
			showmessage(L('operation_success'));
			
		}else{
			include $this->admin_tpl('addmarket');
		}
	}
	//批量更新版本号
	public function updateVersion(){
		if(isset($_POST['dosubmit'])){
			$this->db->table_name=$this->db->db_tablepre."updateapk";
			//获取所有记录
			$result=$this->db->listinfo('','id DESC',1,'22222222');
			foreach($result as $v){
				$where=array('id'=>$v['id']);
				$this->db->update(array('version'=>$_POST['version']),$where);
			}
			
			showmessage(L('operation_success'));
		}else{
			$this->db->table_name=$this->db->db_tablepre."updateapk";
			$result=$this->db->get_one(array('id'=>1));
			if($result){
				$version=$result['version'];
			}else{
				$version=0;
			}
			include $this->admin_tpl('updateversion');
		}
	}
	
	//修改应用市场信息
	public function updateMarket(){
		$id=$_GET['id'];
		if(isset($_POST['dosubmit'])){
			//上传文件
			$file_name=time().".apk";
			$filename=$_SERVER["DOCUMENT_ROOT"]."/app/".$file_name;
			$filename=str_replace('\\', '/', $filename);
			move_uploaded_file($_FILES['m_file']['tmp_name'], $filename);
			$this->db->table_name=$this->db->db_tablepre."updateapk";
			$where=array('id'=>$_POST['m_id']);
			$data=array('name'=>$_POST['m_name'],'version'=>$_POST['m_version'],'url'=>$file_name,'code'=>$_POST['m_code'],'msg'=>$_POST['m_msg']);
			$this->db->update($data,$where);
			showmessage(L('operation_success'));
		}else{
			$this->db->table_name=$this->db->db_tablepre."updateapk";
			$result=$this->db->get_one(array('id'=>$id));
			include $this->admin_tpl('updatemarket');
		}
	}
	
	//jquery判断该应用市场是否已经添加过
	public function isRepeat(){
		$name=$_GET['name'];
		$this->db->table_name=$this->db->db_tablepre."updateapk";
		$result=$this->db->get_one(array('name'=>$name));
		if($result){
			//已经存在
			echo 1;
		}else{
			echo 2;
		}
	}
	
	/**
	 * 以下是客户端接口部分
	 */
	
	//根据客户端发送过来的版本号和应用市场来源判断是否提示更新
	public function needupdate(){
		$version=$_GET['v'];
		$from=$_GET['f'];
		$this->db->table_name=$this->db->db_tablepre."updateapk";
		$result=$this->db->get_one(array('code'=>$from));
		//判断是否需要升级
		$arr=array();
		if($result['version']==$version){
			//不需要升级
			$arr=array('url'=>'','msg'=>'');
		}else{
			//需要升级，请将此website更换成自己的
			$website='http://localhost';
			$url=$website.'/app/'.$result['url'];
			if($result['msg']==''){
				$msg='';
			}else{
				$msg=$result['msg'];
			}
			$arr=array('url'=>$url,'msg'=>$msg);
		}
		echo json_encode($arr);
	}
	

}
?>