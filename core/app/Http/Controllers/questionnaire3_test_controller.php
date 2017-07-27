<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\StageProgressController;
use App\Questionnaire3Test;

class questionnaire3_test_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
//        dd(request() -> all ());
        
        $post = new Questionnaire3Test;

        //validaiton:
        $this -> validate($request, [
            'gender' => 'required',
            'searchSource' => 'required',
            'language' => 'required',
            'searchTasks' => 'required',
            'collegeYear' => 'required',

            'search_sources_v2' => 'required',
            'task_difficulty' => 'required'
        ]);

        $post -> gender = request("gender");
        $post -> searchSource = implode(',', array_values(request("searchSource")));

        $post -> language = request("language");

        $post -> searchTasks = request("searchTasks");

        $post -> collegeYear = request("collegeYear");
        
        $post -> search_sources_v2 = implode(',', request('search_sources_v2'));

        $post -> task_difficulty = request("task_difficulty");

        //add here

        $post -> save();

        return redirect('/stages/next');
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
