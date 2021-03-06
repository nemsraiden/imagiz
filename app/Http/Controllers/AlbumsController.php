<?php

namespace App\Http\Controllers;

use App\Albums;
use App\Http\Requests\AlbumsRequest;
use App\Http\Requests\PhotosRequest;
use App\Pictures;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Jenssegers\Date\Date;

class AlbumsController extends Controller
{



    public function __construct()
    {

        $this->middleware('auth');
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


        $picturesData = $album->pictures;

        $pictures = array();
        $i=0;
        foreach($picturesData as $picture){

            $pictures[$i]['big'] = $picture->directory.'/'.$picture->name;
            $pictures[$i]['thumb'] = $picture->directory.'/thumb2_'.$picture->name;
            $i++;
        }
        return view('albums.show',compact('album','pictures'));
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


    /**
     * Permet d'aficher la page d'ajout de photo
     *
     * @param  int  $id
     * @return View
     */
    public function photosAddView($id){
        $album = Albums::find($id);


        return view('albums.photos',compact('album'));
    }

    /**
     * Permet d'aficher la page d'ajout de photo
     *
     * @param  int  $id
     * @return View
     */
    public function photosAdd($id, PhotosRequest $photosrequest){

        $directory = '/uploads/photos/'.$id;

        if (!File::exists(public_path().$directory)){
            File::makeDirectory(public_path().$directory, 0775,true);
        }

        $files = $photosrequest->file('file');



        foreach ($files as $file) {

            $name = Auth::id().'_'.$id.'_'.str_slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),'-').rand(1000,9999);
            $name_thumb = 'thumb_'.$name;
            $name_thumb2 = 'thumb2_'.$name;
            $file_path = $name.'.'.$file->getClientOriginalExtension();

            $img = Image::make($file);
            $img->interlace();
            $img->save('uploads/photos/'.$id.'/' . $name .'.'. $file->getClientOriginalExtension());

            $img->fit(200, 200);
            $img->save('uploads/photos/'.$id.'/' . $name_thumb  .'.'. $file->getClientOriginalExtension());

            $img = Image::make($file);
            $img->resize(180, null, function($constraint){
                $constraint->aspectRatio();
            });
            $img->save('uploads/photos/'.$id.'/' . $name_thumb2  .'.'. $file->getClientOriginalExtension());

            $picture = new Pictures();

            $picture->name = $file_path;
            $picture->directory = $directory;
            $picture->albums_id = $id;

            $picture->save();
        }


        Session::flash('success', "Vos photos on été ajoutées à l'album");

        return redirect('/albums/'.$id);

    }
}
