@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4">Item Details</h1>
            <a href="{{ route('items.index') }}" class="btn btn-secondary mb-3">Back to List</a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Item ID: {{ $item->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $item->name }}</h5>
            <p class="card-text"><strong>Description:</strong> {{ $item->description }}</p>
            <p class="card-text"><strong>Price:</strong> {{ $item->price }}</p>
            <p class="card-text"><strong>Stock:</strong> {{ $item->stock }}</p>
            <p class="card-text"><strong>Category:</strong> {{ $item->category ? $item->category->name : 'N/A' }}</p>
            <p class="card-text"><strong>Supplier:</strong> {{ $item->supplier ? $item->supplier->name : 'N/A' }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
