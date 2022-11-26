<div class="container">
    <div class="row">
        <div class="col d-none d-sm-block d-md-block">
            <img src="{{ asset('storage/images/register.png') }}" width="600">
        </div>
        <div class="col-md-5 mt-5">
            <div class="card">
                <div class="card-body">
                    <h3>Register</h3>
                    <form wire:submit.prevent="submit" action="">
                        <div class="form-group mt-3">
                            <label for="name">Name</label>
                            <input wire:model="form.name" type="text" class="form-control" placeholder="Input your name...">
                            @error('form.name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="email">Email</label>
                            <input wire:model="form.email" type="text" class="form-control" placeholder="Input your email...">
                            @error('form.email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="password">Password</label>
                            <input wire:model="form.password" type="password" class="form-control" placeholder="Input your password...">
                            @error('form.password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="password">Confirm Password</label>
                            <input wire:model="form.password_confirmation" type="password" class="form-control" placeholder="Repeat your password...">
                        </div>
                        <div class="form-group mt-3">
                            <button class="btn btn-block btn-primary">Register</button>
                        </div>
                        {{-- <div class="form-group mt-3">
                            <a href="/register">Register</a>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>