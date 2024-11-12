<x-guest-layout :title="__('Forgot Password')">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>{{__('Forgot Password')}}</h3>
                        <p class="text-center">
                            {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}

                        </p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">{{__('Email')}}</label>
                                <input type="email" name="email" class="form-control" id="email"
                                       aria-describedby="emailHelp"
                                       autocomplete="email" required>
                            </div>
                            <button type="submit"
                                    class="btn btn-primary w-100 p-2 fw-bold">{{__('Send Email Verification')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
