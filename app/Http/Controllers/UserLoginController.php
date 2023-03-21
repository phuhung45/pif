<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.user.login');
    }

    public function login(Request $request)
	{
		$credentials = [
			'email' => $request['email'],
			'password' => $request['password'],
		];
		if (!empty(Auth::user())){
			return redirect('/welcome');
		}
		
		if (Auth::guard('front')->attempt($credentials)) {
			return  redirect('/welcome');            
		} else {
			return response()->json([
				'status' => 0,
				'message' => 'Thông tin đăng nhập không chính xác'
			]);
		}
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.user.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'password' => ['required', 'string', 'min:6', 'confirmed'],
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'required|email|unique:pif_user,email',
                'phone' => 'required|digits:10'

            ], 
            [
                'password.required' => 'Không được để trống Mật khẩu',
                'password.confirmed' => 'Mật khẩu nhập lại không chính xác',
                'password.min' => 'Mật khẩu ít nhất gồm 6 ký tự',
                'password.string' => 'Mật khẩu không phù hợp, vui lòng nhập lại',
                'email.email' => 'Email không đúng định dạng',
                'email.required' => 'Email không được để trống',
                'email.unique' => 'Email đã tồn tại, vui lòng kiểm tra lại',
                'phone.required' => 'Số điện thoại không được để trống',
                'phone.digits' => 'Số điện thoại không đúng định dạng, vui lòng kiểm tra lại',
                'first_name.required' => 'Họ không được để trống',
                'last_name.required' => 'Tên không được để trống'
            ]
          );

                $user_register = User::create([
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'password' => Hash::make($request['password']),
                    'user_type' => '1',
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'created_at' => Carbon::now(),
                    'last_login' => Carbon::now(),
                    ]);
                    dd($request->all());
                    if ($user_register) {
                        $message = $request->validate;
                        return redirect($message)->route('login')->with('success', 'Đăng ký thành công.');
                    }else{
                        return redirect()->back()->with('error', 'Xảy ra lỗi khi đăng ký.');
                    }
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
}
