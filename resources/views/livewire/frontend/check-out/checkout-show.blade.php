<div>
    <div class="py-3 py-md-4 checkout">
        <div class="container">
            <h4>Thanh toán</h4>
            <hr>
   
            @if($this->totalProductAmount != '0')
            <form action="">
            <div class="row gx-5">
                
                <div class="col-12 col-lg-8 ">
                    <div class="row py-3 border shadow-lg">
                        <div class="col-12">
                            <h3>Thông tin thanh toán</h3>


                            <div class="mt-3">
                                <label class="form-label h6">Họ và tên</label>
                                <input type="text" wire:model.defer="fullname"   class="form-control" placeholder="Họ và tên">
                                @error('fullname')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>


                            <div class="mt-3">
                                <label class="form-label h6">Email</label>
                                <input type="text" wire:model.defer="email"  class="form-control" placeholder="Email">
                                @error('email')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                           
                            </div>

                            
                            <div class="mt-3">
                                <label class="form-label h6">Số điện thoại</label>
                                <input type="number" wire:model.defer="phone"  class="form-control" placeholder="Số điện thoại">
                                @error('phone')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            
                            </div>

                            <div class="mt-3">
                                <label class="form-label h6">Mã bưu điện (tuỳ chọn)</label>
                                <input type="text" wire:model.defer="pincode" class="form-control" >
                                @error('pincode')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                           
                            </div>

                            <div class="mt-3">
                                <label class="form-label h6">Địa chỉ</label>
                                <textarea wire:model.defer="address" id=""  rows="3" class="form-control"></textarea>
                           
                                @error('address')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>



                        </div>




                    </div>


                </div>


                <div class="col-12 col-lg-4  mt-3 mt-lg-0 ">

                    <div class="row py-3 border shadow-lg">
                        <h3>Đơn hàng của bạn</h3>

                         <div class="mt-3">
                            <div class="h5 py-3">
                                Tổng giá trị đơn hàng
                                <span class="float-end">{{ $this->totalProductAmount }}</span>

                            </div>

                            <hr>

                            <div class="mt-4 h6">
                                (*) Đơn hàng sẽ được giao đến trong 3-5 ngày
                            </div>


                            <div class="col-md-12 mb-3">
                                <label>Chọn phương thức thanh toán: </label>
                                <div class="d-md-flex align-items-start">
                                    <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <button wire:loading.attr="disabled" class="nav-link active fw-bold border border-3 bg-dark text-light" id="cashOnDeliveryTab-tab" data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab" type="button" role="tab" aria-controls="cashOnDeliveryTab" aria-selected="true">COD</button>
                                        <button wire:loading.attr="disabled" class="nav-link fw-bold border border-3 bg-dark text-light" id="onlinePayment-tab" data-bs-toggle="pill" data-bs-target="#onlinePayment" type="button" role="tab" aria-controls="onlinePayment" aria-selected="false">Online</button>
                                    </div>
                                    <div class="tab-content col-md-9" id="v-pills-tabContent">
                                        <div class="tab-pane active show fade" id="cashOnDeliveryTab" role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                            <h6>Phương thức thanh toán trực tiếp</h6>
                                            <hr/>
                                            <button type="button" wire:loading.attr="disabled" wire:click="codOrder" class="btn btn-dark">
                                                <span wire:loading.remove wire:target="codOrder">
                                                    Đặt hàng (Thanh toán khi nhận hàng)
                                                </span>
                                                <span wire:loading wire:target="codOrder">
                                                    Đang xử lý
                                                </span>
                                               
                                            </button>

                                        </div>
                                        <div class="tab-pane fade" id="onlinePayment" role="tabpanel" aria-labelledby="onlinePayment-tab" tabindex="0">
                                            <h6>Phương thức thanh toán online <span class="text-danger">Hiện không khả dụng</span></h6>
                                            <hr/>
                                            <button type="button" disabled wire:loading.attr="disabled" class="btn btn-dark">Đang cập nhật</button>
                                        </div>
                                    </div>
                                </div>




                        </div>
                    </div>
                        

                   

                </div>



            </div>

             </form>
             @else
             <div class="row shadow-lg py-4">
                <div class="col text-center">
                    <h4>Không có sản phẩm trong giỏ hàng</h4>
                    <a class="btn btn-dark w-100" href="{{ url('/') }}">Shop now</a>
                </div>
             </div>
             @endif


        </div>
    </div>
</div>
