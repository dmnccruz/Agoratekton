{{-- Meta tags --}}
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="route" content="{{ $route }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="url" content="{{ secure_url('').'/'.config('chatify.path') }}" data-user="{{ Auth::user()->id }}">

{{-- scripts --}}
<script src="{{ secure_asset('js/chatify/font.awesome.min.js') }}"></script>
<script src="{{ secure_asset('js/chatify/autosize.js') }}"></script>
<script src="{{ secure_asset('js/app.js') }}"></script>
<script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>
<script type="text/javascript" src="{{secure_asset('/js/magic_mouse.js')}}" defer></script>


{{-- styles --}}
<link rel='stylesheet' href='https://unpkg.com/nprogress@0.2.0/nprogress.css'/>
<link href="{{ secure_asset('css/chatify/style.css') }}" rel="stylesheet" />
<link href="{{ secure_asset('css/chatify/'.$dark_mode.'.mode.css') }}" rel="stylesheet" />
<link href="{{ secure_asset('css/app.css') }}" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{secure_asset('/css/magic-mouse.css')}}">


{{-- Messenger Color Style--}}
@include('Chatify::layouts.messengerColor')