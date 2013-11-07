<?php
	$arrNav = array('首页', '迅雷动漫', '淘宝网', '京东商城', '易迅网');
	$arrClass = array('', '', '', '', '');
	
	foreach($arrNav as $index => $value) {
		if ($key == $value) {
			$arrClass[$index] = ' zxx_nav_on';	
		}
	}
?>

<div class="zxx_header">
    <div class="zxx_constr">
        <a href="http://www.zhangxinxu.com/" class="zxx_logo">
            <img class="l" src="../index_logo.gif" alt="张鑫旭-鑫空间-鑫生活" />
        </a>
        <span class="zxx_author_time">by <span role="author">zhangxinxu</span> <span role="timer">2013-10-31 19:46</span></span>
        <a href="../api/index.html" class="zxx_api" title="访问插件API使用">API</a>
    </div>
</div>

<div class="zxx_nav">
	<div class="zxx_constr">
    	<ul class="zxx_nav_ul">
        	<li class="zxx_nav_li"><a href="index.php" class="zxx_nav_a<?php echo $arrClass[0]; ?>">首页</a></li>
            <li class="zxx_nav_li"><a href="xunlei.php" class="zxx_nav_a<?php echo $arrClass[1]; ?>">迅雷动漫</a></li>
            <li class="zxx_nav_li"><a href="taobao.php" class="zxx_nav_a<?php echo $arrClass[2]; ?>">淘宝网</a></li>
            <li class="zxx_nav_li"><a href="jd.php" class="zxx_nav_a<?php echo $arrClass[3]; ?>">京东商城</a></li>
            <li class="zxx_nav_li"><a href="yixun.php" class="zxx_nav_a<?php echo $arrClass[4]; ?>">易迅网</a></li>
            <li class="zxx_nav_sp">
            	<a href="../index.html" class="zxx_gbtn">测试页面</a>&nbsp;
        		<a href="https://github.com/zhangxinxu/powerSwitch" class="zxx_rbtn" title="visit GitHub">Fork Me</a>
           	</li>
        </ul>
    </div>
</div>