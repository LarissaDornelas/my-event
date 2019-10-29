<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Provider;

class ProviderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getAll()
    {

        try {
            $providers = Provider::all();

            if (sizeOf($providers) > 0) {
                return view('provider/providers', ['providerData' => $providers]);
            } else {
                return view('provider/providers', ['providerData' => []]);
            }
        } catch (\Exception $e) {

            return view('provider/providers', ['providerData' => []]);
        }
    }


    public function getOne($id)
    {


        try {
            $provider = Provider::where('id', $id)->first();
            if ($provider != null) {
                return view('provider/providerDetails', ['providerData' => $provider]);
            } else {

                return redirect('/provider')->with('error', 'Houve um erro ao abrir fornecedor');
            }
        } catch (\Exception $e) { }
    }

    public function create(Request $request)
    {

        $newProvider = $request->all();
        if (array_key_exists('active', $newProvider)) {
            $newProvider['active'] = true;
        } else {
            $newProvider['active'] = false;
        }

        try {

            Provider::create($newProvider);

            return redirect('/provider')->with('status', 'Fornecedor cadastrado com sucesso');
        } catch (\Exception $e) {
            return redirect('/provider')->with('error', 'Houve um erro ao cadastrar fornecedor');
        }
    }

    public function update($id, Request $request)
    {
        $newProvider = $request->all();
        if (array_key_exists('active', $newProvider)) {
            $newProvider['active'] = true;
        } else {
            $newProvider['active'] = false;
        }
        if (array_key_exists('admin', $newProvider)) {
            $newProvider['admin'] = true;
        } else {
            $newProvider['admin'] = false;
        }
        try {
            Provider::where('id', $id)->first()
                ->update($newProvider);
            return redirect('/provider/' . $id)->with('status', 'Dados atualizados com sucesso');
        } catch (\Exception $e) {
            return redirect('/provider/' . $id)->with('error', 'Houve um erro ao atualizar os dados. Tente novamente mais tarde.');
        }
    }
}
