/**
 * Created by Aaroor on 2/23/2018.
 */
function airportBookingFormValidation(){
    var bookTime=document.air_booking_form.booking_time.value;
    var bookDate=document.air_booking_form.booking_date.value;
    var todayDate = new Date();
    //need to add one to get current month as it is start with 0
    var todayMonth = todayDate.getMonth() + 1;
    var todayDay = todayDate.getDate();
    var todayYear = todayDate.getFullYear();
    var todayDateText = todayYear + "-" + todayMonth + "-" + todayDay;
    //Convert both input to date type
    var inputToDate = Date.parse(bookDate);
    var todayToDate = Date.parse(todayDateText);

    if(bookDate==""||bookDate==null) {
        alert('Please select the date from the date(Pickup/Drop)');
        return false;
    }
    else if(bookTime==""||bookTime==null){
        alert('Please select the time for airport pickup/drop)');
        return false;
    }
    else{
        if(inputToDate<todayToDate){
            alert('Your selected date is earlier than the today date');
            return false;
        }
    }


}

function twoDateValidation(){
    var bookDateFrom=document.print_check_out_form.from_date.value;
    var bookDateTo=document.print_check_out_form.to_date.value;

    var todayDate = new Date();
    var todayMonth = todayDate.getMonth() + 1;
    var todayDay = todayDate.getDate();
    var todayYear = todayDate.getFullYear();
    var todayDateText = todayYear + "-" + todayMonth + "-" + todayDay;

    var inputFromDate = Date.parse(bookDateFrom);
    var todayToDate = Date.parse(todayDateText);
    var inputToDate = Date.parse(bookDateTo);


    if(bookDateFrom==""||bookDateFrom==null) {
       // alert('Please select the start searching date');
        return false;
    }

    else if(bookDateTo==""||bookDateTo==null){
       // alert('Please select the end searching date)');
        return false;
    }
    else{
        if(inputToDate<inputFromDate){
            alert('Your selected date is earlier than the today date');
            return false;
        }
    }


}


function dateNullValidation(){
    var bookDateFrom=document.daily_summary_form.sum_from_date.value;

    if(bookDateFrom==""||bookDateFrom==null) {
         alert('Please pick a date for search report summary');
        return false;
    }



}

function twoDateSearchValidation(){

    var bookDateFrom=document.single_booking_form.from_date.value;
    var bookDateTo=document.single_booking_form.to_date.value;

    var todayDate = new Date(bookDateFrom);
    todayDate.setDate(todayDate.getDate() + 1);
    var todayMonth = todayDate.getMonth() + 1;
    var todayDay = todayDate.getDate();
    var todayYear = todayDate.getFullYear();
    var todayDateText = todayYear + "-" + todayMonth + "-" + todayDay;

    var inputFromDate = Date.parse(bookDateFrom);
    var todayToDate = Date.parse(todayDateText);
    var inputToDate = Date.parse(bookDateTo);


    if(bookDateFrom==""||bookDateFrom==null) {
        // alert('Please select the start searching date');
        return false;
    }

    else if(bookDateTo==""||bookDateTo==null){
        // alert('Please select the end searching date)');
        return false;
    }
    else{
        if(inputToDate<inputFromDate){
            alert('Your check out date is earlier than the check in date');

            document.single_booking_form.to_date.value=todayDateText;
            document.getElementById("btn_search").click();
          //  return false;
        }
    }


}

public function monthlySerachVal(){
  var startDate=document.getElementById("st_date").value;
  if(startDate==""||startDate==null) {
        // alert('Please select the start searching date');
        return false;
  }
  else{
	document.getElementById("btn_search").click();
  }

}


function twoBulkDateSearchValidation(){

    var bookDateFrom=document.getElementById("b_from_date").value;
    var bookDateTo=document.getElementById("b_to_date").value;

    var todayDate = new Date();
    var todayMonth = todayDate.getMonth() + 1;
    var todayDay = todayDate.getDate();
    var todayYear = todayDate.getFullYear();
    var todayDateText = todayYear + "-" + todayMonth + "-" + todayDay;

    var inputFromDate = Date.parse(bookDateFrom);
    var todayToDate = Date.parse(todayDateText);
    var inputToDate = Date.parse(bookDateTo);


    if(bookDateFrom==""||bookDateFrom==null) {
        // alert('Please select the start searching date');
        return false;
    }

    else if(bookDateTo==""||bookDateTo==null){
        // alert('Please select the end searching date)');
        return false;
    }
    else{
        if(inputToDate<inputFromDate){
            alert('Your check out date is earlier than the check in date');

            return false;
        }
    }


}







