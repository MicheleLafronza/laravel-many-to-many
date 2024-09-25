{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.app')

@section('content')

<div class="container my-5">

    <h1 class="text-center">Inserisci un nuovo progetto</h1>

    @if($errors->any())

        <div class="alert alert-dark" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>    
        </div>

    @endif

<form action="{{ route('admin.project.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
        @error('title')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
    </div>

    <h3>Aggiungi tecnologie</h3>
    @foreach ($technologies as $tech)
    <div class="form-check mt-2">
        <input class="form-check-input" type="checkbox" value="{{ $tech->id }}" name="technologies[]" id="technology-{{ $tech->id }}" @if(in_array('technology-id', old('technologies', []))) checked @endif>
        <label class="form-check-label" for="technology-{{ $tech->id }}">
          {{ $tech->name }}
        </label>
    </div>
    
    @endforeach
    

    <div class="mb-3">
        <label for="type" class="form lable">Tipo di linguaggio:</label>
        <select name="type_id" class="form-select" aria-label="Default select example">
            <option selected value="">Scegli la tipologia</option>
            @foreach ($types as $type)
            <option value="{{ $type->id }}"
                @if(old('type_id') === $type->id) selected @endif
                >{{ $type->name }}</option>    
            @endforeach
        </select>
    </div>
    @error('title')
        <small class="text-danger"> {{ $message }}</small>
    @enderror
    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" >{{ old('description')}}</textarea>
        @error('description')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="client" class="form-label">Cliente</label>
        <input type="text" class="form-control @error('client') is-invalid @enderror" id="client" name="client" value="{{ old('client') }}">
        @error('client')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>




@endsection