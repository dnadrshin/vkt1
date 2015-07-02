<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Викторина</title>

	<!-- <link href='fonts?family=Ruslan+Display&subset=latin,cyrillic' rel='stylesheet' type='text/css'> -->
	<script src="js/angular.js"></script>
	<script src="js/qform.js"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<style type="text/css">
		body{
		/*	font-family: 'Ruslan Display', cursive;*/
		}

		.container{
			width: 400px;
			margin: auto;
		}

		.menu{

		}

		.qblock{
			border-radius: 6px;
			padding: 10px;
			width: 400px;
			background-color: gray;
			height: 300px;
			margin: 50px auto;
		}

		.question{
			font-style: 32px;
			font-weight: bold;
		}

	</style>

</head>
<body>

	<div class="container">
		<div class="menu">
			<? echo "КАЛИНИНГРАД - название" ?>
		</div>
		<hr></hr>
	</div>



	<div class="container" ng-app="myApp">
		<div class="qblock" ng-controller="qform">
		<div><h4>Вопрос:<span id="qtext" ng-bind="questions[n].txt"></span></h4></div>
		<!-- Прогресс бар -->
		<div class="progress">
		  <div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="10" aria-valuemax="100" style="width: {{(n/questions.length)*100}}%;">
		  {{(n/questions.length)*100}}% 
		  </div>
		</div>
		<!-- Форма -->
		<form>
			<div ng-repeat="t in questions[n].answ">
				<input type="radio" ng-model="$parent.test" name="question" value="{{t}}"><span ng-bind="t"></span>
			</div>
		</form>	
		<!-- Кнопка подтверждения выбора -->
		<button class="btn btn-default" ng-click="nextq()">Подтвердить</button>
		</div>
	</div>


	</script>
</body>
</html>
