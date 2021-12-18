@extends('layouts.admin')

@section('title')
    Banners
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Редактирование обо мне</h1>
            <ul>
                <li><a href="{{ route('banners.index') }}">Все данные</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('banners.update', $banners->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label>Title_1_ (uz)</label>
                                        <input class="form-control @error('title_1_uz') is-invalid @enderror" value="{{ $banners->title_1_uz }}"
                                            autocomplete="off" placeholder="Например: Title" name="title_1_uz" type="text">
                                    @error('title_1_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Title_1_ (ru)</label>
                                        <input class="form-control @error('title_1_ru') is-invalid @enderror" value="{{ $banners->title_1_ru }}"
                                            autocomplete="off" placeholder="Например: Title" name="title_1_ru" type="text">
                                    @error('title_1_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Title_2_ (uz)</label>
                                        <input class="form-control @error('text_2_uz') is-invalid @enderror" value="{{ $banners->title_2_uz }}"
                                            autocomplete="off" placeholder="Например: Title" name="title_2_uz" type="text">
                                    @error('title_2_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Title_2_ (ru)</label>
                                        <input class="form-control @error('title_2_ru') is-invalid @enderror"  value="{{ $banners->title_2_ru }}"
                                            autocomplete="off" placeholder="Например: Title" name="title_2_ru" type="text">
                                    @error('title_2_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>





                                <div class="col-12 form-group mb-3">
                                    <label>Text(uz)</label>
                                    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
                                    <textarea class="form-control @error('text_uz') is-invalid @enderror" name="text_uz">{!! $banners->text_uz !!}</textarea>
                                    <script>
                                        CKEDITOR.replace('text_uz', {
                                                filebrowserUploadUrl: "{{ route('admin.banners.upload', ['_token' => csrf_token() ]) }}",
                                                filebrowserUploadMethod: 'form'
                                            }
                                        );
                                    </script>
                                </div>

                                <div class="col-12 form-group mb-3">
                                    <label>Text (ru)</label>
                                    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
                                    <textarea class="form-control @error('text_ru') is-invalid @enderror" name="text_ru">{!! $banners->text_ru !!}</textarea>
                                    <script>
                                        CKEDITOR.replace('text_ru', {
                                                filebrowserUploadUrl: "{{ route('admin.banners.upload', ['_token' => csrf_token() ]) }}",
                                                filebrowserUploadMethod: 'form'
                                            }
                                        );
                                    </script>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>link </label>
                                    <input class="form-control @error('link') is-invalid @enderror" value="{!! $banners->link !!}"
                                           autocomplete="off" placeholder="Например:Link" name="link" type="text">
                                    @error('link')
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

