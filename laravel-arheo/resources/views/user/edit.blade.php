@extends('layouts.app')

@section('content')
    @php /** @var \App\Models\User $item */ @endphp



    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-8 mt-2">
                @include('flash-message')
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Редагування акаунту</div>

                    <div class="card-body">
                        <form enctype="multipart/form-data" method="POST" action="{{ route('user.update', $item->id) }}">
                            @method('PATCH')
                            @csrf
                            <div class="form-group row">
                                <label for="avatar" class="col-md-4 col-form-label text-md-right">Аватар</label>

                                <div class="col-md-6">
                                    <input id="avatar" type="file" class="form-control-file @error('avatar') is-invalid @enderror"  autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">П.І.Б</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $item->name) }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Посада</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('position_at_work') is-invalid @enderror" name="position_at_work" value="{{ old('position_at_work', $item->position_at_work) }}" required autocomplete="position_at_work" autofocus>

                                    @error('position_at_work')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Спеціалізація</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('specialization') is-invalid @enderror" name="specialization" value="{{ old('specialization', $item->specialization) }}" required autocomplete="specialization" autofocus>

                                    @error('specialization')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $item->email) }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Номер телефону</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $item->phone) }}" required autocomplete="phone">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Зареєструватися
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
