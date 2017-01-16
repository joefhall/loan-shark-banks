
app.controller('myCtrl', function($scope, $http) {
  
  $scope.postcode = "";
  
  $scope.carecost = 552 * 52; // average elderly care cost per person per year, taken from an averaging out of figures at http://www.payingforcare.org/care-home-fees
  
  $scope.council = {
    name: "",
    interestPerYear: null,
    humanExample: {
      start: "",
      number: "",
      end: ""
    }
  }
  
  $scope.getCouncilName = function() {
    // console.log("hello");
    $http.get("get_council.php?postcode=" + $scope.postcode)
    .then(function(response) {
      // var responseparsed = $.parseJSON(response.data);
      // console.log(response.data);
      $scope.council.name = response.data[0];
      $scope.council.interestPerYear = response.data[1];
      console.log($scope.council.interestPerYear);
      if ($scope.council.interestPerYear > 0) {
        $scope.council.humanExample.start = 'That could pay for care for';
        $scope.council.humanExample.number = Math.round($scope.council.interestPerYear * 1000000 / $scope.carecost).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " elderly people";
        $scope.council.humanExample.end = "in our community";
        $scope.elderlycare = true;
      }
       
    });
  };
    
  
});