<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Войти') }}</div>
                    @include('components.message')

                    <div class="card-body">

                        <div class="form-group row">
                            <label for="phone_filed"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Номер телефона') }}</label>

                            <div class="col-md-6">
                                <input data-inputmask="'mask': '+7(999)999-99-99'" id="phone_field" type="text" class="form-control @error('phone') is-invalid @enderror" wire:model="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" wire:model="password"
                                       required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Запомнить меня') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" wire:click="login()">
                                    {{ __('Войти') }}
                                </button>

                                {{--                                @if (Route::has('password.request'))--}}
                                <a class="btn btn-link" href="{{route('reset')}}">
                                    {{ __('Забыли пароль?') }}
                                </a>
                                {{--                                @endif--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
