<?php

namespace App\Http\Controllers;

use App\Models\Expenditure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ExpenditureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Expenditure $o)
    {   
        $user = auth()->user();

        $expenditure = Expenditure::all()->where('user_id', $user->id)->toArray();

        return Inertia::render('Expenditure/Expenditure', 
            [
                'expenditure' => $expenditure,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $expenditure = new Expenditure;

        $expenditure->name = $request->name;
        $expenditure->due_date = $request->due_date;
        $expenditure->value = $request->value;
        $expenditure->status = $request->status;

        $user = auth()->user();
        $expenditure->user_id = $user->id;
        $expenditure->save();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function show(Expenditure $expenditure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function edit(Expenditure $expenditure)
    {
        return Inertia::render('Expenditure/Components/Update', ['expenditure' => $expenditure]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expenditure $expenditure)
    {
        $expenditure->name = $request->name;
        $expenditure->value = $request->value;
        $expenditure->due_date = $request->due_date;
        $expenditure->status = $request->status;
        $expenditure->save();

        return redirect()->route('expenditure.index')->with('message', 'Atualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expenditure $expenditure)
    {
        $expenditure->delete();
        sleep(1);

        return redirect()->route('expenditure.index')->with('message', 'Delete');
    }
}
