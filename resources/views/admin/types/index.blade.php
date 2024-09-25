@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h4 class="mt-2">Lista tipologie di linguaggio</h4>

    @if($errors->any())
        <div class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    @if (session('deleted'))
        <div class="alert alert-success">
            {{session('deleted')}}
        </div>
    @endif

    <form action="{{ route('admin.types.store') }}" method="POST">
        @csrf
        <div class="input-group-text p-2">
            <input type="text" class="form-control" placeholder="Aggiungi un linguaggio" name="name">
            <button type="submit" class="btn btn-warning m-2">Aggiungi</button>
        </div>
          
    </form>

    <ul class="list-group my-3">
        @foreach ($types as $type)
            <li class="list-group-item text-info d-flex justify-content-between">{{ $type->name }} 
                <form action="{{ route('admin.types.destroy', $type) }}" method="POST" onsubmit="return confirm('Sei sicuro di eliminare il progetto {{ $type->name }}?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger " type="submit">Elimina</button>
                </form>
            </li>  
            
        @endforeach
        
    </ul>

</div>
    

@endsection