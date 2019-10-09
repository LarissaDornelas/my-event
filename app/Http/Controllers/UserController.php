<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function getAll()
    {
        try {
            $users = User::all();

            if (sizeOf($users) > 0) {
                return '';
            } else {
                return '';
            }
        } catch (\Exception $e) { }
    }


    public function getOne($id)
    {


        try {
            $user = User::where('id', $id)->first();
            if ($user != null) {
                return '';
            } else {
                return '';
            }
        } catch (\Exception $e) { }
    }

    public function create(Request $request)
    {

        try {

            $user = User::create($request->all());

            return '';
        } catch (\Exception $e) { }
    }

    public function update($id, Request $request)
    {
        try {
            $user = User::where('id', $id)->first()
                ->update($request->all());
        } catch (\Exception $e) { }
    }

    public function delete($id)
    {
        try {
            $user = User::where('id', $id)->first()->delete();
        } catch (\Exception $e) { }
    }
}
