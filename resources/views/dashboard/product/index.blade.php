@extends('layouts.dashboard.main')
@section('content')
<div class="tab-content p-3 text-muted">
    <div class="row">
        <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Все продукты</h5>
            </div>
            <div class="card-body">
                <div class="tab-content p-3 text-muted">
                        <div class="tab-panel"  role="tabpanel">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Фото</th>
                                    <th scope="col">Название</th>
                                    <th scope="col">Цена</th>
                                    <th scope="col" class="text-center">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                    {{-- @dd($products) --}}
                                    @php($k=1)
                                    @foreach($products as $product)
                                        <tr>
                                            <th scope="row">{{ $k }}</th>
                                            <td><img src="{{ $product->photos[0] }}" alt="" style="height: 100px; width: 100px"></td>
                                            <td>{{ $product->name_ru }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td style=" display: flex; justify-content: center; ">
                                                <a href="{{ route('product.edit', $product) }}">
                                                    <button class="btn btn-xs btn-success">
                                                        <i class="bx bx-pencil"></i>
                                                    </button>
                                                </a>
                                                <button class="btn btn-xs btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $product->id }}"><i class="bx bx-trash"></i></button>
                                                <div class="modal fade" id="exampleModalCenter{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Удалить?</h5>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('product.destroy', $product->id) }}" method="post">
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
                                        @php($k++)
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    <div class="table-responsive">
                    </div>
                </div>
            </div>
    </div>
</div>
    </div>
</div>

@endsection