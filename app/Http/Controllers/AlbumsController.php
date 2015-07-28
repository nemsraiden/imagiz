<?php

namespace App\Http\Controllers;

use App\Albums;
use App\Http\Requests\AlbumsRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AlbumsController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'destroy', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $albums = Albums::where('ID_proprietaire', '=', Auth::user()->id)->get();


        return view('albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $listYear = [];
        $year = Date('Y');

        for($i=0;$i<20;$i++){
            $listYear[$year] = $year;
            $year--;
        }

        $listMonth = ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'];

        $this->middleware('Authenticate');

        return view('albums.create')->with(compact('listYear','listMonth'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request, AlbumsRequest $albumsRequest)
    {
        $album = new Albums;

        $album->nom = $request->input('nom');
        $album->description = $request->input('description');
        $album->annee = $request->input('annee');
        $album->mois = $request->input('mois');
        $album->ID_proprietaire = Auth::user()->id;

        $album->save();

        Session::flash('success', "Votre nouveau album a été créé !");

        return redirect('/albums');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $album = Albums::find($id);

        return view('albums.show',compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
