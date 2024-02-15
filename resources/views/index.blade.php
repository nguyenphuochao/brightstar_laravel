<!doctype html>
<html lang="en">

<head>
    <title>Công ty cổ phần truyền thông Brightstar</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Chuyên quảng cáo truyền hình, internet, sản xuất phim, sitcom, sự kiện, bản quyền">
    <meta property="og:site_name" content="Công ty cổ phần truyền thông Brightstar" />
    <meta property="og:title" content="Công ty cổ phần truyền thông Brightstar">
    <meta property="og:description"
        content="Chuyên quảng cáo truyền hình, internet, sản xuất phim, sitcom, sự kiện, bản quyền">
    <meta property="og:image:width" content="1080">
    <meta property="og:image:height" content="600">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image" content="{{ asset('') }}img/logo.png">
    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('') }}img/favicon.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- owlcarousel -->
    <link rel="stylesheet" href="{{ asset('') }}owl/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('') }}owl/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('') }}css/style.css">
    <style>
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            /* Màu làm mờ và độ trong suốt */
            z-index: 999;
            /* Đặt lớp z-index cao hơn để hiển thị trên modal */
        }
    </style>
</head>

<body>
    <div class="logo-desktop d-none d-md-block bg-light">
        <div class="container"><a href="/"><img src="{{ asset('') }}img/logo.png" alt=""
                    width="310px" height="265px"></a></div>
    </div>
    <div class="home mb-3" style="background-color: #E06200;">
        <nav class="navbar navbar-expand-md navbar-light container p-0">
            <a class="navbar-brand logo-mobile d-md-none" href="{{ route('index') }}"><img
                    src="{{ asset('') }}img/logo.png" alt="" width="200px" height="140px"></a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon bg-white"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto pl-3 ml-0 mt-0 mt-lg-0 w-100 justify-content-between">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="fa-solid fa-house"></i><span
                                class="sr-only">(current)</span></a>
                    </li>
                    @foreach ($categories as $category)
                        @if ($category->parent_id == 0)
                            <li class="nav-item @if (count($category->children) > 0) {{ 'dropdown' }} @endif">
                                <a target="_blank"
                                    class="nav-link @if (count($category->children) > 0) {{ 'dropdown-toggle' }} @endif"
                                    href="{{ route('show', ['slug' => $category->alias]) }}">{{ $category->name }}
                                </a>
                                @if (count($category->children) > 0)
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach ($category->children as $child)
                                            <a target="_blank" class="dropdown-item"
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
    <section class="container">
        <div class="row" id="main">
            <div class="col-md-12" id="tivi-mobile">
                <div class="owl-carousel owl-theme" id="owl-carousel">
                    @php
                        $index = 1;
                    @endphp
                    @foreach ($sliders as $slider)
                        <div class="item" data-dot="{{ $index++ }}"><img
                                src="{{ asset('') }}img/{{ $slider->image }}" alt=""></div>
                    @endforeach
                </div>
                <img class="img-responsive" src="img/tivi_table.png" alt="" width="380px">
            </div>
            <div class="col-6 col-sm-6 col-md-6" id="quangcao">
                <a target="_blank" href="{{ $currentUrl }}/danh-muc/dich-vu"><img src="img/quangcao.png"
                        alt="" class="item">
                    <h2>DỊCH VỤ</h2>
                </a>
            </div>
            <div class="col-6 col-sm-6 col-md-6" id="tmdt">
                <a target="_blank" href="{{ $currentUrl }}/danh-muc/TMĐT"><img src="img/tmdt.png" alt=""
                        class="item">
                    <h2>TMĐT</h2>
                </a>
            </div>
            <div class="col-6 col-sm-6 col-md-6" id="sanxuatphim">
                <a target="_blank" href="{{ $currentUrl }}/danh-muc/san-xuat-phim"><img src="img/sanxuatphim.png"
                        alt="" class="item">
                    <h2>SẢN XUẤT PHIM</h2>
                </a>
            </div>
            <div class="col-6 col-sm-6 col-md-6" id="ttdt">
                <a target="_blank" href="{{ $currentUrl }}/danh-muc/T.TTĐT"><img src="img/TTDT.png"
                        alt="" class="item">
                    <h2>T.TTĐT</h2>
                </a>
            </div>
            <div class="col-6 col-sm-6 col-md-6" id="banquyen">
                <a target="_blank" href="{{ $currentUrl }}/danh-muc/ban-quyen"><img src="img/banquyen.png"
                        alt="" class="item">
                    <h2>BẢN QUYỀN</h2>
                </a>
            </div>
            <div class="col-6 col-sm-6 col-md-6" id="sukien">
                <a target="_blank" href="{{ $currentUrl }}/danh-muc/su-kien"><img src="img/sukien.png"
                        style="max-width: 300px;height: 148px;" alt="" class="item">
                    <h2>SỰ KIỆN</h2>
                </a>
            </div>
        </div>
        <!-- Modal thông báo nghỉ tết-->
        <div class="overlay" id="overlay"></div>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span
                            style="position: absolute;font-size: 60px;right: 5px;top:-18px;color:black;border-radius: 50%;font-weight: bolder"
                            aria-hidden="true">&times;</span>
                    </button>
                    <img style="width: 100%" src="https://brightstar.vn/uploads/images/lich-nghi-tet-brightstar.jpg"
                        alt="">
                </div>
            </div>
        </div>
    </section>

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

    <script src="owl/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                },
                dots: true, // Bật hiển thị dấu chấm
                dotsEach: true, // Hiển thị số trang trên dấu chấm
                dotData: true, // Cho phép bạn tuỳ chỉnh số trang trên dấu chấm
                autoplay: true,
                autoHeight: true,
                loop: true,
                autoplayTimeout: 2000,
            });
            // Hiện popup lịch nghỉ tết
            $("#exampleModalCenter").modal('show');
            // Hiển thị overlay khi modal được hiển thị
            $('#exampleModalCenter').on('shown.bs.modal', function() {
                $('#overlay').show();
            });

            // Ẩn overlay khi modal được ẩn
            $('#exampleModalCenter').on('hidden.bs.modal', function() {
                $('#overlay').hide();
            });
        });
    </script>
</body>

</html>
