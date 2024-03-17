@extends('admin.layouts.app')
@section('title', 'Danh sách người bán')
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 40px;
        height: 20px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
        border-radius: 10px;
        =
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        left: 2px;
        bottom: 2px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        border-radius: 50%;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(16px);
        -ms-transform: translateX(16px);
        transform: translateX(16px);
    }

    .table th {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .table td {
        white-space: normal;
        overflow: hidden;
        text-overflow: ellipsis;
        max-height: 40px;
    }
</style>
@section('content')
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                        <div class="panel-body">
                            <table class="table" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Tên tài khoản</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Tên shop</th>
                                        <th>Địa chỉ</th>
                                        <th>Mô tả</th>
                                        <th>Phê duyệt</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($approve as $user)
                                        <tr>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone_number }}</td>
                                            <td>{{ $user->name_shop }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>{{ $user->description }}</td>
                                            <td>
                                                <form
                                                    action="{{ route('admin.approve.update', ['username' => $user->username]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="POST">
                                                    <label class="switch">
                                                        <input type="checkbox" class="approval-checkbox" name="approved"
                                                            onchange="this.form.submit()"
                                                            {{ $user->approved == 1 ? 'checked' : '' }}>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
