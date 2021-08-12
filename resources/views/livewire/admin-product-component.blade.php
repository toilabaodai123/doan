<div>

    <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Tên sản phẩm</th>
                                                        <th>Giá sản phẩm</th>
														<th>Loại sản phẩm</th>
														<th>Tùy chọn</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
													@foreach($Products as $p)
                                                    <tr>
                                                        <td>{{$p->id}}</td>
                                                        <td>{{$p->productName}}</td>
                                                        <td>{{$p->productPrice}}</td>
                                                        <td>{{$p->CategoryID}}</td>
														<td>
															<button type="button" class="btn btn-success">Xem</button>
															<button type="button" class="btn btn-info">Sửa</button>
															<button type="button" class="btn btn-danger">Xóa</button>
														</td>
                                                    </tr>
													@endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
    </div>
<div class="row">
	
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Bảng nhập thông tin sản phẩm
                                </div>
                                <div class="panel-body">

                                    <div class="row">
									@if(session()->has('success'))
									<div class="alert alert-success">
										{{session('success')}}
                                    </div>
									@endif
                                        <div class="form-group">
										
                                            <form role="form" wire:submit.prevent="submit">
												<div class="form-group">
												<div class="col-lg-9">
													<div class="col-lg-9">
														<label>ID sản phẩm</label>
														<input class="form-control" id="disabledInput" disabled wire:model="productID" placeholder="ID của sản phẩm">
														@error('productName')
															<p class="text-danger">{{$message}}</p>
														@enderror
													</div>												
													<div class="col-lg-6">
														<label>Tên sản phẩm</label>
														<input class="form-control" wire:model="productName" placeholder="Nhập tên sản phẩm">
														@error('productName')
															<p class="text-danger">{{$message}}</p>
														@enderror
													</div>
												
													<div class="col-lg-3">
														
														<label>Loại sản phẩm</label>
														<select class="form-control" wire:model="CategoryID">
															<option>Chọn danh mục</option>
															@foreach($ProductCategories as $Category)
																<option value="{{$Category->id}}">{{$Category->categoryName}}</option>
															@endforeach
														</select>
														@error('CategoryID')
															<p class="text-danger">{{$message}}</p>
														@enderror


													</div>
													<div class="col-lg-9">
														<label>Mô tả ngắn</label>
														<input class="form-control" wire:model="shortDesc" placeholder="Nhập mô tả ngắn của sản phẩm">
														@error('shortDesc')
															<p class="text-danger">{{$message}}</p>
														@enderror
													</div>		
													<div class="col-lg-9">
														<label>Mô tả dài</label>
														<textarea class="form-control" rows="3" wire:model="longDesc" placeholder="Nhập mô tả dài của sản phẩm"></textarea>
														@error('shortDesc')
															<p class="text-danger">{{$message}}</p>
														@enderror
													</div>		
													<div class="col-lg-9">
														<label>Giá sản phẩm</label>
														<input class="form-control" wire:model="productPrice" placeholder="Nhập giá của sản phẩm">
														@error('shortDesc')
															<p class="text-danger">{{$message}}</p>
														@enderror
													</div>													
												</div>
												<div class="col-lg-3">
												<div class="panel panel-default">
													<div class="panel-heading">
														Hình ảnh chính sản phẩm
													</div>
													<div class="panel-body">
														<img src="{{asset('storage/images/null.jpg')}}" style="width:100%;height:200px"> </img>
													</div>
													<!-- /.panel-body -->
												</div>
												<!-- /.panel -->
												<div>
                                                    <input id="file-upload" style="display:none" type="file" wire:model="productImage" >
													<label for="file-upload" class="custom-file-upload" style="border: 1px solid #ccc;display: inline-block;padding: 6px 12px;cursor: pointer;">
														Chọn hình ảnh
													</label>
													<label wire:loading wire:target="productImage">Đang tải...</label>
													@if($productImage)
														<img src="{{ $productImage->temporaryUrl() }} " style="width:50px;height:50px">
													@endif
													
                                                </div>
												</div>

												</div>											
											
												
												

												<div class="form-group">
													<button type="submit"  style="visibility:hidden" class="btn btn-default">Lưu</button>
													
												</div>
												<button type="submit" wire:loading.attr="disabled" class="btn btn-default">Lưu</button>
												<button type="button" wire:click="btnReset" class="btn btn-default">Reset</button>
												<label wire:loading wire:target="btnReset">Đang reset...</label>
                                            </form>
                                        </div>
									
                                        <!-- /.col-lg-6 (nested) -->

                                        <!-- /.col-lg-6 (nested) -->
                                    </div>
                                    <!-- /.row (nested) -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
	<div class="row">
		<div class="col-lg-12">	
			<div class="panel panel-default">
                <div class="panel-heading">
                    Thêm bằng excel
                </div>
                <div class="panel-body">	
					<form wire:submit.prevent="productImport">
                        <input id="product-import" style="display:none" type="file" wire:model="productImport" >
						@if($productImport)
							<label>Sheesh</label>
						@endif
						<label for="product-import" class="custom-file-upload" style="background-color:#337ab7;color:white;border: 1px solid #ccc;display: inline-block;padding: 6px 12px;cursor: pointer;">
							Thêm bằng file excel
						</label>
						<button type="submit" class="btn btn-default">Thêm</button>
					</form>					
				</div>
			</div>
		</div>
	</div>
</div>
