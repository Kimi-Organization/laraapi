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

                    @if (isset($data) && count($data) > 0)
                        <h3>Account Overview</h3>
                        <table border="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Login</th>
                                    <th>Currency</th>
                                    <th>Balance</th>
                                    <th>Server ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td><strong>{{ $item['login'] ?? 'N/A' }}</strong></td>
                                        <td><strong>{{ $item['currency'] ?? 'N/A' }}</strong></td>
                                        <td><strong>{{ number_format((float)$item['balance'], 2) ?? 'N/A' }}</strong></td>
                                        <td><strong>{{ $item['serverId'] ?? 'N/A' }}</strong></td>
                                    </tr>
                                @endforeach
                            </tbody>
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
