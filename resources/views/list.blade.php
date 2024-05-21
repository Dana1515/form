<?php

$datas = DB::select('SELECT * FROM leads');

class Lead extends \Illuminate\Database\Eloquent\Model {
    protected $table = 'leads';
    
}

$leads = Lead::all();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Список</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .form-select {
           width: 25%; 
        }
        @media(max-width:576px){
            .form-select {
           width: 50%; 
           }
           h1{
            font-size: 25px;
           }
        }
    </style>
</head>
<body>
    <header>
        @include('header')
    </header>
    <div class="container"> 
        <h1 class="text-center mt-5">Таблица данных</h1> 
        <div class="container"> 
            <div class="row"> 
                <div class="container col-xl-12  d-flex justify-content-between  mt-3"> 
                    <select class="form-select" id="citySelect" > 
                        <option value="all" selected>Все города</option> 
                        <option value="Тула">Тула</option> 
                        <option value="Санкт-Петербург">Санкт-Петербург</option> 
                        <option value="Москва">Москва</option> 
                    </select> 
                    <button id="exportBtn" class="btn btn-info">Экспорт в CSV</button>
                </div> 
            </div>   
        </div> 
        
        <table class="table mt-3" id="dataTable"> 
            <thead class="thead-dark"> 
                <tr> 
                    <th>id</th> 
                    <th>Имя</th> 
                    <th>Фамилия</th> 
                    <th>Отчество</th> 
                    <th>Email</th> 
                    <th>Телефон</th> 
                    <th>Город</th> 
                </tr> 
            </thead> 
            <tbody> 
                @foreach($leads as $lead)
                <tr class="lead-row" data-city="{{ $lead->city }}">
                    <td>{{ $lead->id }}</td>
                    <td>{{ $lead->surname }}</td>
                    <td>{{ $lead->name }}</td>
                    <td>{{ $lead->lastname }}</td>
                    <td>{{ $lead->email }}</td>
                    <td>{{ $lead->phone }}</td>
                    <td>{{ $lead->city }}</td>
                </tr>
            @endforeach
            </tbody> 
        </table> 
    </div>
    

<script>
    $(document).ready(function() {
    $('#citySelect').on('change', function() {
        let selectedCity = $(this).val();
        $('.lead-row').each(function() {
            if (selectedCity === 'all' || $(this).data('city') === selectedCity) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});

document.getElementById("exportBtn").addEventListener("click", function() {
    var selectedCity = document.getElementById("citySelect").value;
    
    // Отправляем AJAX запрос на сервер для экспорта данных
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/export-users?city=' + selectedCity, true);
    xhr.responseType = 'blob';
    
    xhr.onload = function() {
        if (this.status === 200) {
            var blob = new Blob([xhr.response], { type: 'text/csv' });
            var url = URL.createObjectURL(blob);
            var a = document.createElement('a');
            a.href = url;
            a.download = 'users.csv';
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
        }
    };
    
    xhr.send();
});

</script>
</body>

</html>