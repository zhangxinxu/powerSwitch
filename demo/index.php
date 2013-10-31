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
        	<div class="index_slide index_explain"></div>
        </div>
        <p class="index_nav">
        	<a href="javascript:" class="on">1</a>
            <a href="javascript:">2</a>
            <a href="javascript:">3</a>
            <a href="javascript:">4</a>
            <a href="javascript:">5</a>
            <a href="javascript:">6</a>
            <a href="javascript:">7</a>
            <a href="javascript:">8</a>
            <a href="javascript:">9</a>
        </p>      
    </div>
</div>

<?php 
	include('_include/footer.php'); 
?>
</body>
</html>