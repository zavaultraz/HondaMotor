<?php

namespace App\Http\Controllers;

use App\Models\honda;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HondaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Honda-index';
        $honda = honda::latest()->paginate(5);
        return view('home.category.index', compact('title','honda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $title = 'Honda - Create';
    return view('home.category.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:220',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:2000',

        ]);
        $image=$request->file('image');
        $image->storeAs('public/category',$image->hashName());
        honda::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'image'=>$image->hashName(),
        ]);
        return redirect()->route('honda.index')->with('success', 'Mantap data Berhasil Di Tambahkan! 👍');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title='Category - edit';
        $honda = honda::findOrFail($id);
        return view('home.category.create',compact('title','honda'));
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
        $this->validate($request,[
            'name'=>'required|max:220',
            'image'=>'image|mimes:jpeg,png,jpg|max:2000',
        ]);
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
