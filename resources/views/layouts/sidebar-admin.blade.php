<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Roomdetails1.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Add SweetAlert2 -->

</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="{{ route('home') }}" class="{{ Request::routeIs('home') ? '' : '' }}">
            <img src="{{ asset('img/Logo.png') }}" alt="Logo" class="logo">
        </a>
        <a href="{{ route('adminpage') }}" class="{{ Request::routeIs('adminpage') ? 'active' : '' }}">หน้าหลัก</a>
        <a href="{{ route('guestpage') }}" class="{{ Request::is('guest*') ? 'active' : '' }}">ผู้เข้าพัก</a>
        <a href="{{ route('cspxx') }}" class="{{ Request::is('cspxx*') ? 'active' : '' }}">การแจ้งปัญหาจากผู้เข้าพัก</a>
        <div class="dropdown">
            <button class="dropbtn {{ Request::routeIs('booking', 'bookinghistory') ? 'active' : '' }}">การจอง</button>
            <div class="dropdown-content">
                <a href="{{ route('booking') }}" class="{{ Request::routeIs('booking') ? 'active' : '' }}">การจอง</a>
                <a href="{{ route('bookinghistory') }}" class="{{ Request::routeIs('bookinghistory') ? 'active' : '' }}">ประวัติการจอง</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn {{ Request::routeIs('adminbilling', 'confirmbill', 'paymenthistory') ? 'active' : '' }}">บิล</button>
            <div class="dropdown-content">
                <a href="{{ route('adminbilling') }}" class="{{ Request::routeIs('adminbilling') ? 'active' : '' }}">บิล</a>
                <a href="{{ route('paymenthistory') }}" class="{{ Request::routeIs('paymenthistory') ? 'active' : '' }}">ประวัติการส่งบิล</a>
            </div>
        </div>
        <a href="{{ route('roomdetail') }}" class="{{ Request::routeIs('roomdetail') ? 'active' : '' }}">รายละเอียดห้องทั้งหมด</a>
        <a href="{{ route('Addroom') }}" class="{{ Request::routeIs('Addroom') ? 'active' : '' }}">เพิ่มห้อง</a>
    </div>


    <!-- Main Content -->
    <div class="content">

        <div class="header">
            <form method="POST" action="{{ route('logout') }}" x-data class="inline" id="logout-form">
                @csrf
                <button type="button" id="logout-button" class="ml-4">
                    {{ __('ล็อคเอาท์') }}
                </button>
            </form>
            <div class="user-info dropdown">
                <!-- ปุ่มสำหรับ dropdown -->
                <span class="dropbtn">User: {{ Auth::user()->name }}</span>
                <!-- เนื้อหาของ dropdown -->
                <div class="dropdown-content">
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Account') }}
                    </div>
                    <a href="{{ route('profile.show') }}">{{ __('Profile') }}</a>
                </div>
            </div>
        </div>

        @if (!Request::routeIs('adminpage') && !Request::routeIs('Addroom'))
        <div class="s">
            <label for="search" class="sig">ค้นหา :</label><br>
            <input type="search" id="search" class="sin" placeholder="ใส่เลขห้อง หรือ ชื่อผู้เข้าพัก" size="30px">
        </div>
         @endif
        <div class="main-content">
            @yield('content') <!-- ส่วนที่จะแสดงเนื้อหาของแต่ละหน้า -->
        </div>
    </div>

    <!-- SweetAlert2 JavaScript for logout confirmation -->
    <script>
        document.getElementById('logout-button').addEventListener('click', function() {
            Swal.fire({
                title: 'Logout?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Logout',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit(); // Submit the logout form
                }
            });
        });
    </script>
</body>

</html>
