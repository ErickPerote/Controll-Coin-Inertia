<?php

namespace App\Http\Controllers;

use App\Models\AddMoney;
use App\Models\Expenditure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $expenditureTotal = Expenditure::all()->where('user_id', $user->id)->where('status', 0)->sum('value');
        $earningTotal = AddMoney::all()->where('user_id', $user->id)->sum('value');

        $expenditureCountPayed = Expenditure::all()->where('user_id', $user->id)->where('status', 1)->count('id');
        $expenditurePayed = Expenditure::all()->where('user_id', $user->id)->where('status', 1)->sum('value');

        $SumValues = $earningTotal - $expenditurePayed;
        $Simulate = $SumValues - $expenditureTotal;

        $date = Carbon::now();

        $due_date = Expenditure::all()->where('user_id', $user->id)->where('due_date', '<', $date)->where('status', 0)->toArray();

        return Inertia::render('Dashboard',
            [
                'expenditureTotal' => $expenditureTotal,
                'earningTotal' => $earningTotal,
                'expenditureCountPayed' => $expenditureCountPayed,
                'expenditurePayed' => $expenditurePayed,
                'Simulate' => $Simulate,
                'SumValues' => $SumValues,
                'due_date' => $due_date
            ]);
    }

}
