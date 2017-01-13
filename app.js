
var app = angular.module('loansharkbanksApp', []);
angular.module('app', ['ngMessages']);

app.directive("w3TestDirective", function() {
  return {
    template : "I was made in a directive constructor!"
  };
});

app.directive("getCouncil", function() {
  return {
    template : "I was made in a directive constructor!"
  };
});
