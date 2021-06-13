@extends('layouts.app')

@section('content')
    @php /** @var \App\Models\User $item */ @endphp

    <div class="row no-gutters flex-lg-10-auto">
        <div class="col-lg-5 col-xl-3 h100-scroll">
            <div class="content">




                <!-- Side Content -->
                <div id="side-content" class="d-none d-lg-block push">

                    <!-- Trip -->
                    <div class="block block-rounded block-mode-hidden ">
                        <div class="block-header block-header-default">
                            <img class="img-fluid rounded-top" src="{{url('/uploads/avatars/'.$item->avatar)}}" width="100%">

                        </div>
                    </div>


                    <div class="block block-rounded block-mode-hidden block-account-item">
                        <div class="block-header block-header-default">
                            <p class="block-title ">
                                {{ $item->name }}
                            </p>
                        </div>
                    </div>

                    <div class="block block-rounded block-mode-hidden block-account-item">
                        <div class="block-header block-header-default">
                            <p class="block-title">
                                {{ $item->position_at_work }}
                            </p>
                        </div>
                    </div>

                    <div class="block block-rounded block-mode-hidden block-account-item">
                        <div class="block-header block-header-default">
                            <p class="block-title">
                                {{ $item->specialization }}
                            </p>
                        </div>
                    </div>

                    <div class="block block-rounded block-mode-hidden block-account-item">
                        <div class="block-header block-header-default">
                            <p class="block-title">
                                {{ $item->phone }}
                            </p>
                        </div>
                    </div>

                    <div class="block block-rounded block-mode-hidden block-account-item">
                        <div class="block-header block-header-default">
                            <p class="block-title">
                                {{ $item->email }}
                            </p>
                        </div>
                    </div>
                    @if(Request::url() == url("/user/".Auth::user()->id))
                        <button type="button" class="btn btn-secondary btn-block" onclick="location.href='{{ url("/user/".Auth::user()->id.'/edit') }}'">Редагувати</button>
                    @endif

                    <!-- END Trip -->
                </div>
                <!-- END Side Content -->
            </div>
        </div>
        <div class="col-lg-7 col-xl-9 h100-scroll bg-body-dark">
            <!-- Main Content -->
            <div class="content">
                <div class="row">
                    <div class="col-6 ">
                        <a class="block block-rounded text-center bg-image user-item-block-content-point" style="background-image: url('/images/user-item-images/Posts.png');" >
                            <div class="block-content block-content-full  aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                <div>
                                    <div class="row">
                                        <div class=" user-item-block-content-pt font-w400 mb-1">
                                            Пам'ятки
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="user-item-block-content-p font-w500 mb-1">
                                            {{$post_quantity}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 ">
                        <a class="block block-rounded text-center bg-image user-item-block-content-point" style="background-image: url('/images/user-item-images/Objects.png');" >
                            <div class="block-content block-content-full  aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                <div>
                                    <div class="row">
                                        <div class=" user-item-block-content-pt font-w400 mb-1">
                                            Об'єкти
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="user-item-block-content-p font-w500 mb-1">
                                            234
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 ">
                        <a class="block block-rounded text-center bg-image user-item-block-content-point" style="background-image: url('/images/user-item-images/Finds.png');" >
                            <div class="block-content block-content-full  aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                <div>
                                    <div class="row">
                                        <div class=" user-item-block-content-pt font-w400 mb-1">
                                            Знахідки
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="user-item-block-content-p font-w500 mb-1">
                                            234
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 ">
                        <a class="block block-rounded text-center bg-image user-item-block-content-point" style="background-image: url('/images/user-item-images/Passports.png');" >
                            <div class="block-content block-content-full  aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                <div>
                                    <div class="row">
                                        <div class=" user-item-block-content-pt font-w400 mb-1">
                                            Паспорти
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="user-item-block-content-p font-w500 mb-1">
                                            234
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


                </div>
            </div>
            <!-- END Main Content -->
        </div>
    </div>

@endsection
