
app.controller('myCtrl', function($scope, $http) {
  
  $scope.postcode = "";
  
  $scope.council = {
    name: "Luton",
    interestPerYear: 29,
    humanExample: "437 older people not being able to have care"
  }
  
  $scope.getCouncilName = function() {
    console.log("hello");
    $http.get("get_council_name.php?postcode=" + $scope.postcode)
    .then(function(response) {
        $scope.council.name = response.data;
    });
  };
  
});