<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProviderCategory;

class ProviderCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getAll()
    {

        try {
            $categories = ProviderCategory::all();

            if (sizeOf($categories) > 0) {
                return view('providerCategory/categories', ['categoryData' => $categories]);
            } else {
                return view('providerCategory/categories', ['categoryData' => []]);
            }
        } catch (\Exception $e) {
            return view('providerCategory/categories', ['categoryData' => []]);
        }
    }

    public function create(Request $request)
    {


        $neweventProviderCategory = $request->all();
        if (array_key_exists('active', $neweventProviderCategory)) {
            $neweventProviderCategory['active'] = true;
        } else {
            $neweventProviderCategory['active'] = false;
        }

        try {

            ProviderCategory::create($neweventProviderCategory);

            return redirect('provider/category')->with('status', 'Categoria cadastrada com sucesso');
        } catch (\Exception $e) {
            dd($e);
            return redirect('provider/category')->with('error', 'Houve um erro ao cadastrar categoria');
        }
    }

    public function update($id, Request $request)
    {

        $newProviderCategory = $request->all();
        if (array_key_exists('active', $newProviderCategory)) {
            $newProviderCategory['active'] = true;
        } else {
            $newProviderCategory['active'] = false;
        }

        try {
            ProviderCategory::where('id', $id)->first()
                ->update($newProviderCategory);
            return redirect('provider/category')->with('status', 'Dados atualizados com sucesso');
        } catch (\Exception $e) {
            return redirect('provider/category')->with('error', 'Houve um erro ao atualizar os dados. Tente novamente mais tarde.');
        }
    }
}
