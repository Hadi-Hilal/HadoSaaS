<x-guest-layout :title="__('Register')">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>{{__('Register')}}</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">{{__('Name')}}</label>
                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" required autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">{{__('Email')}}</label>
                                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="mobile" class="form-label">{{__('Mobile')}}</label>
                                <input type="number" id="mobile" class="form-control @error('mobile') is-invalid @enderror"
                                       name="mobile" value="{{ old('mobile') }}" required>
                                @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">{{__('Password')}}</label>
                                <input type="password" id="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">{{__('Confirm Password')}}</label>
                                <input type="password" id="password_confirmation" class="form-control"
                                       name="password_confirmation" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">{{__('Register')}}</button>
                        </form>

                        <div class="mt-3 text-center">
                            <a href="{{ route('login') }}">{{__('Already Have An Account?')}}n</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
