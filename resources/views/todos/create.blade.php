@extends('layouts.app')

@section('title', 'Tambah Todo')

@section('content')
    <h1>Tambah Todo Baru</h1>

    <div class="card mt-4">
        <div class="card-body">
            <form method="POST" action="/todos">
                @csrf

                <div class="mb-3">
                    <label for="todo" class="form-label">Judul Todo</label>
                    <input type="text" class="form-control" id="todo" name="todo" required>
                </div>


                <button type="submit" class="btn btn-primary">Simpan Todo</button>
                <a href="/todos" class="btn btn-secondary">Batal</a>
            </form>

            @if(session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
@endsection
