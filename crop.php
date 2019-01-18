
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

<script>
$(function(){

    var canvas=document.getElementById("canvas");
    var ctx=canvas.getContext("2d");

    var truck,logo,overlay;
    var newColor="red";

    var imageURLs=[];
    var imagesOK=0;
    var imgs=[];
    imageURLs.push("SP001.png");
    imageURLs.push("pattren-1.jpg");
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

$("#saveImage").click(function(){
	
	var canvasElement=document.getElementById('canvas');
	var canvasData = canvasElement.toDataURL("image/png");
	$.ajax({
		url:'save.php', 
		type:'POST', 
		data:{
			data:canvasData,code:'placket'
		}
	});
});
}); // end $(function(){});


</script>

    <canvas id="canvas" width="340" height="417"></canvas>
	<button type="button" id="saveImage">SaveImage</button>