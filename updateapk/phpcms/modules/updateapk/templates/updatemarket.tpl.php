<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header');?>
<script type="text/javascript">
  $(document).ready(function() {
	  $("#name").blur(function(){
		  $.get("/index.php?m=updateapk&c=index&a=isRepeat",{name:$("#name").val()},function(data){
					if(data==1){
							alert('该应用市场已经添加过了!!!');
							$("#name").focus();
						}
				});
			
		  });
  })
  
  //检查用户输入
  function checkUserInput(){
		if($("#name").val()==''){
				alert('应用市场名称不能为空');
				return false;
			}else{
					if($("#version").val()==''){
							alert('版本号不能为空');
							return false;
						}else{
								if($("#code").val()==''){
										alert('应用市场代码不能为空');
										return false;
									}else{
										if($("#url").val()==''){
											alert('请上传APK文件');
											return false;
										}else{
												return true;
											}
										}
							}
				}
	  }
</script>
<div class="pad_10">
<div class="common-form">
<form name="myform" action="?m=updateapk&c=index&a=updateMarket" method="post" id="myform" enctype="multipart/form-data" onsubmit="return checkUserInput();">
<table width="100%" class="table_form contentWrap">
<tr>
<td><?php echo '应用市场名称';?></td>
<td>
<input type="text" name="m_name" value="<?php echo $result['name'];?>" class="input-text" id="name" size="30"></input>
</td>
</tr>
<tr>
<td><?php echo '应用市场代码';?></td>
<td>
<input type="text" name="m_code" value="<?php echo $result['code'];?>" class="input-text" id="code" size="30"></input>
</td>
</tr>
<tr>
<td><?php echo '版本号';?></td>
<td>
<input type="text" name="m_version" value="<?php echo $result['version'];?>" class="input-text" id="version" size="30"></input>&nbsp;&nbsp;
</td>
</tr>
<tr>
<td><?php echo '更新内容'?></td>
<td>
<textarea name="m_msg" rows="2" cols="18" id="m_msg" class="inputtext" style="height:45px;width:300px;"><?php echo $result['msg'];?></textarea>
</td>
</tr>
<tr>
<td><?php echo '上传APK文件';?></td>
<td>
<input type="file" name="m_file" class="input-text" id="url" size="30"></input>&nbsp;&nbsp; <?php echo $result['url'];?>
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>
 <input type="hidden" value="<?php echo $result['url'];?>" id="oldurl" /><input type="hidden" value="<?php echo $result['id'];?>" name="m_id" /><input name="dosubmit" type="submit" value="提交" id="dosubmit">
</td>
</tr>
</table>

   
</form>
</div>
</div>
</body>
</html>
