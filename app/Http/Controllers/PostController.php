<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function Submit(PostRequest $req)
    {
        $ip = $req->ip();
        $key = 'request_count_' . $ip;
        $hourlyKey = 'hourly_limit_' . $ip;
    
        if (!Cache::has($key)) {
            Cache::put($key, 1, now()->addHour());
        } else {
            $count = Cache::increment($key);
    
            if ($count > 5) {
                if (!Cache::has($hourlyKey)) {
                    Cache::add($hourlyKey, 1, now()->addHours(2));
                } else {
                    Cache::increment($hourlyKey);
                }
    
                if (Cache::get($hourlyKey) > 1) {
                    Cache::put('blocked_' . $ip, true, now()->addHours(2));
                    return view('error');
                }
            }
        }

        if (Cache::has('blocked_' . $ip)) {
            return view('error');
        }

    $surname = $req->surname;
    $name = $req->name;
    $lastname = $req->lastname;
    $email = $req->email;
    $phone = $req->phone;
    $city = $req->city;

   
        DB::table('leads')->insert([
            'ip' => $ip,
            'surname' => $surname,
            'name' => $name,
            'lastname' => $lastname,
            'email' => $email,
            'phone' => $phone,
            'city' => $city,
            'created_at' => now()
        ]);
  
    return view('post');
    

      
    }
}
