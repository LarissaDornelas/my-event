<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\EventCategory;
use App\EventHasUser;
use App\User;
use Carbon\Carbon;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAll()
    {
        try {
            if (Session::get('admin')[0]) {
                $events = DB::table('event')->join('eventCategory', 'event.eventCategory_id', '=', 'eventCategory.id')
                    ->select('event.*', 'eventCategory.name as eventCategoryName')
                    ->where('event.completed', 0)
                    ->orderBy('date')->get();

                $eventCategories = EventCategory::where('active', 1)->get();
            } else {
                $id = Auth::user()->id;
                $events = DB::table('event_has_user')
                    ->join('event', 'event_has_user.event_id', '=', 'event.id')
                    ->join('eventCategory', 'event.eventCategory_id', '=', 'eventCategory.id')
                    ->select('event.*', 'eventCategory.name as eventCategoryName')->where('event_has_user.user_id', $id)
                    ->where('event.completed', 0)
                    ->orderBy('date')->get();

                $eventCategories = [];
            }
            if (sizeOf($events) > 0) {
                return view('event/events', ['eventData' => $events, 'eventCategories' => $eventCategories]);
            } else {
                return view('event/events', ['eventData' => [],  'eventCategories' => $eventCategories]);
            }
        } catch (\Exception $e) {

            return view('event/events', ['eventData' => [], 'eventCategories' => []]);
        }
    }


    public function getCompleted()
    {
        try {
            if (Session::get('admin')[0]) {
                $events = DB::table('event')->join('eventCategory', 'event.eventCategory_id', '=', 'eventCategory.id')
                    ->select('event.*', 'eventCategory.name as eventCategoryName')
                    ->where('event.completed', 1)
                    ->orderBy('date')->get();
            } else {
                $id = Auth::user()->id;
                $events = DB::table('event_has_user')
                    ->join('event', 'event_has_user.event_id', '=', 'event.id')
                    ->join('eventCategory', 'event.eventCategory_id', '=', 'eventCategory.id')
                    ->select('event.*', 'eventCategory.name as eventCategoryName')->where('event_has_user.user_id', $id)
                    ->where('event.completed', 1)
                    ->orderBy('date')->get();

                $eventCategories = [];
            }
            if (sizeOf($events) > 0) {
                return view('event/completedEvents', ['eventData' => $events]);
            } else {
                return view('event/completedEvents', ['eventData' => [],  'eventCategories' => $eventCategories]);
            }
        } catch (\Exception $e) {

            return view('event/completedEvents', ['eventData' => [], 'eventCategories' => []]);
        }
    }

    public function getOne($id)
    {
        try {
            $event = Event::where('id', $id)->first();

            $dateNow = Carbon::now();
            $dateEvent = Carbon::parse($event->date);
            $wait = (string) $dateNow->diffInDays($dateEvent);
            $wait = str_split($wait);
            if (Session::get('admin')[0]) {


                return view('event/eventDetail', ['eventData' => $event, 'days' => $wait]);
            } else {
                $exists = EventHasUser::where([['event_id', $id], ['user_id', Auth::user()->id]])->get();

                if (sizeOf($exists) > 0) {
                    return view('event/eventDetail', ['eventData' => $event, 'days' => $wait]);
                } else {
                    return redirect('/event')->with('error', 'Permissão necessária para acessar este evento.');
                }
            }
        } catch (\Exception $e) {

            return redirect('/event')->with('error', 'Falha ao abrir evento. Tente novamente mais tarde');
        }
    }

    public function create(Request $request)
    {
        if (Session::get('admin')[0]) {

            $user = User::where('email', $request->account)->get();

            if (sizeOf($user) > 0) {
                $imageName = 'no-image.png';
                if ($request->image) {
                    $request->validate([
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);
                    $imageName = time() . '.' . $request->image->getClientOriginalExtension();

                    $request->image->move(public_path('images'), $imageName);
                }
                $newEvent = $request->except('image', 'account');
                $newEvent['image_url'] = $imageName;
                $newEvent['completed'] = 0;
                try {
                    $event = Event::create($newEvent);

                    EventHasUser::create([
                        'user_id' => $user[0]->id,
                        'event_id' => $event->id
                    ]);

                    return redirect('/event')->with('status', 'Evento cadastrado com sucesso');
                } catch (\Exception $e) {
                    dd($e);
                    return redirect('/event')->with('error', 'Falha ao cadastrar evento');
                }
            } else {
                return redirect('/event')->with('error', 'Email não existente no sistema.');
            }

            return redirect('/event')->with('error', 'Permissão necessária para cadastrar eventos.');
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
            if (Session::get('admin')[0]) {

                return view('event/settings/eventSettings', ['usersData' => $users->except('password'), 'eventData' => $event[0], 'eventCategories' => $eventCategories]);
            } else {
                $exists = EventHasUser::where([['event_id', $id], ['user_id', Auth::user()->id]])->get();

                if (sizeOf($exists) > 0) {
                    return view('event/settings/eventSettings', ['usersData' => $users->except('password'), 'eventData' => $event[0], 'eventCategories' => $eventCategories]);
                } else {
                    return redirect('/event')->with('error', 'Permissão necessária para acessar este evento.');
                }
            }
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
                $existsAccount = EventHasUser::where([['user_id', $user->id], ['event_id', $id]])->get();
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


        $event = $request->except(['image', '_token']);

        $event['completed'] = 0;
        if ($request->completed) {
            $event['completed'] = 1;
        }

        if ($request->image) {
            try {
                $imageNow = Event::select('image_url')->where('id', $id)->get();

                unlink(public_path() . '/images/' . $imageNow[0]->image_url);
            } catch (\Exception $e) {

                return redirect('event/' .  $id . '/settings');
            }

            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();

            $request->image->move(public_path('images'), $imageName);
            $event['image_url'] = $imageName;
        }

        try {
            Event::where('id', $id)->update($event);
            return redirect('event/' .  $id . '/settings');
        } catch (\Exception $e) {

            return redirect('event/' .  $id . '/settings');
        }
    }
}
