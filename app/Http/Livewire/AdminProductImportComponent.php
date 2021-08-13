<?php

namespace App\Http\Livewire;

use App\Models\Supplier;
use App\Models\Product;

use Livewire\Component;


class AdminProductImportComponent extends Component
{
	public $Suppliers;
	public $supplierID;
	public $Products;
	public $selectedProductID;
	public $searchInputProduct;
	
    public function render()
    {
		$this->Suppliers = Supplier::all();
		if($this->searchInputProduct == null)
			$this->Products = Product::all();
		else
			$this->Products= Product::where('productName','LIKE','%'.$this->searchInputProduct.'%')->get();
        return view('livewire.admin-product-import-component')
					->layout('layouts.template');
    }
	
	public function submit(){
		dd($this);
	}
	
	public function editBill($id){
	
	}
	
	public function deleteBill($id){
		
	}
	
	public function resetBtn(){
		$this->reset();
	}
	
}
