@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\Objects $objects */
        /** @var \App\Models\District $districts */
        /** @var \App\Models\Culture $cultures */
        /** @var \App\Models\User $users */
        /** @var \App\Models\Village $villages */
        ///** @var \App\Models\Topographie $topographies */

 //dd($objects)
    @endphp


    <div class=" no-gutters py-4 p-4 bg-body-dark">
        <div class="">
            <form>

                <div class="form-row ">

                    <div class="form-group col-2 px-2">
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
                        <label for="inputState">Пам'ятка</label>
                        <select id="inputState" class="form-control">
                            <option selected></option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group col-2 px-2">
                        <label for="inputState">Об'єкт</label>
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
                        <label for="inputState">Матеріал</label>
                        <select id="inputState" class="form-control">
                            <option selected></option>
                            <option>...</option>
                        </select>
                    </div>

                    <div class="form-group col-2 px-2">
                        <label for="inputState">Тип</label>
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

                        <button type="submit" class="btn btn-primary">Пошук</button>
                    </div>

                </div>

            </form>
        </div>
    </div>

    <div class="row no-gutters bg-body-light justify-content-center">
        @foreach($finds as $find )

            <div class="col-10 pt-3">

                <div class="row">
                    <div id="map_{{$find->id}}" class="col-5 map m-1" >





                        <div class="col-12 bg-black-5 align-content-center px-5 py-2">
                            {!!  $find->description !!}
                        </div>


                    </div>
                    <div class="col-6 bg-black-5 py-3 px-2">
                        <h4 class="col-12 mb-2">{{ $find->name }}</h4>


                        <div class="col-auto py-1"><b>Індексація:</b> {{ $find->code }}</div>
                        <div class="col-auto py-1"><b>Розташування:</b> Рівненська обл. / {{ $districts[substr($find->code, 0,  4)] }} р-н / {{ $posts[$find->post_id] }} / знахідка {{ $find->find_number }}</div>
                        <div class="col-auto py-1"><b>Об'єкт:</b>
                            @if($find->object_id)
                                {{ $objects[$find->object_id] }}
                            @else
                                {{'-'}}
                            @endif
                        </div>
                        <div class="row px-3">
                        <div class="col-auto py-1"><b>Матеріал:</b> {{ $materials[$find->material_id] }}</div>
                        <div class="col-auto py-1"><b>Тип:</b> {{ $categories[$find->category_id] }}</div>
                        </div>
                            <div class="row px-3">
                            <div class="col-auto py-1"><b>Розміри мм:</b> {{ $find->length }} x  {{ $find->width }} x {{ $find->height }} </div>
                            <div class="col-auto py-1"><b>Вага гр:</b> {{ $find->weight }} </div>
                        </div>

                        <div class="col-auto py-1"><b>Дата виявлення:</b> {{ $find->date_of_find }}</div>
                        <div class="col-auto py-1"><b>Відкривачі:</b>
                            @foreach($find->authors as $item)
                                {{ $loop->first ? '' : ', ' }}
                                {{$users[$item]}}
                            @endforeach
                        </div>

                        <div class="col-auto py-1"><b>Особи причетні:</b> {{$find->involved_person}} </div>
                        <div class="col-auto py-1"><b>Датування:</b> {{ $find->dating }}</div>
                        <div class="col-auto py-1"><b>Культурна принадлежність:</b> {{$cultures[$find->culture_id]}}</div>


                    </div>
                </div>

            </div>
        @endforeach
    </div>

    <script type="text/javascript">


        function initMap() {

            function test(id, lat, lng) {

                var opt = {
                    center: {lat: lat, lng: lng},
                    zoom: 16,
                    disableDefaultUI: true,
                    mapTypeId: 'hybrid',

                }
                var map = new google.maps.Map(document.getElementById(id), opt);

                new google.maps.Marker({
                    position: {lat: lat, lng: lng},
                    map,
                    title: "Hello World!",
                    editable: true,
                    draggable: true,
                });



            }

            @foreach($finds as $find)
            test('map_{{$find->id}}',{{$find->lat}},{{$find->lng}});
            @endforeach


        }
    </script>


@endsection
