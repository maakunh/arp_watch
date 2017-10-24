@extends('app')

@section('content')

    <div class="panel-body">
                 <a class="btn btn-link pull-left" href="{{ url('/') }}">
                      <i class="glyphicon glyphicon-backward"></i>戻る
                </a>
    </div>
                 <!-- 履歴表示 -->
        <div class="panel panel-default"> <div class="panel-heading">検出ノード一覧 </div>
            <div class="panel-body">
               <table class="table table-striped task-table">
                  <!-- テーブルヘッダ -->
                  <thead><th>mac_address</th><th>ip_address</th><th>status</th><th>sensor_id</th> </thead>
                  <!-- テーブル 本体 -->
                  <tbody>
      @if (count($arp_nodes) > 0)
                       @foreach ($arp_nodes as $arp_node)
                        <tr>
                            <td class="table-text"> <div>{{ $arp_node->mac_address }}</div> </td>
                            <td class="table-text"> <div>{{ $arp_node->ip_address }}</div> </td>
                            <td class="table-text">
                                <div>
                                    @if ($arp_node->status == "")未対応@endif
                                    @if ($arp_node->status == 1)ブロックする@endif
                                    @if ($arp_node->status == 2)ブロックしない@endif
                                    @if ($arp_node->status == 3)保留する@endif
                                </div>
                            </td>
                            <td class="table-text"> <div>{{ $arp_node->sensor_id }}</div> </td>
                       </tr>
                        @endforeach
       @endif
                 </tbody>
                </table>
            </div>
            <div class="row"> <div class="col-md-4 col-md-offset-4"> {{$arp_nodes->links()}} </div> </div>
        </div>
         <!-- バリデーションエラーの 表示 に 使用 -->
         @include('common.errors')
    @if (count($arp_nodes) == 0)
    <div class="alert alert-info">
         <div><strong> データがありません </strong></div>
    </div>
    @endif
    
@endsection

