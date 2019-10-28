@extends('baseAdmin')
@section('pageTitle')
<h1>Categorias de Eventos</h1>
@endsection
@section('breadcrumbLinks')
<li class="breadcrumb-item"><a class="general-links" href="{{ route('dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item active">Categorias de Evento</li>
@endsection
@section('pageContent')
@if (session('status'))
<div class="alert alert-success alert-dismissible fade show message-alert" id="alert" role="alert">
    {{ session('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show message-alert" id="alert" role="alert">
    {{session('error')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="cards-category-list">
    @foreach ($categoryData as $category)
    <div class="card-category edit" data-toggle="modal" data-target="#editCategoryModal" data-value="{{$category->id
    }}" data-active="{{$category->active}}">

        <div class="card-category_image"> <img @if($category->active)src="{{asset('assets/images/category.png')}}" @else
            src="{{asset('assets/images/category-inative.png')}}" @endif/> </div>
        <div class="card-category_title title-white">

            <p class="title-white">{{$category->name}}</p>
        </div>
    </div>
    @endforeach
    <div class="card-category">
        <div class="card-category_image"> <img src="{{asset('assets/images/category-create.png')}}" /> </div>
        <div class="card-category_label title-white">

            <p class="title-black">Não encontrou a categoria de eventos que procurava?</p>
            <button class="btn btn-app-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Cadastrar
                Categoria</button>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('createEventCategory') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cadastrar Categoria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true"><i class="ti-close"></i></span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="name">Nome da Categoria</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Nome da Categoria" required>
                            </div>
                        </div>

                        <div class="switches">
                            <div class="form-row ">

                                <div class="form-group ">
                                    <label class="switch">
                                        <input name="active" value="true" type="checkbox" checked>
                                        <span class="slider round"></span>
                                    </label>
                                    <label for="active">Ativo</label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-app-primary">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>





    <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Categoria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true"><i class="ti-close"></i></span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="name">Nome da Categoria</label>
                                <input type="text" class="form-control" id="editName" name="name"
                                    placeholder="Nome da Categoria" required>
                            </div>
                        </div>

                        <div class="switches">
                            <div class="form-row ">

                                <div class="form-group ">
                                    <label class="switch">
                                        <input name="active" value="true" type="checkbox" id="editActive">
                                        <span class="slider round"></span>
                                    </label>
                                    <label for="active">Ativo</label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-app-primary">Salvar Alterações</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('addjs')
<script type="text/javascript" src="{{asset('assets/js/myEvent/categoryEventEdit.js')}}"></script>

@endsection
