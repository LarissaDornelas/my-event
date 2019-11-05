<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\EventCategory;
use App\EventHasUser;
use App\User;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAll()
    {

        try {
            $events = DB::table('event')->join('eventCategory', 'event.eventCategory_id', '=', 'eventCategory.id')
                ->select('event.*', 'eventCategory.name as eventCategoryName')
                ->orderBy('date')->get();
            $eventCategories = EventCategory::where('active', 1)->get();

            if (sizeOf($events) > 0) {
                return view('event/events', ['eventData' => $events, 'eventCategories' => $eventCategories]);
            } else {
                return view('event/events', ['eventData' => [],  'eventCategories' => $eventCategories]);
            }
        } catch (\Exception $e) {

            return view('event/events', ['eventData' => [], 'eventCategories' => []]);
        }
    }

    public function getOne($id)
    {
        $event = Event::where('id', $id)->first();

        return view('event/eventDetail', ['eventData' => $event]);
    }

    public function create(Request $request)
    {

        $imageName = 'no-image.png';
        if ($request->image) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();

            $request->image->move(public_path('images'), $imageName);
        }
        $newEvent = $request->except('image');
        $newEvent['image_url'] = $imageName;
        $newEvent['completed'] = 0;
        try {
            Event::create($newEvent);

            return redirect('/event')->with('status', 'Evento cadastrado com sucesso');
        } catch (\Exception $e) {

            return redirect('/event')->with('error', 'Falha ao cadastrar evento');
        }
    }

    public function viewSettings($id)
    {

        try {


            $users = DB::table('event_has_user')
                ->join('user', 'event_has_user.user_id', '=', 'user.id')->select('*', 'user.name as userName')->where('event_id', $id)->get();
            $event = DB::table('event')->join('eventCategory', 'event.eventCategory_id', '=', 'eventCategory.id')
                ->select('event.*', 'eventCategory.name as eventCategoryName')
                ->where('event.id', $id)->get();
            $eventCategories = EventCategory::where('active', 1)->get();

            return view('event/settings/eventSettings', ['usersData' => $users->except('password'), 'eventData' => $event[0], 'eventCategories' => $eventCategories]);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function addAccountToEvent($id, Request $request)
    {

        try {
            $user = User::where('email', $request->account)->get();

            if (sizeOf($user) > 0) {
                $user = $user[0];
                $existsAccount = EventHasUser::where('user_id', $user->id)->get();
                if (sizeOf($existsAccount) == 0) {
                    EventHasUser::create([
                        'user_id' => $user->id,
                        'event_id' => $id
                    ]);
                    return redirect('event/' . $id . '/settings')->with('status', 'Conta integrado com sucesso');
                }
                return redirect('event/' . $id . '/settings')->with('error', 'Conta já integrada ao evento');
            }
            return redirect('event/' . $id . '/settings')->with('error', 'Conta não existente');
        } catch (\Exception $e) {
            return redirect('event/' . $id . '/settings')->with('errorType', 'Erro ao integrar contas. Tente novamente mais tarde');
        }
    }

    public function deleteAccountFromEvent($idEvent, Request $request)
    {


        try {
            EventHasUser::where([['event_id', $idEvent], ['user_id', $request->account]])->delete();
            return redirect('event/' .  $idEvent . '/settings')->with('status', 'Conta removida com sucesso');
        } catch (\Exception $e) {

            return redirect('event/' . $idEvent . '/settings')->with('errorType', 'Erro ao remover conta. Tente novamente mais tarde');
        }
    }

    public function update($id, Request $request)
    {
        /*if ($request->image) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();

            $request->image->move(public_path('images'), $imageName);
        }
        $newEvent = $request->except('image');
        $newEvent['image_url'] = $imageName;
        $newEvent['completed'] = 0; */

        $event = $request->except("_token");
        try {
            Event::where('id', $id)->update($event);
            return redirect('event/' .  $id . '/settings');
        } catch (\Exception $e) {
            dd($e);
            return redirect('event/' .  $id . '/settings');
        }
    }
}
