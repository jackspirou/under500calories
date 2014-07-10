<?php

$start_id=$_GET['start_id'];

include('functions.php');


if($start_id=='')
	$start_id=2969;
while($start_id<53000)
{	
$insert_recipes_query='INSERT IGNORE INTO `recipes` (vendor_link,name,vendor,yums) VALUES ';


//Yummly's main recipe page. No options select except for blogs and images only
$searchurl="http://www.yummly.com/search/more/".$start_id."?userPreferences.foodfinder-apply-dietary-restrictions=no&userPreferences.foodfinder-apply-allergy-restrictions=no&userPreferences.foodfinder-exclude-disliked-ingredients=no&nutrition.ENERC_KCAL.min=0&nutrition.ENERC_KCAL.max=500&facetField[]=ingredient&facetField[]=holiday&facetField[]=diet&facetField[]=diet&facetField[]=technique&facetField[]=cuisine&facetField[]=course&facetField[]=source&facetField[]=brand&facetField[]=dish&&q=&userId=&exp_blogsonly_enable=true&requirePictures=true&maxResult=55&_=1404061897345";

echo'<br> Starting up! loading '.$searchurl.'<br><br>';

//download the page
$pagecontents=getpage($searchurl);

//die if no results from yummly
$sorry=explode('Sorry! We searched oodles of recipes',$pagecontents);
if($sorry[3]!='')
	die();
	
//seperate each recipe into an array element
$pagecontents=explode('y-card',$pagecontents);


//loop through all recipes
$x=1;
$num=count($pagecontents);
while($x<$num){


	//Get link to recipe page on yummly
	$vendor_link=explode('href="',$pagecontents[$x]);
	$vendor_link=explode('"',$vendor_link[1]);
	$vendor_link=$vendor_link[0];
	//echo $vendor_link;


	//Get number of yums
	$yums=explode('display-count',$pagecontents[$x]);
	$yums=explode('>',$yums[1]);
	$yums=explode('<',$yums[1]);
	$pos=strpos($yums[0],'k');
	
	if($pos!==false)
	{
		//echo'k found';
		$yums=explode('k',$yums[0]);
		$yums=trim($yums[0]);
		$yums=$yums*1000;		
	}
	else
	{
		$yums=trim($yums[0]);
	}
	if($yums=='')
		$yums='0';
	//echo"<BR>Yums: $yums<br>";
	if($x>1)
		$insert_recipes_query.=", ";
	
	$insert_recipes_query.="('$vendor_link','name','yummly',$yums)";
	$x++;
}

echo $insert_recipes_query;

if(!$result = mysql_query($insert_recipes_query)){
    echo('There was an error running the query [' . mysql_error() . ']');
}

echo'end';

$rand=rand(2,15);

sleep($rand);
$start_id=$start_id+55;
}

?>