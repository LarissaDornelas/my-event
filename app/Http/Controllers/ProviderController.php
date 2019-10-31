<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;
use App\ProviderCategory;
use Illuminate\Support\Facades\DB;

class ProviderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getAll()
    {

        try {
            $providers = DB::table('provider')->join('providerCategory', 'provider.providerCategory_id', '=', 'providerCategory.id')
                ->select('provider.*', 'providerCategory.name as providerCategoryName')
                ->get();

            $providerCategories = ProviderCategory::where('active', 1)->get();

            if (sizeOf($providers) > 0) {
                return view('provider/providers', ['providerData' => $providers, 'providerCategories' => $providerCategories]);
            } else {
                return view('provider/providers', ['providerData' => [], 'providerCategories' => $providerCategories]);
            }
        } catch (\Exception $e) {

            return view('provider/providers', ['providerData' => [], 'providerCategories' => []]);
        }
    }


    public function getOne($id)
    {


        try {
            $provider = DB::table('provider')->join('providerCategory', 'provider.providerCategory_id', '=', 'providerCategory.id')
                ->select('provider.*', 'providerCategory.name as providerCategoryName')
                ->where('provider.id', $id)->first();


            $providerCategories = ProviderCategory::where('active', 1)->get();

            if ($provider != null) {
                return view('provider/providerDetails', ['providerData' => $provider, 'providerCategories' => $providerCategories]);
            } else {

                return redirect('/provider')->with('error', 'Houve um erro ao abrir fornecedor');
            }
        } catch (\Exception $e) {


            return redirect('/provider')->with('error', 'Houve um erro ao abrir fornecedor');
        }
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
