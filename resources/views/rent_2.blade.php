<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/rent_2.css') }}">
</head>
<body>
    <nav>
        <a href="/"><img src="./img/Logo.png" alt="Logo" width="100" height="100"></a>
    <ul>
        <li>
            @if (Route::has('login'))
    @auth
        @if (Auth::user()->usertype == 'admin')
            <a href="{{ url('/home') }}">จัดการห้อง</a>
            <style>
                .presstologin{
                    display:none;
                }
            </style>
        @else
        <style>
            .presstologin{
                display:none;
            }
        </style>
        
        @endif
    @endauth
    @endif  
    </li>
            <li><a href="#check">ตรวจสอบห้องว่าง</a></li>
            <li><a href="#roomtype">ประเภทห้อง</a></li>
            <li><a href="#book">การจอง</a></li>
            <li><a href="#contactus">ติดต่อเรา</a></li>
            <li class="presstologin"><a href="/login">ล็อกอิน</a></li>
        </ul>
    </nav>
    <div class="step-progress">
        <div class="step active">
            <div class="step-line"></div>
            <div class="step-circle">1</div>
        </div>
        <div class="step active">
            <div class="step-line"></div>
            <div class="step-circle">2</div>
        </div>
        <div class="step">
            <div class="step-line"></div>
            <div class="step-circle">3</div>
        </div>
        <div class="step">
            <div class="step-line"></div>
            <div class="step-circle">4</div>
        </div>
    </div>

    <div class="container">
        <h2>เลือกประเภทจ่ายค่าจอง</h2>

        <div class="payment-option">
            <a href="{{ route('rent_3', ['payment_method' => 'credit']) }}" class="btn">
                <button class="option-btn">
                    <img src="{{ asset('img/creditcard.png') }}" alt="Credit/Debit Card">
                    <span>บัตรเครดิต/เดบิต</span>
                </button>
            </a>
        </div>

        <div class="payment-option">
            <a href="{{ route('rent_3', ['payment_method' => 'qr']) }}" class="btn">
                <button class="option-btn">
                    <img src="{{ asset('img/qrcode.png') }}" alt="QR Code">
                    <span>สแกนคิวอาร์โค้ด</span>
                </button>
            </a>
        </div>
    </div>
</body>
</html>