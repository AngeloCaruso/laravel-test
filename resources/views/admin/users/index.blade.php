@extends('layouts.app')

@section('content')
@include('layouts.headers.cards', [
    'route' => 'user.index',
    'main' => 'Usuarios',
    'action' => 'Listado'
])

<div class="container-fluid mt--7" id="app">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Users</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{route('user.create')}}" class="btn btn-sm btn-primary">Nuevo usuario</a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Correo electrónico</th>
                                <th scope="col" class="text-center">Fecha de creación</th>
                                <th scope="col" class="text-right">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>
                                    <a href="mailto:{{$user->email}}">{{$user->email}}</a>
                                </td>
                                <td class="text-center">{{$user->created_at->format('d/m/Y')}}</td>
                                <td class="text-right">
                                    <a class="btn btn-sm btn-info" href="{{route('user.show', $user->id)}}" data-toggle="tooltip" data-placement="top" title="Detalle"><i class="far fa-eye"></i></a>
                                    <a class="btn btn-sm btn-warning" href="{{route('user.edit', $user->id)}}" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                                    <button class="btn btn-sm btn-danger" @click="deleteResource({{$user->id}})" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="far fa-trash-alt"></i></button>
                                    <form id="deleteForm_{{$user->id}}" action="{{route('user.destroy', $user->id)}}" method="POST">@csrf @method('delete')</form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{$users->links()}}
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