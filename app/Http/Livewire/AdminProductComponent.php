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
	public $productView;
		
	public $productID;
	public $productName;
	public $productPrice;
	public $productImage;	
	public $CategoryID;
	public $longDesc;
	public $shortDesc;
	
	public $productImport;
	public $uploadedImage;
	
	
	protected $rules=[
		'productName' => 'required|min:3',
		'CategoryID' => 'required',
		'productImage' => 'required'
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
		if($this->productID == null){
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
		else{
			$edit = Product::find($this->productID);
			$edit->productName = $this->productName;
			$edit->CategoryID = $this->CategoryID;
			$edit->productPrice = $this->productPrice;
			$edit->shortDesc = $this->shortDesc;
			$edit->longDesc = $this->longDesc;
			$edit->save();
			$this->reset();
			session()->flash('success','Sửa thành công!');
		}
	}
	
	
	public function btnReset(){
		$this->reset();
	}
	
	public function productImport(){
		dd($this->productImport);
	}
	
	
		
	public function test($id){
		$Product = Product::find($id);
		dd($Product);
	}
	
	public function editProduct($id){
		$editProduct = Product::find($id);
		$imgEProduct = Image::firstWhere('productID',$id);
		//dd($imgEProduct->imageName);
		//dd($imgEProduct);
		
		$this->productID = $editProduct->id;
		$this->productName = $editProduct->productName;
		$this->CategoryID = $editProduct->CategoryID;
		$this->shortDesc = $editProduct->shortDesc;
		$this->longDesc = $editProduct->longDesc;
		$this->productPrice = $editProduct->productPrice;
		$this->productImage = $imgEProduct->imageName;
		//dd($this->productImage->get('imageName'));
		
	}
}
