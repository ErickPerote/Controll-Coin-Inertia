<?php

namespace App\Http\Controllers;

use App\Models\AddMoney;
use App\Models\Expenditure;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index() 
    {
        $user = auth()->user();

        $expenditureTotal = Expenditure::all()->where('user_id', $user->id)->where('status', 0)->sum('value');
        $earningTotal = AddMoney::all()->where('user_id', $user->id)->sum('value');

        $expenditureCount = Expenditure::all()->where('user_id', $user->id)->where('status', 0)->count('id');
        //$earningCount = AddMoney::all()->where('user_id', $user->id)->count('id');

        $expenditureCountPayed = Expenditure::all()->where('user_id', $user->id)->where('status', 1)->count('id');
        $expenditurePayed = Expenditure::all()->where('user_id', $user->id)->where('status', 1)->sum('value');


        $SumValues = $earningTotal - $expenditurePayed;

        return Inertia::render('Dashboard',
            [
                'expenditureTotal' => $expenditureTotal,
                'earningTotal' => $earningTotal,
                'expenditureCount' => $expenditureCount,
                'expenditureCountPayed' => $expenditureCountPayed,
                'expenditurePayed' => $expenditurePayed,
                //'earningCount' => $earningCount,
                'SumValues' => $SumValues,
            ]);
    }
}
