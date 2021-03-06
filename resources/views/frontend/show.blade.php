@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <h2>{{ __('Frontend/frontend.Invoice', ['invoice_number' => $invoice->invoice_number]) }}</h2>
                    <a href="{{ route('home') }}" class="btn btn-primary ml-auto"><i class="fa fa-home"> </i> {{ __('Frontend/frontend.Back_to_invoices') }}</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>{{ __('Frontend/frontend.Customer_name') }}</th>
                                <td>{{ $invoice->customer_name }}</td>
                                <th>{{ __('Frontend/frontend.Customer_email') }}</th>
                                <td>{{ $invoice->customer_email }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Frontend/frontend.Customer_mobile') }}</th>
                                <td>{{ $invoice->customer_mobile }}</td>
                                <th>{{ __('Frontend/frontend.Company_name') }}</th>
                                <td>{{ $invoice->company_name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Frontend/frontend.Invoice_number') }}</th>
                                <td>{{ $invoice->invoice_number }}</td>
                                <th>{{ __('Frontend/frontend.Invoice_date') }}</th>
                                <td>{{ $invoice->invoice_date }}</td>
                            </tr>
                        </table>

                        <h3>{{ __('Frontend/frontend.Invoice_details') }}</h3>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{{ __('Frontend/frontend.Product_name') }}}</th>
                                <th>{{ __('Frontend/frontend.Unit') }}</th>
                                <th>{{ __('Frontend/frontend.Quantity') }}</th>
                                <th>{{ __('Frontend/frontend.Unit_price') }}</th>
                                <th>{{ __('Frontend/frontend.Subtotal') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoice->details as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->unitText() }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->unit_price }}</td>
                                <td>{{ $item->row_sub_total }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">{{ __('Frontend/frontend.Sub_total') }}</th>
                                <td>{{ $invoice->sub_total }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">{{ __('Frontend/frontend.Discount') }}</th>
                                <td>{{ $invoice->sub_total }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">{{ __('Frontend/frontend.Sub_total') }}</th>
                                <td>{{ $invoice->discountResult() }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">{{ __('Frontend/frontend.Vat') }}</th>
                                <td>{{ $invoice->vat_value }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">{{ __('Frontend/frontend.Shipping') }}</th>
                                <td>{{ $invoice->shipping }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">{{ __('Frontend/frontend.Total_due') }}</th>
                                <td>{{ $invoice->total_due }}</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-12 text-center">
                            <a href="{{ route('invoices.print', $invoice->id) }}" class="btn btn-primary btn-sm ml-auto" target="_blank"><i class="fa fa-print"></i> {{ __('Frontend/frontend.Print') }}</a>
                            <a href="{{ route('invoices.pdf', $invoice->id) }}" class="btn btn-secondary btn-sm ml-auto"><i class="fa fa-file-pdf"></i> {{ __('Frontend/frontend.Export_pdf') }}</a>
                            <a href="{{ route('invoices.send_to_email', $invoice->id) }}" class="btn btn-success btn-sm ml-auto"><i class="fa fa-envelope"></i> {{ __('Frontend/frontend.Send_to_email') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
