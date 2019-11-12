<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function getBudget($id)
    {
        return view('event/budget/budgetTotal');
    }
}
