<?php

    namespace App\Http\Controllers;

    use App\Models\Post;
    use Illuminate\Http\Request;

    class PostsController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
         */
        public function index()
        {
            //
            $posts = Post::all();

            if ($posts) {
                return view('posts/index')->with('posts', $posts);
            }else{
                return view('posts/index')->with('error_posts', 'Any posts');
            }
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
         */
        public function create()
        {
            $date_now = date('Y-m-d\TH:i');
            return view('posts/create')->with('date_now',$date_now);
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
         */
        public function store(Request $request)
        {

            $validated = $request->validate([
                'title' => 'required',
                'description' => 'required',
                'created' => 'required| date'
            ]);
            if ($validated) {
                $post = new Post();


                $post->title = $request->input('title');
                $post->description = $request->input('description');
                $post->created_at = $request->input('created');
                $post->save();
            }

            return redirect('posts/create')->with('success', 'Post was created');
        }

        /**
         * Display the specified resource.
         *
         * @param \App\Models\Post $post
         * @return \Illuminate\Http\Response
         */
        public function show(Post $post)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param \App\Models\Post $post
         * @return \Illuminate\Http\Response
         */
        public function edit(Post $post)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param \App\Models\Post $post
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Post $post)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @return \Illuminate\Http\RedirectResponse
         */
        public function destroy($post)
        {

            $post = Post::where('id',$post)->delete();

            return redirect('/posts')->with('success', 'Post was deleted');
        }
    }
