// some customized functions which need all over app
app.directive('replace', function() {
  return {
    require: 'ngModel',
    scope: {
      regex: '@replace',
      with: '@with'
    }, 
    link: function(scope, element, attrs, model) {
      model.$parsers.push(function(val) {
        if (!val) { return; }
        var regex = new RegExp(scope.regex);
        var replaced = val.replace(regex, scope.with); 
        if (replaced !== val) {
          model.$setViewValue(replaced);
          model.$render();
        }         
        return replaced;         
      });
    }
  };
})

app.directive('lettersOnly', function() {
  return {
    replace: true,
    template: '<input replace="[^a-zA-Z\\s]" with="">'
  };
})

app.directive('numericsOnly', function() {
  return {
    replace: true,
    template: '<input replace="[^0-9]" with="">'
  };
})

app.directive('alphanumericsOnly', function() {
  return {
    replace: true,
    template: '<input replace="[^A-Za-z0-9]" with="">'
  };
})

app.directive('letterswithsinglequoteandhyphenOnly', function() {
  return {
    replace: true,
    template: '<input replace="[^a-zA-Z-\'\\s]" with="">'
  };
})

app.directive('letterswithsinglequoteandhyphendotOnly', function() {
  return {
    replace: true,
    template: '<input replace="[^a-zA-Z-.\'\\s]" with="">'
  };
})

app.directive('digitswithplusandhyphenOnly', function() {
  return {
    replace: true,
    template: '<input replace="[^0-9-\+\\s]" with="">'
  };
})
/*
To allow only alphanumeric and space.

/^[A-Za-z0-9\s]+$/m
^ start
A-Z uppercase alphabets.
a-z lowercase alphabets.
0-9 digits.
\s space

[A-Za-z0-9\s]+ so the above would be repeated one or more times.*/

// Date validation

app.directive('dateValidation', function() {
  return {
    restrict: 'A',
    require: 'ngModel',
    link: function(scope, element, attrs, model) {
        function validate(value) {
            if(value == null || value == undefined || value == "") return value;
            var comp = value.split('-');
            var m = parseInt(comp[1], 10);
            var d = parseInt(comp[0], 10);
            var y = parseInt(comp[2], 10);
            var date = new Date(y,m-1,d);

            return (y.toString().length == 4 && date.getFullYear() == y && date.getMonth() + 1 == m && date.getDate() == d) ? value : undefined;
        }

        model.$formatters.unshift(validate);
        model.$parsers.unshift(validate);
    }
  };
})

// Unique feild validation

app.directive('mUnique',  ['$http','config',function($http,config) {
    return {
         restrict: 'A',
         require: 'ngModel',
         link: function (scope, element, attrs, ngModel) {
              var data;
              element.bind('blur', function (e) {
                  data = scope.$eval(attrs.mUnique);
                  ngModel.$setValidity('unique', true);
                  $http.post(config.baseUrl+data.action,JSON.stringify(data))
                  .then(function(response) {
                      if(response.data) ngModel.$setValidity('unique', false);
                  });
              });
         }
    };
}])