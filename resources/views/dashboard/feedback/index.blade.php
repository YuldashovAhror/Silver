@extends('layouts.dashboard.main')
@section('content')
<div class="col-sm-6" style="padding-top: 2rem; padding-bottom: 1.5rem">
    <h3>Обратная связь</h3>
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
                    {{-- <th scope="col">Название En</th> --}}
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <?php
                $num = 1;
                ?>
                {{-- @dd($feedbacks) --}}
                <tbody>
                @foreach ($feedbacks as $feedback)
                    <tr>
                        <th scope="row">{{$num++}}</th>
                        <td >{{$feedback->first_name}}</td>
                        <td>{{$feedback->phone}}</td>
                        <td>
                            <button class="btn btn-xs btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $feedback->id }}"><i class="bx bx-trash"></i></button>
                            <div class="modal fade" id="exampleModalCenter{{ $feedback->id }}" tabindex="-1" aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Удалить?</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('feedback.destroy', $feedback->id) }}" method="post">
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