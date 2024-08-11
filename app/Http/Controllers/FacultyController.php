<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use Illuminate\Support\Str;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculty = Faculty::getAllFaculty();
        // return $faculty;
        return view('backend.faculty.index')->with('faculties', $faculty);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.faculty.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'name' => 'string|required',
            'status' => 'required|in:active,inactive',
        ]);
        $data = $request->all();
        // return $data;   
        $status = Faculty::create($data);
        if ($status) {
            request()->session()->flash('success', 'Faculty successfully added');
        } else {
            request()->session()->flash('error', 'Error occurred, Please try again!');
        }
        return redirect()->route('faculty.index');
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
        $faculty = Faculty::findOrFail($id);
        return view('backend.faculty.edit')->with('faculty', $faculty);
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
        // return $request->all();
        $faculty = Faculty::findOrFail($id);
        $this->validate($request, [
            'name' => 'string|required',
            'status' => 'required|in:active,inactive',
        ]);
        $data = $request->all();
        // return $data;
        $status = $faculty->fill($data)->save();
        if ($status) {
            request()->session()->flash('success', 'Faculty successfully updated');
        } else {
            request()->session()->flash('error', 'Error occurred, Please try again!');
        }
        return redirect()->route('faculty.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faculty = Faculty::findOrFail($id);
        $status = $faculty->delete();

        if ($status) {
            request()->session()->flash('success', 'Faculty successfully deleted');
        } else {
            request()->session()->flash('error', 'Error while deleting faculty');
        }
        return redirect()->route('faculty.index');
    }
}
