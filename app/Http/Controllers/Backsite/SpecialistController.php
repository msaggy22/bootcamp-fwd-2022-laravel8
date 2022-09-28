<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// use library here
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

use App\Http\Requests\Specialist\StoreSpecialistRequest;
use App\Http\Requests\Specialist\UpdateSpecialistRequest;

// use everything here
use Illuminate\Support\Facades\Gate;
use Auth;

// use model here
use App\Models\MasterData\Specialist;

// third party

class SpecialistController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('specialist_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specialist = Specialist::orderBy('created_at', 'desc')->get();

        return view('pages.backsite.master-data.specialist.index', compact('specialist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpecialistRequest $request)
    {   
        //get all request from fronsite
        $data = $request->all();

        //store to database
        $specialist = Specialist::create($data);
        
        alert()->succes('Succes Message', 'Successfully added new Specialist');
        return redirect()->route('backsite.specialist.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Specialist $specialist)
    {
        abort_if(Gate::denies('specialist_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.master-data.specialist.show', compact('specialist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialist $specialist)
    {
        abort_if(Gate::denies('specialist_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.master-data.specialist.edit', compact('specialist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecialistRequest $request, Specialist $specialist)
    {
        //get all request from fronsite
        $data = $request->all();

        //store to database
        $specialist->update($data);
        
        alert()->succes('Succes Message', 'Successfully updated Specialist');
        return redirect()->route('backsite.specialist.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialist $specialist)
    {
        $specialist->forceDelete();
        
        alert()->succes('Succes Message', 'Successfully deleted Specialist');
        return back();
    }
}
