UpdateApp
=========

PHPCMS模块，用于更新客户端版本。

将UpdateApk目录里的文件上传到网站根目录，未替换任何文件。


客户端接口地址：

/index.php?m=updateapk&c=index&a=needupdate

参数传递方式：GET
参数：
v:客户端当前版本
f:客户端来源应用市场代码

返回值：
url：新版本客户端下载地址
msg：更新内容


注：未做代码优化。
