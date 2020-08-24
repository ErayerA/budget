@extends('settings.layout')

@section('settings_title')
    <h2 class="mb-3">{{ __('general.account') }}</h2>
@endsection

@section('settings_body')
    <div class="box">
        <div class="box__section">
            <div class="input input--small">
                <label>{{ __('fields.email') }}</label>
                <input type="email" name="email" value="{{ Auth::user()->email }}" />
            </div>
            <div class="row">
                <div class="row__column input">
                    <label>{{ __('fields.password') }}</label>
                    <input type="password" name="password" />
                    @include('partials.validation_error', ['payload' => 'password'])
                </div>
                <div class="row__column input ml-2">
                    <label>{{ __('actions.verify') }} {{ __('fields.password') }}</label>
                    <input type="password" name="password_confirmation" />
                    @include('partials.validation_error', ['payload' => 'password_confirmation'])
                </div>
            </div>
            <button class="button">{{ __('actions.save') }}</button>
        </div>
    </div>
@endsection

@section('settings_body_formless')
    <div class="mt-2">
        @if (session('delete_user_error') === 'active_stripe_subscription')
            <div class="color-red mb-1">Unable to delete user, you still have a premium plan (and would continue to be billed otherwise)</div>
        @endif
        <delete-user-button csrf-token="{{ csrf_token() }}"></delete-user-button>
    </div>
@endsection
