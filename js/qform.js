(function () {
			angular.module('myApp', []).controller('qform', function($scope, $http){			
				// Модель приложения. AJAX запрос. Вопросы и варианты ответов.
				$http.post("./vpost.php", "data")
    				.success(function(response) {$scope.questions = response;});
				// Счетчик циклов
				$scope.n = 0;
				// Результат
				$scope.result = 0;
				// Ответы пользователя
				$scope.userAnsw = [];
				//Функция по клику	
				$scope.nextq = function(){

					// Валидация на случай отсутсвия выбора
					if ($scope.test){$scope.n++} else{console.log("No data(")};
					//Сохраняем ответ юзера
					$scope.userAnsw.push($scope.test);
					// Дейсвия по окончанию списка вопросов
					if (!$scope.questions[$scope.n]) {
						console.log( $scope.userAnsw); 
						$http.post("./vpost.php", $scope.userAnsw)
							.success(function(response){
								$scope.result = response;console.log(response);
							});
						$http.get("./vpost.php").success(function(response){})
					};
					// обнуляем значение выбора
					$scope.test = null;
				};	
		});
})();