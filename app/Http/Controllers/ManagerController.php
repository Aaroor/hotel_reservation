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

use Crypt;
use DB;

class ManagerController extends Controller
{
    /**
     * Display a listing of the manource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new manource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created manource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified manource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified manource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified manource in storage.
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
     * Remove the specified manource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function indexHome()
    {
        return view('manager.managerHome');
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
        date_default_timezone_set('Asia/Colombo');
        $todayDate=date("Y-m-d");
        $tomorrowDate=date_create($todayDate);
        date_add($tomorrowDate,date_interval_create_from_date_string("1 days"));
        $tomorrowDate=date_format($tomorrowDate,"Y-m-d");
        //dd(session('to_date'),session('from_date'));
        if (session()->has('to_date')) {
            session()->put('to_date', session('to_date'));
            session()->put('from_date',session('from_date'));
        }
        else {
            session([
                'to_date' => $tomorrowDate,
                'from_date' => $todayDate
            ]);
        }
        $roomInfos=RoomsInfo::
        where([
                ['is_remove', '=',0]
            ])
            ->orderBy('add_date', 'des')
            ->get();

        return view('manager.check_availability', compact('roomInfos'))->with(
            [
                'from_date' => session('from_date'),
                'to_date' => session('to_date')
            ]
        );

    }

    public function manSummaryDetails()
    {
        //day su

        date_default_timezone_set('Asia/Colombo');
        $todayDate = date("Y-m-d");
        $bookingInvs=CheckOutPayment::
        whereDate('add_date','=',$todayDate)
            ->get();
        $orderInvs=OrderInfo::
        whereDate('add_date','=',$todayDate)
            ->distinct()
            ->get(['invoice_id']);

        $airInvs=AirPortBookingInfo::
        whereDate('add_date','=',$todayDate)
            ->distinct()
            ->get(['invoice_id']);

        $paymentHstys=PaymentHistory::
        whereDate('update_date','=',$todayDate)
            ->get();


        $checkOutInvs=CheckOutPayment::
        whereDate('update_date','=',$todayDate)
            ->where([
                ['check_out_status', '=',1],
            ])
            ->get();



        return view('manager.summaryDetails',compact('bookingInvs','orderInvs','airInvs','paymentHstys','checkOutInvs'))->with(
            [
                'sum_date' => $todayDate,
            ]
        );
    }

    public function manSummarySearchP(Request $request)
    {
        $summaryDate= $request->input('sum_from_date');
        if (session()->has('summary_date')) {
            session()->put('summary_date', $summaryDate);
        }
        else{
            session([
                'summary_date' => $summaryDate
            ]);
        }
        return redirect('manager/man_summary_search');

    }

    public function manSummarySearch()
    {
        //date_default_timezone_set('Asia/Colombo');
        $todayDate = session('summary_date');
        $bookingInvs=CheckOutPayment::
        whereDate('add_date','=',$todayDate)
            ->get();
        $orderInvs=OrderInfo::
        whereDate('add_date','=',$todayDate)
            ->distinct()
            ->get(['invoice_id']);
        $airInvs=AirPortBookingInfo::
        whereDate('add_date','=',$todayDate)
            ->distinct()
            ->get(['invoice_id']);
        $paymentHstys=PaymentHistory::
        whereDate('update_date','=',$todayDate)
            ->get();


        $checkOutInvs=CheckOutPayment::
        whereDate('update_date','=',$todayDate)
            ->where([
                ['check_out_status', '=',1],
            ])
            ->get();



        return view('manager.summaryDetails',compact('bookingInvs','orderInvs','airInvs','paymentHstys','checkOutInvs'))->with(
            [
                'sum_date' => $todayDate,
            ]
        );
    }

    public function manAvailableRoomsSearch(Request $request){

        $toDate=$request->input('to_date');
        $fromDate=$request->input('from_date');
        if (session()->has('to_date')) {

            session()->put('to_date', $toDate);
            session()->put('from_date', $fromDate);
        }
        else {

            session([
                'to_date' => $toDate,
                'from_date' => $fromDate
            ]);
        }
        return redirect('manager/man_room_search');

    }

    public function manAvailableRoomsSearchMap(Request $request){

        $toDate=$request->input('to_date');
        $fromDate=$request->input('from_date');
        if (session()->has('to_date')) {

            session()->put('to_date', $toDate);
            session()->put('from_date', $fromDate);
        }
        else {

            session([
                'to_date' => $toDate,
                'from_date' => $fromDate
            ]);
        }
        return redirect('manager/man_room_search_map');

    }

    public function manRoomSearch(){
        $roomInfos=RoomsInfo::
        where([
                ['is_remove', '=',0]
            ])
            ->orderBy('add_date', 'des')
            ->get();

        return view('manager.check_availability', compact('roomInfos'))->with(
            [
                'from_date' => session('from_date'),
                'to_date' => session('to_date')
            ]
        );
    }

    public function manRoomSearchMap(){
        $roomInfos=RoomsInfo::
        where([
                ['is_remove', '=',0]
            ])
            ->orderBy('floor_number', 'asc')
            ->get();

        return view('manager.check_availability_map', compact('roomInfos'))->with(
            [
                'from_date' => session('from_date'),
                'to_date' => session('to_date')
            ]
        );
    }

    public function manIndexBookingInfo($id)
    {
        $roomInfo = RoomsInfo::
        where([
                ['room_id', '=', $id]
            ])
            ->first();




        if ($this->getBookingId(session('to_date'), session('from_date'), $id) == 0) {
            date_default_timezone_set('Asia/Colombo');
            $date_time = date("Y-m-d H:i:s");
            $invoiceId = $this->getInvoiceId();

            if (session()->has('r_b_index')) {
                if(session('r_b_index')==1) {

                    $invoiceId = session('r_b_invoice_id');
                }
                else {

                    session()->put('r_b_index', 0);
                    session()->put('r_b_invoice_id', 0);
                }
            }
            else{
                session([
                    'r_b_index' => 0,
                    'r_b_invoice_id'=>0
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

            BookingInfo::insert(
                [

                    'booking_id' => $bookingId,
                    'invoice_id' => $invoiceId,
                    'room_id' => $id,
                    'from_date' => session('from_date'),
                    'to_date' => session('to_date'),
                    'status' => 1,
                    'is_remove' => 0,
                    'user_id' =>session('user_id'),
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
            if(session('r_b_index')==1) {

                $bookIn = BookingInfo::
                where([
                        ['invoice_id', '=',session('r_b_invoice_id')],
                    ])
                    ->first();

                if (session()->has('r_b_cus_id')){
                    session()->put('r_b_cus_id',$bookIn->customer_id);
                }
                else{
                    session([
                        'r_b_cus_id' => $bookIn->customer_id,
                    ]);
                }
                session()->put('r_b_index', 0);
            }

        }
        else{
            if (session()->has('r_b_cus_id')){
                session()->put('r_b_cus_id',0);
            }
            else{
                session([
                    'r_b_cus_id' =>0,
                ]);
            }
        }

       // dd(session('r_b_invoice_id'));


        return view('manager.bookingDetails', compact('cusInfos', 'roomInfo'))->with(
            [
                'msg' => 0,
                'cmt' => 'init'
            ]
        );
    }

    public function manBookingCancel($id){
       // dd($id);
        BookingInfo::
        where('booking_id','=', $id)
            ->delete();

        return redirect('manager/man_cancellation_success');

    }

    public function manBookingCancelMap($id){
        // dd($id);
        BookingInfo::
        where('booking_id','=', $id)
            ->delete();

        return redirect('manager/man_cancellation_map_success');

    }


    public function manCancellationSuccess(){
        $roomInfos=RoomsInfo::
        where([
                ['is_remove', '=',0]
            ])
            ->orderBy('floor_number', 'asc')
            ->get();

        return view('manager.check_availability_map', compact('roomInfos'))->with(
            [
                'from_date' => session('from_date'),
                'to_date' => session('to_date')
            ]
        );
    }

    public function manCancellationSuccessMap(){
        $roomInfos=RoomsInfo::
        where([
                ['is_remove', '=',0]
            ])
            ->orderBy('floor_number', 'asc')
            ->get();

        return view('manager.check_availability_map', compact('roomInfos'))->with(
            [
                'from_date' => session('from_date'),
                'to_date' => session('to_date')
            ]
        );
    }

    public function getBookingId($to,$from,$room_id){
        $availableRoom=BookingInfo::
        whereDate('to_date','>=',$to)
            ->whereDate('from_date','<=',$from)
            ->where([
                ['room_id', '=',$room_id],
                ['check_out_status','=',0]
            ])
            ->first();
        if(count($availableRoom)==0)
            return 0;
        else
            return -1;

    }

    public function manCreateNewCustomer(){
        return view('manager.createCustomer')->with(
            [
                'msg' => 0,
                'cmt' => 'init'
            ]
        );
    }

    public function manAddNewCustomer(Request $request){
        $cusFirstName = $request->input('cus_first_name');
        $cusLastName = $request->input('cus_last_name');
        $email = $request->input('cus_mail');
        $phone = $request->input('cus_phone');
        $nicPassport = $request->input('cus_nic_pass');
        $address = $request->input('cus_address');

        date_default_timezone_set('Asia/Colombo');
        $date_time = date("Y-m-d H:i:s");
        $userId = "CUS_" . uniqid();
        $name=$cusFirstName." ".$cusLastName;
        if($email=="") {
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
            return redirect('manager/man_create_cus_success');

        }
        else {
            $cusCount = CustomerInfo::
            where([
                    ['cus_email', '=', $email],
                    ['is_remove','=',0]
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
                return redirect('manager/man_create_cus_success');
            } else {
                if (session()->has('cmt'))
                    session()->put('cmt', $name);
                else
                    session(['cmt' => $name]);
                return redirect('manager/man_create_cus_failure');
            }
        }
    }

    public function manCreateCustomerFailure(){
        $roomInfo=RoomsInfo::
        where([
                ['room_id', '=',session('s_room_id')]
            ])
            ->first();

        $cusInfos=CustomerInfo::
        where([
                ['is_remove', '=',0],
            ])
            ->orderBy('add_date', 'des')
            ->get();

        return view('manager.bookingDetails', compact('cusInfos','roomInfo'))->with(
            [
                'msg' => 0,
                'cmt' => 'init'
            ]
        );
    }


    public function manCreateCustomerSuccess(){
        $roomInfo=RoomsInfo::
        where([
                ['room_id', '=',session('s_room_id')]
            ])
            ->first();

        $cusInfos=CustomerInfo::
        where([
                ['is_remove', '=',0],
            ])
            ->orderBy('add_date', 'des')
            ->get();

        return view('manager.bookingDetails', compact('cusInfos','roomInfo'))->with(
            [
                'msg' => 0,
                'cmt' => 'init'
            ]
        );
    }

    public function manAddBooking(Request $request){


        $toDate=$request->input('to_date');
        $fromDate=$request->input('from_date');
        $cusId=$request->input('cus_id');
        $roomId=$request->input('room_id');
        $invId=session('s_inv_id');
        $totalAmount=$request->input('total_amount');
        $advancePayment=$request->input('advance_payment');
        $numOfDays=$request->input('number_of_days');
        $perDayAmount=$request->input('amount_per_day');
        $numOfChildren=$request->input('no_of_children');
        $numOfAdults=$request->input('no_of_adults');
        $bookingType = $request->input('booking_type');
        $brokerName=$request->input('broker_name');
        $discountAmount=$request->input('discount_amount');
        //  dd($request);

        date_default_timezone_set('Asia/Colombo');
        $date_time = date("Y-m-d H:i:s");
        BookingInfo::
        where([
                ['booking_id', '=',session('s_book_id')],
            ])
            ->update(
                [
                    'customer_id'=>$cusId,
                    'status'=>2,
                    'is_remove' => 0,
                    'user_id'=>session('user_id'),
                    'no_of_children'=>$numOfChildren,
                    'no_of_adults'=>$numOfAdults,
                    'cancel_lock'=>0,
                    'edit_lock'=>0,
                    'booking_type' => $bookingType,
                    'broker_name'=>$brokerName,
                    'update_date' => $date_time

                ]
            );

        $payId = "BPAY_" . uniqid();

        BookingPaymentInfo::insert(
            [
                'payment_id'=>$payId,
                'invoice_id'=>$invId,
                'booking_id'=>session('s_book_id'),
                'no_of_days'=>$numOfDays,
                'total_amount'=>$totalAmount,
                'is_remove'=>0,
                'add_date'=>$date_time,
                'update_date'=>$date_time


            ]
        );

        $cPayId = "CPAY_" . uniqid();
        // dd(session('r_b_invoice_id'));
        if(session()->has('r_b_invoice_id'))
        {

            if(strcmp(session('r_b_invoice_id'),"0")!=0){
                $preCheck=CheckOutPayment::
                where([
                        ['invoice_id', '=',session('r_b_invoice_id')],
                    ])
                    ->first();
                // dd($preCheck);


                $newAmount=$preCheck->total_amount+$totalAmount;
                $statVal=($newAmount-$discountAmount)-$preCheck->paid_amount;
                $status=0;
                if($statVal==0)
                    $status=1;
                else
                    $status=0;

                CheckOutPayment::
                where([
                        ['invoice_id', '=',session('r_b_invoice_id')],
                    ])
                    ->update(
                        [
                            'total_amount'=>$newAmount,
                            'status'=>$status,
                            'booking_type' => $bookingType,
                            'discount_amount'=>$discountAmount,
                            'update_date' => $date_time

                        ]
                    );



            }
            else{

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
        }
        else {

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
        $sBookId=session('s_book_id');
        $userId=session('user_id');
        session()->flush();
        session(
            [
                's_book_id' => $sBookId,
                'user_id'=>$userId

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


        return redirect('manager/man_success_booking');



    }


    public function manSuccessBooking(){

        $bookingInfo=BookingInfo::
        where([
                ['is_remove', '=',0],
                ['booking_id', '=',session('s_book_id')]
            ])
            ->first();

        if (session()->has('b_to_date')) {
            session()->put('b_to_date', $bookingInfo->to_date);
            session()->put('b_from_date',$bookingInfo->from_date);
        }
        else {
            session([
                'b_to_date' => $bookingInfo->to_date,
                'b_from_date' => $bookingInfo->from_date
            ]);
        }

        $bookingInfos=BookingInfo::
        where([
                ['is_remove', '=',0],
                ['booking_id', '=',session('s_book_id')]
            ])
            ->get();


        return view('manager.bookingList', compact('bookingInfos'))->with(
            [
                'msg' => 1,
                'cmt' => 'init'
            ]
        );

    }

    public function manBookingList(){
        date_default_timezone_set('Asia/Colombo');
        $todayDate=date("Y-m-d");
        $tomorrowDate=date_create($todayDate);
        date_add($tomorrowDate,date_interval_create_from_date_string("1 days"));
        $tomorrowDate=date_format($tomorrowDate,"Y-m-d");
        if (session()->has('b_to_date')) {
            session()->put('b_to_date', session('b_to_date'));
            session()->put('b_from_date',session('b_from_date'));
        }
        else {
            session([
                'b_to_date' => $tomorrowDate,
                'b_from_date' => $todayDate
            ]);
        }
        $bookingInfos=BookingInfo::
        whereDate('to_date','>=',session('b_from_date'))
            ->whereDate('from_date','<=',session('b_to_date'))
            ->where([
                ['check_out_status', '=',0],
            ])
            ->get();


        return view('manager.bookingList', compact('bookingInfos'))->with(
            [
                'msg' => 0,
                'cmt' => 'init'
            ]
        );
    }

    public function indexRemoveReceptionist($id){

        $userInfo=UserInfo::
        where([
                ['user_id', '=',$id],
            ])
            ->first();


        UserInfo::
        where([
                ['is_remove', '=', 0],
                ['user_id', '=', $id],
            ])
            ->update(
                ['is_remove' => 1]
            );

        if (session()->has('cmt'))
            session()->put('cmt', $userInfo->user_name);
        else
            session(['cmt' => $userInfo->user_name]);
        return redirect('manager/remove_receptionist_success');

    }
    public function removeReceptionistSuccess()
    {
        $userInfos=UserInfo::
        where([
                ['is_remove', '=',0],
                ['user_role','=',2]
            ])
            ->orderBy('add_date', 'des')
            ->get();
        return view('manager.receptionistList', compact('userInfos'))->with(
            [
                'msg' => 1,
                'cmt' => session('cmt')
            ]
        );
    }


    public function manIndexOrderMeals(){
        $mealsInfos=MealsInfo::
        where([
                ['is_remove', '=',0],
            ])
            ->get();

        $bookingInfos=BookingInfo::
        where([
                ['is_remove', '=',0],
                ['status', '=',2]
            ])
            ->orderBy('add_date', 'desc')
            ->get();
        $bookingInf=BookingInfo::
        where([
                ['is_remove', '=',0],
                ['status', '=',2]
            ])
            ->orderBy('add_date', 'desc')
            ->first();

        if (session()->has('o_booking_id')) {

            session()->put('o_booking_id',session('o_booking_id'));
        }
        else {
            if(count($bookingInf)!=0) {
                session([
                    'o_booking_id' => $bookingInf->booking_id,
                ]);
            }
        }

//        dd(session('o_booking_id'));

        return view('manager.orderMeals',compact('mealsInfos','bookingInfos'))->with(
            [
                'msg' =>0,
                'cmt' =>'init'
            ]
        );
    }


    public function manAddBookingId(Request $request)
    {


        $bookingId=$request->input('booking_id');
        if (session()->has('o_booking_id')) {

            session()->put('o_booking_id',$bookingId);
        }
        else {

            session([
                'o_booking_id' => $bookingId,
            ]);
        }

        return redirect('manager/man_index_order_meals');


    }

    public function manAddMealsOrderP(Request $request){
        $orderDate=$request->input('order_date');
        $mealsId=$request->input('meals_id');
        $orderTime=$request->input('order_time');
        $quantity=$request->input('quantity');
       // $unitPrice=$request->input('quantity');
        $totalAmount=$request->input('total_amount');
        date_default_timezone_set('Asia/Colombo');
        $date_time=date("Y-m-d H:i:s");
        $orderId="OR_".uniqid();
        $payId="ORPAY_".uniqid();
        $mealsInfo=MealsInfo::
        where([
                ['meals_id', '=',$mealsId],
            ])
            ->first();
        $amountValue=$mealsInfo->price_per_unit*$quantity;
        $bookingInfo=BookingInfo::
        where([
                ['booking_id', '=',session('o_booking_id')],
            ])
            ->first();
        $invId=$bookingInfo->invoice_id;
        // dd($invId);


        OrderInfo::insert(
            [
                'order_id'=>$orderId,
                'meals_id'=>$mealsId,
                'booking_id'=>session('o_booking_id'),
                'invoice_id'=>$bookingInfo->invoice_id,
                'order_date'=>$orderDate,
                'order_time'=>$orderTime,
                'quantity'=>$quantity,
                'is_remove'=>0,
                'user_id'=>session('user_id'),
                'edit_lock'=>0,
                'remove_lock'=>0,
                'add_date'=>$date_time,
                'update_date'=>$date_time
            ]
        );

        OrderPayment::insert(
            [
                'order_pay_id'=>$payId,
                'booking_id'=>session('o_booking_id'),
                'order_id'=>$orderId,
                'invoice_id'=>$invId,
                'quantity'=>$quantity,
                'amount'=>$totalAmount,
                'is_remove'=>0,
                'add_date'=>$date_time,
                'update_date'=>$date_time
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

        $checkPay=CheckOutPayment::
        where([
            ['invoice_id', '=',$invId],
        ])
            ->first();
        $newAmount=$checkPay->total_amount+$totalAmount;
        $status=0;
        $statVal=$newAmount-$checkPay->paid_amount;
        if($statVal==0)
            $status=1;
        else
            $status=0;
        CheckOutPayment::
        where([
                ['invoice_id', '=',$invId],
            ])
            ->update(
                [
                    'total_amount'=>$newAmount,
                    'status'=>$status
                ]
            );

        if (session()->has('cmt'))
            session()->put('cmt', $mealsInfo->meals_name);
        else
            session(['cmt' => $mealsInfo->meals_name]);
        return redirect('manager/man_index_order_meals1');


    }

    public function manUpdateMealsOrderP(Request $request){
        $orderDate=$request->input('order_date');
        $orderTime=$request->input('order_time');
        $quantity=$request->input('quantity');
        $totalAmount=$request->input('total_amount');
        date_default_timezone_set('Asia/Colombo');
        $date_time=date("Y-m-d H:i:s");
        $orderId=$request->input('order_id');
        $payId=$request->input('pay_id');




        $prevInfo=OrderPayment::
        where([
                ['order_pay_id', '=', $payId]
            ])
            ->first();
        $prevAmount=$prevInfo->amount;



        OrderInfo::
        where([
                ['order_id', '=', $orderId]
            ])
        ->update(
            [
                'order_date'=>$orderDate,
                'order_time'=>$orderTime,
                'quantity'=>$quantity,
                'user_id'=>session('user_id'),
                'edit_lock'=>0,
                'remove_lock'=>0,
                'update_date'=>$date_time
            ]
        );
        $totalAmount=$request->input('total_amount');

        OrderPayment::
        where([
                ['order_pay_id', '=', $payId]
            ])
            ->update(
                [
                    'quantity'=>$quantity,
                    'amount'=>$totalAmount,
                    'update_date'=>$date_time
                ]
            );


        $orderInfo=OrderInfo::
        where([
                ['order_id', '=', $orderId]
            ])
            ->first();


        $checkPay=CheckOutPayment::
        where([
                ['invoice_id', '=',$orderInfo->invoice_id],
            ])
            ->first();
        $newAmount=($checkPay->total_amount-$prevAmount)+$totalAmount;
        $status=0;
        $statVal=$newAmount-$checkPay->paid_amount;
        if($statVal==0)
            $status=1;
        else
            $status=0;




        CheckOutPayment::
        where([
                ['invoice_id', '=',$prevInfo->invoice_id],
            ])
            ->update(
                [
                    'total_amount'=>$newAmount,
                    'status'=>$status
                ]
            );

        if (session()->has('cmt'))
            session()->put('cmt', $prevInfo->invoice_id);
        else
            session(['cmt' => $prevInfo->invoice_id]);


        return redirect('manager/man_order_update_success');


    }

    public function manOrderUpdateSuccess()
    {
        $orderInfos=OrderInfo::
        where([
                ['is_remove', '=',0],
            ])
            ->orderBy('add_date', 'desc')
            ->get();
        return view('manager.orderList',compact('orderInfos'))->with(
            [
                'msg' =>3,
                'cmt' =>session('cmt')
            ]
        );
    }


    public function manIndexOrderMeals1(){
        $mealsInfos=MealsInfo::
        where([
                ['is_remove', '=',0],
            ])
            ->get();

        $bookingInfos=BookingInfo::
        where([
                ['is_remove', '=',0],
                ['status', '=',2]
            ])
            ->orderBy('add_date', 'desc')
            ->get();
        $bookingInf=BookingInfo::
        where([
                ['is_remove', '=',0],
                ['status', '=',2]
            ])
            ->orderBy('add_date', 'desc')
            ->first();

        if (session()->has('o_booking_id')) {

            session()->put('o_booking_id',session('o_booking_id'));
        }
        else {

            session([
                'o_booking_id' => $bookingInf->booking_id,
            ]);
        }

        return view('manager.orderMeals',compact('mealsInfos','bookingInfos'))->with(
            [
                'msg' =>1,
                'cmt' =>session('cmt')
            ]
        );
    }

    public function manIndexOrderList(){
        $orderInfos=OrderInfo::
        where([
                ['is_remove', '=',0],
            ])
            ->orderBy('add_date', 'desc')
            ->get();
        return view('manager.orderList',compact('orderInfos'))->with(
            [
                'msg' =>0,
                'cmt' =>'init'
            ]
        );
    }

    public function manIndexAdminAirPortBooking(){
        $bookingInfos=DB::table('booking_info')
            ->where([
                ['is_remove', '=',0],
                ['status', '=',2]
            ])
            ->orderBy('add_date', 'desc')
            ->get();
        $bookingInf=DB::table('booking_info')
            ->where([
                ['is_remove', '=',0],
                ['status', '=',2]
            ])
            ->orderBy('add_date', 'desc')
            ->first();

        if(count($bookingInf)!=0) {

            if (session()->has('a_booking_id')) {

                session()->put('a_booking_id', session('a_booking_id'));
            } else {

                session([
                    'a_booking_id' => $bookingInf->booking_id,
                ]);
            }
        }
        return view('manager.airPortBooking',compact('bookingInfos'))->with(
            [
                'msg' =>0,
                'cmt' =>'init'
            ]
        );

    }

    public function manAddBookingIdA(Request $request)
    {


        $bookingId=$request->input('booking_id');
        if (session()->has('a_booking_id')) {

            session()->put('a_booking_id',$bookingId);
        }
        else {

            session([
                'a_booking_id' => $bookingId,
            ]);
        }

        return redirect('manager/man_index_airport_booking');


    }

    public function manAirPortBookingP(Request $request){
        $bookingType=$request->input('booking_type');
        $no_of_passengers=$request->input('no_of_passengers');
        $fromPlace=$request->input('from_place');
        $toPlace=$request->input('to_place');
        $bookingDate=$request->input('booking_date');
        $bookingTime=$request->input('booking_time');
        $amount=$request->input('a_amount');
        date_default_timezone_set('Asia/Colombo');
        $date_time=date("Y-m-d H:i:s");
        $a_bookingId="A_B_".uniqid();
        $payId="APAY_".uniqid();

        $bookingInf=BookingInfo::
        where([
                ['booking_id', '=',session('a_booking_id')],
            ])
            ->first();

        AirPortBookingInfo::insert(
            [
                'a_booking_id'=>$a_bookingId,
                'booking_id'=>session('a_booking_id'),
                'invoice_id'=>$bookingInf->invoice_id,
                'a_booking_type'=>$bookingType,
                'no_of_passengers'=>$no_of_passengers,
                'a_booking_from'=>$fromPlace,
                'a_booking_to'=>$toPlace,
                'a_booking_date'=>$bookingDate,
                'a_booking_time'=>$bookingTime,
                'a_amount'=>$amount,
                'is_remove'=>0,
                'user_id'=>session('user_id'),
                'add_date'=>$date_time,
                'update_date'=>$date_time
            ]
        );

        AirBookingPayment::insert(
            [
                'a_payment_id'=>$payId,
                'a_booking_id'=>$a_bookingId,
                'booking_id'=>session('a_booking_id'),
                'invoice_id'=>$bookingInf->invoice_id,
                'amount'=>$amount,
                'is_remove'=>0,
                'add_date'=>$date_time,
                'update_date'=>$date_time
            ]
        );
        $userInfos=UserInfo::
        where([
                ['is_remove', '=', 0]
            ])
            ->get();
        if(count($userInfos)!=0) {
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

        $checkPayInfo=CheckOutPayment::
        where([
                ['invoice_id', '=',$bookingInf->invoice_id],
            ])
            ->first();
        $newAmount=$checkPayInfo->total_amount+$amount;
        $status=0;
        $statVal=$newAmount-$checkPayInfo->paid_amount;
        if($statVal==0)
            $status=1;
        else
            $status=0;
        CheckOutPayment::
        where([
                ['invoice_id', '=',$bookingInf->invoice_id],
            ])
            ->update(
                [
                    'total_amount'=>$newAmount,
                    'status'=>$status
                ]
            );



        $dateTime=$bookingDate." ".$bookingTime;
        if (session()->has('cmt'))
            session()->put('cmt', $dateTime);
        else
            session(['cmt' => $dateTime]);
        return redirect('manager/man_airport_booking_success');

    }

    public function manAirportBookingSuccess(){
        $bookingInfos=BookingInfo::
        where([
                ['is_remove', '=',0],
                ['status', '=',2]
            ])
            ->orderBy('add_date', 'desc')
            ->get();
        $bookingInf=BookingInfo::
        where([
                ['is_remove', '=',0],
                ['status', '=',2]
            ])
            ->orderBy('add_date', 'desc')
            ->first();

        if (session()->has('a_booking_id')) {

            session()->put('a_booking_id',session('a_booking_id'));
        }
        else {

            session([
                'a_booking_id' => $bookingInf->booking_id,
            ]);
        }
        return view('manager.airPortBooking',compact('bookingInfos'))->with(
            [
                'msg' =>1,
                'cmt' =>session('cmt')
            ]
        );

    }

    public function manIndexAirportBookingList(){
        $aBookingInfos=AirPortBookingInfo::
        where([
                ['is_remove', '=',0],
            ])
            ->orderBy('add_date', 'desc')
            ->get();
        //dd($aBookingInfos);
        return view('manager.airBookingList',compact('aBookingInfos'))->with(
            [
                'msg' =>0,
                'cmt' =>'init'
            ]
        );
    }

    public function manAllBookingList()
    {
        date_default_timezone_set('Asia/Colombo');
        $todayDate=date("Y-m-d");
        $tomorrowDate=date_create($todayDate);
        date_add($tomorrowDate,date_interval_create_from_date_string("1 days"));
        $tomorrowDate=date_format($tomorrowDate,"Y-m-d");
        if (session()->has('b_to_date')) {
            session()->put('b_to_date', session('b_to_date'));
            session()->put('b_from_date',session('b_from_date'));
        }
        else {
            session([
                'b_to_date' => $tomorrowDate,
                'b_from_date' => $todayDate
            ]);
        }

        $bookingInfos=BookingInfo::
        where([
                ['is_remove', '=',0],
                ['check_out_status', '=',0]
            ])
            ->orderBy('add_date', 'des')
            ->get();

        return view('manager.bookingList', compact('bookingInfos'))->with(
            [
                'msg' => 5,
                'cmt' => 'init'
            ]
        );
    }

    public function manBookingSearchP(Request $request){
        $toDate=$request->input('to_date');
        $fromDate=$request->input('from_date');
        if (session()->has('b_to_date')) {

            session()->put('b_to_date', $toDate);
            session()->put('b_from_date', $fromDate);
        }
        else {

            session([
                'b_to_date' => $toDate,
                'b_from_date' => $fromDate
            ]);
        }
        return redirect('manager/man_booking_search');
    }

    public function manBookingSearch(){

        $to=session('b_from_date');
        $from=session('b_to_date');
        $bookingInfos=BookingInfo::
        whereDate('to_date','>=',$to)
            ->whereDate('from_date','<=',$from)
            ->where([
                ['check_out_status', '=',0],
            ])
            ->get();

        return view('manager.bookingList', compact('bookingInfos'))->with(
            [
                'msg' => 0,
                'cmt' => 'init'
            ]
        );

    }

    public function manReMealsBooking($id){
        if (session()->has('o_booking_id')) {

            session()->put('o_booking_id',$id);
        }
        else {

            session([
                'o_booking_id' => $id,
            ]);
        }
        return redirect('manager/man_index_order_meals');
    }

    public function manReAirBooking($id){
        if (session()->has('a_booking_id')) {

            session()->put('a_booking_id',$id);
        }
        else {

            session([
                'a_booking_id' => $id,
            ]);
        }

        return redirect('manager/man_index_airport_booking');
    }

    public function manIndexPaymentCheckOut()
    {
        $checkOutInfos=CheckOutPayment::
        where([
                ['is_remove', '=',0],
                ['status','=',0]
            ])
            ->get();

        return view('manager.checkOutPayment', compact('checkOutInfos'))->with(
            [
                'msg' => 0,
                'cmt' => 'init'
            ]
        );
    }

    public function manAddCheckOut($id)
    {
        date_default_timezone_set('Asia/Colombo');
        $date_time = date("Y-m-d H:i:s");
        CheckOutPayment::
        where([
                ['invoice_id', '=',$id],
            ])
           -> update(
                [
                    'check_out_status' =>1,
                    'update_date'=>$date_time
                ]
            );
        BookingInfo::
        where([
                ['invoice_id', '=',$id],
            ])
            -> update(
                [
                    'check_out_status' =>1,
                ]
            );

        if (session()->has('man_check_inv_id')) {

            session()->put('man_check_inv_id',$id);
        }
        else {

            session([
                'man_check_inv_id' => $id,
            ]);
        }
        return redirect('manager/man_check_out_success');




    }

    public function manCheckOutSuccess()
    {
        $checkOutInfos=CheckOutPayment::
        where([
                ['is_remove', '=',0],
                ['status','=',1],
                ['check_out_status','=',1],
                ['invoice_id','=',session('man_check_inv_id')],
            ])
            ->get();

        return view('manager.finalCheckOut', compact('checkOutInfos'))->with(
            [
                'msg' => 0,
                'cmt' => 'init'
            ]
        );
    }



    public function manCheckOutInfo()
    {
        $checkOutInfos=CheckOutPayment::
        where([
                ['is_remove', '=',0],
                ['status','=',1],
                ['check_out_status','=',1]
            ])
            ->get();

        return view('manager.finalCheckOut', compact('checkOutInfos'))->with(
            [
                'msg' => 0,
                'cmt' => 'init'
            ]
        );
    }

    public function manReportCheckOut()
    {
        $checkOutInfos=CheckOutPayment::
        where([
                ['is_remove', '=',0],
                ['status','=',1],
                ['check_out_status','=',1]
            ])
            ->get();

       // dd($checkOutInfos);

        return view('manager.reportCheckOuts', compact('checkOutInfos'))->with(
            [
                'msg' => 0,
                'cmt' => 'init'
            ]
        );
    }

    public function manReportCurrentBooking()
    {
        $checkOutInfos=CheckOutPayment::
        where([
                ['is_remove', '=',0],
                ['check_out_status','=',0]
            ])
            ->get();

        // dd($checkOutInfos);

        return view('manager.reportCurrentBookings', compact('checkOutInfos'))->with(
            [
                'msg' => 0,
                'cmt' => 'init'
            ]
        );
    }

    public function manBillCheckOut()
    {
        $checkOutInfos=CheckOutPayment::
        where([
                ['is_remove', '=',0],
                ['status','=',1],
                ['check_out_status','=',1]
            ])
            ->get();




        return view('manager.printCheckOut', compact('checkOutInfos'))->with(
            [
                'msg' => 0,
                'cmt' => 'init'
            ]
        );
    }


    public function manBillCurrentBooking()
    {
        $checkOutInfos=CheckOutPayment::
        where([
                ['is_remove', '=',0],
                ['check_out_status','=',0]
            ])
            ->get();

        return view('manager.printCurrentBooking', compact('checkOutInfos'))->with(
            [
                'msg' => 0,
                'cmt' => 'init'
            ]
        );
    }

    public function manBillCurrentBookingDuration()
    {
        //rep211
        if(session('search_booking_type')==4) {
            $checkOutInfos = CheckOutPayment::
            whereDate('update_date', '>=', session('search_date_report_check_from'))
                ->whereDate('update_date', '<=', session('search_date_report_check_to'))
                ->where([
                    ['check_out_status', '=', 0]
                ])
                ->get();
        }
        else
        {
            $checkOutInfos = CheckOutPayment::
            whereDate('update_date', '>=', session('search_date_report_check_from'))
                ->whereDate('update_date', '<=', session('search_date_report_check_to'))
                ->where([
                    ['check_out_status', '=', 0],
                    ['booking_type', '=', session('search_booking_type')]
                ])
                ->get();
        }

        return view('manager.printCurrentBookingDuration', compact('checkOutInfos'))->with(
            [
                'msg' => 1,
                'cmt' => 'init'
            ]
        );
    }



    public function manIndexPaidPayment()
    {
        $checkOutInfos=CheckOutPayment::
        where([
                ['is_remove', '=',0],
                ['status','=',1],
                ['check_out_status','=',0]
            ])
            ->get();

        return view('manager.paidPayment', compact('checkOutInfos'))->with(
            [
                'msg' => 0,
                'cmt' => 'init'
            ]
        );
    }

    public function manPaymentCheckOut($id)
    {
        $checkOutInfos=CheckOutPayment::
        where([
                ['is_remove', '=',0],
                ['invoice_id', '=',$id],
            ])
            ->get();

        $checkOutInf=CheckOutPayment::
        where([
                ['is_remove', '=',0],
                ['invoice_id', '=',$id],
            ])
            ->first();
       // dd($checkOutInfos);
        $resVal=$checkOutInf->total_amount-$checkOutInf->paid_amount;
        if($resVal==0){
            return view('manager.paidPayment', compact('checkOutInfos'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
        else {
            return view('manager.checkOutPayment', compact('checkOutInfos'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );
        }
    }



    public function manIndexPaymentPreview($id){
        $aBookingPayments=AirBookingPayment::
        where([
                ['is_remove', '=',0],
                ['invoice_id', '=',$id]
            ])
            ->orderBy('add_date', 'desc')
            ->get();
        $orderPayments=OrderPayment::
        where([
                ['is_remove', '=',0],
                ['invoice_id', '=',$id]
            ])
            ->orderBy('add_date', 'desc')
            ->get();
        $roomsBookings=BookingPaymentInfo::
        where([
                ['is_remove', '=',0],
                ['invoice_id', '=',$id]
            ])
            ->orderBy('add_date', 'desc')
            ->get();

        if (session()->has('p_invoice_id')) {

            session()->put('p_invoice_id',$id);
        }
        else {

            session([
                'p_invoice_id' => $id,
            ]);
        }

        return view('manager.previewPayment',compact('aBookingPayments','orderPayments','roomsBookings'))->with(
            [
                'msg' =>0,
                'cmt' =>'init'
            ]
        );
    }

    public function manPrintBill($id){
        $aBookingPayments=AirBookingPayment::
        where([
                ['is_remove', '=',0],
                ['invoice_id', '=',$id]
            ])
            ->orderBy('add_date', 'desc')
            ->get();
        $orderPayments=OrderPayment::
        where([
                ['is_remove', '=',0],
                ['invoice_id', '=',$id]
            ])
            ->orderBy('add_date', 'desc')
            ->get();
        $roomsBookings=BookingPaymentInfo::
        where([
                ['is_remove', '=',0],
                ['invoice_id', '=',$id]
            ])
            ->orderBy('add_date', 'desc')
            ->get();
        $checkOutPayInfo=CheckOutPayment::
        where([
                ['is_remove', '=',0],
                ['invoice_id', '=',$id]
            ])
            ->first();

        $paymentHstys=PaymentHistory::
        where([
                ['is_remove', '=',0],
                ['invoice_id', '=',$id]
            ])
            ->get();

        if (session()->has('p_invoice_id')) {

            session()->put('p_invoice_id',$id);
        }
        else {

            session([
                'p_invoice_id' => $id,
            ]);
        }

        if (session()->has('pay_invoice')) {
            session()->put('pay_invoice', $id);
        }
        else {
            session([
                'pay_invoice' => $id,
            ]);
        }




            $statVal = $checkOutPayInfo->total_amount - $checkOutPayInfo->paid_amount;
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


            return view('manager.printTemp', compact('aBookingPayments', 'orderPayments', 'roomsBookings', 'checkOutPayInfo', 'paymentHstys'))->with(
                [
                    'msg' => 0,
                    'cmt' => 'init'
                ]
            );

    }

    public function manBillPayment($id){

        $aBookingPayments=AirBookingPayment::
        where([
                ['is_remove', '=',0],
                ['invoice_id', '=',$id]
            ])
            ->orderBy('add_date', 'desc')
            ->get();
        $orderPayments=OrderPayment::
        where([
                ['is_remove', '=',0],
                ['invoice_id', '=',$id]
            ])
            ->orderBy('add_date', 'desc')
            ->get();
        $roomsBookings=BookingPaymentInfo::
        where([
                ['is_remove', '=',0],
                ['invoice_id', '=',$id]
            ])
            ->orderBy('add_date', 'desc')
            ->get();
        $checkOutPayInfo=CheckOutPayment::
        where([
                ['is_remove', '=',0],
                ['invoice_id', '=',$id]
            ])
            ->first();

        $paymentHstys=PaymentHistory::
        where([
                ['is_remove', '=',0],
                ['invoice_id', '=',$id]
            ])
            ->get();

        if (session()->has('p_invoice_id')) {

            session()->put('p_invoice_id',$id);
        }
        else {

            session([
                'p_invoice_id' => $id,
            ]);
        }

        return view('manager.billPayment',compact('aBookingPayments','orderPayments','roomsBookings','checkOutPayInfo','paymentHstys'))->with(
            [
                'msg' =>0,
                'cmt' =>'init'
            ]
        );




    }

    public function manReRoomBooking($id){
        $bookIn = BookingInfo::
        where([
                ['booking_id', '=',$id],
            ])
            ->first();
        if (session()->has('r_b_index')) {

            session()->put('r_b_invoice_id',$bookIn->invoice_id);
            session()->put('r_b_index',1);
        }
        else {

            session([
                'r_b_invoice_id' => $bookIn->invoice_id,
                'r_b_index' => 1
            ]);
        }
        return redirect('manager/man_check_map');
    }


    public function manRemoveBooking($id)
    {
        $bookingIn=BookingInfo::
        where([
                ['booking_id', '=',$id],
            ])
            ->first();
        if (session()->has('b_to_date')) {

            session()->put('b_to_date',$bookingIn->to_date);
            session()->put('b_from_date',$bookingIn->from_date);
        }
        else {

            session([
                'b_to_date' => $bookingIn->to_date,
                'b_from_date' => $bookingIn->from_date
            ]);
        }

        $bookingInfo=BookingInfo::
        where([
                ['invoice_id', '=',$bookingIn->invoice_id],
            ])
            ->get();
        $bookingPayment=BookingPaymentInfo::
        where([
                ['invoice_id', '=',$bookingIn->invoice_id],
            ])
            ->get();

        $orderInfo=OrderInfo::
        where([
                ['invoice_id', '=',$bookingIn->invoice_id],
            ])
            ->get();
        $orderPayInf=OrderPayment::
        where([
                ['invoice_id', '=',$bookingIn->invoice_id],
            ])
            ->get();

        $airBookInf=AirPortBookingInfo::
        where([
                ['invoice_id', '=',$bookingIn->invoice_id],
            ])
            ->get();

        $airBookPay=AirBookingPayment::
        where([
                ['invoice_id', '=',$bookingIn->invoice_id],
            ])
            ->get();

        $checkOutPay=CheckOutPayment::
        where([
                ['invoice_id', '=',$bookingIn->invoice_id],
            ])
            ->get();

        $payHis=PaymentHistory::
        where([
                ['invoice_id', '=',$bookingIn->invoice_id],
            ])
            ->get();



        if(count($bookingInfo)==1){
            BookingInfo::
            where([
                    ['booking_id', '=',$id],
                ])
                ->delete();
            if(count($bookingPayment)!=0) {
                BookingPaymentInfo::
                where([
                        ['invoice_id', '=', $bookingIn->invoice_id],
                    ])
                    ->delete();
            }
            if(count($orderInfo)!=0) {
                OrderInfo::
                where([
                        ['invoice_id', '=', $bookingIn->invoice_id],
                    ])
                    ->delete();
            }
            if(count($orderPayInf)!=0) {
                OrderPayment::
                where([
                        ['invoice_id', '=', $bookingIn->invoice_id],
                    ])
                    ->delete();
            }
            if(count($airBookInf)!=0) {
                AirPortBookingInfo::
                where([
                        ['invoice_id', '=', $bookingIn->invoice_id],
                    ])
                    ->delete();
            }
            if(count($airBookPay)!=0) {
                AirBookingPayment::
                where([
                        ['invoice_id', '=', $bookingIn->invoice_id],
                    ])
                    ->delete();
            }
            if(count($checkOutPay)!=0) {
                CheckOutPayment::
                where([
                        ['invoice_id', '=', $bookingIn->invoice_id],
                    ])
                    ->delete();
            }
            if(count($payHis)!=0) {
                PaymentHistory::
                where([
                        ['invoice_id', '=', $bookingIn->invoice_id],
                    ])
                    ->delete();
            }
        }
        else{


            $bookPAmount=BookingPaymentInfo::
            where([
                    ['booking_id', '=',$id],
                ])
                ->sum('total_amount');
         //   dd($bookPAmount);
            $MealsPAmount=OrderPayment::
            where([
                    ['booking_id', '=',$id],
                ])
                ->sum('amount');
            $airPAmount=AirBookingPayment::
            where([
                    ['booking_id', '=',$id],
                ])
                ->sum('amount');

            $prAmount=CheckOutPayment::
            where([
                    ['invoice_id', '=',$bookingIn->invoice_id],
                ])
                ->first();

            $totalAmount=$bookPAmount+$MealsPAmount+$airPAmount;
            $balAmount=$prAmount->total_amount-$totalAmount;
            date_default_timezone_set('Asia/Colombo');
            $date_time=date("Y-m-d H:i:s");
            CheckOutPayment::
            where([
                    ['invoice_id', '=',$bookingIn->invoice_id],
                ])
                ->update(
                    [
                        'total_amount'=>$balAmount,
                        'update_date'=>$date_time
                    ]
                );

            BookingInfo::
            where([
                    ['booking_id', '=',$id],
                ])
                ->delete();

            BookingPaymentInfo::
            where([
                    ['booking_id', '=',$id],
                ])
                ->delete();
            OrderPayment::
            where([
                    ['booking_id', '=',$id],
                ])
                ->delete();

            AirBookingPayment::
            where([
                    ['booking_id', '=',$id],
                ])
                ->delete();

            AirPortBookingInfo::
            where([
                    ['booking_id', '=',$id],
                ])
                ->delete();

            BookingInfo::
            where([
                ['booking_id', '=',$id],
            ])
                ->delete();

            OrderInfo::where([
                ['booking_id', '=',$id],
            ])
                ->delete();


        }



        return redirect('manager/man_remove_booking_success');


    }

    public function manRemoveBookingSuccess()
    {
        $to=session('b_from_date');
        $from=session('b_to_date');

        $bookingInfos=BookingInfo::
        whereDate('to_date','>=',$to)
            ->whereDate('from_date','<=',$from)
            ->orderBy('update_date', 'des')
            ->get();

        return view('manager.bookingList', compact('bookingInfos'))->with(
            [
                'msg' => 2,
                'cmt' => session('s_inv_id')
            ]
        );
    }




    public function getCustomerId($id)
    {
        $bookingInfo=BookingInfo::
        where([
                ['is_remove', '=',0],
                ['invoice_id', '=',$id]
            ])
            ->first();
        return $bookingInfo->customer_id;
    }

    public function manBookingDetails($id){
        //dd($id);
        $bookingInfo=BookingInfo::
        where([
                ['is_remove', '=',0],
                ['booking_id', '=',$id]
            ])
            ->first();

        if (session()->has('b_to_date')) {
            session()->put('b_to_date', $bookingInfo->to_date);
            session()->put('b_from_date',$bookingInfo->from_date);
        }
        else {
            session([
                'b_to_date' => $bookingInfo->to_date,
                'b_from_date' => $bookingInfo->from_date
            ]);
        }
        $bookingInfos=BookingInfo::
        whereDate('to_date','>=',session('b_to_date'))
            ->whereDate('from_date','<=',session('b_from_date'))
            ->get();


        return view('manager.bookingList', compact('bookingInfos'))->with(
            [
                'msg' => 0,
                'cmt' => 'init'
            ]
        );
    }

    public function manOrderDetails($id){
      //  dd($id);
        $orderInfos=OrderInfo::
        where([
                ['is_remove', '=',0],
                ['order_id', '=',$id]
            ])
            ->get();


        return view('manager.orderList',compact('orderInfos'))->with(
            [
                'msg' =>0,
                'cmt' =>'init'
            ]
        );
    }

    public function manAirportBookingDetails($id){
        $aBookingInfos=AirPortBookingInfo::
        where([
                ['is_remove', '=',0],
                ['a_booking_id', '=',$id]

            ])
            ->get();
        //dd($aBookingInfos);
        return view('manager.airBookingList',compact('aBookingInfos'))->with(
            [
                'msg' =>0,
                'cmt' =>'init'
            ]
        );
    }

    public function manAddPayment(Request $request){
        $invoiceID=$request->input('invoice_id');
        $outStandingAmount=$request->input('out_stand_amount');
        $bookingType=$request->input('booking_type');
        $cardType=$request->input('card_type');
        $cardNumber=$request->input('card_number');
        $paidAmount=$request->input('paid_amount');
        $balanceAmount=$outStandingAmount-$paidAmount;
        $bAmount=$request->input('bal_amount');
        date_default_timezone_set('Asia/Colombo');
        $date_time=date("Y-m-d H:i:s");

        $checkOutInf=CheckOutPayment::
        where([
                ['invoice_id', '=',$invoiceID],
            ])
            ->first();
        $actualAddAmount=$paidAmount-$bAmount;
        $balanceAmount=$outStandingAmount-$actualAddAmount;

        $updateAmount=$checkOutInf->paid_amount+$actualAddAmount;

        $status=0;
        $strVal=$checkOutInf->total_amount-$updateAmount;

        if($strVal==0)
            $status=1;
        else
            $status=0;

        CheckOutPayment::
        where([
                ['invoice_id', '=',$invoiceID],
            ])

        ->update(
            [
                'paid_amount'=>$updateAmount,
                'status'=>$status,
                'bill_lock'=>0,
                'update_date'=>$date_time
            ]
        );

        $historyID = "PH" . uniqid();

        PaymentHistory::insert(
            [
                'history_id'=>$historyID,
                'invoice_id'=>$invoiceID,
                'payment_type'=>$bookingType,
                'out_amount'=>$outStandingAmount,
                'paid_amount'=>$actualAddAmount,
                'balance_amount'=>$balanceAmount,
                'card_type'=>$cardType,
                'card_number'=>$cardNumber,
                'is_remove'=>0,
                'add_date'=>$date_time,
                'update_date'=>$date_time
            ]
        );

        if (session()->has('pay_invoice')) {
            session()->put('pay_invoice', $invoiceID);
        }
        else {
            session([
                'pay_invoice' => $invoiceID,
            ]);
        }


        if($strVal==0)
            return redirect('manager/man_add_payment_success1');
        else
            return redirect('manager/man_add_payment_success');


    }

    public function manAddPaymentSuccess()
    {
        $checkOutInfos=CheckOutPayment::
        where([
                ['is_remove', '=',0],
                ['invoice_id','=',session('pay_invoice')]
            ])
            ->orderBy('update_date', 'des')
            ->get();

        return view('manager.checkOutPayment', compact('checkOutInfos'))->with(
            [
                'msg' => 1,
                'cmt' => 'init'
            ]
        );
    }

    public function manAddPaymentSuccess1()
    {
        $checkOutInfos=CheckOutPayment::
        where([
                ['is_remove', '=',0],
                ['invoice_id','=',session('pay_invoice')]
            ])
            ->orderBy('update_date', 'des')
            ->get();

        return view('manager.paidPayment', compact('checkOutInfos'))->with(
            [
                'msg' => 1,
                'cmt' => 'init'
            ]
        );
    }


    public function manStopProcess($id){
        $bookingInfo=BookingInfo::
        where([
                ['booking_id', '=',$id],
            ])
            ->first();
        if (session()->has('b_to_date')) {

            session()->put('b_to_date',$bookingInfo->to_date);
            session()->put('b_from_date',$bookingInfo->from_date);
        }
        else {

            session([
                'b_to_date' => $bookingInfo->to_date,
                'b_from_date' => $bookingInfo->from_date
            ]);
        }

        BookingInfo::
        where([
                ['booking_id', '=',$id],
            ])
            ->delete();

        return redirect('manager/man_stop_booking_process');


    }

    public function manBookingStopProcess()
    {
        $to=session('b_from_date');
        $from=session('b_to_date');

        $bookingInfos=BookingInfo::
        whereDate('to_date','>=',$to)
            ->whereDate('from_date','<=',$from)
            ->orderBy('update_date', 'des')
            ->get();

        return view('manager.bookingList', compact('bookingInfos'))->with(
            [
                'msg' => 3,
                'cmt' => session('s_inv_id')
            ]
        );
    }


    public function manIndexAddCustomer(){
        return view('manager.addCustomer')->with(
            [
                'msg' => 0,
                'cmt' => 'initial'
            ]
        );
    }

    public function manAddCustomer(Request $request)
    {
        $cusFirstName = $request->input('cus_first_name');
        $cusLastName = $request->input('cus_last_name');
        $email = $request->input('cus_mail');
        $phone = $request->input('cus_phone');
        $nicPassport = $request->input('cus_nic_pass');
        $address = $request->input('cus_address');

        date_default_timezone_set('Asia/Colombo');
        $date_time = date("Y-m-d H:i:s");
        $userId = "CUS_" . uniqid();
        $name=$cusFirstName." ".$cusLastName;
        if($email=="") {
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
            return redirect('manager/man_add_cus_success');

        }
        else {
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
                return redirect('manager/man_add_cus_success');
            } else {
                if (session()->has('cmt'))
                    session()->put('cmt', $name);
                else
                    session(['cmt' => $name]);
                return redirect('manager/man_add_cus_failure');
            }
        }
    }

    public function manAddCustomerSuccess(){
        return view('manager.addCustomer')->with(
            [
                'msg' => 1,
                'cmt' => session('cmt')
            ]
        );
    }

    public function manAddCustomerFailure(){
        return view('manager.addCustomer')->with(
            [
                'msg' => 2,
                'cmt' => session('cmt')
            ]
        );
    }

    public function manIndexCusList(){
        $cusInfos=CustomerInfo::
        where([
                ['is_remove', '=',0]
            ])
            ->orderBy('add_date', 'des')
            ->get();
        return view('manager.customerList', compact('cusInfos'))->with(
            [
                'msg' => 0,
                'cmt' => 'initial'
            ]
        );
    }


    public function manIndexUpdateCustomer($id){


        if (session()->has('cus_id'))
            session()->put('cus_id', $id);
        else
            session(['cus_id' => $id]);

        $cusInfo=CustomerInfo::
        where([
                ['is_remove', '=',0],
                ['cus_id','=',$id]
            ])
            ->first();




        return view('manager.editCustomer', compact('cusInfo'))->with(
            [
                'msg' => 0,
                'cmt' => 'initial'
            ]
        );
    }

    public function manUpdateCustomer(Request $request)
    {
        $cusFirstName = $request->input('cus_first_name');
        $cusLastName = $request->input('cus_last_name');
        $email = $request->input('cus_mail');
        $phone = $request->input('cus_phone');
        $nicPassport = $request->input('cus_nic_pass');
        $address = $request->input('cus_address');
        $cusId=$request->input('cus_id');

        date_default_timezone_set('Asia/Colombo');
        $date_time = date("Y-m-d H:i:s");
        $name=$cusFirstName." ".$cusLastName;
        if($email=="") {
            CustomerInfo::
            where('cus_id',$cusId)
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
            return redirect('manager/man_add_cus_success');

        }
        else {
            $cusCount = CustomerInfo::
            where([
                    ['cus_id', '<>', $cusId],
                    ['cus_email', '=', $email],

                ])
                ->get();
//            dd($cusId);

            if (count($cusCount) == 0) {

                CustomerInfo::
                where('cus_id',$cusId)
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
                return redirect('manager/man_update_cus_success');
            } else {
                if (session()->has('cmt'))
                    session()->put('cmt', $name);
                else
                    session(['cmt' => $name]);
                return redirect('manager/man_update_cus_failure');
            }
        }
    }

    public function manUpdateCustomerSuccess(){
        $cusInfos=CustomerInfo::
        where([
                ['is_remove', '=',0]
            ])
            ->orderBy('add_date', 'des')
            ->get();
        return view('manager.customerList', compact('cusInfos'))->with(
            [
                'msg' => 3,
                'cmt' => session('cmt')
            ]
        );
    }


    public function manUpdateCustomerFailure(){
        $cusInfo=CustomerInfo::
        where([
                ['is_remove', '=',0],
                ['cus_id','=',session('cus_id')]
            ])
            ->first();
        return view('manager.editCustomer',compact('cusInfo'))->with(
            [
                'msg' => 2,
                'cmt' => session('cmt')
            ]
        );
    }


    public function indexResRemoveCustomer($id){
        $cusInfo=CustomerInfo::
        where([
                ['cus_id', '=',$id],
            ])
            ->first();
        $name=$cusInfo->cus_first_name.' '.$cusInfo->cus_last_name;
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
            session()->put('cmt',$name);
        else
            session(['cmt' => $name]);
        return redirect('manager/man_remove_cus_success');
    }

    public function manRemoveCusSuccess()
    {
        $cusInfos=CustomerInfo::
        where([
                ['is_remove', '=',0],
            ])
            ->orderBy('add_date', 'des')
            ->get();
        return view('manager.customerList', compact('cusInfos'))->with(
            [
                'msg' => 1,
                'cmt' => session('cmt')
            ]
        );
    }

    public function manOrderDateSearchP(Request $request)
    {
        $fromDate = $request->input('from_date');
        if (session()->has('search_order_date_from'))
            session()->put('search_order_date_from', $fromDate);
        else
            session(['search_order_date_from' => $fromDate]);

        return redirect('manager/man_order_search_date');

        // dd($fromDate);
    }

    public function manOrderDataSearch()
    {
        //  $date_val=DATE(session('search_date_from'));
        $orderInfos=OrderInfo::
        whereDate('order_date', '=', session('search_order_date_from'))
            ->get();

        return view('manager.orderList', compact('orderInfos'))->with(
            [
                'msg' => 4,
                'cmt' => 'init'
            ]
        );
    }

    public function manRemoveMealsAppP(Request $request)
    {
        $orderId = $request->input('remove_order_id');
        $reason=$request->input('remove_reason');
        $typeDesc="Remove Meals Order";
        $orderInfos=OrderInfo::
        where([
                ['order_id', '=',$orderId],
            ])
            ->first();

        date_default_timezone_set('Asia/Colombo');
        $date_time = date("Y-m-d");
        $appID = "APR" . uniqid();

        ApprovalInfo::insert(
            [
                'app_id'=>$appID,
                'data_id'=>$orderId,
                'invoice_id'=>$orderInfos->invoice_id,
                'data_type'=>0,
                'type_desc'=>$typeDesc,
                'app_reason'=>$reason,
                'user_id'=>session('user_id'),
                'add_date'=>$date_time,

            ]
        );

        if (session()->has('cmt'))
            session()->put('cmt', $orderInfos->invoice_id);
        else
            session(['cmt' => $orderInfos->invoice_id]);

        return redirect('manager/man_order_remove_app_submit');


    }

    public function manRemoveAppSubmit(){
        $orderInfos=OrderInfo::
        where([
                ['invoice_id', '=',session('cmt')],
            ])
            ->get();
        return view('manager.orderList',compact('orderInfos'))->with(
            [
                'msg' =>6,
                'cmt' =>session('cmt')
            ]
        );
    }

    public function manAirBookRemAppSubmit(){
        $aBookingInfos=AirPortBookingInfo::
        where([
                ['invoice_id', '=',session('cmt')],
            ])
            ->get();
        return view('manager.airBookingList',compact('aBookingInfos'))->with(
            [
                'msg' =>5,
                'cmt' =>session('cmt')
            ]
        );
    }

    public function manEditAppSubmit(){
        $orderInfos=OrderInfo::
        where([
                ['invoice_id', '=',session('cmt')],
            ])
            ->get();
        return view('manager.orderList',compact('orderInfos'))->with(
            [
                'msg' =>7,
                'cmt' =>session('cmt')
            ]
        );
    }

    public function manEditAirBookAppSubmit(){
        $aBookingInfos=AirPortBookingInfo::
        where([
                ['invoice_id', '=',session('cmt')],
            ])
            ->get();
        return view('manager.airBookingList',compact('aBookingInfos'))->with(
            [
                'msg' =>4,
                'cmt' =>session('cmt')
            ]
        );
    }


    public function manCancelBookAppSubmit(){
        $bookingInfos=BookingInfo::
        where([
                ['invoice_id', '=',session('cmt')],
            ])
            ->get();
        return view('manager.bookingList',compact('bookingInfos'))->with(
            [
                'msg' =>3,
                'cmt' =>session('cmt')
            ]
        );
    }

    public function manEditBookAppSubmit(){
        $bookingInfos=BookingInfo::
        where([
                ['invoice_id', '=',session('cmt')],
            ])
            ->get();
        return view('manager.bookingList',compact('bookingInfos'))->with(
            [
                'msg' =>4,
                'cmt' =>session('cmt')
            ]
        );
    }

    public function manEditAirBookAppP(Request $request)
    {
        $airBookId = $request->input('edit_air_app_id');
        $reason=$request->input('edit_app_reason');
        $typeDesc="Edit Airport Booking";
        $airBookingInfo=AirPortBookingInfo::
        where([
                ['a_booking_id', '=',$airBookId],
            ])
            ->first();

        date_default_timezone_set('Asia/Colombo');
        $date_time = date("Y-m-d");
        $appID = "APR" . uniqid();

        ApprovalInfo::insert(
            [
                'app_id'=>$appID,
                'invoice_id'=>$airBookingInfo->invoice_id,
                'data_id'=>$airBookId,
                'data_type'=>5,
                'type_desc'=>$typeDesc,
                'app_reason'=>$reason,
                'user_id'=>session('user_id'),
                'add_date'=>$date_time,

            ]
        );

        //  dd($orderId);

        if (session()->has('cmt'))
            session()->put('cmt', $airBookingInfo->invoice_id);
        else
            session(['cmt' => $airBookingInfo->invoice_id]);

        return redirect('manager/man_edit_air_book_app_submit');
    }

    public function manEditMealsAppP(Request $request)
    {
        $orderId = $request->input('edit_order_id');
        $reason=$request->input('edit_reason');
        $typeDesc="Edit Meals Order";
        $orderInfos=OrderInfo::
        where([
                ['order_id', '=',$orderId],
            ])
            ->first();

        date_default_timezone_set('Asia/Colombo');
        $date_time = date("Y-m-d");
        $appID = "APR" . uniqid();

        ApprovalInfo::insert(
            [
                'app_id'=>$appID,
                'invoice_id'=>$orderInfos->invoice_id,
                'data_id'=>$orderId,
                'data_type'=>1,
                'type_desc'=>$typeDesc,
                'app_reason'=>$reason,
                'user_id'=>session('user_id'),
                'add_date'=>$date_time,

            ]
        );

        //  dd($orderId);

        if (session()->has('cmt'))
            session()->put('cmt', $orderInfos->invoice_id);
        else
            session(['cmt' => $orderInfos->invoice_id]);

        return redirect('manager/man_order_edit_app_submit');


    }

    public function manRemoveAirBookAppP(Request $request)
    {
        $airBookingId = $request->input('remove_air_app_id');
        $reason=$request->input('remove_app_reason');
        $typeDesc="Remove Airport Booking";
        $airBookingInfos=AirPortBookingInfo::
        where([
                ['a_booking_id', '=',$airBookingId],
            ])
            ->first();

        date_default_timezone_set('Asia/Colombo');
        $date_time = date("Y-m-d");
        $appID = "APR" . uniqid();

        ApprovalInfo::insert(
            [
                'app_id'=>$appID,
                'invoice_id'=>$airBookingInfos->invoice_id,
                'data_id'=>$airBookingId,
                'data_type'=>6,
                'type_desc'=>$typeDesc,
                'app_reason'=>$reason,
                'user_id'=>session('user_id'),
                'add_date'=>$date_time,

            ]
        );

      //  dd($orderId);

        if (session()->has('cmt'))
            session()->put('cmt', $airBookingInfos->invoice_id);
        else
            session(['cmt' => $airBookingInfos->invoice_id]);

        return redirect('manager/man_air_booking_rem_app_submit');


    }

    public function manCancelBookingAppP(Request $request)
    {
        $bookingId = $request->input('cancel_booking_id');
        $reason=$request->input('cancel_reason');
        $typeDesc="Cancel Room Booking";
        $bookingInfos=BookingInfo::
        where([
                ['booking_id', '=',$bookingId],
            ])
            ->first();

        date_default_timezone_set('Asia/Colombo');
        $date_time = date("Y-m-d");
        $appID = "APR" . uniqid();

        ApprovalInfo::insert(
            [
                'app_id'=>$appID,
                'invoice_id'=>$bookingInfos->invoice_id,
                'data_id'=>$bookingId,
                'data_type'=>3,
                'type_desc'=>$typeDesc,
                'app_reason'=>$reason,
                'user_id'=>session('user_id'),
                'add_date'=>$date_time,

            ]
        );

        //  dd($orderId);

        if (session()->has('cmt'))
            session()->put('cmt', $bookingInfos->invoice_id);
        else
            session(['cmt' => $bookingInfos->invoice_id]);

        return redirect('manager/man_cancel_book_app_submit');


    }


    public function manEditBookingAppP(Request $request)
    {
        $bookingId = $request->input('edit_booking_id');
        $reason=$request->input('edit_reason');
        $typeDesc="Room Booking Modification";

        $bookingInfos=BookingInfo::
        where([
                ['booking_id', '=',$bookingId],
            ])
            ->first();

        date_default_timezone_set('Asia/Colombo');
        $date_time = date("Y-m-d");
        $appID = "APR" . uniqid();

        ApprovalInfo::insert(
            [
                'app_id'=>$appID,
                'invoice_id'=>$bookingInfos->invoice_id,
                'data_id'=>$bookingId,
                'data_type'=>4,
                'type_desc'=>$typeDesc,
                'app_reason'=>$reason,
                'user_id'=>session('user_id'),
                'add_date'=>$date_time,

            ]
        );

        //  dd($orderId);

        if (session()->has('cmt'))
            session()->put('cmt', $bookingInfos->invoice_id);
        else
            session(['cmt' => $bookingInfos->invoice_id]);

        return redirect('manager/man_edit_book_app_submit');


    }

    public function manBillPrintAppSubmit(){
        $checkOutInfos=CheckOutPayment::
        where([
                ['invoice_id', '=',session('cmt')],
            ])
            ->get();
        return view('manager.paidPayment',compact('checkOutInfos'))->with(
            [
                'msg' =>2,
                'cmt' =>session('cmt')
            ]
        );
    }

    public function manPayHistoryAppSubmit(){
        $payHistoryInfos=PaymentHistory::
        where([
                ['invoice_id', '=',session('cmt')],
            ])
            ->get();
        return view('manager.paymentHistory',compact('payHistoryInfos'))->with(
            [
                'msg' =>1,
                'cmt' =>session('cmt')
            ]
        );
    }

    public function manBillPrintsAppP(Request $request)
    {
        $invId = $request->input('inv_id');
        $reason=$request->input('print_reason');
        $typeDesc="Print Bill";
        $orderInfos=CheckOutPayment::
        where([
                ['invoice_id', '=',$invId],
            ])
            ->first();

        date_default_timezone_set('Asia/Colombo');
        $date_time = date("Y-m-d");
        $appID = "APR" . uniqid();

        ApprovalInfo::insert(
            [
                'app_id'=>$appID,
                'invoice_id'=>$invId,
                'data_id'=>$invId,
                'data_type'=>2,
                'type_desc'=>$typeDesc,
                'app_reason'=>$reason,
                'user_id'=>session('user_id'),
                'add_date'=>$date_time,

            ]
        );

        //  dd($orderId);

        if (session()->has('cmt'))
            session()->put('cmt', $invId);
        else
            session(['cmt' => $invId]);

        return redirect('manager/man_bill_print_app_submit');


    }

    public function manPayRemoveAppP(Request $request)
    {
        $invId = $request->input('rem_inv_id');
        $payId = $request->input('rem_pay_id');
        $reason=$request->input('rem_pay_id');
        $typeDesc="Print Bill";
        $payInfos=CheckOutPayment::
        where([
                ['invoice_id', '=',$invId],
            ])
            ->first();

        date_default_timezone_set('Asia/Colombo');
        $date_time = date("Y-m-d");
        $appID = "APR" . uniqid();

        ApprovalInfo::insert(
            [
                'app_id'=>$appID,
                'invoice_id'=>$invId,
                'data_id'=>$payId,
                'data_type'=>7,
                'type_desc'=>$typeDesc,
                'app_reason'=>$reason,
                'user_id'=>session('user_id'),
                'add_date'=>$date_time,

            ]
        );

        //  dd($orderId);

        if (session()->has('cmt'))
            session()->put('cmt', $invId);
        else
            session(['cmt' => $invId]);

        return redirect('manager/man_pay_history_app_submit');


    }

    public function manRemovePayHistory($id)
    {
        //New3
        $payHistory=PaymentHistory::
        where([
                ['history_id', '=',$id],
            ])
            ->first();

        $chechInfo=CheckOutPayment::
        where([
                ['invoice_id', '=',$payHistory->invoice_id],
            ])
            ->first();

        $newPayAmount=$chechInfo->paid_amount-$payHistory->paid_amount;

        $statVal=$chechInfo->total_amount-$newPayAmount;
        $status=0;
        if($statVal==0)
            $status=1;
        else
            $status=0;
        date_default_timezone_set('Asia/Colombo');
        $date_time = date("Y-m-d H:i:s");

        CheckOutPayment::
        where([
                ['invoice_id', '=',$payHistory->invoice_id],
            ])
            ->update(
                [
                    'paid_amount'=>$newPayAmount,
                    'status'=>$status,
                    'update_date' => $date_time

                ]
            );
        PaymentHistory::
        where([
                ['history_id', '=',$id],
            ])
            ->delete();

        if (session()->has('cmt'))
            session()->put('cmt', $payHistory->invoice_id);
        else
            session(['cmt' => $payHistory->invoice_id]);

        return redirect('manager/man_pay_history_success');




    }



    public function manRemovePaySuccess()
    {
        //New4
        $payHistoryInfos=PaymentHistory::
        where([
                ['invoice_id', '=',session('cmt')],

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

        return view('manager.paymentHistory', compact('payHistoryInfos'))->with(
            [
                'msg' => 2,
                'cmt' => session('cmt')
            ]
        );

    }

    public function manOrderDurationSearchP(Request $request)
    {
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        if (session()->has('search_order_date_from')) {
            session()->put('search_order_date_from', $fromDate);
            session()->put('search_order_date_to', $toDate);

        }
        else {
            session(['search_order_date_from' => $fromDate]);
            session(['search_order_date_to' => $toDate]);

        }

        return redirect('manager/man_order_search_duration');
    }

    public function manOrderDurationSearch()
    {
        $orderInfos=OrderInfo::
        whereDate('order_date','>=',session('search_order_date_from'))
            ->whereDate('order_date','<=',session('search_order_date_to'))
            ->get();

        return view('manager.orderList', compact('orderInfos'))->with(
            [
                'msg' => 5,
                'cmt' => 'init'
            ]
        );
    }


    public function manCheckOutDateSearchP(Request $request)
    {
        $fromDate = $request->input('from_date');
        if (session()->has('search_date_from'))
            session()->put('search_date_from', $fromDate);
        else
            session(['search_date_from' => $fromDate]);

        return redirect('manager/man_check_out_search_date');

       // dd($fromDate);
    }

    public function manPaidSearchP(Request $request)
    {
        $fromDate = $request->input('from_date');
        if (session()->has('search_date_paid_from'))
            session()->put('search_date_paid_from', $fromDate);
        else
            session(['search_date_paid_from' => $fromDate]);

        return redirect('manager/man_paid_search_date');

        // dd($fromDate);
    }

    public function manCheckOutDataSearch()
    {
      //  $date_val=DATE(session('search_date_from'));
        $checkOutInfos=CheckOutPayment::
            whereDate('add_date', '=', session('search_date_from'))
            ->get();

        return view('manager.checkOutPayment', compact('checkOutInfos'))->with(
            [
                'msg' => 4,
                'cmt' => 'init'
            ]
        );
    }

    public function manPaidDataSearch()
    {
        //  $date_val=DATE(session('search_date_from'));
        $checkOutInfos=CheckOutPayment::
        whereDate('add_date', '=', session('search_date_paid_from'))
           ->where([
                ['status', '=',1],
            ])
            ->get();

        return view('manager.paidPayment', compact('checkOutInfos'))->with(
            [
                'msg' => 4,
                'cmt' => 'init'
            ]
        );
    }

    public function manCheckOutDurationSearchP(Request $request)
    {
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        if (session()->has('search_date_from')) {
            session()->put('search_date_from', $fromDate);
            session()->put('search_date_to', $toDate);

        }
        else {
            session(['search_date_from' => $fromDate]);
            session(['search_date_to' => $toDate]);

        }

        return redirect('manager/man_check_out_search_duration');
    }

    public function manPaidDurationSearchP(Request $request)
    {
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        if (session()->has('search_date_paid_from')) {
            session()->put('search_date_paid_from', $fromDate);
            session()->put('search_date_paid_to', $toDate);

        }
        else {
            session(['search_date_paid_from' => $fromDate]);
            session(['search_date_paid_to' => $toDate]);

        }

        return redirect('manager/man_paid_search_duration');
    }

    public function manFinalCheckDurationSearchP(Request $request)
    {
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        if (session()->has('search_date_final_check_from')) {
            session()->put('search_date_final_check_from', $fromDate);
            session()->put('search_date_final_check_to', $toDate);

        }
        else {
            session(['search_date_final_check_from' => $fromDate]);
            session(['search_date_final_check_to' => $toDate]);

        }

        return redirect('manager/man_final_check_search_duration');
    }

    public function manReportCheckDurationSearchP(Request $request)
    {
        //rep1
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        $bType=$request->input('radio-inline');
        if (session()->has('search_date_report_check_from')) {
            session()->put('search_date_report_check_from', $fromDate);
            session()->put('search_date_report_check_to', $toDate);
            session()->put('search_booking_type', $bType);

        }
        else {
            session(['search_date_report_check_from' => $fromDate]);
            session(['search_date_report_check_to' => $toDate]);
            session(['search_booking_type' => $bType]);


        }

       // dd($bType);

        return redirect('manager/man_report_check_search_duration');
    }

    public function manReportCheckRoomsDurationSearchP(Request $request)
    {
        //rep1
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        $bType=$request->input('radio-inline');
        if (session()->has('search_date_report_check_from')) {
            session()->put('search_date_report_check_from', $fromDate);
            session()->put('search_date_report_check_to', $toDate);
            session()->put('search_booking_type', $bType);

        }
        else {
            session(['search_date_report_check_from' => $fromDate]);
            session(['search_date_report_check_to' => $toDate]);
            session(['search_booking_type' => $bType]);


        }



        return redirect('manager/man_report_check_rooms_search_duration');
    }
    public function manReportCurrentBookingDurationSearchP(Request $request)
    {
        //rep2
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        $bType=$request->input('radio-inline');

        if (session()->has('search_date_report_check_from')) {
            session()->put('search_date_report_check_from', $fromDate);
            session()->put('search_date_report_check_to', $toDate);
            session()->put('search_booking_type', $bType);
        }
        else {
            session(['search_date_report_check_from' => $fromDate]);
            session(['search_date_report_check_to' => $toDate]);
            session(['search_booking_type' => $bType]);
        }

        return redirect('manager/man_report_current_booking_search_duration');
    }


    public function manBillCheckOutDuration()
    {
        if(session('search_booking_type')==4) {
            $checkOutInfos = CheckOutPayment::
            whereDate('update_date', '>=', session('search_date_report_check_from'))
                ->whereDate('update_date', '<=', session('search_date_report_check_to'))
                ->where([
                    ['status', '=', 1],
                    ['check_out_status', '=', 1]
                ])
                ->get();
        }
        else{
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

        return view('manager.printCheckOutDuration', compact('checkOutInfos'))->with(
            [
                'msg' => 1,
                'cmt' => 'init'
            ]
        );
    }

    public function manCheckBookingList(){
        date_default_timezone_set('Asia/Colombo');
        $todayDate=date("Y-m-d");
        $tomorrowDate=date_create($todayDate);
        date_add($tomorrowDate,date_interval_create_from_date_string("1 days"));
        $tomorrowDate=date_format($tomorrowDate,"Y-m-d");
        if (session()->has('b_to_date')) {
            session()->put('b_to_date', session('b_to_date'));
            session()->put('b_from_date',session('b_from_date'));
        }
        else {
            session([
                'b_to_date' => $tomorrowDate,
                'b_from_date' => $todayDate
            ]);
        }


        $bookingInfos=BookingInfo::
        where([
                ['check_out_status','=',1],
            ])
            ->get();


        return view('manager.checkOutBookingList', compact('bookingInfos'))->with(
            [
                'msg' => 0,
                'cmt' => 'init'
            ]
        );
    }

    public function manIndexCheckOrderList(){
        $orderInfos=OrderInfo::
        where([
                ['is_remove', '=',0],
                ['check_out_status', '=',1]
            ])
            ->orderBy('add_date', 'desc')
            ->get();
        return view('manager.checkOutOrderList',compact('orderInfos'))->with(
            [
                'msg' =>8,
                'cmt' =>'init'
            ]
        );
    }

    public function manIndexAirportCheckBookingList(){
        $aBookingInfos=AirPortBookingInfo::
        where([
                ['is_remove', '=',0],
                ['check_out_status', '=',1],
            ])
            ->orderBy('add_date', 'desc')
            ->get();
        return view('manager.airCheckBookingList',compact('aBookingInfos'))->with(
            [
                'msg' =>8,
                'cmt' =>'init'
            ]
        );
    }

    public function manAirCheckDurationSearchP(Request $request)
    {
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        if (session()->has('search_order_date_from')) {
            session()->put('search_order_date_from', $fromDate);
            session()->put('search_order_date_to', $toDate);

        }
        else {
            session(['search_order_date_from' => $fromDate]);
            session(['search_order_date_to' => $toDate]);

        }

        return redirect('manager/man_air_check_search_duration');
    }

    public function manAirCheckDurationSearch()
    {
        //Arun
        $aBookingInfos=AirPortBookingInfo::
        whereDate('a_booking_date','>=',session('search_order_date_from'))
            ->whereDate('a_booking_date','<=',session('search_order_date_to'))
            ->where([
                ['check_out_status','=',1],

            ])
            ->get();

        return view('manager.airCheckBookingList', compact('aBookingInfos'))->with(
            [
                'msg' => 9,
                'cmt' => 'init'
            ]
        );
    }

    public function manOrderCheckDurationSearchP(Request $request)
    {
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        if (session()->has('search_order_date_from')) {
            session()->put('search_order_date_from', $fromDate);
            session()->put('search_order_date_to', $toDate);

        }
        else {
            session(['search_order_date_from' => $fromDate]);
            session(['search_order_date_to' => $toDate]);

        }

        return redirect('manager/man_order_check_search_duration');
    }

    public function manOrderCheckDurationSearch()
    {
        $orderInfos=OrderInfo::
        whereDate('order_date','>=',session('search_order_date_from'))
            ->whereDate('order_date','<=',session('search_order_date_to'))
            ->where([
                ['check_out_status','=',1],

            ])
            ->get();

        return view('manager.checkOutOrderList', compact('orderInfos'))->with(
            [
                'msg' => 9,
                'cmt' => 'init'
            ]
        );
    }

    public function manCheckBookingSearchP(Request $request){
        $toDate=$request->input('to_date');
        $fromDate=$request->input('from_date');
        if (session()->has('b_to_date')) {

            session()->put('b_to_date', $toDate);
            session()->put('b_from_date', $fromDate);
        }
        else {

            session([
                'b_to_date' => $toDate,
                'b_from_date' => $fromDate
            ]);
        }
        return redirect('manager/man_check_booking_search');
    }

    public function manCheckBookingSearch(){

        $to=session('b_from_date');
        $from=session('b_to_date');
        $bookingInfos=BookingInfo::
        whereDate('to_date','>=',$to)
            ->whereDate('from_date','<=',$from)
            ->get();

        return view('manager.checkOutBookingList', compact('bookingInfos'))->with(
            [
                'msg' => 1,
                'cmt' => 'init'
            ]
        );

    }

    public function addReceptionist()
    {
        return view('manager.createReceptionist')->with(
            [
                'msg' => 0,
                'cmt' => 'initial'
            ]
        );
    }

    public function indexViewReceptionist()
    {
        $userInfos=UserInfo::
        where([
                ['is_remove', '=',0],
                ['user_role','=',0]
            ])
            ->orderBy('add_date', 'des')
            ->get();
        return view('manager.receptionistList', compact('userInfos'))->with(
            [
                'msg' => 0,
                'cmt' => 'initial'
            ]
        );
    }


    public function createReceptionist(Request $request)
    {
        $userName=$request->input('user_name');
        $loginName=$request->input('login_name');
        $email=$request->input('user_mail');
        $phone=$request->input('user_phone');
        $password=$request->input('user_password');

        date_default_timezone_set('Asia/Colombo');
        $date_time=date("Y-m-d H:i:s");
        $userId="R_USER_".uniqid();

        $userCount=UserInfo::
        where([
                ['login_id', '=',$loginName],
            ])
            ->get();
        if(count($userCount)==0) {

            UserInfo::insert(
                [
                    'user_id' => $userId,
                    'user_name' => $userName,
                    'login_id' => $loginName,
                    'telephone_no' => $phone,
                    'user_password' => Crypt::encrypt($password),
                    'user_role' => 0,
                    'user_email' =>$email,
                    'is_remove' => 0,
                    'add_date' => $date_time

                ]
            );
            if (session()->has('cmt'))
                session()->put('cmt', $userName);
            else
                session(['cmt' => $userName]);
            return redirect('manager/create_res_success');
        }
        else{
            if (session()->has('cmt'))
                session()->put('cmt', $loginName);
            else
                session(['cmt' => $loginName]);
            return redirect('manager/create_res_failure');
        }

    }

    public function createReceptionistSuccess()
    {
        return view('manager.createReceptionist')->with(
            [
                'msg' => 1,
                'cmt' => session('cmt')
            ]
        );
    }

    public function createReceptionistFailure(){
        return view('manager.createReceptionist')->with(
            [
                'msg' => 2,
                'cmt' => session('cmt')
            ]
        );
    }

    public function indexUpdateReceptionist($id){
        if (session()->has('user_id'))
            session()->put('user_id', $id);
        else
            session(['user_id' => $id]);

        $userInfo=UserInfo::
        where([
                ['is_remove', '=',0],
                ['user_role','=',0],
                ['user_id','=',$id]
            ])
            ->first();
        return view('manager.editReceptionist', compact('userInfo'))->with(
            [
                'msg' => 0,
                'cmt' => 'initial'
            ]
        );

    }

    public function updateReceptionist(Request $request){
        $userName=$request->input('user_name');
        $loginName=$request->input('login_name');
        $email=$request->input('user_mail');
        $phone=$request->input('user_phone');
        $password=$request->input('user_password');


        date_default_timezone_set('Asia/Colombo');
        $date_time=date("Y-m-d H:i:s");
        $userId=$request->input('user_id');

        $userCount=UserInfo::
        where([
                ['login_id', '=',$loginName],
                ['user_id', '<>',$userId]

            ])
            ->get();
        if(count($userCount)==0) {

            UserInfo::
            where('user_id',$userId)
                ->update(
                    [
                        'user_name' => $userName,
                        'login_id' => $loginName,
                        'telephone_no' => $phone,
                        'user_password' => Crypt::encrypt($password),
                        'user_email' =>$email,
                        'is_remove' => 0,
                        'add_date' => $date_time

                    ]
                );
            if (session()->has('cmt'))
                session()->put('cmt', $userName);
            else
                session(['cmt' => $userName]);
            return redirect('manager/update_receptionist_success');
        }
        else{
            if (session()->has('cmt'))
                session()->put('cmt', $loginName);
            else
                session(['cmt' => $loginName]);
            return redirect('manager/update_receptionist_failure');
        }

    }

    public function updateReceptionistSuccess(){
        $userInfos=UserInfo::
        where([
                ['is_remove', '=',0],
                ['user_role','=',0]
            ])
            ->orderBy('add_date', 'des')
            ->get();
        return view('manager.receptionistList', compact('userInfos'))->with(
            [
                'msg' => 3,
                'cmt' => session('cmt')
            ]
        );
    }

    public function updateReceptionistFailure()
    {
        $userInfo=UserInfo::
        where([
                ['is_remove', '=',0],
                ['user_role','=',0],
                ['user_id','=',session('user_id')]
            ])
            ->first();
        return view('manager.editReceptionist',compact('userInfo'))->with(
            [
                'msg' => 2,
                'cmt' => session('cmt')
            ]
        );
    }






    public function manCheckOutDurationSearch()
    {
        $checkOutInfos=CheckOutPayment::
        whereDate('add_date','>=',session('search_date_from'))
            ->whereDate('add_date','<=',session('search_date_to'))
            ->get();

        return view('manager.checkOutPayment', compact('checkOutInfos'))->with(
            [
                'msg' => 5,
                'cmt' => 'init'
            ]
        );
    }

    public function manPaidDurationSearch()
    {
        $checkOutInfos=CheckOutPayment::
        whereDate('add_date','>=',session('search_date_paid_from'))
            ->whereDate('add_date','<=',session('search_date_paid_to'))
            ->where([
                ['status', '=',1],
            ])
            ->get();

        return view('manager.paidPayment', compact('checkOutInfos'))->with(
            [
                'msg' => 5,
                'cmt' => 'init'
            ]
        );
    }

    public function manFinalCheckDurationSearch()
    {
        $checkOutInfos=CheckOutPayment::
        whereDate('update_date','>=',session('search_date_final_check_from'))
            ->whereDate('update_date','<=',session('search_date_final_check_to'))
            ->where([
                ['status', '=',1],
                ['check_out_status','=',1]
            ])
            ->get();

        return view('manager.finalCheckOut', compact('checkOutInfos'))->with(
            [
                'msg' => 5,
                'cmt' => 'init'
            ]
        );
    }

    public function manReportCheckDurationSearch()
    {
        //rep11
      //  dd(session('search_booking_type'));
        if(session('search_booking_type')==4) {
            $checkOutInfos = CheckOutPayment::
            whereDate('update_date', '>=', session('search_date_report_check_from'))
                ->whereDate('update_date', '<=', session('search_date_report_check_to'))
                ->where([
                    ['status', '=', 1],
                    ['check_out_status', '=', 1]
                ])
                ->get();
        }
        else{
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

        return view('manager.reportCheckOuts', compact('checkOutInfos'))->with(
            [
                'msg' => 1,
                'cmt' => 'init'
            ]
        );
    }

    public function manReportCheckRoomsDurationSearch()
    {
        //rep31
       //   dd(session('search_date_report_check_from'));


        if(session('search_booking_type')==4) {
            $bookingInfos=BookingInfo::
            whereDate('to_date','>=',session('search_date_report_check_from'))
                ->whereDate('from_date','<=',session('search_date_report_check_to'))
                ->where([
                    ['check_out_status','=',1]
                ])
                ->get();


        }
        else{
            $bookingInfos=BookingInfo::
            whereDate('to_date','>=',session('search_date_report_check_from'))
                ->whereDate('from_date','<=',session('search_date_report_check_to'))
                ->where([
                    ['check_out_status', '=', 1],
                    ['booking_type', '=', session('search_booking_type')]

                ])
                ->get();


        }

        return view('manager.reportCheckOutBooking', compact('bookingInfos'))->with(
            [
                'msg' => 1,
                'cmt' => 'init'
            ]
        );
    }

    public function manReportCurrentBookingDurationSearch()
    {
        //rep21
        if(session('search_booking_type')==4) {
            $checkOutInfos = CheckOutPayment::
            whereDate('update_date', '>=', session('search_date_report_check_from'))
                ->whereDate('update_date', '<=', session('search_date_report_check_to'))
                ->where([
                    ['check_out_status', '=', 0]
                ])
                ->get();
        }
        else{
            $checkOutInfos = CheckOutPayment::
            whereDate('update_date', '>=', session('search_date_report_check_from'))
                ->whereDate('update_date', '<=', session('search_date_report_check_to'))
                ->where([
                    ['check_out_status', '=', 0],
                    ['booking_type', '=', session('search_booking_type')]
                ])
                ->get();
        }

        return view('manager.reportCurrentBookings', compact('checkOutInfos'))->with(
            [
                'msg' => 1,
                'cmt' => 'init'
            ]
        );
    }

    public function manEditBookingInfo($id){
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


        return view('manager.editBookingDetails', compact('bookingInfo','cusInfos'))->with(
            [
                'msg' => 0,
                'cmt' => 'init'
            ]
        );

    }

    public function manEditDurationAvaP(Request $request)
    {
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        $roomId=$request->input('ava_room_id');
        $bookId=$request->input('ava_book_id');
        $val=$this->checkAvailable($fromDate,$toDate,$roomId,$bookId);
        if($val==0) {
            if (session()->has('msg')&& session('msg')==5) {
                session()->put('msg',5);
                session()->put('edit_book_id', $bookId);
                session()->put('av_edit_from',$fromDate);
                session()->put('av_edit_to',$toDate);

            } else {
                session(['msg' =>5]);
                session(['edit_book_id' => $bookId]);
                session(['av_edit_from' => $fromDate]);
                session(['av_edit_to' => $toDate]);

            }
        }
        else{
            if (session()->has('msg')&& session('msg')==6) {
                session()->put('msg',6);
                session()->put('edit_book_id', $bookId);
                session()->put('av_edit_from',$fromDate);
                session()->put('av_edit_to',$toDate);

            } else {
                session(['msg' =>6]);
                session(['edit_book_id' => $bookId]);
                session(['av_edit_from' => $fromDate]);
                session(['av_edit_to' => $toDate]);

            }
        }
       // dd(session('av_edit_to'));
        return redirect('manager/man_edit_avail_search');
    }
    //Now
    public function manEditAvailableSearch()
    {
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


        return view('manager.editBookingDetails', compact('bookingInfo','cusInfos'))->with(
            [
                'msg' => session('msg'),
                'cmt' => 'init'
            ]
        );
    }

    public function manEditBooking(Request $request){
        $toDate=$request->input('hidden_to_date');
        $fromDate=$request->input('hidden_from_date');
        $cusId=$request->input('cus_id');
        $invId=$request->input('hidden_invoice_id');
        $bookingId=$request->input('hidden_book_id');



        $totalAmount=$request->input('total_amount');
        $numOfDays=$request->input('number_of_days');
        $perDayAmount=$request->input('amount_per_day');
        $numOfChildren=$request->input('no_of_children');
        $numOfAdults=$request->input('no_of_adults');
        $bookingType = $request->input('booking_type');
        $broker_name=$request->input('broker_name');
        $discountAmount=$request->input('discount_amount');


        //  dd($request);
        date_default_timezone_set('Asia/Colombo');
        $date_time = date("Y-m-d H:i:s");
        BookingInfo::
        where([
                ['booking_id', '=',$bookingId],
            ])
            ->update(
                [
                    'customer_id'=>$cusId,
                    'from_date'=>$fromDate,
                    'to_date'=>$toDate,
                    'status'=>2,
                    'is_remove' => 0,
                    'user_id'=>session('user_id'),
                    'no_of_children'=>$numOfChildren,
                    'no_of_adults'=>$numOfAdults,
                    'cancel_lock'=>0,
                    'edit_lock'=>0,
                    'booking_type' => $bookingType,
                    'broker_name'=>$broker_name,
                    'update_date' => $date_time

                ]
            );

        $preVal=BookingPaymentInfo::
        where([
                ['booking_id', '=',$bookingId],
            ])
            ->first();
        $preAmount=$preVal->total_amount;

        BookingPaymentInfo::
        where([
                ['booking_id', '=',$bookingId],
            ])
            ->update(
                [
                    'no_of_days'=>$numOfDays,
                    'total_amount'=>$totalAmount,
                    'is_remove'=>0,
                    'add_date'=>$date_time,
                    'update_date'=>$date_time


                ]
            );

        $preCheck=CheckOutPayment::
        where([
                ['invoice_id', '=',$invId],
            ])
            ->first();
        $redAmount=$preCheck->total_amount-$preAmount;
        $newAmount=$redAmount+$totalAmount;
        //   dd($fromDate,$toDate,$bookingId,$cusId,$invId,$totalAmount,$numOfDays,$newAmount);
        $statVal=($newAmount-$discountAmount)-$preCheck->paid_amount;
        $status=0;
        if($statVal==0)
            $status=1;
        else
            $status=0;

        CheckOutPayment::
        where([
                ['invoice_id', '=',$invId],
            ])
            ->update(
                [
                    'total_amount'=>$newAmount,
                    'status'=>$status,
                    'booking_type' => $bookingType,
                    'discount_amount'=>$discountAmount,
                    'update_date' => $date_time

                ]
            );

        if (session()->has('b_to_date')) {
            session()->put('b_to_date', $toDate);
            session()->put('b_from_date',$fromDate);
        }
        else {
            session([
                'b_to_date' => $toDate,
                'b_from_date' => $fromDate
            ]);
        }


        return redirect('manager/man_edit_booking_list');
    }

    public function manEditBookingList()
    {
        $bookingInfos=BookingInfo::
        whereDate('to_date','>=',session('b_to_date'))
            ->whereDate('from_date','<=',session('b_from_date'))
            ->get();


        return view('manager.bookingList', compact('bookingInfos'))->with(
            [
                'msg' => 0,
                'cmt' => 'init'
            ]
        );
    }
    public function checkAvailable($to,$from,$room_id,$book_id){
        $availableRoom=BookingInfo::
        whereDate('to_date','>=',$to)
            ->whereDate('from_date','<=',$from)
            ->where([
                ['room_id', '=', $room_id],
                ['booking_id', '<>', $book_id]
            ])
            ->first();
        if(count($availableRoom)==0)
            return 0;
        else
            return $availableRoom->status;

    }


    public function manConBookingInfo($id,$from,$to)
    {
        $roomInfo = RoomsInfo::
        where([
                ['room_id', '=', $id]
            ])
            ->first();

        $bookingInfo=$this->checkHistory($to,$from,$id);




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


        return view('manager.bookingDetails', compact('cusInfos', 'roomInfo'))->with(
            [
                'msg' => 0,
                'cmt' => 'init'
            ]
        );
    }

    public function manRemoveOrder($id)
    {
        $orderInfo= OrderPayment::
        where([
                ['order_id', '=', $id],
            ])
           ->first();
        $checkOut=CheckOutPayment::
        where([
                ['invoice_id', '=', $orderInfo->invoice_id],
            ])
            ->first();
        $newAmount=($checkOut->total_amount-$orderInfo->amount);
       // dd($checkOut->total_amount);
        $status=0;
        $val=$newAmount-$checkOut->paid_amount;
        if($val==0)
            $status=1;
        else
            $status=0;

        CheckOutPayment::
        where([
                ['invoice_id', '=',$orderInfo->invoice_id],
            ])
            ->update(
                [
                    'total_amount'=>$newAmount,
                    'status'=>$status

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

        return redirect('manager/man_order_remove_success');






    }

    public function manCheckMap()
    {
        //Now w1
        date_default_timezone_set('Asia/Colombo');
        $todayDate=date("Y-m-d");
        $tomorrowDate=date_create($todayDate);
        date_add($tomorrowDate,date_interval_create_from_date_string("1 days"));
        $tomorrowDate=date_format($tomorrowDate,"Y-m-d");
        if (session()->has('to_date')) {
            session()->put('to_date', session('to_date'));
            session()->put('from_date',session('from_date'));
        }
        else {
            session([
                'to_date' => $tomorrowDate,
                'from_date' => $todayDate
            ]);
        }
        $roomInfos=RoomsInfo::
        where([
                ['is_remove', '=',0]
            ])
            ->orderBy('floor_number', 'asc')
            ->get();

        return view('manager.check_availability_map', compact('roomInfos'))->with(
            [
                'from_date' => session('from_date'),
                'to_date' => session('to_date')
            ]
        );
    }

    public function manBookingListFromFront($id){
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

                return view('manager.bookingList', compact('bookingInfos'))->with(
                    [
                        'msg' => 8,
                        'cmt' => 'init'
                    ]
                );
            }
            else{
                return view('manager.checkOutBookingList', compact('bookingInfos'))->with(
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

    public function manRemoveMealsR($id)
    {
        //meals remove
        $mealsName=MealsInfo::
        where([
                ['meals_id', '=',$id],
            ])->first();
        MealsInfo::
        where([
                ['meals_id', '=',$id],
            ])
            ->update(
                [
                    'is_remove' => 1,
                ]
            );

        if (session()->has('cmt'))
            session()->put('cmt', $mealsName->meals_name);
        else
            session(['cmt' => $mealsName->meals_name]);

        return redirect('manager/man_remove_meals_success');

    }

    public function manEditMealsR($id)
    {
        $mealsInfo=MealsInfo::
        where([
                ['meals_id', '=',$id],
            ])->first();
        return view('manager.editMeals',compact('mealsInfo'))->with(
            [
                'msg' =>0,
                'cmt' =>'init'
            ]
        );

    }

    public function manEditMealsP(Request $request)
    {
        $mealsName=$request->input('meals_name');
        $mealsType=$request->input('meals_type');
        $availableStartTime=$request->input('available_start_time');
        $availableEndTime=$request->input('available_end_time');
        $pricePerUnit=$request->input('price_per_unit');
        $styleOfFood=$request->input('style_of_food');
        $mealsId=$request->input('meals_id');

        date_default_timezone_set('Asia/Colombo');
        $date_time=date("Y-m-d H:i:s");



        MealsInfo::
        where([
                ['meals_id', '=',$mealsId],
            ])
            ->update(
                [
                    'meals_name'=>$mealsName,
                    'meals_type'=>$mealsType,
                    'available_start_time'=>$availableStartTime,
                    'available_end_time'=>$availableEndTime,
                    'style_of_food'=>$styleOfFood,
                    'price_per_unit'=>$pricePerUnit,
                    'is_remove'=>0,
                    'update_date'=>$date_time
                ]
            );
        if (session()->has('cmt'))
            session()->put('cmt', $mealsName);
        else
            session(['cmt' => $mealsName]);
        return redirect('manager/man_edit_meals_success');


    }

    public function manAvailableRoomsSearchBulkMap(Request $request){
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
            return redirect('manager/man_room_search_bulk_map');
        }
        else {
            session()->flush();
            return redirect('/');
        }

    }

    public function manRoomSearchBulkMap(){
        if (session()->has('user_id')) {
            $roomInfos = RoomsInfo::
            where([
                    ['is_remove', '=', 0]
                ])
                ->orderBy('floor_number', 'asc')
                ->get();

            return view('manager.bulk_check_availability_map', compact('roomInfos'))->with(
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

    public function manAddBulkBookingP(Request $request){

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
                            'status' => 2,
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




            return redirect('manager/man_success_bulk_booking');
        }
        else {
            session()->flush();
            return redirect('/');
        }



    }

    public function manSuccessBulkBooking(){
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


            return view('manager.bookingList', compact('bookingInfos'))->with(
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
    public function manBookingCancelMapBulk($id){
        // dd($id);
        if (session()->has('user_id')) {
            BookingInfo::
            where('booking_id', '=', $id)
                ->delete();

            return redirect('manager/man_cancellation_bulk_map_success');
        }
        else {
            session()->flush();
            return redirect('/');
        }

    }

    public function manCancellationSuccessMapBulk(){
        if (session()->has('user_id')) {
            $roomInfos = RoomsInfo::
            where([
                    ['is_remove', '=', 0]
                ])
                ->orderBy('floor_number', 'asc')
                ->get();

            return view('manager.bulk_check_availability_map', compact('roomInfos'))->with(
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

    public function manAddNewBulkCustomer(Request $request){
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
                return redirect('manager/man_create_cus_bulk_success');

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
                    return redirect('manager/man_create_cus_bulk_success');
                } else {
                    if (session()->has('cmt'))
                        session()->put('cmt', $name);
                    else
                        session(['cmt' => $name]);
                    return redirect('manager/man_create_cus_bulk_failure');
                }
            }
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function manCreateCustomerBulkFailure(){
        if (session()->has('user_id')) {
            $roomInfos=session('bulk_room_infos');

            $cusInfos = CustomerInfo::
            where([
                    ['is_remove', '=', 0],
                ])
                ->orderBy('add_date', 'des')
                ->get();

            return view('manager.bulkBookingDetails', compact('cusInfos', 'roomInfos'))->with(
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

    public function manCreateCustomerBulkSuccess(){
        if (session()->has('user_id')) {
            $roomInfos=session('bulk_room_infos');

            $cusInfos = CustomerInfo::
            where([
                    ['is_remove', '=', 0],
                ])
                ->orderBy('add_date', 'des')
                ->get();

            return view('manager.bulkBookingDetails', compact('cusInfos','roomInfos'))->with(
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

    public function manCreateNewBulkCustomer(){
        if (session()->has('user_id')) {
            return view('manager.createBulkCustomer')->with(
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

    public function manBulkTempBooking(Request $request)
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
                        'from_date' => session('from_date'),
                        'to_date' => session('to_date'),
                        'status' => 1,
                        'is_remove' => 0,
                        'user_id' => session('user_id'),
                        'add_date' => $date_time,
                        'update_date' => $date_time

                    ]
                );

            }



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

            return redirect('manager/man_bulk_booking_details');
        }
        else {
            session()->flush();
            return redirect('/');
        }
    }

    public function manBulkBookingDetails()
    {
        $cusInfos = CustomerInfo::
        where([
                ['is_remove', '=', 0],
            ])
            ->orderBy('add_date', 'des')
            ->get();
        $roomInfos=session('bulk_room_infos');
        return view('manager.bulkBookingDetails', compact('cusInfos', 'roomInfos'))->with(
            [
                'msg' => 0,
                'cmt' => 'init'
            ]
        );
    }

    public function manCheckMapBulk()
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

            return view('manager.bulk_check_availability_map', compact('roomInfos'))->with(
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


    public function manEditRoomsP(Request $request)
    {
        $roomNumber = $request->input('room_number');
        $floorNumber = $request->input('floor_number');
        $roomType = $request->input('room_type');
        $roomDescription = $request->input('room_description');
        $amount= $request->input('room_price');
        $roomId= $request->input('room_id');

        date_default_timezone_set('Asia/Colombo');
        $date_time = date("Y-m-d H:i:s");

        $roomCount = RoomsInfo::
        where([
                ['room_number', '=', $roomNumber],
                ['room_id', '<>', $roomId]
            ])
            ->get();

        if (count($roomCount) == 0) {

            RoomsInfo::
            where([
                    ['room_id', '=', $roomId],
                ])
                ->update(
                    [

                        'room_id'=>$roomId,
                        'room_number'=>$roomNumber,
                        'floor_number'=>$floorNumber,
                        'room_type'=>$roomType,
                        'room_description'=>$roomDescription,
                        'room_price'=>$amount,
                        'is_remove'=>0,
                        'update_date'=>$date_time

                    ]
                );

            if (session()->has('cmt'))
                session()->put('cmt', $roomNumber);
            else
                session(['cmt' => $roomNumber]);
            return redirect('manager/man_edit_room_success');
        }
        else{
            if (session()->has('cmt'))
                session()->put('cmt', $roomNumber);
            else
                session(['cmt' => $roomNumber]);
            return redirect('manager/man_edit_room_failure');
        }

        //room ed1

    }

    public function manEditRoomSuccess(){
        //room e3
        $roomInfos=RoomsInfo::
        where([
                ['is_remove', '=',0]
            ])
            ->orderBy('add_date', 'des')
            ->get();
        return view('manager.roomList', compact('roomInfos'))->with(
            [
                'msg' => 2,
                'cmt' => session('cmt')
            ]
        );

    }

    public function manEditRoomFailure(){
        $roomInfos=RoomsInfo::
        where([
                ['is_remove', '=',0]
            ])
            ->orderBy('add_date', 'des')
            ->get();
        return view('manager.roomList', compact('roomInfos'))->with(
            [
                'msg' => 3,
                'cmt' => session('cmt')
            ]
        );

    }

    public function manEditMealsSuccess()
    {
        //meals success
        $mealsInfos=MealsInfo::
        where([
                ['is_remove', '=',0],
            ])
            ->get();

        return view('manager.mealsList',compact('mealsInfos'))->with(
            [
                'msg' =>3,
                'cmt' =>session('cmt')
            ]
        );

    }

    public function manRemoveMealsSuccess()
    {
        //meals success
        $mealsInfos=MealsInfo::
        where([
                ['is_remove', '=',0],
            ])
            ->get();

        return view('manager.mealsList',compact('mealsInfos'))->with(
            [
                'msg' =>1,
                'cmt' =>session('cmt')
            ]
        );

    }



    public function manRemoveAirBooking($id)
    {
        $airBookingInfo= AirBookingPayment::
        where([
                ['a_booking_id', '=', $id],
            ])
            ->first();
        $checkOut=CheckOutPayment::
        where([
                ['invoice_id', '=', $airBookingInfo->invoice_id],
            ])
            ->first();
        $newAmount=($checkOut->total_amount-$airBookingInfo->amount);

        $status=0;
        $val=$newAmount-$checkOut->paid_amount;
        if($val==0)
            $status=1;
        else
            $status=0;

        CheckOutPayment::
        where([
                ['invoice_id', '=',$airBookingInfo->invoice_id],
            ])
            ->update(
                [
                    'total_amount'=>$newAmount,
                    'status'=>$status

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



        return redirect('manager/man_air_booking_remove_success');






    }

    public function manOrderRemoveSuccess()
    {
        $orderInfos=OrderInfo::
        where([
                ['is_remove', '=',0],
            ])
            ->orderBy('add_date', 'desc')
            ->get();
        return view('manager.orderList',compact('orderInfos'))->with(
            [
                'msg' =>0,
                'cmt' =>'Meals Order'
            ]
        );
    }

    public function manAirBookingRemoveSuccess()
    {
        $aBookingInfos=AirPortBookingInfo::
        where([
                ['is_remove', '=',0],
            ])
            ->orderBy('add_date', 'desc')
            ->get();
        //dd($aBookingInfos);
        return view('manager.airBookingList',compact('aBookingInfos'))->with(
            [
                'msg' =>1,
                'cmt' =>'Airport vehicle booking'
            ]
        );
    }

    public function manCusBookingHistory()
    {
        $checkOutInfos=CheckOutPayment::
        where([
                ['is_remove', '=',0],
            ])
            ->get();

        return view('manager.customerHistory', compact('checkOutInfos'))->with(
            [
                'msg' => 0,
                'cmt' => 'init'
            ]
        );
    }

    public function manPayHistoryR($id)
    {
        $payHistoryInfos=PaymentHistory::
        where([
                ['invoice_id', '=',$id],

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

        return view('manager.paymentHistory', compact('payHistoryInfos'))->with(
            [
                'msg' => 0,
                'cmt' => 'init'
            ]
        );
    }

    public function manEditAirBooking($id){

        $aBookingInfo=AirPortBookingInfo::
        where([
                ['a_booking_id', '=',$id],
            ])
            ->first();

        if (session()->has('edit_air_book')) {
            session()->put('edit_air_book', $id);
        } else {
            session([
                'edit_air_book' => $id,
            ]);
        }


        return view('manager.editAirPortBooking', compact('aBookingInfo'))->with(
            [
                'msg' => 0,
                'cmt' => 'init'
            ]
        );
    }

    public function manEditAirPortBookingP(Request $request)
    {
        //Now 1
        $bookingType=$request->input('booking_type');
        $no_of_passengers=$request->input('no_of_passengers');
        $fromPlace=$request->input('from_place');
        $toPlace=$request->input('to_place');
        $bookingDate=$request->input('booking_date');
        $bookingTime=$request->input('booking_time');
        $amount=$request->input('a_amount');
        date_default_timezone_set('Asia/Colombo');
        $date_time=date("Y-m-d H:i:s");
        $airBookingInf=AirPortBookingInfo::
        where([
                ['a_booking_id', '=',session('edit_air_book')],
            ])
            ->first();

        $prevAmount=$airBookingInf->amount;

        AirPortBookingInfo::
        where([
                ['a_booking_id', '=',session('edit_air_book')],
            ])
        ->update(
            [
                'a_booking_type'=>$bookingType,
                'no_of_passengers'=>$no_of_passengers,
                'a_booking_from'=>$fromPlace,
                'a_booking_to'=>$toPlace,
                'a_booking_date'=>$bookingDate,
                'a_booking_time'=>$bookingTime,
                'a_amount'=>$amount,
                'user_id'=>session('user_id'),
                'edit_lock'=>0,
                'remove_lock'=>0,
                'update_date'=>$date_time
            ]
        );

        AirBookingPayment::
        where([
                ['a_booking_id', '=',session('edit_air_book')],
            ])
        ->update(
            [
                'amount'=>$amount,
                'is_remove'=>0,
                'update_date'=>$date_time
            ]
        );


        $preCheck=CheckOutPayment::
        where([
                ['invoice_id', '=',$airBookingInf->invoice_id],
            ])
            ->first();


        $redAmount=$preCheck->total_amount-$prevAmount;
        $newAmount=$redAmount+$amount;
        //   dd($fromDate,$toDate,$bookingId,$cusId,$invId,$totalAmount,$numOfDays,$newAmount);
        $statVal=$newAmount-$preCheck->paid_amount;
        $status=0;
        if($statVal==0)
            $status=1;
        else
            $status=0;

        CheckOutPayment::
        where([
                ['invoice_id', '=',$airBookingInf->invoice_id],
            ])
            ->update(
                [
                    'total_amount'=>$newAmount,
                    'status'=>$status,
                    'update_date' => $date_time

                ]
            );
        return redirect('manager/man_index_airport_booking_list');
    }

    public function manOrderEditAppR($id)
    {
        $appInf=ApprovalInfo::
        where([
                ['app_id', '=',$id],
            ])
            ->first();
        OrderInfo::
        where([
                ['order_id', '=',$appInf->data_id],
            ])
            ->update(
                [
                    'edit_lock'=>1,
                ]
            );

        $orderInf= OrderInfo::
        where([
                ['order_id', '=',$appInf->data_id],
            ])
            ->first();

        ApprovalInfo::
        where([
                ['app_id', '=',$id],
            ])
            ->update(
                [
                    'is_remove'=>1,
                ]
            );

        if (session()->has('cmt'))
            session()->put('cmt', $orderInf->invoice_id);
        else
            session(['cmt' => $orderInf->invoice_id]);

        return redirect('manager/man_order_edit_app');

    }

    public function manRemoveApprovalsR($id)
    {


        ApprovalInfo::
        where([
                ['app_id', '=',$id],
            ])
            ->update(
                [
                    'is_remove'=>1,
                ]
            );

        if (session()->has('cmt'))
            session()->put('cmt',"Reject");
        else
            session(['cmt' => "Reject"]);

        return redirect('manager/man_reject_app');

    }
    public function manOrderRemoveAppR($id)
    {
        $appInf=ApprovalInfo::
        where([
                ['app_id', '=',$id],
            ])
            ->first();

        OrderInfo::
        where([
                ['order_id', '=',$appInf->data_id],
            ])
            ->update(
                [
                    'remove_lock'=>1,
                ]
            );

        $orderInf= OrderInfo::
        where([
                ['order_id', '=',$appInf->data_id],
            ])
            ->first();

        ApprovalInfo::
        where([
                ['app_id', '=',$id],
            ])
            ->update(
                [
                    'is_remove'=>1,
                ]
            );

        if (session()->has('cmt'))
            session()->put('cmt', $orderInf->invoice_id);
        else
            session(['cmt' => $orderInf->invoice_id]);

        return redirect('manager/man_order_remove_app');
    }

    public function manBillPrintAppR($id)
    {
        $appInf=ApprovalInfo::
        where([
                ['app_id', '=',$id],
            ])
            ->first();

        CheckOutPayment::
        where([
                ['invoice_id', '=',$appInf->data_id],
            ])
            ->update(
                [
                    'bill_lock'=>0,
                ]
            );

        $checkOutInf= CheckOutPayment::
        where([
                ['invoice_id', '=',$appInf->data_id],
            ])
            ->first();

        ApprovalInfo::
        where([
                ['app_id', '=',$id],
            ])
            ->update(
                [
                    'is_remove'=>1,
                ]
            );

        if (session()->has('cmt'))
            session()->put('cmt', $checkOutInf->invoice_id);
        else
            session(['cmt' => $checkOutInf->invoice_id]);

        return redirect('manager/man_bill_app');
    }

    public function manBookCancelAppR($id)
    {
        $appInf=ApprovalInfo::
        where([
                ['app_id', '=',$id],
            ])
            ->first();
        //  dd($appInf);

        BookingInfo::
        where([
                ['booking_id', '=',$appInf->data_id],
            ])
            ->update(
                [
                    'cancel_lock'=>1,
                ]
            );

        $bookingInf= BookingInfo::
        where([
                ['booking_id', '=',$appInf->data_id],
            ])
            ->first();

        ApprovalInfo::
        where([
                ['app_id', '=',$id],
            ])
            ->update(
                [
                    'is_remove'=>1,
                ]
            );

        if (session()->has('cmt'))
            session()->put('cmt', $bookingInf->invoice_id);
        else
            session(['cmt' => $bookingInf->invoice_id]);

        return redirect('manager/man_book_cancel_app');
    }

    public function manAirBookEditAppR($id)
    {
        $appInf=ApprovalInfo::
        where([
                ['app_id', '=',$id],
            ])
            ->first();
        //  dd($appInf);

        AirPortBookingInfo::
        where([
                ['a_booking_id', '=',$appInf->data_id],
            ])
            ->update(
                [
                    'edit_lock'=>1,
                ]
            );

        $airBookingInf= AirPortBookingInfo::
        where([
                ['a_booking_id', '=',$appInf->data_id],
            ])
            ->first();

        ApprovalInfo::
        where([
                ['app_id', '=',$id],
            ])
            ->update(
                [
                    'is_remove'=>1,
                ]
            );

        if (session()->has('cmt'))
            session()->put('cmt', $airBookingInf->invoice_id);
        else
            session(['cmt' => $airBookingInf->invoice_id]);

        return redirect('manager/man_air_book_edit_app');
    }


    public function manAirBookRemoveAppR($id)
    {
        $appInf=ApprovalInfo::
        where([
                ['app_id', '=',$id],
            ])
            ->first();
        //  dd($appInf);

        AirPortBookingInfo::
        where([
                ['a_booking_id', '=',$appInf->data_id],
            ])
            ->update(
                [
                    'remove_lock'=>1,
                ]
            );

        $airBookingInf= AirPortBookingInfo::
        where([
                ['a_booking_id', '=',$appInf->data_id],
            ])
            ->first();

        ApprovalInfo::
        where([
                ['app_id', '=',$id],
            ])
            ->update(
                [
                    'is_remove'=>1,
                ]
            );

        if (session()->has('cmt'))
            session()->put('cmt', $airBookingInf->invoice_id);
        else
            session(['cmt' => $airBookingInf->invoice_id]);

        return redirect('manager/man_air_book_remove_app');
    }

    public function manPayRemoveAppR($id)
    {
        $appInf=ApprovalInfo::
        where([
                ['app_id', '=',$id],
            ])
            ->first();
        //  dd($appInf);

        PaymentHistory::
        where([
                ['history_id', '=',$appInf->data_id],
            ])
            ->update(
                [
                    'pay_lock'=>1,
                ]
            );

        $payHistory= PaymentHistory::
        where([
                ['history_id', '=',$appInf->data_id],
            ])
            ->first();

        ApprovalInfo::
        where([
                ['app_id', '=',$id],
            ])
            ->update(
                [
                    'is_remove'=>1,
                ]
            );

        if (session()->has('cmt'))
            session()->put('cmt', $payHistory->invoice_id);
        else
            session(['cmt' => $payHistory->invoice_id]);

        return redirect('manager/man_pay_remove_app');
    }

    public function manBookEditAppR($id)
    {
        $appInf=ApprovalInfo::
        where([
                ['app_id', '=',$id],
            ])
            ->first();
        //  dd($appInf);

        BookingInfo::
        where([
                ['booking_id', '=',$appInf->data_id],
            ])
            ->update(
                [
                    'edit_lock'=>1,
                ]
            );

        $bookingInf= BookingInfo::
        where([
                ['booking_id', '=',$appInf->data_id],
            ])
            ->first();

        ApprovalInfo::
        where([
                ['app_id', '=',$id],
            ])
            ->update(
                [
                    'is_remove'=>1,
                ]
            );

        if (session()->has('cmt'))
            session()->put('cmt', $bookingInf->invoice_id);
        else
            session(['cmt' => $bookingInf->invoice_id]);

        return redirect('manager/man_book_edit_app');
    }



    public function manOrderEditApp()
    {
        $appInfos = ApprovalInfo::

            orderBy('add_date', 'des')
            ->get();
        return view('manager.approvalList', compact('appInfos'))->with(
            [
                'msg' => 1,
                'cmt' => session('cmt')
            ]
        );
    }

    public function manRejectApp()
    {
        $appInfos = ApprovalInfo::

            orderBy('add_date', 'des')
            ->get();
        return view('manager.approvalList', compact('appInfos'))->with(
            [
                'msg' => 9,
                'cmt' => session('cmt')
            ]
        );
    }

    public function manOrderRemoveApp()
    {
        $appInfos = ApprovalInfo::

            orderBy('add_date', 'des')
            ->get();
        return view('manager.approvalList', compact('appInfos'))->with(
            [
                'msg' => 2,
                'cmt' => session('cmt')
            ]
        );
    }

    public function manBillApp()
    {
        $appInfos = ApprovalInfo::
            orderBy('add_date', 'des')
            ->get();
        return view('manager.approvalList', compact('appInfos'))->with(
            [
                'msg' => 3,
                'cmt' => session('cmt')
            ]
        );
    }

    public function manBookCancelApp()
    {
        $appInfos = ApprovalInfo::
            orderBy('add_date', 'des')
            ->get();
        return view('manager.approvalList', compact('appInfos'))->with(
            [
                'msg' => 4,
                'cmt' => session('cmt')
            ]
        );
    }

    public function manBookEditApp()
    {
        $appInfos = ApprovalInfo::
            orderBy('add_date', 'des')
            ->get();
        return view('manager.approvalList', compact('appInfos'))->with(
            [
                'msg' => 5,
                'cmt' => session('cmt')
            ]
        );
    }

    public function manAirBookEditApp()
    {
        $appInfos = ApprovalInfo::
            orderBy('add_date', 'des')
            ->get();
        return view('manager.approvalList', compact('appInfos'))->with(
            [
                'msg' => 6,
                'cmt' => session('cmt')
            ]
        );
    }

    public function manAirBookRemoveApp()
    {
        $appInfos = ApprovalInfo::
            orderBy('add_date', 'des')
            ->get();
        return view('manager.approvalList', compact('appInfos'))->with(
            [
                'msg' => 7,
                'cmt' => session('cmt')
            ]
        );
    }

    public function manPayRemoveApp()
    {
        $appInfos = ApprovalInfo::
            orderBy('add_date', 'des')
            ->get();
        return view('manager.approvalList', compact('appInfos'))->with(
            [
                'msg' => 8,
                'cmt' => session('cmt')
            ]
        );
    }

    public function manMealsApp()
    {
        $appInfos = ApprovalInfo::
        orderBy('add_date', 'des')
            ->get();
        return view('manager.approvalList', compact('appInfos'))->with(
            [
                'msg' => 0,
                'cmt' => 'init'
            ]
        );
    }

    public function manIndexAddRoom(){
        return view('manager.addRoom')->with(
            [
                'msg' => 0,
                'cmt' => 'initial'
            ]
        );
    }

    public function manAddRoomSuccess(){
        return view('manager.addRoom')->with(
            [
                'msg' => 1,
                'cmt' => session('cmt')
            ]
        );
    }

    public function manAddRoomFailure(){
        return view('manager.addRoom')->with(
            [
                'msg' => 2,
                'cmt' => session('cmt')
            ]
        );
    }

    public function manIndexRoomList(){
        $roomInfos=RoomsInfo::
        where([
                ['is_remove', '=',0]
            ])
            ->orderBy('add_date', 'des')
            ->get();
        return view('manager.roomList', compact('roomInfos'))->with(
            [
                'msg' => 0,
                'cmt' => 'initial'
            ]
        );
    }

    public function manAddMeals(){
        return view('manager.addMeals')->with(
            [
                'msg' =>0,
                'cmt' =>'init'
            ]
        );
    }

    public function manAddMealsSuccess()
    {
        return view('manager.addMeals')->with(
            [
                'msg' =>1,
                'cmt' =>session('cmt')
            ]
        );
    }

    public function manMealsList()
    {
        $mealsInfos=MealsInfo::
        where([
                ['is_remove', '=',0],
            ])
            ->get();

        return view('manager.mealsList',compact('mealsInfos'))->with(
            [
                'msg' =>0,
                'cmt' =>'init'
            ]
        );

    }

    public function manAddMealsP(Request $request)
    {
        $mealsName=$request->input('meals_name');
        $mealsType=$request->input('meals_type');
        $availableStartTime=$request->input('available_start_time');
        $availableEndTime=$request->input('available_end_time');
        $pricePerUnit=$request->input('price_per_unit');
        $styleOfFood=$request->input('style_of_food');

        date_default_timezone_set('Asia/Colombo');
        $date_time=date("Y-m-d H:i:s");
        $mealsId="M_".uniqid();


        MealsInfo::insert(
            [
                'meals_id'=>$mealsId,
                'meals_name'=>$mealsName,
                'meals_type'=>$mealsType,
                'available_start_time'=>$availableStartTime,
                'available_end_time'=>$availableEndTime,
                'style_of_food'=>$styleOfFood,
                'price_per_unit'=>$pricePerUnit,
                'is_remove'=>0,
                'add_date'=>$date_time,
                'update_date'=>$date_time
            ]
        );
        if (session()->has('cmt'))
            session()->put('cmt', $mealsName);
        else
            session(['cmt' => $mealsName]);
        return redirect('manager/man_add_meals_successfully');


    }

    public function manAddRooms(Request $request)
    {
        $roomNumber = $request->input('room_number');
//        $roomKey = $request->input('key_number');
        $floorNumber = $request->input('floor_number');
        $roomType = $request->input('room_type');
        $roomDescription = $request->input('room_description');
        $amount= $request->input('room_price');

        date_default_timezone_set('Asia/Colombo');
        $date_time = date("Y-m-d H:i:s");
        $roomId = "R_" . uniqid();

        $roomCount = RoomsInfo::
        where([
                ['room_number', '=', $roomNumber],
            ])
            ->get();

        if (count($roomCount) == 0) {

            RoomsInfo::insert(
                [

                    'room_id'=>$roomId,
                    'room_number'=>$roomNumber,
                    'floor_number'=>$floorNumber,
                    'room_type'=>$roomType,
                    'room_description'=>$roomDescription,
                    'room_price'=>$amount,
                    'is_remove'=>0,
                    'add_date'=>$date_time,
                    'update_date'=>$date_time

                ]
            );

            if (session()->has('cmt'))
                session()->put('cmt', $roomNumber);
            else
                session(['cmt' => $roomNumber]);
            return redirect('manager/man_add_room_success');
        }
        else{
            if (session()->has('cmt'))
                session()->put('cmt', $roomNumber);
            else
                session(['cmt' => $roomNumber]);
            return redirect('manager/man_add_room_failure');
        }

    }

    public function manEditRoom($id){
        $roomInfo=RoomsInfo::
        where([
                ['room_id', '=',$id],
            ])->first();



        return view('manager.editRoom',compact('roomInfo'))->with(
            [
                'msg' =>0,
                'cmt' =>'init'
            ]
        );
        //room ed

    }

    public function manRemoveRoom($id){
        $roomInfo=RoomsInfo::
        where([
                ['room_id', '=',$id],
            ])->first();

        RoomsInfo::
        where([
                ['room_id', '=',$id],
            ])
            ->update(
                [

                    'is_remove' => 1,

                ]
            );
        if (session()->has('cmt'))
            session()->put('cmt', $roomInfo->room_number);
        else
            session(['cmt' => $roomInfo->room_number]);

        return redirect('manager/man_remove_room_success');

        //room rem

    }

    public function manRemoveRoomSuccess()
    {
        //room su
        $roomInfos=RoomsInfo::
        where([
                ['is_remove', '=',0]
            ])
            ->orderBy('add_date', 'des')
            ->get();
        return view('manager.roomList', compact('roomInfos'))->with(
            [
                'msg' => 1,
                'cmt' => session('cmt')
            ]
        );
    }



    public function checkHistory($to,$from,$room_id){
        $availableRoom=BookingInfo::
        whereDate('to_date','>=',$to)
            ->whereDate('from_date','<=',$from)
            ->where([
                ['room_id', '=',$room_id],
                ['status','=',1]

            ])
            ->first();
        return $availableRoom;

    }

    public function manReportCheckRooms()
    {
        //rep3
        $bookingInfos=BookingInfo::
        where([
                ['check_out_status','=',1],
            ])
            ->get();
        return view('manager.reportCheckOutBooking', compact('bookingInfos'))->with(
            [
                'msg' => 0,
                'cmt' => 'init'
            ]
        );
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





}
