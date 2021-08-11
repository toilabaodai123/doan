<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSize;
use App\Models\ProductModel;
use App\Models\Image;
use Livewire\WithFileUploads;

class AdminProductComponent extends Component
{
	use WithFileUploads;
	
	public $Products;
	public $ProductCategories;
	
	public $productID;
	public $productName;
	public $productPrice;
	public $productImage;	
	public $CategoryID;
	public $longDesc;
	public $shortDesc;
	
	protected $rules=[
		'productName' => 'required|min:3',
		'CategoryID' => 'required'
	];
	
    public function render()
    {
		$this->Products=Product::all();
		$this->ProductCategories = ProductCategory::all();
        return view('livewire.admin-product-component')
					->layout('layouts.template');
    }
	
	public function submit(){
		//dd($ProductID);
		$name=$this->productImage->getClientOriginalName();
		$name2 = date("Y-m-d-H-i-s").'-'.$name;


		$validatedData = $this->validate();
		$Product = new Product();
		$Product->productName = $this->productName;
		$Product->productPrice = $this->productPrice ;
		$Product->shortDesc = $this->shortDesc;
		$Product->longDesc = $this->longDesc;
		$Product->CategoryID = $this->CategoryID;
		//$this->productImage->storePublicly('images', $name2);
		$this->productImage->storeAs('images',$name2,'public');
		$Product->save();
		
		
		$ProductID = Product::all()->last()->id;
		$ProductSizes = ProductSize::all();
		foreach($ProductSizes as $size){
			$ProductModel = new ProductModel();
			$ProductModel->productID = $ProductID;
			$ProductModel->sizeID = $size->id;
			$ProductModel->save();
		}
		
		
		$PrimaryImage = new Image();
		$PrimaryImage->imageName = $name2;
		$PrimaryImage->imageType = 1; //1 = Hình ảnh chính
		$PrimaryImage->productID = $ProductID;
		$PrimaryImage->save();
		
		$this->reset();
		session()->flash('success','Thêm thành công!');
	}
	
	public function mount(){

	}
	
	public function resett(){
		$this->reset();
	}
}
