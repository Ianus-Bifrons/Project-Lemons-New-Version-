<?php 

// recreate session
// check if user has logged in
// if not, display an error message and halt processing
session_start();
if (!isset($_SESSION['username'])) {
  die('ERROR: You attempted to access a restricted page. Please <a href="login.php">log in</a>.');
}
else{
mysql_connect("localhost", "root","root") or die ("Not connected");
mysql_select_db("projectlemons") or die ("no database");
$query = "select ideatitle from ideas order by idideas desc limit 5";
$result = mysql_query($query);


$result_array = [];
while($row = mysql_fetch_assoc($result))
{
    $result_array[] = $row['ideatitle'];
	//print_r( $result_array );
	//print_r( $result_array );
}
//print_r( $result_array );

$arrlength=count($result_array);

}

?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="images/logo.png" type="image/png">
	<title>Project Lemons</title>
	<link rel="stylesheet" href="style.css"> <!--background/css-->

</head>

<body>


<div id="header">
<img src="images/header.jpg" alt="Logo" width="340px" height="100px" />

<div id="menu">
<ul>
<div class="dropdown" style="float:right;">
  <button class="dropbtn">Menu</button>
  <div class="dropdown-content">
    <a href="file:///C:/Users/30694/Downloads/project%20lemons/project%20lemons/Lemons.html">Home</a>
    <a href="file:///C:/Users/30694/Downloads/project%20lemons/project%20lemons/About.html">About</a>
    <a href="file:///C:/Users/30694/Downloads/project%20lemons/project%20lemons/login.html">Logout</a>
  </div>
</div>
</ul>
</div>
</div>
<div id="section">
<img src="images/img1.jpg" alt="DTEX" width="300px" height="100px"/>

<h1> You have 10 Lemons. Distribute them based on <br> how bad you think each idea is. </h1>
</div>

<div style="overflow-x:auto;">
  <table>
    <tr>
      <th>Number</th>
      <th>Idea</th>
      <th>Lemons ( More = Bad ) </th>
    
    </tr>
	
    <tr>
      <td>1</td>
      <td><p id="idea1"></p></td>
      <td> <h1 id="counter" >0</h1>
	<img src="images/round.png" alt="Lemon" width="40px" height="40px" style="border-radius: 50%"/>
  <div id="button__wrapper">
    <button id="button__decrease">-</button>
	
    <button id="button__increase">+</button>
  </div></td>
      
      
    </tr>
    <tr>
      <td>2</td>
      <td><p id="idea2"></p></td>
      <td> <h1 id="counter2">0</h1>
	  <img src="images/round.png" alt="Lemon" width="40px" height="40px" style="border-radius: 50%"  />
  <div id="button__wrapper">

    <button id="button__decrease2">-</button>
    <button id="button__increase2">+</button>
  </div></td>
    
     
    </tr>
    <tr>
      <td>3</td>
      <td><p id="idea3"></p></td>
      <td><h1 id="counter3">0</h1> <img src="images/round.png" alt="Lemon" width="40px" height="40px" style="border-radius: 50%"  />
	 
  <div id="button__wrapper">
    <button id="button__decrease3">-</button>
    <button id="button__increase3">+</button>
  </div></td>
    
      
    </tr>
	 <tr>
      <td>4</td>
      <td><p id="idea4"></p></td>
      <td> <h1 id="counter4">0</h1> <img src="images/round.png" alt="Lemon" width="40px" height="40px" style="border-radius: 50%"  />
  <div id="button__wrapper">
    <button id="button__decrease4">-</button>
    <button id="button__increase4">+</button>
  </div></td>
    
      
    </tr>
	 <tr>
      <td>5</td>
      <td><p id="idea5"></p></td>
      <td> <h1 id="counter5">0 </h1> <img src="images/round.png" alt="Lemon" width="40px" height="40px" style="border-radius: 50%"  />
  <div id="button__wrapper">
    <button id="button__decrease5">-</button>
    <button id="button__increase5">+</button>
  </div></td>
    
      
    </tr>
  </table>
</div>


<div class="text-center">
  <button type="button" class="button">
    <span class="button__text">Submit</span>
  </button>
</div>


<script>

var theArray = "<?php echo $result_array[0] ?> ";
var theArray2 = "<?php echo $result_array[1] ?> ";
var theArray3 = "<?php echo $result_array[2] ?> ";
var theArray4 = "<?php echo $result_array[3] ?> ";
var theArray5 = "<?php echo $result_array[4] ?> ";


console.log(theArray);
console.log(theArray2);
/*
var veggies = "carrot";
var fruitvegbasket = [];
fruitvegbasket.push(veggies);*/

var bigarray = [];
bigarray.push(theArray);
bigarray.push(theArray2);
bigarray.push(theArray3);
bigarray.push(theArray4);
bigarray.push(theArray5);

console.log(bigarray);


function shuffle(theArray) {
  var m = theArray.length, t, i;

  // While there remain elements to shuffle…
  while (m) {

    // Pick a remaining element…
    i = Math.floor(Math.random() * m--);

    // And swap it with the current element.
    t = theArray[m];
    theArray[m] = theArray[i];
    theArray[i] = t;
  }

  return theArray;
  
}

// Used like so
//var array = ["GFG_1", "GeeksForGeeks",
				//"Geeks", "Computer Science Portal"];
shuffle(bigarray);
//console.log(bigarray);
var idea1=document.getElementById('idea1');
var idea2=document.getElementById('idea2');
var idea3=document.getElementById('idea3');
var idea4=document.getElementById('idea4');
var idea5=document.getElementById('idea5');

//title.innerHTML = JSON.stringify(theArray,null, 4); 
//title.innerHTML = bigarray[0]+"<br> "+bigarray[1]+"<br> "+bigarray[2]+"<br> "+bigarray[3]+"<br> "+bigarray[4]+"<br> "+bigarray[5]; 
idea1.innerHTML = bigarray[0];
idea2.innerHTML = bigarray[1];
idea3.innerHTML = bigarray[2];
idea4.innerHTML = bigarray[3];
idea5.innerHTML = bigarray[4];

</script>
<script src="scripts.js"></script>

</body>
</html>