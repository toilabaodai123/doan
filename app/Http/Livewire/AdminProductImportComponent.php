<?php

namespace App\Http\Livewire;

use App\Models\Supplier;
use App\Models\Product;
use App\Models\ProductModel;

use Livewire\Component;


class AdminProductImportComponent extends Component
{
	public $Suppliers;
	public $supplierID;
	public $Products;
	public $ProductModels;
	public $selectedProductID;
	public $searchInputProduct;
	
	public $count1 =2;
	public $sizes;
	public $amounts;
	public $prices;

	
	public $selectedProducts ;
	public $selectedProducts2 = [];
	
    public function render()
    {
		$this->selectedProducts = ProductModel::whereIn('id',$this->selectedProducts2)->get();
		$this->Suppliers = Supplier::all();
		

		
		
		if($this->searchInputProduct == null)
			$this->Products = Product::with('Models')->where('supplierID',$this->supplierID)->where('status',1)->take(10)->get();
		else
			$this->Products= Product::with('Models')->where('productName','LIKE','%'.$this->searchInputProduct.'%')->where('status',1)->take(10)->get();
        
		

		
		
		
		return view('livewire.admin-product-import-component')
					->layout('layouts.template');
    }
	
	public function submit(){
		dd($this);
	}
	
	public function addProduct($id){
		//dd($id);
		array_push($this->selectedProducts2,$id);
	}	

	
	public function editBill($id){
		
	}
	
	public function deleteBill($id){
		
	}
	
	public function resetBtn(){
		dd($this->selectedProducts2);
		$this->reset();
	}
	
	public function test(){
		dd($this);
	}
	
	public function addRow(){
		$this->count1++;
	}
}
