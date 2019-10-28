<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventCategory;

class EventCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getAll()
    {

        try {
            $categories = EventCategory::all();

            if (sizeOf($categories) > 0) {
                return view('eventCategory/categories', ['categoryData' => $categories]);
            } else {
                return view('eventCategory/categories', ['categoryData' => []]);
            }
        } catch (\Exception $e) {
            return view('eventCategory/categories', ['categoryData' => []]);
        }
    }

    public function create(Request $request)
    {


        $neweventEventCategory = $request->all();
        if (array_key_exists('active', $neweventEventCategory)) {
            $neweventEventCategory['active'] = true;
        } else {
            $neweventEventCategory['active'] = false;
        }

        try {

            EventCategory::create($neweventEventCategory);

            return redirect('event/category')->with('status', 'Categoria cadastrada com sucesso');
        } catch (\Exception $e) {

            return redirect('event/category')->with('error', 'Houve um erro ao cadastrar categoria');
        }
    }

    public function update($id, Request $request)
    {

        $newEventCategory = $request->all();
        if (array_key_exists('active', $newEventCategory)) {
            $newEventCategory['active'] = true;
        } else {
            $newEventCategory['active'] = false;
        }

        try {
            EventCategory::where('id', $id)->first()
                ->update($newEventCategory);
            return redirect('event/category')->with('status', 'Dados atualizados com sucesso');
        } catch (\Exception $e) {
            return redirect('event/category')->with('error', 'Houve um erro ao atualizar os dados. Tente novamente mais tarde.');
        }
    }
}
