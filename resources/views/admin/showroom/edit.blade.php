

@extends('layouts.admin')

@section('title')
    Showroom
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Редактировать</h1>
            <ul>
                <li><a href="{{ route('showroom.index') }}">Все филиалы</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('showroom.update', $showroom->id) }}" method="POST">
                        @method('PATCH')
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label>Название (uz)</label>
                                    <input class="form-control @error('title_uz') is-invalid @enderror" value="{{ $showroom->title_uz }}"  autocomplete="off" placeholder="Например: Filial Andijon" name="title_uz" type="text">
                                    @error('title_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Название (ru)</label>
                                    <input class="form-control @error('title_ru') is-invalid @enderror" value="{{ $showroom->title_ru }}"  autocomplete="off" placeholder="Например: Филиал Андижан" name="title_ru" type="text">
                                    @error('title_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Адрес (uz)</label>
                                    <input class="form-control @error('address_uz') is-invalid @enderror" value="{{ $showroom->address_uz }}" autocomplete="off" placeholder="Например: Andijan, Boburshox ko'chasi, 54 uy" name="address_uz" type="text">
                                    @error('address_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Адрес (ru)</label>
                                    <input class="form-control @error('address_ru') is-invalid @enderror" value="{{ $showroom->address_ru }}"  autocomplete="off" placeholder="Например: Андижан, улица Бобуршох, дом N54" name="address_ru" type="text">
                                    @error('address_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Телефон</label>
                                    <input class="form-control @error('phone') is-invalid @enderror" value="{{ $showroom->phone }}" autocomplete="off" placeholder="Например: +998997998877" name="phone" type="text">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Эл. адрес</label>
                                    <input class="form-control @error('email') is-invalid @enderror" value="{{ $showroom->email }}" autocomplete="off" placeholder="Например: info@imedical.uz" name="email" type="text">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Координата lat</label>
                                    <input class="form-control @error('map_lat') is-invalid @enderror" value="{{ $showroom->map_lat }}" autocomplete="off" placeholder="Например: 64.5555" name="map_lat" type="text">
                                    @error('map_lat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Координата lng</label>
                                    <input class="form-control @error('map_lng') is-invalid @enderror" value="{{ $showroom->map_lng }}" autocomplete="off" placeholder="Например: 64.5555" name="map_lng" type="text">
                                    @error('map_lng')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

