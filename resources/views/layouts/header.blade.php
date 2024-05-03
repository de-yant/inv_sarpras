<div class="header-outer">
    <div class="header">
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fas fa-bars" aria-hidden="true"></i></a>
        <a id="toggle_btn" class="float-left" href="javascript:void(0);">
            <img src="{{ asset('assets/img/sidebar/icon-21.png') }}" alt="">
        </a>
        <ul class="nav float-left">
            <li>
                <div class="top-nav-search">
                    <h4 class="page-title mt-3"><b>MTS AL-HIDAYAH IBUN</b></h4>
                </div>
            </li>
        </ul>

        <script type="text/javascript">
            window.onload = function() {
                jam();
                date();
            }

            function date() {
                var e = document.getElementById('date'),
                    d = new Date(),
                    day, date, month, year, time;
                day = d.getDay();
                date = d.getDate();
                month = d.getMonth();
                year = d.getFullYear();

                switch (day) {
                    case 0:
                        day = 'Minggu';
                        break;
                    case 1:
                        day = 'Senin';
                        break;
                    case 2:
                        day = 'Selasa';
                        break;
                    case 3:
                        day = 'Rabu';
                        break;
                    case 4:
                        day = 'Kamis';
                        break;
                    case 5:
                        day = 'Jumat';
                        break;
                    case 6:
                        day = 'Sabtu';
                        break;
                }

                switch (month) {
                    case 0:
                        month = 'Januari';
                        break;
                    case 1:
                        month = 'Februari';
                        break;
                    case 2:
                        month = 'Maret';
                        break;
                    case 3:
                        month = 'April';
                        break;
                    case 4:
                        month = 'Mei';
                        break;
                    case 5:
                        month = 'Juni';
                        break;
                    case 6:
                        month = 'Juli';
                        break;
                    case 7:
                        month = 'Agustus';
                        break;
                    case 8:
                        month = 'September';
                        break;
                    case 9:
                        month = 'Oktober';
                        break;
                    case 10:
                        month = 'November';
                        break;
                    case 11:
                        month = 'Desember';
                        break;
                }

                e.innerHTML = day + ', ' + date + ' ' + month + ' ' + year;

                setTimeout('date()', 1000);
            }

            function jam() {
                var e = document.getElementById('jam'),
                    d = new Date(),
                    h, m, s;
                h = d.getHours();
                m = set(d.getMinutes());
                s = set(d.getSeconds());

                e.innerHTML = h + ':' + m + ':' + s;

                setTimeout('jam()', 1000);
            }

            function set(e) {
                e = e < 10 ? '0' + e : e;
                return e;
            }
        </script>

        <ul class="nav user-menu float-right">
            <li class="nav-item">
                <div id="date" style="color: rgb(6, 5, 5); font-size: 20px; margin-top: 15px; margin-left: 10px;">
                </div>
            </li>
            <li class="nav-item has-arrow">
                <div id="jam" style="color: rgb(6, 5, 5); font-size: 20px; margin-top: 15px; margin-left: 10px;">
                </div>
            </li>
            <li class="nav-item dropdown has-arrow">
                <a href="#" class=" nav-link user-link" data-toggle="dropdown">
                    <span class="user-img"><img class="rounded-circle"
                            src="{{ asset('storage/img/profile/' . Auth::user()->foto_profile) }}" alt="Foto Profil"
                            width="30">
                        <span class="status online"></span></span>
                    <span>{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('profile') }}"> <i
                        class="fas fa-user-alt"></i> Profil</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="dropdown-item" type="submit"><i
                            class="fas fa-sign-out-alt"></i> Keluar</button>
                    </form>
                </div>
            </li>
        </ul>
        <div class="dropdown mobile-user-menu float-right">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                    class="fas fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('profile') }}"><i
                    class="fas fa-user-alt"></i> Profil</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="dropdown-item" type="submit"><i
                        class="fas fa-sign-out-alt"></i> Keluar</button>
                </form>
            </div>
        </div>
    </div>
</div>
