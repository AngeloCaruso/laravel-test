@extends('layouts.app')

@section('content')
@include('layouts.headers.cards', [
    'route' => 'client.index',
    'main' => 'Clientes',
    'action' => 'Listado'
])

<div class="container-fluid mt--7" id="app">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-7">
                            <h3 class="mb-0">Clientes</h3>
                        </div>
                        <div class="col-3 text-right">
                            <form id="filterByCityForm" action="{{route('client.index')}}">
                                <select name="city_id" @change="filterByCity()" class="form-control form-control-sm">
                                    <option value="">Todas las ciudades</option>
                                    @foreach($cities as $city)
                                    <option value="{{$city->id}}" {{$city->id == request()->city_id ? 'selected' : ''}}>{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                        <div class="col-2 text-right">
                            <a href="{{route('client.create')}}" class="btn btn-sm btn-primary btn-block">Nuevo cliente</a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Codigo</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Ciudad</th>
                                <th scope="col" class="text-center">Fecha de creación</th>
                                <th scope="col" class="text-right">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                            <tr>
                                <td>{{$client->code}}</td>
                                <td>{{$client->name}}</td>
                                <td>{{$client->city->name}}</td>
                                <td class="text-center">{{$client->created_at->format('d/m/Y')}}</td>
                                <td class="text-right">
                                    <a class="btn btn-sm btn-info" href="{{route('client.show', $client->id)}}" data-toggle="tooltip" data-placement="top" title="Detalle"><i class="far fa-eye"></i></a>
                                    <a class="btn btn-sm btn-warning" href="{{route('client.edit', $client->id)}}" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                                    <button class="btn btn-sm btn-danger" @click="deleteResource({{$client->id}})" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="far fa-trash-alt"></i></button>
                                    <form id="deleteForm_{{$client->id}}" action="{{route('client.destroy', $client->id)}}" method="POST">@csrf @method('delete')</form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{$clients->links()}}
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