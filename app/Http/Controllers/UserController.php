<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getAll()
    {

        try {
            $users = User::all();

            if (sizeOf($users) > 0) {
                return view('user/users', ['userData' => $users]);
            } else {
                return view('user/users', ['userData' => []]);
            }
        } catch (\Exception $e) {
            return view('user/users', ['userData' => []]);
        }
    }


    public function getOne($id)
    {


        try {
            $user = User::where('id', $id)->first();
            if ($user != null) {
                return view('user/userDetails', ['userData' => $user]);
            } else {
                return redirect('/user')->with('error', 'Houve um erro ao abrir usuário');
            }
        } catch (\Exception $e) {

            return redirect('/user')->with('error', 'Houve um erro ao abrir usuário');
        }
    }

    public function create(Request $request)
    {

        $hashedRandomPassword = Hash::make('lari1234');
        $newUser = $request->all();
        if (array_key_exists('active', $newUser)) {
            $newUser['active'] = true;
        } else {
            $newUser['active'] = false;
        }
        if (array_key_exists('admin', $newUser)) {
            $newUser['admin'] = true;
        } else {
            $newUser['admin'] = false;
        }
        $newUser['password'] = $hashedRandomPassword;

        try {
            $user = User::where('email', $newUser['email'])->get();

            if (sizeOf($user) > 0) {
                return redirect('/user')->with('error', 'Email já cadastrado.');
            }
            User::create($newUser);

            return redirect('/user')->with('status', 'Usuário cadastrado com sucesso');
        } catch (\Exception $e) {

            return redirect('/user')->with('error', 'Houve um erro ao cadastrar usuário');
        }
    }

    public function update($id, Request $request)
    {
        $newUser = $request->all();
        if (array_key_exists('active', $newUser)) {
            $newUser['active'] = true;
        } else {
            $newUser['active'] = false;
        }
        if (array_key_exists('admin', $newUser)) {
            $newUser['admin'] = true;
        } else {
            $newUser['admin'] = false;
        }
        try {
            User::where('id', $id)->first()
                ->update($newUser);
            return redirect('/user/' . $id)->with('status', 'Dados atualizados com sucesso');
        } catch (\Exception $e) {
            return redirect('/user/' . $id)->with('error', 'Houve um erro ao atualizar os dados. Tente novamente mais tarde.');
        }
    }


    function getProfile($id)
    {
        if ($id == Auth::user()->id) {
            try {
                $user = User::where('id', $id)->first();
                if ($user != null) {
                    return view('user/profileSettings', ['userData' => $user]);
                } else {
                    return redirect('/')->with('error', 'Houve um erro ao abrir usuário');
                }
            } catch (\Exception $e) {

                return redirect('/')->with('error', 'Houve um erro ao abrir usuário');
            }
        } else {
            return redirect('/')->with('error', 'Houve um erro ao abrir usuário');
        }
    }
}
