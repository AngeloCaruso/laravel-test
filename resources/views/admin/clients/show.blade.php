@extends('layouts.app')

@section('content')
@include('layouts.headers.cards', [
    'route' => 'client.index',
    'main' => 'Clientes',
    'action' => 'Detalle'
])

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Clientes</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{route('client.edit', $client->id)}}" class="btn btn-sm btn-primary">Editar cliente</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <label for="">Código</label>
                            <div class="form-group mb-0">
                                <input type="text" name="code" class="form-control" placeholder="Código" readonly value="{{$client->code}}">
                            </div>
                        </div>
                        <div class="col">
                            <label for="">Nombre</label>
                            <div class="form-group mb-0">
                                <input type="text" name="name" class="form-control" placeholder="Nombre" readonly value="{{$client->name}}">
                            </div>
                        </div>
                        <div class="col">
                            <label for="">Ciudad</label>
                            <div class="form-group mb-0">
                                <input type="text" name="city" class="form-control" placeholder="Nombre" readonly value="{{$client->city->name}}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">

                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush