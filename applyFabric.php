<?php
//echo "<pre>";print_r($_REQUEST['pieces']);echo "</pre>";
?>
 <link rel="stylesheet" href="includes/css/bootstrap.min.css">
<link rel="stylesheet" href="includes/css/responsive.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script src="includes/js/jquery-1.11.2.min.js"></script>
<script src="includes/js/bootstrap.min.js"></script>
<style type="text/css">
canvas{margin:5px;width:50%;}
</style>
<div class="col-sm-12">
	<div class="col-sm-12">
		<a href="index.php" class="btn pull-right">Back to Home</a>
	</div>
<?php
 if(@sizeOf($_REQUEST['pieces']) > 0)
 {
	 for($p1=0;$p1<sizeOf($_REQUEST['pieces']);$p1++)
	 {
?>

<script>
$(function(){
	var fabric="<?php echo @$_REQUEST['fabric']?>.jpg";
	var pieces="<?php echo @$_REQUEST['pieces'][$p1]?>";
	var canvasid="<?php echo $p1;?>";
    var canvas=document.getElementById("canvas"+canvasid);
    var ctx=canvas.getContext("2d");

    var truck,logo,overlay;
    var newColor="red";

    var imageURLs=[];
    var imagesOK=0;
    var imgs=[];
    imageURLs.push(pieces);
    imageURLs.push(fabric);
    imageURLs.push("sample.png");
    loadAllImages();

    function loadAllImages(){
        for (var i = 0; i < imageURLs.length; i++) {
          var img = new Image();
          imgs.push(img);
          img.onload = function(){ imagesOK++; imagesAllLoaded(); };
          img.src = imageURLs[i];
        }      
    }

    var imagesAllLoaded = function() {
      if (imagesOK==imageURLs.length ) {
         // all images are fully loaded an ready to use
         truck=imgs[0];
         logo=imgs[1];
         overlay=imgs[2];
         start();
      }
    };


    function start(){

        // save the context state
        ctx.save();

        // draw the overlay
        ctx.drawImage(overlay,0,0);

        // change composite mode to source-in
        // any new drawing will only overwrite existing pixels
        ctx.globalCompositeOperation="source-in";

        // draw a purple rectangle the size of the canvas
        // Only the overlay will become purple
        ctx.fillStyle=newColor;
        ctx.fillRect(0,0,canvas.width,canvas.height);

        // change the composite mode to destination-atop
        // any new drawing will not overwrite any existing pixels
        ctx.globalCompositeOperation="destination-atop";

        // draw the full logo
        // This will NOT overwrite any existing purple overlay pixels
        ctx.drawImage(logo,0,0);

        // draw the truck
        // This will NOT replace any existing pixels
        // The purple overlay will not be overwritten
        // The blue logo will not be overwritten
        ctx.drawImage(truck,0,0);

        // restore the context to it's original state
        ctx.restore();

    }

	
}); // end $(function(){});

</script>
<div class="col-sm-3">
    <canvas id="canvas<?php echo $p1;?>" class="canvases" width="340" height="417" style="border:1px solid #333;"></canvas>
</div>
<?php
	 }
 }
?>
	<div class="col-sm-12" style="margin-bottom:30px;">
		<button type="button" class="btn btn-danger pull-right" id="saveImage">Save All Images</button><br />
	</div>
</div>
<script type="text/javascript">

$(function(){
	$("#saveImage").click(function(){
		
		//var canvasElement=document.getElementByClassName('canvases');
		var canvasData=[];
		$(".canvases").each(function(){
			var cid=$(this).attr('id');
			
			var canvasid=document.getElementById(cid);
			canvasData.push(canvasid.toDataURL("image/png"));
		});
		
		$.ajax({
			url:'savepieces.php', 
			type:'POST', 
			data:{
				data:canvasData,code:'<?php echo @$_REQUEST['fabric']?>'
			},
			async:false,
			success:function(resp){
				if(resp == 1)
				{
					window.location.href='index.php';
				}
			}
		});
	});
});
</script>