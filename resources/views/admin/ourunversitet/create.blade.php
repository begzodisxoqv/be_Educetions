@extends('layouts.admin')

@section('title')
  Ourunversitets
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Добавить новые данные</h1>
            <ul>
                <li><a style="color: blue; border-bottom: 1px solid blue "  href="{{ route('ourunversitet.index') }}">Ortga qaytish</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('ourunversitet.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                            
                                <div class="col-md-6 form-group mb-3">
                                    <label>Text_uz</label>
                                    <input class="form-control @error('text_uz') is-invalid @enderror"
                                           autocomplete="off" placeholder="Например: 33 Text" name="text_uz" type="text">
                                    @error('text_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Text_ru</label>
                                    <input class="form-control @error('text_ru') is-invalid @enderror"
                                           autocomplete="off" placeholder="Например: 33 Text" name="text_ru" type="text">
                                    @error('text_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                              
                                <div class="col-md-6 form-group mb-3">
                                    <label>number </label>
                                    <input class="form-control @error('number') is-invalid @enderror"
                                           autocomplete="off" placeholder="Например: Price" name="number" type="text">
                                    @error('number')
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



    