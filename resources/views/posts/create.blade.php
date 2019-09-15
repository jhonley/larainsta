@extends('template.app')

@section('content')

<div class="container m-auto col-5">


  <!-- Formulario do post -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h3 class="m-0 font-weight-bold text-primary text-center">Criando uma publicação</h3>
    </div>
    <div class="card-body text-left">
      <form method="POST" class="m-auto" enctype="multipart/form-data" action="/posts">
        @csrf

        <div class="form-group">
          <label for="description">Legenda</label>
          <textarea type="text" name="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
          <label for="image_path">Selecionar Foto:</label>
          <input type="file" name="image_path" class="form-control p-1 m-1">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-outline-primary btn-block">Post It</button>
        </div>

      </form>
    </div>
  </div>
  

</div>

@endsection