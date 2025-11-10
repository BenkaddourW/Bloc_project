<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class postsController extends Controller
{
    public function create_posts(Request $request)
    {

        // Create a new post (assuming you have a Post model)
        $post = new Post();
        $image= $request->file('image');
        $fileName= $image->getClientOriginalName();
        $image->move('images', $fileName);
        $post->create ([
            'image' => $request->image,
            'title' => $request->name,
            'content' => $request->content,
            'category' => $request->category,
            'created_by' => '',
            

        ]);
               // Redirect back to the admin postes page with a success message
        return redirect('/admin/posts')->with('success', 'Post created successfully!');
    } 
      
            public function delete_posts(Request $request)
    {

        // Find the post by id and delete it
        $post = new Post();
        $post=$post->find($request->id);
        $post->delete();
      
       // Redirect back to the admin postes page with a success message
        return redirect('/admin/posts')->with('success', 'Post deleted successfully!');
    }
}
