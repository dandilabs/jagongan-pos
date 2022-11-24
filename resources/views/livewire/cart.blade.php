<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white">
                <div class="row">
                    <div class="col-md-6"> <h3 class="font-weight-bold">Product List</h3></div>
                    <div class="col-md-6"><input wire:model="search" type="text" class="form-control" placeholder="Search product..."></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @forelse ($products as $product )
                        <div class="col-md-3 mb-3">
                            <div class="card" wire:click="addItem({{$product->id}})" style="cursor: pointer;">
                                <div class="card-body">
                                    <img src="{{ asset('storage/images/'.$product->image) }}" style="object-fit:contain;width:100%;height:125px" alt="product">
                                    <button wire:click="addItem({{$product->id}})" class="btn btn-primary btn-sm" style="position:absolute;top:0;right:0;padding: 5px 10px"><i class="fas fa-cart-plus fa-lg"></i></button>
                                </div>
                                <div class="card-footer bg-white" style="padding-bottom:5px;cursor:pointer;">
                                    <h6 class="text-center font-weight-bold">{{ $product->name }}</h6>
                                    <h6 class="text-center font-weight-bold" style="color:grey">Rp {{number_format($product->price)}}</h6>
                                    {{-- <button wire:click="addItem({{$product->id}})" class="btn btn-sm btn-primary btn-block"> <i class="fas fa-plus"></i> Add To Cart</button> --}}
                                </div>
                            </div>
                        </div>
                        @empty
                        <h2 class="text-danger text-center mt-3">No Products Found</h2>
                    @endforelse
                </div>
                <div style="display:flex; justify-content:center" class="mt-3">
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-white">
                <h2>Cart</h2>
            </div>
            <div class="card-body">
                @if(session()->has('error'))
                    <h3 class="text-danger">{{session('error')}}</>
                @endif
                    <table class="table table-sm table-bordered table-striped table-hover">
                        <thead class="bg-success text-white">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Qty</th>
                                <th class="text-center">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ( $cart as $index=>$carts )
                            <tr>
                                <td class="text-center">
                                    {{ $index+1 }} <br>
                                    <button wire:click="removeItem('{{ $carts['rowId'] }}')" style="padding:5px 8px" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </td>
                                <td>
                                    {{ $carts['name'] }} <br>
                                    <span>Rp. {{ number_format($carts['pricesingle']) }}</span>
                                </td>
                                <td class="text-center">
                                    <button wire:click="increaseItem('{{ $carts['rowId'] }}')" style="padding:5px 8px" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i></button>
                                    {{ $carts['qty'] }}
                                    <button wire:click="decreaseItem('{{ $carts['rowId'] }}')" style="padding:5px 8px" class="btn btn-sm btn-warning"><i class="fas fa-minus"></i></button>
                                </td>
                                <td class="text-center">Rp. {{ number_format($carts['price']) }}</td>
                            </tr>
                            @empty
                                <td colspan="3"><h6 class="text-center">Empty Cart</h6></td>
                            @endforelse ($cart as $carts )
                        </tbody>
                    </table>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4>Cart Summary</h4>
                <h5>Sub Total :Rp. {{ number_format($summary['sub_total']) }}</h5>
                <h5>Tax : Rp. {{ number_format($summary['pajak']) }}</h5>
                <h5>Total :Rp. {{ number_format($summary['total']) }}</h5>
                <div class="row">
                    <div class="col-md-6">
                        <button wire:click="enableTax" class="btn btn-primary btn-sm"><i class="fas fa-pencil"></i> Add Tax</button>
                    </div>
                    <div class="col-md-6">
                        <button wire:click="disableTax" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Remove Tax</button>
                    </div>
                </div>
                <div class="mt-4">
                    <button class="btn btn-success btn-block btn-sm">Save Transaction</button>
                </div>
            </div>
        </div>
    </div>
</div>