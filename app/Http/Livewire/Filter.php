<?php

namespace App\Http\Livewire;

use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;

class Filter extends Component
{
    use WithPagination;

    public $searchTerm;

    public function render()
    {
        return view('livewire.filter', [
            'news' => News::where(function ($query)
            {
                $query->where('department', 'LIKE', '%' . $this->searchTerm . '%')
                    ->orWhere('user', 'LIKE', '%' . $this->searchTerm . '%')
                    ->orWhere('read_state', 'LIKE', '%' . $this->searchTerm . '%')
                    ->orWhere('title', 'LIKE', '%' . $this->searchTerm . '%');
            })->orderBy('created_at', 'DESC')->paginate(6)
        ]);
    }
}
