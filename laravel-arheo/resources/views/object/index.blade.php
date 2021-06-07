@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-3">
            <select class="form-control" id="id_select2_demo1" multiple="multiple">
                <option value = ""> ----- Один выбор ----- </option>
                <option value="1">OPS-COFFEE-A</option>
                <option value="2">OPS-COFFEE-B</option>
                <option value="3">OPS-COFFEE-C</option>
                <option value="4">OPS-COFFEE-D</option>
                <option value="5">OPS-COFFEE-E</option>
                <option value="6">OPS-COFFEE-F</option>
                <option value="7">OPS-COFFEE-G</option>
            </select>
            <script>
                $(document).ready(function(){
                    $.noConflict();
                    $('#id_select2_demo1').select2();
                });

            </script>
        </div>
    </div>






@endsection
