@extends('layouts.dashboard.main')
@section('content')
<div class="col-sm-6" style="padding-top: 2rem; padding-bottom: 1.5rem">
    <h3>Заказать</h3>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card-header">
            <h5>Список</h5>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Выберите область</th>
                    <th scope="col">Бренд</th>
                    <th scope="col">Продукт название</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <?php
                $num = 1;
                ?>
                {{-- @dd($orders) --}}
                <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <th scope="row">{{$num++}}</th>
                        <td >{{$order->name}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->location->name_ru}}</td>
                        <td>{{$order->brend->name}}</td>
                        <td>{{$order->product->name_ru}}</td>
                        <td>
                            <button class="btn btn-xs btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $order->id }}"><i class="bx bx-trash"></i></button>
                            <div class="modal fade" id="exampleModalCenter{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Удалить?</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('korzina.destroy', $order->id) }}" method="post">
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

@endsection