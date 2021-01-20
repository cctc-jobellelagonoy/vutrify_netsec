<x-guest-layout>
<div class="container my-auto pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card pb-3">
                <div class="card-body">
                    <h2 class="card-title text-center py-4">{{ __('Register') }}</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="custom-form-floating">
                                <input placeholder="Name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <label for="name">{{ __('Name') }}</label>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="custom-form-floating">
                                <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <label for="email">{{ __('Email') }}</label>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="custom-form-floating">
                                <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <label for="password">{{ __('Password') }}</label>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="custom-form-floating">
                                <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        </div>

                        <div class="form-group mb-0 mt-2">
                                <button type="submit" class="btn btn-primary text-white">
                                    {{ __('Register') }}
                                </button>

                            <a class="btn btn-link" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-guest-layout>
