

@extends('layouts.admin')

@section('title')
logotechs
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Редактирование обо мне</h1>
            <ul>
                <li><a href="{{ route('logotechs.index') }}">Все данные</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('logotechs.update', $logotechs->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label>location (uz)</label>
                                        <input class="form-control @error('location_uz') is-invalid @enderror" value="{{ $logotechs->location_uz }}"
                                            autocomplete="off" placeholder="Например: " name="location_uz" type="text">
                                    @error('location_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>location (ru)</label>
                                        <input class="form-control @error('location_ru') is-invalid @enderror" value="{{ $logotechs->location_ru }}"
                                            autocomplete="off" placeholder="Например: Title" name="location_ru" type="text">
                                    @error('location_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>houre(uz)</label>
                                        <input class="form-control @error('houre_uz') is-invalid @enderror" value="{{ $logotechs->houre_uz }}"
                                            autocomplete="off" placeholder="Например: Title" name="houre_uz" type="text">
                                    @error('houre_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>houre(ru)</label>
                                        <input class="form-control @error('houre_ru') is-invalid @enderror" value="{{ $logotechs->houre_ru }}"
                                            autocomplete="off" placeholder="Например: Title" name="houre_ru" type="text">
                                    @error('houre_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-6 form-group mb-3">
                                    <label>phone</label>
                                        <input class="form-control @error('phone') is-invalid @enderror" value="{{ $logotechs->phone }}"
                                            autocomplete="off" placeholder="Например: " name="phone" type="text">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-6 form-group mb-3">
                        

                                

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

