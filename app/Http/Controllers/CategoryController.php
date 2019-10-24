<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getAll()
    {

        try {
            $categories = Category::all();

            if (sizeOf($categories) > 0) {
                return view('category/categories', ['categoryData' => $categories]);
            } else {
                return view('category/categories', ['categoryData' => []]);
            }
        } catch (\Exception $e) {
            return view('category/categories', ['categoryData' => []]);
        }
    }

    public function create(Request $request)
    {


        $newcategory = $request->all();
        if (array_key_exists('active', $newcategory)) {
            $newcategory['active'] = true;
        } else {
            $newcategory['active'] = false;
        }

        try {

            Category::create($newcategory);

            return redirect('/category')->with('status', 'Categoria cadastrada com sucesso');
        } catch (\Exception $e) {

            return redirect('/category')->with('error', 'Houve um erro ao cadastrar categoria');
        }
    }

    /*
    public function getOne($id)
    {


        try {
            $category = category::where('id', $id)->first();
            if ($category != null) {
                return view('category/categoryDetails', ['categoryData' => $category]);
            } else {
                return redirect('/categories')->with('error', 'Houve um erro ao abrir usuário');
            }
        } catch (\Exception $e) { }
    }



    public function update($id, Request $request)
    {
        $newcategory = $request->all();
        if (array_key_exists('active', $newcategory)) {
            $newcategory['active'] = true;
        } else {
            $newcategory['active'] = false;
        }
        if (array_key_exists('admin', $newcategory)) {
            $newcategory['admin'] = true;
        } else {
            $newcategory['admin'] = false;
        }
        try {
            category::where('id', $id)->first()
                ->update($newcategory);
            return redirect('/categories/' . $id)->with('status', 'Dados atualizados com sucesso');
        } catch (\Exception $e) {
            return redirect('/categories/' . $id)->with('error', 'Houve um erro ao atualizar os dados. Tente novamente mais tarde.');
        }
    }

    public function delete($id)
    {
        try {
            $category = category::where('id', $id)->first()->delete();
        } catch (\Exception $e) { }
    }*/
}
