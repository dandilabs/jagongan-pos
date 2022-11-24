<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h2 class="font-weight-bold">Product List</h2>
                <div class="row">
                    @foreach ($products as $product )
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{ asset('storage/images/'.$product->image) }}" class="img-fluid" alt="product">
                                </div>
                                <div class="card-footer">
                                    <h6 class="text-center font-weight-bold">{{ $product->name }}</h6>
                                    <button wire:click="addItem({{$product->id}})" class="btn btn-sm btn-warning btn-block">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h2>Cart</h2>
                @if(session()->has('error'))
                    <h4 class="text-danger">{{session('error')}}</>
                @endif
                    <table class="table table-sm table-bordered table-striped table-hover">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ( $cart as $index=>$carts )
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>
                                    {{ $carts['name'] }} <br>
                                    Qty : {{ $carts['qty'] }}
                                    <button wire:click="increaseItem('{{ $carts['rowId'] }}')" class="btn btn-sm btn-primary">+</button>
                                    <button wire:click="decreaseItem('{{ $carts['rowId'] }}')" class="btn btn-sm btn-warning">-</button>
                                    <button wire:click="removeItem('{{ $carts['rowId'] }}')" class="btn btn-sm btn-danger">x</button>
                                </td>
                                <td>{{ $carts['price'] }}</td>
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
                <h5>Sub Total :{{ $summary['sub_total'] }}</h5>
                <h5>Tax :{{ $summary['pajak'] }}</h5>
                <h5>Total :{{ $summary['total'] }}</h5>
                <div>
                    <button wire:click="enableTax" class="btn btn-primary btn-block btn-sm">Add Tax</button>
                    <button wire:click="disableTax" class="btn btn-danger btn-block btn-sm">Remove Tax</button>
                </div>
                <div class="mt-2">
                    <button class="btn btn-success btn-block btn-sm">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>