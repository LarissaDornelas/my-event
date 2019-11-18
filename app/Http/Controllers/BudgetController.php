<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Provider;
use App\ProviderCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function getBudget($id)
    {
        return view('event/budget/budgetTotal');
    }

    public function getEventProviders($id)
    {
        $eventProviders = DB::table('budget')
            ->join('provider', 'budget.provider_id', 'provider.id')
            ->join('providerCategory', 'budget.provider_category_id', 'providerCategory.id')
            ->select('budget.*', 'provider.name as providerName', 'providerCategory.name as providerCategoryName')
            ->where('event_id', $id)->get();

        $providers = Provider::where('active', 1)->get();
        $providerCategory = ProviderCategory::where('active', 1)->get();
        return view('event/providers/provider', ['providers' => $providers, 'providerCategory' => $providerCategory, 'eventProviders' => $eventProviders]);
    }

    public function addEventProvider($id, Request $request)
    {
        $data = $request->except('_token');
        $data['value'] = str_replace('.', '', $data['value']);
        $data['value'] = str_replace(',', '', $data['value']);
        $data['event_id'] = $id;
        if (array_key_exists('paid', $data)) {
            $data['paid'] = true;
        } else {
            $data['paid'] = false;
        }
        try {
            Budget::create($data);
            return redirect('/event/' . $id . '/provider')->with('status', 'Fornecedor adicionado ao evento.');
        } catch (\Exception $ex) {
            dd($ex);
            return redirect('/event/' . $id . '/provider')->with('error', 'Ocorreu um erro ao adicionar fornecedor. Tente novamente mais tarde.');
        }
    }

    public function updateEventProvider($id, $providerId, Request $request)
    {

        $data = $request->except(['_token', '_method']);
        $data['value'] = str_replace('.', '', $data['value']);
        $data['value'] = str_replace(',', '', $data['value']);

        if (array_key_exists('paid', $data)) {
            $data['paid'] = true;
        } else {
            $data['paid'] = false;
        }
        try {
            Budget::where('id', $providerId)->update($data);
            return redirect('/event/' . $id . '/provider')->with('status', 'Pagamento atualizado.');
        } catch (\Exception $ex) {
            dd($ex);
            return redirect('/event/' . $id . '/provider')->with('error', 'Ocorreu um erro ao atualizar pagamento. Tente novamente mais tarde.');
        }
    }



    public function deleteEventProvider($idEvent, Request $request)
    {

        try {
            Budget::where([['event_id', $idEvent], ['id', $request->provider]])->delete();
            return redirect('event/' .  $idEvent . '/provider')->with('status', 'Fornecedor removido com sucesso');
        } catch (\Exception $e) {

            return redirect('event/' .  $idEvent . '/provider')->with('error', 'Ocorreu um erro ao remover fornecedor. Tente novamente mais tarde.');
        }
    }
}
