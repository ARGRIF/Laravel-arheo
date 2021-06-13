@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\Topographie $topographies */
        /** @var \App\Models\Culture $cultures */
        /** @var \App\Models\User $users */
        /** @var \App\Models\Region $regions */
        /** @var \App\Models\District $districts */
        /** @var \App\Models\Village $villages */
  //dd($regions);
    @endphp


    <div class=" no-gutters py-4 p-4 bg-body-dark">
        <div class="row px-4">
            <h1>Додавання нового об'єкта</h1>
        </div>
        <div class="px-3">

            <form name="post_create" enctype="multipart/form-data" method="POST" action="{{ route('object.store') }}">

                @csrf
                <div class="form">

                    <h3 class="col-12">Розташування:</h3>
                    <div class="row px-6">
                        <div class="form-group col-2 ">
                            <label for="inputState">Область</label>
                            <select  id="inputState" class="form-control">
                                @foreach($regions as $value => $regions )
                                    <option value="{{$value}}">{{$regions}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-3 ">
                            <label for="inputState">Район</label>
                            <select  id="id_select2_districts" class="form-control">
                                <option> </option>
                                @foreach($districts as $value => $districts )

                                    <option id="{{$districts['code']}}" value="{{$districts['id']}}">{{$districts['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-3 ">
                            <label for="inputState">Населений пункт</label>

                            <select  id="id_select2_villages" class="form-control">
                                <option> </option>
                            </select>
                        </div>

                        <div class="form-group col-3 px-2 ">
                            <label for="inputState">Назва пам'ятки</label>
                            <div class="col-12">
                                <select name="post_id" id="id_select2_posts" class="form-control">

                                </select>
                            </div>
                        </div>


                    </div>

                    <h3 class="col-12">Основні відомості:</h3>
                    <div class="row px-6">
                        <div class="form-group col-3 px-2 ">
                            <label for="inputState">Назва</label>
                            <div class="">
                                <input id="name_input" type="text" name="name" required="required" autocomplete="position_at_work" autofocus="autofocus" class="form-control  bg-white">
                            </div>
                        </div>

                        <div class="form-group col-3 px-2 ">
                            <label for="inputState">Назва обєкту</label>
                            <div class="">
                                <input readonly id="name" type="text" name="name" required="required" autocomplete="position_at_work" autofocus="autofocus" class="form-control  bg-white">
                            </div>
                        </div>

                        <div class="form-group col-2 px-2">
                            <label for="inputState">Номер</label>
                            <select id="id_select2_number" class="form-control">
                                <option> </option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>

                        <div class="form-group col-3 px-2 ">
                            <label for="inputState">Індексація</label>
                            <div class="">
                                <input readonly id="code" type="text" name="code" value="" required="required" autocomplete="position_at_work" autofocus="autofocus" class="form-control bg-white">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="form-group col-2 px-2">
                            <label for="inputState">Дата відкриття</label>
                            <input type="date" class="form-control" id="date" name="date_of_detection" placeholder="Дата" required>
                        </div>

                        <div class="form-group col-4 px-2">
                            <label for="inputState">Топографія</label>
                            <select name="topography_id" class="form-control" id="id_select2_topographies" >
                                <option> </option>
                                @foreach($topographies as $value => $topographies )
                                    <option value="{{$value}}">{{$topographies}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-5 px-2">
                            <label for="inputState">Культурна принадлежність</label>
                            <select name="culture_id" class="form-control" id="id_select2_cultures" >
                                <option> </option>
                                @foreach($cultures as $value => $cultures )
                                    <option value="{{$value}}">{{$cultures}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <h3 class="col-12">Відкривачі / особи причетні:</h3>
                    <div class="row px-6">
                        <div class="form-group col-4 px-2">
                            <label for="inputState">Відкривач</label>
                            <select name="authors[]" class="form-control" id="id_select2_users" multiple="multiple">
                                @foreach($users as $value => $users )
                                    <option value="{{$value}}">{{$users}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group col-4 px-2 ">
                            <label for="inputState">Особа причетна</label>
                            <div class="col-12">
                                <input id="name" type="text" name="involved_person" value="" autocomplete="position_at_work" autofocus="autofocus" class="form-control ">
                            </div>
                        </div>



                    </div>

                    <h3 class="col-12">Карта:</h3>
                    <div class="row px-6">
                        <input name="lat" id="lat" type="hidden" >
                        <input name="lng" id="lng" type="hidden" >
                        <div id="map" class="col-8 map ml-2" >

                        </div>
                        <script type="text/javascript">

                            function initMap() {

                                var lat = 50.395757;
                                var lng = 25.763518;

                                var opt = {
                                    center: {lat: lat, lng: lng},
                                    zoom: 16,
                                    disableDefaultUI: true,
                                    mapTypeId: 'satellite',

                                }
                                var map = new google.maps.Map(document.getElementById("map"), opt);

                                const marker_object =   new google.maps.Marker({
                                    position: {lat: lat, lng: lng},
                                    map,
                                    title: "Hello World!",
                                    editable: true,
                                    draggable: true,
                                });




                                var a =document.getElementById('save');

                                a.onclick = function() {
                                    document.getElementById('lat').value = marker_object.getPosition(marker_object).lat().toFixed(6);
                                    document.getElementById('lng').value = marker_object.getPosition(marker_object).lng().toFixed(6);
                                }

                            }


                        </script>

                    </div>



                    <h3 class="col-12">Опис і додаткові відомості:</h3>
                    <div class="row px-6">
                            <div class="form-group col-8">
                                <textarea class="summernote" name="description"></textarea>
                            </div>


                    </div>

                    <h3 class="col-12">Фото:</h3>
                    <div class="row px-6">
                        <input id="photos" type="file" class="form-control-file" name="photos[]"  autocomplete="photos" multiple autofocus>

                    </div>


                </div>
                <div class="form-group text-center">
                    <button id="save" type="submit" class="btn btn-success btn-sm">Зберегти</button>

                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){

            var district_code ='XX.';
            var village_code ='X';
            var post_code ='X';
            var object_code  ='X';

            $('.summernote').summernote({
                height: 250
            });

            $('#id_select2_cultures').select2({
                tags: true,
                placeholder: "Не обрано",
            });

            $('#id_select2_users').select2({
                    tags: true
                }
            );

            $('#id_select2_topographies').select2({
                tags: true,
                placeholder: "Не обрано",
            });


            $('#id_select2_number').select2({
                tags: true,
                placeholder: "Не обрано",
            });

            $('#id_select2_districts').select2({
                tags: true,
                placeholder: "Не обрано",
            });


            $('#id_select2_villages').select2({
                tags: true,
                placeholder: "Не обрано",
                //allowClear: true

            })

            $('#id_select2_posts').select2({
                tags: true,
                placeholder: "Не обрано",
                //allowClear: true

            })


            $('#id_select2_villages ').change(function () {
                var vilageCode =$('#id_select2_villages').children(":selected").attr("name"); //=$('#id_select2_villages option:selected').val();
                village_code = vilageCode;
                document.getElementById('code').value= district_code +'.'+ village_code + '.X.X.X';

            })

            $('#id_select2_districts ').change(function () {
                var districtID =$('#id_select2_districts').children(":selected").attr("id");
                district_code = districtID;
                document.getElementById('code').value= district_code +'.X.X.X.X';

            })

            $('#id_select2_number').change(function () {
                var object_code =$('#id_select2_number option:selected').text();
                document.getElementById('name').value = document.getElementById('name_input').value + ' - ' +object_code;
                document.getElementById('code').value= district_code +'.'+ village_code + '.X.'  + post_code + '.' + object_code;

            })

            $('#id_select2_posts').change(function () {
                var postCode =$('#id_select2_posts option:selected').text();
                post_code = postCode.toString().slice(-1);

                document.getElementById('code').value= district_code +'.'+ village_code + '.X.'  + post_code + '.' + object_code;

            })



            $('#id_select2_districts').change(function () {
                var districtId = $(this).val();

                if(districtId){
                    $.ajax({
                        type:"GET",
                        dataType: 'json',
                        url:"{{url('get-village-list')}}?district_id="+districtId,
                        success:function(res){
                            if(res){
                                $("#id_select2_villages").empty();
                                $("#id_select2_villages").append('<option> </option>');
                                document.getElementById('name').value='';
                                $.each(res,function(key,value){
                                    $("#id_select2_villages").append('<option  value="'+value['id']+'"  name="'+value['code']+'" >'+value['name']+'</option>');
                                });

                            }else{
                                $("#id_select2_villages").empty();

                            }
                        }
                    });
                }else{
                    $("#id_select2_villages").empty();
                    $("#id_select2_posts").empty();
                }
            });
            $('#id_select2_villages').on('change',function(){
                var villageID = $(this).val();
                if(villageID){
                    $.ajax({
                        type:"GET",
                        dataType: 'json',
                        url:"{{url('get-post-list')}}?village_id="+villageID,
                        success:function(res){
                            if(res){
                                $("#id_select2_posts").empty();
                                $("#id_select2_posts").append('<option> </option>');
                                $.each(res,function(key,value){
                                    //$("#id_select2_posts").append('<option value="'+key+'">'+value+'</option>');
                                    $("#id_select2_posts").append('<option  value="'+value['id']+'"  name="'+value['code']+'" >'+value['name']+'</option>');
                                });

                            }else{
                                $("#id_select2_posts").empty();
                            }
                        }
                    });
                }else{
                    $("#id_select2_posts").empty();
                }
            });






















        });
    </script>



@endsection
