<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Post;

class PostsAdmController extends Controller
{
  
    private $post;

    public function __construct(Post $post) {
        $this->post = $post;
    } 
    
    public function index()
    {
        $posts=$this->post->orderBy('id', 'DESC')->paginate(10);
        return view('admin.Posts.index', compact('posts'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function salvar(Request $req){  //função para salvar
        $dados = $req->all();
          //dd($dados);    motrarar os valores que está pegando atraves do 'dados'
  
                   //tratando a imagem
          if ($req->hasFile('imagem')) {
            $imagem = $req->file('imagem');
  
            $num = rand(1111,2222);   //gerando um numero randomico para servir como nome da imagem no banco de dados
            $dir = "img/postagem/";               //diretorio onde ira salvar a imagem
            $extensao = $imagem->guessClientExtension();  //extensao da imagem
            $nomeimagem = "imagem_".$num.".".$extensao;   //nome da imagem
            $imagem->move($dir,$nomeimagem);     //movendo imagem para um diretorio
            $dados['imagem'] = $dir."/".$nomeimagem;  //caminho da imagem para salvar no banco
          }
          Post::create($dados); //salvando tudo no banco de dados
  
          return redirect()->route('posts');   //redirecionando para a pagina 'Posts'
      }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     
    public function show($id)
    {

    $posts=$this->post->paginate(6);

    $post = $this->post->find($id);

    return view('admin.Posts.index', compact('post'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function atualizar(Request $request, $id)
    {
        $registro = Post::find($id);

        $dados = $request->all();
          //dd($dados);    motrarar os valores que está pegando atraves do 'dados'
  
                   //tratando a imagem
          if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
  
            $num = rand(1111,2222);   //gerando um numero randomico para servir como nome da imagem no banco de dados
            $dir = "img/postagem/";               //diretorio onde ira salvar a imagem
            $extensao = $imagem->guessClientExtension();  //extensao da imagem
            $nomeimagem = "imagem_".$num.".".$extensao;   //nome da imagem
            $imagem->move($dir,$nomeimagem);     //movendo imagem para um diretorio
            $dados['imagem'] = $dir."/".$nomeimagem;  //caminho da imagem para salvar no banco
          }
          Post::find($id)->update($dados); //salvando tudo no banco de dados

          return redirect()->route('home'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Post::find($id)->delete(); //'find': procura no banco de dados o id que foi passado

        return redirect()->route('posts');
  
    }
}
