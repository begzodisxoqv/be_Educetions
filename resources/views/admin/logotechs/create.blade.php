@extends('layouts.admin')

@section('title')
logotechs
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Добавыть новый филиал</h1>
            <ul>
                <li><a href="{{ route('logotechs.index') }}">Все филиалы</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('logotechs.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label>logotechs (uz)</label>
                                    <input class="form-control @error('location_uz') is-invalid @enderror"  autocomplete="off" placeholder="Например" name="location_uz" type="text">
                                    @error('location_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>location (ru)</label>
                                    <input class="form-control @error('location_ru') is-invalid @enderror"  autocomplete="off" placeholder="Например: Филиал Андижан" name="location_ru" type="text">
                                    @error('location_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Houre (uz)</label>
                                    <input class="form-control @error('houre_uz') is-invalid @enderror" autocomplete="off" placeholder="Например: " name="houre_uz" type="text">
                                    @error('houre_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Houre (ru)</label>
                                    <input class="form-control @error('houre_ru') is-invalid @enderror" autocomplete="off" placeholder="Например: " name="houre_ru" type="text">
                                    @error('houre_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Телефон</label>
                                    <input class="form-control @error('phone') is-invalid @enderror"  autocomplete="off" placeholder="Например: +998997998877" name="phone" type="text">
                                    @error('phone')
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

