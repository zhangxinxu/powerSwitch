<!doctype html>
<html>
<head>
<?php 
	$key = '易迅网';
	include('_include/header.php'); 
?>
<link rel="stylesheet" href="css/yixun.css" />
<style>
.zxx_body .zxx_constr {
	width: 1190px;
	background: url(img/yixun/bg.png) no-repeat 0 12px;
}
</style>
</head>

<body>
<?php 
	include('_include/nav.php'); 
?>

<div class="zxx_body">
	<div class="zxx_constr">
    	<!--  body of yixun.php -->
        <div class="yixun_body">
        	<div class="yixun_main">
            	<div id="yixunAdSlide" class="yixun_ad_slide">
					<script>
						var dataAdSlide = [{
							src: "http://pwg2.gtimg.cn/wanggou/855006089/855006089_929765bc9f5937b7fd48d142163b9e0_5279b0b7.jpg/0",
							title: "11.11来真的"	
						}, {
							src: "http://pwg3.gtimg.cn/wanggou/855006089/855006089_5736bb3c1dc2d0deb496eb09ef97936_5278408c.jpg/0",
							title: "家电全网杀无赦"	
						}, {
							src: "http://pwg2.gtimg.cn/wanggou/855006089/855006089_d73d806b4af48d763cfd21a8f78caa6_527a2461.jpg/0",
							title: "早市吃货专场"	
						}, {
							src: "http://pwg1.gtimg.cn/wanggou/855006089/855006089_77916ca7de4299df3119ea3fbef6100_52770422.jpg/0",
							title: "双11，提前2天抢-无线"	
						}, {
							src: "http://pwg2.gtimg.cn/wanggou/855006089/855006089_3d322f959ec373fd25bd63222be0445_52784825.jpg/0",
							title: "2亿现金疯狂抽 再抽5s和smart"	
						}, {
							src: "http://pwg2.gtimg.cn/wanggou/855006089/855006089_a16621bc89e69e93e3e308628c7c08c_5279ad5c.jpg/0",
							title: "11.11提前疯抢！百大品牌低至0.8元！"	
						}, {
							src: "http://pwg0.gtimg.cn/wanggou/855006089/855006089_2bfe385a1b472cc3dbd991a9f54c447_5279df39.jpg/0",
							title: "全场5折 还等什么-联营"	
						}, {
							src: "http://pwg3.gtimg.cn/wanggou/855006089/855006089_327e8b595b6c904183c89e7b1465290_52765808.jpg/0",
							title: "双11活动手机会场"
						}];
					</script>
            	</div>
                <div class="yixun_cheap">
                	<span id="cheapTxt" class="yixun_cheap_txt">日间抢购，全网底价</span>
                    <a href="javascript:" class="yixun_cheap_link cheapLink" data-rel="cheapImg2" data-txt="日间抢购，全网底价">下期预告<i class="yixun_corr_wh"></i>&nbsp;</a>
                    <a href="javascript:" class="yixun_cheap_link cheapLink" data-rel="cheapImg1" data-txt="下期预告，明日9点" style="display:none;">&nbsp;<i class="yixun_corl_wh"></i>返回抢购</a>
                </div>
                <img id="cheapImg1" src="img/yixun/cheap-1.png" class="yixun_cheap_img">
                <img id="cheapImg2" src="img/yixun/cheap-2.png" class="yixun_cheap_img" style="display:none;">
            </div>
            <!-- 右侧 -->       	
            <div class="yixun_side">
            	<div class="yixun_side_border"></div>
                <div class="yixun_advance">
                	<img id="advImage1" src="http://img1.icson.com/ICSONAD/201308/1_big20130823103843254523.jpg">
                    <img id="advImage2" src="http://img1.icson.com/ICSONAD/201308/1_big20130819203448883572.JPG" style="display:none;">
                    <img id="advImage3" src="http://img2.icson.com/ICSONAD/201309/1_big20130923154225852453.jpg" style="display:none;">
                    <div id="advBtnX" class="yixun_dot_x">
                    	<a href="javascript:" class="on" data-rel="advImage1">•</a>
                        <a href="javascript:" data-rel="advImage2">•</a>
                        <a href="javascript:" data-rel="advImage3">•</a>
                    </div>
                </div>
                <!-- 服务中心 -->
                <div class="yixun_service">
                	<h4 class="yixun_service_h">查看更多服务</h4>
                    <h4 class="yixun_service_h">去服务中心</h4>
                </div>
                <!-- 公告 -->
                <div class="yixun_notice">
                	<h3 class="yixun_notice_title">公告</h3>
                    <div id="noticeOperate" class="yixun_notice_operate">
                    	<a href="javascript:" class="yixun_notice_prev" data-rel="noticeDetail"></a>
                        <a href="javascript:" class="yixun_notice_next" data-rel="noticeDetail"></a>
                    </div>
                    <div class="yixun_notice_detail">
                    	<ul class="noticeDetail">
                        	<li>部分订单转顺丰配送通知</li>
                            <li>“11.11来真的”正式上线！</li>
                        </ul>
                        <ul class="hidden noticeDetail">
                        	<li>易迅iPad客户端正式上线，欢...</li>
                            <li>“11.11来真的”正式上线！</li>
                        </ul>
                        <ul class="hidden noticeDetail">
                        	<li>关于近期部分用户无法正常访...</li>
                            <li>“11.11来真的”正式上线！</li>
                        </ul>
                    </div>
                </div>
                <!-- 客户端，微信等 -->
                <div class="yixun_code">
                	<div class="yixun_code_slide">
                    	 <img id="codeImg1" src="img/yixun/code-1.png" class="yixun_code_img">
                		<img id="codeImg2" src="img/yixun/code-2.png" class="yixun_code_img" style="display:none;">
                    </div>
                    <div id="codeBtnX" class="yixun_dot_x">
                    	<a href="javascript:" class="on" data-rel="codeImg1">•</a>
                        <a href="javascript:" data-rel="codeImg2">•</a>
                    </div>
                </div>
            </div>
        </div>  
        <!-- 版权提示 -->
        <p class="zxx_remind">本实例所有图片资源为易迅网版权所有，这里仅为共享学习之用！</p>     
    </div>
</div>

<?php 
	include('_include/footer.php'); 
?>
<script>
// 根据JSON数据生成slide广告
var htmlAdSlide = '', htmlAdBtns = '<div id="yixunAdBtn" class="yixun_ad_btn">';
$.each(dataAdSlide, function(index, obj) {
	var id = "adSlide" + index;
	if (index === 0) {
		htmlAdSlide = htmlAdSlide + '<img id="'+ id +'" src="'+ obj.src +'" title="'+ obj.title +'" alt="'+ obj.title +'">';
		htmlAdBtns = htmlAdBtns + '<a href="javascript:" class="active" data-rel="'+ id +'">1</a>';
	} else {
		htmlAdSlide = htmlAdSlide + '<img id="'+ id +'" data-src="'+ obj.src +'" title="'+ obj.title +'" alt="'+ obj.title +'" style="display:none;">';
		htmlAdBtns = htmlAdBtns + '<a href="javascript:" data-rel="'+ id +'">'+ (index + 1) +'</a>';
	}
});
htmlAdBtns = htmlAdBtns + '</div>';

$("#yixunAdSlide").html(htmlAdSlide + htmlAdBtns);

// 绑定
$("#yixunAdBtn a").powerSwitch({
	eventType: "hover",
	classAdd: "active",
	animation: "fade",
	autoTime: 4600,
	container: $("#yixunAdSlide"),
	onSwitch: function(image) {
		if (!image.attr("src")) {
			// 图片动态载入
			image.attr("src", image.attr("data-src"));	
		}	
	}
});

// 下期预告
$(".cheapLink").powerSwitch({
	onSwitch: function(panelShow, tabHide, panelHide) {
		$(this).hide();
		tabHide.show();
		$("#cheapTxt").text(tabHide.attr("data-txt"));
	}
});

// 右侧几个点点驱动的
$("#advBtnX a").powerSwitch({
	eventType: "hover",
	classAdd: "on",
	animation: "fade",
	autoTime: 4000
});
$("#codeBtnX a").powerSwitch({
	eventType: "hover",
	classAdd: "on",
	hoverDelay: 0,
	autoTime: 4000
});
// 下面的点击触发
$("#noticeOperate a").powerSwitch({
	classDisabled: "",
	animation: "fade",
	duration: "sync"
});
</script>
</body>
</html>