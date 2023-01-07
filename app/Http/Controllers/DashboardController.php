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

        $expenditureTotal = Expenditure::all()->where('user_id', $user->id)->sum('value');
        $earningTotal = AddMoney::all()->where('user_id', $user->id)->sum('value');

        $expenditureCount = Expenditure::all()->where('user_id', $user->id)->count('id');
        $earningCount = AddMoney::all()->where('user_id', $user->id)->count('id');

        $SumValues = $earningTotal - $expenditureTotal;

        return Inertia::render('Dashboard',
            [
                'expenditureTotal' => $expenditureTotal,
                'earningTotal' => $earningTotal,
                'expenditureCount' => $expenditureCount,
                'earningCount' => $earningCount,
                'SumValues' => $SumValues,
            ]);
    }
}
