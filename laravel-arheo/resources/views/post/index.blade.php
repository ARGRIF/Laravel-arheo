@extends('layouts.app')

@section('content')



    <div class=" no-gutters py-4 p-4 bg-body-dark">
        <div class="">
            <form>

                <div class="form-row ">

                    <div class="form-group col-1 px-2">
                        <label for="inputState">Район</label>
                        <select id="inputState" class="form-control">
                            <option selected></option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group col-2 px-2">
                        <label for="inputState">Населений пункт</label>
                        <select id="inputState" class="form-control">
                            <option selected></option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group col-2 px-2">
                        <label for="inputState">Культурна принадлежність</label>
                        <select id="inputState" class="form-control">
                            <option selected></option>
                            <option>...</option>
                        </select>
                    </div>

                    <div class="form-group col-2 px-2">
                        <label for="inputState">Топографія</label>
                        <select id="inputState" class="form-control">
                            <option selected></option>
                            <option>...</option>
                        </select>
                    </div>

                    <div class="form-group col-2 px-2">
                        <label for="inputState">Площа</label>
                        <select id="inputState" class="form-control">
                            <option selected></option>
                            <option>...</option>
                        </select>
                    </div>

                    <div class="form-group col-2 align-self-end px-2">
                        <div class="input-group ">
                            <label>
                                <input type="text" class="form-control" placeholder="Search this blog">
                            </label>
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-2 px-2">
                        <label for="inputState">Знахідки</label>
                        <select id="inputState" class="form-control">
                            <option selected></option>
                            <option>...</option>
                        </select>
                    </div>


                    <div class="form-group col-3 px-2">
                        <label for="inputState">Відкривач</label>
                        <select id="inputState" class="form-control">
                            <option selected></option>
                            <option>...</option>
                        </select>
                    </div>

                    <div class="form-group col-3 px-2">
                        <label for="inputState">Особи причетні</label>
                        <select id="inputState" class="form-control">
                            <option selected></option>
                            <option>...</option>
                        </select>
                    </div>


                    <div class="form-group col-2 px-2 align-self-end">

                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>

                </div>

            </form>
        </div>
    </div>

    <div class="row no-gutters bg-body-light justify-content-center">
        <div class="col-10">
            <div class="row bg-black-5">
                <h4 class="col-12">Здовбиця-1</h4>
                <div class="col-auto py-1"><b>Індексація:</b> ДУ.28.1.Х.Х</div>
                <div class="col-auto py-1"><b>Розташування:</b> Рівненська обл. Дубенський р-н с.Здовбиця</div>
                <div class="col-auto py-1"><b>Топографія:</b> Орне поле/Дерноване поле</div>
                <div class="col-auto py-1"><b>Дата виявлення:</b> 25.10.2020 р.</div>
                <div class="col-auto py-1"><b>Знахідки:</b> 183</div>
                <div class="col-auto py-1"><b>Площа:</b> 1,09 Га</div>
                <div class="col-auto py-1"><b>Об’єктів:</b> 1</div>
                <div class="col-auto py-1"><b>Відкривачі:</b> Мельничук Максим, Юрій Пшеничний</div>
                <div class="col-auto py-1"><b>Культурна принадлежність:</b> Словя'но-руський час, Неоліт</div>
            </div>

            <div class="row py-5">
                <div id="map" class="col-5 map ml-6" >
                </div>
                <div class="col-3 ml-10">
                    <canvas id="doughnutChart"></canvas>
                </div>

                <div class="col-12 bg-black-5 align-content-center px-5 py-2">
                    Здовбиця-1 За період досліджень пам’ятки розширювались уявлення про неї, з часом стало зрозумілим,
                    що це одна з
                    найбільших пам’яток регіону. На даний час виявлені розміри поселення, з’ясована кількість культурних
                    нашарувань.
                    Пам’ятка займає корінну правобережну надзаплавну терасу р. Ікви, від залізничного мосту, частково
                    знаходячись під
                    сучасною забудовою Страклова, на півдні її межею є ставки біля району Волиця...
                </div>


            </div>

        </div>

    </div>




@endsection
