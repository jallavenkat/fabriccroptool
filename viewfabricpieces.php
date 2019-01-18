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
.imCls{margin:5px;border:1px solid #111;width:100%;height:200px;}
.fabli{margin:5px auto;padding:0;width:100%;}
.fabli li{list-style-type:none;margin:5px;display:inline;}
</style>
<div class="container-fluid">
	<div class="row">
		<a href="viewfabrics.php" class="btn pull-right">Back to Fabrics</a>
		<div class="col-sm-12">
			<?php
			$dir = "pieces/".@$_REQUEST['folder']."/";
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
			</div>
			<?php	
			}
			?>
		</div>
	</div>
</div>
 <script src="includes/js/bootstrap.min.js"></script>
 