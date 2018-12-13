@component('mail::message')
    # Introduction

    The body of your message.

    @component('mail::button', ['url' => url('password/reset/' . $data)])
        Reset Password
    @endcomponent


    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
