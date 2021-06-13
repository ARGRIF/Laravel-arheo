@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\Find $finds */
           /** @var \App\Models\Objects $objects */
           /** @var \App\Models\District $districts */
           /** @var \App\Models\Culture $cultures */
           /** @var \App\Models\User $users */
           /** @var \App\Models\Village $villages */
           /** @var \App\Models\Topographie $topographies */

    //dd($finds)
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
                        <label for="inputState">Знахідки</label>
                        <select id="inputState" class="form-control">
                            <option selected></option>
                            <option>...</option>
                        </select>
                    </div>

                    <div class="form-group col-2 px-2">
                        <label for="inputState">Дата відкриття</label>
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

                    <div class="form-group col-2 px-2 align-self-end">

                        <button type="submit" class="btn btn-primary">Пошук</button>
                    </div>

                </div>

            </form>
        </div>
    </div>

    <div class="row no-gutters bg-body-light justify-content-center">
        @foreach($objects as $object )

            <div class="col-10 pt-3">
                <div class="row bg-black-5 py-3 px-2">
                    <h4 class="col-12 mb-2">{{$posts[$object->post_id].' '.' '. $object->name }}</h4>
                    <div class="col-auto py-1"><b>Індексація:</b> {{ $object->code }}</div>
                    <div class="col-auto py-1"><b>Розташування:</b> Рівненська обл. {{ $districts[substr($object->code, 0,  4)] }} р-н с.
                        {{ $posts[$object->post_id] }}</div>
                    <div class="col-auto py-1"><b>Топографія:</b>

                            {{$topographies[$object->topography_id]}}

                    </div>
                    <div class="col-auto py-1"><b>Дата виявлення:</b> {{ $object->date_of_detection }}</div>
                    <div class="col-auto py-1"><b>Знахідки:</b> {{ $object->finds_quantity }}</div>

                    <div class="col-auto py-1"><b>Відкривачі:</b>
                        @foreach($object->authors as $item)
                            {{ $loop->first ? '' : ', ' }}
                            {{$users[$item]}}
                        @endforeach
                    </div>

                    <div class="col-auto py-1"><b>Особи причетні:</b>
                        {{$object->involved_person}}
                    </div>

                    <div class="col-auto py-1"><b>Культурна принадлежність:</b>
                            {{$cultures[$object->culture_id]}}

                    </div>



                </div>

                <div class="row ">
                    <div id="map_{{$object->id}}" class="col-6 map m-1" >
                    </div>
                    @if($object->finds_quantity > 0)
                        <div class="col-5 chart-container mt-6">
                            <canvas id="diagram_{{$object->id}}"></canvas>
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function() {

                                var ctx = document.getElementById('diagram_{{$object->id}}').getContext('2d');

                                var chart = new Chart(ctx, {
                                    type: 'doughnut',
                                    data: {
                                        labels: [
                                            "Кремінь",
                                            "Кераміка гончарна",
                                            "Кераміка ліпна",
                                            "Метал чорний",
                                            "Метал кольоровий",
                                            "Скло",
                                            "Кістка"
                                        ],
                                        datasets: [{
                                            backgroundColor: ['#0E66B1', '#FC6621', '#FD9326', '#647687', '#D8C100', '#00ABA9', '#DAD395'],
                                            data: [

                                                {{$finds->where('object_id',$object->id)->where('material_id',1)->count()}},
                                                {{$finds->where('object_id',$object->id)->where('material_id',2)->count()}},
                                                {{$finds->where('object_id',$object->id)->where('material_id',3)->count()}},
                                                {{$finds->where('object_id',$object->id)->where('material_id',4)->count()}},
                                                {{$finds->where('object_id',$object->id)->where('material_id',5)->count()}},
                                                {{$finds->where('object_id',$object->id)->where('material_id',6)->count()}},
                                                {{$finds->where('object_id',$object->id)->where('material_id',7)->count()}},
                                            ],
                                        }]
                                    },
                                    options: {
                                        legend: {
                                            position: 'right',


                                        }
                                    }
                                });
                            })
                        </script>
                    @else
                        <div class="col-4  pt-8 text-center">
                            <h2 class="text-black-25"> Знахідки відсутні </h2>
                        </div>
                    @endif


                    <div class="col-12 bg-black-5 align-content-center px-5 py-2">
                        {!!  $object->description !!}
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
                    mapTypeId: 'satellite',

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

            @foreach($objects as $object)
            test('map_{{$object->id}}',{{$object->lat}},{{$object->lng}});
            @endforeach


        }
    </script>


@endsection
