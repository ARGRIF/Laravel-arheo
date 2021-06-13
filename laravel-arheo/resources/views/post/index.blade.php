@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\Find $finds */
                    /** @var \App\Models\Post $posts */
                    /** @var \App\Models\District $districts */
                    /** @var \App\Models\Culture $cultures */
                    /** @var \App\Models\User $users */
                    /** @var \App\Models\Village $villages */
                    /** @var \App\Models\Topographie $topographies */
                        $counter = 0;
              //dd($finds);
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

                        <button type="submit" class="btn btn-primary">Пошук</button>
                    </div>

                </div>

            </form>
        </div>
    </div>

    <div class="row no-gutters bg-body-light justify-content-center">
        @foreach($posts as $post )

        <div class="col-10 pt-3">
            <div class="row bg-black-5 py-3 px-2">
                <h4 class="col-12"><a class="text-black link-fx" href="{{ url("/post/".$post->id) }}">{{ $post->name }}</a></h4>

                <div class="col-auto py-1"><b>Індексація:</b> {{ $post->code }}</div>
                <div class="col-auto py-1"><b>Розташування:</b> Рівненська обл. {{ $districts[substr($post->code, 0,  4)] }} р-н с.
                    {{ $villages[$post->village_id] }}</div>
                <div class="col-auto py-1"><b>Топографія:</b>
                @foreach($post->topographies as $item)
                        {{ $loop->first ? '' : ', ' }}
                           {{$topographies[$item]}}

                    @endforeach
                </div>
                <div class="col-auto py-1"><b>Дата виявлення:</b> {{ $post->date_of_detection }}</div>
                <div class="col-auto py-1"><b>Знахідки:</b> {{ $post->finds_quantity - 1 }}</div>
                <div class="col-auto py-1"><b>Площа:</b> {{ $post->location_square }} Га</div>
                <div class="col-auto py-1"><b>Об’єкти:</b>

                        {{$objects->where('post_id',$post->id)->count()}}

                </div>
                <div class="col-auto py-1"><b>Відкривачі:</b>
                    @foreach($post->authors as $item)
                        {{ $loop->first ? '' : ', ' }}
                        {{$users[$item]}}
                    @endforeach
                </div>

                <div class="col-auto py-1"><b>Особи причетні:</b>
                    @if($post->involved_person)
                        {{$post->involved_person}}
                    @else
                        {{' - '}}
                    @endif

                </div>

                <div class="col-auto py-1"><b>Культурна принадлежність:</b>
                    @foreach($post->cultures as $item)
                        {{ $loop->first ? '' : ', ' }}
                        {{$cultures[$item]}}
                    @endforeach
                </div>


            </div>

            <div class="row ">
                <div id="map_{{$post->id}}" class="col-6 map m-1" >
                </div>
@if(($post->finds_quantity - 1) > 0)
                    <div class="col-5 chart-container mt-6">
                        <canvas id="diagram_{{$post->id}}"></canvas>
                    </div>
    <script type="text/javascript">
        $(document).ready(function() {

            var ctx = document.getElementById('diagram_{{$post->id}}').getContext('2d');

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
        })
    </script>
    @else
    <div class="col-4  pt-8 text-center">
        <h2 class="text-black-25"> Знахідки відсутні </h2>
    </div>
    @endif




                <div class="col-12 bg-black-5 align-content-center px-5 py-2">
                    {!!  $post->description !!}
                </div>


            </div>

        </div>
        @endforeach
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



        @foreach($posts as $post)
            var path = '{{quotemeta($post->location_area)}}';




        make_map('map_{{$post->id}}',path);
        @endforeach


    }
</script>


@endsection
