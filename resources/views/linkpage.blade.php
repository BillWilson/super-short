<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $data->content }}" />
    <meta name="content" content="{{ $data->content }}" />
    <meta name='image' content='{{ url($data->image) }}' />
    <link rel="image_src" href='{{ url($data->image) }}' />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $data->title }}" />
    <meta name="twitter:description" content="{{ $data->content }}" />
    <meta name="twitter:image" content="{{ url($data->image) }}" />
    <meta property="og:image" content="{{ url($data->image) }}" />
    <meta property="og:image:url" content="{{ url($data->image) }}" />
    <meta property="og:image:alt" content="{{ $data->title }}" />
    <meta property="og:title" content="{{ $data->title }}" />
    <meta property="og:description" content="{{ $data->content }}" />
    <meta property="og:type" content="article" />
    <meta http-equiv="refresh" content="5;url='{{ $data->pagelink }}'" />
    <title>{{ $data->title }}</title>
    <script type="text/javascript">
        window.location.replace("{{ $data->pagelink }}");
    </script>
</head>
<body>
    <div>
        <a href="{{ $data->pagelink }}">{{ $data->title }}</a>
    </div>
</body>
</html>