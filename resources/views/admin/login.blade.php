<form method="POST" action="{{route('login.post')}}">
    @csrf
    @if (session()->has('message'))
    <div class="alert alert-danger">
    {{ session()->get('message') }}
    </div>
    @endif
   
    <div class="mb-2">
        <label for="emailaddress" class="form-label">Email address</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="mb-2">
        <label for="password" class="form-label">Password</label>
        <div class="input-group input-group-merge">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            
            <div class="input-group-text" data-password="false">
                <span class="password-eye"></span>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="checkbox-signin">
                Remember me
            </label>
        </div>
    </div>

    {{-- <div class="form-group row">
        <label for="captcha" class="col-md-4 col-form-label text-md-right">Captcha</label>
        <div class="col-md-8" style="display: flex;">
            <span class="captcha-image">{!! Captcha::img() !!}</span> &nbsp;&nbsp;
            <button type="button" class="btn btn-primary refresh-button"><i class="ri-refresh-fill"></i></button>
        </div>
    </div>
    <div class="form-group row mb-2">
        <div class="col-md-4"></div>
        <div class="col-md-8">
            <input id="captcha" type="text" class="form-control @error('captcha') is-invalid @enderror" name="captcha" required>
            @error('captcha')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div> --}}

    <div class="d-grid mb-0 text-center">
        <button type="submit" class="btn btn-primary">
            {{ __('Login') }}
        </button>
    </div>

</form>
<a href="{{route('logout')}}">Logout</a>