<?php

namespace App\Http\Controllers;

use App\Annonce;
use Illuminate\Http\Request;
use App\Http\Requests\AnnonceStore;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AnnonceController extends Controller
{
    use RegistersUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annonces = DB::table('annonces')->orderBy('created_at','desc')->paginate(9);
        return view('annonce.index', compact('annonces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('annonce.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnonceStore $request)
    {
        $validated = $request-> validated();

        if (!Auth::check()) {
            
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required| confirmed',
                'password_confirmation' => 'required'
            ]);

            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);

            //pour connecter l'utilisateur dès qu'il se login 
            $this->guard()->login($user);
        }


        $annonce = new Annonce();
        $annonce->title = $validated['title'];
        $annonce->description = $validated['description'];
        $annonce->localisation = $validated['localisation'];
        $annonce->price = $validated['price'];
        $annonce->user_id = auth()->user()->id;

        $annonce->save();

        return redirect()->route('annonce.index')->with('success', 'Votre annonce a bie été créée');

    }

    public function search(Request $request)
    {
        $words = $request->words;

        $annonces= DB::table('annonces')
        ->where('title', 'LIKE', "%$words%")
        ->orWhere('description', 'LIKE', "%$words%")
        ->orderBy('created_at', 'desc')
        ->get();

        return response()->json(['success' => true, 'annonces' => $annonces]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
