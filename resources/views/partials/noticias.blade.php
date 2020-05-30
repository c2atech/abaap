@push('doc_end')
@include("partials.conteudo-noticia")
@endpush
<!-- Noticias -->
<section class="page-section" id="noticias">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading text-uppercase">Notícias</h2>
        <h3 class="section-subheading text-muted">Confira abaixo as notícias e fique por dentro do dia a dia da Abapp.</h3>
      </div>
    </div>


   

    <div class="row row-cols-1 row-cols-md-3">
      @foreach ($posts as $post)
      <div class="col mb-4">
        <div class="card h-100">
          <img src="{{asset($post->imagem)}}" class="card-img-top" alt="...">
          <div class="card-body">
            <a class="portfolio-link" data-toggle="modal" href="#noticia1">
              <h5 class="card-title">
                {{$post->titulo}}
              </h5>
            </a>
            <p class="card-text">{{$post->descricao}}</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Enviado em {{$post->created_at}}</small>
          </div>
        </div>
      </div>



      @endforeach
    </div>

    <div class="container justify-content-center">
      <a href="">
        {{$posts->links()}}
      </a>
    </div>

  </div>
</section>