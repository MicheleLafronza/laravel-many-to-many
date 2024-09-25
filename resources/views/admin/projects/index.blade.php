@extends('layouts.app')

@section('content')

@if (count($projects) === 0)

    <h1>Nessun progetto listato.</h1>

@else
    


@if (session('deleted'))
 <div class="alert alert-success" role="alert"> {{ session('deleted') }}</div>
@endif


    <div
        class="table-responsive m-5"
    >
        <table
            class="table table-primary"
        >
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome Progetto</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Tipo di linguaggio</th>
                    <th scope="col">Techs</th>
                    <th scope="col">Tools</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->client }}</td>
                        <td>{{ $project->type?->name }}</td>
                        <td>
                            @if ($project->technologies)
                            <ul class="list-group">
                                @foreach ($project->technologies as $tech)
                                    <li class="list-group-item">{{ $tech->name }}</li>
                                @endforeach
                            </ul>
                            @else
                                <span>-</span>
                            @endif
                            
                        </td>
                        <td>
                            <a href="{{ route('admin.project.show', $project->id) }}" class="btn btn-primary">Details</a>
                            <a href="{{ route('admin.project.edit', $project->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.project.destroy', $project) }}" method="POST" onsubmit="return confirm('Sei sicuro di eliminare il progetto {{ $project->title }}?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Elimina</button>
                            </form>
                        </td>
                    </tr>    
                @endforeach
                
            </tbody>
        </table>
    </div>
@endif
    
@endsection