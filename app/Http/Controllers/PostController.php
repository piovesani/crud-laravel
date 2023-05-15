<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function create(Request $request){
        $newPost = [
            'title' => 'Meu primeiro post',
            'content' => 'Conteúdo qualquer',
            'author' => 'Renan'
        ];

        $post = new Post($newPost);
        $post->save();
    }

    public function read(Request $request){
        $post = new Post();

        $data = [
            'id' => $request->id
        ];
        $post = $post->find($data);

        return $post;
    }

    public function readAll(Request $r){
        $posts = Post::all();

        return $posts;
    }

    public function update(Request $request){

        $post = Post::find(2);

        if($post){
            $post->title = 'Meu post atualizado';
            $post->save();

            return $post;
        }
        return 'Não existe este id';
    }

    public function updateAll(Request $request){
        $posts = Post::where('id', '>', 0)->update([
            'author' => 'Desconhecido'
        ]);

        return $posts;
    }

    public function delete(Request $request){
        $post = Post::find(1);

        if($post){
            return $post->delete();
        }

        return 'Não existe post com este id';
    }
}
