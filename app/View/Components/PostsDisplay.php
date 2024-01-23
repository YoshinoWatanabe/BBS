<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PostsDisplay extends Component
{
    public $posts;

    public function __construct($posts)
    {
        // user_id, user_name, text, created_atを保持しているオブジェクト
        $this->posts = $posts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.posts-display');
    }
}
