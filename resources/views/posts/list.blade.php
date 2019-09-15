@extends('template.app')

@section('content')


@if($posts == false)
<div class="text-center m-auto">
    <h1>Sem conteudo, seja o primeiro a postar!</h1>
</div>
@else
@foreach ($posts as $post)


<div class="card shadow col-md-6 m-auto">
    <div class="card-header" style='width:100%;'>
      <h1>Posts do usuario:</h1><h3 style='text-transform:uppercase;' >{{$post->name}}</h3>
  </div>
<div class="card-body text-left">

    <div class="container-fluid">
        <img class="card-img-top" src="{{$post->image_path}}" alt="Imagem_post">
    </div>
    <sub class="subtext">Postado em: {{$post->created_at}}</sub>
    <p><i>Descrição: {{$post->description}}</i></p>
    @if ($post->like >= 1)
    <h4><span class="badge badge-secondary">Likes:{{$post->like}}</span></h4>
    @endif

    <div class='row text-center m-auto'>
        <div class='col-6'>
            <a class="btn" href="{{route('like', ['idPost' => $post->id])}}">
                Like: <img src="{{ asset('images/like_blue.png') }}" style="width:10%">
            </a>
        </div>
        <div class='col-6'>
            <a class="btn" href="{{route('dislike', ['idPost' => $post->id])}}">
                Dislike: <img src="{{ asset('images/dislike_red.png') }}" style="width:10%">
            </a>
        </div>
    </div>
    <div class="form-group">
        <div class='row'>
            <div class='col-10'>
                <input type="text" class="form-control" name="text">
            </div>
            <div class='col-2'>
                <button type="submit" class="btn btn-outline-primary">Comentar</button>
            </div>
        </div>
        <hr>
        <p><i>Comentários:</i></p>
        @foreach($comment as $comments)
        @if ($comments->post_id == $post->id)
        <div class='row'>

            <div class='col-6'>
                <p class="card-img"><i>{{$comments->name}}:</i> {{$comments->text}}</p>
            </div>

            <div class='col-6'>
                @if ($comments->user_id == auth()->user()->id)
                <a href="{{route('unset_comment', ['comment_id' => $comments->comment_id])}}">Excluir</a>
                @endif
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>

</div>


@endforeach 

@endif

@endsection