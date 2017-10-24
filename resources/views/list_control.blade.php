@extends('app_control')

@section('content')
<div class="panel-body">
                 <a class="btn btn-link pull-left" href="{{ url('/') }}">
                      <i class="glyphicon glyphicon-backward"></i>戻る
                </a>
</div>
<div class="row">
     <div class="col-md-12">
        <div class="panel panel-default"> <div class="panel-heading">コントロールテーブル</div>
            <div class="panel-body">
 
               
                <table class="table table-striped task-table">
                  <!-- テーブルヘッダ -->
                  <thead><th>mac_address</th><th>ip_address</th><th>status</th><th></th><th></th><th>sensor_id</th><th></th></thead>
                  <!-- テーブル 本体 -->
                  <tbody>
      @if (count($arp_records) > 0)
                        @foreach ($arp_records as $arp_record)
                        <tr>
                            <td class="table-text"> <div>{{ $arp_record->mac_address }}</div></td>
                            <td class="table-text"> <div>{{ $arp_record->ip_address }}</div> </td>
                            <td class="table-text">
                                 <div>
                                @if ($arp_record->status == 1)ブロックする@endif
                                @if ($arp_record->status == 2)ブロックしない@endif
                                @if ($arp_record->status == 3)保留する@endif
                                </div>
                            </td>
                            <td class="table-text"> 
                                <div>
                                    <form name=form{{ $arp_record->id }}_edit action="{{ url('/arp_control_edit')}}" method="POST">
                                             {{csrf_field()}}
                                              <input type="hidden" name="id" value="{{ $arp_record->id }}">
                                              <input type="hidden" name="mac_address" value="{{ $arp_record->mac_address }}">
                                              <input type="hidden" name="ip_address" value="{{ $arp_record->ip_address}}">
                                              <input type="hidden" name="status" value="{{ $arp_record->status}}">
                                              <input type="hidden" name="sensor_id" value="{{ $arp_record->sensor_id}}">

                                              <a href="javascript:form{{ $arp_record->id }}_edit.submit()"><i class="glyphicon glyphicon-pencil"></i></a>
                                    </form>
                                </div>
                            </td>
                            <td>
                                    <!--<form name=form{{ $arp_record->id }}_delete action="{{ url('/arp_control/delete/'.$arp_record->id)}}" method="POST">-->
                                    <form name=form{{ $arp_record->id }}_delete action="{{ url('/arp_control/update_delete')}}" method="POST">
                                              {{csrf_field()}}
                                              <input type="hidden" name="id" value="{{ $arp_record->id }}">
                                              <input type="hidden" name="mac_address" value="{{ $arp_record->mac_address }}">
                                              <input type="hidden" name="ip_address" value="{{ $arp_record->ip_address}}">
                                              <input type="hidden" name="sensor_id" value="{{ $arp_record->sensor_id}}">
                                              <a href="javascript:form{{ $arp_record->id }}_delete.submit()"><i class="glyphicon glyphicon-trash"></i></a>
                                    </form>
                            </td>
                            <td class="table-text"> <div>{{ $arp_record->sensor_id }}</div> </td>

                            <td></td>
                       </tr>
                        @endforeach
      @endif
                      <tr>
                                <form action="{{ url('/arp_control/store')}}" method="POST" class="form-horizontal">
                                 {{csrf_field()}}
                                    <div class="form-group"> 
                                        <div class="col-sm-offset-3 col-sm-6">
                                            <td><input type="text" id="item_mac_address" name="item_mac_address" class="form-control"></td>
                                            <td><input type="text" id="item_ip_address" name="item_ip_address" class="form-control"></td>
                                            <td>
                                                <select id="item_status" name="item_status" class="form-control">
                                                     <option value="1">ブロックする</option>
                                                     <option value="2">ブロックしない</option>
                                                     <option value="3">保留する</option>
                                                </select>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td><input type="text" id="item_sensor_id" name="item_sensor_id" class="form-control"></td>
                                            <td>
                                                 <button type="submit"class="btn btn-default">
                                                     <i class="glyphicon glyphicon-plus"></i>
                                                 </button>
                                            </td>
                                        </div>
                                    </div>
                                </form>

                        </tr>
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

    </div>
</div>
@endsection
            
            