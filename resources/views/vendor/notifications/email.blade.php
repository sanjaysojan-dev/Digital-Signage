@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hello!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
@lang('Kind Regards'),<br>
{{ $salutation }}.<br>
@else
@lang('Kind Regards'),<br>
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "More information can be found on the Wiki. If you’re having trouble click the \":actionText\" button OR copy and paste the URL below\n".
    'into your web browser: ',
    [
        'actionText' => $actionText,
    ]
)<span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@component('mail::button', ['url' => $actionUrl, 'color' => 'green'])
    {{ $actionText }}
@endcomponent

@endslot
@endisset
@endcomponent
