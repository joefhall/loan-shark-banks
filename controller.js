
app.controller('myCtrl', function($scope, $http) {
  
  $scope.postcode = "";
  
  $scope.carecost = 552; // average elderly care cost per person per week, taken from http://www.payingforcare.org/care-home-fees
  
  $scope.council = {
    name: "",
    interestPerYear: null,
    humanExample: ""
  }
  
  $scope.getCouncilName = function() {
    // console.log("hello");
    $http.get("get_council.php?postcode=" + $scope.postcode)
    .then(function(response) {
        $scope.council.name = response.data;
    });
  };
  
});