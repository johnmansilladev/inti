<?php

namespace App\Http\Livewire\Frontend\Banners;

use Carbon\Carbon;
use Livewire\Component;

class Announcement extends Component
{
    public $announcement;
    public $startDate;
    public $endDate;

    public function mount() {
        $this->startDate= $this->announcement->date_form;
        $this->endDate= $this->announcement->date_to;
        // $this->poll('tick', 1000);
    }

    public function calculateDiff()
    {
        $now = Carbon::now();
        $diff = $now->diffInSeconds($this->endDate, false);
        return [
            'days' => floor($diff / 86400),
            'hours' => floor(($diff % 86400) / 3600),
            'minutes' => floor((($diff % 86400) % 3600) / 60),
            'seconds' => ($diff % 86400) % 60,
        ];
    }

    public function tick()
    {
        $this->diff = $this->calculateDiff($this->endDate);
    }

    public function render()
    {
        $diff = $this->calculateDiff($this->endDate);

        return view('livewire.frontend.banners.announcement',[
            'diff' => $diff
        ]);
    }
}
