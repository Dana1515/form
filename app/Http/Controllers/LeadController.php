<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;

class LeadController extends Controller
{
    public function filterLeads(Request $request)
    {
        $city = $request->city;


        // Обращение к модели Lead для получения данных в зависимости от выбранного города
        $leads = Lead::where('city', $city)->get();
       

        return view('leads.table', compact('leads')); // Вернуть представление с данными для обновления таблицы
    }
    
}


