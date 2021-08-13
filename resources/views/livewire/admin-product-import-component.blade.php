<div>
    <div class="row">
		<div class="col-lg-12">
				<div class="row">
					<div class="table-responsive">
						<table class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Tên nhà cung cấp</th>
									<th>Email</th>
									<th>Số điện thoại</th>
									<th>Trạng thái</th>
									<th>Tùy chọn</th>
								</tr>
							</thead>
							<tbody>
								<tr>	
										<td>1</td>
										<td>2</td>
										<td>3</td>
										<td>4</td>
										<td>5</td>
										<td>
											<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Xem</button>
											<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														<h4 class="modal-title" id="myModalLabel">Thông tin nhà cung cấp</h4>
														</div>
													<div class="modal-body">
														<label>Tên nhà cung cấp : </label><br>
														<label>Số điện thoại : </label><br>
														<label>Email : </label><br>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Ẩn</button>
														<button type="button" class="btn btn-primary" >Sửa</button>
													</div>
													</div>
												</div>
											</div>
											<button wire:click="editBill"type="button" class="btn btn-info">Sửa</button>
											<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModalDelete">Xóa</button>
											<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														<h4 class="modal-title" id="myModalLabel">Tùy chọn</h4>
														</div>
													<div class="modal-body">
														<label>Bạn có muốn xóa nhà cung cấp  không ? </label>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Ẩn</button>
														<button wire:click="deleteBill()"type="button" class="btn btn-primary" >Xóa</button>
													</div>
													</div>
												</div>
											</div>											
										</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Bảng nhập thông tin nhà cung cấp 
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group">
							<form role="form" wire:submit.prevent="submit">
								@if(session()->has('success'))
								<div class="alert alert-success">
									{{session('success')}}
                                </div>
								@endif
								<div class="col-lg-9">
									<label>ID Hóa đơn nhập hàng</label>
									<input class="form-control" disabled wire:model="billID" placeholder="ID Hóa đơn nhập hàng">
								</div>
								<div class="col-lg-4">	
									<label>Nhà cung cấp</label>
									<select class="form-control" wire:model="supplierID">
										<option>Chọn nhà cung cấp</option>
										@foreach($Suppliers as $s)
											<option value="{{$s->id}}">{{$s->supplierName}}</option>
										@endforeach
									</select>
											
								</div>
								<div class="col-lg-2">
									<label style="margin-top:25px;border: 1px solid #ccc;display: inline-block;padding: 6px 12px;cursor: pointer;"><a href="{{url('admin/suppliers')}}" style="text-decoration:none">Thêm nhà cung cấp</a></label>
								</div>
								<div class="col-lg-12" style="margin-top:30px">
									<div class="panel panel-default">
										<div class="panel-heading">
											Thông tin sản phẩm
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-lg-4">
													<label>Tìm sản phẩm</label>
													<input wire:model="searchInputProduct" class="form-control" placeholder="Nhập thông tin sản phẩm cần tìm" >
												</div>
												<div class="col-lg-3">
													<select wire:model="selectedProductID">
														<option>Chọn</option>
														<option value="id">Theo id</option>
													</select>
												</div>
											</div>
										</div>
										<div class="panel-body">
											<div class="row">
												<div class="form-group">
													<div class="table-responsive">
														<table class="table table-bordered table-hover table-striped" >
															<thead>
																<tr>
																	<th>ID Sản phẩm</th>
																	<th>Tên sản phẩm</th>
																	<th>Giá sản phẩm</th>
																	<th>Tùy chọn</th>
																</tr>
															</thead>
															<tbody>
																	@if($Products)
																		@foreach($Products as $p)
																			<tr>
																				<td><label>{{$p->id}}</label></td>
																				<td><label>{{$p->productName}}</label></td>
																				<td><label>{{$p->productPrice}}</label></td>
																				<td>
																					<button wire:click="addProduct" type="button" class="btn btn-success" >Thêm</button>
																					<button type="button" class="btn btn-info" >Xem</button>
																				</td>
																			</tr>
																		@endforeach
																	@endif
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-9" style="margin-top:20px">
									<button type="button" wire:click="submit" wire:loading.attr="disabled" class="btn btn-default">Lưu</button>
									<button type="button" wire:click="resetBtn" wire:loading.attr="disabled" class="btn btn-default">Reset</button>
								</div>								
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
