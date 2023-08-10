<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index',compact('users'));
    }

    public function create()
    {
        $account_types = User::ACCOUNT_TYPE;
        return view('users.create',compact('account_types'));
    }

    public function store(Request $request)
    {
       try{
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        User::create($data);
        return redirect()->route('users.index')->withMessage('Successfully added');

       }catch(Exception $e){
        return redirect()->back()->withErrors($e->getMessage());
       }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $account_types = User::ACCOUNT_TYPE;
        return view('users.edit',compact('user','account_types'));
    }

    public function update(Request $request , $id)
    {
       try{
        $data = $request->except("_token");
        $data['password'] = Hash::make($request->password);
        User::where('id',$id)->update($data);
        return redirect()->route('users.index')->withMessage('Successfully updated');

       }catch(Exception $e){
        return redirect()->back()->withErrors($e->getMessage());
       }
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('users.index')->withMessage('Successfully deleted');
    }


}
