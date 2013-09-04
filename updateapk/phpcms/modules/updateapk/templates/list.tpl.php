<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header','updateapk');?>
<div class="pad_10">
<div class="explain-col">
<?php echo '使用中遇到问题，请联系QQ：1987152156，邮箱：chenruixuan@dayouhui.com';?>
</div>
<div class="bk10"></div>
<form name="myform" action="?m=admin&c=role&a=listorder" method="post">
<div class="table-list">
    <table width="100%" cellspacing="0">
        <thead>
		<tr>
		<th width="10%">ID</th>
		<th width="30%" align="left" ><?php echo '应用市场名称'?></th>
		<th width="30%" align="left" ><?php echo '客户端URL'?></th>
		<th width="10%" align="left" ><?php echo '版本号'?></th>
		<th width="20%" ><?php echo '管理操作'?></th>
		</tr>
        </thead>
        <tbody>
		<?php 
		if(is_array($result)){
			foreach($result as $info){
		?>
		<tr>
		<td width="10%" align="center"><?php echo $info['id']?></td>
		<td width="30%" ><?php echo $info['name']?></td>
		<td width="30%" ><?php echo "../app/".$info['url']?></td>
		<td width="10%" ><?php echo $info['version']?></td>
		<td width="20%" class="text-c"><a href="?m=updateapk&c=index&a=updateMarket&id=<?php echo $info['id']?>"><?php echo '修改'?></a> </td>
		</tr>
		<?php 
			}
		}
		?>
</tbody>
</table>
</div>
</div>
</form>
<script type="text/javascript">
<!--
function edit(id, name) {
	window.top.art.dialog({id:'edit'}).close();
	window.top.art.dialog({title:name,id:'edit',iframe:'?m=admin&c=linkage&a=edit&linkageid='+id,width:'500',height:'200'}, function(){var d = window.top.art.dialog({id:'edit'}).data.iframe;d.document.getElementById('dosubmit').click();return false;}, function(){window.top.art.dialog({id:'edit'}).close()});
}
//-->
</script>
</body>
</html>