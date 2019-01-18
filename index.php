<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Fabrics Cropping Tool</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-site-verification" content="SlVDMpmxNK5KAsXaRrRjLCTLQ0Wl62o9hHOmxktkchY" />
        <link rel="stylesheet" href="includes/css/bootstrap.min.css">
        <link rel="stylesheet" href="includes/css/responsive.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<script src="includes/js/jquery-1.11.2.min.js"></script>
		
    </head>
<style type="text/css">
.imCls{margin:5px;border:1px solid #111;width:100%;height:150px;}
.fabli{margin:5px auto;padding:0;width:100%;}
.fabli li{list-style-type:none;margin:5px;display:inline;}
</style>
<div class="container-fluid">
	<div class="row">
		<form method="POST" id="applyNowFabric" action="applyFabric.php">
		<div class="col-sm-2">
			<ul class="fabli col-sm-12">
				<li class="col-sm-5" style="padding:0 !important;text-align:center;">
					<a href="javascript:;" data-id="checks" class="fabrics">
						<img src="checks.jpg" id="img_checks" class="img-responsive fabs" />Checks
					</a>
				</li>
				<li class="col-sm-5" style="padding:0; !important;text-align:center;">
					<a href="javascript:;" data-id="B00C" class="fabrics">
						<img src="B00C.jpg" id="img_B00C" class="img-responsive fabs" />B00C
					</a>
				</li>
				<li class="col-sm-5" style="padding:0; !important;text-align:center;">
					<a href="javascript:;" data-id="BL001" class="fabrics">
						<img src="BL001.jpg" id="img_BL001" class="img-responsive fabs" />BL001
					</a>
				</li>
			</ul>
			<div class="col-sm-12" id="shwBtn">
				<input type="hidden" name="fabric" id="fabric" />
				<button type="button" class="btn btn-success applyBtn" style="border-radius:0px;">Apply Fabric Now</button>
				<a href="viewfabrics.php" class="btn btn-primary" style="border-radius:0px;margin-top:10px;">View Cropped Fabrics</a>
			</div>
		</div>
		<div class="col-sm-10">
			<h3>Sample Shirt Shapes</h3>
			<?php
			$dir = "shirt/";
			// Sort in ascending order - this is default
			$a = scandir($dir);

			$rm=array('.','..');
			$pieces = array_diff($a,$rm);
			/*echo "<pre>";print_r($pieces);echo "</pre>";*/
			foreach($pieces as $key=>$img)
			{
			?>
			<div class="col-sm-2">
				<img class="imCls" src="<?php echo $dir.@$img;?>" />
				<input type="hidden" name="pieces[]" value="<?php echo $dir.@$img;?>" />
			</div>
			<?php	
			}
			?>
		</div>
		</form>
	</div>
</div>
 <script src="includes/js/bootstrap.min.js"></script>
 
 <script type="text/javascript">
 $(function(){
	$(".fabrics").unbind().on("click",function(){
		var oVal = $(this).attr("data-id");
		$(".fabs").css("border","0px solid #ff0000");
		$("#img_"+oVal).css("border","2px solid #ff0000");
		$("#fabric").val(oVal);
	}); 
	$(".applyBtn").unbind().on("click",function(){
		var fabric = $("#fabric").val();
		
		if(fabric != '')
		{
			$("form#applyNowFabric").submit();
		}
		else
		{
			alert("Please choose any Fabric");
		}
	});
 });
 </script>