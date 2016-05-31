<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;
use Validator;
use Response;

class AdminController extends Controller
{

    public function administrators()
    {
        $admin = User::where('is_admin', '=', 1)->get();
        return view('admin.administrators', ['admin' => $admin]);
    }

    public function add_admin()
    {
        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        $userData = array(
            'name'      => $formFields['name'],
            'email'     =>  $formFields['email'],
            'tel'     =>  $formFields['tel'],
            'password'  =>  $formFields['password'],
            'password_confirmation' =>  $formFields[ 'password_confirmation'],
        );
        $rules = array(
            'name'      =>  'required',
            'email'     =>  'required|email|unique:users',
            'tel'      =>  'required',
            'password'  =>  'required|min:6|confirmed',
        );
        $validator = Validator::make($userData,$rules);
        if($validator->fails())
            return Response::json(array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            ));
        else {
            if(User::createAdmin($userData)) {
                $admins = User::where('is_admin', '=', 1)->get();
                return view('admin.partials._admins', ['admin' => $admins]);
            }
        }
    }

    public function edit_admin($id)
    {
        $admin = User::findOrFail($id);
        return $admin->toJson();
    }

    public function save_admin($id)
    {
        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        $userData = array(
            'name'      => $formFields['name'],
            'email'     =>  $formFields['email'],
            'tel'     =>  $formFields['tel'],
        );
        $rules = array(
            'name'      =>  'required',
            'email'     =>  'required|unique:users,email,'.$id,
            'tel'      =>  'required',
        );
        $validator = Validator::make($userData,$rules);
        if($validator->fails())
            return Response::json(array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            ));
        else {
            $admin = User::find($id);
            $admin->name = $formFields['name'];
            $admin->email = $formFields['email'];
            $admin->tel = $formFields['tel'];

            if (!$admin->save()) {
                return 'error';
            } else {
                $admins = User::where('is_admin', '=', 1)->get();
                return view('admin.partials._admins', ['admin' => $admins]);
            }
        }
    }

    public function delete_admin(Request $request)
    {
        $id = $request->id;
        $admin = User::find($id);
        if($id == 78){
            return 'disable';
        } elseif (!$admin->delete()) {
            return 'error';
        } else {
            $admins = User::where('is_admin', '=', 1)->get();
            return view('admin.partials._admins', ['admin' => $admins]);
        }
    }

    /*public function send_mail()
    {
        Mail::send('emails.welcome', array('key' => 'value'), function($message)
        {
            $message->to('golddgek@mail.ru', 'Джон Смит')->subject('Привет!');
        });
    }*/

}
