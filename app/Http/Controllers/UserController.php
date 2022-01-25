<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $name_email;
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function busqueda(Request $request){
        $user = User::
                        when($request->id,function($query,$id){
                            return $query->where('id',$id);
                        })
                        ->when($request->name_email,function($query,$name_email){
                            return $query->where('email','like',"%$name_email%");    
                        })
                        ->get();
        return $user;
    }
}
