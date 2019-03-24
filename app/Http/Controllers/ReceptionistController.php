<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\UserInfo;
use App\CustomerInfo;
use App\RoomsInfo;
use App\BookingInfo;
use App\BookingPaymentInfo;
use App\MealsInfo;
use App\OrderInfo;
use App\AirPortBookingInfo;
use App\AirBookingPayment;
use App\OrderPayment;
use App\CheckOutPayment;
use App\PaymentHistory;
use App\TriggerLoad;
use App\ApprovalInfo;
use App\RequestInfo;
use App\Questions;

use Crypt;
use DB;

class ReceptionistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     //Start
     public function resIndexPaidPaymentReport()
     {
         if (session()->has('user_id')) {
             $checkOutInfos = CheckOutPayment::
             where([
                     ['is_remove', '=', 0],
                     ['status', '=', 1],
                     ['check_out_status', '=', 0]
                 ])
                 ->get();
 
             return view('receptionist.paidPaymentReport', compact('checkOutInfos'))->with(
                 [
                     'msg' => 0,
                     'cmt' => 'init'
                 ]
             );
         }
         else {
             session()->flush();
             return redirect('/');
         }
     }
 
     public function recPaidSearchReportP(Request $request)
     {
         if (session()->has('user_id')) {
             $fromDate = $request->input('from_date');
             if (session()->has('search_date_paid_from'))
                 session()->put('search_date_paid_from', $fromDate);
             else
                 session(['search_date_paid_from' => $fromDate]);
 
             return redirect('receptionist/res_paid_search_report_date');
         }
         else {
             session()->flush();
             return redirect('/');
         }
 
         // dd($fromDate);
     }
 
     public function recPaidDataSearchReport()
     {
 
         //  $date_val=DATE(session('search_date_from'));
         if (session()->has('user_id')) {
             $checkOutInfos = CheckOutPayment::
             whereDate('add_date', '=', session('search_date_paid_from'))
                 ->where([
                     ['status', '=', 1],
                 ])
                 ->get();
 
             return view('receptionist.paidPaymentReport', compact('checkOutInfos'))->with(
                 [
                     'msg' => 4,
                     'cmt' => 'init'
                 ]
             );
         }
         else {
             session()->flush();
             return redirect('/');
         }
     }
 
     public function recPaidDurationSearchReportP(Request $request)
     {
         if (session()->has('user_id')) {
             $fromDate = $request->input('from_date');
             $toDate = $request->input('to_date');
             if (session()->has('search_date_paid_from')) {
                 session()->put('search_date_paid_from', $fromDate);
                 session()->put('search_date_paid_to', $toDate);
 
             } else {
                 session(['search_date_paid_from' => $fromDate]);
                 session(['search_date_paid_to' => $toDate]);
 
             }
 
             return redirect('receptionist/res_paid_search_duration_report');
         }
         else {
             session()->flush();
             return redirect('/');
         }
     }
 
     public function recPaidDurationSearchReport()
     {
         if (session()->has('user_id')) {
             $checkOutInfos = CheckOutPayment::
             whereDate('add_date', '>=', session('search_date_paid_from'))
                 ->whereDate('add_date', '<=', session('search_date_paid_to'))
                 ->where([
                     ['status', '=', 1],
                     ['check_out_status','=',0]
                 ])
                 ->get();
 
             return view('receptionist.paidPaymentReport', compact('checkOutInfos'))->with(
                 [
                     'msg' => 5,
                     'cmt' => 'init'
                 ]
             );
         }
         else {
             session()->flush();
             return redirect('/');
         }
     }
 
     public function paidReportShow(){
         if (session()->has('user_id')) {
             $checkOutInfos = CheckOutPayment::
             whereDate('add_date', '>=', session('search_date_paid_from'))
                 ->whereDate('add_date', '<=', session('search_date_paid_to'))
                 ->where([
                     ['status', '=', 1],
                 ])
                 ->get();
 
             return view('receptionist.printPaidPayment', compact('checkOutInfos'))->with(
                 [
                     'msg' => 0,
                     'cmt' => 'init'
                 ]
             );
         }
         else {
             session()->flush();
             return redirect('/');
         }
     }
 
 
     // end
     //start
     public function resReportCurrentBookingDurationSearch(){
        if (session()->has('user_id')) {
            $to = session('search_date_report_check_from');
            $from = session('search_date_report_check_to');
            $bookingInfos = BookingInfo::
            whereDate('to_date', '>=', $to)
                ->whereDate('from_date', '<=', $from)
                ->where([
                    ['check_out_status', '=', 0],
                ])
                ->get();
            

            return view('receptionist.reportCurrentBookings', compact('bookingInfos'))->with(
                [
                    'msg' => 1,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resReportCurrentBookingDurationSearchP(Request $request)
    {
        //rep2
        if (session()->has('user_id')) {
            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');
            $bType = $request->input('radio-inline');

            if (session()->has('search_date_report_check_from')) {
                session()->put('search_date_report_check_from', $fromDate);
                session()->put('search_date_report_check_to', $toDate);
                session()->put('search_booking_type', $bType);
            } else {
                session(['search_date_report_check_from' => $fromDate]);
                session(['search_date_report_check_to' => $toDate]);
                session(['search_booking_type' => $bType]);
            }

            return redirect('receptionist/res_report_current_booking_search_duration');
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resReportCurrentBooking()
    {
        if (session()->has('user_id')) {
            // $checkOutInfos = CheckOutPayment::
            // where([
            //         ['is_remove', '=', 0],
            //         ['check_out_status', '=', 0]
            //     ])
            //     ->get();
            $bookingInfos=null;

            // dd($checkOutInfos);

            return view('receptionist.reportCurrentBookings', compact('bookingInfos'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resReportCheckOut()
    {
        if (session()->has('user_id')) {
            // $checkOutInfos = CheckOutPayment::
            // where([
            //         ['is_remove', '=', 0],
            //         ['status', '=', 1],
            //         ['check_out_status', '=', 1]
            //     ])
            //     ->get();
            $checkOutInfos=null;
            


            return view('receptionist.reportCheckOuts', compact('checkOutInfos'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resReportCheckDurationSearchP(Request $request)
    {
        //rep1
        if (session()->has('user_id')) {
            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');
            $bType = $request->input('radio-inline');
            // dd($bType);
            if (session()->has('search_date_report_check_from')) {
                session()->put('search_date_report_check_from', $fromDate);
                session()->put('search_date_report_check_to', $toDate);
                session()->put('search_booking_type', $bType);

            } else {
                session(['search_date_report_check_from' => $fromDate]);
                session(['search_date_report_check_to' => $toDate]);
                session(['search_booking_type' => $bType]);


            }

            // dd($bType);

            return redirect('receptionist/res_report_check_search_duration');
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resReportCheckDurationSearch()
    {
        //rep11
      //  dd(session('search_booking_type'));
        if (session()->has('user_id')) {
            if (session('search_booking_type') == 4) {
                $checkOutInfos = CheckOutPayment::
                whereDate('update_date', '>=', session('search_date_report_check_from'))
                    ->whereDate('update_date', '<=', session('search_date_report_check_to'))
                    ->where([
                        ['status', '=', 1],
                        ['check_out_status', '=', 1]
                    ])
                    ->get();
            } else {

                $checkOutInfos = CheckOutPayment::
                whereDate('update_date', '>=', session('search_date_report_check_from'))
                    ->whereDate('update_date', '<=', session('search_date_report_check_to'))
                    ->where([
                        ['status', '=', 1],
                        ['check_out_status', '=', 1],
                        ['booking_type', '=', session('search_booking_type')]
                    ])
                    ->get();

            }

            return view('receptionist.reportCheckOuts', compact('checkOutInfos'))->with(
                [
                    'msg' => 1,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resReportCheckRooms()
    {
        //rep3
        if (session()->has('user_id')) {

            // $bookingInfos = BookingInfo::
            // where([
            //         ['check_out_status', '=', 1],
            //     ])
            //     ->get();
            $bookingInfos=null;
            return view('receptionist.reportCheckOutBooking', compact('bookingInfos'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resReportCheckRoomsDurationSearchP(Request $request)
    {
        //rep1
        if (session()->has('user_id')) {
            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');
            $bType = $request->input('radio-inline');
            if (session()->has('search_date_report_check_from')) {
                session()->put('search_date_report_check_from', $fromDate);
                session()->put('search_date_report_check_to', $toDate);
                session()->put('search_booking_type', $bType);

            } else {
                session(['search_date_report_check_from' => $fromDate]);
                session(['search_date_report_check_to' => $toDate]);
                session(['search_booking_type' => $bType]);


            }


            return redirect('receptionist/res_report_check_rooms_search_duration');
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resReportCheckRoomsDurationSearch()
    {
        //rep31
       //   dd(session('search_date_report_check_from'));
        //dd(session('search_booking_type'));
        if (session()->has('user_id')) {


            if (session('search_booking_type') == 4) {
                $bookingInfos = BookingInfo::
                whereDate('to_date', '>=', session('search_date_report_check_from'))
                    ->whereDate('from_date', '<=', session('search_date_report_check_to'))
                    ->where([
                        ['check_out_status', '=', 1]
                    ])
                    ->get();


            } else {
                $bookingInfos = BookingInfo::
                whereDate('to_date', '>=', session('search_date_report_check_from'))
                    ->whereDate('from_date', '<=', session('search_date_report_check_to'))
                    ->where([
                        ['check_out_status', '=', 1],
                        ['booking_type', '=', session('search_booking_type')]

                    ])
                    ->get();


            }


            return view('receptionist.reportCheckOutBooking', compact('bookingInfos'))->with(
                [
                    'msg' => 1,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }
     //end
    public function indexHome()
    {
        if (session()->has('user_id')) {
            return view('receptionist.receptionistHome');
        }
        else {
            session()->flush();
            return redirect('/');
        }

    }

    public function indexHomeFirst()
    {
        if (session()->has('user_id')) {
            return view('receptionist.receptionistHomeFirst');
        }
        else {
            session()->flush();
            return redirect('/');
        }

    }

    //Services

    public function userInfoService()
    {
        $userInfo=UserInfo::
           get();
        return response()->json($userInfo);
    }


    public function availableRoomsIndex()
    {
        if (session()->has('user_id')) {
            date_default_timezone_set('Asia/Colombo');
            $todayDate = date("Y-m-d");
            $tomorrowDate = date_create($todayDate);
            date_add($tomorrowDate, date_interval_create_from_date_string("1 days"));
            $tomorrowDate = date_format($tomorrowDate, "Y-m-d");
            //dd(session('to_date'),session('from_date'));
            if (session()->has('to_date')) {
                session()->put('to_date', session('to_date'));
                session()->put('from_date', session('from_date'));
            } else {
                session([
                    'to_date' => $tomorrowDate,
                    'from_date' => $todayDate
                ]);
            }
            $roomInfos = RoomsInfo::
            where([
                    ['is_remove', '=', 0]
                ])
                ->orderBy('add_date', 'des')
                ->get();

            return view('receptionist.check_availability', compact('roomInfos'))->with(
                [
                    'from_date' => session('from_date'),
                    'to_date' => session('to_date')
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }

    }

    public function recAvailableRoomsSearch(Request $request){
        if (session()->has('user_id')) {
            $toDate = $request->input('to_date');
            $fromDate = $request->input('from_date');
            if (session()->has('to_date')) {

                session()->put('to_date', $toDate);
                session()->put('from_date', $fromDate);
            } else {

                session([
                    'to_date' => $toDate,
                    'from_date' => $fromDate
                ]);
            }
            return redirect('receptionist/rec_room_search');
        }
        else {
            session()->flush();
            return redirect('/');
        }

    }

    public function recAvailableRoomsSearchMap(Request $request){
        if (session()->has('user_id')) {
            $toDate = $request->input('to_date');
            $fromDate = $request->input('from_date');
            if (session()->has('to_date')) {

                session()->put('to_date', $toDate);
                session()->put('from_date', $fromDate);
            } else {

                session([
                    'to_date' => $toDate,
                    'from_date' => $fromDate
                ]);
            }
            return redirect('receptionist/rec_room_search_map');
        }
        else {
            session()->flush();
            return redirect('/');
        }

    }

    public function recAvailableRoomsSearchBulkMap(Request $request){
        if (session()->has('user_id')) {
            $toDate = $request->input('to_date');
            $fromDate = $request->input('from_date');
            if (session()->has('to_date')) {

                session()->put('to_date', $toDate);
                session()->put('from_date', $fromDate);
            } else {

                session([
                    'to_date' => $toDate,
                    'from_date' => $fromDate
                ]);
            }
            return redirect('receptionist/rec_room_search_bulk_map');
        }
        else {
            session()->flush();
            return redirect('/');
        }

    }

    public function customerRequest()
    {
        //req1
        if (session()->has('user_id')) {
            date_default_timezone_set('Asia/Colombo');
            $todayDate = date("Y-m-d");
            $requestInfos = RequestInfo::
            whereDate('add_date', '=', $todayDate)
                ->orderBy('add_date', 'des')
                ->get();
            return view('receptionist.requestFromWeb', compact('requestInfos'));
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function customerRequestAll()
    {
        if (session()->has('user_id')) {
        $requestInfos= RequestInfo::
            orderBy('add_date', 'des')
            ->get();
        return view('receptionist.requestFromWeb', compact('requestInfos'));
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function customerQuestions()
    {
        //req1
        if (session()->has('user_id')) {
            date_default_timezone_set('Asia/Colombo');
            $todayDate = date("Y-m-d");
            $questionInfos= Questions::
            whereDate('add_date', '=',$todayDate)
                ->orderBy('add_date', 'des')
                ->get();
            return view('receptionist.questionFromWeb', compact('questionInfos'));
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function customerQuestionsAll()
    {
        if (session()->has('user_id')) {
            $questionInfos = Questions::
            orderBy('add_date', 'des')
                ->get();
            return view('receptionist.questionFromWeb', compact('questionInfos'));
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function recRoomSearch(){
        if (session()->has('user_id')) {
            $roomInfos = RoomsInfo::
            where([
                    ['is_remove', '=', 0]
                ])
                ->orderBy('add_date', 'des')
                ->get();

            return view('receptionist.check_availability', compact('roomInfos'))->with(
                [
                    'from_date' => session('from_date'),
                    'to_date' => session('to_date')
                ]
            );
        }

        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function recRoomSearchMap(){
        if (session()->has('user_id')) {
            $roomInfos = RoomsInfo::
            where([
                    ['is_remove', '=', 0]
                ])
                ->orderBy('floor_number', 'asc')
                ->get();

            return view('receptionist.check_availability_map', compact('roomInfos'))->with(
                [
                    'from_date' => session('from_date'),
                    'to_date' => session('to_date')
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function recRoomSearchBulkMap(){
        if (session()->has('user_id')) {
            $roomInfos = RoomsInfo::
            where([
                    ['is_remove', '=', 0]
                ])
                ->orderBy('floor_number', 'asc')
                ->get();

            return view('receptionist.bulk_check_availability_map', compact('roomInfos'))->with(
                [
                    'from_date' => session('from_date'),
                    'to_date' => session('to_date')
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resIndexBookingInfo($id)
    {
        if (session()->has('user_id')) {
            $roomInfo = RoomsInfo::
            where([
                    ['room_id', '=', $id]
                ])
                ->first();


            if ($this->getBookingId(session('to_date'), session('from_date'), $id) == 0) {
                date_default_timezone_set('Asia/Colombo');
                $date_time = date("Y-m-d H:i:s");

//                $from_time=date("H:i:s","12.00.00");
//                $to_time=date("H:i:s","12.00.00");
                $invoiceId = $this->getInvoiceId();


                if (session()->has('r_b_index')) {
                    if (session('r_b_index') == 1) {

                        $invoiceId = session('r_b_invoice_id');
                    } else {

                        session()->put('r_b_index', 0);
                        session()->put('r_b_invoice_id', 0);
                    }
                } else {
                    session([
                        'r_b_index' => 0,
                        'r_b_invoice_id' => 0
                    ]);
                }

                $bookingId = "BOOK" . uniqid();


                if (session()->has('s_room_id')) {
                    session()->put('s_room_id', $id);
                    session()->put('s_book_id', $bookingId);
                    session()->put('s_inv_id', $invoiceId);
                } else {
                    session([
                        's_room_id' => $id,
                        's_book_id' => $bookingId,
                        's_inv_id' => $invoiceId
                    ]);
                }
               // dd($from_time);

                BookingInfo::insert(
                    [

                        'booking_id' => $bookingId,
                        'invoice_id' => $invoiceId,
                        'room_id' => $id,
                        'from_date' => session('from_date').' 12:01:00',
                        'to_date' => session('to_date').' 12:00:00',
                        'from_time'=>'12:01:00',
                        'to_time'=>'12:00:00',
                        'status' => 1,
                        'is_remove' => 0,
                        'user_id' => session('user_id'),
                        'add_date' => $date_time,
                        'update_date' => $date_time

                    ]
                );


                $triggerId = "TR" . uniqid();
                TriggerLoad::insert(
                    [

                        'trigger_id' => $triggerId,
                        'change_type' => 0,
                        'user_id' => session('user_id'),
                        'change_id' => $bookingId,
                        'change_name' => $this->getRoomInfo($id)->room_number,
                        'change_date_one' => session('from_date'),
                        'change_date_two' => session('to_date'),
                        'change_status' => 1,
                        'add_date' => $date_time

                    ]
                );

            }

            $cusInfos = CustomerInfo::
            where([
                    ['is_remove', '=', 0],
                ])
                ->orderBy('add_date', 'des')
                ->get();

            if (session()->has('r_b_index')) {
                if (session('r_b_index') == 1) {

                    $bookIn = BookingInfo::
                    where([
                            ['invoice_id', '=', session('r_b_invoice_id')],
                        ])
                        ->first();

                    if (session()->has('r_b_cus_id')) {
                        session()->put('r_b_cus_id', $bookIn->customer_id);
                    } else {
                        session([
                            'r_b_cus_id' => $bookIn->customer_id,
                        ]);
                    }
                    session()->put('r_b_index', 0);
                }

            } else {
                if (session()->has('r_b_cus_id')) {
                    session()->put('r_b_cus_id', 0);
                } else {
                    session([
                        'r_b_cus_id' => 0,
                    ]);
                }
            }

            // dd(session('r_b_invoice_id'));


            return view('receptionist.bookingDetails', compact('cusInfos', 'roomInfo'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resBookingCancel($id){
       // dd($id);
        if (session()->has('user_id')) {
            BookingInfo::
            where('booking_id', '=', $id)
                ->delete();

            return redirect('receptionist/res_cancellation_success');
        }
        else {
            session()->flush();
            return redirect('/');
        }

    }

    public function resBookingCancelMap($id){
        // dd($id);
        if (session()->has('user_id')) {
            BookingInfo::
            where('booking_id', '=', $id)
                ->delete();

            return redirect('receptionist/res_cancellation_map_success');
        }
        else {
            session()->flush();
            return redirect('/');
        }

    }

    public function resBookingCancelMapBulk($id){
        // dd($id);
        if (session()->has('user_id')) {
            BookingInfo::
            where('booking_id', '=', $id)
                ->delete();

            return redirect('receptionist/res_cancellation_bulk_map_success');
        }
        else {
            session()->flush();
            return redirect('/');
        }

    }


    public function resCancellationSuccess(){
        if (session()->has('user_id')) {
            $roomInfos = RoomsInfo::
            where([
                    ['is_remove', '=', 0]
                ])
                ->orderBy('floor_number', 'asc')
                ->get();

            return view('receptionist.check_availability_map', compact('roomInfos'))->with(
                [
                    'from_date' => session('from_date'),
                    'to_date' => session('to_date')
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resCancellationSuccessMap(){
        if (session()->has('user_id')) {
            $roomInfos = RoomsInfo::
            where([
                    ['is_remove', '=', 0]
                ])
                ->orderBy('floor_number', 'asc')
                ->get();

            return view('receptionist.check_availability_map', compact('roomInfos'))->with(
                [
                    'from_date' => session('from_date'),
                    'to_date' => session('to_date')
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resCancellationSuccessMapBulk(){
        if (session()->has('user_id')) {
            $roomInfos = RoomsInfo::
            where([
                    ['is_remove', '=', 0]
                ])
                ->orderBy('floor_number', 'asc')
                ->get();

            return view('receptionist.bulk_check_availability_map', compact('roomInfos'))->with(
                [
                    'from_date' => session('from_date'),
                    'to_date' => session('to_date')
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function getBookingId($to,$from,$room_id){
        if (session()->has('user_id')) {
            $availableRoom = BookingInfo::
            whereDate('to_date', '>=', $to.' 12:00:00')
                ->whereDate('from_date', '<=', $from.' 12:01:00')
                ->where([
                    ['room_id', '=', $room_id],
                    ['check_out_status', '=', 0]
                ])
                ->first();
            if (count($availableRoom) == 0)
                return 0;
            else
                return -1;
        }
        else {
            session()->flush();
            return redirect('/');
        }

    }

    public function resCreateNewCustomer(){
        if (session()->has('user_id')) {
            return view('receptionist.createCustomer')->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resCreateNewBulkCustomer(){
        if (session()->has('user_id')) {
            return view('receptionist.createBulkCustomer')->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resAddNewCustomer(Request $request){
        if (session()->has('user_id')) {
            $cusFirstName = $request->input('cus_first_name');
            $cusLastName = $request->input('cus_last_name');
            $email = $request->input('cus_mail');
            $phone = $request->input('cus_phone');
            $nicPassport = $request->input('cus_nic_pass');
            $address = $request->input('cus_address');

            date_default_timezone_set('Asia/Colombo');
            $date_time = date("Y-m-d H:i:s");
            $userId = "CUS_" . uniqid();
            $name = $cusFirstName . " " . $cusLastName;
            if ($email == "") {
                CustomerInfo::insert(
                    [
                        'cus_id' => $userId,
                        'cus_first_name' => $cusFirstName,
                        'cus_last_name' => $cusLastName,
                        'cus_phone' => $phone,
                        'cus_email' => $email,
                        'cus_nic_pass' => $nicPassport,
                        'cus_address' => $address,
                        'is_remove' => 0,
                        'add_date' => $date_time,
                        'update_date' => $date_time

                    ]
                );

                if (session()->has('cmt'))
                    session()->put('cmt', $name);
                else
                    session(['cmt' => $name]);
                return redirect('receptionist/res_create_cus_success');

            } else {
                $cusCount = CustomerInfo::
                where([
                        ['cus_email', '=', $email],
                        ['is_remove', '=', 0]
                    ])
                    ->get();

                if (count($cusCount) == 0) {

                    CustomerInfo::insert(
                        [
                            'cus_id' => $userId,
                            'cus_first_name' => $cusFirstName,
                            'cus_last_name' => $cusLastName,
                            'cus_phone' => $phone,
                            'cus_email' => $email,
                            'cus_nic_pass' => $nicPassport,
                            'cus_address' => $address,
                            'is_remove' => 0,
                            'add_date' => $date_time,
                            'update_date' => $date_time

                        ]
                    );

                    if (session()->has('cmt'))
                        session()->put('cmt', $name);
                    else
                        session(['cmt' => $name]);
                    return redirect('receptionist/res_create_cus_success');
                } else {
                    if (session()->has('cmt'))
                        session()->put('cmt', $name);
                    else
                        session(['cmt' => $name]);
                    return redirect('receptionist/res_create_cus_failure');
                }
            }
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resAddNewBulkCustomer(Request $request){
        //Prob301
        if (session()->has('user_id')) {

          //  dd("hi");
            $cusFirstName = $request->input('cus_first_name');
            $cusLastName = $request->input('cus_last_name');
            $email = $request->input('cus_mail');
            $phone = $request->input('cus_phone');
            $nicPassport = $request->input('cus_nic_pass');
            $address = $request->input('cus_address');

            date_default_timezone_set('Asia/Colombo');
            $date_time = date("Y-m-d H:i:s");
            $userId = "CUS_" . uniqid();
            $name = $cusFirstName . " " . $cusLastName;
            if ($email == "") {
                CustomerInfo::insert(
                    [
                        'cus_id' => $userId,
                        'cus_first_name' => $cusFirstName,
                        'cus_last_name' => $cusLastName,
                        'cus_phone' => $phone,
                        'cus_email' => $email,
                        'cus_nic_pass' => $nicPassport,
                        'cus_address' => $address,
                        'is_remove' => 0,
                        'add_date' => $date_time,
                        'update_date' => $date_time

                    ]
                );

                if (session()->has('cmt'))
                    session()->put('cmt', $name);
                else
                    session(['cmt' => $name]);
                return redirect('receptionist/res_create_cus_bulk_success');

            } else {
                $cusCount = CustomerInfo::
                where([
                        ['cus_email', '=', $email],
                        ['is_remove', '=', 0]
                    ])
                    ->get();

                if (count($cusCount) == 0) {

                    CustomerInfo::insert(
                        [
                            'cus_id' => $userId,
                            'cus_first_name' => $cusFirstName,
                            'cus_last_name' => $cusLastName,
                            'cus_phone' => $phone,
                            'cus_email' => $email,
                            'cus_nic_pass' => $nicPassport,
                            'cus_address' => $address,
                            'is_remove' => 0,
                            'add_date' => $date_time,
                            'update_date' => $date_time

                        ]
                    );

                    if (session()->has('cmt'))
                        session()->put('cmt', $name);
                    else
                        session(['cmt' => $name]);
                    return redirect('receptionist/res_create_cus_bulk_success');
                } else {
                    if (session()->has('cmt'))
                        session()->put('cmt', $name);
                    else
                        session(['cmt' => $name]);
                    return redirect('receptionist/res_create_cus_bulk_failure');
                }
            }
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resCreateCustomerFailure(){
        if (session()->has('user_id')) {
            $roomInfo = RoomsInfo::
            where([
                    ['room_id', '=', session('s_room_id')]
                ])
                ->first();

            $cusInfos = CustomerInfo::
            where([
                    ['is_remove', '=', 0],
                ])
                ->orderBy('add_date', 'des')
                ->get();

            return view('receptionist.bookingDetails', compact('cusInfos', 'roomInfo'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resCreateCustomerBulkFailure(){
        if (session()->has('user_id')) {
            $roomInfos=session('bulk_room_infos');

            $cusInfos = CustomerInfo::
            where([
                    ['is_remove', '=', 0],
                ])
                ->orderBy('add_date', 'des')
                ->get();

            return view('receptionist.bulkBookingDetails', compact('cusInfos', 'roomInfos'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resCreateCustomerBulkSuccess(){
        if (session()->has('user_id')) {
            $roomInfos=session('bulk_room_infos');

            $cusInfos = CustomerInfo::
            where([
                    ['is_remove', '=', 0],
                ])
                ->orderBy('add_date', 'des')
                ->get();

            return view('receptionist.bulkBookingDetails', compact('cusInfos','roomInfos'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }


    public function resCreateCustomerSuccess(){
        if (session()->has('user_id')) {
            $roomInfo = RoomsInfo::
            where([
                    ['room_id', '=', session('s_room_id')]
                ])
                ->first();

            $cusInfos = CustomerInfo::
            where([
                    ['is_remove', '=', 0],
                ])
                ->orderBy('add_date', 'des')
                ->get();

            return view('receptionist.bookingDetails', compact('cusInfos', 'roomInfo'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resAddBooking(Request $request){

        if (session()->has('user_id')) {
            $toDate = $request->input('to_date');
            $fromDate = $request->input('from_date');
            $cusId = $request->input('cus_id');
            $roomId = $request->input('room_id');
            $invId = session('s_inv_id');
            $totalAmount = $request->input('total_amount');
            $advancePayment = $request->input('advance_payment');
            $numOfDays = $request->input('number_of_days');
            $perDayAmount = $request->input('amount_per_day');
            $numOfChildren = $request->input('no_of_children');
            $numOfAdults = $request->input('no_of_adults');
            $bookingType = $request->input('booking_type');
            $brokerName=$request->input('broker_name');
            $discountAmount=$request->input('discount_amount');
            $bookingStatus=$request->input('radio-inline');

            date_default_timezone_set('Asia/Colombo');
            $date_time = date("Y-m-d H:i:s");
            BookingInfo::
            where([
                    ['booking_id', '=', session('s_book_id')],
                ])
                ->update(
                    [
                        'customer_id' => $cusId,
                        'status' => $bookingStatus,
                        'is_remove' => 0,
                        'user_id' => session('user_id'),
                        'no_of_children' => $numOfChildren,
                        'no_of_adults' => $numOfAdults,
                        'cancel_lock' => 0,
                        'edit_lock' => 0,
                        'booking_type' => $bookingType,
                        'broker_name'=>$brokerName,
                        'update_date' => $date_time

                    ]
                );

            $payId = "BPAY_" . uniqid();

            BookingPaymentInfo::insert(
                [
                    'payment_id' => $payId,
                    'invoice_id' => $invId,
                    'booking_id' => session('s_book_id'),
                    'no_of_days' => $numOfDays,
                    'total_amount' => $totalAmount,
                    'is_remove' => 0,
                    'add_date' => $date_time,
                    'update_date' => $date_time


                ]
            );

            $cPayId = "CPAY_" . uniqid();
            // dd(session('r_b_invoice_id'));
            if (session()->has('r_b_invoice_id')) {

                if (strcmp(session('r_b_invoice_id'), "0") != 0) {
                    $preCheck = CheckOutPayment::
                    where([
                            ['invoice_id', '=', session('r_b_invoice_id')],
                        ])
                        ->first();
                    // dd($preCheck);


                    $newAmount = $preCheck->total_amount + $totalAmount;
                    $statVal = ($newAmount-$discountAmount) - $preCheck->paid_amount;
                    $status = 0;
                    if ($statVal == 0)
                        $status = 1;
                    else
                        $status = 0;

                    CheckOutPayment::
                    where([
                            ['invoice_id', '=', session('r_b_invoice_id')],
                        ])
                        ->update(
                            [
                                'total_amount' => $newAmount,
                                'status' => $status,
                                'booking_type' => $bookingType,
                                'discount_amount'=>$discountAmount,
                                'update_date' => $date_time

                            ]
                        );


                } else {

                    CheckOutPayment::insert(
                        [
                            'payment_id' => $cPayId,
                            'invoice_id' => $invId,
                            'total_amount' => $totalAmount,
                            'paid_amount' => 0,
                            'status' => 0,
                            'is_remove' => 0,
                            'booking_type' => $bookingType,
                            'discount_amount'=>$discountAmount,
                            'add_date' => $date_time,
                            'update_date' => $date_time


                        ]
                    );
                }
            } else {

                CheckOutPayment::insert(
                    [
                        'payment_id' => $cPayId,
                        'invoice_id' => $invId,
                        'total_amount' => $totalAmount,
                        'paid_amount' => 0,
                        'status' => 0,
                        'is_remove' => 0,
                        'booking_type' => $bookingType,
                        'discount_amount'=>$discountAmount,
                        'add_date' => $date_time,
                        'update_date' => $date_time


                    ]
                );
            }
            $sBookId = session('s_book_id');
            $userId = session('user_id');
            session()->flush();
            session(
                [
                    's_book_id' => $sBookId,
                    'user_id' => $userId

                ]);

            $triggerId = "TR" . uniqid();
            TriggerLoad::insert(
                [

                    'trigger_id' => $triggerId,
                    'change_type' => 0,
                    'user_id' => session('user_id'),
                    'change_id' => session('s_book_id'),
                    'change_name' => $this->getRoomInfo($roomId)->room_number,
                    'change_date_one' => $fromDate,
                    'change_date_two' => $toDate,
                    'change_status' => 2,
                    'add_date' => $date_time

                ]
            );


            return redirect('receptionist/res_success_booking');
        }
        else {
            session()->flush();
            return redirect('/');
        }



    }

    public function resAddBulkBookingP(Request $request){

        if (session()->has('user_id')) {

            $toDate = $request->input('to_date');
            $fromDate = $request->input('from_date');
            $cusId = $request->input('cus_id');
            $invId = session('s_inv_id');
            $bookingType = $request->input('booking_type');
            $brokerName=$request->input('broker_name');
            date_default_timezone_set('Asia/Colombo');
            $date_time = date("Y-m-d H:i:s");

            $bulkRoomIds=$request->input('bulkRoomIds');
            $totalFullAmount=$request->input('total_book_amount1');
            $discountAmount=$request->input('discount_amount');

            //dd($bulkRoomIds);

            foreach($bulkRoomIds as $bulkRoomId) {
                $numOfDays= $request->input("number_of_days".$bulkRoomId);
                $perDayAmount = $request->input('amount_per_day1'.$bulkRoomId);
                $numOfChildren = $request->input('no_of_children'.$bulkRoomId);
                $totalAmount = $request->input("total_amount".$bulkRoomId);
                $numOfAdults = $request->input('no_of_adults'.$bulkRoomId);
                $bookingStatus=$request->input('radio-inline');
                $bookInf= BookingInfo::
                where([
                        ['invoice_id', '=', $invId],
                        ['room_id', '=', $bulkRoomId]
                    ])
                    ->first();

                BookingInfo::
                where([
                        ['invoice_id', '=', $invId],
                        ['room_id', '=', $bulkRoomId]
                    ])
                    ->update(
                        [
                            'customer_id' => $cusId,
                            'status' => $bookingStatus,
                            'is_remove' => 0,
                            'user_id' => session('user_id'),
                            'no_of_children' => $numOfChildren,
                            'no_of_adults' => $numOfAdults,
                            'cancel_lock' => 0,
                            'edit_lock' => 0,
                            'booking_type' => $bookingType,
                            'broker_name'=>$brokerName,
                            'update_date' => $date_time

                        ]
                    );
                $payId = "BPAY_" . uniqid();

                BookingPaymentInfo::insert(
                    [
                        'payment_id' => $payId,
                        'invoice_id' => $invId,
                        'booking_id' => $bookInf->booking_id,
                        'no_of_days' => $numOfDays,
                        'total_amount' => $totalAmount,
                        'is_remove' => 0,
                        'add_date' => $date_time,
                        'update_date' => $date_time


                    ]
                );
            }
            $cPayId = "CPAY_" . uniqid();
            if (session()->has('r_b_invoice_id')) {

                if (strcmp(session('r_b_invoice_id'), "0") != 0) {
                    $preCheck = CheckOutPayment::
                    where([
                            ['invoice_id', '=', session('r_b_invoice_id')],
                        ])
                        ->first();
                    $newAmount = $preCheck->total_amount + $totalFullAmount;
                    $statVal = ($newAmount-$discountAmount) - $preCheck->paid_amount;
                    $status = 0;
                    if ($statVal == 0)
                        $status = 1;
                    else
                        $status = 0;

                    CheckOutPayment::
                    where([
                            ['invoice_id', '=', session('r_b_invoice_id')],
                        ])
                        ->update(
                            [
                                'total_amount' => $newAmount,
                                'status' => $status,
                                'booking_type' => $bookingType,
                                'discount_amount'=>$discountAmount,
                                'update_date' => $date_time

                            ]
                        );


                } else {

                    CheckOutPayment::insert(
                        [
                            'payment_id' => $cPayId,
                            'invoice_id' => $invId,
                            'total_amount' => $totalFullAmount,
                            'paid_amount' => 0,
                            'status' => 0,
                            'is_remove' => 0,
                            'booking_type' => $bookingType,
                            'add_date' => $date_time,
                            'discount_amount'=>$discountAmount,
                            'update_date' => $date_time


                        ]
                    );
                }
            } else {

                CheckOutPayment::insert(
                    [
                        'payment_id' => $cPayId,
                        'invoice_id' => $invId,
                        'total_amount' => $totalFullAmount,
                        'paid_amount' => 0,
                        'status' => 0,
                        'is_remove' => 0,
                        'booking_type' => $bookingType,
                        'discount_amount'=>$discountAmount,
                        'add_date' => $date_time,
                        'update_date' => $date_time


                    ]
                );
            }
            $sInvId = session('s_inv_id');
            $userId = session('user_id');
            session()->flush();
            session(
                [
                    's_inv_id' => $sInvId,
                    'user_id' => $userId

                ]);




            return redirect('receptionist/res_success_bulk_booking');
        }
        else {
            session()->flush();
            return redirect('/');
        }



    }

    public function resSuccessBulkBooking(){
        if (session()->has('user_id')) {
            $bookingInfo = BookingInfo::
            where([
                    ['is_remove', '=', 0],
                    ['invoice_id', '=', session('s_inv_id')]
                ])
                ->first();

            if (session()->has('b_to_date')) {
                session()->put('b_to_date', $bookingInfo->to_date);
                session()->put('b_from_date', $bookingInfo->from_date);
            } else {
                session([
                    'b_to_date' => $bookingInfo->to_date,
                    'b_from_date' => $bookingInfo->from_date
                ]);
            }

            $bookingInfos = BookingInfo::
            where([
                    ['is_remove', '=', 0],
                    ['invoice_id', '=', session('s_inv_id')]
                ])
                ->get();


            return view('receptionist.bookingList', compact('bookingInfos'))->with(
                [
                    'msg' => 1,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }

    }


    public function resSuccessBooking(){
        if (session()->has('user_id')) {
            $bookingInfo = BookingInfo::
            where([
                    ['is_remove', '=', 0],
                    ['booking_id', '=', session('s_book_id')]
                ])
                ->first();

            if (session()->has('b_to_date')) {
                session()->put('b_to_date', $bookingInfo->to_date);
                session()->put('b_from_date', $bookingInfo->from_date);
            } else {
                session([
                    'b_to_date' => $bookingInfo->to_date,
                    'b_from_date' => $bookingInfo->from_date
                ]);
            }

            $bookingInfos = BookingInfo::
            where([
                    ['is_remove', '=', 0],
                    ['booking_id', '=', session('s_book_id')]
                ])
                ->get();


            return view('receptionist.bookingList', compact('bookingInfos'))->with(
                [
                    'msg' => 1,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }

    }

    public function resBookingList(){
        if (session()->has('user_id')) {
            date_default_timezone_set('Asia/Colombo');
            $todayDate = date("Y-m-d");
            $tomorrowDate = date_create($todayDate);
            date_add($tomorrowDate, date_interval_create_from_date_string("1 days"));
            $tomorrowDate = date_format($tomorrowDate, "Y-m-d");
            if (session()->has('b_to_date')) {
                session()->put('b_to_date', session('b_to_date'));
                session()->put('b_from_date', session('b_from_date'));
            } else {
                session([
                    'b_to_date' => $tomorrowDate,
                    'b_from_date' => $todayDate
                ]);
            }
//        $bookingInfos=BookingInfo::
//        whereDate('to_date','>=',session('b_to_date'))
//            ->whereDate('from_date','<=',session('b_from_date'))
//            ->where([
//                ['check_out_status', '=',0],
//            ])
//            ->get();
         
            $bookingInfos = BookingInfo::
            where([
                    ['check_out_status', '=', 0],
                ])
                ->get();
            //dd($bookingInfos);

            return view('receptionist.bookingList', compact('bookingInfos'))->with(
                [
                    'msg' => 8,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resBookingListFromFront($id){
        //opp1
        if (session()->has('user_id')) {
            $bookingInfos = BookingInfo::
            where([
                    ['booking_id', '=', $id],
                ])
                ->get();

            $bookingInf = BookingInfo::
            where([
                    ['booking_id', '=', $id],
                ])
                ->first();

            if (session()->has('b_to_date')) {
                session()->put('b_to_date', $bookingInf->to_date);
                session()->put('b_from_date', $bookingInf->from_date);
            } else {
                session([
                    'b_to_date' => $bookingInf->to_date,
                    'b_from_date' => $bookingInf->from_date
                ]);
            }

            if ($bookingInf->check_out_status == 0) {

                return view('receptionist.bookingList', compact('bookingInfos'))->with(
                    [
                        'msg' => 8,
                        'cmt' => 'init'
                    ]
                );
            }
            else{
                return view('receptionist.checkOutBookingList', compact('bookingInfos'))->with(
                    [
                        'msg' => 0,
                        'cmt' => 'init'
                    ]
                );
            }

        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resCheckBookingList(){
        if (session()->has('user_id')) {
            date_default_timezone_set('Asia/Colombo');
            $todayDate = date("Y-m-d");
            $tomorrowDate = date_create($todayDate);
            date_add($tomorrowDate, date_interval_create_from_date_string("1 days"));
            $tomorrowDate = date_format($tomorrowDate, "Y-m-d");
            if (session()->has('b_to_date')) {
                session()->put('b_to_date', session('b_to_date'));
                session()->put('b_from_date', session('b_from_date'));
            } else {
                session([
                    'b_to_date' => $tomorrowDate,
                    'b_from_date' => $todayDate
                ]);
            }


            $bookingInfos = BookingInfo::
            where([
                    ['check_out_status', '=', 1],
                ])
                ->get();


            return view('receptionist.checkOutBookingList', compact('bookingInfos'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }

    }


    public function resIndexOrderMeals(){
        if (session()->has('user_id')) {
            $mealsInfos = MealsInfo::
            where([
                    ['is_remove', '=', 0],
                ])
                ->get();

            $bookingInfos = BookingInfo::
            where([
                    ['is_remove', '=', 0],
                    ['status', '=', 2]
                ])
                ->orderBy('add_date', 'desc')
                ->get();
            $bookingInf = BookingInfo::
            where([
                    ['is_remove', '=', 0],
                    ['status', '=', 2]
                ])
                ->orderBy('add_date', 'desc')
                ->first();

            if (session()->has('o_booking_id')) {

                session()->put('o_booking_id', session('o_booking_id'));
            } else {
                if (count($bookingInf) != 0) {
                    session([
                        'o_booking_id' => $bookingInf->booking_id,
                    ]);
                }
            }

//        dd(session('o_booking_id'));

            return view('receptionist.orderMeals', compact('mealsInfos', 'bookingInfos'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }


    public function resAddBookingId(Request $request)
    {

        if (session()->has('user_id')) {
            $bookingId = $request->input('booking_id');
            if (session()->has('o_booking_id')) {

                session()->put('o_booking_id', $bookingId);
            } else {

                session([
                    'o_booking_id' => $bookingId,
                ]);
            }

            return redirect('receptionist/res_index_order_meals');
        }
        else {
            session()->flush();
            return redirect('/');
        }

    }

    public function resAddMealsOrderP(Request $request){
        if (session()->has('user_id')) {
            $orderDate = $request->input('order_date');
            $mealsId = $request->input('meals_id');
            $orderTime = $request->input('order_time');
            $quantity = $request->input('quantity');
            // $unitPrice=$request->input('quantity');
            $totalAmount = $request->input('total_amount');
           
            date_default_timezone_set('Asia/Colombo');
            $date_time = date("Y-m-d H:i:s");
            $orderId = "OR_" . uniqid();
            $payId = "ORPAY_" . uniqid();
            $mealsInfo = MealsInfo::
            where([
                    ['meals_id', '=', $mealsId],
                ])
                ->first();
            $amountValue = $mealsInfo->price_per_unit * $quantity;
            $bookingInfo = BookingInfo::
            where([
                    ['booking_id', '=', session('o_booking_id')],
                ])
                ->first();
            $invId = $bookingInfo->invoice_id;
            // dd($invId);


            OrderInfo::insert(
                [
                    'order_id' => $orderId,
                    'meals_id' => $mealsId,
                    'booking_id' => session('o_booking_id'),
                    'invoice_id' => $bookingInfo->invoice_id,
                    'order_date' => $orderDate,
                    'order_time' => $orderTime,
                    'quantity' => $quantity,
                    'is_remove' => 0,
                    'user_id' => session('user_id'),
                    'edit_lock' => 0,
                    'remove_lock' => 0,
                    'add_date' => $date_time,
                    'update_date' => $date_time
                ]
            );

            OrderPayment::insert(
                [
                    'order_pay_id' => $payId,
                    'booking_id' => session('o_booking_id'),
                    'order_id' => $orderId,
                    'invoice_id' => $invId,
                    'quantity' => $quantity,
                    'amount' => $totalAmount,
                    'is_remove' => 0,
                    'add_date' => $date_time,
                    'update_date' => $date_time
                ]
            );
//        $userInfos=UserInfo::
//        where([
//                ['is_remove', '=', 0]
//            ])
//            ->get();
//        if(count($userInfos)!=0) {
//            foreach ($userInfos as $userInfo) {
            $triggerId = "TR" . uniqid();
            TriggerLoad::insert(
                [

                    'trigger_id' => $triggerId,
                    'change_type' => 1,
                    'user_id' => session('user_id'),
                    'change_id' => $orderId,
                    'change_name' => $this->getMealsInfo($mealsId)->meals_name,
                    'change_date_one' => $orderDate,
                    'change_time' => $orderTime,
                    'change_status' => 0,
                    'add_date' => $date_time

                ]
            );
//            }
//        }

            $checkPay = CheckOutPayment::
            where([
                    ['invoice_id', '=', $invId],
                ])
                ->first();
            $newAmount = $checkPay->total_amount + $totalAmount;
            $status = 0;
            $statVal = ($newAmount-$checkPay->discount_amount) - $checkPay->paid_amount;
            if ($statVal == 0)
                $status = 1;
            else
                $status = 0;
            CheckOutPayment::
            where([
                    ['invoice_id', '=', $invId],
                ])
                ->update(
                    [
                        'total_amount' => $newAmount,
                        'status' => $status
                    ]
                );

            if (session()->has('cmt'))
                session()->put('cmt', $mealsInfo->meals_name);
            else
                session(['cmt' => $mealsInfo->meals_name]);
            return redirect('receptionist/res_index_order_meals1');
        }
        else {
            session()->flush();
            return redirect('/');
        }


    }

    public function resUpdateMealsOrderP(Request $request){
        if (session()->has('user_id')) {
            $orderDate = $request->input('order_date');
            $orderTime = $request->input('order_time');
            $quantity = $request->input('quantity');
            $totalAmount = $request->input('total_amount');
            date_default_timezone_set('Asia/Colombo');
            $date_time = date("Y-m-d H:i:s");
            $orderId = $request->input('order_id');
            $payId = $request->input('pay_id');


            $prevInfo = OrderPayment::
            where([
                    ['order_pay_id', '=', $payId]
                ])
                ->first();
            $prevAmount = $prevInfo->amount;


            OrderInfo::
            where([
                    ['order_id', '=', $orderId]
                ])
                ->update(
                    [
                        'order_date' => $orderDate,
                        'order_time' => $orderTime,
                        'quantity' => $quantity,
                        'user_id' => session('user_id'),
                        'edit_lock' => 0,
                        'remove_lock' => 0,
                        'update_date' => $date_time
                    ]
                );
            $totalAmount = $request->input('total_amount');

            OrderPayment::
            where([
                    ['order_pay_id', '=', $payId]
                ])
                ->update(
                    [
                        'quantity' => $quantity,
                        'amount' => $totalAmount,
                        'update_date' => $date_time
                    ]
                );


            $orderInfo = OrderInfo::
            where([
                    ['order_id', '=', $orderId]
                ])
                ->first();


            $checkPay = CheckOutPayment::
            where([
                    ['invoice_id', '=', $orderInfo->invoice_id],
                ])
                ->first();
            $newAmount = ($checkPay->total_amount - $prevAmount) + $totalAmount;
            $status = 0;
            $statVal = ($newAmount-$checkPay->discount_amount) - $checkPay->paid_amount;
            if ($statVal == 0)
                $status = 1;
            else
                $status = 0;


            CheckOutPayment::
            where([
                    ['invoice_id', '=', $prevInfo->invoice_id],
                ])
                ->update(
                    [
                        'total_amount' => $newAmount,
                        'status' => $status
                    ]
                );

            if (session()->has('cmt'))
                session()->put('cmt', $prevInfo->invoice_id);
            else
                session(['cmt' => $prevInfo->invoice_id]);


            return redirect('receptionist/res_order_update_success');
        }
        else {
            session()->flush();
            return redirect('/');
        }


    }

    public function resOrderUpdateSuccess()
    {
        if (session()->has('user_id')) {
            $orderInfos = OrderInfo::
            where([
                    ['is_remove', '=', 0],
                ])
                ->orderBy('add_date', 'desc')
                ->get();
            return view('receptionist.orderList', compact('orderInfos'))->with(
                [
                    'msg' => 3,
                    'cmt' => session('cmt')
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }


    public function resIndexOrderMeals1(){
        if (session()->has('user_id')) {
            $mealsInfos = MealsInfo::
            where([
                    ['is_remove', '=', 0],
                ])
                ->get();

            $bookingInfos = BookingInfo::
            where([
                    ['is_remove', '=', 0],
                    ['status', '=', 2]
                ])
                ->orderBy('add_date', 'desc')
                ->get();
            $bookingInf = BookingInfo::
            where([
                    ['is_remove', '=', 0],
                    ['status', '=', 2]
                ])
                ->orderBy('add_date', 'desc')
                ->first();

            if (session()->has('o_booking_id')) {

                session()->put('o_booking_id', session('o_booking_id'));
            } else {

                session([
                    'o_booking_id' => $bookingInf->booking_id,
                ]);
            }

            return view('receptionist.orderMeals', compact('mealsInfos', 'bookingInfos'))->with(
                [
                    'msg' => 1,
                    'cmt' => session('cmt')
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resIndexOrderList(){
        if (session()->has('user_id')) {
            $orderInfos = OrderInfo::
            where([
                    ['is_remove', '=', 0],
                    ['check_out_status', '=', 0]
                ])
                ->orderBy('add_date', 'desc')
                ->get();
            return view('receptionist.orderList', compact('orderInfos'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resIndexCheckOrderList(){
        if (session()->has('user_id')) {
            $orderInfos = OrderInfo::
            where([
                    ['is_remove', '=', 0],
                    ['check_out_status', '=', 1]
                ])
                ->orderBy('add_date', 'desc')
                ->get();
            return view('receptionist.checkOutOrderList', compact('orderInfos'))->with(
                [
                    'msg' => 8,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resIndexAdminAirPortBooking(){
        if (session()->has('user_id')) {
            $bookingInfos = DB::table('booking_info')
                ->where([
                    ['is_remove', '=', 0],
                    ['status', '=', 2]
                ])
                ->orderBy('add_date', 'desc')
                ->get();
            $bookingInf = DB::table('booking_info')
                ->where([
                    ['is_remove', '=', 0],
                    ['status', '=', 2]
                ])
                ->orderBy('add_date', 'desc')
                ->first();

            if (count($bookingInf) != 0) {

                if (session()->has('a_booking_id')) {

                    session()->put('a_booking_id', session('a_booking_id'));
                } else {

                    session([
                        'a_booking_id' => $bookingInf->booking_id,
                    ]);
                }
            }
            return view('receptionist.airPortBooking', compact('bookingInfos'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }

    }

    public function resAddBookingIdA(Request $request)
    {
        if (session()->has('user_id')) {
            $bookingId = $request->input('booking_id');
            if (session()->has('a_booking_id')) {

                session()->put('a_booking_id', $bookingId);
            } else {

                session([
                    'a_booking_id' => $bookingId,
                ]);
            }

            return redirect('receptionist/res_index_airport_booking');
        }
        else {
            session()->flush();
            return redirect('/');
        }

    }

    public function resAirPortBookingP(Request $request){
        if (session()->has('user_id')) {
            $bookingType = $request->input('booking_type');
            $no_of_passengers = $request->input('no_of_passengers');
            $fromPlace = $request->input('from_place');
            $toPlace = $request->input('to_place');
            $bookingDate = $request->input('booking_date');
            $bookingTime = $request->input('booking_time');
            $amount = $request->input('a_amount');
            date_default_timezone_set('Asia/Colombo');
            $date_time = date("Y-m-d H:i:s");
            $a_bookingId = "A_B_" . uniqid();
            $payId = "APAY_" . uniqid();

            $bookingInf = BookingInfo::
            where([
                    ['booking_id', '=', session('a_booking_id')],
                ])
                ->first();

            AirPortBookingInfo::insert(
                [
                    'a_booking_id' => $a_bookingId,
                    'booking_id' => session('a_booking_id'),
                    'invoice_id' => $bookingInf->invoice_id,
                    'a_booking_type' => $bookingType,
                    'no_of_passengers' => $no_of_passengers,
                    'a_booking_from' => $fromPlace,
                    'a_booking_to' => $toPlace,
                    'a_booking_date' => $bookingDate,
                    'a_booking_time' => $bookingTime,
                    'a_amount' => $amount,
                    'is_remove' => 0,
                    'user_id' => session('user_id'),
                    'add_date' => $date_time,
                    'update_date' => $date_time
                ]
            );

            AirBookingPayment::insert(
                [
                    'a_payment_id' => $payId,
                    'a_booking_id' => $a_bookingId,
                    'booking_id' => session('a_booking_id'),
                    'invoice_id' => $bookingInf->invoice_id,
                    'amount' => $amount,
                    'is_remove' => 0,
                    'add_date' => $date_time,
                    'update_date' => $date_time
                ]
            );
            $userInfos = UserInfo::
            where([
                    ['is_remove', '=', 0]
                ])
                ->get();
            if (count($userInfos) != 0) {
                foreach ($userInfos as $userInfo) {
                    $triggerId = "TR" . uniqid();
                    TriggerLoad::insert(
                        [

                            'trigger_id' => $triggerId,
                            'change_type' => 2,
                            'user_id' => $userInfo->user_id,
                            'change_id' => $a_bookingId,
                            'change_date_one' => $bookingDate,
                            'change_time' => $bookingTime,
                            'change_status' => 0,
                            'add_date' => $date_time

                        ]
                    );
                }
            }

            $checkPayInfo = CheckOutPayment::
            where([
                    ['invoice_id', '=', $bookingInf->invoice_id],
                ])
                ->first();
            $newAmount = $checkPayInfo->total_amount + $amount;
            $status = 0;
            $statVal = ($newAmount-$checkPayInfo->discount_amount) - $checkPayInfo->paid_amount;
            if ($statVal == 0)
                $status = 1;
            else
                $status = 0;
            CheckOutPayment::
            where([
                    ['invoice_id', '=', $bookingInf->invoice_id],
                ])
                ->update(
                    [
                        'total_amount' => $newAmount,
                        'status' => $status
                    ]
                );


            $dateTime = $bookingDate . " " . $bookingTime;
            if (session()->has('cmt'))
                session()->put('cmt', $dateTime);
            else
                session(['cmt' => $dateTime]);
            return redirect('receptionist/res_airport_booking_success');
        }
        else {
            session()->flush();
            return redirect('/');
        }

    }

    public function resAirportBookingSuccess(){
        if (session()->has('user_id')) {
            $bookingInfos = BookingInfo::
            where([
                    ['is_remove', '=', 0],
                    ['status', '=', 2]
                ])
                ->orderBy('add_date', 'desc')
                ->get();
            $bookingInf = BookingInfo::
            where([
                    ['is_remove', '=', 0],
                    ['status', '=', 2]
                ])
                ->orderBy('add_date', 'desc')
                ->first();

            if (session()->has('a_booking_id')) {

                session()->put('a_booking_id', session('a_booking_id'));
            } else {

                session([
                    'a_booking_id' => $bookingInf->booking_id,
                ]);
            }
            return view('receptionist.airPortBooking', compact('bookingInfos'))->with(
                [
                    'msg' => 1,
                    'cmt' => session('cmt')
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }

    }

    public function resIndexAirportBookingList(){
        if (session()->has('user_id')) {
            $aBookingInfos = AirPortBookingInfo::
            where([
                    ['is_remove', '=', 0],
                    ['check_out_status', '=', 0],
                ])
                ->orderBy('add_date', 'desc')
                ->get();
            return view('receptionist.airBookingList', compact('aBookingInfos'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }
    public function resIndexAirportCheckBookingList(){
        if (session()->has('user_id')) {
            $aBookingInfos = AirPortBookingInfo::
            where([
                    ['is_remove', '=', 0],
                    ['check_out_status', '=', 1],
                ])
                ->orderBy('add_date', 'desc')
                ->get();
            return view('receptionist.airCheckBookingList', compact('aBookingInfos'))->with(
                [
                    'msg' => 8,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resAllBookingList()
    {
        if (session()->has('user_id')) {
            date_default_timezone_set('Asia/Colombo');
            $todayDate = date("Y-m-d");
            $tomorrowDate = date_create($todayDate);
            date_add($tomorrowDate, date_interval_create_from_date_string("1 days"));
            $tomorrowDate = date_format($tomorrowDate, "Y-m-d");
            if (session()->has('b_to_date')) {
                session()->put('b_to_date', session('b_to_date'));
                session()->put('b_from_date', session('b_from_date'));
            } else {
                session([
                    'b_to_date' => $tomorrowDate,
                    'b_from_date' => $todayDate
                ]);
            }

            $bookingInfos = BookingInfo::
            where([
                    ['is_remove', '=', 0],
                ])
                ->orderBy('add_date', 'des')
                ->get();

            return view('receptionist.bookingList', compact('bookingInfos'))->with(
                [
                    'msg' => 5,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resBookingSearchP(Request $request){
        if (session()->has('user_id')) {
            $toDate = $request->input('to_date');
            $fromDate = $request->input('from_date');
            if (session()->has('b_to_date')) {

                session()->put('b_to_date', $toDate);
                session()->put('b_from_date', $fromDate);
            } else {

                session([
                    'b_to_date' => $toDate,
                    'b_from_date' => $fromDate
                ]);
            }
            return redirect('receptionist/res_booking_search');
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resCheckBookingSearchP(Request $request){
        if (session()->has('user_id')) {
            $toDate = $request->input('to_date');
            $fromDate = $request->input('from_date');
            if (session()->has('b_to_date')) {

                session()->put('b_to_date', $toDate);
                session()->put('b_from_date', $fromDate);
            } else {

                session([
                    'b_to_date' => $toDate,
                    'b_from_date' => $fromDate
                ]);
            }
            return redirect('receptionist/res_check_booking_search');
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resBookingSearch(){
        //AAr
        if (session()->has('user_id')) {
            $to = session('b_from_date');
            $from = session('b_to_date');
            $bookingInfos = BookingInfo::
            whereDate('to_date', '>=', $to)
                ->whereDate('from_date', '<=', $from)
                ->where([
                    ['check_out_status', '=', 0],
                ])
                ->get();

            return view('receptionist.bookingList', compact('bookingInfos'))->with(
                [
                    'msg' => 9,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }

    }



    public function resCheckBookingSearch(){
        if (session()->has('user_id')) {
            $to = session('b_from_date');
            $from = session('b_to_date');
            $bookingInfos = BookingInfo::
            whereDate('to_date', '>=', $to)
                ->whereDate('from_date', '<=', $from)
                ->get();

            return view('receptionist.checkOutBookingList', compact('bookingInfos'))->with(
                [
                    'msg' => 1,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }

    }

    public function resReMealsBooking($id){
        if (session()->has('user_id')) {
            if (session()->has('o_booking_id')) {

                session()->put('o_booking_id', $id);
            } else {

                session([
                    'o_booking_id' => $id,
                ]);
            }
            return redirect('receptionist/res_index_order_meals');
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resReAirBooking($id){
        if (session()->has('user_id')) {
            if (session()->has('a_booking_id')) {

                session()->put('a_booking_id', $id);
            } else {

                session([
                    'a_booking_id' => $id,
                ]);
            }

            return redirect('receptionist/res_index_airport_booking');
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resIndexPaymentCheckOut()
    {
        if (session()->has('user_id')) {
            $checkOutInfos = CheckOutPayment::
            where([
                    ['is_remove', '=', 0],
                    ['status', '=', 0]
                ])
                ->get();

               // foreach(getBookingPay($checkOutInfo->invoice_id) as $roomsBooking)
           // dd($checkOutInfos);
                //  foreach($checkOutInfos as $checkOutInfo){
                //  foreach($this->getBookingPay($checkOutInfo->invoice_id) as $roomsBooking){
                //     echo $roomsBooking->booking_id."<br>";
                //  }
                // }
                 //echo $checkOutInfo->invoice_id."<br>";
                //INV0000005796

            return view('receptionist.checkOutPayment', compact('checkOutInfos'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resAddCheckOut($id)
    {
        if (session()->has('user_id')) {
            date_default_timezone_set('Asia/Colombo');
            $date_time = date("Y-m-d H:i:s");
            CheckOutPayment::
            where([
                    ['invoice_id', '=', $id],
                ])
                ->update(
                    [
                        'check_out_status' => 1,
                        'update_date' => $date_time
                    ]
                );
            BookingInfo::
            where([
                    ['invoice_id', '=', $id],
                ])
                ->update(
                    [
                        'check_out_status' => 1,
                    ]
                );

            $orderInf = OrderInfo::
            where([
                    ['invoice_id', '=', $id],
                ])
                ->get();
            if (count($orderInf) != 0) {
                OrderInfo::
                where([
                        ['invoice_id', '=', $id],
                    ])
                    ->update(
                        [
                            'check_out_status' => 1,
                        ]
                    );
            }
            $airInfo = AirPortBookingInfo::
            where([
                    ['invoice_id', '=', $id],
                ])
                ->get();
            if (count($airInfo) != 0) {
                AirPortBookingInfo::
                where([
                        ['invoice_id', '=', $id],
                    ])
                    ->update(
                        [
                            'check_out_status' => 1,
                        ]
                    );
            }


            if (session()->has('res_check_inv_id')) {

                session()->put('res_check_inv_id', $id);
            } else {

                session([
                    'res_check_inv_id' => $id,
                ]);
            }
            return redirect('receptionist/res_check_out_success');

        }
        else {
            session()->flush();
            return redirect('/');
        }


    }

    public function resCheckOutSuccess()
    {
        if (session()->has('user_id')) {
            $checkOutInfos = CheckOutPayment::
            where([
                    ['is_remove', '=', 0],
                    ['status', '=', 1],
                    ['check_out_status', '=', 1],
                    ['invoice_id', '=', session('res_check_inv_id')],
                ])
                ->get();

            return view('receptionist.finalCheckOut', compact('checkOutInfos'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resCheckOutInfo()
    {
       /* if (session()->has('user_id')) {
            $checkOutInfos = CheckOutPayment::
            where([
                    ['is_remove', '=', 0],
                    ['status', '=', 1],
                    ['check_out_status', '=', 1]
                ])
                ->get();

            return view('receptionist.finalCheckOut', compact('checkOutInfos'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }*/

        if (session()->has('user_id')) {
            date_default_timezone_set('Asia/Colombo');
            $todayDate = date("Y-m-d");
            if (session()->has('search_date_final_check_from')) {

                session()->put('search_date_final_check_from',session('search_date_final_check_from'));
                session()->put('search_date_final_check_to',session('search_date_final_check_to'));
            } else {

                session([
                    'search_date_final_check_from' => $todayDate,
                    'search_date_final_check_to' => $todayDate
                ]);
            }
            $checkOutInfos = CheckOutPayment::
            whereDate('update_date', '>=', session('search_date_final_check_from'))
                ->whereDate('update_date', '<=', session('search_date_final_check_to'))
                ->where([
                    ['status', '=', 1],
                    ['check_out_status', '=', 1]
                ])
                ->get();

            return view('receptionist.finalCheckOut', compact('checkOutInfos'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resIndexPaidPayment()
    {
        if (session()->has('user_id')) {
            $checkOutInfos = CheckOutPayment::
            where([
                    ['is_remove', '=', 0],
                    ['status', '=', 1],
                    ['check_out_status', '=', 0]
                ])
                ->get();

            return view('receptionist.paidPayment', compact('checkOutInfos'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resPaymentCheckOut($id)
    {
        if (session()->has('user_id')) {
            $checkOutInfos = CheckOutPayment::
            where([
                    ['is_remove', '=', 0],
                    ['invoice_id', '=', $id],
                ])
                ->get();

            $checkOutInf = CheckOutPayment::
            where([
                    ['is_remove', '=', 0],
                    ['invoice_id', '=', $id],
                ])
                ->first();
            // dd($checkOutInfos);
            $resVal = ($checkOutInf->total_amount-$checkOutInf->discount_amount) - $checkOutInf->paid_amount;
            if ($resVal == 0 && $checkOutInf->check_out_status == 0) {
                return view('receptionist.paidPayment', compact('checkOutInfos'))->with(
                    [
                        'msg' => 0,
                        'cmt' => 'init'
                    ]
                );
            } else if ($resVal == 0 && $checkOutInf->check_out_status == 1) {
                return view('receptionist.finalCheckOut', compact('checkOutInfos'))->with(
                    [
                        'msg' => 0,
                        'cmt' => 'init'
                    ]
                );
            } else {
                return view('receptionist.checkOutPayment', compact('checkOutInfos'))->with(
                    [
                        'msg' => 0,
                        'cmt' => 'init'
                    ]
                );
            }
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }



    public function resIndexPaymentPreview($id){
        if (session()->has('user_id')) {
            $aBookingPayments = AirBookingPayment::
            where([
                    ['is_remove', '=', 0],
                    ['invoice_id', '=', $id]
                ])
                ->orderBy('add_date', 'desc')
                ->get();
            $orderPayments = OrderPayment::
            where([
                    ['is_remove', '=', 0],
                    ['invoice_id', '=', $id]
                ])
                ->orderBy('add_date', 'desc')
                ->get();
            $roomsBookings = BookingPaymentInfo::
            where([
                    ['is_remove', '=', 0],
                    ['invoice_id', '=', $id]
                ])
                ->orderBy('add_date', 'desc')
                ->get();

            if (session()->has('p_invoice_id')) {

                session()->put('p_invoice_id', $id);
            } else {

                session([
                    'p_invoice_id' => $id,
                ]);
            }

            return view('receptionist.previewPayment', compact('aBookingPayments', 'orderPayments', 'roomsBookings'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resPrintBill($id){
        if (session()->has('user_id')) {
            $aBookingPayments = AirBookingPayment::
            where([
                    ['is_remove', '=', 0],
                    ['invoice_id', '=', $id]
                ])
                ->orderBy('add_date', 'desc')
                ->get();
            $orderPayments = OrderPayment::
            where([
                    ['is_remove', '=', 0],
                    ['invoice_id', '=', $id]
                ])
                ->orderBy('add_date', 'desc')
                ->get();
            $roomsBookings = BookingPaymentInfo::
            where([
                    ['is_remove', '=', 0],
                    ['invoice_id', '=', $id]
                ])
                ->orderBy('add_date', 'desc')
                ->get();
            $checkOutPayInfo = CheckOutPayment::
            where([
                    ['is_remove', '=', 0],
                    ['invoice_id', '=', $id]
                ])
                ->first();

            $paymentHstys = PaymentHistory::
            where([
                    ['is_remove', '=', 0],
                    ['invoice_id', '=', $id]
                ])
                ->get();

            if (session()->has('p_invoice_id')) {

                session()->put('p_invoice_id', $id);
            } else {

                session([
                    'p_invoice_id' => $id,
                ]);
            }

            if (session()->has('pay_invoice')) {
                session()->put('pay_invoice', $id);
            } else {
                session([
                    'pay_invoice' => $id,
                ]);
            }


            $statVal = ($checkOutPayInfo->total_amount-$checkOutPayInfo->discount_amount) - $checkOutPayInfo->paid_amount;
            $status = 0;
            if ($statVal == 0)
                $status = 1;
            else
                $status = 0;
            CheckOutPayment::
            where([
                    ['invoice_id', '=', $id],
                ])
                ->update(
                    [
                        'bill_lock' => $status,
                    ]
                );


            return view('receptionist.printTemp', compact('aBookingPayments', 'orderPayments', 'roomsBookings', 'checkOutPayInfo', 'paymentHstys'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }


    }

    public function resBillPayment($id){
        if (session()->has('user_id')) {
            $aBookingPayments = AirBookingPayment::
            where([
                    ['is_remove', '=', 0],
                    ['invoice_id', '=', $id]
                ])
                ->orderBy('add_date', 'desc')
                ->get();
            $orderPayments = OrderPayment::
            where([
                    ['is_remove', '=', 0],
                    ['invoice_id', '=', $id]
                ])
                ->orderBy('add_date', 'desc')
                ->get();
            $roomsBookings = BookingPaymentInfo::
            where([
                    ['is_remove', '=', 0],
                    ['invoice_id', '=', $id]
                ])
                ->orderBy('add_date', 'desc')
                ->get();
            $checkOutPayInfo = CheckOutPayment::
            where([
                    ['is_remove', '=', 0],
                    ['invoice_id', '=', $id]
                ])
                ->first();

            $paymentHstys = PaymentHistory::
            where([
                    ['is_remove', '=', 0],
                    ['invoice_id', '=', $id]
                ])
                ->get();

            if (session()->has('p_invoice_id')) {

                session()->put('p_invoice_id', $id);
            } else {

                session([
                    'p_invoice_id' => $id,
                ]);
            }

            return view('receptionist.billPayment', compact('aBookingPayments', 'orderPayments', 'roomsBookings', 'checkOutPayInfo', 'paymentHstys'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }





    }

    public function resReRoomBooking($id){
        if (session()->has('user_id')) {
            $bookIn = BookingInfo::
            where([
                    ['booking_id', '=', $id],
                ])
                ->first();
            if (session()->has('r_b_index')) {

                session()->put('r_b_invoice_id', $bookIn->invoice_id);
                session()->put('r_b_index', 1);
            } else {

                session([
                    'r_b_invoice_id' => $bookIn->invoice_id,
                    'r_b_index' => 1
                ]);
            }
            return redirect('receptionist/res_check_map');
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    
    public function resRemoveBooking($id)
    {
        if (session()->has('user_id')) {
            $bookingIn = BookingInfo::
            where([
                    ['booking_id', '=', $id],
                ])
                ->first();
            if (session()->has('b_to_date')) {

                session()->put('b_to_date', $bookingIn->to_date);
                session()->put('b_from_date', $bookingIn->from_date);
            } else {

                session([
                    'b_to_date' => $bookingIn->to_date,
                    'b_from_date' => $bookingIn->from_date
                ]);
            }

            $bookingInfo = BookingInfo::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();
            $bookingPayment = BookingPaymentInfo::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();

            $orderInfo = OrderInfo::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();
            $orderPayInf = OrderPayment::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();

            $airBookInf = AirPortBookingInfo::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();

            $airBookPay = AirBookingPayment::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();

            $checkOutPay = CheckOutPayment::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();

            $payHis = PaymentHistory::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();


            if (count($bookingInfo) == 1) {
                BookingInfo::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->delete();
                if (count($bookingPayment) != 0) {
                    BookingPaymentInfo::
                    where([
                            ['invoice_id', '=', $bookingIn->invoice_id],
                        ])
                        ->delete();
                }
                if (count($orderInfo) != 0) {
                    OrderInfo::
                    where([
                            ['invoice_id', '=', $bookingIn->invoice_id],
                        ])
                        ->delete();
                }
                if (count($orderPayInf) != 0) {
                    OrderPayment::
                    where([
                            ['invoice_id', '=', $bookingIn->invoice_id],
                        ])
                        ->delete();
                }
                if (count($airBookInf) != 0) {
                    AirPortBookingInfo::
                    where([
                            ['invoice_id', '=', $bookingIn->invoice_id],
                        ])
                        ->delete();
                }
                if (count($airBookPay) != 0) {
                    AirBookingPayment::
                    where([
                            ['invoice_id', '=', $bookingIn->invoice_id],
                        ])
                        ->delete();
                }
                if (count($checkOutPay) != 0) {
                    CheckOutPayment::
                    where([
                            ['invoice_id', '=', $bookingIn->invoice_id],
                        ])
                        ->delete();
                }
                if (count($payHis) != 0) {
                    PaymentHistory::
                    where([
                            ['invoice_id', '=', $bookingIn->invoice_id],
                        ])
                        ->delete();
                }
            } else {


                $bookPAmount = BookingPaymentInfo::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->sum('total_amount');
                //   dd($bookPAmount);
                $MealsPAmount = OrderPayment::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->sum('amount');
                $airPAmount = AirBookingPayment::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->sum('amount');

                $prAmount = CheckOutPayment::
                where([
                        ['invoice_id', '=', $bookingIn->invoice_id],
                    ])
                    ->first();

                $totalAmount = $bookPAmount + $MealsPAmount + $airPAmount;
                $balAmount = $prAmount->total_amount - $totalAmount;
                date_default_timezone_set('Asia/Colombo');
                $date_time = date("Y-m-d H:i:s");
                CheckOutPayment::
                where([
                        ['invoice_id', '=', $bookingIn->invoice_id],
                    ])
                    ->update(
                        [
                            'total_amount' => $balAmount,
                            'update_date' => $date_time
                        ]
                    );

                BookingInfo::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->delete();

                BookingPaymentInfo::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->delete();
                OrderPayment::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->delete();

                AirBookingPayment::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->delete();

                AirPortBookingInfo::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->delete();

                BookingInfo::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->delete();

                OrderInfo::where([
                    ['booking_id', '=', $id],
                ])
                    ->delete();


            }


            return redirect('receptionist/res_remove_booking_success');
        }
        else {
            session()->flush();
            return redirect('/');
        }



    }

    public function resRemoveBookingFromFrontMonthly($id){
        if (session()->has('user_id')) {
            $bookingIn = BookingInfo::
            where([
                    ['booking_id', '=', $id],
                ])
                ->first();
            if (session()->has('b_to_date')) {

                session()->put('b_to_date', $bookingIn->to_date);
                session()->put('b_from_date', $bookingIn->from_date);
            } else {

                session([
                    'b_to_date' => $bookingIn->to_date,
                    'b_from_date' => $bookingIn->from_date
                ]);
            }

            $bookingInfo = BookingInfo::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();
            $bookingPayment = BookingPaymentInfo::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();

            $orderInfo = OrderInfo::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();
            $orderPayInf = OrderPayment::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();

            $airBookInf = AirPortBookingInfo::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();

            $airBookPay = AirBookingPayment::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();

            $checkOutPay = CheckOutPayment::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();

            $payHis = PaymentHistory::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();


            if (count($bookingInfo) == 1) {
                BookingInfo::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->delete();
                if (count($bookingPayment) != 0) {
                    BookingPaymentInfo::
                    where([
                            ['invoice_id', '=', $bookingIn->invoice_id],
                        ])
                        ->delete();
                }
                if (count($orderInfo) != 0) {
                    OrderInfo::
                    where([
                            ['invoice_id', '=', $bookingIn->invoice_id],
                        ])
                        ->delete();
                }
                if (count($orderPayInf) != 0) {
                    OrderPayment::
                    where([
                            ['invoice_id', '=', $bookingIn->invoice_id],
                        ])
                        ->delete();
                }
                if (count($airBookInf) != 0) {
                    AirPortBookingInfo::
                    where([
                            ['invoice_id', '=', $bookingIn->invoice_id],
                        ])
                        ->delete();
                }
                if (count($airBookPay) != 0) {
                    AirBookingPayment::
                    where([
                            ['invoice_id', '=', $bookingIn->invoice_id],
                        ])
                        ->delete();
                }
                if (count($checkOutPay) != 0) {
                    CheckOutPayment::
                    where([
                            ['invoice_id', '=', $bookingIn->invoice_id],
                        ])
                        ->delete();
                }
                if (count($payHis) != 0) {
                    PaymentHistory::
                    where([
                            ['invoice_id', '=', $bookingIn->invoice_id],
                        ])
                        ->delete();
                }
            } else {


                $bookPAmount = BookingPaymentInfo::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->sum('total_amount');
                //   dd($bookPAmount);
                $MealsPAmount = OrderPayment::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->sum('amount');
                $airPAmount = AirBookingPayment::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->sum('amount');

                $prAmount = CheckOutPayment::
                where([
                        ['invoice_id', '=', $bookingIn->invoice_id],
                    ])
                    ->first();

                $totalAmount = $bookPAmount + $MealsPAmount + $airPAmount;
                $balAmount = $prAmount->total_amount - $totalAmount;
                date_default_timezone_set('Asia/Colombo');
                $date_time = date("Y-m-d H:i:s");
                CheckOutPayment::
                where([
                        ['invoice_id', '=', $bookingIn->invoice_id],
                    ])
                    ->update(
                        [
                            'total_amount' => $balAmount,
                            'update_date' => $date_time
                        ]
                    );

                BookingInfo::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->delete();

                BookingPaymentInfo::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->delete();
                OrderPayment::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->delete();

                AirBookingPayment::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->delete();

                AirPortBookingInfo::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->delete();

                BookingInfo::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->delete();

                OrderInfo::where([
                    ['booking_id', '=', $id],
                ])
                    ->delete();


            }


            return redirect('receptionist/res_monthly_map');
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resRemoveBookingFromFrontBulk($id){
        if (session()->has('user_id')) {
            $bookingIn = BookingInfo::
            where([
                    ['booking_id', '=', $id],
                ])
                ->first();
            if (session()->has('b_to_date')) {

                session()->put('b_to_date', $bookingIn->to_date);
                session()->put('b_from_date', $bookingIn->from_date);
            } else {

                session([
                    'b_to_date' => $bookingIn->to_date,
                    'b_from_date' => $bookingIn->from_date
                ]);
            }

            $bookingInfo = BookingInfo::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();
            $bookingPayment = BookingPaymentInfo::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();

            $orderInfo = OrderInfo::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();
            $orderPayInf = OrderPayment::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();

            $airBookInf = AirPortBookingInfo::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();

            $airBookPay = AirBookingPayment::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();

            $checkOutPay = CheckOutPayment::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();

            $payHis = PaymentHistory::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();


            if (count($bookingInfo) == 1) {
                BookingInfo::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->delete();
                if (count($bookingPayment) != 0) {
                    BookingPaymentInfo::
                    where([
                            ['invoice_id', '=', $bookingIn->invoice_id],
                        ])
                        ->delete();
                }
                if (count($orderInfo) != 0) {
                    OrderInfo::
                    where([
                            ['invoice_id', '=', $bookingIn->invoice_id],
                        ])
                        ->delete();
                }
                if (count($orderPayInf) != 0) {
                    OrderPayment::
                    where([
                            ['invoice_id', '=', $bookingIn->invoice_id],
                        ])
                        ->delete();
                }
                if (count($airBookInf) != 0) {
                    AirPortBookingInfo::
                    where([
                            ['invoice_id', '=', $bookingIn->invoice_id],
                        ])
                        ->delete();
                }
                if (count($airBookPay) != 0) {
                    AirBookingPayment::
                    where([
                            ['invoice_id', '=', $bookingIn->invoice_id],
                        ])
                        ->delete();
                }
                if (count($checkOutPay) != 0) {
                    CheckOutPayment::
                    where([
                            ['invoice_id', '=', $bookingIn->invoice_id],
                        ])
                        ->delete();
                }
                if (count($payHis) != 0) {
                    PaymentHistory::
                    where([
                            ['invoice_id', '=', $bookingIn->invoice_id],
                        ])
                        ->delete();
                }
            } else {


                $bookPAmount = BookingPaymentInfo::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->sum('total_amount');
                //   dd($bookPAmount);
                $MealsPAmount = OrderPayment::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->sum('amount');
                $airPAmount = AirBookingPayment::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->sum('amount');

                $prAmount = CheckOutPayment::
                where([
                        ['invoice_id', '=', $bookingIn->invoice_id],
                    ])
                    ->first();

                $totalAmount = $bookPAmount + $MealsPAmount + $airPAmount;
                $balAmount = $prAmount->total_amount - $totalAmount;
                date_default_timezone_set('Asia/Colombo');
                $date_time = date("Y-m-d H:i:s");
                CheckOutPayment::
                where([
                        ['invoice_id', '=', $bookingIn->invoice_id],
                    ])
                    ->update(
                        [
                            'total_amount' => $balAmount,
                            'update_date' => $date_time
                        ]
                    );

                BookingInfo::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->delete();

                BookingPaymentInfo::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->delete();
                OrderPayment::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->delete();

                AirBookingPayment::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->delete();

                AirPortBookingInfo::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->delete();

                BookingInfo::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->delete();

                OrderInfo::where([
                    ['booking_id', '=', $id],
                ])
                    ->delete();


            }


            return redirect('receptionist/res_check_map_bulk');
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }


    public function resRemoveBookingFromFront($id){
        if (session()->has('user_id')) {
            $bookingIn = BookingInfo::
            where([
                    ['booking_id', '=', $id],
                ])
                ->first();
            if (session()->has('b_to_date')) {

                session()->put('b_to_date', $bookingIn->to_date);
                session()->put('b_from_date', $bookingIn->from_date);
            } else {

                session([
                    'b_to_date' => $bookingIn->to_date,
                    'b_from_date' => $bookingIn->from_date
                ]);
            }

            $bookingInfo = BookingInfo::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();
            $bookingPayment = BookingPaymentInfo::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();

            $orderInfo = OrderInfo::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();
            $orderPayInf = OrderPayment::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();

            $airBookInf = AirPortBookingInfo::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();

            $airBookPay = AirBookingPayment::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();

            $checkOutPay = CheckOutPayment::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();

            $payHis = PaymentHistory::
            where([
                    ['invoice_id', '=', $bookingIn->invoice_id],
                ])
                ->get();


            if (count($bookingInfo) == 1) {
                BookingInfo::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->delete();
                if (count($bookingPayment) != 0) {
                    BookingPaymentInfo::
                    where([
                            ['invoice_id', '=', $bookingIn->invoice_id],
                        ])
                        ->delete();
                }
                if (count($orderInfo) != 0) {
                    OrderInfo::
                    where([
                            ['invoice_id', '=', $bookingIn->invoice_id],
                        ])
                        ->delete();
                }
                if (count($orderPayInf) != 0) {
                    OrderPayment::
                    where([
                            ['invoice_id', '=', $bookingIn->invoice_id],
                        ])
                        ->delete();
                }
                if (count($airBookInf) != 0) {
                    AirPortBookingInfo::
                    where([
                            ['invoice_id', '=', $bookingIn->invoice_id],
                        ])
                        ->delete();
                }
                if (count($airBookPay) != 0) {
                    AirBookingPayment::
                    where([
                            ['invoice_id', '=', $bookingIn->invoice_id],
                        ])
                        ->delete();
                }
                if (count($checkOutPay) != 0) {
                    CheckOutPayment::
                    where([
                            ['invoice_id', '=', $bookingIn->invoice_id],
                        ])
                        ->delete();
                }
                if (count($payHis) != 0) {
                    PaymentHistory::
                    where([
                            ['invoice_id', '=', $bookingIn->invoice_id],
                        ])
                        ->delete();
                }
            } else {


                $bookPAmount = BookingPaymentInfo::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->sum('total_amount');
                //   dd($bookPAmount);
                $MealsPAmount = OrderPayment::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->sum('amount');
                $airPAmount = AirBookingPayment::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->sum('amount');

                $prAmount = CheckOutPayment::
                where([
                        ['invoice_id', '=', $bookingIn->invoice_id],
                    ])
                    ->first();

                $totalAmount = $bookPAmount + $MealsPAmount + $airPAmount;
                $balAmount = $prAmount->total_amount - $totalAmount;
                date_default_timezone_set('Asia/Colombo');
                $date_time = date("Y-m-d H:i:s");
                CheckOutPayment::
                where([
                        ['invoice_id', '=', $bookingIn->invoice_id],
                    ])
                    ->update(
                        [
                            'total_amount' => $balAmount,
                            'update_date' => $date_time
                        ]
                    );

                BookingInfo::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->delete();

                BookingPaymentInfo::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->delete();
                OrderPayment::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->delete();

                AirBookingPayment::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->delete();

                AirPortBookingInfo::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->delete();

                BookingInfo::
                where([
                        ['booking_id', '=', $id],
                    ])
                    ->delete();

                OrderInfo::where([
                    ['booking_id', '=', $id],
                ])
                    ->delete();


            }


            return redirect('receptionist/res_check_map');
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resRemoveBookingSuccess()
    {
        if (session()->has('user_id')) {
            $to = session('b_from_date');
            $from = session('b_to_date');

            $bookingInfos = BookingInfo::
            whereDate('to_date', '>=', $to)
                ->whereDate('from_date', '<=', $from)
                ->orderBy('update_date', 'des')
                ->get();

            return view('receptionist.bookingList', compact('bookingInfos'))->with(
                [
                    'msg' => 2,
                    'cmt' => session('s_inv_id')
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }




    public function getCustomerId($id)
    {

        $bookingInfo=BookingInfo::
        where([
                ['is_remove', '=',0],
                ['invoice_id', '=',$id]
            ])
            ->first();
        if($bookingInfo!=null)
        return $bookingInfo->customer_id;
        else
        return null;
    }

    public function resBookingDetails($id){
        //dd($id);
        if (session()->has('user_id')) {
            $bookingInfo = BookingInfo::
            where([
                    ['is_remove', '=', 0],
                    ['booking_id', '=', $id]
                ])
                ->first();

            if (session()->has('b_to_date')) {
                session()->put('b_to_date', $bookingInfo->to_date);
                session()->put('b_from_date', $bookingInfo->from_date);
            } else {
                session([
                    'b_to_date' => $bookingInfo->to_date,
                    'b_from_date' => $bookingInfo->from_date
                ]);
            }
            $bookingInfos = BookingInfo::
            whereDate('to_date', '>=', session('b_to_date'))
                ->whereDate('from_date', '<=', session('b_from_date'))
                ->get();


            return view('receptionist.bookingList', compact('bookingInfos'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resOrderDetails($id){
      //  dd($id);
        if (session()->has('user_id')) {
            $orderInfos = OrderInfo::
            where([
                    ['is_remove', '=', 0],
                    ['order_id', '=', $id]
                ])
                ->get();


            return view('receptionist.orderList', compact('orderInfos'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resAirportBookingDetails($id){
        if (session()->has('user_id')) {
            $aBookingInfos = AirPortBookingInfo::
            where([
                    ['is_remove', '=', 0],
                    ['a_booking_id', '=', $id]

                ])
                ->get();
            //dd($aBookingInfos);
            return view('receptionist.airBookingList', compact('aBookingInfos'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resAddPayment(Request $request){
        if (session()->has('user_id')) {
            $invoiceID = $request->input('invoice_id');
            $outStandingAmount = $request->input('out_stand_amount');
            $bookingType = $request->input('booking_type');
            $cardType = $request->input('card_type');
            $cardNumber = $request->input('card_number');
            $paidAmount = $request->input('paid_amount');
            $balanceAmount = $outStandingAmount - $paidAmount;
            $bAmount = $request->input('bal_amount');
            date_default_timezone_set('Asia/Colombo');
            $date_time = date("Y-m-d H:i:s");

            $checkOutInf = CheckOutPayment::
            where([
                    ['invoice_id', '=', $invoiceID],
                ])
                ->first();
            $actualAddAmount = $paidAmount - $bAmount;
            $balanceAmount = $outStandingAmount - $actualAddAmount;

            $updateAmount = $checkOutInf->paid_amount + $actualAddAmount;

            $status = 0;
            $strVal = ($checkOutInf->total_amount-$checkOutInf->discount_amount) - $updateAmount;

            if ($strVal == 0)
                $status = 1;
            else
                $status = 0;

            CheckOutPayment::
            where([
                    ['invoice_id', '=', $invoiceID],
                ])
                ->update(
                    [
                        'paid_amount' => $updateAmount,
                        'status' => $status,
                        'bill_lock' => 0,
                        'update_date' => $date_time
                    ]
                );

            $historyID = "PH" . uniqid();

            PaymentHistory::insert(
                [
                    'history_id' => $historyID,
                    'invoice_id' => $invoiceID,
                    'payment_type' => $bookingType,
                    'out_amount' => $outStandingAmount,
                    'paid_amount' => $actualAddAmount,
                    'balance_amount' => $balanceAmount,
                    'card_type' => $cardType,
                    'card_number' => $cardNumber,
                    'is_remove' => 0,
                    'add_date' => $date_time,
                    'update_date' => $date_time
                ]
            );

            if (session()->has('pay_invoice')) {
                session()->put('pay_invoice', $invoiceID);
            } else {
                session([
                    'pay_invoice' => $invoiceID,
                ]);
            }


            if ($strVal == 0)
                return redirect('receptionist/res_add_payment_success1');
            else
                return redirect('receptionist/res_add_payment_success');
        }
        else {
            session()->flush();
            return redirect('/');
        }


    }

    public function resAddPaymentSuccess()
    {
        if (session()->has('user_id')) {
            $checkOutInfos = CheckOutPayment::
            where([
                    ['is_remove', '=', 0],
                    ['invoice_id', '=', session('pay_invoice')]
                ])
                ->orderBy('update_date', 'des')
                ->get();

            return view('receptionist.checkOutPayment', compact('checkOutInfos'))->with(
                [
                    'msg' => 1,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resAddPaymentSuccess1()
    {
        if (session()->has('user_id')) {
            $checkOutInfos = CheckOutPayment::
            where([
                    ['is_remove', '=', 0],
                    ['invoice_id', '=', session('pay_invoice')]
                ])
                ->orderBy('update_date', 'des')
                ->get();

            return view('receptionist.paidPayment', compact('checkOutInfos'))->with(
                [
                    'msg' => 1,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }


    public function resStopProcess($id){
        if (session()->has('user_id')) {
            $bookingInfo = BookingInfo::
            where([
                    ['booking_id', '=', $id],
                ])
                ->first();
            if (session()->has('b_to_date')) {

                session()->put('b_to_date', $bookingInfo->to_date);
                session()->put('b_from_date', $bookingInfo->from_date);
            } else {

                session([
                    'b_to_date' => $bookingInfo->to_date,
                    'b_from_date' => $bookingInfo->from_date
                ]);
            }

            BookingInfo::
            where([
                    ['booking_id', '=', $id],
                ])
                ->delete();

            return redirect('receptionist/res_stop_booking_process');
        }
        else {
            session()->flush();
            return redirect('/');
        }


    }

    public function resBookingStopProcess()
    {
        if (session()->has('user_id')) {
            $to = session('b_from_date');
            $from = session('b_to_date');

            $bookingInfos = BookingInfo::
            whereDate('to_date', '>=', $to)
                ->whereDate('from_date', '<=', $from)
                ->orderBy('update_date', 'des')
                ->get();

            return view('receptionist.bookingList', compact('bookingInfos'))->with(
                [
                    'msg' => 3,
                    'cmt' => session('s_inv_id')
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }


    public function resIndexAddCustomer(){
        if (session()->has('user_id')) {
            return view('receptionist.addCustomer')->with(
                [
                    'msg' => 0,
                    'cmt' => 'initial'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resAddCustomer(Request $request)
    {
        if (session()->has('user_id')) {
            $cusFirstName = $request->input('cus_first_name');
            $cusLastName = $request->input('cus_last_name');
            $email = $request->input('cus_mail');
            $phone = $request->input('cus_phone');
            $nicPassport = $request->input('cus_nic_pass');
            $address = $request->input('cus_address');

            date_default_timezone_set('Asia/Colombo');
            $date_time = date("Y-m-d H:i:s");
            $userId = "CUS_" . uniqid();
            $name = $cusFirstName . " " . $cusLastName;
            if ($email == "") {
                CustomerInfo::insert(
                    [
                        'cus_id' => $userId,
                        'cus_first_name' => $cusFirstName,
                        'cus_last_name' => $cusLastName,
                        'cus_phone' => $phone,
                        'cus_email' => $email,
                        'cus_nic_pass' => $nicPassport,
                        'cus_address' => $address,
                        'is_remove' => 0,
                        'add_date' => $date_time,
                        'update_date' => $date_time

                    ]
                );

                if (session()->has('cmt'))
                    session()->put('cmt', $name);
                else
                    session(['cmt' => $name]);
                return redirect('receptionist/res_add_cus_success');

            } else {
                $cusCount = CustomerInfo::
                where([
                        ['cus_email', '=', $email],
                    ])
                    ->get();

                if (count($cusCount) == 0) {

                    CustomerInfo::insert(
                        [
                            'cus_id' => $userId,
                            'cus_first_name' => $cusFirstName,
                            'cus_last_name' => $cusLastName,
                            'cus_phone' => $phone,
                            'cus_email' => $email,
                            'cus_nic_pass' => $nicPassport,
                            'cus_address' => $address,
                            'is_remove' => 0,
                            'add_date' => $date_time,
                            'update_date' => $date_time

                        ]
                    );

                    if (session()->has('cmt'))
                        session()->put('cmt', $name);
                    else
                        session(['cmt' => $name]);
                    return redirect('receptionist/res_add_cus_success');
                } else {
                    if (session()->has('cmt'))
                        session()->put('cmt', $name);
                    else
                        session(['cmt' => $name]);
                    return redirect('receptionist/res_add_cus_failure');
                }
            }
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resAddCustomerSuccess(){
        if (session()->has('user_id')) {
            return view('receptionist.addCustomer')->with(
                [
                    'msg' => 1,
                    'cmt' => session('cmt')
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resAddCustomerFailure(){
        if (session()->has('user_id')) {
            return view('receptionist.addCustomer')->with(
                [
                    'msg' => 2,
                    'cmt' => session('cmt')
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resIndexCusList(){
        if (session()->has('user_id')) {
            $cusInfos = CustomerInfo::
            where([
                    ['is_remove', '=', 0]
                ])
                ->orderBy('add_date', 'des')
                ->get();
            return view('receptionist.customerList', compact('cusInfos'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'initial'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }


    public function resIndexUpdateCustomer($id){

        if (session()->has('user_id')) {
            if (session()->has('cus_id'))
                session()->put('cus_id', $id);
            else
                session(['cus_id' => $id]);

            $cusInfo = CustomerInfo::
            where([
                    ['is_remove', '=', 0],
                    ['cus_id', '=', $id]
                ])
                ->first();


            return view('receptionist.editCustomer', compact('cusInfo'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'initial'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resUpdateCustomer(Request $request)
    {
        if (session()->has('user_id')) {
            $cusFirstName = $request->input('cus_first_name');
            $cusLastName = $request->input('cus_last_name');
            $email = $request->input('cus_mail');
            $phone = $request->input('cus_phone');
            $nicPassport = $request->input('cus_nic_pass');
            $address = $request->input('cus_address');
            $cusId = $request->input('cus_id');

            date_default_timezone_set('Asia/Colombo');
            $date_time = date("Y-m-d H:i:s");
            $name = $cusFirstName . " " . $cusLastName;
            if ($email == "") {
                CustomerInfo::
                where('cus_id', $cusId)
                    ->update(
                        [
                            'cus_first_name' => $cusFirstName,
                            'cus_last_name' => $cusLastName,
                            'cus_phone' => $phone,
                            'cus_email' => $email,
                            'cus_nic_pass' => $nicPassport,
                            'cus_address' => $address,
                            'update_date' => $date_time

                        ]
                    );

                if (session()->has('cmt'))
                    session()->put('cmt', $name);
                else
                    session(['cmt' => $name]);
                return redirect('receptionist/res_add_cus_success');

            } else {
                $cusCount = CustomerInfo::
                where([
                        ['cus_id', '<>', $cusId],
                        ['cus_email', '=', $email],

                    ])
                    ->get();
//            dd($cusId);

                if (count($cusCount) == 0) {

                    CustomerInfo::
                    where('cus_id', $cusId)
                        ->update(
                            [
                                'cus_first_name' => $cusFirstName,
                                'cus_last_name' => $cusLastName,
                                'cus_phone' => $phone,
                                'cus_email' => $email,
                                'cus_nic_pass' => $nicPassport,
                                'cus_address' => $address,
                                'is_remove' => 0,
                                'update_date' => $date_time

                            ]
                        );

                    if (session()->has('cmt'))
                        session()->put('cmt', $name);
                    else
                        session(['cmt' => $name]);
                    return redirect('receptionist/res_update_cus_success');
                } else {
                    if (session()->has('cmt'))
                        session()->put('cmt', $name);
                    else
                        session(['cmt' => $name]);
                    return redirect('receptionist/res_update_cus_failure');
                }
            }
        }
        else {
            session()->flush();
            return redirect('/');
        }

    }

    public function resUpdateCustomerSuccess(){
        if (session()->has('user_id')) {
            $cusInfos = CustomerInfo::
            where([
                    ['is_remove', '=', 0]
                ])
                ->orderBy('add_date', 'des')
                ->get();
            return view('receptionist.customerList', compact('cusInfos'))->with(
                [
                    'msg' => 3,
                    'cmt' => session('cmt')
                ]
            );
        }
        else {
                session()->flush();
                return redirect('/');
            }
    }


    public function resUpdateCustomerFailure(){
        if (session()->has('user_id')) {
            $cusInfo = CustomerInfo::
            where([
                    ['is_remove', '=', 0],
                    ['cus_id', '=', session('cus_id')]
                ])
                ->first();
            return view('receptionist.editCustomer', compact('cusInfo'))->with(
                [
                    'msg' => 2,
                    'cmt' => session('cmt')
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }


    public function indexResRemoveCustomer($id){
        if (session()->has('user_id')) {
            $cusInfo = CustomerInfo::
            where([
                    ['cus_id', '=', $id],
                ])
                ->first();
            $name = $cusInfo->cus_first_name . ' ' . $cusInfo->cus_last_name;
            CustomerInfo::
            where([
                    ['is_remove', '=', 0],
                    ['cus_id', '=', $id],
                ])
                ->update(
                    ['is_remove' => 1]
                );


            // dd($name);

            if (session()->has('cmt'))
                session()->put('cmt', $name);
            else
                session(['cmt' => $name]);
            return redirect('receptionist/res_remove_cus_success');
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resRemoveCusSuccess()
    {
        if (session()->has('user_id')) {
            $cusInfos = CustomerInfo::
            where([
                    ['is_remove', '=', 0],
                ])
                ->orderBy('add_date', 'des')
                ->get();
            return view('receptionist.customerList', compact('cusInfos'))->with(
                [
                    'msg' => 1,
                    'cmt' => session('cmt')
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function recOrderDateSearchP(Request $request)
    {
        if (session()->has('user_id')) {
            $fromDate = $request->input('from_date');
            if (session()->has('search_order_date_from'))
                session()->put('search_order_date_from', $fromDate);
            else
                session(['search_order_date_from' => $fromDate]);

            return redirect('receptionist/res_order_search_date');
        }
        else {
            session()->flush();
            return redirect('/');
        }

        // dd($fromDate);
    }

    public function recOrderDataSearch()
    {
        //  $date_val=DATE(session('search_date_from'));
        if (session()->has('user_id')) {
            $orderInfos = OrderInfo::
            whereDate('order_date', '=', session('search_order_date_from'))
                ->get();

            return view('receptionist.orderList', compact('orderInfos'))->with(
                [
                    'msg' => 4,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resRemoveMealsAppP(Request $request)
    {
        if (session()->has('user_id')) {
            $orderId = $request->input('remove_order_id');
            $reason = $request->input('remove_reason');
            $typeDesc = "Remove Meals Order";
            $orderInfos = OrderInfo::
            where([
                    ['order_id', '=', $orderId],
                ])
                ->first();

            date_default_timezone_set('Asia/Colombo');
            $date_time = date("Y-m-d");
            $appID = "APR" . uniqid();

            ApprovalInfo::insert(
                [
                    'app_id' => $appID,
                    'data_id' => $orderId,
                    'invoice_id' => $orderInfos->invoice_id,
                    'data_type' => 0,
                    'type_desc' => $typeDesc,
                    'app_reason' => $reason,
                    'user_id' => session('user_id'),
                    'add_date' => $date_time,

                ]
            );

            if (session()->has('cmt'))
                session()->put('cmt', $orderInfos->invoice_id);
            else
                session(['cmt' => $orderInfos->invoice_id]);

            return redirect('receptionist/res_order_remove_app_submit');
        }
        else {
            session()->flush();
            return redirect('/');
        }


    }

    public function resRemoveAppSubmit(){
        if (session()->has('user_id')) {
            $orderInfos = OrderInfo::
            where([
                    ['invoice_id', '=', session('cmt')],
                ])
                ->get();
            return view('receptionist.orderList', compact('orderInfos'))->with(
                [
                    'msg' => 6,
                    'cmt' => session('cmt')
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resAirBookRemAppSubmit(){
        if (session()->has('user_id')) {
            $aBookingInfos = AirPortBookingInfo::
            where([
                    ['invoice_id', '=', session('cmt')],
                ])
                ->get();
            return view('receptionist.airBookingList', compact('aBookingInfos'))->with(
                [
                    'msg' => 5,
                    'cmt' => session('cmt')
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resEditAppSubmit(){
        if (session()->has('user_id')) {
            $orderInfos = OrderInfo::
            where([
                    ['invoice_id', '=', session('cmt')],
                ])
                ->get();
            return view('receptionist.orderList', compact('orderInfos'))->with(
                [
                    'msg' => 7,
                    'cmt' => session('cmt')
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resEditAirBookAppSubmit(){
        if (session()->has('user_id')) {
            $aBookingInfos = AirPortBookingInfo::
            where([
                    ['invoice_id', '=', session('cmt')],
                ])
                ->get();
            return view('receptionist.airBookingList', compact('aBookingInfos'))->with(
                [
                    'msg' => 4,
                    'cmt' => session('cmt')
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }


    public function resCancelBookAppSubmit(){
        if (session()->has('user_id')) {
            $bookingInfos = BookingInfo::
            where([
                    ['invoice_id', '=', session('cmt')],
                ])
                ->get();
            return view('receptionist.bookingList', compact('bookingInfos'))->with(
                [
                    'msg' => 3,
                    'cmt' => session('cmt')
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resEditBookAppSubmit(){
        if (session()->has('user_id')) {
            $bookingInfos = BookingInfo::
            where([
                    ['invoice_id', '=', session('cmt')],
                ])
                ->get();
            return view('receptionist.bookingList', compact('bookingInfos'))->with(
                [
                    'msg' => 4,
                    'cmt' => session('cmt')
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resEditAirBookAppP(Request $request)
    {
        if (session()->has('user_id')) {
            $airBookId = $request->input('edit_air_app_id');
            $reason = $request->input('edit_app_reason');
            $typeDesc = "Edit Airport Booking";
            $airBookingInfo = AirPortBookingInfo::
            where([
                    ['a_booking_id', '=', $airBookId],
                ])
                ->first();

            date_default_timezone_set('Asia/Colombo');
            $date_time = date("Y-m-d");
            $appID = "APR" . uniqid();

            ApprovalInfo::insert(
                [
                    'app_id' => $appID,
                    'invoice_id' => $airBookingInfo->invoice_id,
                    'data_id' => $airBookId,
                    'data_type' => 5,
                    'type_desc' => $typeDesc,
                    'app_reason' => $reason,
                    'user_id' => session('user_id'),
                    'add_date' => $date_time,

                ]
            );

            //  dd($orderId);

            if (session()->has('cmt'))
                session()->put('cmt', $airBookingInfo->invoice_id);
            else
                session(['cmt' => $airBookingInfo->invoice_id]);

            return redirect('receptionist/res_edit_air_book_app_submit');
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resEditMealsAppP(Request $request)
    {
        if (session()->has('user_id')) {
            $orderId = $request->input('edit_order_id');
            $reason = $request->input('edit_reason');
            $typeDesc = "Edit Meals Order";
            $orderInfos = OrderInfo::
            where([
                    ['order_id', '=', $orderId],
                ])
                ->first();

            date_default_timezone_set('Asia/Colombo');
            $date_time = date("Y-m-d");
            $appID = "APR" . uniqid();

            ApprovalInfo::insert(
                [
                    'app_id' => $appID,
                    'invoice_id' => $orderInfos->invoice_id,
                    'data_id' => $orderId,
                    'data_type' => 1,
                    'type_desc' => $typeDesc,
                    'app_reason' => $reason,
                    'user_id' => session('user_id'),
                    'add_date' => $date_time,

                ]
            );

            //  dd($orderId);

            if (session()->has('cmt'))
                session()->put('cmt', $orderInfos->invoice_id);
            else
                session(['cmt' => $orderInfos->invoice_id]);

            return redirect('receptionist/res_order_edit_app_submit');
        }
        else {
            session()->flush();
            return redirect('/');
        }



    }

    public function resRemoveAirBookAppP(Request $request)
    {
        if (session()->has('user_id')) {
            $airBookingId = $request->input('remove_air_app_id');
            $reason = $request->input('remove_app_reason');
            $typeDesc = "Remove Airport Booking";
            $airBookingInfos = AirPortBookingInfo::
            where([
                    ['a_booking_id', '=', $airBookingId],
                ])
                ->first();

            date_default_timezone_set('Asia/Colombo');
            $date_time = date("Y-m-d");
            $appID = "APR" . uniqid();

            ApprovalInfo::insert(
                [
                    'app_id' => $appID,
                    'invoice_id' => $airBookingInfos->invoice_id,
                    'data_id' => $airBookingId,
                    'data_type' => 6,
                    'type_desc' => $typeDesc,
                    'app_reason' => $reason,
                    'user_id' => session('user_id'),
                    'add_date' => $date_time,

                ]
            );

            //  dd($orderId);

            if (session()->has('cmt'))
                session()->put('cmt', $airBookingInfos->invoice_id);
            else
                session(['cmt' => $airBookingInfos->invoice_id]);

            return redirect('receptionist/res_air_booking_rem_app_submit');
        }
        else {
            session()->flush();
            return redirect('/');
        }


    }

    public function resCancelBookingAppP(Request $request)
    {
        if (session()->has('user_id')) {
            $bookingId = $request->input('cancel_booking_id');
            $reason = $request->input('cancel_reason');
            $typeDesc = "Cancel Room Booking";
            $bookingInfos = BookingInfo::
            where([
                    ['booking_id', '=', $bookingId],
                ])
                ->first();

            date_default_timezone_set('Asia/Colombo');
            $date_time = date("Y-m-d");
            $appID = "APR" . uniqid();

            ApprovalInfo::insert(
                [
                    'app_id' => $appID,
                    'invoice_id' => $bookingInfos->invoice_id,
                    'data_id' => $bookingId,
                    'data_type' => 3,
                    'type_desc' => $typeDesc,
                    'app_reason' => $reason,
                    'user_id' => session('user_id'),
                    'add_date' => $date_time,

                ]
            );

            //  dd($orderId);

            if (session()->has('cmt'))
                session()->put('cmt', $bookingInfos->invoice_id);
            else
                session(['cmt' => $bookingInfos->invoice_id]);

            return redirect('receptionist/res_cancel_book_app_submit');
        }
        else {
            session()->flush();
            return redirect('/');
        }


    }


    public function resEditBookingAppP(Request $request)
    {
        if (session()->has('user_id')) {
            $bookingId = $request->input('edit_booking_id');
            $reason = $request->input('edit_reason');
            $typeDesc = "Room Booking Modification";
            $bookingInfos = BookingInfo::
            where([
                    ['booking_id', '=', $bookingId],
                ])
                ->first();

            date_default_timezone_set('Asia/Colombo');
            $date_time = date("Y-m-d");
            $appID = "APR" . uniqid();

            ApprovalInfo::insert(
                [
                    'app_id' => $appID,
                    'invoice_id' => $bookingInfos->invoice_id,
                    'data_id' => $bookingId,
                    'data_type' => 4,
                    'type_desc' => $typeDesc,
                    'app_reason' => $reason,
                    'user_id' => session('user_id'),
                    'add_date' => $date_time,

                ]
            );

            //  dd($orderId);

            if (session()->has('cmt'))
                session()->put('cmt', $bookingInfos->invoice_id);
            else
                session(['cmt' => $bookingInfos->invoice_id]);

            return redirect('receptionist/res_edit_book_app_submit');
        }
        else {
            session()->flush();
            return redirect('/');
        }



    }

    public function resBillPrintAppSubmit(){
        if (session()->has('user_id')) {
            $checkOutInfos = CheckOutPayment::
            where([
                    ['invoice_id', '=', session('cmt')],
                ])
                ->get();
            return view('receptionist.paidPayment', compact('checkOutInfos'))->with(
                [
                    'msg' => 2,
                    'cmt' => session('cmt')
                ]
            );
        }
        else {
                session()->flush();
                return redirect('/');
            }
    }

    public function resPayHistoryAppSubmit(){
        if (session()->has('user_id')) {
            $payHistoryInfos = PaymentHistory::
            where([
                    ['invoice_id', '=', session('cmt')],
                ])
                ->get();
            return view('receptionist.paymentHistory', compact('payHistoryInfos'))->with(
                [
                    'msg' => 1,
                    'cmt' => session('cmt')
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resBillPrintsAppP(Request $request)
    {
        if (session()->has('user_id')) {
            $invId = $request->input('inv_id');
            $reason = $request->input('print_reason');
            $typeDesc = "Print Bill";
            $orderInfos = CheckOutPayment::
            where([
                    ['invoice_id', '=', $invId],
                ])
                ->first();

            date_default_timezone_set('Asia/Colombo');
            $date_time = date("Y-m-d");
            $appID = "APR" . uniqid();

            ApprovalInfo::insert(
                [
                    'app_id' => $appID,
                    'invoice_id' => $invId,
                    'data_id' => $invId,
                    'data_type' => 2,
                    'type_desc' => $typeDesc,
                    'app_reason' => $reason,
                    'user_id' => session('user_id'),
                    'add_date' => $date_time,

                ]
            );

            //  dd($orderId);

            if (session()->has('cmt'))
                session()->put('cmt', $invId);
            else
                session(['cmt' => $invId]);

            return redirect('receptionist/res_bill_print_app_submit');
        }
        else {
            session()->flush();
            return redirect('/');
        }


    }

    public function resPayRemoveAppP(Request $request)
    {
        if (session()->has('user_id')) {
            $invId = $request->input('rem_inv_id');
            $payId = $request->input('rem_pay_id');
            $reason = $request->input('rem_pay_id');
            $typeDesc = "Print Bill";
            $payInfos = CheckOutPayment::
            where([
                    ['invoice_id', '=', $invId],
                ])
                ->first();

            date_default_timezone_set('Asia/Colombo');
            $date_time = date("Y-m-d");
            $appID = "APR" . uniqid();

            ApprovalInfo::insert(
                [
                    'app_id' => $appID,
                    'invoice_id' => $invId,
                    'data_id' => $payId,
                    'data_type' => 7,
                    'type_desc' => $typeDesc,
                    'app_reason' => $reason,
                    'user_id' => session('user_id'),
                    'add_date' => $date_time,

                ]
            );

            //  dd($orderId);

            if (session()->has('cmt'))
                session()->put('cmt', $invId);
            else
                session(['cmt' => $invId]);

            return redirect('receptionist/res_pay_history_app_submit');
        }
        else {
            session()->flush();
            return redirect('/');
        }


    }

    public function resRemovePayHistory($id)
    {
        //New3
        if (session()->has('user_id')) {
            $payHistory = PaymentHistory::
            where([
                    ['history_id', '=', $id],
                ])
                ->first();

            $chechInfo = CheckOutPayment::
            where([
                    ['invoice_id', '=', $payHistory->invoice_id],
                ])
                ->first();

            $newPayAmount = $chechInfo->paid_amount - $payHistory->paid_amount;

            $statVal = ($chechInfo->total_amount-$chechInfo->discount_amount) - $newPayAmount;
            $status = 0;
            if ($statVal == 0)
                $status = 1;
            else
                $status = 0;
            date_default_timezone_set('Asia/Colombo');
            $date_time = date("Y-m-d H:i:s");

            CheckOutPayment::
            where([
                    ['invoice_id', '=', $payHistory->invoice_id],
                ])
                ->update(
                    [
                        'paid_amount' => $newPayAmount,
                        'status' => $status,
                        'update_date' => $date_time

                    ]
                );
            PaymentHistory::
            where([
                    ['history_id', '=', $id],
                ])
                ->delete();

            if (session()->has('cmt'))
                session()->put('cmt', $payHistory->invoice_id);
            else
                session(['cmt' => $payHistory->invoice_id]);

            return redirect('receptionist/res_pay_history_success');
        }
        else {
            session()->flush();
            return redirect('/');
        }




    }



    public function resRemovePaySuccess()
    {
        //New4
        if (session()->has('user_id')) {
            $payHistoryInfos = PaymentHistory::
            where([
                    ['invoice_id', '=', session('cmt')],

                ])
                ->get();

            if (session()->has('pay_inv_id')) {
                session()->put('pay_inv_id', session('cmt'));
            } else {
                session([
                    'pay_inv_id' => session('cmt'),
                ]);
            }

            //   dd($payHistoryInfos);

            return view('receptionist.paymentHistory', compact('payHistoryInfos'))->with(
                [
                    'msg' => 2,
                    'cmt' => session('cmt')
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }

    }

    public function recOrderDurationSearchP(Request $request)
    {
        if (session()->has('user_id')) {
            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');
            if (session()->has('search_order_date_from')) {
                session()->put('search_order_date_from', $fromDate);
                session()->put('search_order_date_to', $toDate);

            } else {
                session(['search_order_date_from' => $fromDate]);
                session(['search_order_date_to' => $toDate]);

            }

            return redirect('receptionist/res_order_search_duration');
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function recOrderCheckDurationSearchP(Request $request)
    {
        if (session()->has('user_id')) {
            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');
            if (session()->has('search_order_date_from')) {
                session()->put('search_order_date_from', $fromDate);
                session()->put('search_order_date_to', $toDate);

            } else {
                session(['search_order_date_from' => $fromDate]);
                session(['search_order_date_to' => $toDate]);

            }

            return redirect('receptionist/res_order_check_search_duration');
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function recAirCheckDurationSearchP(Request $request)
    {
        if (session()->has('user_id')) {
            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');
            if (session()->has('search_order_date_from')) {
                session()->put('search_order_date_from', $fromDate);
                session()->put('search_order_date_to', $toDate);

            } else {
                session(['search_order_date_from' => $fromDate]);
                session(['search_order_date_to' => $toDate]);

            }

            return redirect('receptionist/res_air_check_search_duration');
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function recOrderDurationSearch()
    {
        if (session()->has('user_id')) {
            $orderInfos = OrderInfo::
            whereDate('order_date', '>=', session('search_order_date_from'))
                ->whereDate('order_date', '<=', session('search_order_date_to'))
                ->get();

            return view('receptionist.orderList', compact('orderInfos'))->with(
                [
                    'msg' => 5,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function recOrderCheckDurationSearch()
    {
        if (session()->has('user_id')) {
            $orderInfos = OrderInfo::
            whereDate('order_date', '>=', session('search_order_date_from'))
                ->whereDate('order_date', '<=', session('search_order_date_to'))
                ->where([
                    ['check_out_status', '=', 1],

                ])
                ->get();

            return view('receptionist.checkOutOrderList', compact('orderInfos'))->with(
                [
                    'msg' => 9,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function recAirCheckDurationSearch()
    {
        //Arun
        if (session()->has('user_id')) {
            $aBookingInfos = AirPortBookingInfo::
            whereDate('a_booking_date', '>=', session('search_order_date_from'))
                ->whereDate('a_booking_date', '<=', session('search_order_date_to'))
                ->where([
                    ['check_out_status', '=', 1],

                ])
                ->get();

            return view('receptionist.airCheckBookingList', compact('aBookingInfos'))->with(
                [
                    'msg' => 9,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }


    public function recCheckOutDateSearchP(Request $request)
    {
        if (session()->has('user_id')) {
            $fromDate = $request->input('from_date');
            if (session()->has('search_date_from'))
                session()->put('search_date_from', $fromDate);
            else
                session(['search_date_from' => $fromDate]);

            return redirect('receptionist/res_check_out_search_date');
        }
        else {
            session()->flush();
            return redirect('/');
        }

       // dd($fromDate);
    }

    public function recPaidSearchP(Request $request)
    {
        if (session()->has('user_id')) {
            $fromDate = $request->input('from_date');
            if (session()->has('search_date_paid_from'))
                session()->put('search_date_paid_from', $fromDate);
            else
                session(['search_date_paid_from' => $fromDate]);

            return redirect('receptionist/res_paid_search_date');
        }
        else {
            session()->flush();
            return redirect('/');
        }

        // dd($fromDate);
    }

    public function recCheckOutDataSearch()
    {
        if (session()->has('user_id')) {
            //  $date_val=DATE(session('search_date_from'));
            $checkOutInfos = CheckOutPayment::
            whereDate('add_date', '=', session('search_date_from'))
                ->get();

            return view('receptionist.checkOutPayment', compact('checkOutInfos'))->with(
                [
                    'msg' => 4,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function recPaidDataSearch()
    {

        //  $date_val=DATE(session('search_date_from'));
        if (session()->has('user_id')) {
            $checkOutInfos = CheckOutPayment::
            whereDate('add_date', '=', session('search_date_paid_from'))
                ->where([
                    ['status', '=', 1],
                    ['check_out_status','=',0]
                ])
                ->get();

            return view('receptionist.paidPayment', compact('checkOutInfos'))->with(
                [
                    'msg' => 4,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function recCheckOutDurationSearchP(Request $request)
    {
        if (session()->has('user_id')) {
            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');
            if (session()->has('search_date_from')) {
                session()->put('search_date_from', $fromDate);
                session()->put('search_date_to', $toDate);

            } else {
                session(['search_date_from' => $fromDate]);
                session(['search_date_to' => $toDate]);

            }

            return redirect('receptionist/res_check_out_search_duration');
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function recPaidDurationSearchP(Request $request)
    {
        if (session()->has('user_id')) {
            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');
            if (session()->has('search_date_paid_from')) {
                session()->put('search_date_paid_from', $fromDate);
                session()->put('search_date_paid_to', $toDate);

            } else {
                session(['search_date_paid_from' => $fromDate]);
                session(['search_date_paid_to' => $toDate]);

            }

            return redirect('receptionist/res_paid_search_duration');
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function recFinalCheckDurationSearchP(Request $request)
    {
        if (session()->has('user_id')) {
            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');
            if (session()->has('search_date_final_check_from')) {
                session()->put('search_date_final_check_from', $fromDate);
                session()->put('search_date_final_check_to', $toDate);

            } else {
                session(['search_date_final_check_from' => $fromDate]);
                session(['search_date_final_check_to' => $toDate]);

            }

            return redirect('receptionist/res_final_check_search_duration');
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }



    public function recCheckOutDurationSearch()
    {
        if (session()->has('user_id')) {
            $checkOutInfos = CheckOutPayment::
            whereDate('add_date', '>=', session('search_date_from'))
                ->whereDate('add_date', '<=', session('search_date_to'))
                ->get();

            return view('receptionist.checkOutPayment', compact('checkOutInfos'))->with(
                [
                    'msg' => 5,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function recPaidDurationSearch()
    {
        if (session()->has('user_id')) {
            $checkOutInfos = CheckOutPayment::
            whereDate('add_date', '>=', session('search_date_paid_from'))
                ->whereDate('add_date', '<=', session('search_date_paid_to'))
                ->where([
                    ['status', '=', 1],
                ])
                ->get();

            return view('receptionist.paidPayment', compact('checkOutInfos'))->with(
                [
                    'msg' => 5,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function recFinalCheckDurationSearch()
    {
        if (session()->has('user_id')) {
            $checkOutInfos = CheckOutPayment::
            whereDate('update_date', '>=', session('search_date_final_check_from'))
                ->whereDate('update_date', '<=', session('search_date_final_check_to'))
                ->where([
                    ['status', '=', 1],
                    ['check_out_status', '=', 1]
                ])
                ->get();

            return view('receptionist.finalCheckOut', compact('checkOutInfos'))->with(
                [
                    'msg' => 5,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resEditBookingInfo($id){
        if (session()->has('user_id')) {
            $bookingInfo = BookingInfo::
            where([
                    ['booking_id', '=', $id]
                ])
                ->first();
            $cusInfos = CustomerInfo::
            where([
                    ['is_remove', '=', 0],
                ])
                ->orderBy('add_date', 'des')
                ->get();


            return view('receptionist.editBookingDetails', compact('bookingInfo', 'cusInfos'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }

    }

    public function resEditDurationAvaP(Request $request)
    {
        if (session()->has('user_id')) {
            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');
            $roomId = $request->input('ava_room_id');
            $bookId = $request->input('ava_book_id');
            $val = $this->checkAvailable($fromDate, $toDate, $roomId, $bookId);
            if ($val == 0) {
                if (session()->has('msg') && session('msg') == 5) {
                    session()->put('msg', 5);
                    session()->put('edit_book_id', $bookId);
                    session()->put('av_edit_from', $fromDate);
                    session()->put('av_edit_to', $toDate);

                } else {
                    session(['msg' => 5]);
                    session(['edit_book_id' => $bookId]);
                    session(['av_edit_from' => $fromDate]);
                    session(['av_edit_to' => $toDate]);

                }
            } else {
                if (session()->has('msg') && session('msg') == 6) {
                    session()->put('msg', 6);
                    session()->put('edit_book_id', $bookId);
                    session()->put('av_edit_from', $fromDate);
                    session()->put('av_edit_to', $toDate);

                } else {
                    session(['msg' => 6]);
                    session(['edit_book_id' => $bookId]);
                    session(['av_edit_from' => $fromDate]);
                    session(['av_edit_to' => $toDate]);

                }
            }
            // dd(session('av_edit_to'));
            return redirect('receptionist/res_edit_avail_search');
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }
    //Now
    public function resEditAvailableSearch()
    {
        if (session()->has('user_id')) {
            $bookingInfo = BookingInfo::
            where([
                    ['booking_id', '=', session('edit_book_id')]
                ])
                ->first();
            $cusInfos = CustomerInfo::
            where([
                    ['is_remove', '=', 0],
                ])
                ->orderBy('add_date', 'des')
                ->get();
//        $cusVal=CustomerInfo::
//        where([
//                ['cus_id', '=',$bookingInfo->],
//            ])
//            ->first();


            return view('receptionist.editBookingDetails', compact('bookingInfo', 'cusInfos'))->with(
                [
                    'msg' => session('msg'),
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }

    }

    public function recBulkTempBooking(Request $request)
    {
        //prob201
        if (session()->has('user_id')) {
            date_default_timezone_set('Asia/Colombo');
            $date_time = date("Y-m-d H:i:s");
            $invoiceId = $this->getInvoiceId();
            $roomIds= $request->input('categories');
            if (session()->has('r_b_index')) {
                if (session('r_b_index') == 1) {

                    $invoiceId = session('r_b_invoice_id');
                } else {

                    session()->put('r_b_index', 0);
                    session()->put('r_b_invoice_id', 0);
                }
            } else {
                session([
                    'r_b_index' => 0,
                    'r_b_invoice_id' => 0
                ]);
            }
            $roomInfos = RoomsInfo::
            whereIn('room_id',$roomIds)
                ->get();

          //  dd($roomInfos);

            foreach ($roomIds as $roomId) {


                $bookingId = "BOOK" . uniqid();
                if (session()->has('s_inv_id')) {
                    session()->put('s_inv_id', $invoiceId);
                }
                else{
                    session([
                        's_inv_id' => $invoiceId
                    ]);
                }
                BookingInfo::insert(
                    [

                        'booking_id' => $bookingId,
                        'invoice_id' => $invoiceId,
                        'room_id' => $roomId,
                        'from_date' => session('from_date').' 12:01:00',
                        'to_date' => session('to_date').' 12:00:00',
                        'status' => 1,
                        'is_remove' => 0,
                        'user_id' => session('user_id'),
                        'add_date' => $date_time,
                        'update_date' => $date_time

                    ]
                );

            }

//            $cusInfos = CustomerInfo::
//            where([
//                    ['is_remove', '=', 0],
//                ])
//                ->orderBy('add_date', 'des')
//                ->get();

            if (session()->has('r_b_index')) {
                if (session('r_b_index') == 1) {

                    $bookIn = BookingInfo::
                    where([
                            ['invoice_id', '=', session('r_b_invoice_id')],
                        ])
                        ->first();

                    if (session()->has('r_b_cus_id')) {
                        session()->put('r_b_cus_id', $bookIn->customer_id);
                    } else {
                        session([
                            'r_b_cus_id' => $bookIn->customer_id,
                        ]);
                    }
                    session()->put('r_b_index', 0);
                }

            } else {
                if (session()->has('r_b_cus_id')) {
                    session()->put('r_b_cus_id', 0);
                } else {
                    session([
                        'r_b_cus_id' => 0,
                    ]);
                }
            }

            if (session()->has('bulk_result')) {
                session()->put('bulk_room_infos',$roomInfos);
            }
            else{
                session([
                    'bulk_room_infos' => $roomInfos,
                ]);
            }
//            return view('receptionist.bulkBookingDetails', compact('cusInfos', 'roomInfos'))->with(
//                [
//                    'msg' => 0,
//                    'cmt' => 'init'
//                ]
//            );
            return redirect('receptionist/res_bulk_booking_details');
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resBulkBookingDetails()
    {
        $cusInfos = CustomerInfo::
        where([
                ['is_remove', '=', 0],
            ])
            ->orderBy('add_date', 'des')
            ->get();
        $roomInfos=session('bulk_room_infos');
        return view('receptionist.bulkBookingDetails', compact('cusInfos', 'roomInfos'))->with(
            [
                'msg' => 0,
                'cmt' => 'init'
            ]
        );
    }

    public function resEditBooking(Request $request){

        if (session()->has('user_id')) {
            $toDate = $request->input('hidden_to_date');
            $fromDate = $request->input('hidden_from_date');
            $cusId = $request->input('cus_id');
            $invId = $request->input('hidden_invoice_id');
            $bookingId = $request->input('hidden_book_id');


            $totalAmount = $request->input('total_amount');
            $numOfDays = $request->input('number_of_days');
            $perDayAmount = $request->input('amount_per_day');
            $numOfChildren = $request->input('no_of_children');
            $numOfAdults = $request->input('no_of_adults');
            $bookingType = $request->input('booking_type');
            $broker_name=$request->input('broker_name');
            $discountAmount=$request->input('discount_amount');


            //  dd($request);
            date_default_timezone_set('Asia/Colombo');
            $date_time = date("Y-m-d H:i:s");
            BookingInfo::
            where([
                    ['booking_id', '=', $bookingId],
                ])
                ->update(
                    [
                        'customer_id' => $cusId,
                        'from_date' => $fromDate.' 12:01:00',
                        'to_date' => $toDate.' 12:00:00',
                        'status' => 2,
                        'is_remove' => 0,
                        'user_id' => session('user_id'),
                        'no_of_children' => $numOfChildren,
                        'no_of_adults' => $numOfAdults,
                        'cancel_lock' => 0,
                        'edit_lock' => 0,
                        'booking_type' => $bookingType,
                        'broker_name'=>$broker_name,
                        'update_date' => $date_time

                    ]
                );

            $preVal = BookingPaymentInfo::
            where([
                    ['booking_id', '=', $bookingId],
                ])
                ->first();
            $preAmount = $preVal->total_amount;

            BookingPaymentInfo::
            where([
                    ['booking_id', '=', $bookingId],
                ])
                ->update(
                    [
                        'no_of_days' => $numOfDays,
                        'total_amount' => $totalAmount,
                        'is_remove' => 0,
                        'add_date' => $date_time,
                        'update_date' => $date_time


                    ]
                );

            $preCheck = CheckOutPayment::
            where([
                    ['invoice_id', '=', $invId],
                ])
                ->first();
            $redAmount = $preCheck->total_amount - $preAmount;
            $newAmount = $redAmount + $totalAmount;
            //   dd($fromDate,$toDate,$bookingId,$cusId,$invId,$totalAmount,$numOfDays,$newAmount);
            $statVal = ($newAmount-$discountAmount) - $preCheck->paid_amount;
            $status = 0;
            if ($statVal == 0)
                $status = 1;
            else
                $status = 0;

            CheckOutPayment::
            where([
                    ['invoice_id', '=', $invId],
                ])
                ->update(
                    [
                        'total_amount' => $newAmount,
                        'status' => $status,
                        'booking_type' => $bookingType,
                        'discount_amount'=>$discountAmount,
                        'update_date' => $date_time

                    ]
                );

            if (session()->has('b_to_date')) {
                session()->put('b_to_date', $toDate);
                session()->put('b_from_date', $fromDate);
            } else {
                session([
                    'b_to_date' => $toDate,
                    'b_from_date' => $fromDate
                ]);
            }


            return redirect('receptionist/res_edit_booking_list');
        }
        else {
            session()->flush();
            return redirect('/');
        }



    }

    public function resEditBookingList()
    {
        if (session()->has('user_id')) {
            $bookingInfos = BookingInfo::
            whereDate('to_date', '>=', session('b_to_date'))
                ->whereDate('from_date', '<=', session('b_from_date'))
                ->get();


            return view('receptionist.bookingList', compact('bookingInfos'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function checkAvailable($to,$from,$room_id,$book_id){
        if (session()->has('user_id')) {
            $availableRoom = BookingInfo::
            whereDate('to_date', '>=', $to)
                ->whereDate('from_date', '<=', $from)
                ->where([
                    ['room_id', '=', $room_id],
                    ['booking_id', '<>', $book_id]
                ])
                ->first();
            if (count($availableRoom) == 0)
                return 0;
            else
                return $availableRoom->status;
        }
        else {
            session()->flush();
            return redirect('/');
        }

    }


    public function resConBookingInfo($id,$from,$to)
    {
        if (session()->has('user_id')) {
            $roomInfo = RoomsInfo::
            where([
                    ['room_id', '=', $id]
                ])
                ->first();

            $bookingInfo = $this->checkHistory($to, $from, $id);




            if ($this->getBookingId(session('to_date'), session('from_date'), $id) == 0) {
                date_default_timezone_set('Asia/Colombo');
                $date_time = date("Y-m-d H:i:s");
                $invoiceId = $bookingInfo->invoice_id;

                $bookingId = $bookingInfo->booking_id;


                if (session()->has('s_room_id')) {
                    session()->put('s_room_id', $id);
                    session()->put('s_book_id', $bookingId);
                    session()->put('s_inv_id', $invoiceId);
                } else {
                    session([
                        's_room_id' => $id,
                        's_book_id' => $bookingId,
                        's_inv_id' => $invoiceId
                    ]);
                }

            }

            $cusInfos = CustomerInfo::
            where([
                    ['is_remove', '=', 0],
                ])
                ->orderBy('add_date', 'des')
                ->get();


            // dd(session('r_b_invoice_id'));


            return view('receptionist.bookingDetails', compact('cusInfos', 'roomInfo'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resRemoveOrder($id)
    {
        if (session()->has('user_id')) {
            $orderInfo = OrderPayment::
            where([
                    ['order_id', '=', $id],
                ])
                ->first();
            $checkOut = CheckOutPayment::
            where([
                    ['invoice_id', '=', $orderInfo->invoice_id],
                ])
                ->first();
            $newAmount = ($checkOut->total_amount - $orderInfo->amount);
            // dd($checkOut->total_amount);
            $status = 0;
            $val = ($newAmount-$checkOut->discount_amount) - $checkOut->paid_amount;
            if ($val == 0)
                $status = 1;
            else
                $status = 0;

            CheckOutPayment::
            where([
                    ['invoice_id', '=', $orderInfo->invoice_id],
                ])
                ->update(
                    [
                        'total_amount' => $newAmount,
                        'status' => $status

                    ]
                );


            OrderPayment::
            where([
                    ['order_id', '=', $id],
                ])
                ->delete();

            OrderInfo::
            where([
                    ['order_id', '=', $id],
                ])
                ->delete();

            TriggerLoad::
            where([
                    ['change_id', '=', $id],
                ])
                ->delete();

            return redirect('receptionist/res_order_remove_success');
        }
        else {
            session()->flush();
            return redirect('/');
        }






    }

    public function resCheckMap()
    {
        //Now w1
        if (session()->has('user_id')) {
            date_default_timezone_set('Asia/Colombo');
            $todayDate = date("Y-m-d");
            $tomorrowDate = date_create($todayDate);
            date_add($tomorrowDate, date_interval_create_from_date_string("1 days"));
            $tomorrowDate = date_format($tomorrowDate, "Y-m-d");
            if (session()->has('pg_count')) {
                session()->put('pg_count', session('pg_count')+1);
            }
            else{
                session([
                    'pg_count' => 2
                ]);
            }
            if (session()->has('to_date')) {
                session()->put('to_date', session('to_date'));
                session()->put('from_date', session('from_date'));
            } else {
                session([
                    'to_date' => $tomorrowDate,
                    'from_date' => $todayDate
                ]);
            }
            $roomInfos = RoomsInfo::
            where([
                    ['is_remove', '=', 0]
                ])
                ->orderBy('floor_number', 'asc')
                ->get();

            return view('receptionist.check_availability_map', compact('roomInfos'))->with(
                [
                    'from_date' => session('from_date'),
                    'to_date' => session('to_date')
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resSetConfirmBooking($id){
        //func now
        if (session()->has('user_id')) {
        BookingInfo::
            where([
                    ['booking_id', '=', $id],
                ])
                ->update(
                    [
                        'status' => 2

                    ]
                );
            return redirect('receptionist/res_check_map');
        }
        else{
            session()->flush();
            return redirect('/');
        }
    }

    public function resSetConfirmBookingBulk($id){
        //func now
        if (session()->has('user_id')) {
        BookingInfo::
            where([
                    ['booking_id', '=', $id],
                ])
                ->update(
                    [
                        'status' => 2

                    ]
                );
            return redirect('receptionist/res_check_map_bulk');
        }
        else{
            session()->flush();
            return redirect('/');
        }
    }

    public function resSetConfirmBookingMonthly($id){
        //func now
        if (session()->has('user_id')) {
        BookingInfo::
            where([
                    ['booking_id', '=', $id],
                ])
                ->update(
                    [
                        'status' => 2

                    ]
                );
            return redirect('receptionist/res_monthly_map');
        }
        else{
            session()->flush();
            return redirect('/');
        }
    }

    public function resSetNotConfirmBooking($id){
        //func now
        if (session()->has('user_id')) {
        BookingInfo::
            where([
                    ['booking_id', '=', $id],
                ])
                ->update(
                    [
                        'status' => 3

                    ]
                );
            return redirect('receptionist/res_check_map');
        }
        else{
            session()->flush();
            return redirect('/');
        }
    }
    public function resSetNotConfirmBookingBulk($id){
        //func now
        if (session()->has('user_id')) {
        BookingInfo::
            where([
                    ['booking_id', '=', $id],
                ])
                ->update(
                    [
                        'status' => 3

                    ]
                );
            return redirect('receptionist/res_check_map_bulk');
        }
        else{
            session()->flush();
            return redirect('/');
        }
    }

    public function resSetNotConfirmBookingMonthly($id){
        //func now
        if (session()->has('user_id')) {
        BookingInfo::
            where([
                    ['booking_id', '=', $id],
                ])
                ->update(
                    [
                        'status' => 3

                    ]
                );
            return redirect('receptionist/res_monthly_map');
        }
        else{
            session()->flush();
            return redirect('/');
        }
    }


    public function resCheckMapBulk()
    {
        //Now w1
        if (session()->has('user_id')) {
            date_default_timezone_set('Asia/Colombo');
            $todayDate = date("Y-m-d");
            $tomorrowDate = date_create($todayDate);
            date_add($tomorrowDate, date_interval_create_from_date_string("1 days"));
            $tomorrowDate = date_format($tomorrowDate, "Y-m-d");
            if (session()->has('to_date')) {
                session()->put('to_date', session('to_date'));
                session()->put('from_date', session('from_date'));
            } else {
                session([
                    'to_date' => $tomorrowDate,
                    'from_date' => $todayDate
                ]);
            }
            $roomInfos = RoomsInfo::
            where([
                    ['is_remove', '=', 0]
                ])
                ->orderBy('floor_number', 'asc')
                ->get();

            return view('receptionist.bulk_check_availability_map', compact('roomInfos'))->with(
                [
                    'from_date' => session('from_date'),
                    'to_date' => session('to_date')
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }


    public function resRemoveAirBooking($id)
    {
        if (session()->has('user_id')) {
            $airBookingInfo = AirBookingPayment::
            where([
                    ['a_booking_id', '=', $id],
                ])
                ->first();
            $checkOut = CheckOutPayment::
            where([
                    ['invoice_id', '=', $airBookingInfo->invoice_id],
                ])
                ->first();
            $newAmount = ($checkOut->total_amount - $airBookingInfo->amount);

            $status = 0;
            $val = ($newAmount-$checkOut->discount_amount) - $checkOut->paid_amount;
            if ($val == 0)
                $status = 1;
            else
                $status = 0;

            CheckOutPayment::
            where([
                    ['invoice_id', '=', $airBookingInfo->invoice_id],
                ])
                ->update(
                    [
                        'total_amount' => $newAmount,
                        'status' => $status

                    ]
                );


            AirBookingPayment::
            where([
                    ['a_booking_id', '=', $id],
                ])
                ->delete();

            AirPortBookingInfo::
            where([
                    ['a_booking_id', '=', $id],
                ])
                ->delete();

            TriggerLoad::
            where([
                    ['change_id', '=', $id],
                ])
                ->delete();


            return redirect('receptionist/res_air_booking_remove_success');
        }
        else {
            session()->flush();
            return redirect('/');
        }






    }

    public function resOrderRemoveSuccess()
    {
        if (session()->has('user_id')) {
            $orderInfos = OrderInfo::
            where([
                    ['is_remove', '=', 0],
                ])
                ->orderBy('add_date', 'desc')
                ->get();
            return view('receptionist.orderList', compact('orderInfos'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'Meals Order'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resAirBookingRemoveSuccess()
    {
        if (session()->has('user_id')) {
            $aBookingInfos = AirPortBookingInfo::
            where([
                    ['is_remove', '=', 0],
                ])
                ->orderBy('add_date', 'desc')
                ->get();
            //dd($aBookingInfos);
            return view('receptionist.airBookingList', compact('aBookingInfos'))->with(
                [
                    'msg' => 1,
                    'cmt' => 'Airport vehicle booking'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resCusBookingHistory()
    {
        if (session()->has('user_id')) {
            $checkOutInfos = CheckOutPayment::
            where([
                    ['is_remove', '=', 0],
                ])
                ->get();

            return view('receptionist.customerHistory', compact('checkOutInfos'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resPayHistoryR($id)
    {
        if (session()->has('user_id')) {
            $payHistoryInfos = PaymentHistory::
            where([
                    ['invoice_id', '=', $id],

                ])
                ->get();

            if (session()->has('pay_inv_id')) {
                session()->put('pay_inv_id', $id);
            } else {
                session([
                    'pay_inv_id' => $id,
                ]);
            }

            //   dd($payHistoryInfos);

            return view('receptionist.paymentHistory', compact('payHistoryInfos'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function resEditAirBooking($id){
        if (session()->has('user_id')) {

            $aBookingInfo = AirPortBookingInfo::
            where([
                    ['a_booking_id', '=', $id],
                ])
                ->first();

            if (session()->has('edit_air_book')) {
                session()->put('edit_air_book', $id);
            } else {
                session([
                    'edit_air_book' => $id,
                ]);
            }


            return view('receptionist.editAirPortBooking', compact('aBookingInfo'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            session()->flush();
            return redirect('/');
        }

    }

    public function resEditAirPortBookingP(Request $request)
    {
        //Now 1
        if (session()->has('user_id')) {
            $bookingType = $request->input('booking_type');
            $no_of_passengers = $request->input('no_of_passengers');
            $fromPlace = $request->input('from_place');
            $toPlace = $request->input('to_place');
            $bookingDate = $request->input('booking_date');
            $bookingTime = $request->input('booking_time');
            $amount = $request->input('a_amount');
            date_default_timezone_set('Asia/Colombo');
            $date_time = date("Y-m-d H:i:s");
            $airBookingInf = AirPortBookingInfo::
            where([
                    ['a_booking_id', '=', session('edit_air_book')],
                ])
                ->first();

            $prevAmount = $airBookingInf->amount;

            AirPortBookingInfo::
            where([
                    ['a_booking_id', '=', session('edit_air_book')],
                ])
                ->update(
                    [
                        'a_booking_type' => $bookingType,
                        'no_of_passengers' => $no_of_passengers,
                        'a_booking_from' => $fromPlace,
                        'a_booking_to' => $toPlace,
                        'a_booking_date' => $bookingDate,
                        'a_booking_time' => $bookingTime,
                        'a_amount' => $amount,
                        'user_id' => session('user_id'),
                        'edit_lock' => 0,
                        'remove_lock' => 0,
                        'update_date' => $date_time
                    ]
                );

            AirBookingPayment::
            where([
                    ['a_booking_id', '=', session('edit_air_book')],
                ])
                ->update(
                    [
                        'amount' => $amount,
                        'is_remove' => 0,
                        'update_date' => $date_time
                    ]
                );


            $preCheck = CheckOutPayment::
            where([
                    ['invoice_id', '=', $airBookingInf->invoice_id],
                ])
                ->first();


            $redAmount = $preCheck->total_amount - $prevAmount;
            $newAmount = $redAmount + $amount;
            //   dd($fromDate,$toDate,$bookingId,$cusId,$invId,$totalAmount,$numOfDays,$newAmount);
            $statVal = ($newAmount-$preCheck->discount_amount) - $preCheck->paid_amount;
            $status = 0;
            if ($statVal == 0)
                $status = 1;
            else
                $status = 0;

            CheckOutPayment::
            where([
                    ['invoice_id', '=', $airBookingInf->invoice_id],
                ])
                ->update(
                    [
                        'total_amount' => $newAmount,
                        'status' => $status,
                        'update_date' => $date_time

                    ]
                );
            return redirect('receptionist/res_index_airport_booking_list');
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function checkHistory($to,$from,$room_id){

        $availableRoom=BookingInfo::
        whereDate('to_date','>=',$to.' 12:00:00')
            ->whereDate('from_date','<=',$from.' 12:01:00')
            ->where([
                ['room_id', '=',$room_id],
                ['status','=',1]

            ])
            ->first();
        return $availableRoom;

    }


    public function getInvoiceId()
    {
        $randomValueOne=mt_rand(10,90);
        $randomValueTwo=mt_rand(10,90);
        $randomMulValue=$randomValueOne*$randomValueTwo;
        $valuePad=str_pad($randomMulValue,10,"0",STR_PAD_LEFT);
        $invoiceId="INV".$valuePad;
        $true=0;
        while($true==0){
            $invInfo=CheckOutPayment::
            where([
                    ['invoice_id', '=',$invoiceId],
                ])
               ->get();
            if(count($invInfo)==0) {
                $true = 1;

            }
            else {
                $true = 0;
                $randomValueOne=mt_rand(10,90);
                $randomValueTwo=mt_rand(10,90);
                $randomMulValue=$randomValueOne*$randomValueTwo;
                $valuePad=str_pad($randomMulValue,10,"0",STR_PAD_LEFT);
                $invoiceId="INV".$valuePad;
            }

        }

        return $invoiceId;

      //  dd($invoiceId);
    }

    public function getBookingInfo($id){
        $bookingInfo=BookingInfo::
        where([
                ['booking_id', '=',$id],
            ])
            ->first();
        return $bookingInfo;
    }

    public function getRoomInfo($id)
    {

         $roomInfo=RoomsInfo::
         where([
                 ['room_id', '=',$id],
             ])
             ->first();
        return $roomInfo;

    }

    public function getMealsInfo($id){
        $mealsInfo=MealsInfo::
        where([
                ['meals_id', '=',$id],
            ])
            ->first();
        return $mealsInfo;
    }

    public function getUserInfo($id)
    {
        $userInfo=UserInfo::
        where([
                ['user_id', '=',$id],
            ])
            ->first();
        return $userInfo;
    }

    public function getBookingPay($id)
    {
        $roomsBookings=BookingPaymentInfo::
        where([
                ['invoice_id', '=',$id],
            ])
            ->get();
        return $roomsBookings;
    }

    public function getOrderPay($id){
        $orderPayments=OrderPayment::
        where([
                ['invoice_id', '=',$id],
            ])
            ->get();
        return $orderPayments;
    }

    public function getAirBookingPay($id){
        $aBookingPayments=AirBookingPayment::
        where([
                ['invoice_id', '=',$id],
            ])
            ->get();
        return $aBookingPayments;
    }

    public function getPayHistory($id){
        $paymentHstys=PaymentHistory::
        where([
                ['invoice_id', '=',$id],
            ])
            ->get();
        return $paymentHstys;
    }

    public function convertDate($date_time){
        $dt = strtotime($date_time);
        return date("Y-m-d", $dt);
    }


    public function getOrderPayInfo($id)
    {
        $orderPayInfo=OrderPayment::
        where([
                ['order_id', '=',$id],
            ])
            ->first();
        return $orderPayInfo;
    }

    public function getCheckOutInfo($id){
        $checkOut=CheckOutPayment::
        where([
                ['invoice_id', '=',$id],
            ])
            ->first();
        return $checkOut;
    }

    public function checkUI(){
       if (session()->has('user_id')) {
         date_default_timezone_set('Asia/Colombo');
         $todayDate = date("Y-m-d");
         $startDate=date("Y-m-01", strtotime($todayDate));
         $endDate=date("Y-m-t", strtotime($todayDate));
         
         if (session()->has('st_date')) {
                session()->put('st_date', session('st_date'));
                session()->put('en_date', session('en_date'));
         } else {
                session([
                    'st_date' => $startDate,
                    'en_date' => $endDate
                ]);
        }
        $date1=date_create(session('st_date'));
         $date2=date_create(session('en_date'));
         $diff=date_diff($date1,$date2);
        $roomInfos = RoomsInfo::
            where([
                    ['is_remove', '=', 0]
                ])
                ->orderBy('add_date', 'asc')
                ->get();
        return view('receptionist.monthlyMap',compact('roomInfos'))->with(
                [
                    'days' => $diff->days+1
                ]
            );
        }
       else {
	session()->flush();
	return redirect('/');
      }
    }

    public function monthlySearchP(Request $request){
       if (session()->has('user_id')) {
        $stDate = $request->input('stn_date');
        $startDate=date("Y-m-01", strtotime($stDate));
        $endDate=date("Y-m-t", strtotime($stDate));
        if (session()->has('st_date')) {
                session()->put('st_date', $startDate);
                session()->put('en_date', $endDate);
         } else {
                session([
                    'st_date' => $startDate,
                    'en_date' => $endDate
                ]);
        }
        return redirect('receptionist/res_monthly_map');
       }
       else {
	session()->flush();
	return redirect('/');
      }
        
        
    }

    public function isEmptyPaymentHistory($id){
        $payHistory=PaymentHistory::
        where([
            ['invoice_id', '=',$id]
        ])
        ->get();

        if(count($payHistory)==0){
            return true;
        }
        else{
            return false;
        }

    }
    
    public function dayAvailability(){
       $room_id="R_5a87d97d4894a";
       $startDate="2018-12-01";
       $day=31;
       $actDay=$day-1;
       $nextDay = date("Y-m-d",strtotime("+".$actDay." day", strtotime($startDate)));
      // return $nextDay;
        $availableRoom=BookingInfo::
        whereDate('from_date','<=',$nextDay)
          ->whereDate('to_date','>=',$nextDay)
            ->where([
                ['room_id', '=',$room_id],
                ['check_out_status','=',0]
            ])
            ->get();
        if(count($availableRoom)==0)
            return 0;
        else{
            dd($availableRoom);
        }
    }

    public function dayAvailabilityFinal($room_id,$startDate,$day){
      
      $actDay=$day-1;
       $nextDay = date("Y-m-d",strtotime("+".$actDay." day", strtotime($startDate)));

        $availableRoom=BookingInfo::
        whereDate('from_date','<=',$nextDay)
          ->whereDate('to_date','>',$nextDay)
            ->where([
                ['room_id', '=',$room_id]
            ])
            ->first();
        if(count($availableRoom)==0)
            return 0;
        else{
            if($availableRoom->check_out_status==0)
            return $availableRoom->status;
            else
            return $availableRoom->check_out_status;
        }
    }

    public function dayAvailabilityFinalHistory($room_id,$startDate,$day){
      
      $actDay=$day-1;
       $nextDay = date("Y-m-d",strtotime("+".$actDay." day", strtotime($startDate)));

        $availableRoom=BookingInfo::
        whereDate('from_date','<=',$nextDay)
          ->whereDate('to_date','>',$nextDay)
            ->where([
                ['room_id', '=',$room_id]
            ])
            ->get();
        return $availableRoom;
    }





}
