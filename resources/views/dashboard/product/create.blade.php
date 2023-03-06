@extends('layouts.dashboard.main')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header pb-0">
                <h5>Добавить продукт</h5>
            </div>
            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Фотографии продукта</label>
                                <div class="col-12 text-center">
                                    <i data-feather="loader" style="height: 100px; width: 100px"></i>
                                </div>
                                <input class="form-control" id="exampleFormControlInput1" required= "" type="file" name="photos[]" multiple>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4">
                            <label class="form-label" for="name_uz">Название Uz</label>
                            <input class="form-control" id="name_uz" required type="text" name="name_uz">
                        </div>
                        <div class="col-4">
                            <label class="form-label" for="name_ru">Название Ru</label>
                            <input class="form-control" id="name_ru" required type="text" name="name_ru">
                        </div>
                        <div class="col-4">
                            <label class="form-label" for="price">Цена</label>
                            <input class="form-control" id="price" required type="text" name="price">
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
@endsection