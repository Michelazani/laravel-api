@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-12 mx-auto text-center">
            <h2>
                {{ $portfolio->Project }}
            </h2>
        </div>
        <div class="col-5 mx-auto ">
            <h2 scope="row">
                {{ $portfolio->id }}
            </h2>
            <p>
                <b>Type:</b> {{ $portfolio->type->name}}
            </p>
            <p>
                <b>Technology:</b>
                @foreach ($portfolio->technologies as $technology)
                    {{ $technology->technology }} , 
                 @endforeach            
            <p>
                <b>Author:</b> {{ $portfolio->Author }}
            </p>
            <p>
                <b>Brief description of the Project:</b> <br>  {{ $portfolio->Description }}
            </p>
            <div class="d-inline-flex">
                <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="text-decoration-none">
                    <button class="btn btn-sm btn-success me-3">
                        Edit
                    </button>
                </a>
                <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-warning btn-sm " data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $portfolio->id }}">
                        Delete
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection