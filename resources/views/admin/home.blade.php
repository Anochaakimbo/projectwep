<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Roomdetails1.css') }}">
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <img src="./img/หอ-2.png" alt="Logo" class="logo">
    <a href="{{ route('adminpage') }}">Dashboard</a>
    <a href="{{ route('guestpage') }}">Guest</a>
    <a href="{{ route('customerproblem') }}">Customer problem</a>
    <a href="{{ route('booking') }}">Booking</a>
    <a href="{{ route('adminbilling') }}">Billing</a>
</div>
<!-- Content -->
<div class="content">
    <!-- Header -->
    <div class="header">
        <div class="user-info">
        <form method="POST" action="{{ route('logout') }}" x-data class="inline" id="logout-form">
            @csrf
            <button @click.prevent="$root.submit();" class="ml-4">
                {{ __('ล็อคเอาท์') }}
            </button>
        </form>
    </div>
<<<<<<< HEAD
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

</body>
=======
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
</x-app-layout>
>>>>>>> b8fa68c75a1e1d11083af8849620d21a9b994f49
