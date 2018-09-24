@extends('layouts.main')

@section('content')
    <div class="panel">
        <div class="panel-body container-fluid">
            <h4 class="example-title">Худудлар</h4>
        </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Invoice</th>
                        <th>User</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Country</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><a href="javascript:void(0)">Order #26589</a></td>
                        <td>Herman Beck</td>
                        <td>
                            <span class="text-muted"><i class="wb md-time"></i> Oct 16, 2015</span>
                        </td>
                        <td>$45.00</td>
                        <td>
                            <div class="label label-table label-success">Paid</div>
                        </td>
                        <td>EN</td>
                    </tr>
                    <tr>
                        <td><a href="javascript:void(0)">Order #58746</a></td>
                        <td>Mary Adams</td>
                        <td>
                            <span class="text-muted"><i class="wb md-time"></i> Oct 12, 2015</span>
                        </td>
                        <td>$245.30</td>
                        <td>
                            <div class="label label-table label-info">Shipped</div>
                        </td>
                        <td>CN</td>
                    </tr>
                    <tr>
                        <td><a href="javascript:void(0)">Order #98458</a></td>
                        <td>Caleb Richards</td>
                        <td>
                            <span class="text-muted"><i class="wb md-time"></i> May 18, 2015</span>
                        </td>
                        <td>$38.00</td>
                        <td>
                            <div class="label label-table label-primary">Shipped</div>
                        </td>
                        <td>AU</td>
                    </tr>
                    <tr>
                        <td><a href="javascript:void(0)">Order #32658</a></td>
                        <td>June Lane</td>
                        <td>
                            <span class="text-muted"><i class="wb md-time"></i> Apr 28, 2015</span>
                        </td>
                        <td>$77.99</td>
                        <td>
                            <div class="label label-table label-info">Paid</div>
                        </td>
                        <td>FR</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

@endsection