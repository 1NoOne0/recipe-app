@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ $recipe->title }}</div>
        <div class="card-body">
            <p><strong>Description:</strong> {{ $recipe->description }}</p>
            <p><strong>Ingredients:</strong> {{ $recipe->ingredients }}</p>
            <p><strong>Steps:</strong> {{ $recipe->steps }}</p>
            @if ($recipe->image)
                <img src="{{ asset('storage/' . $recipe->image) }}" class="img-fluid" alt="Recipe Image">
            @endif
        </div>
    </div>
</div>
@endsection
