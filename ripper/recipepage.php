<?php
include('functions.php');

connect_db();

//find a recipe in the DB that needs details

$sql='SELECT id FROM recipes WHERE status=2 ';
//$sql='SELECT id,vendor_link FROM recipes WHERE id=10 LIMIT 1';

if(!$result1 = mysql_query($sql)){
    echo('There was an error running the query [' . mysql_error() . ']');
}


$counter=0;
while($row = mysql_fetch_array($result1)){

  if(fmod($counter,50)==0)
  {
    mysql_close();
    connect_db();

  }

  $id=$row['id'];



	$page=file_get_contents('recipe_pages/'.$id.'.txt');


//START INGREDIENTS

$amount_sql='INSERT INTO amounts (ingredient_id,amount,unit,remainder,recipe_id) VALUES ';
$ingredients=explode('itemprop="ingredients"',$page);

$num = count($ingredients);

$x=1;

$ingredientlist='';
array($ingredientlist);
while($x<$num)
{


	//seperate ingredient amount and name
	$amount=explode('class="amount">',$ingredients[$x]);
	$amount=explode('class="name">',$amount[1]);



	$amount=$amount[0];
	$ingredientname=$amount[1];


	$amount=explode('<span class="fraction">',$amount);

$numerator='';
$denominator='';
$unit='';
$decimal='';



	if($amount[1]!='')
	{
		$wholeamount=$amount[0];

//		echo"amount: fraction<br>";

		$numerator=explode('"numerator">',$amount[1]);
		$denominator=explode('"denominator">',$numerator[1]);
		$numerator=explode('</span>',$numerator[1]);
		$denominator=explode('</span>',$denominator[1]);
		$numerator=$numerator[0];
		$unit=$denominator[2];
		$denominator=$denominator[0];

//		echo 'numerator: '.$numerator.' denominator: '.$denominator;




		$amount=$wholeamount.' '.implode($amount);

		$amount=strip_tags($amount);
	}
	else{
	 	$wholeamount=implode('',$amount);
	 	$wholeamount=explode(' ',$wholeamount);
	 	$unit=strip_tags($wholeamount[1]);
	 	$wholeamount=$wholeamount[0];
	}
//	echo $wholeamount.'<hr>';
	$wholeamount=explode('</span',$wholeamount);
	$wholeamount=$wholeamount[0];

	if($denominator!='')
	{
		$fraction=$wholeamount.' '.$numerator.'/'.$denominator;
		$decimal=$wholeamount+($numerator/$denominator);
	}
	else{
		$fraction=$wholeamount;
		$decimal=$wholeamount;
	}




	$ingredientname=explode('class="name">',$ingredients[$x]);
	$ingredientname=explode('</strong>',$ingredientname[1]);
	$ingredientname=$ingredientname[0];

	$remainder=explode('"remainder">',$ingredients[$x]);
	$remainder=explode('</span>',$remainder[1]);
	$remainder=$remainder[0];
	echo $fraction.' '.$unit.' '.$name.' '.$remainder.' : '.$decimal.'<br>';
	$y=$x-1;
//	echo $amount[0].' '.$name[0];
	$amount=trim($fraction);
	$ingredientname=trim(strip_tags($ingredientname));
	$unit=trim(strip_tags($unit));
$unit=html_entity_decode($unit, ENT_QUOTES | ENT_HTML5, 'UTF-8');
$unit=mysql_real_escape_string($unit);
	$ingredientname=html_entity_decode($ingredientname, ENT_QUOTES | ENT_HTML5, 'UTF-8');
$ingredientname=mysql_real_escape_string($ingredientname);

	$remainder=html_entity_decode($remainder, ENT_QUOTES | ENT_HTML5, 'UTF-8');
	$remainder=mysql_real_escape_string($remainder);
	$remainder=trim(strip_tags($remainder));
	if($x>1)
	{
		$amount_sql.=', ';

	}

/*  $ingredient_exists_sql="SELECT id FROM ingredients WHERE name='$ingredientname'";
  $result=mysql_query($ingredient_exists_sql);
  $num_results = mysql_num_rows($result);

  echo"<BR>ingredient exists sql: $ingredient_exists_sql";

  if ($num_results == 0){
    $ingredient_insert_sql="INSERT INTO ingredients (name) VALUES '$ingredientname'";
    $result=mysql_query($ingredient_insert_sql);
      $ingredient_id=mysql_insert_id($result);
  echo"<BR>ingredient insert sql: $ingredient_insert_sql";
  }
  else{
    $res = mysql_fetch_assoc($result);

  $ingredient_id= $res["id"];

  }
*/

$ingredient_insert_sql="INSERT IGNORE INTO ingredients (name) VALUES ('$ingredientname')";
echo"<BR>INGREDIENT SQL= $ingredient_insert_sql";
if(!$result = mysql_query($ingredient_insert_sql)){
    die('There was an error running the ingredient_insert_sql query [' . mysql_error() . ']');
}






$ingredient_id_sql="SELECT id FROM ingredients WHERE name='$ingredientname'";
  $result=mysql_query($ingredient_id_sql);
  $res = mysql_fetch_assoc($result);

  $ingredient_id= $res["id"];


	$amount_sql.="('$ingredient_id','$amount','$unit','$remainder',$id)";
	$ingredientlist[]=array('amount' => $amount, 'name' => $ingredientname, 'unit' => $unit, 'remainder'=>$remainder);
	$ingredient_sql.="('$ingredientname')";
	$x++;

  echo"<BR>amount sql: $amount_sql";

}

if($x<2)
{
	echo'ERROR: Not enough ingredients';
}


//Do we need to store an array of ingredients?
$ingredientlist=serialize($ingredientlist);
$ingredientlist=mysql_real_escape_string($ingredientlist);


//END INGREDIENTS


//START TITLE
$title=explode('itemprop="name">',$page);
$title=explode('</h1>',$title[1]);
$title=$title[0];
$title=trim($title);
$title=html_entity_decode($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
$title=mysql_real_escape_string($title);
echo'<br>Title: '.$title;
//END TITLE

//START SERVINGS
$servings=explode('itemprop="recipeYield">',$page);
$servings=explode('</span>',$servings[1]);
$servings=$servings[0];
echo'<br>Servings: '.$servings;
//END SERVINGS

//START NUTRITION FACTS
$calories=explode('itemprop="calories">',$page);
$caloriesfromfat=$calories[2];
$calories=explode('</span>',$calories[1]);
$calories=$calories[0];
$caloriesfromfat=explode('</span>',$caloriesfromfat);

$calories_from_fat=$caloriesfromfat[0];
echo'<BR>Calories: '.$calories.'<BR>Calories From Fat:'.$calories_from_fat;

$total_fat=nutrition('Total Fat',$page);
$saturated_fat=nutrition('Saturated Fat',$page);
$trans_fat=nutrition('Trans Fat',$page);
$cholesterol=nutrition('Cholesterol',$page);
$sodium=nutrition('Sodium',$page);
$potassium=nutrition('Potassium',$page);
$carbohydrates=nutrition('Carbohydrate',$page);
$fiber=nutrition('Fiber',$page);
$sugars=nutrition('Sugars',$page);
$vitamin_a=nutrition('Vitamin A',$page);
$vitamin_c=nutrition('Vitamin C',$page);
$iron=nutrition('Iron',$page);
$calcium=nutrition('Calcium',$page);
$protein=nutrition('Protein',$page);

//END NUTRITION FACTS


//START TAGS
$recipe_tag_sql='INSERT IGNORE INTO recipe_tag (recipe_id,tag_id) VALUES ';
$tags_exist=0;



$tags=explode('Tags</h3>',$page);
$tags=explode('</div>',$tags[1]);
$tags=explode('</a>',$tags[0]);
echo'<br>tags: ';
$x=1;
foreach($tags as $value)
{
	$tag=trim(strip_tags($value));
	echo ' '.$tag;

	if($tag!='')
	{
		if($x>1)
		{
			$recipe_tag_sql.=', ';

		}


    $tag_sql="INSERT IGNORE INTO tags (name) VALUES ('$tag')";
    if(!$result = mysql_query($tag_sql)){
      die('There was an error running the tag_sql query [' . mysql_error() . ']');
    }
    $tag_id_sql="SELECT id FROM tags WHERE name='$tag'";


    $result=mysql_query($tag_id_sql);
    $res = mysql_fetch_assoc($result);

    $tag_id= $res["id"];
    $recipe_tag_sql.="($id,'$tag_id')";

    $tags_exist=1;

	}
	$x++;
}


//END TAGS



//START AUTHOR
$author=explode('yummlyfood:source',$page);
$author=explode('content="',$author[1]);
$author=explode('"',$author[1]);
$author=$author[0];
$author=trim($author);
$author=html_entity_decode($author, ENT_QUOTES | ENT_HTML5, 'UTF-8');
$author=mysql_real_escape_string($author);
echo'<br>Author: '.$author;
//END AUTHOR

//START SOURCE LINK
$source=explode('</SOURCE>',$page);

$source=explode('<SOURCE>',$source[0]);
$source=$source[1];
echo'<br>Source: '.$source;
//END SOURCE LINK


//START BITLY SOURCE LINK
$url_enc = urlencode($source);
$version = '2.0.1';
$login = 'al2six';
$api_key = 'R_345ef1876c41faaa3a70789de9c74530';
$format = 'json';
$data = file_get_contents('http://api.bit.ly/shorten?version='.$version.'&login='.$login.'&apiKey='.$api_key.'&longUrl='.$url_enc.'&format='.$format);

$json = json_decode($data, true);

foreach($json['results'] as $val){
	//echo $val['shortUrl'];}

$bitly=$val['shortUrl'];
echo'<br>Bitly: '.$bitly;
}
//END BITLY SOURCE LINK




$sql="UPDATE recipes SET link='$source', name='$title', servings='$servings', status=3, calories='$calories',
calories_from_fat='$calories_from_fat',
total_fat='$total_fat',
saturated_fat='$saturated_fat',
cholesterol='$cholesterol',
sodium='$sodium',
potassium='$potassium',
carbohydrates='$carbohydrates',
fiber='$fiber',
sugars='$sugars',
vitamin_a='$vitamin_a',
vitamin_c='$vitamin_c',
iron='$iron',
calcium='$calcium',
protein='$protein',


 author='$author', bitly='$bitly' WHERE id=$id ";

if(!$result = mysql_query($sql)){
    die('There was an error running the query [' . mysql_error() . ']');
}
echo $sql;

if(!$result = mysql_query($amount_sql)){
    die('There was an error running the query [' . mysql_error() . ']');
}
/*if(!$result = mysql_query($tag_sql)){
    die('There was an error running the query [' . mysql_error() . ']');
}
*/
if($tags_exist==1)
{
if(!$result = mysql_query($recipe_tag_sql)){
    die('There was an error running the recipe_tag_sql query [' . mysql_error() . ']');
}
}

}

?>
