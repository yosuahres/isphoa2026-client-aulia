<?php

namespace App\Livewire\App;

use Livewire\Component;

class Article extends Component
{
    public $page_title;

    public function mount($slug)
    {
        $this->page_title = $slug;
    }

    public function render()
    {
        return view('livewire.app.article');
    }
}
