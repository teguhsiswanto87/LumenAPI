<?php


namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function register(Request $request)
    {
        $rules = [
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ];

        $customMessage = [
            'required' => 'Please fill attribute :attribute'
        ];
        $this->validate($request, $rules, $customMessage);

        try {
            $hasher = app()->make('hash');
            $username = $request->input('username');
            $email = $request->input('email');
            $password = $hasher->make($request->input('password'));

            $save = User::create([
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'api_token' => ''
            ]);

            $res['status'] = true;
            $res['message'] = 'Registration Success!';
            return response($res, 200);

        } catch (QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }

    public function get_user()
    {
        $user = User::all();
        if ($user) {
            $res['status'] = true;
            $res['message'] = $user;

            return response($res);
        } else {
            $res['status'] = false;
            $res['message'] = 'Cannot find user!';

            return response($res);
        }
    }

}
