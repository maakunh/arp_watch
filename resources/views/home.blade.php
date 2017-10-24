@extends('app')

@section('content')

    <div class="panel-body">
                <a class="btn btn-link pull-right" href="{{ url('/arp_node') }}">
                      検出ノード一覧
                </a>
                <a class="btn btn-link pull-right" href="{{ url('/arp_sensor') }}">
                      センサー一覧
                </a>

                <a class="btn btn-link pull-right" href="{{ url('/arp_block') }}">
                      ノードブロック履歴
                </a>

                <a class="btn btn-link pull-right" href="{{ url('/arp_control') }}">
                      コントロールテーブル
                </a>

            @if($arp_records_check > 0)
                 <form name=form_status_select action="{{ url('/status_select')}}" method="POST">
                 {{csrf_field()}}
                        <input type="hidden" name="status" value="">
                        <a class="btn btn-link pull-right"  href="javascript:form_status_select.submit()">
                          <strong>未対応データがあります！</strong>
                        </a>
                 </form>
            @endif
    </div>
                 <!-- 履歴表示 -->
        <div class="panel panel-default"> <div class="panel-heading"> ノード検出履歴 </div>
            <div class="panel-body">
               <table class="table table-striped task-table">
                  <!-- テーブルヘッダ -->
                  <thead> <th>timeval</th><th>mac_address</th><th>ip_address</th><th>status</th><th>pcap_fname</th><th>sensor_id</th> </thead>
                  <!-- テーブル 本体 -->
                  <tbody>
      @if (count($arp_records) > 0)
                       @foreach ($arp_records as $arp_record)
                        <tr>
                            <td class="table-text"> <div>{{ $arp_record->timeval }}</div> </td>
                            <td class="table-text"> 
                            
                            <div>
                                    <form name=form{{ $arp_record->id }} action="{{ url('/arp_record_edit')}}" method="POST">
                                             {{csrf_field()}}
                                             <input type="hidden" name="mac_address" value="{{ $arp_record->mac_address }}">
                                             <input type="hidden" name="ip_address" value="{{ $arp_record->ip_address }}">
                                             <input type="hidden" name="sensor_id" value="{{ $arp_record->sensor_id }}">

                                             <a href="javascript:form{{ $arp_record->id }}.submit()">{{ $arp_record->mac_address }}</a>
                                    </form>
                            </div>
                            </td>
                            <td class="table-text"> <div>{{ $arp_record->ip_address }}</div> </td>
                            <td class="table-text">
                                <div>
                                    @if ($arp_record->status == "")未対応@endif
                                    @if ($arp_record->status == 1)ブロックする@endif
                                    @if ($arp_record->status == 2)ブロックしない@endif
                                    @if ($arp_record->status == 3)保留する@endif
                                </div>
                            </td>
                            <td class="table-text"> <div>{{ $arp_record->pcap_fname }}</div> </td>
                            <td class="table-text"> <div>{{ $arp_record->sensor_id }}</div> </td>
                       </tr>
                        @endforeach
       @endif
                 </tbody>
                </table>
            </div>
            <div class="row"> <div class="col-md-4 col-md-offset-4"> {{$arp_records->links()}} </div> </div>
        </div>
         <!-- バリデーションエラーの 表示 に 使用 -->
         @include('common.errors')
    @if (count($arp_records) == 0)
    <div class="alert alert-info">
         <div><strong> データがありません </strong></div>
    </div>
    @endif
    
@endsection

