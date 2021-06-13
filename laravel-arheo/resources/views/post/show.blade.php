@extends('layouts.app')

@section('content')
    @php

        /** @var \App\Models\Post $post */
/** @var \App\Models\Find $finds */

        /** @var \App\Models\District $districts */
        /** @var \App\Models\Culture $cultures */
        /** @var \App\Models\User $users */
        /** @var \App\Models\Village $villages */
        /** @var \App\Models\Topographie $topographies */
//dd($post);
    @endphp


    <div class="row no-gutters bg-black-5 py-3 px-2 pl-6">
        <h2 class="col-10">{{ $post->name }}</h2>
        <button id="save" class="col-1 btn btn-secondary btn-sm">Редагувати</button>
    </div>

    <div class="row no-gutters bg-body-light justify-content-center">
        <div class="col-11 pt-3">

            <h3 class=" pt-3">Місцезнаходження і основні відомості:</h3>
            <div class="row pl-6">
                <div id="map_{{$post->id}}" class="col-7 map m-1">
                </div>
                <div class="col bg-black-5 pt-4">

                    <div class="col-auto py-1"><b>Індексація:</b> {{ $post->code }}</div>
                    <div class="w-100"></div>
                    <div class="col-auto py-1"><b>Розташування:</b> Рівненська
                        обл. {{ $districts[substr($post->code, 0,  4)] }} р-н с.
                        {{ $villages[$post->village_id] }}</div>
                    <div class="w-100"></div>
                    <div class="col-auto py-1"><b>Топографія:</b>
                        @foreach($post->topographies as $item)
                            {{ $loop->first ? '' : ', ' }}
                            {{$topographies[$item]}}

                        @endforeach
                    </div>
                    <div class="w-100"></div>
                    <div class="col-auto py-1"><b>Дата виявлення:</b> {{ $post->date_of_detection }}</div>
                    <div class="w-100"></div>
                    <div class="col-auto py-1"><b>Знахідки:</b> {{ $post->finds_quantity - 1 }}</div>
                    <div class="w-100"></div>
                    <div class="col-auto py-1"><b>Площа:</b> {{ $post->location_square }} Га</div>
                    <div class="w-100"></div>
                    <div class="col-auto py-1"><b>Об’єкти:</b>

                        {{$objects->where('post_id',$post->id)->count()}}

                    </div>
                    <div class="w-100"></div>
                    <div class="col-auto py-1"><b>Відкривачі:</b>
                        @foreach($post->authors as $item)
                            {{ $loop->first ? '' : ', ' }}
                            {{$users[$item]}}
                        @endforeach
                    </div>
                    <div class="w-100"></div>
                    <div class="col-auto py-1"><b>Особи причетні:</b>
                        @if($post->involved_person)
                            {{$post->involved_person}}
                        @else
                            {{' - '}}
                        @endif

                    </div>
                    <div class="w-100"></div>
                    <div class="col-auto py-1"><b>Культурна принадлежність:</b>
                        @foreach($post->cultures as $item)
                            {{ $loop->first ? '' : ', ' }}
                            {{$cultures[$item]}}
                        @endforeach
                    </div>
                    <div class="w-100"></div>
                </div>

            </div>


            <h3 class=" pt-3">Опис:</h3>
            <div class="row pl-6">
                <div class="col-12 bg-black-5 align-content-center px-5 py-2">
                    {!!  $post->description !!}
                </div>
            </div>

            <h3 class=" pt-3">Візуалізація принадлежності знахідок до матеріалу / культури:</h3>


            <div class="row pl-6">
            <div class="col-12 bg-black-5 align-content-center py-2">

            @if(($post->finds_quantity - 1) > 0)
                <div class="row justify-content-center">
                    <div class="col-6 chart-container   mt-5 mb-7">
                        <canvas id="diagram_materials{{$post->id}}"></canvas>

                    </div>
                    <div class=" col-6 chart-container   mt-5 mb-7">
                        <canvas id="diagram_cultures{{$post->id}}"></canvas>
                    </div>
                </div>







                <script type="text/javascript">
                    $(document).ready(function () {

                        var materials = document.getElementById('diagram_materials{{$post->id}}').getContext('2d');
                        var cultures = document.getElementById('diagram_cultures{{$post->id}}').getContext('2d');

                        var chart_materials = new Chart(materials, {
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
                                        {{$finds->where('post_id',$post->id)->where('material_id',1)->count()}},
                                        {{$finds->where('post_id',$post->id)->where('material_id',2)->count()}},
                                        {{$finds->where('post_id',$post->id)->where('material_id',3)->count()}},
                                        {{$finds->where('post_id',$post->id)->where('material_id',4)->count()}},
                                        {{$finds->where('post_id',$post->id)->where('material_id',5)->count()}},
                                        {{$finds->where('post_id',$post->id)->where('material_id',6)->count()}},
                                        {{$finds->where('post_id',$post->id)->where('material_id',7)->count()}},
                                    ],
                                }]
                            },
                            options: {
                                legend: {
                                    position: 'right',
                                }
                            }
                        });
                        var chart_cultures = new Chart(cultures, {
                            type: 'doughnut',
                            data: {
                                labels: [
                                    "Пізній палеоліт",
                                    "Фінальний палеоліт",
                                    "Мезоліт",
                                    "Неоліт",
                                    "Енеоліт",
                                    "Епоха бронзи",
                                    "Ранньозалізний вік",
                                    "Латенський час",
                                    "Римський час",
                                    "Ранні слов'яни",
                                    "Слов'яни Х ст.",
                                    "Давньоруський час ХІ – ХІІІ ст.",
                                    "Литовсько-польська доба",
                                ],
                                datasets: [{
                                    backgroundColor: [
                                        '#08E5F3',
                                        '#08ADF3',
                                        '#007CC1',
                                        '#0500FF',
                                        '#D8C100',
                                        '#F0A30A',
                                        '#FA6800',
                                        '#FF0202',
                                        '#EB33EB',
                                        '#A4C400',
                                        '#60A917',
                                        '#008A00',
                                        '#094500',

                                    ],
                                    data: [
                                        {{$finds->where('post_id',$post->id)->where('culture_id',1)->count()}},
                                        {{$finds->where('post_id',$post->id)->where('culture_id',2)->count()}},
                                        {{$finds->where('post_id',$post->id)->where('culture_id',3)->count()}},
                                        {{$finds->where('post_id',$post->id)->where('culture_id',4)->count()}},
                                        {{$finds->where('post_id',$post->id)->where('culture_id',5)->count()}},
                                        {{$finds->where('post_id',$post->id)->where('culture_id',6)->count()}},
                                        {{$finds->where('post_id',$post->id)->where('culture_id',7)->count()}},
                                        {{$finds->where('post_id',$post->id)->where('culture_id',8)->count()}},
                                        {{$finds->where('post_id',$post->id)->where('culture_id',9)->count()}},
                                        {{$finds->where('post_id',$post->id)->where('culture_id',10)->count()}},
                                        {{$finds->where('post_id',$post->id)->where('culture_id',11)->count()}},
                                        {{$finds->where('post_id',$post->id)->where('culture_id',12)->count()}},
                                        {{$finds->where('post_id',$post->id)->where('culture_id',13)->count()}},
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
                <div class="col-4  py-4 text-center">
                    <h2 class="text-black-25"> Знахідки відсутні </h2>
                </div>
            @endif

            </div>
            </div>





            <h3 class=" pt-3">Фото:</h3>
            @if(isset($post->photos) && count($post->photos)>0)
                <div class="row pl-6 justify-content-center" style="margin-bottom: 30px;">
                    <div class="col-12 ">
                        <div id="carouselExample" class="carouselPrograms carousel slide" data-ride="carousel" data-interval="false">
                            <div class="carousel-inner row w-100 mx-auto" role="listbox">
                                @foreach($post->photos as $j => $slider)
                                    <div @if($j == 0)class="carousel-item active"@else class="carousel-item"@endif>
                                        <div class="panel panel-default">
                                            <div class="panel-thumbnail">
                                                <a data-fancybox="gallery" href="{{ asset('/uploads/other/'.$slider) }}" target="_blank" title="image 1" class="thumb">
                                                    <img class="img-fluid mx-auto d-block" src="{{ asset('/uploads/other/'.$slider) }}" alt="slide 1" style="  margin: 0; width: 100%;">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @if(count($post->photos) > 1)
                                <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <div class="col-4  pt-8 text-center">
                    <h2 class="text-black-25"> Фото відсутні </h2>
                </div>
            @endif







        </div>
    </div>

    <script type="text/javascript">


        function initMap() {

            function make_map(id, path) {

                var Coords = google.maps.geometry.encoding.decodePath(path);


                const posthex = new google.maps.Polygon({
                    paths: Coords,
                    strokeColor: "#FF0000",
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: "#FF0000",
                    fillOpacity: 0.35,

                });


                var poliCenter = polygonCenter(posthex);

                var opt = {
                    center: poliCenter,
                    zoom: 16,
                    disableDefaultUI: true,
                    mapTypeId: 'satellite',

                }
                var map = new google.maps.Map(document.getElementById(id), opt);


                // Construct the polygon.

                posthex.setMap(map);


            }


            var path = '{{quotemeta($post->location_area)}}';


            make_map('map_{{$post->id}}', path);


        }
    </script>


@endsection
