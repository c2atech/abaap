@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 18px;
        }

        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            margin: 30px 0;
            border-radius: 3px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 15px;
            padding: 16px 30px;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }

        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }

        .table-title .btn-group {
            float: right;
        }

        .table-title .btn {
            color: #fff;
            float: right;
            font-size: 16px;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }

        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }

        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }

        table.table tr th:first-child {
            width: 60px;
        }

        table.table tr th:last-child {
            width: 100px;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }

        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }

        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
            outline: none !important;
        }

        table.table td a:hover {
            color: #2196F3;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #F44336;
        }

        table.table td i {
            font-size: 19px;
        }

        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }

        .pagination {
            float: right;
            margin: 0 0 5px;
        }

        .pagination li a {
            border: none;
            font-size: 16px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }

        .pagination li a:hover {
            color: #666;
        }

        .pagination li.active a,
        .pagination li.active a.page-link {
            background: #03A9F4;
        }

        .pagination li.active a:hover {
            background: #0397d6;
        }

        .pagination li.disabled i {
            color: #ccc;
        }

        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }

        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 16px;
        }

        /* Custom checkbox */
        .custom-checkbox {
            position: relative;
        }

        .custom-checkbox input[type="checkbox"] {
            opacity: 0;
            position: absolute;
            margin: 5px 0 0 3px;
            z-index: 9;
        }

        .custom-checkbox label:before {
            width: 18px;
            height: 18px;
        }

        .custom-checkbox label:before {
            content: '';
            margin-right: 10px;
            display: inline-block;
            vertical-align: text-top;
            background: white;
            border: 1px solid #bbb;
            border-radius: 2px;
            box-sizing: border-box;
            z-index: 2;
        }

        .custom-checkbox input[type="checkbox"]:checked+label:after {
            content: '';
            position: absolute;
            left: 6px;
            top: 3px;
            width: 6px;
            height: 11px;
            border: solid #000;
            border-width: 0 3px 3px 0;
            transform: inherit;
            z-index: 3;
            transform: rotateZ(45deg);
        }

        .custom-checkbox input[type="checkbox"]:checked+label:before {
            border-color: #03A9F4;
            background: #03A9F4;
        }

        .custom-checkbox input[type="checkbox"]:checked+label:after {
            border-color: #fff;
        }

        .custom-checkbox input[type="checkbox"]:disabled+label:before {
            color: #b8b8b8;
            cursor: auto;
            box-shadow: none;
            background: #ddd;
        }

        /* Modal styles */
        .modal .modal-dialog {
            max-width: 400px;
        }

        .modal .modal-header,
        .modal .modal-body,
        .modal .modal-footer {
            padding: 20px 30px;
        }

        .modal .modal-content {
            border-radius: 3px;
        }

        .modal .modal-footer {
            background: #ecf0f1;
            border-radius: 0 0 3px 3px;
        }

        .modal .modal-title {
            display: inline-block;
        }

        .modal .form-control {
            border-radius: 2px;
            box-shadow: none;
            border-color: #dddddd;
        }

        .modal textarea.form-control {
            resize: vertical;
        }

        .modal .btn {
            border-radius: 2px;
            min-width: 100px;
        }

        .modal form label {
            font-weight: normal;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            // Activate tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // Select/Deselect checkboxes
            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function() {
                if (this.checked) {
                    checkbox.each(function() {
                        this.checked = true;
                    });
                } else {
                    checkbox.each(function() {
                        this.checked = false;
                    });
                }
            });
            checkbox.click(function() {
                if (!this.checked) {
                    $("#selectAll").prop("checked", false);
                }
            });
        });
    </script>
</head>

<body>
    <div class="container sm-12 md-6">
        <div class="table-wrapper container">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Lista de <b>Postagens </b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Criar novo Post</span></a>
                        <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Excluir Post</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover ">
                <thead>
                    <tr>

                        <th>Título</th>
                        <th>Subtítulo</th>
                        <th>Descrição</th>
                        <th>Imagem</th>
                        <th>Criação</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @forelse($posts as $post)
                        <td>{{$post->titulo}}</td>
                        <td>
                            {{$post->subtitulo}}
                            </a>
                        </td>
                        <td>{{$post->descricao}}</td>
                        <td><img height="250" src="{{asset($post->imagem)}}" alt="{{$post->titulo}}"</></td>
                        <td>{{$post->created_at}}</td>
                        <td>
                            <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">
                            <h2>Nenhum Post encontrado</h2>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="clearfix">
                {{$posts->links()}}
            </div>
        </div>
        <!-- Create Modal HTML -->
        <div id="addEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{route('posts.create')}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="modal-header">
                            <h4 class="modal-title">Criar novo post</h4>
                            @csrf
                        </div>
                        <div class="modal-body">
                        <div class="file-field input-field">
      <div class="btn blue">
          <span>imagem</span>
        <input type="file" name="imagem">
      </div>

      <div class="file-path-wrapper">
           <input class="file-path validate" type="text">
         </div>
       </div>

    
                            <div class="form-group">
                                <label>Titulo</label>
                                <input type="text" class="form-control" name="titulo" required>
                            </div>
                            <div class="form-group">
                                <label>Sub titulo</label>
                                <input type="text" class="form-control" name="subtitulo" required>
                            </div>
                            <div class="form-group">
                                <label>Descrição</label>
                                <textarea class="form-control" name="descricao" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Texto</label>
                                <input type="text" class="form-control" name="texto" required>
                            </div>
                            <div class="form-group">
                                <label>Autor</label>
                                <input type="text" class="form-control" name="autor" required>
                            </div>
                            <div class="form-group">
                                <label>Tipo</label>
                                <input type="text" class="form-control" name="tipo" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-success" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Edit Modal HTML -->
        <div id="editEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                <form action="{{route('posts.atualizar', $post->id)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
        <input type="hidden" name="_method" value="put">
                        <div class="modal-header">
                            <h4 class="modal-title">Editar Postagem</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">

                        <div class="file-field input-field">
      <div class="btn blue">
          <span>imagem</span>
        <input type="file" name="imagem">
      </div>

      <div class="file-path-wrapper">
           <input class="file-path validate" type="text">
         </div>
       </div>

       @if (isset($registro->imagem))
       <div class="input-field">
         <img width="150" src="{{asset($post->imagem)}}">
       </div>
     @endif





                            <div class="form-group">
                                <label>titulo</label>
                                <input type="text" class="form-control" required   value="{{isset($post->titulo) ? $post->titulo : ''}}">
                            </div>
                            <div class="form-group">
                                <label>Sub titulo</label>
                                <input type="text" class="form-control" required value="{{isset($post->subtitulo) ? $post->subtitulo : ''}}">
                            </div>
                            <div class="form-group">
                                <label>Descrição</label>
                                <input type="text" class="form-control" required value="{{isset($post->subtitulo) ? $post->subtitulo : ''}}">
                            </div>
                            <div class="form-group">
                                <label>Texto</label>
                                <textarea class="form-control" required value="{{isset($post->texto) ? $post->texto : ''}}"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Autor</label>
                                <input type="text" class="form-control" required value="{{isset($post->autor) ? $post->autor : ''}}" >
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-info" value="atualizar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Delete Modal HTML -->
        <div id="deleteEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{route('posts.delete',$post->id)}}">
                        <div class="modal-header">
                            <h4 class="modal-title">Deletar Postagem</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>Tem certeza que deseja apagar todos os registros dessa postagem?</p>
                            <p class="text-warning"><small>Essa ação não poderá ser desfeita.</small></p>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                            <input type="submit"  class="btn btn-danger" value="Deletar">
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>

</html>
@endsection