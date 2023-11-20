<!doctype html>
<html lang="en">

<head>
    <title>{{ $category_item->name }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('') }}css/detail.css">
</head>

<body>
    <div class="logo-desktop d-none d-md-block"><a href="/"><img src="{{asset('')}}img/logo.png" alt="" width="310px" ></a></div>
    <div class="detail bg-organge">
        <nav class="navbar navbar-expand-sm navbar-light container">
            <a class="navbar-brand logo-mobile d-md-none" href="{{ route('index') }}"><img src="{{ asset('') }}img/logo.png" alt="" width="130px" height="90px"></a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon bg-white"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 w-100 justify-content-between">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}"><i class="fa-solid fa-house"></i><span
                                class="sr-only">(current)</span></a>
                    </li>
                    @foreach ($categories as $category)
                        @if ($category->parent_id == 0)
                            <li class="nav-item @if (count($category->children) > 0) {{ 'dropdown' }} @endif">
                                <a class="nav-link {{ request()->segment(2) == $category->alias ? 'active' : '' }} @if (count($category->children) > 0) {{ 'dropdown-toggle' }} @endif"
                                    href="{{ route('show', ['slug' => $category->alias]) }}">{{ $category->name }}
                                </a>
                                @if (count($category->children) > 0)
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach ($category->children as $child)
                                            <a class="dropdown-item"
                                                href="{{ route('show', ['slug' => $child->alias]) }}"><i
                                                    class="fa-solid fa-caret-right" style="font-size: 20px;"></i>
                                                {{ $child->name }}</a>
                                        @endforeach
                                    </div>
                                @endif
                            </li>
                        @endif
                    @endforeach

                </ul>
            </div>
        </nav>
    </div>
    <div class="container">
        {!! $category_item->content !!}
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="{{asset('')}}js/script.js"></script>
</body>

</html>
