<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\UserInfo;
use App\UserMtn;
use Crypt;
class CommonController extends Controller
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

    public function errorIndex()
    {
      return view('error')->with(
                [
                    'msg' => 1,
                ]
            );
    }
    public function indexStart()
    {
      return view('index')->with(
                [
                    'msg' => 1,
                ]
            );
    }

    public function setCookie()
    {
      return view('cookies.cookie');
    }

    public function indexLogin()
    {
        if (session()->has('user_id')) {
            $userInfo = UserInfo::
            where([
                    ['user_id', '=',session('user_id')],
                    ['is_remove', '=', 0],
                ])
                ->first();
            if ($userInfo->user_role == 0) {

                return redirect('receptionist/receptionist_home');

            } else if ($userInfo->user_role == 1) {
                return redirect('manager/manager_home');

            } else if ($userInfo->user_role == 2) {

                return redirect('super_admin/admin_home');

            }

        }
        else {
            return view('login')->with(
                [
                    'msg' => 1,
                ]
            );
        }
    }

    public function loginAuthorization(Request $request)
    {



            $userLoginId = $request->input('user_login_id');
            $userPassword = $request->input('user_password');
            $userInfo = UserInfo::
            where([
                    ['login_id', '=', $userLoginId],
                    ['is_remove', '=', 0],
                ])
                ->first();
            // dd($userInfo);

            if (count($userInfo) != 0) {
                if (strcmp($userPassword, Crypt::decrypt($userInfo->user_password)) == 0) {
                    session()->flush();
                    if ($userInfo->user_role == 0) {

                        date_default_timezone_set('Asia/Colombo');
                        $date_time = date("Y-m-d H:i:s");
                        $mtnID= "MTN_" . uniqid();
                       // $mac=$this->get_mac_add($this->get_client_ip());
                        UserMtn::insert(
                            [
                                'mtn_id'=>$mtnID,
                                'mtn_ip'=>$this->get_client_ip(),
                                'log_date'=>$date_time

                            ]
                        );

                        session([
                            'user_id' => $userInfo->user_id,
                            'mtn_ip'=>$this->get_client_ip(),
                            'mtn_id'=>$mtnID,
                            'pg_count'=>1


                        ]);


                        //dd($this->get_client_ip());

                        return redirect('receptionist/receptionist_home_first');

                    } else if ($userInfo->user_role == 1) {
                        session([
                            'user_id' => $userInfo->user_id,

                        ]);
                        return redirect('manager/manager_home');

                    } else if ($userInfo->user_role == 2) {
                        session([
                            'user_id' => $userInfo->user_id,

                        ]);
                        return redirect('super_admin/admin_home');

                    }


                } else
                    return view('login')->with([
                        'msg' => 2
                    ]);
            } else {
                return view('login')->with([
                    'msg' => 3
                ]);
            }



    }

    public function mtnUserAddP(Request $request){
        $mtnId = $request->input('mtn_id');
        $mtn_name= $request->input('mtn_name');
        UserMtn::
        where([
                ['mtn_id', '=', $mtnId],
            ])
            ->update(
                [

                    'mtn_name' => $mtn_name,

                ]
            );
        return redirect('receptionist/receptionist_home');
    }

    public function indexCalculator()
    {
        return view('calc');
    }
    public function userLogout()
    {
        session()->flush();
        return redirect('/');
    }

    function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

}
