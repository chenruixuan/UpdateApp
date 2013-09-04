<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header');?>
<div class="pad_10">
<div class="common-form">
<form name="myform" action="?m=updateapk&c=index&a=updateVersion" method="post" id="myform">
<table width="100%" class="table_form contentWrap">
<tr>
<td><?php echo '版本号';?></td>
<td>
<input type="text" name="version" value="<?php echo $version;?>" class="input-text" id="name" size="30"></input>
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>
 <input name="dosubmit" type="submit" value="提交" id="dosubmit">
</td>
</tr>
</table>
</form>
</div>
</div>
</body>
</html>
