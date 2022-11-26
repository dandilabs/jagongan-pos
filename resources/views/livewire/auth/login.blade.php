<div class="container">
    <div class="row">
        <div class="col d-none d-sm-block d-md-block">
            <img src="{{ asset('storage/images/login.png') }}" width="450">
        </div>
        <div class="col-md-5 mt-5">
            <div class="card">
                <div class="card-body">
                    <h3>Login</h3>
                    <form wire:submit.prevent="submit" action="">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input wire:model="form.email" type="text" class="form-control" placeholder="Input your email...">
                            @error('form.email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input wire:model="form.password" type="password" class="form-control" placeholder="input your password...">
                            @error('form.password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <button class="btn btn-block btn-primary">Login</button>
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