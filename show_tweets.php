<head>
<title>Tweets</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<h1><center><u> Tweets</u></center></h1>
<br><br>
<div class=row>
<div class="user-tweet col-md-5">
<h3><center><u> Tweets by the user</u></center></h3><br><br>
<div class=content>

</div>
</div>
<div class="col-md-5 follower-tweet">
<h3><center><u> Tweets by the followers of user</u></center></h3><br><br>
<div class="foll-content">

</div>
</div>
</div>
</body>

<?php
if($_GET["username"]){
$m=$_GET["username"];
#echo $m;
$oldldpath = getenv('LD_LIBRARY_PATH');
putenv("LD_LIBRARY_PATH=");
$tweets =`python3 get_tweets.py {$m} 2>&1`;
#echo $tweets;
putenv("LD_LIBRARY_PATH=$oldldpath");
}
?>


<style>
body{
background:url("https://venngage-wordpress.s3.amazonaws.com/uploads/2018/09/Simple-Background-Images-53.png");
background-size:cover;
font-family:"Comic Sans MS";
}
h1{
color:yellow
}
h3{
color:orange
}


.user-tweet{
border-style:groove;
border-width:3px;
border-color:orange;
background:rgba(250,250,220,0.3);
height:80%;
overflow:scroll;
left:60px;
}
.tweet-cont{
font-size:20;
}
.tweet-time{
font-size:20;
margin-left:40px;
}
.content{
margin:15px;
}
.follower-tweet{
border-style:groove;
border-width:3px;
border-color:orange;
background:rgba(250,220,250,0.4);
height:80%;
overflow:scroll;
margin-left:70px;
}


</style>



<script>
var data=<?php echo $tweets; ?>;
var s="";
for(var i=0; i<data[0].length;i++)
s+="<ul><div class=tweet-cont><li>"+data[0][i][0]+"</div></ul><br><div class=tweet-time> created at "+data[0][i][1]+"</div><br><br>";
$(".content").html(s);
s="";
for(var i=1;i<data.length;i++){
s+="<ul><div class=tweet-cont><li>"+data[i][0]+"</div></ul><br><div class=tweet-time> tweeted by "+data[i][2]+"<br>created at "+data[i][1]+"</div><br><br>";
}
$(".foll-content").html(s);

</script>
