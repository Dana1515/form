<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Форма</title>
    <link rel="stylesheet" href="/css/style.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
     @include('header')

    <div class="container">

        <div class="container text-center"> 
            <div class="row justify-content-center">    
                <form id="form" class="form mt-5 mb-6" action="/post" method="post">
                    <img src="images/lock-icon.png" class="lock-icon" style="display: none;"> 
                    <h1 class="fs-3 pt-3">Заполните форму</h1>
                    @csrf 
                    <div class="input-group mb-3 justify-content-center"> 
                        <div class="container container-input"> 
                            <label for="surname" class="label fs-5 col-xl-1 col-lg-1 col-md-2 col-sm-3 mt-3">Фамилия</label> 
                            <input type="text" id="surname" class="label-input col-xl-4 col-lg-4 col-md-5 col-sm-6" name="surname" maxlength="32" placeholder="Иванов" required> 
                        </div> 
                        <div class="container container-input" > 
                            <label for="name" class="label fs-5 col-xl-1 col-lg-1 col-md-2 col-sm-3 mt-2 ">Имя</label> 
                            <input type="text" id="name" class="label-input col-xl-4 col-lg-4 col-md-5 col-sm-6" name="name" minlength="2" maxlength="32" placeholder="Иван" required> 
                        </div> 
                        <div class="container container-input " > 
                            <label for="lastname" class="label fs-5 col-xl-1 col-lg-1 col-md-2 col-sm-3 mt-2 ">Отчество</label> 
                            <input type="text" id="lastname" class="label-input col-xl-4 col-lg-4 col-md-5 col-sm-6" name="lastname" maxlength="32" placeholder="Иванович" required> 
                        </div> 
                        <div class="container container-input"> 
                            <label for="email" class="label fs-5 col-xl-1 col-lg-1 col-md-2 col-sm-3  mt-2 " >email</label> 
                            <input type="email" id="email" class="label-input col-xl-4 col-lg-4 col-md-5 col-sm-6" name="email" placeholder="name@mail.ru" required> 
                        </div> 
                        <div class="container container-input"> 
                            <label for="phone" class=" label fs-5 col-xl-1 col-lg-1 col-md-2 col-sm-3  mt-2 ">Телефон</label> 
                            <input type="phone" id="phone" class="label-input col-xl-4 col-lg-4 col-md-5 col-sm-6" name="phone" placeholder="+7(___)___-__-__" maxlength="16"  required>   
                        </div> 
                        <div class="container container-input"> 
                            <label for="city" class="label fs-5 col-xl-1 col-lg-1 col-md-2 col-sm-3 mt-2">Город</label> 
                            <select id="city" class="label-input  col-xl-4 col-lg-4 col-md-5 col-sm-6" name="city"  required>
                                <option disabled selected value="">Выберите город</option> 
                                <option value="Тула">Тула</option> 
                                <option value="Санкт-Петербург">Санкт-Петербург</option> 
                                <option value="Москва">Москва</option> 
                            </select> 
                        </div> 
                        <div class="input-group-append col-xl-5 col-lg-5 col-md-7 col-sm-9 mt-2 mb-3 d-flex justify-content-center"> 
                            <button type="submit" class="btn btn-info ">Отправить</button> 
                        </div> 
                        
                    </div> 
                </form> 
            </div>  
        </div>
        
    </div>
    <script src="/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</body>
</html>