@extends('layouts.admin')

@section('title')
Appleys
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Добавить новые данные</h1>
            <ul>
                <li><a style="color: blue; border-bottom: 1px solid blue "  href="{{ route('appleys.index') }}">Ortga qaytish</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('appleys.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label>Name (uz)</label>
                                    <input class="form-control @error('name_uz') is-invalid @enderror"
                                           autocomplete="off" placeholder="Например: Bakalavr" name="name_uz" type="text">
                                    @error('name_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label>Name (ru)</label>
                                        <input class="form-control @error('name_ru') is-invalid @enderror"
                                               autocomplete="off" placeholder="Например: Bakalavr" name="name_ru" type="text">
                                        @error('name_ru')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>


                                     

            

                                        <div class="col-md-6 form-group mb-3">
                                            <label>Subject (uz)</label>
                                            <input class="form-control @error('subject_uz') is-invalid @enderror"
                                                   autocomplete="off" placeholder="Например: Bakalavr" name="subject_uz" type="text">
                                            @error('subject_uz')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                         <div class="col-md-6 form-group mb-3">
                                            <label>Subject(ru)</label>
                                            <input class="form-control @error('subject_ru') is-invalid @enderror"
                                                   autocomplete="off" placeholder="Например: Bakalavr" name="subject_ru" type="text">
                                            @error('subject_ru')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 form-group mb-3">
                                            <label>Meesage(uz)</label>
                                            <input class="form-control @error('message_uz') is-invalid @enderror"
                                                   autocomplete="off" placeholder="Например: Bakalavr" name="message_uz" type="text">
                                            @error('message_uz')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 form-group mb-3">
                                            <label>Meesage(ru)</label>
                                            <input class="form-control @error('message_ru') is-invalid @enderror"
                                                   autocomplete="off" placeholder="Например: Bakalavr" name="message_ru" type="text">
                                            @error('message_ru')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 form-group mb-3">
                                            <label>Email</label>
                                            <input class="form-control @error('email') is-invalid @enderror"
                                                   autocomplete="off" placeholder="Например: Bakalavr" name="email" type="text">
                                            @error('email')
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



    