<?php
include('functions.php');

$query="SELECT id,vendor_link FROM recipes WHERE status=1 LIMIT 300";
if(!$result=mysql_query($query))
{
    die('There was an error running the query [' . mysql_error() . ']');
}

while($row = mysql_fetch_array($result)){
	$vendor_link='http://yummly.com/'. $row['vendor_link'];
	$id=$row['id'];
	$page=getpage("$vendor_link");
	
	$link=explode('id="source-full-directions"',$page);
	$link=explode('link="',$link[1]);
	$link=explode('" ',$link[1]);
	$link=$link[0];
	$frametest=explode('/recipe/external/',$link);
	if($frametest[1]!='')
	{
		sleep(2);
		$redirectpage=getpage('http://www.yummly.com'.$link);
	
		$source=explode('id="yFrame"',$redirectpage);
		$source=explode('src="',$source[1]);
		$source=explode('" ',$source[1]);
		$source=$source[0];
	}
	else
	{
		$source=$link;
	}
	$finalpage='<SOURCE>'.$source.'</SOURCE>'.$page;
	
	file_put_contents('recipe_pages/'.$id.'.txt',$finalpage);

	
	$recipepage=explode('"og:image" content="',$page);
	$recipepage=explode('"',$recipepage[1]);
	$imglink=$recipepage[0];
	$newimglocation='photos/'.$id.'.jpg';
	
	file_put_contents($newimglocation, file_get_contents($imglink));
	
		
	$query="UPDATE recipes SET status=2 WHERE id=$id";
	mysql_query($query);
	
	$randnum=rand(3,45);
	sleep($randnum);
}	
?>