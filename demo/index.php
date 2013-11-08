<!doctype html>
<html>
<head>
<?php 
	$key = '首页';
	include('_include/header.php'); 
?>
<link rel="stylesheet" href="css/index.css" />
</head>

<body>
<?php 
	include('_include/nav.php'); 
?>

<div class="zxx_body">
	<div class="zxx_constr">
    	<!--  body of index.php -->
        <div class="index_box">
        	<div id="indexSlide1" class="index_slide index_explain">
            	<span class="index_text">好苦恼啊！首页应该放些什么东西呢？<br>
                要不，什么都来一点？幸福好滋味！^_^</span><i class="index_valign"></i>
            </div>
            <div id="indexSlide2" class="index_slide index_hidden">
            	<img data-src="img/index/hello.jpg" alt="大家好">
            </div>
            <div id="indexSlide3" class="index_slide index_explain index_hidden">
            	<span class="index_text">喂喂喂，就一张红白花花的图，好平淡哦~<br>
                要不，加点作料什么的？比方说小标题？</span><i class="index_valign"></i>
            </div>
            <div id="indexSlide4" class="index_slide index_hidden">
            	<p class="index_caption">国庆节野钓渔获，超赞的野生鲫鱼！Photo by <a href="http://www.zhangxinxu.com/" class="index_caption_a">zhangxinxu</a></p>
            	<img data-src="img/index/hello.jpg" alt="大家好">
            </div>
            <div id="indexSlide5" class="index_slide index_explain index_hidden">
            	<span class="index_text">或者来段魅惑的描述性文字？</span><i class="index_valign"></i>
            </div>
            <div id="indexSlide6" class="index_slide index_descr index_hidden">
            	<img data-src="img/index/hello.jpg" class="index_anim_img" alt="大家好">
            	<div class="index_cell">
                	<div class="index_article">
                        <h4>金秋野钓记</h4>
                        <p>金秋有中秋佳节，还有国庆长假，都是钓鱼的好时节啊！</p>
                        <p>但是，夫人他要学车。作为新世纪的好男人，有义务负责接送。因此，去天塘钓鱼就不现实，每次接送都要废掉好几个小时，是不划算的。因此，就去学车地点附近的野河钓鱼。</p>
                        <p>哈哈，完全是展示小时候多年的野钓技艺哈~ 没怎么认真钓，都有几斤的野生鲫鱼上钩，还有很多鳑鲏，雷管这些猫鱼，真是不亦乐乎……</p>
                        <p><a href="http://www.zhangxinxu.com/life/?p=418">查看全部 &raquo;</a></p>
                     </div>
                </div>
            </div>
            <div id="indexSlide7" class="index_slide index_explain index_hidden">
            	<span class="index_text">下面要出现的是？……</span><i class="index_valign"></i>
            </div>
            <div id="indexSlide8" class="index_slide index_hidden">
            	<iframe height="100%" width="100%" data-src="http://player.youku.com/embed/XNjE0Nzc0ODYw" frameborder=0 allowfullscreen></iframe>
            </div>
        </div>
        <div id="indexControl" class="index_control"></div>
        <p id="indexNav" class="index_nav">
        	<a href="javascript:" class="on" data-rel="indexSlide1">1</a>
            <a href="javascript:" data-rel="indexSlide2">2</a>
            <a href="javascript:" data-rel="indexSlide3">3</a>
            <a href="javascript:" data-rel="indexSlide4">4</a>
            <a href="javascript:" data-rel="indexSlide5">5</a>
            <a href="javascript:" data-rel="indexSlide6">6</a>
            <a href="javascript:" data-rel="indexSlide7">7</a>
            <a href="javascript:" data-rel="indexSlide8">8</a>
        </p>      
    </div>
</div>

<?php 
	include('_include/footer.php'); 
?>
<script>
$("#indexNav a").powerSwitch({
	animation: "translate",
	classAdd: "on",
	classPrefix: "index_",
	container: $("#indexControl"),
	onSwitch: function(target) {
		var eleLazyLoad = target.find("img, iframe").get(0), index = target.data("index");
		if (eleLazyLoad && !eleLazyLoad.src) {
			eleLazyLoad.src = eleLazyLoad.getAttribute("data-src");	
		}
		
		// 第4帧标题的淡入淡出效果
		if (index == 3) {
			setTimeout(function () {
				target.find("p").fadeIn();
			}, 250);
		} else {
			setTimeout(function () {
				$("#indexSlide4 p").hide();
			}, 250);			
		}
		// 第6帧CSS3驱动的动画效果
		if (index == 5) {
			setTimeout(function () {
				target.addClass("active");	
			}, 50);
		} else {
			setTimeout(function () {
				$("#indexSlide6").removeClass("active");
			}, 250);
		}		
	}
});
</script>
</body>
</html>