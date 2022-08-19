    @extends('layouts.user.employer.master')
@section('title', 'ALSHOALA | ALL BILLS')
@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            @php
                $title = '';
            @endphp
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">ALL BILLS</h1>
            <div class="row g-4">
                <div class="col-sm-12 text-center">
                    <div class="table-responsive" id="avilable-jobs_table">
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Invoice No.</th>
                                    <th scope="col">Total Qty</th>
                                    <th scope="col">Total Amount</th>
                                    <th scope="col">Total Paid</th>
                                    <th scope="col">Total Left</th>
                                    <th scope="col" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @forelse ($invoices as $invoice)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $invoice->number }}</td>
                                        <td>{{ $invoice->qty() }}</td>
                                        <td class="">
                                            {{ $invoice->totalCharge() * $invoice->qty() }}
                                        </td>

                                        <td>
                                            {{ $invoice->paid_amount }}
                                        </td>
                                        <td>
                                            {{ $invoice->totalCharge() * $invoice->qty() - $invoice->paid_amount }}
                                        </td>
                                        <td>
                                            <a href="{{ route('invoice.print', $invoice->id) }}"><i
                                                    class="fa fa-print"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="alert alert-warning text-center bg-dark"
                                            style="color:#fff">
                                            No Records Yet
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $invoices->links() }}
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
        integrity="sha512-k2WPPrSgRFI6cTaHHhJdc8kAXaRM4JBFEDo1pPGGlYiOyv4vnA0Pp0G5XMYYxgAPmtmv/IIaQA6n5fLAyJaFMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('select[name="filter"]').on('change', function() {
                // alert('testing');
                var status = $(this).val();
                if (status) {
                    $.ajax({
                        url: "{{ URL::to('avilable_job/filter') }}/" + status,
                        type: "GET",
                        // dataType: "json",
                        success: function(data) {
                            $('#avilable-jobs_table').html(data);
                        },
                        error: function(data) {
                            console.log(data);
                        },
                    });

                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endpush
