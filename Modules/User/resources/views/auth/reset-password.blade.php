<x-guest-layout :title="__('Reset Password')">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>{{__('Reset Password')}}</h3>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ request()->route('token') }}">
                            <div class="mb-3">
                                <label for="email" class="form-label">{{__('Email')}}</label>
                                <input type="email" name="email" class="form-control" id="email"
                                       aria-describedby="emailHelp"
                                       readonly value="{{request()->email}}"
                                       autocomplete="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">{{__('Password')}}</label>
                                <input type="password" name="password" class="form-control" autocomplete="password"
                                       id="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation"
                                       class="form-label">{{__('Confirm Password')}}</label>
                                <input type="password" class="form-control" name="password_confirmation" required
                                       autocomplete="new-password" id="password_confirmation">
                            </div>
                            <button type="submit"
                                    class="btn btn-primary w-100 p-2 fw-bold">{{__('Reset Password')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
