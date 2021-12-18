@extends('layouts.admin')

@section('title')
    Appleys
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Редактирование обо мне</h1>
            <ul>
                <li><a href="{{ route('appleys.index') }}">Все данные</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('appleys.update', $appleys->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label>name (uz)</label>
                                    <input class="form-control @error('name_uz') is-invalid @enderror"value="{{ $appleys->name_uz }}"
                                           autocomplete="off" placeholder="Например: Bakalavr" name="name_uz" type="text">
                                    @error('name_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label>name (ru)</label>
                                    <input class="form-control @error('title_ru') is-invalid @enderror"value="{{ $appleys->name_ru }}"
                                           autocomplete="off" placeholder="Например: Bakalavr" name="name_ru" type="text">
                                    @error('name_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Email</label>
                                    <input class="form-control @error('email') is-invalid @enderror"value="{{ $appleys->email }}"
                                           autocomplete="off" placeholder="Например: Bakalavr" name="email" type="text">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>subject(uz)</label>
                                    <input class="form-control @error('subject_uz') is-invalid @enderror"value="{{ $appleys->subject_uz }}"
                                           autocomplete="off" placeholder="Например: Bakalavr" name="subject_uz" type="text">
                                    @error('subject_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>subject(ru)</label>
                                    <input class="form-control @error('subject_ru') is-invalid @enderror"value="{{ $appleys->subject_ru }}"
                                           autocomplete="off" placeholder="Например: Bakalavr" name="subject_ru" type="text">
                                    @error('subject_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>message(uz)</label>
                                    <input class="form-control @error('message_uz') is-invalid @enderror"value="{{ $appleys->message_uz }}"
                                           autocomplete="off" placeholder="Например: Bakalavr" name="message_uz" type="text">
                                    @error('message_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>message(ru)</label>
                                    <input class="form-control @error('message_ru') is-invalid @enderror"value="{{ $appleys->message_ru }}"
                                           autocomplete="off" placeholder="Например: Bakalavr" name="message_ru" type="text">
                                    @error('message_ru')
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

