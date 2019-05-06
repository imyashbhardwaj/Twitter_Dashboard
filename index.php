<head>
<title>Index</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<h1><center><u> Twitter Dashboard</u></center></h1><br><Br>
<div class=row>
<div class="col-md-5 cont">

Get the recent Tweets of user and Tweets of their followers:<br><br>
<form action=show_tweets.php method="GET">
Username:<input name=username type=text />
<button type=submit> Submit</button>
</form>
<form action=search.php method=GET>
Search Tweets by the trending searches or by any text you want:<br><br>
Search:<input name=query type=text />
<button type=submit> Search</button>
</form>

</div>
<div class="col-md-5 trend">
<center><h3><u>Trend Filter</u></h3></center>
<ul>
<div class=trends>

</div>
</ul>
</div>
</div>
</body>
<?php
$oldldpath = getenv('LD_LIBRARY_PATH');
putenv("LD_LIBRARY_PATH=");
$trends =`python3 get_trends.py 2>&1`;
putenv("LD_LIBRARY_PATH=$oldldpath");
?>

<style>
.trends{
left:50px;
font-size:20px;
}
.cont{
left:40px;
font-size:20px;
height:80%;

}

h1{
color:pink;
}
body{
font-family:"Comic Sans MS";
background:url("https://venngage-wordpress.s3.amazonaws.com/uploads/2018/09/Simple-Background-Images-53.png");
background-size:cover;
}
.col-md-5{
border-style:groove;
border-width:3px;
border-color:orange;
background:rgba(250,250,250,.5);
}
.trend{
margin-left:50px;
height:80%;
overflow:scroll;
}
</style>

<script>
var trends=<?php echo $trends;?>
//trends=trends.split(",");
s="";
for(var i=0;i<trends.length;i++){
console.log(trends[i][0]);
if(trends[i][0]=="#"){
s+="<li><a href=search.php?query=%23"+trends[i].substr(1)+">"+trends[i]+"</a>";
}
else
s+="<li><a href=search.php?query="+trends[i]+">"+trends[i]+"</a>";
}
$(".trends").html(s);
</script>
