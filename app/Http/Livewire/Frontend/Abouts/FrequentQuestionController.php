<?php

namespace App\Http\Livewire\Frontend\Abouts;

use Livewire\Component;
use App\Models\SectionQuestion;

class FrequentQuestionController extends Component
{
    public function render()
    {
        return view('livewire.frontend.abouts.frequent-question',[
            'sectionQuestions' => sectionQuestion::orderBy('position','ASC')->get(),
        ]);
    }
}
