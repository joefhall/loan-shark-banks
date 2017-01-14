
app.controller('myCtrl', function($scope, $http) {
  
  $scope.postcode = "";
  
  $scope.carecost = 552; // average elderly care cost per person per week, taken from http://www.payingforcare.org/care-home-fees
  
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
      if ($scope.council.interestPerYear == 0) {
        $scope.council.humanExample = "Unfortunately we don&apos;t have data yet for your area. Try entering postcode E16 4HP to see an example from elsewhere.";
      } else {
        $scope.council.humanExample.start = 'Without that outrageous interest we could provide care for';
        $scope.council.humanExample.number = Math.round($scope.council.interestPerYear * 1000000 / $scope.carecost).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        $scope.council.humanExample.end = "elderly people in our community";
      }
       
    });
  };
    
  
});