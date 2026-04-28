@extends('layouts.app')
@section('title', 'Edit Todo')

@section('content')
<h1>Edit Todo</h1>
<div class="card mt-4">
    <div class="card-body">
        <form method="POST" action="/todos/{{ $todo['id'] }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="todo" class="form-label">Judul Todo</label>
                <input type="text" class="form-control" id="todo" name="todo"
                value="{{ $todo['todo'] }}" required>
                <select name="status" id="status" class="form-control">
                    <option value="Aktif" {{ $todo['status'] === 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Nonaktif" {{ $todo['status'] === 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    <option value="Selesai" {{ $todo['status'] === 'Selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Todo</button>
            <a href="/todos" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection