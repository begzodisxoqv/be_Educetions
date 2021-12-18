@extends('layouts.admin')

@section('title')
   showroom
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Филиалы</h1>
            <ul>
                <li><a href="{{ route('showroom.create') }}">Добавить новую филиалу</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="row m-0 py-3">
                                <div class="col-12">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Название</th>
                                            <th>Эл. адрес</th>
                                            <th>Телефон</th>
                                            <th>Действие</th>
                                        </tr>
                                        </thead>
                                        <tbody class="result">
                                        @foreach($showroom as $showroom)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="text-capitalize">{{ $showroom->title_ru }}</td>
                                                <td class="text-capitalize">{{ $showroom->address_ru }}</td>
                                                <td class="text-capitalize">{{ $showroom->phone }}</td>
                                                <td class="d-flex">
                                                    <a class="text-success mr-2" href="{{ route('showroom.edit', $showroom->id) }}"><i class="nav-icon fas fa-pen font-weight-bold"></i></a>

                                                    <a data-toggle="modal" data-target="#deletesModal{{$showroom->id}}" class="text-danger mr-2" href="#"><i class="nav-icon far fa-times-circle font-weight-bold"></i></a>
                                                    <div class="modal fade" id="deletesModal{{$showroom->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteModal">Удалить пост?</h5>
                                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <ul class="list-group">
                                                                        <li class="list-group-item">
                                                                            <b>Вы действительно хотите удалить?</b>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="{{ route('showroom.destroy', $showroom->id) }}" method="post">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button class="btn btn-danger mr-2 cursor-pointer">Удалить</button>
                                                                    </form>
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Закрыть</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="8" align="center">
                                               
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){

            $(document).on('keyup', '#search', function(){
                var query = $('#search').val();
                fetch_data(query);
            });

            function fetch_data(query)
            {
                $.ajax({
                    url:"brands",
                    type: 'GET',
                    data: {query: query},
                    success:function(data)
                    {
                        $('.result').html('');
                        $('.result').html(data);
                    }
                })
            }
        });
    </script>
@endsection
