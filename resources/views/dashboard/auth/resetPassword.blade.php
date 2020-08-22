@component('mail::message')
# Reset Account
Welcome {{ $data['data']->name }}
The body of your message.

{{-- @component('mail::button', ['url' => {{ route('admin.forgot'.$data['token']) }}]) --}}
@component('mail::button', ['url' => url('admin/forgot/password/'.$data['token'])])

Click Here To Reset Your Password

@endcomponent

Or <br>
Copy This Link
<a href="{{ url('forgot/password/'.$data['token']) }}">{{ url('forgot/password/'.$data['token']) }}</a>
Thanks,<br>
{{ config('app.name') }}
@endcomponent

