<?php

namespace App\Http\Controllers;

use App\Models\AddMoney;
use App\Models\Expenditure;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AddMoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = auth()->user();

        $earning = AddMoney::all()->where('user_id', $user->id)->toArray();

        return Inertia::render('Earning/Index', ['earning' => $earning]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $earning = new AddMoney();

        $earning->name = $request->name;
        $earning->value = $request->value;

        $user = auth()->user();
        $earning->user_id = $user->id;
        $earning->save();
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
    public function edit(AddMoney $earning)
    {
        return Inertia::render('Earning/Components/Update', ['earning' => $earning]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AddMoney $earning)
    {
        $earning->name = $request->name;
        $earning->value = $request->value;
        $earning->save();

        return redirect()->route('earning.index')->with('message', 'Atualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function destroy(AddMoney $earning)
    {
        $earning->delete();
        sleep(1);

        return redirect()->route('earning.index')->with('message', 'Delete');
    }
}
