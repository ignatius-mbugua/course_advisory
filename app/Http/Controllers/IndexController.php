<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Index;
use App\Subject;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $indices = Index::all();
        return view('admin.indices.index', ['indices'=>$indices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $subjects = Subject::all();
        return view('admin.indices.create', ['subjects'=>$subjects]);
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
        $this->validate($request, [
            'index_no' => 'required',
            'points' => 'required',
            'subjects'=>'required'
        ]);

        $subjects_id = array();
        $subjects = $request->subjects;
        foreach($subjects as $index => $subject){
            $subj = Subject::where('name', $subject)->firstOrFail();
            $subjects_id[$index] = $subj->id;
        }

        $index = new Index;
        $index->index_no = $request->input('index_no');
        $index->point = $request->input('points');
        $index->save();
        $index->subjects()->sync($subjects_id);

        return redirect('/indices')->with('success', 'Index number added');
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
        $index = Index::find($id);
        $subjects = Subject::all();
        return view('admin.indices.edit', ['subjects'=>$subjects, 'index'=>$index]);
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
        $this->validate($request, [
            'index_no' => 'required',
            'points' => 'required',
            'subjects'=>'required'
        ]);

        $subjects_id = array();
        $subjects = $request->subjects;
        foreach($subjects as $index => $subject){
            $subj = Subject::where('name', $subject)->firstOrFail();
            $subjects_id[$index] = $subj->id;
        }

        $index = Index::find($id);
        $index->index_no = $request->input('index_no');
        $index->point = $request->input('points');
        $index->save();
        $index->subjects()->sync($subjects_id);

        return redirect('/indices')->with('success', 'Index number updated');
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
        $index = Index::find($id);
        $index->delete();
        return redirect('/indices')->with('success', 'Index Number deleted');
    }
}
