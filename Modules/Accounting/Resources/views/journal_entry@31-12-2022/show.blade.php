@extends('layouts.app')

@section('title', __('accounting::lang.journal_entry'))

@section('content')
    @include('accounting::layouts.nav')
<section class="content">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header">
                    <div class="row no-print">
                        <div class="col-md-8">
                            <h4 class="card-title">@lang('accounting::lang.journal_entry_no') </h4>
                        </div>
                        <div class="col-md-3 ">
                                <a href="#" onclick="window.print();" class="btn btn-default"><i class="fa fa-print"></i> @lang('accounting::lang.print')</a>
                                <a class="btn btn-primary" href="{{ action('\Modules\Accounting\Http\Controllers\JournalEntryController@edit', ['journal_entry' => $journal_entry->id]) }}"><i class="fa fa-edit"></i> @lang( 'messages.edit' )</a>
                        </div>
                    </div>
                </div>
                                       
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('purchase.ref_no')</th>
                            <td>{{ $journal_entry->ref_no }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('accounting::lang.journal_date') }}</th>
                            <td>{{ $journal_entry->operation_date }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('accounting::lang.additional_notes') }}</th>
                            <td>{{ $journal_entry->note }}</td>
                        </tr>
                    </table>
                </div>
                <br>
                <div class="box-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>@lang('accounting::lang.account')</th>
                    <th>@lang('accounting::lang.credit')</th>
                    <th>@lang('accounting::lang.debit')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                    $credit_total = 0;
                    $debit_total = 0;
                    @endphp
                    @foreach($accounts_transactions as $transaction)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transaction['account']['name'] }}</td>
                    @if($transaction['type'] == 'credit')
                    <td>{{ $transaction['amount'] }}</td>
                    <td></td>
                    @php
                    $credit_total += $transaction['amount'];
                    @endphp
                    @elseif($transaction['type'] == 'debit')
                    <td></td>
                    <td>{{ $transaction['amount'] }}</td>
                    @php
                    $debit_total += $transaction['amount'];
                    @endphp
                    @endif
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
	       <th></th>
                    <th></th>
                    <th>@lang('accounting::lang.total_credit'): {{ $credit_total }}</th>
                    <th>@lang('accounting::lang.total_debit'): {{ $debit_total }}</th>
                    </tr>
                    </tfoot>
                    </table>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
@endsection


