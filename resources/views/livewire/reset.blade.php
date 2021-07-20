<div>

        <div class="container text-dark">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Восстановление пароля') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="form-group row">
                                <label for="phoneCheck"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Введите номер телефона') }}</label>

                                <div class="col-md-6">
                                    <input id="phoneCheck" type="text"
                                           class="form-control @error('phoneCheck') is-invalid @enderror"
                                           wire:model="phoneCheck" value="{{ old('phoneCheck') }}">

                                    @error('phoneCheck')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button class="btn btn-primary"
                                            wire:click="sendPhone()">
                                        {{ __('Отправить Смс') }}
                                    </button>
                                </div>
                            </div>
                            @if($smsConfirm)
                                <div class="d-flex mt-4">
                                    <button class="button-g" wire:click.prevent="smsCode()">
                                        Подтвердить
                                    </button>
                                    <div class="col-xl-5">
                                        <input type="num" class="form-control cabinet-form__input"
                                               id="businessName" wire:model="code" placeholder="Код из смс">
                                    </div>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @if($showPassword)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Reset Password</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">
                                    ВВедите новый пароль</label>
                                <div class="col-md-6">
                                    <input id="newPassword" type="text"
                                           class="form-control @error('newPassword') is-invalid @enderror"
                                           wire:model="newPassword" value="{{ old('newPassword') }}">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary"
                                            wire:click.prevent="newPassword()">
                                        Сменить пароль
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
