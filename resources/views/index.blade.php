<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{url('css/app.css')}}">

        <title>Image Uploader</title>
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>

    </head>
    <body>
        <div id="app">
            <header-container></header-container>
            @if (count($images) > 0)
                <section class="container">
                    @foreach ($images as $image)
                        <image-container
                            :image="{{json_encode($image)}}"
                        ></image-container>
                    @endforeach
                </section>
            @endif
            @if (count($images) > 0)
                <div class="pagination">
                    {{ $images->links() }}
                </div>
            @endif
        </div>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
