<?php


namespace App\Http\Controllers;


use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];

        $customMessage = [
            'required' => ':attribute tidak boleh kosong'
        ];
        $this->validate($request, $rules, $customMessage);

        $email = $request->input('email');

        //tokennya belum menggunakan JWT
        try {
            $login = User::where('email', $email)->first();
            if ($login) {
                if ($login->count() > 0) {
                    if (Hash::check($request->input('password'), $login->password)) {
                        try {
                            $api_token = sha1($login->id_user . time());

                            $create_token = User::where('id', $login->id_user)->update(['api_token' => $api_token]);
                            $res['status'] = true;
                            $res['message'] = 'Success Login!';
                            $res['data'] = $login;
                            $res['api_token'] = $api_token;

                            return response($res, 200);

                        } catch (QueryException $ex) {
                            $res['status'] = false;
                            $res['message'] = $ex->getMessage();
                            return response($res, 500);
                        }
                    } else {
                        $res['status'] = false;
                        $res['message'] = 'Username / email / password not found';
                        return response($res, 401);
                    }
                } else {
                    $res['status'] = false;
                    $res['message'] = 'Username / email / password not found';
                    return response($res, 401);
                }
            } else {
                $res['status'] = false;
                $res['message'] = 'Username / email / password not found';
                return response($res, 401);
            }
        } catch (QueryException $ex) {
            $res['success'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }

    }
}
