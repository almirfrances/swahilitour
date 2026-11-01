@component('mail::message')

{!! $content !!}

@if($url)
@component('mail::button', ['url' => $url])
Visit Here
@endcomponent
@endif

Thanks,<br>
{{ config('app.name') }}


@slot('footer')
    @component('mail::footer')
        © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
    @endcomponent
@endslot
@endcomponent
