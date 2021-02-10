@extends('layouts.app')

@section('content')
@include('layouts.headers.cards', [
'route' => 'home',
'main' => 'Home',
'action' => 'Welcome'
])

<div class="container-fluid mt--7">
    <div class="card shadow">
        <div class="card-body">
            <h1 align="center">Panel administrativo</h1>
        </div>
    </div>
    @include('layouts.footers.auth')
</div>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush