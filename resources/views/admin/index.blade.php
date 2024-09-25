@extends('layouts.app')

@section('content')
<div>

    <div>
        
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <h2 class="text-center">Benvenuto nella pagina admin del tuo portfolio</h2>
    </div>
</div>
@endsection

{{-- <div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif --}}
