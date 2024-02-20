@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('main-content')

<div class="container">
    <div class="row">
        <div class="col-10">
            <h2>
                Welcome to your portfolio, {{ Auth::user()->name }}
            </h2>
        </div>
    </div>
</div>

{{-- inizio parte della tabella per scegliere progetto da visualizzare --}}
<div class="col-10 mx-auto">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Type</th>
                <th scope="col">Technology ID</th>
                <th scope="col">Project</th>
                <th scope="col">Author</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $portfolios as $portfolio )
                <tr>
                    <th scope="row">
                        {{ $portfolio->id }}
                    </th>
                <td>
                    <a href="{{ route('admin.portfolios.show', $portfolio) }}">
                        {{ $portfolio->Project }}
                    </a>
                </td>
                {{-- MODIFICO DATI ALL'INTERNO DEL TYPE_ID IN MODO DA VISUALIZZARE IL CONTENUTO CHE MI INTERESSA --}}
                <td>
                    @foreach ($portfolio->technologies as $techno)
                        {{ $techno->technology }} ,
                    @endforeach
                </td>
                <td>
                    {{ $portfolio->type->name }}
                </td>
                <td>
                    {{ $portfolio->Author }}
                </td>
                <td>
                    {{-- mi permette di scegliere la lunghezza massima che voglio inserire in questa casella --}}
                    {{ substr($portfolio->Description, 0,20)}}
                </td>
                <td class="d-inline-flex">
                    <a href="{{ route('admin.portfolios.show', $portfolio) }}" class="text-decoration-none">
                        <button class="btn btn-sm btn-primary me-3">
                            View
                        </button>
                    </a>
                    <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="text-decoration-none">
                        <button class="btn btn-sm btn-success me-3">
                            Edit
                        </button>
                    </a>
                    <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-warning btn-sm d-inline-block" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $portfolio->id }}">
                            Delete
                        </button>
                    </form>
                    @endforeach
@endsection