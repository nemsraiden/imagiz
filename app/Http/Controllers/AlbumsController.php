<?php

namespace App\Http\Controllers;

use App\Albums;
use App\Http\Requests\AlbumsRequest;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Jenssegers\Date\Date;

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

        return view('albums.create')->with(compact('listYear','listMonth'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(AlbumsRequest $albumsRequest)
    {
        $album = new Albums;

        $album->nom = $albumsRequest->input('nom');
        $album->description = $albumsRequest->input('description');
        $album->annee = $albumsRequest->input('annee');
        $album->mois = $albumsRequest->input('mois');
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

        $date = new Date('now', 'Europe/Brussels');

        $date->month = $album->mois+1;

        $album->mois =  $date->format('F');

        $proprietaire = User::find($album->ID_proprietaire);

        $album->proprietaire_nom = $proprietaire->first_name. ' ' .$proprietaire->last_name. ' (Propriétaire)';

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
        $album = Albums::find($id);

        $listYear = [];
        $year = Date('Y');

        for($i=0;$i<20;$i++){
            $listYear[$year] = $year;
            $year--;
        }

        $listMonth = ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'];


        return view('albums.edit',compact('album','listYear','listMonth'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(AlbumsRequest $albumsRequest, $id)
    {
        $album = Albums::find($id);

        $album->update($albumsRequest->only('nom','description','annee','mois'));

        Session::flash('success', "L'album a été correctement modifié");

        return redirect('/albums/'.$album->id);
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
