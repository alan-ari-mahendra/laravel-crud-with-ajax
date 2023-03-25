<?php

namespace App\Http\Controllers;

use App\Models\M_Crud;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    public function read()
    {
        $data = M_Crud::all();
        return view('read')->with([
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data['name'] = $request->name;
        M_Crud::insert($data);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = M_Crud::findOrFail($id);
        return view('edit')->with([
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = M_Crud::findOrFail($id);
        $data->name = $request->name;
        $data->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = M_Crud::findOrFail($id);
        $data->delete();
    }

    public function deleted()
    {
        $data = M_Crud::onlyTrashed()->get();

        return view('deleted', compact('data'));
    }

    public function restore($id)
    {
        $data = M_Crud::withTrashed()->findOrFail($id);
        $data->restore();

        return redirect('home')
            ->with('success_message', 'Pengguna berhasil dikembalikan.');
    }
}
