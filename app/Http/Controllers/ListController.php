<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Lead;


class ListController extends Controller
{
    public function list(){
        return view('list');
    }

    public function filterByCity(Request $request)
{
      $selectedCity = $request->city;
      $filteredLeads = Lead::where('city', $selectedCity)->get();
      return response()->json($filteredLeads);
}


    public function exportUsers(Request $request) {
        $selectedCity = $request->query('city');
        if($selectedCity === 'all') {
            $leads = Lead::all();
        } else {
            $leads = Lead::where('city', $selectedCity)->get();
        }
        
        $fileName = 'users.csv';
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );
        
        $file = fopen('php://output', 'w');
        fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
        fputcsv($file, array('id', 'Имя', 'Фамилия', 'Отчество', 'Электронная почта', 'Телефон', 'Город'));
        
        foreach ($leads as $lead) {
            fputcsv($file, array($lead->id, $lead->name, $lead->surname, $lead->lastname, $lead->email, $lead->phone, $lead->city));
        }
        
        fclose($file);
        
        return response()->stream(function() use($file) {
            echo $file;
        }, 200, $headers);
    }
      
}


