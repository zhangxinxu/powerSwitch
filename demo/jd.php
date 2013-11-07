<!doctype html>
<html>
<head>
<?php 
	$key = '京东商城';
	include('_include/header.php'); 
?>
<link rel="stylesheet" href="css/jd.css" />
<style>
.zxx_body .zxx_constr {
	width: 1210px;
	background: url(img/jd/bg.png) no-repeat 0 12px;
}
</style>
</head>

<body>
<?php 
	include('_include/nav.php'); 
?>

<div class="zxx_body">
	<div class="zxx_constr">
    	<!--  body of jd.php -->
        <div class="jd_body">
        	<div id="jdAdSlide" class="jd_ad_slide">
            	<img src="http://img13.360buyimg.com/da/g14/M00/1A/02/rBEhVlJ5oCUIAAAAAAE4O585pSAAAFGKgINDgcAAThT749.jpg" class="jd_ad_img">
                <img data-src="http://img13.360buyimg.com/da/g14/M05/19/1F/rBEhVlJ4ugUIAAAAAADNu0WERsYAAFE9ABekBAAAM3T074.jpg" class="jd_ad_img">
                <img data-src="http://img10.360buyimg.com/da/g13/M00/14/08/rBEhUlJzCqoIAAAAAAE7yTNr8uEAAE2ggLjA1QAATvh176.jpg" class="jd_ad_img">
                <img data-src="http://img14.360buyimg.com/da/g14/M00/1A/00/rBEhVVJ40jMIAAAAAAEESo4hULIAAFFRgKzU_IAAQRi366.jpg" class="jd_ad_img">
                <img data-src="http://img13.360buyimg.com/da/g14/M00/1A/02/rBEhVlJ5oCUIAAAAAAE4O585pSAAAFGKgINDgcAAThT749.jpg" class="jd_ad_img">
                <img data-src="http://img14.360buyimg.com/da/g14/M00/1A/02/rBEhVlJ5mUEIAAAAAAFZ8YVO0RYAAFGEwKl9xAAAVoJ892.jpg" class="jd_ad_img">
                <img data-src="http://img10.360buyimg.com/da/g14/M00/1A/03/rBEhVlJ5sGsIAAAAAAEw4mmfc50AAFGdwOMkwIAATD6787.jpg" class="jd_ad_img">
                <div id="jdAdBtn" class="jd_ad_btn"></div><!-- add active -->
            </div>
            <!-- 右侧的服务 -->
            <div class="jd_service">
            	<h4 id="servNav" class="jd_nav_x">
                	<a href="#" class="js_nav_a active" data-rel="servImage1">花费</a>
                    <a href="#" class="js_nav_a" data-rel="servImage2">旅行</a>
                    <a href="#" class="js_nav_a" data-rel="servImage3">彩票</a>
                    <a href="#" class="js_nav_a" data-rel="servImage4">游戏</a>
                </h4>
                <div class="jd_service_con">
                	<s id="pointLine" class="jd_point_line"><i class="jd_point_cor"></i></s>
                    <img id="servImage1" src="img/jd/exp-tel.png" class="jd_service_img" style="display:block;">
                    <img id="servImage2" src="img/jd/exp-trval.png" class="jd_service_img">
                    <img id="servImage3" src="img/jd/exp-ticket.png" class="jd_service_img">
                    <img id="servImage4" src="img/jd/exp-game.png" class="jd_service_img">
                </div>
            </div>
        </div>
        <!-- 版权提示 -->
        <p class="zxx_remind">本实例所有图片资源为京东商城版权所有，这里仅为共享学习之用！</p>  
    </div>
</div>

<?php 
	include('_include/footer.php'); 
?>
<script>
// 大的图片广告
// 根据图片创建id,按钮元素等，实际开发建议使用JSON数据类似
var htmlAdBtn = '';
$("#jdAdSlide img").each(function(index, image) {
	var id = "adImage" + index;
	htmlAdBtn = htmlAdBtn + '<a href="javascript:" class="jd_ad_btn_a" data-rel="'+ id +'">'+ (index + 1) +'</a>';
	image.id = id;
});
$("#jdAdBtn").html(htmlAdBtn).find("a").powerSwitch({
	eventType: "hover",
	classAdd: "active",
	animation: "fade",
	autoTime: 5000,
	onSwitch: function(image) {
		if (!image.attr("src")) {
			image.attr("src", image.attr("data-src"));	
		}
	}
}).eq(0).trigger("mouseover");

// 便民服务
$("#servNav a").powerSwitch({
	classAdd: "active",
	eventType: "hover",
	onSwitch: function() {
		$("#pointLine").animate({ "left": $(this).position().left}, 200);
	}
});
</script>
</body>
</html>