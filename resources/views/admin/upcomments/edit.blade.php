@extends('layouts.admin')

@section('title')
Upcomingmeetings
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Редактирование обо мне</h1>
            <ul>
                <li><a href="{{ route('upcomments.index') }}">Все данные</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('upcomments.update',  $upcomments->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label>Title (uz)</label>
                                    <input class="form-control @error('title_uz') is-invalid @enderror"value="{{ $upcomments->title_uz }}"
                                           autocomplete="off" placeholder="Например: Bakalavr" name="title_uz" type="text">
                                    @error('title_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Title (ru)</label>
                                    <input class="form-control @error('title_ru') is-invalid @enderror"value="{{ $upcomments->title_ru }}"
                                           autocomplete="off" placeholder="Например: Bakalavr" name="title_ru" type="text">
                                    @error('title_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-12 form-group mb-3">
                                    <label>Text(uz)</label>
                                    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
                                    <textarea class="form-control @error('text_uz') is-invalid @enderror" name="text_uz">{!! $upcomments->text_uz !!}</textarea>
                                    <script>
                                        CKEDITOR.replace('text_uz', {
                                                filebrowserUploadUrl: "{{ route('admin.text.upload', ['_token' => csrf_token() ]) }}",
                                                filebrowserUploadMethod: 'form'
                                            }
                                        );
                                    </script>
                                </div>



                                <div class="col-12 form-group mb-3">
                                    <label>Text(ru)</label>
                                    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
                                    <textarea class="form-control @error('text_ru') is-invalid @enderror" name="text_ru">{!! $upcomments->text_ru !!}</textarea>
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
                                  <input class="form-control @error('price') is-invalid @enderror"value="{{ $upcomments->price }}"
                                         autocomplete="off" placeholder="Например: Бакалавр" name="price" type="price">
                                  @error('price')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                              </div>

                              <div class="col-md-6 form-group mb-3">
                                  <label>Data</label>
                                  <input class="form-control @error('data') is-invalid @enderror"value="{{ $upcomments->data }}"
                                         autocomplete="off" placeholder="Например: Бакалавр" name="data" type="data">
                                  @error('data')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                              </div>


                              <div  class="col-md-6 form-group mb-3">
                                <label>Month</label>
                                <select required name="type" class="form-control">
                                    <option  value="">Month..</option>
                                    <option {{ $upcomments->type == 'yan'  ? 'selected' : '' }} value="yan">Yan</option>
                                    <option {{ $upcomments->type == 'Fev' ? 'selected' : '' }} value="Fev">Fev</option>
                                    <option {{ $upcomments->type == 'Mar' ? 'selected' : '' }} value="Mar">Mar</option>
                                    <option {{ $upcomments->type == 'Apr' ? 'selected' : '' }} value="Apr">Apr</option>
                                    <option {{ $upcomments->type == 'May' ? 'selected' : '' }} value="May">May</option>
                                    <option {{ $upcomments->type == 'Iyun' ? 'selected' : '' }} value="Iyun">Iyun</option>
                                    <option {{ $upcomments->type == 'Iyul' ? 'selected' : '' }} value="Iyul">Iyul</option>
                                    <option {{ $upcomments->type == 'sen' ? 'selected' : '' }} value="Sen"</option>
                                    <option {{ $upcomments->type == 'Okt' ? 'selected' : '' }} value="Okt">Okt</option>
                                    <option {{ $upcomments->type == 'Dek' ? 'selected' : '' }} value="Dek">Dek</option>
                                    <option {{ $upcomments->type == 'Nav' ? 'selected' : '' }} value="Nav">Nav</option>        
                                </select>
                               
                            </div>

                                 <div  class="col-md-6 form-group mb-3">
                                    <label>Тип</label>
                                    <select required name="choose" class="form-control">
                                        <option selected>Выберите...</option>
                                        <option {{ $upcomments->choose == 'soon'? 'selected' : '' }} value="soon">SOON</option>
                                        <option {{ $upcomments->choose == 'imp' ? 'selected' : '' }} value="imp">IMPORTANT</option>
                                        <option {{ $upcomments->choose == 'att' ? 'selected' : '' }} value="att">ATTRACTIVE</option>
                                        
                                    </select>  
                                </div>

                                <div class="col-12 form-group mb-3">
                                    <img src="{{ asset( 'storage/' . $upcomments->image) }}" class="img-fluid"
                                         style="width: 200px;">
                                </div>

                                <div class="col-12 form-group mb-3" style="padding-top:30px;">
                                    <strong>Выберите изображению:</strong>
                                    <br/>
                                    <input type="file" name="image">
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

