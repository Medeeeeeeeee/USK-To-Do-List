@extends('layouts.app')

@section('title', 'Daftar Todo')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Daftar Todo</h1>
        <a href="/todos/create" class="btn btn-primary">+ Tambah Todo</a>
    </div>

 

    @if(!empty($todos) && count($todos) > 0)
        <div class="list-group">
            @foreach($todos as $todo)
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <h5>{{ $todo['todo'] }}</h5>
                        <span class="badge bg-secondary">{{ $todo['status'] }}</span>
                    </div>
                    <div>
                       
                        <a href="/todos/{{ $todo['id'] }}/edit" class="btn btn-sm btn-warning">Edit</a>
                        <form method="POST" action="/todos/{{ $todo['id'] }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">Belum ada todo. Yuk tambah todo pertama!</div>
    @endif
@endsection
