<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade text-light" id="exampleModalRegisterLogin" tabindex="-1" aria-labelledby="exampleModalLabelRegisterLogin" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelRegisterLogin">Обо мне</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="row">
                            <div class="col-md-12">
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                @if (session()->has('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        @if($registerForm)
                            <form>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Name :</label>
                                            <input type="text" wire:model="name" class="form-control">
                                            @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Email :</label>
                                            <input type="text" wire:model="email" class="form-control">
                                            @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Password :</label>
                                            <input type="password" wire:model="password" class="form-control">
                                            @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button class="btn text-white btn-success" wire:click.prevent="registerStore">Register</button>
                                    </div>
                                    <div class="col-md-12">
                                        <a class="text-primary" wire:click.prevent="register"><strong>Login</strong></a>
                                    </div>
                                </div>
                            </form>
                        @else
                            <form>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Email :</label>
                                            <input type="text" wire:model="email" class="form-control">
                                            @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Password :</label>
                                            <input type="password" wire:model="password" class="form-control">
                                            @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button class="btn text-white btn-success" wire:click.prevent="login">Login</button>
                                    </div>
                                    <div class="col-md-12">
                                        Don't have account? <a class="btn btn-primary text-white" wire:click.prevent="register"><strong>Register Here</strong></a>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" wire:click="storeAbout()" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </div>
    </div>

</div>
