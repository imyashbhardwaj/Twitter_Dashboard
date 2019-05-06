<head>
<title>Search Results</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
<center><h1><u>Search Results</u></h1></center>
<br>
<ul>
<div class=cont>

</div>
</ul>
</body>

<style>
body{
background:url("https://venngage-wordpress.s3.amazonaws.com/uploads/2018/09/Simple-Background-Images-53.png");
background-size:cover;
font-family:"Comic Sans MS";
}
h1{
color:pink;
}
.cont{
margin:25px;
border-style:groove;
border-width:3px;
border-color:orange;
background:rgba(250,250,250,.5);
}
.head{
font-size:20px;
}
.sub{
font-size:18px;
}
.head,.sub{
margin-left:40px;
}
</style>

<?php

if($_GET["query"]){
$m=$_GET["query"];
#echo $m;
$oldldpath = getenv('LD_LIBRARY_PATH');
putenv("LD_LIBRARY_PATH=");
$tweets =`python3 search_result.py "{$m}" 2>&1`;
#echo $tweets;
putenv("LD_LIBRARY_PATH=$oldldpath");
}
?>



<script>
var data=<?php echo $tweets; ?>
s=""
for(var i=0;i<data.length;i++){
s+="<div class=head><li>"+data[i][1]+"<div><br><div class=sub> Tweeted by "+data[i][2]+" Tweeted at "+data[i][0]+"</div><br>";
}
$(".cont").html(s);

</script>

