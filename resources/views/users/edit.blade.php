@extends('layouts.admin')

@section('content')


    <div class="card mt-4 mb-4 border-light shadow">

        <div class="card-header hstack gap-2">
            <span>Editar Usuário</span>

            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm me-1">Listar</a>
                <a href="{{ route('user.show', ['user' => $user->id]) }}" class="btn btn-primary btn-sm me-1">Visualizar</a>
            </span>
        </div>

        <div class="card-body">
            <x-alert/>


    <form action="{{ route('user-update', ['user' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mb-3 mt-3">
            <label for="name" class="col-sm-1 col-form-label col-form-label-sm">Nome</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name" placeholder="Nome Completo"
                       value="{{ old('name', $user->name) }}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="email" class="col-sm-1 col-form-label">E-mail</label>
            <div class="col-sm-10">
                <input type="email" name="email" class="form-control" id="email" placeholder="E-mail do Usuário"
                       value="{{ old('email', $user->email) }}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="col-sm-1 col-form-label">Senha</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control" id="password"
                       placeholder="Senha com min de 6 dígitos" value="{{ old('password') }}">
            </div>
        </div>

        <div class="col-md-12">
            <button type="submit" class="btn btn-success mt-3">Salvar</button>
        </div>

    </form>

@endsection
