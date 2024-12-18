@extends('layout.app')

@section('content')
<!-- Row start -->
<div class="row gx-3">
    <div class="col-xxl-12">
        <div class="card">
            <div class="card-body">
                <div class="card-320">

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if (isset($data))
                        <table border="0" width="50%">
                            <tr>
                                <td>Trading Platform Login</td>
                                <td>: <strong>{{ $data['login'] }}</strong></td>
                            </tr>
                            <tr>
                                <td>Currency</td>
                                <td>: <strong>{{ $data['currency'] }}</strong></td>
                            </tr>
                            <tr>
                                <td>Balance</td>
                                <td>: <strong>{{ $data['balance'] }}</strong></td>
                            </tr>
                            <tr>
                                <td>Server ID</td>
                                <td>: <strong>{{ $data['serverId'] }}</strong></td>
                            </tr>

                        </table>

                    @else
                        <p>No user data available.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Row end -->

@endsection
