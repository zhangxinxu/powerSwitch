<div class="zxx_footer">
	<div class="zxx_constr">
    	<p class="zxx_copyright">
            Copyright &copy; <a href="http://www.zhangxinxu.com/">张鑫旭-鑫空间-鑫生活</a>
            |
            <a href="http://www.zhangxinxu.com/wordpress/?p=3758">该篇相关文章</a>
            |
            <a href="https://github.com/zhangxinxu/powerSwitch">GitHub地址</a>
        </p>
    </div>
</div>

<script src="<?php 
	$jquery = '../jquery.min.js';
	if (isset($_GET['jquery'])) {
		$jquery = 'http://libs.baidu.com/jquery/'. $_GET['jquery'] . '/jquery.min.js';
	}
	echo $jquery;
?>"></script>
<script src="../jquery-powerSwitch.js"></script>