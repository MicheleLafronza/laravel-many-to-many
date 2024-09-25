@extends('layouts.app')

@section('content')

<div class="card container-fluid">
    <div class="card-body">
      <h5 class="card-title">Titolo: {{ $project->title }}</h5>
      <h6 class="card-subtitle mb-2 text-body-secondary">Cliente: {{ $project->client }}</h6>
      <h6 class="card-subtitle mb-2 text-body-secondary">Slug: {{ $project->slug }}</h6>
      <p class="card-text">Descrizione: {{ $project->description }}</p>
      <p class="card-text">Tipo di Linguaggio: {{ $project->type?->name }}</p>
      <h6 class="card-subtitle mb-2 text-body-secondary">Tecnologie:</h6>
        @if($project->technologies)
        <ul class="list-group">
          @foreach ($project->technologies as $tech)
          <li class="list-group-item">{{ $tech->name }}</li>
          @endforeach
        </ul>
        @else
        <p class="card-text">Nessuna</p>
        @endif
      <a href="{{ route('admin.project.index') }}" class="card-link">Torna all'elenco</a>
    </div>
  </div>

@endsection