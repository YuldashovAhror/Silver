@extends('layouts.dashboard.main')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header pb-0">
                <h5>Добавить область</h5>
            </div>
            <form action="{{ route('location.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Название Uz</label>
                                <input class="form-control" id="exampleFormControlInput1" type="text" name="name_uz">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Название Ru</label>
                                <input class="form-control" id="exampleFormControlInput1" type="text" name="name_ru">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <h5>Все область</h5>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название Uz</th>
                        <th scope="col">Название Ru</th>
                        <th scope="col" class="text-center">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($locations as $key=>$location)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $location->name_uz }}</td>
                            <td>{{ $location->name_ru }}</td>
                            <td class="text-center">
                                <button class="btn btn-xs btn-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $location->id }}Edit"><i class="bx bx-pencil"></i></button>
                                <div class="modal fade" id="exampleModalCenter{{ $location->id }}Edit" tabindex="-1" aria-labelledby="exampleModalCenter" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 50vw">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Изменить</h5>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('location.update', $location->id) }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    {{ method_field('put') }}
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="name">Название Uz</label>
                                                                    <input class="form-control" id="name" type="text" name="name_uz" value="{{ $location->name_uz }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="name">Название Ru</label>
                                                                    <input class="form-control" id="name" type="text" name="name_ru" value="{{ $location->name_ru }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-end">
                                                        <button class="btn btn-primary" type="submit">Изменить</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-xs btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $location->id }}"><i class="bx bx-trash"></i></button>
                                <div class="modal fade" id="exampleModalCenter{{ $location->id }}" tabindex="-1" aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Удалить?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('location.destroy', $location->id) }}" method="post">
                                                    @csrf
                                                    {{ method_field('delete') }}
                                                    <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Да</button>
                                                </form>
                                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" data-bs-original-title="" title="">Нет</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection