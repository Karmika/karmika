// some customized functions which need all over app
app.service('CustomService',['$http','config', function($http,config) {

      var CS = this;

      this.SeedData = function (type) {
        return $http.post(config.baseUrl+"/seeddata/getdata",{"type":type})
               .then(function(response) {
                  return response.data;
               });
      }

      this.MakeingCustomFormatDataForBeneficiaryPayment = function (Payment) {
          var data = {};
          data.payment_date = CS.getDateFormat(Payment.payment_date,"yyyy-MM-dd");
          data.payment_mode = Payment.payment_mode.entity_id;
          data.payment_status = Payment.payment_status.entity_id;
          data.payment_for = Payment.payment_for.entity_id;
          data.payment_reference_id = Payment.payment_reference_id;
          data.amount = Payment.amount;
          data.notes = Payment.notes;
          data.chequeordd_no = Payment.chequeordd_no;
          data.bank_name = Payment.bank_name;
          data.ifsc_code = Payment.ifsc_code;
          if(Payment.id != undefined) data.id = Payment.id;
          return data;
      }

      this.getParameterByName = function (name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
      }
      
      this.calculateAge =   function(dateString) {
        var today = new Date();
        var birthDate = new Date(dateString);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) 
        {
          age--;
        }
        return age > 0 ? age : 0;
      }
	  
      this.getDateForAge = function(age){
        var d = new Date();
        var year = d.getFullYear();
        d.setFullYear(year - age);
        return d;
      };

      this.getDateFormat = function(date,format="dd-MM-yyyy") {
        if(date == null) return null;
        var d = new Date(date);
        if( format == 'dd-MM-yyyy' ){ 
          var year =  d.getFullYear();
          var date = ('0'+ d.getDate()).slice(-2);
          var month = ('0' + (d.getMonth()+1)).slice(-2);
          return date + '-' + month + '-' + year;
        }else if(format == "MMM yyyy"){
          var monthNames = ["Jan","Feb", "Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
          var year =  d.getFullYear();
          var month = monthNames[d.getMonth()];
          return month + " " + year;
        }else{
          var year =  d.getFullYear();
          var date = ('0'+ d.getDate()).slice(-2);
          var month = ('0' + (d.getMonth()+1)).slice(-2);
          return year + '-' + month + '-' + date;
        }
      };

      this.CutomAlert = function(message){
        $("<div title='Alert message'>"+message+"</div>").dialog({
            resizable: true,
            modal: true,
            buttons: {
              "Ok": function() {
                $( this ).dialog( "close" );
              }
            }
          });
        $(".ui-dialog-titlebar-close").html("X");
      }

}]);


/* Start : upload file code */

app.service('fileUpload', ['$http', function ($http) {
  this.uploadFileToUrl = function(file, uploadUrl, pathToUpload){
    var fd = new FormData();
    fd.append('file', file);
    fd.append('pathToUpload', pathToUpload);
    $http.post(uploadUrl, fd, {
      transformRequest: angular.identity,
      headers: {'Content-Type': undefined}
    })
    .success(function(){
    })
    .error(function(){
    });
  }
}]);

/* End : upload file code */



