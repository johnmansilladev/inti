<?php

namespace App\Http\Livewire\Admin\Orders;

use Carbon\Carbon;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class OrderIndex extends Component
{
    use WithPagination;
    protected $orders = [];
    public $search;
    public $sortField='nro_order';
    public $sortDirection = 'asc';

    public $date_from;
    public $date_to;
    public $status;

    protected $queryString = ['sortField', 'sortDirection'];


    public function mount() 
    {
        $this->date_from = Carbon::now()->firstOfYear()->format('Y-m-d');
        $this->date_to = Carbon::now()->format('Y-m-d');

        $this->applyFilters();
    }

    public function sortBy($field) 
    {
        $this->sortDirection = $this->sortField === $field 
            ? $this->sortDirection = $this->sortDirection  === 'asc' ? 'desc' : 'asc'
            : 'asc';

        $this->sortField = $field;

        $this->applyFilters();
        
    }

    public function updatedSearch() 
    {
        $this->resetPage();

        if (!empty($this->search)) {
            $this->orders = Order::where('nro_order','LIKE','%'.$this->search.'%')
                                        ->orWhere('contact_name','LIKE','%'.$this->search.'%')
                                        ->orWhere('email','LIKE','%'.$this->search.'%')
                                        ->paginate(10); 
        } else {
            $this->applyFilters();
        }

    }

    public function applyFilters() 
    {
        // $this->resetPage();

        $ordersQuery =  Order::query();

        $ordersQuery = $ordersQuery->whereBetween(DB::raw('DATE(created_at)'), [$this->date_from , $this->date_to]);

        // search input
        if (!empty($this->search)) {
            $ordersQuery = $ordersQuery->where('nro_order','LIKE','%'.$this->search.'%')
                                        ->orWhere('contact_name','LIKE','%'.$this->search.'%')
                                        ->orWhere('email','LIKE','%'.$this->search.'%'); 
        }

        if (!empty($this->status)) {
            $ordersQuery = $ordersQuery->where('status',$this->status);
        }

        if (!empty($this->sortField)) {
            $ordersQuery = $ordersQuery->orderBy($this->sortField, $this->sortDirection);
        }

        $this->orders = $ordersQuery->paginate(10);
    }

    public function applyFiltersBtn()
    {
        $this->resetPage(); 
        $this->applyFilters();
    }

    public function paginationView()
    {
        return 'vendor.livewire.custom-pagination-links-view';
    }

    public function render()
    {
       $this->applyFilters();

        return view('livewire.admin.orders.order-index',['orders' => $this->orders])->layout('layouts.admin');
    }
}
