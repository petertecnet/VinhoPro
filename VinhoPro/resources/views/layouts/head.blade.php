<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @if(Route::currentRouteName() === 'event.show')
            {{ $event->title }} - {{ $event->start_date }} -
        @endif
        @if(Route::currentRouteName() === 'production.show')
            {{ $production->name }} -
        @endif
        @if(Route::currentRouteName() === 'blog.show')
            {{ $blog->title }} -
        @endif
        Gatenex: A solução perfeita para gerenciamento de eventos
    </title>
    <meta name="description" content="
        @if(Route::currentRouteName() === 'event.show')
            {{ $event->description }} -
        @endif
        @if(Route::currentRouteName() === 'production.show')
            {{ $production->description }} -
        @endif
        @if(Route::currentRouteName() === 'blog.show')
            {{ $blog->content }} -
        @endif
        Gatenex é uma solução de gerenciamento de eventos poderosa e fácil de usar que permite criar e gerenciar eventos, vender ingressos, coletar pagamentos e se comunicar com os participantes."
    >
    <meta name="keywords" content="Gatenex, gerenciamento de eventos, eventos, ingressos,
        @if(Route::currentRouteName() === 'event.show')
            {{ $event->name }} - {{ $event->description }} - {{ $event->date }} - {{ $event->production_name }} -
        @endif
        @if(Route::currentRouteName() === 'production.show')
            {{ $production->name }} -
        @endif
        @if(Route::currentRouteName() === 'blog.show')
            {{ $blog->title }} - {{ $blog->content }} -
        @endif
    ">
    
    <!-- Icons Material -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <!-- Custom Stylesheets -->
    <link href="{{ asset('img/gatenexlogo.png') }}" rel="icon">
     
    <meta property="og:title" content="   @if(Route::currentRouteName() === 'event.show')
    {{ $event->title }} - {{ $event->start_date }} -
@endif
@if(Route::currentRouteName() === 'production.show')
    {{ $production->name }} -
@endif
@if(Route::currentRouteName() === 'blog.show')
    {{ $blog->title }} -
@endif
Gatenex: A solução perfeita para gerenciamento de eventos">

    <meta property="og:description" content="  @if(Route::currentRouteName() === 'event.show')
    {{ $event->description }} -
@endif
@if(Route::currentRouteName() === 'production.show')
    {{ $production->description }} -
@endif
@if(Route::currentRouteName() === 'blog.show')
    {{ $blog->content }} -
@endif
Gatenex é uma solução de gerenciamento de eventos poderosa e fácil de usar que permite criar e gerenciar eventos, vender ingressos, coletar pagamentos e se comunicar com os participantes.
">

    <meta property="og:image"  href="
    @if(Route::currentRouteName() === 'event.show')
    {{ asset($event->image) }}
@endif
@if(Route::currentRouteName() === 'production.show')
{{ asset($production->logo) }}
@endif
@if(Route::currentRouteName() === 'blog.show')
    {{ $blog->cover_image }} 
@endif

{{ asset('img/gatenexlogo.png') }}"
content="
@if(Route::currentRouteName() === 'event.show')
{{ asset($event->image) }}
@endif
@if(Route::currentRouteName() === 'production.show')
{{ asset($production->logo) }}
@endif
@if(Route::currentRouteName() === 'blog.show')
{{ $blog->cover_image }} 
@endif

{{ asset('img/gatenexlogo.png') }}">
    <meta property="og:url" content="{{ request()->fullUrl() }}">
    
    <link rel="icon" href="{{ asset('img/gatenexlogo.png') }}" type="image/png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quagga"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
 <!-- Favicons -->
 <link href="{{ asset('img/gatenexlogo.png') }}" rel="icon">
 <link href="{{ asset('img/gatenexlogo.png') }}" rel="apple-touch-icon">

 <link href="{{ asset('css/style.css') }}" rel="stylesheet">
 <!-- Google Fonts -->
 <link href="https://fonts.gstatic.com" rel="preconnect">
 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

 <!-- Vendor CSS Files -->
 <link href="/nice/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link href="/nice/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
 <link href="/nice/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
 <link href="/nice/assets/vendor/quill/quill.snow.css" rel="stylesheet">
 <link href="/nice/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
 <link href="/nice/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
 <link href="/nice/assets/vendor/simple-datatables/style.css" rel="stylesheet">

 <!-- Template Main CSS File -->
 <link href="/nice/assets/css/style.css" rel="stylesheet">

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-RNSTDWZJ6E">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-RNSTDWZJ6E');
</script>
</head>