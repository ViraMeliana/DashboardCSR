@extends('layouts/contentLayoutMaster')

@section('content')


    <div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tjsl.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tjsls.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-hover">
                <tbody>
                    <tr>
                        <th>
                            Pilar Pembangunan
                        </th>
                        <th>
                            Nomor TDP
                        </th>
                        <th>
                            RKA
                        </th>
                        <th>
                            Cashout
                        </th>
                        <th>
                            Commited
                        </th>
                        <th>
                            Realisasi  Total
                        </th>
                    </tr>
                    <tr>
                        <td rowspan="{{ count($toShow['sosial'])+1 }}">
                            Sosial
                        </td>
                    </tr>
                    @foreach($toShow['sosial'] as $item)
                        <tr>
                            <td>{{ $item['tpb_number'] }}</td>
                            <td>@money($item['rka'])</td>
                            <td>@money($item['cash_out'])</td>
                            <td>@money($item['commited'])</td>
                            <td>@money($item['realization'])</td>
                        </tr>
                    @endforeach

                    <tr>
                        <td colspan="2">
                            Subtotal 1
                        </td>
                        <td>@money($toShow['sosial-rka'])</td>
                        <td>@money($toShow['sosial-cash-out'])</td>
                        <td>@money($toShow['sosial-commited'])</td>
                        <td>@money($toShow['sosial-realization'])</td>
                    </tr>
                    <tr>
                        <td rowspan="{{ count($toShow['ekonomi'])+1 }}">
                            Ekonomi
                        </td>
                    </tr>
                    @foreach($toShow['ekonomi'] as $item)
                        <tr>
                            <td>{{ $item['tpb_number'] }}</td>
                            <td>@money($item['rka'])</td>
                            <td>@money($item['cash_out'])</td>
                            <td>@money($item['commited'])</td>
                            <td>@money($item['realization'])</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2">
                            Subtotal 2
                        </td>
                        <td>@money($toShow['ekonomi-rka'])</td>
                        <td>@money($toShow['ekonomi-cash-out'])</td>
                        <td>@money($toShow['ekonomi-commited'])</td>
                        <td>@money($toShow['ekonomi-realization'])</td>
                    </tr>
                    <tr>
                        <td rowspan="{{ count($toShow['lingkungan'])+1 }}">
                            Lingkungan
                        </td>
                    </tr>
                    @foreach($toShow['lingkungan'] as $item)
                        <tr>
                            <td>{{ $item['tpb_number'] }}</td>
                            <td>@money($item['rka'])</td>
                            <td>@money($item['cash_out'])</td>
                            <td>@money($item['commited'])</td>
                            <td>@money($item['realization'])</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2">
                            Subtotal 3
                        </td>
                        <td>@money($toShow['lingkungan-rka'])</td>
                        <td>@money($toShow['lingkungan-cash-out'])</td>
                        <td>@money($toShow['lingkungan-commited'])</td>
                        <td>@money($toShow['lingkungan-realization'])</td>
                    </tr>
                    <tr>
                        <td rowspan="{{ count($toShow['hukum-tata-kelola'])+1 }}">
                            Hukum dan Tata Kelola
                        </td>
                    </tr>
                    @foreach($toShow['hukum-tata-kelola'] as $item)
                        <tr>
                            <td>{{ $item['tpb_number'] }}</td>
                            <td>@money($item['rka'])</td>
                            <td>@money($item['cash_out'])</td>
                            <td>@money($item['commited'])</td>
                            <td>@money($item['realization'])</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2">
                            Subtotal 4
                        </td>
                        <td>@money($toShow['hukum-tata-kelola-rka'])</td>
                        <td>@money($toShow['hukum-tata-kelola-cash-out'])</td>
                        <td>@money($toShow['hukum-tata-kelola-commited'])</td>
                        <td>@money($toShow['hukum-tata-kelola-realization'])</td>
                    </tr>
                    <tr>
                        <td colspan="6"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong>Total</strong></td>
                        <td>@money($toShow['rka-all'])</td>
                        <td>@money($toShow['cash-out-all'])</td>
                        <td>@money($toShow['cash-out-all'])</td>
                        <td>@money($toShow['realization-all'])</td>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tjsls.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
