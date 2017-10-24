@extends('app_sensor')

@section('content')
<div class="panel-body">
                 <a class="btn btn-link pull-left" href="{{ url('/') }}">
                      <i class="glyphicon glyphicon-backward"></i>戻る
                </a>
</div>
<div class="row">
     <div class="col-md-12">
        <div class="panel panel-default"> <div class="panel-heading">センサー一覧</div>
            <div class="panel-body">
 
               
                <table class="table table-striped task-table">
                  <!-- テーブルヘッダ -->
                  <thead><th>sensor_id</th><th>mac_address</th><th>version</th><th>comment</th><th>created_at</th><th>updated_at</th><th>sensor_status</th><th>network_addr</th><th>ip_address</th><th></th><th></th></thead>
                  <!-- テーブル 本体 -->
                  <tbody>
      @if (count($arp_sensors) > 0)
                        @foreach ($arp_sensors as $arp_sensor)
                        <tr>
                                <td class="table-text"> <div>{{$arp_sensor->sensor_id}}</div></td>
                                <td class="table-text"> <div>{{$arp_sensor->mac_address}}</div></td>
                                <td class="table-text"> <div>{{$arp_sensor->version}}</div></td>
                                <td class="table-text"> <div>{{$arp_sensor->comment}}</td>
                                <td class="table-text"> <div>{{$arp_sensor->created_at}}</td>
                                <td class="table-text"> <div>{{$arp_sensor->updated_at}}</td>
                                @if ($arp_sensor->sensor_status == 0)
                                <td class="table-text"> <div>Unknown</td>
                                @endif
                                @if ($arp_sensor->sensor_status == 1)
                                <td class="table-text"> <div>Running</td>
                                @endif
                                @if ($arp_sensor->sensor_status == 2)
                                <td class="table-text"> <div>Shutdown</td>
                                @endif
                                @if ($arp_sensor->sensor_status == 3)
                                <td class="table-text"> <div>Shutdown Start</td>
                                @endif
                                @if ($arp_sensor->sensor_status == 4)
                                <td class="table-text"> <div>Reboot</td>
                                @endif
                                @if ($arp_sensor->sensor_status == 5)
                                <td class="table-text"> <div>Reboot Start</td>
                                @endif
                                @if ($arp_sensor->sensor_status == 9)
                                <td class="table-text"> <div>Stopped</td>
                                @endif
                                <td class="table-text"> <div>{{$arp_sensor->network_addr}}</td>
                                <td class="table-text"> <div>{{$arp_sensor->ip_address}}</td>
                                <td class="table-text">
                                   @if($arp_sensor->sensor_status == 1) <!--起動中のみ編集可能とする-->
                                        <div>
                                            <form name=form{{ $arp_sensor->id }}_edit action="{{ url('/arp_sensor_edit/'.$arp_sensor->id)}}" method="POST">
                                                {{csrf_field()}}
                                                <a href="javascript:form{{ $arp_sensor->id }}_edit.submit()"><i class="glyphicon glyphicon-pencil"></i></a>
                                            </form>
                                        </div>
                                   @endif
                                </td>
                                <td></td>
                                <td>
                                    <form name=form{{ $arp_sensor->id }}_delete action="{{ url('/arp_sensor/update_delete/'.$arp_sensor->id)}}" method="POST">
                                              {{csrf_field()}}
                                              {{ method_field('DELETE') }}
                                              <a href="javascript:form{{ $arp_sensor->id }}_delete.submit()"><i class="glyphicon glyphicon-trash"></i></a>
                                    </form>
                                </td>
                       </tr>
                        @endforeach
      @endif

                    </tbody>
                </table>
            </div>
            <div class="row"> <div class="col-md-4 col-md-offset-4"> {{$arp_sensors->links()}} </div> </div>
        </div>
         <!-- バリデーションエラーの 表示 に 使用 -->
         @include('common.errors')
    @if (count($arp_sensors) == 0)
        <div class="alert alert-info">
             <div><strong> データがありません </strong></div>
        </div>
    @endif          

    </div>
</div>
@endsection
            
            