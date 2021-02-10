@extends('layouts.app')

@section('content')
@include('layouts.headers.cards', [
    'route' => 'client.index',
    'main' => 'Clientes',
    'action' => 'Editar'
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
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('client.update', $client->id)}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col">
                                <label for="">Código</label>
                                <div class="form-group mb-0">
                                    <input type="text" name="code" class="form-control" placeholder="Código" value="{{$client->code}}">
                                    @error('code')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label for="">Nombre</label>
                                <div class="form-group mb-0">
                                    <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{$client->name}}">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label for="">Ciudad</label>
                                <div class="form-group mb-0">
                                    <select name="cities_id" class="form-control">
                                        <option value="" disabled>Seleccione una ciudad</option>
                                        @foreach($cities as $city)
                                        <option value="{{$city->id}}" {{$city->id == $client->city->id ? 'selected' : ''}} > {{$city->name}} </option>
                                        @endforeach
                                    </select>
                                    @error('cities_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label for=""></label>
                                <div class="form-group mt-2 mb-0">
                                    <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
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