@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!
                </div>



                <div class="body container">
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Titulo da postagem</label>
                            <input type="email" class="form-control" id="titulo" placeholder="Titulo">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Tipo</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>Notícia</option>
                                <option>Eventos</option>
                                <option>Doações</option>
                                <option>Ações</option>
                                <option>Parceiros</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Texto</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
