@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\User $users */
        /** @var \App\Models\Post $posts */
        /** @var \App\Models\Region $regions */
        /** @var \App\Models\District $districts */
        /** @var \App\Models\Village $villages */
  //dd($posts[2]);
    @endphp


    <div class=" no-gutters py-4 p-4 bg-body-dark">
        <div class="row px-4">
            <h1>Додавання нової знахідки</h1>
        </div>
        <div class="px-3">

            <form name="post_create" enctype="multipart/form-data" method="POST" action="{{ route('find.store') }}">

                @csrf
                <div class="form">

                    <h3 class="col-12">Розташування:</h3>
                    <div class="row px-6">
                        <div class="form-group col-2 px-2">
                            <label for="inputState">Область</label>
                            <select  id="inputState" class="form-control">
                                @foreach($regions as $value => $regions )
                                    <option value="{{$value}}">{{$regions}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-2 px-2">
                            <label for="inputState">Район</label>
                            <select  id="id_select2_districts" class="form-control">
                                <option> </option>
                                @foreach($districts as $value => $districts )

                                    <option id="{{$districts['code']}}" value="{{$districts['id']}}">{{$districts['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-2 px-2">
                            <label for="inputState">Населений пункт</label>

                            <select name="village_id" id="id_select2_villages" class="form-control">

                            </select>
                        </div>

                        <div class="form-group col-3 px-2 ">
                            <label for="inputState">Пам'ятка</label>
                            <div class="">
                                <select name="post_id" id="id_select2_posts" class="form-control">

                                </select>
                            </div>
                        </div>
                        <div class="w-100"></div>

                        <div class="form-group col-4 px-2 ">
                            <label for="inputState">Об'єкт</label>
                            <div class="">
                                <select name="object_id" id="id_select2_objects" class="form-control">

                                </select>
                            </div>
                        </div>

                        <div class="form-group col-2 px-2 ">
                            <label for="inputState">Довгота</label>
                            <div class="">
                                <input  id="lat" type="text" name="lat" required="required" autocomplete="position_at_work" autofocus="autofocus" class="form-control  bg-white ">
                            </div>
                        </div>

                        <div class="form-group col-3 px-2 ">
                            <label for="inputState">Широта</label>
                            <div class="">
                                <input  id="lng" type="text" name="lng" required="required" autocomplete="position_at_work" autofocus="autofocus" class="form-control  bg-white">
                            </div>
                        </div>

                    </div>

                    <h3 class="col-12">Основні відомості:</h3>
                    <div class="row px-6">

                        <div class="form-group col-9 px-2 ">
                            <label for="inputState">Назва знахідки</label>
                            <div class="">
                                <input  id="name" type="text" name="name" required="required" autocomplete="position_at_work" autofocus="autofocus" class="form-control  bg-white">
                            </div>
                        </div>

                        <div class="w-100"></div>


                        <div class="form-group col-2 px-2">
                            <label for="inputState">Номер знахідки</label>

                            <input readonly name="find_number" id="finds_quantity" class="form-control  bg-white">
                        </div>


                        <div class="form-group col-2 px-2 ">
                            <label for="inputState">Індексація</label>
                            <div class="">
                                <input readonly id="code" type="text" name="code" value="" required="required" autocomplete="position_at_work" autofocus="autofocus" class="form-control bg-white">
                            </div>
                        </div>
                        <div class="form-group col-2 px-2">
                            <label for="inputState">Дата знаходження</label>
                            <input type="date" class="form-control" id="date" name="date_of_find" placeholder="Дата" required>
                        </div>

                        <div class="form-group col-3 px-2">
                            <label for="inputState">Культурна принадлежність</label>
                            <select name="culture_id" class="form-control" id="id_select2_cultures" >
                                <option> </option>
                               @foreach($cultures as $value => $cultures )
                                    <option value="{{$value}}">{{$cultures}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-100"></div>

                        <div class="form-group col-3 px-2 ">
                            <label for="inputState">Датування</label>
                            <div class="">
                                <input  id="dating" type="text" name="dating" required="required" autocomplete="position_at_work" autofocus="autofocus" class="form-control  bg-white">
                            </div>
                        </div>

                        <div class="form-group col-3 px-2 ">
                            <label for="inputState">Фондовий код</label>
                            <div class="">
                                <input  id="fund_code" type="text" name="fund_code" autocomplete="position_at_work" autofocus="autofocus" class="form-control  bg-white">
                            </div>
                        </div>


                        <div class="form-group col-3 px-2 ">
                            <label for="inputState">Місце зберігання</label>
                            <div class="">
                                <input  id="place_of_storage" type="text" name="place_of_storage" required="required" autocomplete="position_at_work" autofocus="autofocus" class="form-control  bg-white">
                            </div>
                        </div>
                        <div class="w-100"></div>

                        <div class="form-group col-3 px-2">
                            <label for="inputState">Матеріал</label>
                            <select name="material_id" class="form-control" id="id_select2_materials" >
                                <option> </option>
                                @foreach($materials as $value => $materials )
                                    <option value="{{$value}}">{{$materials}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-3 px-2 ">
                            <label for="inputState">Тип</label>
                            <div class="">
                                <select name="category_id" id="id_select2_categories" class="form-control">

                                </select>
                            </div>
                        </div>

                    </div>

                    <h3 class="col-12">Розміри / вага:</h3>
                    <div class="row px-6">
                        <div class="form-group col-2 px-2 ">
                            <label for="inputState">Довжина мм:</label>
                            <div class="col-12">
                                <input  id="length" type="text" name="length" required="required" autocomplete="position_at_work" autofocus="autofocus" class="form-control  bg-white">
                            </div>
                        </div>
                        <div class="form-group col-2 px-2 ">
                            <label for="inputState">Ширина мм:</label>
                            <div class="col-12">
                                <input  id="width" type="text" name="width" required="required" autocomplete="position_at_work" autofocus="autofocus" class="form-control  bg-white">
                            </div>
                        </div>
                        <div class="form-group col-2 px-2 ">
                            <label for="inputState">Висота мм:</label>
                            <div class="col-12">
                                <input  id="height" type="text" name="height" required="required" autocomplete="position_at_work" autofocus="autofocus" class="form-control  bg-white">
                            </div>
                        </div>
                        <div class="form-group col-2 px-2 ">
                            <label for="inputState">Вага гр:</label>
                            <div class="col-12">
                                <input  id="weight" type="text" name="weight" required="required" autocomplete="position_at_work" autofocus="autofocus" class="form-control  bg-white">
                            </div>
                        </div>
                    </div>

                    <h3 class="col-12">Відкривачі / особи причетні:</h3>
                    <div class="row px-6">
                        <div class="form-group col-4 px-2">
                            <label for="inputState">Відкривач</label>
                            <select name="authors[]" class="form-control" id="id_select2_users" multiple="multiple">
                                <option> </option>
                                                               @foreach($users as $value => $users )
                                    <option value="{{$value}}">{{$users}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group col-4 px-2 ">
                            <label for="inputState">Особа причетна</label>
                            <div class="col-12">
                                <input id="involved_person" type="text" name="involved_person" value="" autocomplete="position_at_work" autofocus="autofocus" class="form-control ">
                            </div>
                        </div>

                    </div>

                    <h3 class="col-12">Опис і додаткові відомості:</h3>
                    <div class="row px-6">
                        <div class="form-group col-8">
                            <textarea class="summernote" name="description"></textarea>
                        </div>


                    </div>

                    <h3 class="col-12">Фото:</h3>
                    <div class="row px-6">
                        <input id="find_images" type="file" class="form-control-file" name="find_images[]"  autocomplete="photos" multiple autofocus>

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
            var finds_quantity;



            $('.summernote').summernote({
                height: 250
            });





            $('#id_select2_materials').select2({
                tags: true,
                placeholder: "Не обрано",
            });

            $('#id_select2_categories').select2({
                tags: true,
                placeholder: "Не обрано",
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
            $('#id_select2_objects').select2({
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
                var finds_quantity = $(this).val().split('_');
               // alert( finds_quantity[1]);
                var postCode =$('#id_select2_posts option:selected').text();
                post_code = postCode.toString().slice(-1);
                document.getElementById('finds_quantity').value= finds_quantity[1];
                document.getElementById('code').value= district_code +'.'+ village_code +'.'+ post_code +'.'+  finds_quantity[1] +'.X'  ;
            })

            $('#id_select2_objects').change(function () {
                var object_code = $(this).val()
                var finds_quantity = $('#id_select2_posts').val().split('_');
                //alert( finds_quantity[1]);
                document.getElementById('code').value= district_code +'.'+ village_code +'.'+ post_code +'.'+  finds_quantity[1] +'.'+ object_code  ;

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

                                    $("#id_select2_posts").append('<option  value="'+value['id']+'_'+value['finds_quantity']+'"  name="'+value['code']+'" >'+value['name']+'</option>');
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





            $('#id_select2_posts').on('change',function(){
                var postID = $(this).val().split('_');
               //var villageID = $("#id_select2_villages")

                if(postID){
                    $.ajax({
                        type:"GET",
                        dataType: 'json',
                        url:"{{url('get-object-list')}}?post_id="+postID[0],
                        success:function(res){
                            if(res){
                                $("#id_select2_objects").empty();

                                $("#id_select2_objects").append('<option> </option>');

                                $.each(res,function(key,value){
                                    //$("#id_select2_posts").append('<option value="'+key+'">'+value+'</option>');
                                    $("#id_select2_objects").append('<option  value="'+value['id']+'"  name="'+value['code']+'" >'+value['name']+'</option>');
                                });

                            }else{
                                $("#id_select2_objects").empty();
                            }
                        }
                    });

                }else{
                    $("#id_select2_objects").empty();
                }
            });



            $('#id_select2_materials').on('change',function(){
                var materialID = $(this).val();
                if(materialID){
                    $.ajax({
                        type:"GET",
                        dataType: 'json',
                        url:"{{url('get-category-list')}}?material_id="+materialID,
                        success:function(res){
                            if(res){
                                $("#id_select2_categories").empty();
                                $("#id_select2_categories").append('<option> </option>');
                                $.each(res,function(key,value){
                                    //$("#id_select2_posts").append('<option value="'+key+'">'+value+'</option>');

                                    $("#id_select2_categories").append('<option  value="'+value['id']+'" >'+value['name']+'</option>');
                                });

                            }
                        }
                    });
                }
            });



















        });
    </script>



@endsection
