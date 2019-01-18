<?php
/*echo "<pre>";print_R($_POST['data']);echo "</pre>";*/
if(@is_dir("pieces/".$_POST['code']))
{
	
}
else
{
	@mkdir("pieces/".$_POST['code']);
}
$str=0;
if(@sizeOf($_POST['data']) > 0)
{
	for($i=0;$i<sizeOf($_POST['data']);$i++)
	{
		$data = $_POST['data'][$i];
		$data = substr($data,strpos($data,",")+1);
		$data = base64_decode($data);
		$file = 'pieces/'.$_POST['code'].'/'.($i+1).'.png';
		file_put_contents($file, $data);
		$str=1;
	}
}
if(@$str == 1)
{
	echo 1;
}
?>