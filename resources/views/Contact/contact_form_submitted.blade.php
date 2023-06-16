@component('mail::message')
# Contact Form Submitted

**Name:** {{ $data['name'] }}

**Email:** {{ $data['email'] }}

**Message:**
{{ $data['message'] }}

@endcomponent
