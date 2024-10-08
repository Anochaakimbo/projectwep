@extends('layouts.sidebar-admin')
@section('content')
<h1>Guest Room Details</h1>
<p>Room Number: {{ $room->room_number }}</p>
<p>Room Size: {{ $room->roomType->room_description }}</p>
<p>Floor : {{ $room->floor }}</p>
<p>Other Info: {{ $room->description }}</p>
<p>Contract date: {{ $room->contract }}</p>
<p>Room Price : {{ $room->roomType->room_price }}</p>
<p>Electrical Unit : {{ $room->roomType->water_unit }}</p>
<p>Water Unit : {{ $room->roomType->electrical_unit }}</p>
<p>Furniture : {{  $room->roomType->furniture_details }}</p>
<p>Contract End Date: {{ $contractEndDate->format('Y-m-d') }}</p>
@if ($remainingDays > 0)
    <p>Remaining days: {{ $remainingDays }} days</p>
@else
    <p>The contract has expired.</p>
@endif


<p>Payment Status:
    @if(isset($room->billing) && $room->billing->status === 'ส่งไปยังผู้ใช้แล้ว')
        There is a balance that needs to be paid.
    @elseif(!isset($room->billing))
        No billing information available.
    @else
        No debt.
    @endif
</p>

<!-- ปุ่ม Back -->
<a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
@endsection
