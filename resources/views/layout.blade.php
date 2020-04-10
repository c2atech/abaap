<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ABAAP - Associação Beneficente Amor pelo Próximo</title>

        <link href="{{'css/app.css'}}" rel="stylesheet" type="text/css">
    </head>
  <body id="body">

    @include("shared.navigation")

    @include("shared.header")
    
    @yield('content')

    @include("shared.footer")

    @stack('doc_end')

    <script src="{{mix('js/app.js')}}"></script>
  </body>
</html>
