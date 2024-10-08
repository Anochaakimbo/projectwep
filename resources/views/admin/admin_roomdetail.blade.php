<link rel="stylesheet" type="text/css" href="{{ asset('css/booking1.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

@extends('layouts.sidebar-admin')

<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('content')
<h1>ห้องพักทั้งหมด</h1>
<form action="/roomdetail/updated" method="POST" style="display: none;" id="updateroom">
    @csrf
    <h2 class="updateroomheader">Update Room</h2>
    <input type="hidden" name="id" id="room_id">
    <label for="">Room number:</label><br>
    <input type="text" name="room_number" id="room_number" readonly class="textroomnumber"><br>
    <label for="roomtype">Room Type:</label><br>
    <input name="room_type_id" id="room_type_id" required readonly class="textroomtype"><br>
    <label for="">Floor:</label><br>
    <input type="number" name="floor" id="floor" readonly class="textroomfloor"><br>
    <label for="">Description:</label><br>
    <textarea name="description" id="description" cols="30" rows="10" required></textarea><br><br>
    <div class="btninform">
        <button type="button" class="backbtn" onclick="hideupdateform()">ปิด</button>
        <button type="button" onclick="confirmUpdateRoom()" class="addroombutton1">ยืนยัน</button>
    </div>
</form>


<div class="main-content">
    <div class="room-info">
        <div class="details">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>เลขห้อง</th>
                        <th>ประเภทห้อง</th>
                        <th>รายละเอียดเพิ่มเติม</th>
                        <th>ชื่อผู้เข้าพัก</th>
                        <th>ชั้น</th>
                        <th>สถานะ</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $rooms )
                    <tr>
                        <td>{{ $rooms->room_number }}</td>
                        <td>{{ $rooms->roomType->room_description }}</td>
                        <td>{{ $rooms->description }}</td>
                        <td>
                            @if ($rooms->user)
                                {{ $rooms->user->name }}
                            @else
                                <p style="color:gray">- ขณะนี้ไม่มีผู้พัก -</p>
                            @endif
                        </td>
                        <td>{{ $rooms->floor }}</td>
                        <td>
                        @if ($rooms->is_available == "1")
                            <p style="color:rgb(0, 255, 0)">ว่าง</p>
                        @else
                            <p style="color:red">ไม่ว่าง</p>
                        @endif
                        </td>
                        <td class="updatecolumn">
                            <a href="javascript:void(0)" class="updatebutton"
                               onclick="showupdateform({{ $rooms->id }}, '{{ $rooms->roomType->room_description }}', '{{ $rooms->room_number }}', '{{ $rooms->description }}', {{ $rooms->floor }})">
                               อัพเดท
                            </a>
                        </td>
                        <td class="deletecolumn">
                            <a href="javascript:void(0)" class="deletebutton"
                               onclick="confirmDeleteRoom('{{ route('roomdelete', $rooms->id) }}')">
                               ลบห้อง
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function showupdateform(id, room_description, room_number, description, floor) {
        document.getElementById('room_id').value = id;
        document.getElementById('room_number').value = room_number;
        document.getElementById('room_type_id').value = room_description;
        document.getElementById('floor').value = floor;
        document.getElementById('description').value = description;

        document.getElementById('updateroom').style.display = 'block';
    }

    function hideupdateform() {
        document.getElementById('updateroom').style.display = 'none';
    }

    function confirmUpdateRoom() {
        Swal.fire({
            title: 'คุณแน่ใจหรือไม่?',
            text: "คุณต้องการแก้ไขข้อมูลห้องนี้?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('updateroom').submit();
            }
        });
    }
    @if (session('error'))
    Swal.fire({
        title: 'Error!',
        text: "{{ session('error') }}",
        icon: 'error',
        confirmButtonText: 'OK'
    });
    @endif

    function confirmDeleteRoom(deleteUrl) {
        Swal.fire({
            title: 'คุณแน่ใจหรือไม่?',
            text: "คุณต้องการที่จะลบห้องนี้?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = deleteUrl;
            }
        });
    }

    document.getElementById('search').addEventListener('input', function() {
    let input = this.value.toLowerCase();
    let rows = document.querySelectorAll('.styled-table tbody tr');

    rows.forEach(row => {
        let userName = row.querySelector('td:first-child').textContent.toLowerCase();
        if (userName.includes(input)) {
            row.style.display = ''; // แสดงแถวที่ตรงกับการค้นหา
        } else {
            row.style.display = 'none'; // ซ่อนแถวที่ไม่ตรงกับการค้นหา
        }
    });
});
</script>

@endsection
