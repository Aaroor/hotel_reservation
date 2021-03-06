<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::group(array('prefix' => '/'), function () {
//    Route::get('login', ['as' => 'login', 'uses' => 'CommonController@indexLogin']);
//});

Route::group(array('prefix' => '/'), function () {
    Route::get('/', ['as' => '/', 'uses' => 'CommonController@indexLogin']);
    Route::get('121819abc', ['as' => '121819abc', 'uses' => 'CommonController@setCookie']);
    Route::get('index', ['as' => 'index', 'uses' => 'CommonController@indexStart']);
    Route::get('error', ['as' => 'error', 'uses' => 'CommonController@errorIndex']);

});

Route::group(array('prefix' => 'common'), function () {
    Route::get('logout', ['as' => 'logout', 'uses' => 'CommonController@userLogout']);
    Route::get('calculator', ['as' => 'calculator', 'uses' => 'CommonController@indexCalculator']);
    Route::post('login_auth', ['as' => 'login_auth', 'uses' => 'CommonController@loginAuthorization']);
    Route::post('mtn_user_add_p', ['as' => 'mtn_user_add_p', 'uses' => 'CommonController@mtnUserAddP']);

});

Route::group(array('prefix' => 'receptionist'), function () {
    // start
    Route::get('res_index_paid_payment_report', ['as' => 'res_index_paid_payment_report', 'uses' => 'ReceptionistController@resIndexPaidPaymentReport']);
    Route::get('res_paid_search_report_date', ['as' => 'res_paid_search_report_date', 'uses' => 'ReceptionistController@recPaidDataSearchReport']);
    Route::get('res_paid_search_duration_report', ['as' => 'res_paid_search_duration_report', 'uses' => 'ReceptionistController@recPaidDurationSearchReport']);
    Route::get('res_paid_report_show', ['as' => 'res_paid_report_show', 'uses' => 'ReceptionistController@paidReportShow']);
    // end
    // Start
    Route::get('res_rep_check_out', ['as' => 'res_rep_check_out', 'uses' => 'ReceptionistController@resReportCheckOut']);
    Route::get('res_report_check_search_duration', ['as' => 'res_report_check_search_duration', 'uses' => 'ReceptionistController@resReportCheckDurationSearch']);
    Route::get('res_rep_check_rooms', ['as' => 'res_rep_check_rooms', 'uses' => 'ReceptionistController@resReportCheckRooms']);
    Route::get('res_report_check_rooms_search_duration', ['as' => 'res_report_check_rooms_search_duration', 'uses' => 'ReceptionistController@resReportCheckRoomsDurationSearch']);
    Route::get('res_rep_current_booking', ['as' => 'res_rep_current_booking', 'uses' => 'ReceptionistController@resReportCurrentBooking']);
    Route::get('res_report_current_booking_search_duration', ['as' => 'res_report_current_booking_search_duration', 'uses' => 'ReceptionistController@resReportCurrentBookingDurationSearch']);
    // End

    Route::get('receptionist_home', ['as' => 'receptionist_home', 'uses' => 'ReceptionistController@indexHome']);
    Route::get('receptionist_home_first', ['as' => 'receptionist_home_first', 'uses' => 'ReceptionistController@indexHomeFirst']);
    Route::get('rec_available_rooms_index', ['as' => 'rec_available_rooms_index', 'uses' => 'ReceptionistController@availableRoomsIndex']);
    Route::get('rec_room_search', ['as' => 'rec_room_search', 'uses' => 'ReceptionistController@recRoomSearch']);
    Route::get('rec_room_search_map', ['as' => 'rec_room_search_map', 'uses' => 'ReceptionistController@recRoomSearchMap']);
    Route::get('rec_room_search_bulk_map', ['as' => 'rec_room_search_bulk_map', 'uses' => 'ReceptionistController@recRoomSearchBulkMap']);
    Route::get('res_cancellation_success', ['as' => 'res_cancellation_success', 'uses' => 'ReceptionistController@resCancellationSuccess']);
    Route::get('res_cancellation_map_success', ['as' => 'res_cancellation_map_success', 'uses' => 'ReceptionistController@resCancellationSuccessMap']);
    Route::get('res_cancellation_bulk_map_success', ['as' => 'res_cancellation_bulk_map_success', 'uses' => 'ReceptionistController@resCancellationSuccessMapBulk']);
    Route::get('res_create_new_customer', ['as' => 'res_create_new_customer', 'uses' => 'ReceptionistController@resCreateNewCustomer']);
    Route::get('res_create_new_bulk_customer', ['as' => 'res_create_new_bulk_customer', 'uses' => 'ReceptionistController@resCreateNewBulkCustomer']);
    Route::get('res_create_cus_success', ['as' => 'res_create_cus_success', 'uses' => 'ReceptionistController@resCreateCustomerSuccess']);
    Route::get('res_create_cus_bulk_success', ['as' => 'res_create_cus_bulk_success', 'uses' => 'ReceptionistController@resCreateCustomerBulkSuccess']);
    Route::get('res_success_booking', ['as' => 'res_success_booking', 'uses' => 'ReceptionistController@resSuccessBooking']);
    Route::get('res_success_bulk_booking', ['as' => 'res_success_bulk_booking', 'uses' => 'ReceptionistController@resSuccessBulkBooking']);
    Route::get('res_index_booking_list', ['as' => 'res_index_booking_list', 'uses' => 'ReceptionistController@resBookingList']);
    Route::get('res_index_check_booking_list', ['as' => 'res_index_check_booking_list', 'uses' => 'ReceptionistController@resCheckBookingList']);
    Route::get('res_edit_booking_list', ['as' => 'res_edit_booking_list', 'uses' => 'ReceptionistController@resEditBookingList']);
    Route::get('res_index_order_meals', ['as' => 'res_index_order_meals', 'uses' => 'ReceptionistController@resIndexOrderMeals']);
    Route::get('res_index_order_meals1', ['as' => 'res_index_order_meals1', 'uses' => 'ReceptionistController@resIndexOrderMeals1']);
    Route::get('res_index_order_list', ['as' => 'res_index_order_list', 'uses' => 'ReceptionistController@resIndexOrderList']);
    Route::get('res_index_check_order_list', ['as' => 'res_index_check_order_list', 'uses' => 'ReceptionistController@resIndexCheckOrderList']);
    Route::get('res_index_airport_booking', ['as' => 'res_index_airport_booking', 'uses' => 'ReceptionistController@resIndexAdminAirPortBooking']);
    Route::get('res_airport_booking_success', ['as' => 'res_airport_booking_success', 'uses' => 'ReceptionistController@resAirportBookingSuccess']);
    Route::get('res_index_airport_booking_list', ['as' => 'res_index_airport_booking_list', 'uses' => 'ReceptionistController@resIndexAirportBookingList']);
    Route::get('res_index_all_booking_list', ['as' => 'res_index_all_booking_list', 'uses' => 'ReceptionistController@resAllBookingList']);
    Route::get('res_index_check_airport_booking_list', ['as' => 'res_index_check_airport_booking_list', 'uses' => 'ReceptionistController@resIndexAirportCheckBookingList']);


    Route::get('res_booking_search', ['as' => 'res_booking_search', 'uses' => 'ReceptionistController@resBookingSearch']);
    Route::get('res_check_booking_search', ['as' => 'res_check_booking_search', 'uses' => 'ReceptionistController@resCheckBookingSearch']);
    Route::get('res_index_check_out_payment', ['as' => 'res_index_check_out_payment', 'uses' => 'ReceptionistController@resIndexPaymentCheckOut']);
    Route::get('res_index_paid_payment', ['as' => 'res_index_paid_payment', 'uses' => 'ReceptionistController@resIndexPaidPayment']);
    Route::get('res_remove_booking_success', ['as' => 'res_remove_booking_success', 'uses' => 'ReceptionistController@resRemoveBookingSuccess']);
    Route::get('res_add_payment_success', ['as' => 'res_add_payment_success', 'uses' => 'ReceptionistController@resAddPaymentSuccess']);
    Route::get('res_add_payment_success1', ['as' => 'res_add_payment_success1', 'uses' => 'ReceptionistController@resAddPaymentSuccess1']);
    Route::get('res_stop_booking_process', ['as' => 'res_stop_booking_process', 'uses' => 'ReceptionistController@resBookingStopProcess']);
    Route::get('res_index_add_customer', ['as' => 'res_index_add_customer', 'uses' => 'ReceptionistController@resIndexAddCustomer']);
    Route::get('res_add_cus_success', ['as' => 'res_add_cus_success', 'uses' => 'ReceptionistController@resAddCustomerSuccess']);
    Route::get('res_add_cus_failure', ['as' => 'res_add_cus_failure', 'uses' => 'ReceptionistController@resAddCustomerFailure']);
    Route::get('res_cus_list', ['as' => 'res_cus_list', 'uses' => 'ReceptionistController@resIndexCusList']);
    Route::get('res_update_cus_success', ['as' => 'res_update_cus_success', 'uses' => 'ReceptionistController@resUpdateCustomerSuccess']);
    Route::get('res_update_cus_failure', ['as' => 'res_update_cus_failure', 'uses' => 'ReceptionistController@resUpdateCustomerFailure']);
    Route::get('res_remove_cus_success', ['as' => 'res_remove_cus_success', 'uses' => 'ReceptionistController@resRemoveCusSuccess']);
    Route::get('res_create_cus_failure', ['as' => 'res_create_cus_failure', 'uses' => 'ReceptionistController@resCreateCustomerFailure']);
    Route::get('res_create_cus_bulk_failure', ['as' => 'res_create_cus_bulk_failure', 'uses' => 'ReceptionistController@resCreateCustomerBulkFailure']);
    Route::get('res_check_out_search_date', ['as' => 'res_check_out_search_date', 'uses' => 'ReceptionistController@recCheckOutDataSearch']);
    Route::get('res_paid_search_date', ['as' => 'res_paid_search_date', 'uses' => 'ReceptionistController@recPaidDataSearch']);
    Route::get('res_check_out_search_duration', ['as' => 'res_check_out_search_duration', 'uses' => 'ReceptionistController@recCheckOutDurationSearch']);
    Route::get('res_paid_search_duration', ['as' => 'res_paid_search_duration', 'uses' => 'ReceptionistController@recPaidDurationSearch']);
    Route::get('res_final_check_search_duration', ['as' => 'res_final_check_search_duration', 'uses' => 'ReceptionistController@recFinalCheckDurationSearch']);
    Route::get('res_order_remove_success', ['as' => 'res_order_remove_success', 'uses' => 'ReceptionistController@resOrderRemoveSuccess']);
    Route::get('res_air_booking_remove_success', ['as' => 'res_air_booking_remove_success', 'uses' => 'ReceptionistController@resAirBookingRemoveSuccess']);
    Route::get('res_order_update_success', ['as' => 'res_order_update_success', 'uses' => 'ReceptionistController@resOrderUpdateSuccess']);
    Route::get('res_cus_booking_history', ['as' => 'res_cus_booking_history', 'uses' => 'ReceptionistController@resCusBookingHistory']);
    Route::get('res_order_search_date', ['as' => 'res_order_search_date', 'uses' => 'ReceptionistController@recOrderDataSearch']);
    Route::get('res_order_search_duration', ['as' => 'res_order_search_duration', 'uses' => 'ReceptionistController@recOrderDurationSearch']);
    Route::get('res_order_check_search_duration', ['as' => 'res_order_check_search_duration', 'uses' => 'ReceptionistController@recOrderCheckDurationSearch']);
    Route::get('res_air_check_search_duration', ['as' => 'res_air_check_search_duration', 'uses' => 'ReceptionistController@recAirCheckDurationSearch']);
    Route::get('res_order_remove_app_submit', ['as' => 'res_order_remove_app_submit', 'uses' => 'ReceptionistController@resRemoveAppSubmit']);
    Route::get('res_order_edit_app_submit', ['as' => 'res_order_edit_app_submit', 'uses' => 'ReceptionistController@resEditAppSubmit']);
    Route::get('res_air_booking_rem_app_submit', ['as' => 'res_air_booking_rem_app_submit', 'uses' => 'ReceptionistController@resAirBookRemAppSubmit']);
    Route::get('res_edit_air_book_app_submit', ['as' => 'res_edit_air_book_app_submit', 'uses' => 'ReceptionistController@resEditAirBookAppSubmit']);
    Route::get('res_cancel_book_app_submit', ['as' => 'res_cancel_book_app_submit', 'uses' => 'ReceptionistController@resCancelBookAppSubmit']);
    Route::get('res_edit_book_app_submit', ['as' => 'res_edit_book_app_submit', 'uses' => 'ReceptionistController@resEditBookAppSubmit']);
    Route::get('res_bill_print_app_submit', ['as' => 'res_bill_print_app_submit', 'uses' => 'ReceptionistController@resBillPrintAppSubmit']);
    Route::get('res_pay_history_app_submit', ['as' => 'res_pay_history_app_submit', 'uses' => 'ReceptionistController@resPayHistoryAppSubmit']);
    Route::get('res_edit_avail_search', ['as' => 'res_edit_avail_search', 'uses' => 'ReceptionistController@resEditAvailableSearch']);
    Route::get('res_pay_history_success', ['as' => 'res_pay_history_success', 'uses' => 'ReceptionistController@resRemovePaySuccess']);
    Route::get('res_check_map', ['as' => 'res_check_map', 'uses' => 'ReceptionistController@resCheckMap']);
    Route::get('res_check_map_bulk', ['as' => 'res_check_map_bulk', 'uses' => 'ReceptionistController@resCheckMapBulk']);
    Route::get('res_check_out_info', ['as' => 'res_check_out_info', 'uses' => 'ReceptionistController@resCheckOutInfo']);
    Route::get('res_check_out_success', ['as' => 'res_check_out_success', 'uses' => 'ReceptionistController@resCheckOutSuccess']);
    Route::get('res_bulk_booking_details', ['as' => 'res_bulk_booking_details', 'uses' => 'ReceptionistController@resBulkBookingDetails']);
    Route::get('res_cus_request', ['as' => 'res_cus_request', 'uses' => 'ReceptionistController@customerRequest']);
    Route::get('res_cus_request_all', ['as' => 'res_cus_request_all', 'uses' => 'ReceptionistController@customerRequestAll']);
    Route::get('res_cus_questions', ['as' => 'res_cus_questions', 'uses' => 'ReceptionistController@customerQuestions']);
    Route::get('res_cus_questions_all', ['as' => 'res_cus_questions_all', 'uses' => 'ReceptionistController@customerQuestionsAll']);
    Route::get('res_monthly_map', ['as' => 'res_monthly_map', 'uses' => 'ReceptionistController@checkUI']);

    Route::get('res_confirm_booking/{id}', array('as' => 'res_confirm_booking', 'uses' => 'ReceptionistController@resSetConfirmBooking'));
    Route::get('res_confirm_booking_bulk/{id}', array('as' => 'res_confirm_booking_bulk', 'uses' => 'ReceptionistController@resSetConfirmBookingBulk'));
    Route::get('res_confirm_booking_monthly/{id}', array('as' => 'res_confirm_booking_monthly', 'uses' => 'ReceptionistController@resSetConfirmBookingMonthly'));
    Route::get('res_not_confirm_booking/{id}', array('as' => 'res_not_confirm_booking', 'uses' => 'ReceptionistController@resSetNotConfirmBooking'));
    Route::get('res_not_confirm_booking_bulk/{id}', array('as' => 'res_not_confirm_booking_bulk', 'uses' => 'ReceptionistController@resSetNotConfirmBookingBulk'));
    Route::get('res_not_confirm_booking_monthly/{id}', array('as' => 'res_not_confirm_booking_monthly', 'uses' => 'ReceptionistController@resSetNotConfirmBookingMonthly'));
    Route::get('res_remove_not_confirm_booking/{id}', array('as' => 'res_remove_not_confirm_booking', 'uses' => 'ReceptionistController@resRemoveBookingFromFront'));
    Route::get('res_remove_not_confirm_booking_bulk/{id}', array('as' => 'res_remove_not_confirm_booking_bulk', 'uses' => 'ReceptionistController@resRemoveBookingFromFrontBulk'));
    Route::get('res_remove_not_confirm_booking_monthly/{id}', array('as' => 'res_remove_not_confirm_booking_monthly', 'uses' => 'ReceptionistController@resRemoveBookingFromFrontMonthly'));
    Route::get('res_air_detail/{id}', array('as' => 'res_air_detail', 'uses' => 'ReceptionistController@resAirportBookingDetails'));
    Route::get('res_order_detail/{id}', array('as' => 'res_order_detail', 'uses' => 'ReceptionistController@resOrderDetails'));
    Route::get('res_booking_detail/{id}', array('as' => 'res_booking_detail', 'uses' => 'ReceptionistController@resBookingDetails'));
    Route::get('res_bill_payment/{id}', array('as' => 'res_bill_payment', 'uses' => 'ReceptionistController@resBillPayment'));
    Route::get('res_payment_preview/{id}', array('as' => 'res_payment_preview', 'uses' => 'ReceptionistController@resIndexPaymentPreview'));
    Route::get('res_print_bill/{id}', array('as' => 'res_print_bill', 'uses' => 'ReceptionistController@resPrintBill'));
    Route::get('res_index_booking_info/{id}', array('as' => 'res_index_booking_info', 'uses' => 'ReceptionistController@resIndexBookingInfo'));
    Route::get('res_edit_booking_info/{id}', array('as' => 'res_edit_booking_info', 'uses' => 'ReceptionistController@resEditBookingInfo'));
    Route::get('res_con_booking_info/{id}/{from}/{to}', array('as' => 'res_con_booking_info', 'uses' => 'ReceptionistController@resConBookingInfo'));
    Route::get('res_cancel_booking/{id}', array('as' => 'res_cancel_booking', 'uses' => 'ReceptionistController@resBookingCancel'));
    Route::get('res_cancel_booking_map_bulk/{id}', array('as' => 'res_cancel_booking_map_bulk', 'uses' => 'ReceptionistController@resBookingCancelMapBulk'));
    Route::get('res_cancel_booking_map/{id}', array('as' => 'res_cancel_booking_map', 'uses' => 'ReceptionistController@resBookingCancelMap'));
    Route::get('res_re_meals_booking/{id}', array('as' => 'res_re_meals_booking', 'uses' => 'ReceptionistController@resReMealsBooking'));
    Route::get('res_re_air_booking/{id}', array('as' => 'res_re_air_booking', 'uses' => 'ReceptionistController@resReAirBooking'));
    Route::get('res_re_room_booking/{id}', array('as' => 'res_re_room_booking', 'uses' => 'ReceptionistController@resReRoomBooking'));
    Route::get('res_remove_booking/{id}', array('as' => 'res_remove_booking', 'uses' => 'ReceptionistController@resRemoveBooking'));
    Route::get('res_stop_process/{id}', array('as' => 'res_stop_process', 'uses' => 'ReceptionistController@resStopProcess'));
    Route::get('res_index_cus_edit/{id}', array('as' => 'res_index_cus_edit', 'uses' => 'ReceptionistController@resIndexUpdateCustomer'));
    Route::get('res_remove_customer/{id}', array('as' => 'res_remove_customer', 'uses' => 'ReceptionistController@indexResRemoveCustomer'));
    Route::get('res_pay_check/{id}', array('as' => 'res_pay_check', 'uses' => 'ReceptionistController@resPaymentCheckOut'));
    Route::get('res_remove_order/{id}', array('as' => 'res_remove_order', 'uses' => 'ReceptionistController@resRemoveOrder'));
    Route::get('res_remove_air_booking/{id}', array('as' => 'res_remove_air_booking', 'uses' => 'ReceptionistController@resRemoveAirBooking'));
    Route::get('res_payment_history_r/{id}', array('as' => 'res_payment_history_r', 'uses' => 'ReceptionistController@resPayHistoryR'));
    Route::get('res_edit_air_booking/{id}', array('as' => 'res_edit_air_booking', 'uses' => 'ReceptionistController@resEditAirBooking'));
    Route::get('res_remove_pay_history/{id}', array('as' => 'res_remove_pay_history', 'uses' => 'ReceptionistController@resRemovePayHistory'));
    Route::get('res_add_check_out/{id}', array('as' => 'res_add_check_out', 'uses' => 'ReceptionistController@resAddCheckOut'));
    Route::get('res_direct_to_booking_list/{id}', array('as' => 'res_direct_to_booking_list', 'uses' => 'ReceptionistController@resBookingListFromFront'));


    Route::post('rec_search_rooms_p', ['as' => 'rec_search_rooms_p', 'uses' => 'ReceptionistController@recAvailableRoomsSearch']);
    Route::post('rec_search_rooms_map_p', ['as' => 'rec_search_rooms_map_p', 'uses' => 'ReceptionistController@recAvailableRoomsSearchMap']);
    Route::post('rec_search_rooms_bulk_map_p', ['as' => 'rec_search_rooms_bulk_map_p', 'uses' => 'ReceptionistController@recAvailableRoomsSearchBulkMap']);
    Route::post('rec_create_new_cus', ['as' => 'rec_create_new_cus', 'uses' => 'ReceptionistController@resAddNewCustomer']);
    Route::post('rec_create_new_bulk_cus', ['as' => 'rec_create_new_bulk_cus', 'uses' => 'ReceptionistController@resAddNewBulkCustomer']);
    Route::post('rec_add_booking', ['as' => 'rec_add_booking', 'uses' => 'ReceptionistController@resAddBooking']);
    Route::post('rec_add_booking_bulkP', ['as' => 'rec_add_booking_bulkP', 'uses' => 'ReceptionistController@resAddBulkBookingP']);
    Route::post('res_add_booking_id', ['as' => 'res_add_booking_id', 'uses' => 'ReceptionistController@resAddBookingId']);
    Route::post('res_add_meals_order_p', ['as' => 'res_add_meals_order_p', 'uses' => 'ReceptionistController@resAddMealsOrderP']);
    Route::post('res_add_booking_id_a', ['as' => 'res_add_booking_id_a', 'uses' => 'ReceptionistController@resAddBookingIdA']);
    Route::post('res_add_air_booking_p', ['as' => 'res_add_air_booking_p', 'uses' => 'ReceptionistController@resAirPortBookingP']);
    Route::post('res_edit_air_booking_p', ['as' => 'res_edit_air_booking_p', 'uses' => 'ReceptionistController@resEditAirPortBookingP']);
    Route::post('res_search_booking_p', ['as' => 'res_booking_rooms_p', 'uses' => 'ReceptionistController@resBookingSearchP']);
    Route::post('res_search_check_booking_p', ['as' => 'res_search_check_booking_p', 'uses' => 'ReceptionistController@resCheckBookingSearchP']);
    Route::post('res_add_payment', ['as' => 'res_add_payment', 'uses' => 'ReceptionistController@resAddPayment']);
    Route::post('res_add_customer', ['as' => 'res_add_customer', 'uses' => 'ReceptionistController@resAddCustomer']);
    Route::post('res_update_customer', ['as' => 'res_update_customer', 'uses' => 'ReceptionistController@resUpdateCustomer']);
    Route::post('res_checkout_dateP', ['as' => 'res_checkout_dateP', 'uses' => 'ReceptionistController@recCheckOutDateSearchP']);
    Route::post('res_paid_dateP', ['as' => 'res_paid_dateP', 'uses' => 'ReceptionistController@recPaidSearchP']);
    Route::post('res_checkout_durationP', ['as' => 'res_checkout_durationP', 'uses' => 'ReceptionistController@recCheckOutDurationSearchP']);
    Route::post('res_paid_durationP', ['as' => 'res_paid_durationP', 'uses' => 'ReceptionistController@recPaidDurationSearchP']);
    Route::post('res_final_check_durationP', ['as' => 'res_final_check_out_durationP', 'uses' => 'ReceptionistController@recFinalCheckDurationSearchP']);
    Route::post('res_update_meals_order_p', ['as' => 'res_update_meals_order_p', 'uses' => 'ReceptionistController@resUpdateMealsOrderP']);
    Route::post('res_order_dateP', ['as' => 'res_order_dateP', 'uses' => 'ReceptionistController@recOrderDateSearchP']);
    Route::post('res_order_durationP', ['as' => 'res_order_durationP', 'uses' => 'ReceptionistController@recOrderDurationSearchP']);
    Route::post('res_order_check_durationP', ['as' => 'res_order_check_durationP', 'uses' => 'ReceptionistController@recOrderCheckDurationSearchP']);
    Route::post('res_air_check_durationP', ['as' => 'res_air_check_durationP', 'uses' => 'ReceptionistController@recAirCheckDurationSearchP']);
    Route::post('res_remove_meals_order_appP', ['as' => 'res_remove_meals_order_appP', 'uses' => 'ReceptionistController@resRemoveMealsAppP']);
    Route::post('res_edit_meals_order_appP', ['as' => 'res_edit_meals_order_appP', 'uses' => 'ReceptionistController@resEditMealsAppP']);
    Route::post('res_remove_air_book_appP', ['as' => 'res_remove_air_book_appP', 'uses' => 'ReceptionistController@resRemoveAirBookAppP']);
    Route::post('res_edit_air_book_appP', ['as' => 'res_edit_air_book_appP', 'uses' => 'ReceptionistController@resEditAirBookAppP']);
    Route::post('res_cancel_booking_appP', ['as' => 'res_cancel_booking_appP', 'uses' => 'ReceptionistController@resCancelBookingAppP']);
    Route::post('res_edit_booking_appP', ['as' => 'res_edit_booking_appP', 'uses' => 'ReceptionistController@resEditBookingAppP']);
    Route::post('res_bill_print_appP', ['as' => 'res_bill_print_appP', 'uses' => 'ReceptionistController@resBillPrintsAppP']);
    Route::post('res_pay_remove_appP', ['as' => 'res_pay_remove_appP', 'uses' => 'ReceptionistController@resPayRemoveAppP']);
    Route::post('res_edt_duration_avaP', ['as' => 'res_edt_duration_avaP', 'uses' => 'ReceptionistController@resEditDurationAvaP']);
    Route::post('res_edt_bookingP', ['as' => 'res_edt_bookingP', 'uses' => 'ReceptionistController@resEditBooking']);
    Route::post('res_bulk_temp_bookP', ['as' => 'res_bulk_temp_bookP', 'uses' => 'ReceptionistController@recBulkTempBooking']);
    Route::post('monthly_search_p', ['as' => 'monthly_search_p', 'uses' => 'ReceptionistController@monthlySearchP']);

    // start
    Route::post('res_report_check_out_durationP', ['as' => 'res_report_check_out_durationP', 'uses' => 'ReceptionistController@resReportCheckDurationSearchP']);
    Route::post('res_report_check_rooms_durationP', ['as' => 'res_report_check_rooms_durationP', 'uses' => 'ReceptionistController@resReportCheckRoomsDurationSearchP']);
    Route::post('res_report_current_booking_durationP', ['as' => 'res_report_current_booking_durationP', 'uses' => 'ReceptionistController@resReportCurrentBookingDurationSearchP']);
    //end
    
     // start 2/28
    Route::post('res_paid_date_report_P', ['as' => 'res_paid_date_report_P', 'uses' => 'ReceptionistController@recPaidSearchReportP']);
    Route::post('res_paid_duration_report_P', ['as' => 'res_paid_duration_report_P', 'uses' => 'ReceptionistController@recPaidDurationSearchReportP']);
    //end


});

Route::group(array('prefix' => 'manager'), function () {
    Route::get('manager_home', ['as' => 'manager_home', 'uses' => 'ManagerController@indexHome']);
    Route::get('man_available_rooms_index', ['as' => 'man_available_rooms_index', 'uses' => 'ManagerController@availableRoomsIndex']);
    Route::get('man_room_search', ['as' => 'man_room_search', 'uses' => 'ManagerController@manRoomSearch']);
    Route::get('man_room_search_map', ['as' => 'man_room_search_map', 'uses' => 'ManagerController@manRoomSearchMap']);
    Route::get('man_cancellation_success', ['as' => 'man_cancellation_success', 'uses' => 'ManagerController@manCancellationSuccess']);
    Route::get('man_cancellation_map_success', ['as' => 'man_cancellation_map_success', 'uses' => 'ManagerController@manCancellationSuccessMap']);
    Route::get('man_create_new_customer', ['as' => 'man_create_new_customer', 'uses' => 'ManagerController@manCreateNewCustomer']);
    Route::get('man_create_cus_success', ['as' => 'man_create_cus_success', 'uses' => 'ManagerController@manCreateCustomerSuccess']);
    Route::get('man_success_booking', ['as' => 'man_success_booking', 'uses' => 'ManagerController@manSuccessBooking']);
    Route::get('man_index_booking_list', ['as' => 'man_index_booking_list', 'uses' => 'ManagerController@manBookingList']);
    Route::get('man_edit_booking_list', ['as' => 'man_edit_booking_list', 'uses' => 'ManagerController@manEditBookingList']);
    Route::get('man_index_order_meals', ['as' => 'man_index_order_meals', 'uses' => 'ManagerController@manIndexOrderMeals']);
    Route::get('man_index_order_meals1', ['as' => 'man_index_order_meals1', 'uses' => 'ManagerController@manIndexOrderMeals1']);
    Route::get('man_index_order_list', ['as' => 'man_index_order_list', 'uses' => 'ManagerController@manIndexOrderList']);
    Route::get('man_index_airport_booking', ['as' => 'man_index_airport_booking', 'uses' => 'ManagerController@manIndexAdminAirPortBooking']);
    Route::get('man_airport_booking_success', ['as' => 'man_airport_booking_success', 'uses' => 'ManagerController@manAirportBookingSuccess']);
    Route::get('man_index_airport_booking_list', ['as' => 'man_index_airport_booking_list', 'uses' => 'ManagerController@manIndexAirportBookingList']);
    Route::get('man_index_all_booking_list', ['as' => 'man_index_all_booking_list', 'uses' => 'ManagerController@manAllBookingList']);
    Route::get('man_booking_search', ['as' => 'man_booking_search', 'uses' => 'ManagerController@manBookingSearch']);
    Route::get('man_index_check_out_payment', ['as' => 'man_index_check_out_payment', 'uses' => 'ManagerController@manIndexPaymentCheckOut']);
    Route::get('man_index_paid_payment', ['as' => 'man_index_paid_payment', 'uses' => 'ManagerController@manIndexPaidPayment']);
    Route::get('man_remove_booking_success', ['as' => 'man_remove_booking_success', 'uses' => 'ManagerController@manRemoveBookingSuccess']);
    Route::get('man_add_payment_success', ['as' => 'man_add_payment_success', 'uses' => 'ManagerController@manAddPaymentSuccess']);
    Route::get('man_add_payment_success1', ['as' => 'man_add_payment_success1', 'uses' => 'ManagerController@manAddPaymentSuccess1']);
    Route::get('man_stop_booking_process', ['as' => 'man_stop_booking_process', 'uses' => 'ManagerController@manBookingStopProcess']);
    Route::get('man_index_add_customer', ['as' => 'man_index_add_customer', 'uses' => 'ManagerController@manIndexAddCustomer']);
    Route::get('man_add_cus_success', ['as' => 'man_add_cus_success', 'uses' => 'ManagerController@manAddCustomerSuccess']);
    Route::get('man_add_cus_failure', ['as' => 'man_add_cus_failure', 'uses' => 'ManagerController@manAddCustomerFailure']);
    Route::get('man_cus_list', ['as' => 'man_cus_list', 'uses' => 'ManagerController@manIndexCusList']);
    Route::get('man_update_cus_success', ['as' => 'man_update_cus_success', 'uses' => 'ManagerController@manUpdateCustomerSuccess']);
    Route::get('man_update_cus_failure', ['as' => 'man_update_cus_failure', 'uses' => 'ManagerController@manUpdateCustomerFailure']);
    Route::get('man_remove_cus_success', ['as' => 'man_remove_cus_success', 'uses' => 'ManagerController@manRemoveCusSuccess']);
    Route::get('man_create_cus_failure', ['as' => 'man_create_cus_failure', 'uses' => 'ManagerController@manCreateCustomerFailure']);
    Route::get('man_check_out_search_date', ['as' => 'man_check_out_search_date', 'uses' => 'ManagerController@manCheckOutDataSearch']);
    Route::get('man_paid_search_date', ['as' => 'man_paid_search_date', 'uses' => 'ManagerController@manPaidDataSearch']);
    Route::get('man_check_out_search_duration', ['as' => 'man_check_out_search_duration', 'uses' => 'ManagerController@manCheckOutDurationSearch']);
    Route::get('man_paid_search_duration', ['as' => 'man_paid_search_duration', 'uses' => 'ManagerController@manPaidDurationSearch']);
    Route::get('man_final_check_search_duration', ['as' => 'man_final_check_search_duration', 'uses' => 'ManagerController@manFinalCheckDurationSearch']);
    Route::get('man_order_remove_success', ['as' => 'man_order_remove_success', 'uses' => 'ManagerController@manOrderRemoveSuccess']);
    Route::get('man_air_booking_remove_success', ['as' => 'man_air_booking_remove_success', 'uses' => 'ManagerController@manAirBookingRemoveSuccess']);
    Route::get('man_order_update_success', ['as' => 'man_order_update_success', 'uses' => 'ManagerController@manOrderUpdateSuccess']);
    Route::get('man_cus_booking_history', ['as' => 'man_cus_booking_history', 'uses' => 'ManagerController@manCusBookingHistory']);
    Route::get('man_order_search_date', ['as' => 'man_order_search_date', 'uses' => 'ManagerController@manOrderDataSearch']);
    Route::get('man_order_search_duration', ['as' => 'man_order_search_duration', 'uses' => 'ManagerController@manOrderDurationSearch']);
    Route::get('man_order_remove_app_submit', ['as' => 'man_order_remove_app_submit', 'uses' => 'ManagerController@manRemoveAppSubmit']);
    Route::get('man_order_edit_app_submit', ['as' => 'man_order_edit_app_submit', 'uses' => 'ManagerController@manEditAppSubmit']);
    Route::get('man_air_booking_rem_app_submit', ['as' => 'man_air_booking_rem_app_submit', 'uses' => 'ManagerController@manAirBookRemAppSubmit']);
    Route::get('man_edit_air_book_app_submit', ['as' => 'man_edit_air_book_app_submit', 'uses' => 'ManagerController@manEditAirBookAppSubmit']);
    Route::get('man_cancel_book_app_submit', ['as' => 'man_cancel_book_app_submit', 'uses' => 'ManagerController@manCancelBookAppSubmit']);
    Route::get('man_edit_book_app_submit', ['as' => 'man_edit_book_app_submit', 'uses' => 'ManagerController@manEditBookAppSubmit']);
    Route::get('man_bill_print_app_submit', ['as' => 'man_bill_print_app_submit', 'uses' => 'ManagerController@manBillPrintAppSubmit']);
    Route::get('man_pay_history_app_submit', ['as' => 'man_pay_history_app_submit', 'uses' => 'ManagerController@manPayHistoryAppSubmit']);
    Route::get('man_edit_avail_search', ['as' => 'man_edit_avail_search', 'uses' => 'ManagerController@manEditAvailableSearch']);
    Route::get('man_pay_history_success', ['as' => 'man_pay_history_success', 'uses' => 'ManagerController@manRemovePaySuccess']);
    Route::get('man_check_map', ['as' => 'man_check_map', 'uses' => 'ManagerController@manCheckMap']);
    Route::get('man_check_out_info', ['as' => 'man_check_out_info', 'uses' => 'ManagerController@manCheckOutInfo']);
    Route::get('man_check_out_success', ['as' => 'man_check_out_success', 'uses' => 'ManagerController@manCheckOutSuccess']);
    Route::get('man_rep_check_out', ['as' => 'man_rep_check_out', 'uses' => 'ManagerController@manReportCheckOut']);
    Route::get('man_rep_check_bill', ['as' => 'man_rep_check_bill', 'uses' => 'ManagerController@manBillCheckOut']);
    Route::get('man_rep_check_bill_duration', ['as' => 'man_rep_check_bill_duration', 'uses' => 'ManagerController@manBillCheckOutDuration']);
    Route::get('man_report_check_search_duration', ['as' => 'man_report_check_search_duration', 'uses' => 'ManagerController@manReportCheckDurationSearch']);
    Route::get('man_report_current_booking_search_duration', ['as' => 'man_report_current_booking_search_duration', 'uses' => 'ManagerController@manReportCurrentBookingDurationSearch']);
    Route::get('man_index_check_booking_list', ['as' => 'man_index_check_booking_list', 'uses' => 'ManagerController@manCheckBookingList']);
    Route::get('man_index_check_order_list', ['as' => 'man_index_check_order_list', 'uses' => 'ManagerController@manIndexCheckOrderList']);
    Route::get('man_index_check_airport_booking_list', ['as' => 'man_index_check_airport_booking_list', 'uses' => 'ManagerController@manIndexAirportCheckBookingList']);
    Route::get('man_air_check_search_duration', ['as' => 'man_air_check_search_duration', 'uses' => 'ManagerController@manAirCheckDurationSearch']);
    Route::get('man_order_check_search_duration', ['as' => 'man_order_check_search_duration', 'uses' => 'ManagerController@manOrderCheckDurationSearch']);
    Route::get('man_check_booking_search', ['as' => 'man_check_booking_search', 'uses' => 'ManagerController@manCheckBookingSearch']);
    Route::get('man_rep_current_booking', ['as' => 'man_rep_current_booking', 'uses' => 'ManagerController@manReportCurrentBooking']);
    Route::get('man_rep_current_booking_bill', ['as' => 'man_rep_current_booking_bill', 'uses' => 'ManagerController@manBillCurrentBooking']);
    Route::get('man_rep_current_booking_bill_duration', ['as' => 'man_rep_current_booking_bill_duration', 'uses' => 'ManagerController@manBillCurrentBookingDuration']);
    Route::get('man_rep_check_rooms', ['as' => 'man_rep_check_rooms', 'uses' => 'ManagerController@manReportCheckRooms']);
    Route::get('man_report_check_rooms_search_duration', ['as' => 'man_report_check_rooms_search_duration', 'uses' => 'ManagerController@manReportCheckRoomsDurationSearch']);
    Route::get('man_check_map_bulk', ['as' => 'man_check_map_bulk', 'uses' => 'ManagerController@manCheckMapBulk']);
    Route::get('man_room_search_bulk_map', ['as' => 'man_room_search_bulk_map', 'uses' => 'ManagerController@manRoomSearchBulkMap']);
    Route::get('man_bulk_booking_details', ['as' => 'man_bulk_booking_details', 'uses' => 'ManagerController@manBulkBookingDetails']);
    Route::get('man_success_bulk_booking', ['as' => 'man_success_bulk_booking', 'uses' => 'ManagerController@manSuccessBulkBooking']);
    Route::get('man_create_new_bulk_customer', ['as' => 'man_create_new_bulk_customer', 'uses' => 'ManagerController@manCreateNewBulkCustomer']);
    Route::get('man_create_cus_bulk_success', ['as' => 'man_create_cus_bulk_success', 'uses' => 'ManagerController@manCreateCustomerBulkSuccess']);
    Route::get('man_create_cus_bulk_failure', ['as' => 'man_create_cus_bulk_failure', 'uses' => 'ManagerController@manCreateCustomerBulkFailure']);
    Route::get('man_cancellation_bulk_map_success', ['as' => 'man_cancellation_bulk_map_success', 'uses' => 'ManagerController@manCancellationSuccessMapBulk']);
    Route::get('man_day_summary', ['as' => 'man_day_summary', 'uses' => 'ManagerController@manSummaryDetails']);
    Route::get('man_summary_search', ['as' => 'man_summary_search', 'uses' => 'ManagerController@manSummarySearch']);

    Route::get('add_receptionist', ['as' => 'add_receptionist', 'uses' => 'ManagerController@addReceptionist']);
    Route::get('receptionist_list', ['as' => 'receptionist_list', 'uses' => 'ManagerController@indexViewReceptionist']);
    Route::get('create_res_success', ['as' => 'create_res_success', 'uses' => 'ManagerController@createReceptionistSuccess']);
    Route::get('create_res_failure', ['as' => 'create_res_failure', 'uses' => 'ManagerController@createReceptionistFailure']);
    Route::get('update_receptionist_success', ['as' => 'update_receptionist_success', 'uses' => 'ManagerController@updateReceptionistSuccess']);
    Route::get('update_receptionist_failure', ['as' => 'update_receptionist_failure', 'uses' => 'ManagerController@updateReceptionistFailure']);

    Route::get('man_meals_order_app', ['as' => 'man_meals_order_app', 'uses' => 'ManagerController@manMealsApp']);
    Route::get('man_order_edit_app', ['as' => 'man_order_edit_app', 'uses' => 'ManagerController@manOrderEditApp']);
    Route::get('man_order_remove_app', ['as' => 'man_order_remove_app', 'uses' => 'ManagerController@manOrderRemoveApp']);
    Route::get('man_bill_app', ['as' => 'man_bill_app', 'uses' => 'ManagerController@manBillApp']);
    Route::get('man_book_cancel_app', ['as' => 'man_book_cancel_app', 'uses' => 'ManagerController@manBookCancelApp']);
    Route::get('man_book_edit_app', ['as' => 'man_book_edit_app', 'uses' => 'ManagerController@manBookEditApp']);
    Route::get('man_air_book_edit_app', ['as' => 'man_air_book_edit_app', 'uses' => 'ManagerController@manAirBookEditApp']);
    Route::get('man_air_book_remove_app', ['as' => 'man_air_book_remove_app', 'uses' => 'ManagerController@manAirBookRemoveApp']);
    Route::get('man_pay_remove_app', ['as' => 'man_pay_remove_app', 'uses' => 'ManagerController@manPayRemoveApp']);
    Route::get('man_reject_app', ['as' => 'man_reject_app', 'uses' => 'ManagerController@manRejectApp']);
    Route::get('man_edit_room_success', ['as' => 'man_edit_room_success', 'uses' => 'ManagerController@manEditRoomSuccess']);
    Route::get('man_edit_room_failure', ['as' => 'man_edit_room_failure', 'uses' => 'ManagerController@manEditRoomFailure']);

    Route::get('man_index_add_room', ['as' => 'man_index_add_room', 'uses' => 'ManagerController@manIndexAddRoom']);
    Route::get('man_add_room_success', ['as' => 'man_add_room_success', 'uses' => 'ManagerController@manAddRoomSuccess']);
    Route::get('man_add_room_failure', ['as' => 'man_add_room_failure', 'uses' => 'ManagerController@manAddRoomFailure']);
    Route::get('man_room_list', ['as' => 'man_room_list', 'uses' => 'ManagerController@manIndexRoomList']);
    Route::get('man_add_meals', ['as' => 'man_add_meals', 'uses' => 'ManagerController@manAddMeals']);
    Route::get('man_add_meals_successfully', ['as' => 'man_add_meals_successfully', 'uses' => 'ManagerController@manAddMealsSuccess']);
    Route::get('man_meals_list', ['as' => 'man_meals_list', 'uses' => 'ManagerController@manMealsList']);
    Route::get('man_remove_meals_success', ['as' => 'man_remove_meals_success', 'uses' => 'ManagerController@manRemoveMealsSuccess']);
    Route::get('man_edit_meals_success', ['as' => 'man_edit_meals_success', 'uses' => 'ManagerController@manEditMealsSuccess']);
    Route::get('remove_receptionist_success', ['as' => 'remove_receptionist_success', 'uses' => 'ManagerController@removeReceptionistSuccess']);



    Route::get('man_air_detail/{id}', array('as' => 'man_air_detail', 'uses' => 'ManagerController@manAirportBookingDetails'));
    Route::get('man_order_detail/{id}', array('as' => 'man_order_detail', 'uses' => 'ManagerController@manOrderDetails'));
    Route::get('man_booking_detail/{id}', array('as' => 'man_booking_detail', 'uses' => 'ManagerController@manBookingDetails'));
    Route::get('man_bill_payment/{id}', array('as' => 'man_bill_payment', 'uses' => 'ManagerController@manBillPayment'));
    Route::get('man_payment_preview/{id}', array('as' => 'man_payment_preview', 'uses' => 'ManagerController@manIndexPaymentPreview'));
    Route::get('man_print_bill/{id}', array('as' => 'man_print_bill', 'uses' => 'ManagerController@manPrintBill'));
    Route::get('man_index_booking_info/{id}', array('as' => 'man_index_booking_info', 'uses' => 'ManagerController@manIndexBookingInfo'));
    Route::get('man_edit_booking_info/{id}', array('as' => 'man_edit_booking_info', 'uses' => 'ManagerController@manEditBookingInfo'));
    Route::get('man_con_booking_info/{id}/{from}/{to}', array('as' => 'man_con_booking_info', 'uses' => 'ManagerController@manConBookingInfo'));
    Route::get('man_cancel_booking/{id}', array('as' => 'man_cancel_booking', 'uses' => 'ManagerController@manBookingCancel'));
    Route::get('man_cancel_booking_map/{id}', array('as' => 'man_cancel_booking_map', 'uses' => 'ManagerController@manBookingCancelMap'));
    Route::get('man_re_meals_booking/{id}', array('as' => 'man_re_meals_booking', 'uses' => 'ManagerController@manReMealsBooking'));
    Route::get('man_re_air_booking/{id}', array('as' => 'man_re_air_booking', 'uses' => 'ManagerController@manReAirBooking'));
    Route::get('man_re_room_booking/{id}', array('as' => 'man_re_room_booking', 'uses' => 'ManagerController@manReRoomBooking'));
    Route::get('man_remove_booking/{id}', array('as' => 'man_remove_booking', 'uses' => 'ManagerController@manRemoveBooking'));
    Route::get('man_stop_process/{id}', array('as' => 'man_stop_process', 'uses' => 'ManagerController@manStopProcess'));
    Route::get('man_index_cus_edit/{id}', array('as' => 'man_index_cus_edit', 'uses' => 'ManagerController@manIndexUpdateCustomer'));
    Route::get('man_remove_customer/{id}', array('as' => 'man_remove_customer', 'uses' => 'ManagerController@indexmanRemoveCustomer'));
    Route::get('man_pay_check/{id}', array('as' => 'man_pay_check', 'uses' => 'ManagerController@manPaymentCheckOut'));
    Route::get('man_remove_order/{id}', array('as' => 'man_remove_order', 'uses' => 'ManagerController@manRemoveOrder'));
    Route::get('man_remove_air_booking/{id}', array('as' => 'man_remove_air_booking', 'uses' => 'ManagerController@manRemoveAirBooking'));
    Route::get('man_payment_history_r/{id}', array('as' => 'man_payment_history_r', 'uses' => 'ManagerController@manPayHistoryR'));
    Route::get('man_edit_air_booking/{id}', array('as' => 'man_edit_air_booking', 'uses' => 'ManagerController@manEditAirBooking'));
    Route::get('man_remove_pay_history/{id}', array('as' => 'man_remove_pay_history', 'uses' => 'ManagerController@manRemovePayHistory'));
    Route::get('man_add_check_out/{id}', array('as' => 'man_add_check_out', 'uses' => 'ManagerController@manAddCheckOut'));
    Route::get('man_remove_approvals/{id}', array('as' => 'man_remove_approvals', 'uses' => 'ManagerController@manRemoveApprovalsR'));
    Route::get('remove_receptionist/{id}', array('as' => 'remove_receptionist', 'uses' => 'ManagerController@indexRemoveReceptionist'));
    Route::get('man_cancel_booking_map_bulk/{id}', array('as' => 'man_cancel_booking_map_bulk', 'uses' => 'ManagerController@manBookingCancelMapBulk'));
    Route::get('man_remove_room_success', ['as' => 'man_remove_room_success', 'uses' => 'ManagerController@manRemoveRoomSuccess']);

    Route::get('man_order_edit_app_r/{id}', array('as' => 'man_order_edit_app_r', 'uses' => 'ManagerController@manOrderEditAppR'));
    Route::get('man_order_remove_app_r/{id}', array('as' => 'man_order_remove_app_r', 'uses' => 'ManagerController@manOrderRemoveAppR'));
    Route::get('man_bill_print_app_r/{id}', array('as' => 'man_bill_print_app_r', 'uses' => 'ManagerController@manBillPrintAppR'));
    Route::get('man_book_cancel_app_r/{id}', array('as' => 'man_book_cancel_app_r', 'uses' => 'ManagerController@manBookCancelAppR'));
    Route::get('man_book_edit_app_r/{id}', array('as' => 'man_book_edit_app_r', 'uses' => 'ManagerController@manBookEditAppR'));
    Route::get('man_air_book_edit_app_r/{id}', array('as' => 'man_air_book_edit_app_r', 'uses' => 'ManagerController@manAirBookEditAppR'));
    Route::get('man_air_book_remove_app_r/{id}', array('as' => 'man_air_book_remove_app_r', 'uses' => 'ManagerController@manAirBookRemoveAppR'));
    Route::get('man_pay_remove_app_r/{id}', array('as' => 'man_pay_remove_app_r', 'uses' => 'ManagerController@manPayRemoveAppR'));
    Route::get('index_update_receptionist/{id}', array('as' => 'index_update_receptionist', 'uses' => 'ManagerController@indexUpdateReceptionist'));
    Route::get('man_direct_to_booking_list/{id}', array('as' => 'man_direct_to_booking_list', 'uses' => 'ManagerController@manBookingListFromFront'));
    Route::get('man_remove_meals_r/{id}', array('as' => 'man_remove_meals_r', 'uses' => 'ManagerController@manRemoveMealsR'));
    Route::get('man_edit_meals_r/{id}', array('as' => 'man_edit_meals_r', 'uses' => 'ManagerController@manEditMealsR'));
    Route::get('man_edit_room_r/{id}', array('as' => 'man_edit_room_r', 'uses' => 'ManagerController@manEditRoom'));
    Route::get('man_remove_room_r/{id}', array('as' => 'man_remove_room_r', 'uses' => 'ManagerController@manRemoveRoom'));


    Route::post('man_search_rooms_p', ['as' => 'man_search_rooms_p', 'uses' => 'ManagerController@manAvailableRoomsSearch']);
    Route::post('man_search_rooms_map_p', ['as' => 'man_search_rooms_map_p', 'uses' => 'ManagerController@manAvailableRoomsSearchMap']);
    Route::post('man_create_new_cus', ['as' => 'man_create_new_cus', 'uses' => 'ManagerController@manAddNewCustomer']);
    Route::post('man_add_booking', ['as' => 'man_add_booking', 'uses' => 'ManagerController@manAddBooking']);
    Route::post('man_add_booking_id', ['as' => 'man_add_booking_id', 'uses' => 'ManagerController@manAddBookingId']);
    Route::post('man_add_meals_order_p', ['as' => 'man_add_meals_order_p', 'uses' => 'ManagerController@manAddMealsOrderP']);
    Route::post('man_add_booking_id_a', ['as' => 'man_add_booking_id_a', 'uses' => 'ManagerController@manAddBookingIdA']);
    Route::post('man_add_air_booking_p', ['as' => 'man_add_air_booking_p', 'uses' => 'ManagerController@manAirPortBookingP']);
    Route::post('man_edit_air_booking_p', ['as' => 'man_edit_air_booking_p', 'uses' => 'ManagerController@manEditAirPortBookingP']);
    Route::post('man_search_booking_p', ['as' => 'man_booking_rooms_p', 'uses' => 'ManagerController@manBookingSearchP']);
    Route::post('man_add_payment', ['as' => 'man_add_payment', 'uses' => 'ManagerController@manAddPayment']);
    Route::post('man_add_customer', ['as' => 'man_add_customer', 'uses' => 'ManagerController@manAddCustomer']);
    Route::post('man_update_customer', ['as' => 'man_update_customer', 'uses' => 'ManagerController@manUpdateCustomer']);
    Route::post('man_checkout_dateP', ['as' => 'man_checkout_dateP', 'uses' => 'ManagerController@manCheckOutDateSearchP']);
    Route::post('man_paid_dateP', ['as' => 'man_paid_dateP', 'uses' => 'ManagerController@manPaidSearchP']);
    Route::post('man_checkout_durationP', ['as' => 'man_checkout_durationP', 'uses' => 'ManagerController@manCheckOutDurationSearchP']);
    Route::post('man_paid_durationP', ['as' => 'man_paid_durationP', 'uses' => 'ManagerController@manPaidDurationSearchP']);
    Route::post('man_final_check_durationP', ['as' => 'man_final_check_out_durationP', 'uses' => 'ManagerController@manFinalCheckDurationSearchP']);
    Route::post('man_update_meals_order_p', ['as' => 'man_update_meals_order_p', 'uses' => 'ManagerController@manUpdateMealsOrderP']);
    Route::post('man_order_dateP', ['as' => 'man_order_dateP', 'uses' => 'ManagerController@manOrderDateSearchP']);
    Route::post('man_order_durationP', ['as' => 'man_order_durationP', 'uses' => 'ManagerController@manOrderDurationSearchP']);
    Route::post('man_remove_meals_order_appP', ['as' => 'man_remove_meals_order_appP', 'uses' => 'ManagerController@manRemoveMealsAppP']);
    Route::post('man_edit_meals_order_appP', ['as' => 'man_edit_meals_order_appP', 'uses' => 'ManagerController@manEditMealsAppP']);
    Route::post('man_remove_air_book_appP', ['as' => 'man_remove_air_book_appP', 'uses' => 'ManagerController@manRemoveAirBookAppP']);
    Route::post('man_edit_air_book_appP', ['as' => 'man_edit_air_book_appP', 'uses' => 'ManagerController@manEditAirBookAppP']);
    Route::post('man_cancel_booking_appP', ['as' => 'man_cancel_booking_appP', 'uses' => 'ManagerController@manCancelBookingAppP']);
    Route::post('man_edit_booking_appP', ['as' => 'man_edit_booking_appP', 'uses' => 'ManagerController@manEditBookingAppP']);
    Route::post('man_bill_print_appP', ['as' => 'man_bill_print_appP', 'uses' => 'ManagerController@manBillPrintsAppP']);
    Route::post('man_pay_remove_appP', ['as' => 'man_pay_remove_appP', 'uses' => 'ManagerController@manPayRemoveAppP']);
    Route::post('man_edt_duration_avaP', ['as' => 'man_edt_duration_avaP', 'uses' => 'ManagerController@manEditDurationAvaP']);
    Route::post('man_edt_bookingP', ['as' => 'man_edt_bookingP', 'uses' => 'ManagerController@manEditBooking']);
    Route::post('man_add_meals_p', ['as' => 'man_add_meals_p', 'uses' => 'ManagerController@manAddMealsP']);
    Route::post('man_add_room', ['as' => 'man_add_room', 'uses' => 'ManagerController@manAddRooms']);
    Route::post('man_report_check_out_durationP', ['as' => 'man_report_check_out_durationP', 'uses' => 'ManagerController@manReportCheckDurationSearchP']);
    Route::post('man_report_current_booking_durationP', ['as' => 'man_report_current_booking_durationP', 'uses' => 'ManagerController@manReportCurrentBookingDurationSearchP']);
    Route::post('man_air_check_durationP', ['as' => 'man_air_check_durationP', 'uses' => 'ManagerController@manAirCheckDurationSearchP']);
    Route::post('man_order_check_durationP', ['as' => 'man_order_check_durationP', 'uses' => 'ManagerController@manOrderCheckDurationSearchP']);
    Route::post('man_search_check_booking_p', ['as' => 'man_search_check_booking_p', 'uses' => 'ManagerController@manCheckBookingSearchP']);
    Route::post('create_receptionist_post', ['as' => 'create_receptionist_post', 'uses' => 'ManagerController@createReceptionist']);
    Route::post('update_receptionist', ['as' => 'update_receptionist', 'uses' => 'ManagerController@updateReceptionist']);
    Route::post('man_report_check_rooms_durationP', ['as' => 'man_report_check_rooms_durationP', 'uses' => 'ManagerController@manReportCheckRoomsDurationSearchP']);
    Route::post('man_edit_mealsP', ['as' => 'man_edit_mealsP', 'uses' => 'ManagerController@manEditMealsP']);
    Route::post('man_edit_roomP', ['as' => 'man_edit_roomP', 'uses' => 'ManagerController@manEditRoomsP']);
    Route::post('man_bulk_temp_bookP', ['as' => 'man_bulk_temp_bookP', 'uses' => 'ManagerController@manBulkTempBooking']);
    Route::post('man_add_booking_bulkP', ['as' => 'man_add_booking_bulkP', 'uses' => 'ManagerController@manAddBulkBookingP']);
    Route::post('man_create_new_bulk_cus', ['as' => 'man_create_new_bulk_cus', 'uses' => 'ManagerController@manAddNewBulkCustomer']);
    Route::post('man_summary_search_p', ['as' => 'man_summary_search_p', 'uses' => 'ManagerController@manSummarySearchP']);
    Route::post('man_search_rooms_bulk_map_p', ['as' => 'man_search_rooms_bulk_map_p', 'uses' => 'ManagerController@manAvailableRoomsSearchBulkMap']);


});


Route::group(array('prefix' => 'super_admin'), function () {
    Route::get('admin_home', ['as' => 'admin_home', 'uses' => 'SuperAdminController@indexHome']);
    Route::get('admin_available_rooms_index', ['as' => 'admin_available_rooms_index', 'uses' => 'SuperAdminController@availableRoomsIndex']);
    Route::get('admin_room_search', ['as' => 'admin_room_search', 'uses' => 'SuperAdminController@adminRoomSearch']);
    Route::get('admin_room_search_map', ['as' => 'admin_room_search_map', 'uses' => 'SuperAdminController@adminRoomSearchMap']);
    Route::get('admin_cancellation_success', ['as' => 'admin_cancellation_success', 'uses' => 'SuperAdminController@adminCancellationSuccess']);
    Route::get('admin_cancellation_map_success', ['as' => 'admin_cancellation_map_success', 'uses' => 'SuperAdminController@adminCancellationSuccessMap']);
    Route::get('admin_create_new_customer', ['as' => 'admin_create_new_customer', 'uses' => 'SuperAdminController@adminCreateNewCustomer']);
    Route::get('admin_create_cus_success', ['as' => 'admin_create_cus_success', 'uses' => 'SuperAdminController@adminCreateCustomerSuccess']);
    Route::get('admin_success_booking', ['as' => 'admin_success_booking', 'uses' => 'SuperAdminController@adminSuccessBooking']);
    Route::get('admin_index_booking_list', ['as' => 'admin_index_booking_list', 'uses' => 'SuperAdminController@adminBookingList']);
    Route::get('admin_edit_booking_list', ['as' => 'admin_edit_booking_list', 'uses' => 'SuperAdminController@adminEditBookingList']);
    Route::get('admin_index_order_meals', ['as' => 'admin_index_order_meals', 'uses' => 'SuperAdminController@adminIndexOrderMeals']);
    Route::get('admin_index_order_meals1', ['as' => 'admin_index_order_meals1', 'uses' => 'SuperAdminController@adminIndexOrderMeals1']);
    Route::get('admin_index_order_list', ['as' => 'admin_index_order_list', 'uses' => 'SuperAdminController@adminIndexOrderList']);
    Route::get('admin_index_airport_booking', ['as' => 'admin_index_airport_booking', 'uses' => 'SuperAdminController@adminIndexAdminAirPortBooking']);
    Route::get('admin_airport_booking_success', ['as' => 'admin_airport_booking_success', 'uses' => 'SuperAdminController@adminAirportBookingSuccess']);
    Route::get('admin_index_airport_booking_list', ['as' => 'admin_index_airport_booking_list', 'uses' => 'SuperAdminController@adminIndexAirportBookingList']);
    Route::get('admin_index_all_booking_list', ['as' => 'admin_index_all_booking_list', 'uses' => 'SuperAdminController@adminAllBookingList']);
    Route::get('admin_booking_search', ['as' => 'admin_booking_search', 'uses' => 'SuperAdminController@adminBookingSearch']);
    Route::get('admin_index_check_out_payment', ['as' => 'admin_index_check_out_payment', 'uses' => 'SuperAdminController@adminIndexPaymentCheckOut']);
    Route::get('admin_index_paid_payment', ['as' => 'admin_index_paid_payment', 'uses' => 'SuperAdminController@adminIndexPaidPayment']);
    Route::get('admin_remove_booking_success', ['as' => 'admin_remove_booking_success', 'uses' => 'SuperAdminController@adminRemoveBookingSuccess']);
    Route::get('admin_add_payment_success', ['as' => 'admin_add_payment_success', 'uses' => 'SuperAdminController@adminAddPaymentSuccess']);
    Route::get('admin_add_payment_success1', ['as' => 'admin_add_payment_success1', 'uses' => 'SuperAdminController@adminAddPaymentSuccess1']);
    Route::get('admin_stop_booking_process', ['as' => 'admin_stop_booking_process', 'uses' => 'SuperAdminController@adminBookingStopProcess']);
    Route::get('admin_index_add_customer', ['as' => 'admin_index_add_customer', 'uses' => 'SuperAdminController@adminIndexAddCustomer']);
    Route::get('admin_add_cus_success', ['as' => 'admin_add_cus_success', 'uses' => 'SuperAdminController@adminAddCustomerSuccess']);
    Route::get('admin_add_cus_failure', ['as' => 'admin_add_cus_failure', 'uses' => 'SuperAdminController@adminAddCustomerFailure']);
    Route::get('admin_cus_list', ['as' => 'admin_cus_list', 'uses' => 'SuperAdminController@adminIndexCusList']);
    Route::get('admin_update_cus_success', ['as' => 'admin_update_cus_success', 'uses' => 'SuperAdminController@adminUpdateCustomerSuccess']);
    Route::get('admin_update_cus_failure', ['as' => 'admin_update_cus_failure', 'uses' => 'SuperAdminController@adminUpdateCustomerFailure']);
    Route::get('admin_remove_cus_success', ['as' => 'admin_remove_cus_success', 'uses' => 'SuperAdminController@adminRemoveCusSuccess']);
    Route::get('admin_create_cus_failure', ['as' => 'admin_create_cus_failure', 'uses' => 'SuperAdminController@adminCreateCustomerFailure']);
    Route::get('admin_check_out_search_date', ['as' => 'admin_check_out_search_date', 'uses' => 'SuperAdminController@adminCheckOutDataSearch']);
    Route::get('admin_paid_search_date', ['as' => 'admin_paid_search_date', 'uses' => 'SuperAdminController@adminPaidDataSearch']);
    Route::get('admin_check_out_search_duration', ['as' => 'admin_check_out_search_duration', 'uses' => 'SuperAdminController@adminCheckOutDurationSearch']);
    Route::get('admin_paid_search_duration', ['as' => 'admin_paid_search_duration', 'uses' => 'SuperAdminController@adminPaidDurationSearch']);
    Route::get('admin_final_check_search_duration', ['as' => 'admin_final_check_search_duration', 'uses' => 'SuperAdminController@adminFinalCheckDurationSearch']);
    Route::get('admin_order_remove_success', ['as' => 'admin_order_remove_success', 'uses' => 'SuperAdminController@adminOrderRemoveSuccess']);
    Route::get('admin_air_booking_remove_success', ['as' => 'admin_air_booking_remove_success', 'uses' => 'SuperAdminController@adminAirBookingRemoveSuccess']);
    Route::get('admin_order_update_success', ['as' => 'admin_order_update_success', 'uses' => 'SuperAdminController@adminOrderUpdateSuccess']);
    Route::get('admin_cus_booking_history', ['as' => 'admin_cus_booking_history', 'uses' => 'SuperAdminController@adminCusBookingHistory']);
    Route::get('admin_order_search_date', ['as' => 'admin_order_search_date', 'uses' => 'SuperAdminController@adminOrderDataSearch']);
    Route::get('admin_order_search_duration', ['as' => 'admin_order_search_duration', 'uses' => 'SuperAdminController@adminOrderDurationSearch']);
    Route::get('admin_order_remove_app_submit', ['as' => 'admin_order_remove_app_submit', 'uses' => 'SuperAdminController@adminRemoveAppSubmit']);
    Route::get('admin_order_edit_app_submit', ['as' => 'admin_order_edit_app_submit', 'uses' => 'SuperAdminController@adminEditAppSubmit']);
    Route::get('admin_air_booking_rem_app_submit', ['as' => 'admin_air_booking_rem_app_submit', 'uses' => 'SuperAdminController@adminAirBookRemAppSubmit']);
    Route::get('admin_edit_air_book_app_submit', ['as' => 'admin_edit_air_book_app_submit', 'uses' => 'SuperAdminController@adminEditAirBookAppSubmit']);
    Route::get('admin_cancel_book_app_submit', ['as' => 'admin_cancel_book_app_submit', 'uses' => 'SuperAdminController@adminCancelBookAppSubmit']);
    Route::get('admin_edit_book_app_submit', ['as' => 'admin_edit_book_app_submit', 'uses' => 'SuperAdminController@adminEditBookAppSubmit']);
    Route::get('admin_bill_print_app_submit', ['as' => 'admin_bill_print_app_submit', 'uses' => 'SuperAdminController@adminBillPrintAppSubmit']);
    Route::get('admin_pay_history_app_submit', ['as' => 'admin_pay_history_app_submit', 'uses' => 'SuperAdminController@adminPayHistoryAppSubmit']);
    Route::get('admin_edit_avail_search', ['as' => 'admin_edit_avail_search', 'uses' => 'SuperAdminController@adminEditAvailableSearch']);
    Route::get('admin_pay_history_success', ['as' => 'admin_pay_history_success', 'uses' => 'SuperAdminController@adminRemovePaySuccess']);
    Route::get('admin_check_map', ['as' => 'admin_check_map', 'uses' => 'SuperAdminController@adminCheckMap']);
    Route::get('admin_check_out_info', ['as' => 'admin_check_out_info', 'uses' => 'SuperAdminController@adminCheckOutInfo']);
    Route::get('admin_check_out_success', ['as' => 'admin_check_out_success', 'uses' => 'SuperAdminController@adminCheckOutSuccess']);
    Route::get('admin_rep_check_out', ['as' => 'admin_rep_check_out', 'uses' => 'SuperAdminController@adminReportCheckOut']);
    Route::get('admin_rep_check_bill', ['as' => 'admin_rep_check_bill', 'uses' => 'SuperAdminController@adminBillCheckOut']);
    Route::get('admin_rep_check_room_bill', ['as' => 'admin_rep_check_room_bill', 'uses' => 'SuperAdminController@adminCheckOutRooms']);
    Route::get('admin_rep_check_bill_duration', ['as' => 'admin_rep_check_bill_duration', 'uses' => 'SuperAdminController@adminBillCheckOutDuration']);
    Route::get('admin_report_check_search_duration', ['as' => 'admin_report_check_search_duration', 'uses' => 'SuperAdminController@adminReportCheckDurationSearch']);
    Route::get('admin_report_current_booking_search_duration', ['as' => 'admin_report_current_booking_search_duration', 'uses' => 'SuperAdminController@adminReportCurrentBookingDurationSearch']);
    Route::get('admin_index_check_booking_list', ['as' => 'admin_index_check_booking_list', 'uses' => 'SuperAdminController@adminCheckBookingList']);
    Route::get('admin_index_check_order_list', ['as' => 'admin_index_check_order_list', 'uses' => 'SuperAdminController@adminIndexCheckOrderList']);
    Route::get('admin_index_check_airport_booking_list', ['as' => 'admin_index_check_airport_booking_list', 'uses' => 'SuperAdminController@adminIndexAirportCheckBookingList']);
    Route::get('admin_air_check_search_duration', ['as' => 'admin_air_check_search_duration', 'uses' => 'SuperAdminController@adminAirCheckDurationSearch']);
    Route::get('admin_order_check_search_duration', ['as' => 'admin_order_check_search_duration', 'uses' => 'SuperAdminController@adminOrderCheckDurationSearch']);
    Route::get('admin_check_booking_search', ['as' => 'admin_check_booking_search', 'uses' => 'SuperAdminController@adminCheckBookingSearch']);
    Route::get('admin_rep_current_booking', ['as' => 'admin_rep_current_booking', 'uses' => 'SuperAdminController@adminReportCurrentBooking']);
    Route::get('admin_rep_current_booking_bill', ['as' => 'admin_rep_current_booking_bill', 'uses' => 'SuperAdminController@adminBillCurrentBooking']);
    Route::get('admin_rep_current_booking_bill_duration', ['as' => 'admin_rep_current_booking_bill_duration', 'uses' => 'SuperAdminController@adminBillCurrentBookingDuration']);
    Route::get('admin_rep_check_room_booking_bill_duration', ['as' => 'admin_rep_check_room_booking_bill_duration', 'uses' => 'SuperAdminController@adminBillCheckRoomBookingDuration']);
    Route::get('admin_rep_check_rooms', ['as' => 'admin_rep_check_rooms', 'uses' => 'SuperAdminController@adminReportCheckRooms']);
    Route::get('admin_report_check_rooms_search_duration', ['as' => 'admin_report_check_rooms_search_duration', 'uses' => 'SuperAdminController@adminReportCheckRoomsDurationSearch']);
    Route::get('admin_index_add_user', ['as' => 'admin_index_add_user', 'uses' => 'SuperAdminController@adminIndexAddUser']);
    Route::get('admin_check_map_bulk', ['as' => 'admin_check_map_bulk', 'uses' => 'SuperAdminController@adminCheckMapBulk']);
    Route::get('admin_room_search_bulk_map', ['as' => 'admin_room_search_bulk_map', 'uses' => 'SuperAdminController@adminRoomSearchBulkMap']);
    Route::get('admin_bulk_booking_details', ['as' => 'admin_bulk_booking_details', 'uses' => 'SuperAdminController@adminBulkBookingDetails']);
    Route::get('admin_success_bulk_booking', ['as' => 'admin_success_bulk_booking', 'uses' => 'SuperAdminController@adminSuccessBulkBooking']);
    Route::get('admin_create_cus_bulk_success', ['as' => 'admin_create_cus_bulk_success', 'uses' => 'SuperAdminController@adminCreateCustomerBulkSuccess']);
    Route::get('admin_create_cus_bulk_failure', ['as' => 'admin_create_cus_bulk_failure', 'uses' => 'SuperAdminController@adminCreateCustomerBulkFailure']);
    Route::get('admin_cancellation_bulk_map_success', ['as' => 'admin_cancellation_bulk_map_success', 'uses' => 'SuperAdminController@adminCancellationSuccessMapBulk']);

//    Route::get('add_receptionist', ['as' => 'add_receptionist', 'uses' => 'SuperAdminController@addReceptionist']);
//    Route::get('receptionist_list', ['as' => 'receptionist_list', 'uses' => 'SuperAdminController@indexViewReceptionist']);
//    Route::get('create_res_success', ['as' => 'create_res_success', 'uses' => 'SuperAdminController@createReceptionistSuccess']);
//    Route::get('create_res_failure', ['as' => 'create_res_failure', 'uses' => 'SuperAdminController@createReceptionistFailure']);
//    Route::get('update_receptionist_success', ['as' => 'update_receptionist_success', 'uses' => 'SuperAdminController@updateReceptionistSuccess']);
//    Route::get('update_receptionist_failure', ['as' => 'update_receptionist_failure', 'uses' => 'SuperAdminController@updateReceptionistFailure']);

    Route::get('admin_meals_order_app', ['as' => 'admin_meals_order_app', 'uses' => 'SuperAdminController@adminMealsApp']);
    Route::get('admin_order_edit_app', ['as' => 'admin_order_edit_app', 'uses' => 'SuperAdminController@adminOrderEditApp']);
    Route::get('admin_order_remove_app', ['as' => 'admin_order_remove_app', 'uses' => 'SuperAdminController@adminOrderRemoveApp']);
    Route::get('admin_bill_app', ['as' => 'admin_bill_app', 'uses' => 'SuperAdminController@adminBillApp']);
    Route::get('admin_book_cancel_app', ['as' => 'admin_book_cancel_app', 'uses' => 'SuperAdminController@adminBookCancelApp']);
    Route::get('admin_book_edit_app', ['as' => 'admin_book_edit_app', 'uses' => 'SuperAdminController@adminBookEditApp']);
    Route::get('admin_air_book_edit_app', ['as' => 'admin_air_book_edit_app', 'uses' => 'SuperAdminController@adminAirBookEditApp']);
    Route::get('admin_air_book_remove_app', ['as' => 'admin_air_book_remove_app', 'uses' => 'SuperAdminController@adminAirBookRemoveApp']);
    Route::get('admin_pay_remove_app', ['as' => 'admin_pay_remove_app', 'uses' => 'SuperAdminController@adminPayRemoveApp']);
    Route::get('admin_reject_app', ['as' => 'admin_reject_app', 'uses' => 'SuperAdminController@adminRejectApp']);

    Route::get('admin_index_add_room', ['as' => 'admin_index_add_room', 'uses' => 'SuperAdminController@adminIndexAddRoom']);
    Route::get('admin_add_room_success', ['as' => 'admin_add_room_success', 'uses' => 'SuperAdminController@adminAddRoomSuccess']);
    Route::get('admin_add_room_failure', ['as' => 'admin_add_room_failure', 'uses' => 'SuperAdminController@adminAddRoomFailure']);
    Route::get('admin_edit_room_success', ['as' => 'admin_edit_room_success', 'uses' => 'SuperAdminController@adminEditRoomSuccess']);
    Route::get('admin_edit_room_failure', ['as' => 'admin_edit_room_failure', 'uses' => 'SuperAdminController@adminEditRoomFailure']);
    Route::get('admin_room_list', ['as' => 'admin_room_list', 'uses' => 'SuperAdminController@adminIndexRoomList']);
    Route::get('admin_add_meals', ['as' => 'admin_add_meals', 'uses' => 'SuperAdminController@adminAddMeals']);
    Route::get('admin_add_meals_successfully', ['as' => 'admin_add_meals_successfully', 'uses' => 'SuperAdminController@adminAddMealsSuccess']);
    Route::get('admin_meals_list', ['as' => 'admin_meals_list', 'uses' => 'SuperAdminController@adminMealsList']);
    Route::get('admin_remove_invoice_success', ['as' => 'admin_remove_invoice_success', 'uses' => 'SuperAdminController@adminRemoveInvoiceSuccess']);
    Route::get('create_user_success', ['as' => 'create_user_success', 'uses' => 'SuperAdminController@createUserSuccess']);
    Route::get('create_user_failure', ['as' => 'create_user_failure', 'uses' => 'SuperAdminController@createUserFailure']);
    Route::get('index_user_list', ['as' => 'index_user_list', 'uses' => 'SuperAdminController@indexUserList']);
    Route::get('update_user_failure', ['as' => 'update_user_failure', 'uses' => 'SuperAdminController@updateUserFailure']);
    Route::get('update_user_success', ['as' => 'update_user_success', 'uses' => 'SuperAdminController@updateUserSuccess']);
    Route::get('remove_user_success', ['as' => 'remove_user_success', 'uses' => 'SuperAdminController@removeUserSuccess']);
    Route::get('admin_remove_meals_success', ['as' => 'admin_remove_meals_success', 'uses' => 'SuperAdminController@removeMealsSuccess']);
    Route::get('admin_edit_meals_success', ['as' => 'admin_edit_meals_success', 'uses' => 'SuperAdminController@adminEditMealsSuccess']);
    Route::get('admin_remove_room_success', ['as' => 'admin_remove_room_success', 'uses' => 'SuperAdminController@removeRoomSuccess']);
    Route::get('admin_create_new_bulk_customer', ['as' => 'admin_create_new_bulk_customer', 'uses' => 'SuperAdminController@adminCreateNewBulkCustomer']);
    Route::get('admin_day_summary', ['as' => 'admin_day_summary', 'uses' => 'SuperAdminController@adminSummaryDetails']);
    Route::get('admin_summary_search', ['as' => 'admin_summary_search', 'uses' => 'SuperAdminController@adminSummarySearch']);

    Route::get('admin_air_detail/{id}', array('as' => 'admin_air_detail', 'uses' => 'SuperAdminController@adminAirportBookingDetails'));
    Route::get('admin_order_detail/{id}', array('as' => 'admin_order_detail', 'uses' => 'SuperAdminController@adminOrderDetails'));
    Route::get('admin_booking_detail/{id}', array('as' => 'admin_booking_detail', 'uses' => 'SuperAdminController@adminBookingDetails'));
    Route::get('admin_bill_payment/{id}', array('as' => 'admin_bill_payment', 'uses' => 'SuperAdminController@adminBillPayment'));
    Route::get('admin_payment_preview/{id}', array('as' => 'admin_payment_preview', 'uses' => 'SuperAdminController@adminIndexPaymentPreview'));
    Route::get('admin_print_bill/{id}', array('as' => 'admin_print_bill', 'uses' => 'SuperAdminController@adminPrintBill'));
    Route::get('admin_index_booking_info/{id}', array('as' => 'admin_index_booking_info', 'uses' => 'SuperAdminController@adminIndexBookingInfo'));
    Route::get('admin_edit_booking_info/{id}', array('as' => 'admin_edit_booking_info', 'uses' => 'SuperAdminController@adminEditBookingInfo'));
    Route::get('admin_con_booking_info/{id}/{from}/{to}', array('as' => 'admin_con_booking_info', 'uses' => 'SuperAdminController@adminConBookingInfo'));
    Route::get('admin_cancel_booking/{id}', array('as' => 'admin_cancel_booking', 'uses' => 'SuperAdminController@adminBookingCancel'));
    Route::get('admin_cancel_booking_map/{id}', array('as' => 'admin_cancel_booking_map', 'uses' => 'SuperAdminController@adminBookingCancelMap'));
    Route::get('admin_re_meals_booking/{id}', array('as' => 'admin_re_meals_booking', 'uses' => 'SuperAdminController@adminReMealsBooking'));
    Route::get('admin_re_air_booking/{id}', array('as' => 'admin_re_air_booking', 'uses' => 'SuperAdminController@adminReAirBooking'));
    Route::get('admin_re_room_booking/{id}', array('as' => 'admin_re_room_booking', 'uses' => 'SuperAdminController@adminReRoomBooking'));
    Route::get('admin_remove_booking/{id}', array('as' => 'admin_remove_booking', 'uses' => 'SuperAdminController@adminRemoveBooking'));
    Route::get('admin_stop_process/{id}', array('as' => 'admin_stop_process', 'uses' => 'SuperAdminController@adminStopProcess'));
    Route::get('admin_index_cus_edit/{id}', array('as' => 'admin_index_cus_edit', 'uses' => 'SuperAdminController@adminIndexUpdateCustomer'));
    Route::get('admin_remove_customer/{id}', array('as' => 'admin_remove_customer', 'uses' => 'SuperAdminController@indexadminRemoveCustomer'));
    Route::get('admin_pay_check/{id}', array('as' => 'admin_pay_check', 'uses' => 'SuperAdminController@adminPaymentCheckOut'));
    Route::get('admin_remove_order/{id}', array('as' => 'admin_remove_order', 'uses' => 'SuperAdminController@adminRemoveOrder'));
    Route::get('admin_remove_air_booking/{id}', array('as' => 'admin_remove_air_booking', 'uses' => 'SuperAdminController@adminRemoveAirBooking'));
    Route::get('admin_payment_history_r/{id}', array('as' => 'admin_payment_history_r', 'uses' => 'SuperAdminController@adminPayHistoryR'));
    Route::get('admin_edit_air_booking/{id}', array('as' => 'admin_edit_air_booking', 'uses' => 'SuperAdminController@adminEditAirBooking'));
    Route::get('admin_remove_pay_history/{id}', array('as' => 'admin_remove_pay_history', 'uses' => 'SuperAdminController@adminRemovePayHistory'));
    Route::get('admin_add_check_out/{id}', array('as' => 'admin_add_check_out', 'uses' => 'SuperAdminController@adminAddCheckOut'));
    Route::get('admin_remove_approvals/{id}', array('as' => 'admin_remove_approvals', 'uses' => 'SuperAdminController@adminRemoveApprovalsR'));
    Route::get('admin_remove_invoice/{id}', array('as' => 'admin_remove_invoice', 'uses' => 'SuperAdminController@adminRemoveInvoiceR'));
    Route::get('index_update_user/{id}', array('as' => 'index_update_user', 'uses' => 'SuperAdminController@indexUpdateUser'));
    Route::get('remove_user/{id}', array('as' => 'remove_user', 'uses' => 'SuperAdminController@indexRemoveUser'));
    Route::get('admin_remove_meals_r/{id}', array('as' => 'admin_remove_meals_r', 'uses' => 'SuperAdminController@adminRemoveMealsR'));
    Route::get('admin_edit_meals_r/{id}', array('as' => 'admin_edit_meals_r', 'uses' => 'SuperAdminController@adminEditMealsR'));

    Route::get('admin_order_edit_app_r/{id}', array('as' => 'admin_order_edit_app_r', 'uses' => 'SuperAdminController@adminOrderEditAppR'));
    Route::get('admin_order_remove_app_r/{id}', array('as' => 'admin_order_remove_app_r', 'uses' => 'SuperAdminController@adminOrderRemoveAppR'));
    Route::get('admin_bill_print_app_r/{id}', array('as' => 'admin_bill_print_app_r', 'uses' => 'SuperAdminController@adminBillPrintAppR'));
    Route::get('admin_book_cancel_app_r/{id}', array('as' => 'admin_book_cancel_app_r', 'uses' => 'SuperAdminController@adminBookCancelAppR'));
    Route::get('admin_book_edit_app_r/{id}', array('as' => 'admin_book_edit_app_r', 'uses' => 'SuperAdminController@adminBookEditAppR'));
    Route::get('admin_air_book_edit_app_r/{id}', array('as' => 'admin_air_book_edit_app_r', 'uses' => 'SuperAdminController@adminAirBookEditAppR'));
    Route::get('admin_air_book_remove_app_r/{id}', array('as' => 'admin_air_book_remove_app_r', 'uses' => 'SuperAdminController@adminAirBookRemoveAppR'));
    Route::get('admin_pay_remove_app_r/{id}', array('as' => 'admin_pay_remove_app_r', 'uses' => 'SuperAdminController@adminPayRemoveAppR'));
    Route::get('admin_direct_to_booking_list/{id}', array('as' => 'admin_direct_to_booking_list', 'uses' => 'SuperAdminController@adminBookingListFromFront'));
    Route::get('admin_remove_room_r/{id}', array('as' => 'admin_remove_room_r', 'uses' => 'SuperAdminController@adminRemoveRoom'));
    Route::get('admin_edit_room_r/{id}', array('as' => 'admin_edit_room_r', 'uses' => 'SuperAdminController@adminEditRoom'));
    Route::get('admin_cancel_booking_map_bulk/{id}', array('as' => 'admin_cancel_booking_map_bulk', 'uses' => 'SuperAdminController@adminBookingCancelMapBulk'));
//    Route::get('index_update_receptionist/{id}', array('as' => 'index_update_receptionist', 'uses' => 'SuperAdminController@indexUpdateReceptionist'));


    Route::post('admin_search_rooms_p', ['as' => 'admin_search_rooms_p', 'uses' => 'SuperAdminController@adminAvailableRoomsSearch']);
    Route::post('admin_search_rooms_map_p', ['as' => 'admin_search_rooms_map_p', 'uses' => 'SuperAdminController@adminAvailableRoomsSearchMap']);
    Route::post('admin_create_new_cus', ['as' => 'admin_create_new_cus', 'uses' => 'SuperAdminController@adminAddNewCustomer']);
    Route::post('admin_add_booking', ['as' => 'admin_add_booking', 'uses' => 'SuperAdminController@adminAddBooking']);
    Route::post('admin_add_booking_id', ['as' => 'admin_add_booking_id', 'uses' => 'SuperAdminController@adminAddBookingId']);
    Route::post('admin_add_meals_order_p', ['as' => 'admin_add_meals_order_p', 'uses' => 'SuperAdminController@adminAddMealsOrderP']);
    Route::post('admin_add_booking_id_a', ['as' => 'admin_add_booking_id_a', 'uses' => 'SuperAdminController@adminAddBookingIdA']);
    Route::post('admin_add_air_booking_p', ['as' => 'admin_add_air_booking_p', 'uses' => 'SuperAdminController@adminAirPortBookingP']);
    Route::post('admin_edit_air_booking_p', ['as' => 'admin_edit_air_booking_p', 'uses' => 'SuperAdminController@adminEditAirPortBookingP']);
    Route::post('admin_search_booking_p', ['as' => 'admin_booking_rooms_p', 'uses' => 'SuperAdminController@adminBookingSearchP']);
    Route::post('admin_add_payment', ['as' => 'admin_add_payment', 'uses' => 'SuperAdminController@adminAddPayment']);
    Route::post('admin_add_customer', ['as' => 'admin_add_customer', 'uses' => 'SuperAdminController@adminAddCustomer']);
    Route::post('admin_update_customer', ['as' => 'admin_update_customer', 'uses' => 'SuperAdminController@adminUpdateCustomer']);
    Route::post('admin_checkout_dateP', ['as' => 'admin_checkout_dateP', 'uses' => 'SuperAdminController@adminCheckOutDateSearchP']);
    Route::post('admin_paid_dateP', ['as' => 'admin_paid_dateP', 'uses' => 'SuperAdminController@adminPaidSearchP']);
    Route::post('admin_checkout_durationP', ['as' => 'admin_checkout_durationP', 'uses' => 'SuperAdminController@adminCheckOutDurationSearchP']);
    Route::post('admin_paid_durationP', ['as' => 'admin_paid_durationP', 'uses' => 'SuperAdminController@adminPaidDurationSearchP']);
    Route::post('admin_final_check_durationP', ['as' => 'admin_final_check_out_durationP', 'uses' => 'SuperAdminController@adminFinalCheckDurationSearchP']);
    Route::post('admin_update_meals_order_p', ['as' => 'admin_update_meals_order_p', 'uses' => 'SuperAdminController@adminUpdateMealsOrderP']);
    Route::post('admin_order_dateP', ['as' => 'admin_order_dateP', 'uses' => 'SuperAdminController@adminOrderDateSearchP']);
    Route::post('admin_order_durationP', ['as' => 'admin_order_durationP', 'uses' => 'SuperAdminController@adminOrderDurationSearchP']);
    Route::post('admin_remove_meals_order_appP', ['as' => 'admin_remove_meals_order_appP', 'uses' => 'SuperAdminController@adminRemoveMealsAppP']);
    Route::post('admin_edit_meals_order_appP', ['as' => 'admin_edit_meals_order_appP', 'uses' => 'SuperAdminController@adminEditMealsAppP']);
    Route::post('admin_remove_air_book_appP', ['as' => 'admin_remove_air_book_appP', 'uses' => 'SuperAdminController@adminRemoveAirBookAppP']);
    Route::post('admin_edit_air_book_appP', ['as' => 'admin_edit_air_book_appP', 'uses' => 'SuperAdminController@adminEditAirBookAppP']);
    Route::post('admin_cancel_booking_appP', ['as' => 'admin_cancel_booking_appP', 'uses' => 'SuperAdminController@adminCancelBookingAppP']);
    Route::post('admin_edit_booking_appP', ['as' => 'admin_edit_booking_appP', 'uses' => 'SuperAdminController@adminEditBookingAppP']);
    Route::post('admin_bill_print_appP', ['as' => 'admin_bill_print_appP', 'uses' => 'SuperAdminController@adminBillPrintsAppP']);
    Route::post('admin_pay_remove_appP', ['as' => 'admin_pay_remove_appP', 'uses' => 'SuperAdminController@adminPayRemoveAppP']);
    Route::post('admin_edt_duration_avaP', ['as' => 'admin_edt_duration_avaP', 'uses' => 'SuperAdminController@adminEditDurationAvaP']);
    Route::post('admin_edt_bookingP', ['as' => 'admin_edt_bookingP', 'uses' => 'SuperAdminController@adminEditBooking']);
    Route::post('admin_add_meals_p', ['as' => 'admin_add_meals_p', 'uses' => 'SuperAdminController@adminAddMealsP']);
    Route::post('admin_add_room', ['as' => 'admin_add_room', 'uses' => 'SuperAdminController@adminAddRooms']);
    Route::post('admin_edit_roomP', ['as' => 'admin_edit_roomP', 'uses' => 'SuperAdminController@adminEditRoomsP']);

    Route::post('admin_report_check_out_durationP', ['as' => 'admin_report_check_out_durationP', 'uses' => 'SuperAdminController@adminReportCheckDurationSearchP']);
    Route::post('admin_report_current_booking_durationP', ['as' => 'admin_report_current_booking_durationP', 'uses' => 'SuperAdminController@adminReportCurrentBookingDurationSearchP']);
    Route::post('admin_air_check_durationP', ['as' => 'admin_air_check_durationP', 'uses' => 'SuperAdminController@adminAirCheckDurationSearchP']);
    Route::post('admin_order_check_durationP', ['as' => 'admin_order_check_durationP', 'uses' => 'SuperAdminController@adminOrderCheckDurationSearchP']);
    Route::post('admin_search_check_booking_p', ['as' => 'admin_search_check_booking_p', 'uses' => 'SuperAdminController@adminCheckBookingSearchP']);
//    Route::post('create_receptionist_post', ['as' => 'create_receptionist_post', 'uses' => 'SuperAdminController@createReceptionist']);
//    Route::post('update_receptionist', ['as' => 'update_receptionist', 'uses' => 'SuperAdminController@updateReceptionist']);
    Route::post('admin_report_check_rooms_durationP', ['as' => 'admin_report_check_rooms_durationP', 'uses' => 'SuperAdminController@adminReportCheckRoomsDurationSearchP']);
    Route::post('admin_add_user', ['as' => 'admin_add_user', 'uses' => 'SuperAdminController@adminAddUser']);
    Route::post('admin_update_user', ['as' => 'admin_update_user', 'uses' => 'SuperAdminController@adminUpdateUser']);
    Route::post('admin_edit_mealsP', ['as' => 'admin_edit_mealsP', 'uses' => 'SuperAdminController@adminEditMealsP']);
    Route::post('admin_bulk_temp_bookP', ['as' => 'admin_bulk_temp_bookP', 'uses' => 'SuperAdminController@adminBulkTempBooking']);
    Route::post('admin_add_booking_bulkP', ['as' => 'admin_add_booking_bulkP', 'uses' => 'SuperAdminController@adminAddBulkBookingP']);
    Route::post('admin_create_new_bulk_cus', ['as' => 'admin_create_new_bulk_cus', 'uses' => 'SuperAdminController@adminAddNewBulkCustomer']);
    Route::post('admin_search_rooms_bulk_map_p', ['as' => 'admin_search_rooms_bulk_map_p', 'uses' => 'SuperAdminController@adminAvailableRoomsSearchBulkMap']);
    Route::post('admin_summary_search_p', ['as' => 'admin_summary_search_p', 'uses' => 'SuperAdminController@adminSummarySearchP']);



});

Route::group(array('prefix' => 'api'), function () {
    Route::get('user_info', ['as' => 'user_info', 'uses' => 'ReceptionistController@userInfoService']);
    Route::get('av_info', ['as' => 'av_info', 'uses' => 'SuperAdminController@checkAv']);
    Route::get('count_day', ['as' => 'count_day', 'uses' => 'SuperAdminController@countDay']);
    Route::get('time', ['as' => 'time', 'uses' => 'SuperAdminController@timeConversion']);
    Route::get('money', ['as' => 'money', 'uses' => 'SuperAdminController@getBookingInfo']);

    Route::get('inv', ['as' => 'inv', 'uses' => 'SuperAdminController@getBookingDetails1']);


});