<html>
<head>
<title>Dashang Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<!--[if lt IE 9]>
	<script src="respond.js"></script>
<![endif]-->
</head>
<body>

<style type="text/css">
* {
    margin: 0;
    padding: 0;
}
.main{
	width:100%;
	height:100%;
	min-height:600px;
	//background:blue;
}
.container{
	min-width:120px;
	height:100%;
	width:80%;
	background:white;
}
.toplogo{
	width:100%;
	height:100px;
	//background:white;
}
.toplogo img{
	padding-top: 20px;
	max-width: 100%;
	width:40px;
}
.toplogo span{
	font-family: Arial;
	font-style: normal;
	font-size: 32px;
}
.amount{
	width:100%;
	height:100px;
	//background:white;
}
.payment{
	width:100%;
	height:100px;
	//background:black;
}
.pay-method-hub{
	width:220px;
	height:100%;
}
.pay-method{
	position:relative;
	float:left;
	margin-left: 10px;
	width:100px;
	height:100px;
	//background:black;
}
.description{
	width:100%;
	height:100px;
	//background:white;
}
.snippet{
	width:100%;
	height:100px;
	//background:black;
}

.round-button {
	position:relative;
	float:left;
	//margin-left: 25px;
	width:80px;
	//height:80px;
	//margin-left:30px;
}
.round-button-circle {
	width: 100%;
	height:0;
	padding-bottom: 100%;
    border-radius: 50%;
	border:10px solid #E0FFFF;
    overflow:hidden;
    
    //background: #00CED1; 
	background:#00B2EE;
    //box-shadow: 0 0 3px gray;
}
.round-button-circle:hover {
	//background:#00B2EE;
    background: #00CED1; 
}
.round-button a {
    display:block;
	float:left;
	width:100%;
	padding-top:50%;
    padding-bottom:50%;
	line-height:1em;
	margin-top:-0.5em;
    
	text-align:center;
	color:#e2eaf3;
    font-family:Verdana;
    font-size:1.2em;
    font-weight:bold;
    text-decoration:none;
}

</style>

<div class="main" align="center">
	<div class="container">
		<div class="toplogo">
			<!--<span>云打</span>-->
			<img id="logo-id" src="ds-logo-1.2-64.png"></img>			
		</div>
		<div class="amount">
			
		</div>

		<div class="payment" align="center">
		  <div class="pay-method-hub" align="center">
			<div class="pay-method" align="center">
				<div class="round-button"><div class="round-button-circle"><a href="#" class="round-button">支付宝</a></div></div>
			</div>
			<div class="pay-method" align="center">
				<div class="round-button"><div class="round-button-circle"><a href="#" class="round-button">微信</a></div></div>
			</div>
		  </div>
		</div>

		<div class="description">
		</div>

		<div class="snippet">
		</div>

	</div>
</div>

</body>
</html>
