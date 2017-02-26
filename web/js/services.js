// some customized functions which need all over app
app.service('CustomService',['$http','config', function($http,config) {

      var CS = this;

      this.SeedData = function (type) {
        return $http.post(config.baseUrl+"/seeddata/getdata",{"type":type})
               .then(function(response) {
                  return response.data;
               });
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
      
      this.MakeingCustomFormatDataForSubscriber = function (SubscriberData) {
          SubscriberData.category = SubscriberData.category.entity_id;
          SubscriberData.country = SubscriberData.country.name;
          SubscriberData.registration_channel = SubscriberData.registration_channel.entity_id;
          SubscriberData.dob = CS.getDateFormat(SubscriberData.dob,"yyyy-MM-dd");
          return SubscriberData;
      }
      
      this.MakeingCustomFormatDataForSubscription = function (SubscriptionData) {
          SubscriptionData.subscription_category = SubscriptionData.subscription_category.entity_id;
          SubscriptionData.subscription_duration = SubscriptionData.subscription_duration.entity_id;
          SubscriptionData.start_period = CS.getDateFormat(SubscriptionData.start_period,"yyyy-MM-dd");
          SubscriptionData.end_period = CS.getDateFormat(SubscriptionData.end_period,"yyyy-MM-dd");
          if(SubscriptionData.relationship_id != undefined && SubscriptionData.relationship_id != null)
          SubscriptionData.relationship_id = SubscriptionData.relationship_id.entity_id;  
          return SubscriptionData;
      }
      
      this.MakeingCustomFormatDataForSubscriptionPayment = function (SubscriptionPaymentData) {
          SubscriptionPaymentData.payment_date = CS.getDateFormat(SubscriptionPaymentData.payment_date,"yyyy-MM-dd");
          SubscriptionPaymentData.bank_payment_date = CS.getDateFormat(SubscriptionPaymentData.bank_payment_date,"yyyy-MM-dd");
          SubscriptionPaymentData.payment_mode = SubscriptionPaymentData.payment_mode.entity_id;
          SubscriptionPaymentData.payment_status = SubscriptionPaymentData.payment_status.entity_id;
          SubscriptionPaymentData.payment_for = SubscriptionPaymentData.payment_for.entity_id;  
          return SubscriptionPaymentData;
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
      this.getDateForAge = function(age){
        var d = new Date();
        var year = d.getFullYear();
        d.setFullYear(year - age);
        return d;
      };

      this.getObjectById = function (entity_id,type) {
        var returnObj = {};
        config[type].forEach(function(obj){
          if(obj.entity_id == entity_id) returnObj = obj;
        })
        return returnObj;
      }

      this.getObjectByCountryName = function (name,type) {
        var returnObj = {};
        config[type].forEach(function(obj){
          if(obj.name == name) returnObj = obj;
        })
        return returnObj;
      }

      this.getEndDateForSubscription = function (start_date,Duration,Type="ByYear") {
        var d = new Date(start_date);
        d.setDate(d.getDate()-1);
        var year = d.getFullYear();
        var date = ('0'+ d.getDate()).slice(-2);
        var month = ('0' + (d.getMonth()+1)).slice(-2);

        if(Type == "ByYear"){  
          if(Duration == "1 Year") year =  d.getFullYear() + 1;
          else if(Duration == "3 Years") year =  d.getFullYear() + 3;
          else if(Duration == "5 Years") year =  d.getFullYear() + 5;
          else if(Duration == "10 Years") year =  d.getFullYear() + 10;
          else if(Duration == "20 Years") year =  d.getFullYear() + 20;
          else  return null;
        }else if(Type == "ByMonth"){
          month = ('0' + (d.getMonth()+ 1 + Duration)).slice(-2);
        }else if(Type == "LastDateOfMonth"){
          d = new Date(start_date);
          var lastDay = new Date(d.getFullYear(), d.getMonth() + 1, 0);
          date = lastDay.getDate();
          month = ('0' + (lastDay.getMonth() + 1)).slice(-2);
          year = lastDay.getFullYear();
        }
        return year + '-' + month + '-' + date;
      }

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

      this.MakeingCustomFormatDataForPublication = function (PublicationData) {
          PublicationData.issue_type = PublicationData.issue_type.entity_id;
          PublicationData.issue_start_period = CS.getDateFormat(PublicationData.issue_start_period,"yyyy-MM-dd");
          PublicationData.issue_end_period = CS.getDateFormat(PublicationData.issue_end_period,"yyyy-MM-dd");
          return PublicationData;
      }

      this.MakeingCustomFormatDataForExpenses = function (ExpenseData) {
          ExpenseData.is_active = parseInt(ExpenseData.is_active);
          ExpenseData.amount = parseInt(ExpenseData.amount);
          ExpenseData.expense_header = ExpenseData.expense_header.entity_id;
          ExpenseData.payment_mode = ExpenseData.payment_mode.entity_id;
          ExpenseData.expense_status = ExpenseData.expense_status.entity_id;
          ExpenseData.paid_to = parseInt(ExpenseData.paid_to.entity_id);
          ExpenseData.date_of_expense = CS.getDateFormat(ExpenseData.date_of_expense,"yyyy-MM-dd");
          return ExpenseData;
      }

}]);




