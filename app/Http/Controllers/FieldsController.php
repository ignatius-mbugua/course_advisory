<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Field;
use App\Personality;

class FieldsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adminuser', ['except'=>'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fields = Field::all();
        return view('admin.fields.index', ['fields'=>$fields]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $personalities = Personality::all();
        return view('admin.fields.create', ['personalities'=>$personalities]);
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
            'name'=>'required',
            'personalities'=>'required',
            'field_image'=>'image|mimes:jpg,png,jpeg|nullable|max:2048'
        ]);
        
        $personalities_id = array();
        $personalities = $request->personalities;
        foreach($personalities as $index => $personality){
            $personal = Personality::where('name', $personality)->firstOrFail();
            $personalities_id[$index] = $personal->id;
        }

        //Handle file upload
        if($request->hasFile('field_image')){
            //get filename with extension
            $file_name_with_ext = $request->file('field_image')->getClientOriginalName();
            //get the filename
            $filename = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
            //get the file extension
            $extension = $request->file('field_image')->getClientOriginalExtension();
            //file name to store
            $file_name_to_store = $filename.'_'.time().'.'.$extension;
            //upload image
            if(Storage::exists('public/images/fields')){
                $path = $request->file('field_image')->storeAs('public/images/fields/', $file_name_to_store);
            }
            else{
                Storage::makeDirectory('public/images/fields');
                $path = $request->file('field_image')->storeAs('public/images/fields/', $file_name_to_store);
            }
        }
        else{
            $file_name_to_store = 'no_image.jpg';
        }

        //save to database
        $field = new Field;
        $field->name = $request->input('name');
        $field->image_name = $file_name_to_store;
        $field->save();
        $field->personalities()->sync($personalities_id);

        return redirect('/fields')->with('success', 'Field created');
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
        $field = Field::findOrFail($id);
        return view('fields.field_courses', ['field'=>$field]);
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
        $field = Field::findOrFail($id);
        $personalities = Personality::all();
        return view('admin.fields.edit', ['field'=>$field, 'personalities'=>$personalities]);
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
            'name'=>'required',
            'personalities'=>'required',
            'field_image'=>'image|mimes:jpg,png,jpeg|nullable|max:2048'
        ]);
        
        $personalities_id = array();
        $personalities = $request->personalities;
        foreach($personalities as $index => $personality){
            $personal = Personality::where('name', $personality)->firstOrFail();
            $personalities_id[$index] = $personal->id;
        }

        //Handle file upload
        if($request->hasFile('field_image')){
            //get filename with extension
            $file_name_with_ext = $request->file('field_image')->getClientOriginalName();
            //get the filename
            $filename = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
            //get the file extension
            $extension = $request->file('field_image')->getClientOriginalExtension();
            //file name to store
            $file_name_to_store = $filename.'_'.time().'.'.$extension;
            //upload image
            if(Storage::exists('public/images/fields')){
                $path = $request->file('field_image')->storeAs('public/images/fields/', $file_name_to_store);
            }
            else{
                Storage::makeDirectory('public/images/fields');
                $path = $request->file('field_image')->storeAs('public/images/fields/', $file_name_to_store);
            }
        }

        $field = Field::findOrFail($id);
        $field->name = $request->input('name');
        if($request->hasFile('field_image')){
            if($field->image_name != 'no_image.jpg'){
                //Delete Image
                Storage::delete('public/images/fields/'.$field->image_name);
            }
            $field->image_name = $file_name_to_store;
        }
        $field->save();
        $field->personalities()->sync($personalities_id);

        return redirect('/fields')->with('success', 'Field updated');
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
        $field = Field::findOrFail($id);
        if($field->image_name != 'no_image.jpg'){
            //Delete Image
            Storage::delete('public/images/fields/'.$field->image_name);
        }
        $field->delete();
        return redirect('/fields')->with('success', 'Field deleted');
    }
}
