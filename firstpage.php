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
$query = "SELECT ideatitle from ideas limit 5";
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

<?php
//

	
if(isset($_POST['submit']))
{	
// attempt database connection
	$conn= new mysqli("localhost", "root", "root", "projectlemons");
  
$lemon1 = $_POST['lemon1'];
$lemon2 = $_POST['lemon2'];
$lemon3 = $_POST['lemon3'];
$lemon4 = $_POST['lemon4'];
$lemon5 = $_POST['lemon5'];

$string = ""; //declare your variable as global to be used later
$string2="";
if(!empty($_POST)){
   $string = $_POST['one']; //assuming you know that you are getting the value of input field `name=one`
   $string2 = $_POST['two']; 
   $string3 = $_POST['three'];
   $string4 = $_POST['four'];
   $string5 = $_POST['five'];
}
//$erika = $_POST['erika'];
//$query="select ideatitle from ideas where ideatitle='$erik'";



//mysqli_close($conn);	
//$result = mysqli_query($mysqli, "UPDATE ideas SET lemoncount='$lemo'");

$sql = "UPDATE ideas 
       SET lemoncount = '$lemon1' where ideatitle='$string'";
      


$retval = mysqli_query(  $conn,$sql );

$sql1 = "UPDATE ideas 
       SET lemoncount = '$lemon2' where ideatitle='$string2'";
$retval1 = mysqli_query(  $conn,$sql1 );

$sql2 = "UPDATE ideas 
       SET lemoncount = '$lemon3' where ideatitle='$string3'";
$retval2 = mysqli_query(  $conn,$sql2 );

$sql3 = "UPDATE ideas 
       SET lemoncount = '$lemon4' where ideatitle='$string4'";
$retval3 = mysqli_query(  $conn,$sql3 );

$sql4 = "UPDATE ideas 
       SET lemoncount = '$lemon5' where ideatitle='$string5'";
$retval4 = mysqli_query(  $conn,$sql4 );


if(! $retval )
{
  die('Could not update data: ' . mysql_error());
}
if(! $retval1 )
{
  die('Could not update data: ' . mysql_error());
}
if(! $retval2 )
{
  die('Could not update data: ' . mysql_error());
}
if(! $retval3 )
{
  die('Could not update data: ' . mysql_error());
}
if(! $retval4 )
{
  die('Could not update data: ' . mysql_error());
}
echo "Updated data successfully\n";
mysqli_close($conn);

	
}

?>

<div id="header">
<img src="images/header.jpg" alt="Logo" width="340px" height="100px" />

<div id="menu">
<ul>
<div class="dropdown" style="float:right;">
  <button class="dropbtn">Menu</button>
  <div class="dropdown-content">
   <a href="firstpage.php">Home</a>
    <a href="About.html">About</a>
    <a href="login.php">Logout</a>
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
<form method="post" action="firstpage.php">
  <table>
    <tr>
      <th>Number</th>
      <th>Idea</th>
      <th>Lemons ( More = Bad ) </th>
    
    </tr>
	
    <tr>
      <td>1</td>
    <td>
	  <button type="button" class="accordion"><p id="ideaone"></p><input type="hidden" id="idea1" name="one" ></input></button>
                <div class="panel">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div></td>
      <td><input type="number"  name="lemon1"><h1 id="counter" ></h1> </input>
	<img src="images/round.png" alt="Lemon" width="40px" height="40px" style="border-radius: 50%"/>
 </td>
   
    </tr>
    <tr>
      <td>2</td>
      <td><button type="button" class="accordion"><p id="ideatwo"></p><input type="hidden" id="idea2" name="two" ></input></button>
                <div class="panel">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div></td>
      <td> <input type="number"  name="lemon2"><h1 id="counter2" ></h1></input>
	  <img src="images/round.png" alt="Lemon" width="40px" height="40px" style="border-radius: 50%"  />
 </td>
    
     
    </tr>
    <tr>
      <td>3</td>
      <td><button type="button" class="accordion"><p id="ideathree"></p><input type="hidden" id="idea3" name="three" ></input></button>
                <div class="panel">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div></td>
      <td> <input type="number"  name="lemon3"><h1 id="counter3"></h1> </input>
	  <img src="images/round.png" alt="Lemon" width="40px" height="40px" style="border-radius: 50%"  />
	 
</td>
    
      
    </tr>
	 <tr>
      <td>4</td>
      <td><button type="button" class="accordion"><p id="ideafour"></p><input type="hidden" id="idea4" name="four" ></input></button>
                <div class="panel">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div></td>
      <td><input type="number"  name="lemon4"><h1 id="counter4"></h1> </input> 
	  <img src="images/round.png" alt="Lemon" width="40px" height="40px" style="border-radius: 50%"  />
  </td>
    
      
    </tr>
	 <tr>
      <td>5</td>
      <td><button type="button" class="accordion"><p id="ideafive"></p><input type="hidden" id="idea5" name="five" ></input></button>
                <div class="panel">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div></td>
      <td><input type="number"  name="lemon5"> <h1 id="counter5"> </h1> </input>
	  <img src="images/round.png" alt="Lemon" width="40px" height="40px" style="border-radius: 50%"  />
 </td>
    
      
    </tr>
  </table>
    <div class="text-center">
  <input type="submit" name="submit" class="button" >
    <span class="button__text" ></span>
  </input> 

</div>
  </form>


</div>



<div class="text-center">
  <button type="button2" class="button2" onclick="window.location='secondpage.php'">
    <span class="button__text">Next</span>
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
var ideaone=document.getElementById('ideaone');

var idea2=document.getElementById('idea2');
var ideatwo=document.getElementById('ideatwo');

var idea3=document.getElementById('idea3');
var ideathree=document.getElementById('ideathree');

var idea4=document.getElementById('idea4');
var ideafour=document.getElementById('ideafour');

var idea5=document.getElementById('idea5');
var ideafive=document.getElementById('ideafive');

//title.innerHTML = JSON.stringify(theArray,null, 4); 
ideaone.innerHTML = bigarray[0];
ideatwo.innerHTML = bigarray[1];
ideathree.innerHTML = bigarray[2];
ideafour.innerHTML = bigarray[3];
ideafive.innerHTML = bigarray[4];

//var myvalue = 55;
idea1.value=bigarray[0];
idea2.value = bigarray[1];
idea3.value = bigarray[2];
idea4.value = bigarray[3];
idea5.value = bigarray[4];

</script>
<script src="functions.js"></script>

<script>

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}


</script>


</body>
</html>
