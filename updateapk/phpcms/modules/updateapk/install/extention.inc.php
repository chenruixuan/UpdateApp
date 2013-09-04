<?php
defined('IN_PHPCMS') or exit('Access Denied');
defined('INSTALL') or exit('Access Denied');

$parentid = $menu_db->insert(array('name'=>'mname', 'parentid'=>29, 'm'=>'updateapk', 'c'=>'index', 'a'=>'init', 'data'=>'s=1', 'listorder'=>0, 'display'=>'1'), true);
$menu_db->insert(array('name'=>'apk_upload', 'parentid'=>$parentid, 'm'=>'updateapk', 'c'=>'index', 'a'=>'add', 'data'=>'', 'listorder'=>0, 'display'=>'0'));
$menu_db->insert(array('name'=>'edit_version', 'parentid'=>$parentid, 'm'=>'updateapk', 'c'=>'index', 'a'=>'edit', 'data'=>'s=1', 'listorder'=>0, 'display'=>'0'));

$language = array('mname'=>'客户端更新', 'apk_upload'=>'上传客户端', 'edit_version'=>'更新版本号');
?>