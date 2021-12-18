@extends('layouts.admin')

@section('title')
Upcomingmeetings
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Добавить новую категорию</h1>
            <ul>
                <li><a href="{{ route('upcomments.index') }}">Все категории</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('upcomments.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label>Title(uz)</label>
                                    <input class="form-control @error('title_uz') is-invalid @enderror" name="title_uz"
                                           type="text" placeholder="Введите название на русском">
                                    @error('title_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Title (ru)</label>
                                    <input class="form-control @error('title_ru') is-invalid @enderror" name="title_ru"
                                           type="text" placeholder="Введите название на узбекском">
                                    @error('title_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-12 form-group mb-3">
                                    <label>Text (uz)</label>
                                    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
                                    <textarea class="form-control @error('text_uz') is-invalid @enderror" name="text_uz"></textarea>
                                    <script>
                                        CKEDITOR.replace('text_uz', {
                                                filebrowserUploadUrl: "{{ route('admin.text.upload', ['_token' => csrf_token() ]) }}",
                                                filebrowserUploadMethod: 'form'
                                            }
                                        );
                                    </script>
                                </div>

                                <div class="col-12 form-group mb-3">
                                    <label>Text (ru)</label>
                                    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
                                    <textarea class="form-control @error('text_ru') is-invalid @enderror" name="text_ru"></textarea>
                                    <script>
                                        CKEDITOR.replace('text_ru', {
                                                filebrowserUploadUrl: "{{ route('admin.text.upload', ['_token' => csrf_token() ]) }}",
                                                filebrowserUploadMethod: 'form'
                                            }
                                        );
                                    </script>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Price</label>
                                    <input class="form-control @error('price') is-invalid @enderror" name="price"
                                           type="text" placeholder="Price">
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Data</label>
                                    <input class="form-control @error('data') is-invalid @enderror" name="data"
                                           type="text" placeholder="data">
                                    @error('data')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                    
                                <div class="col-md-6 form-group mb-3">
                                    <label>Month</label>
                                    <select  name="type" class="form-control">
                                        <option selected>Month...</option>
                                        <option value="@lang('main.yan')">Yan</option>
                                        <option value="Fev">Fev</option>
                                        <option value="Mar">Mar</option>
                                        <option value="Apr">Apr</option>
                                        <option value="May">May</option>
                                        <option value="Iyun">Iyun</option>
                                        <option value="Iyul">Iyul</option>
                                        <option value="Avgust">Avgust</option>
                                        <option value="@lang('main.sen')">@lang('main.sen')</option>
                                        <option value="Okt">Okt</option>
                                        <option value="Dek">Dek</option>
                                        <option value="Nav">Nav</option>
                                    </select>
                                </div>

                                 <div  class="col-md-6 form-group mb-3">
                                    <label>Тип</label>
                                    <select  name="choose" class="form-control">
                                        <option selected>Выберите...</option>
                                        <option value="soon">SOON</option>
                                        <option value="imp">IMPORTANT</option>
                                        <option value="att">ATTRACTIVE</option>
                                    </select>
                                </div>

                                <div class="col-12 form-group mb-3" style="padding-top:30px;">
                                    <strong>Выберите изображению:</strong>
                                    <br/>
                                    <input type="file" name="image" required >
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

