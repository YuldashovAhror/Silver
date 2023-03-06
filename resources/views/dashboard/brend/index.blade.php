@extends('layouts.dashboard.main')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header pb-0">
                <h5>Добавить Бренд</h5>
            </div>
            <form action="{{ route('brend.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Название</label>
                                <input class="form-control" id="exampleFormControlInput1" type="text" name="name">
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
                        <h5>Все Бренд</h5>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название</th>
                        <th scope="col" class="text-center">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brends as $key=>$brend)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $brend->name }}</td>
                            <td class="text-center">
                                <button class="btn btn-xs btn-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $brend->id }}Edit"><i class="bx bx-pencil"></i></button>
                                <div class="modal fade" id="exampleModalCenter{{ $brend->id }}Edit" tabindex="-1" aria-labelledby="exampleModalCenter" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 50vw">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Изменить</h5>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('brend.update', $brend->id) }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    {{ method_field('put') }}
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="name">Название</label>
                                                                    <input class="form-control" id="name" type="text" name="name" value="{{ $brend->name }}">
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

                                <button class="btn btn-xs btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $brend->id }}"><i class="bx bx-trash"></i></button>
                                <div class="modal fade" id="exampleModalCenter{{ $brend->id }}" tabindex="-1" aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Удалить?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('brend.destroy', $brend->id) }}" method="post">
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