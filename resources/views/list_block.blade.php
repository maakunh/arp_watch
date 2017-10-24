@extends('app_block')

@section('content')
<div class="panel-body">
                 <a class="btn btn-link pull-left" href="{{ url('/') }}">
                      <i class="glyphicon glyphicon-backward"></i>戻る
                </a>
</div>
<div class="row">
     <div class="col-md-12">
        <div class="panel panel-default"> <div class="panel-heading">ノードブロック履歴</div>
            <div class="panel-body">
 
               
                <table class="table table-striped task-table">
                  <!-- テーブルヘッダ -->
                  <thead><th>timeval</th></th><th>mac_address</th><th>ip_address</th><th>result</th><th>sensor_id</th></thead>
                  <!-- テーブル 本体 -->
                  <tbody>
      @if (count($arp_blocks) > 0)
                        @foreach ($arp_blocks as $arp_block)
                        <tr>
                            <td class="table-text"> <div>{{ $arp_block->timeval }}</div></td>
                            <td class="table-text"> <div>{{ $arp_block->mac_address }}</div> </td>
                            <td class="table-text"> <div>{{ $arp_block->ip_address }}</div> </td>
                            @if ($arp_block->result == 1)
                            <td class="table-text"> <div>success</div> </td>
                            @endif
                            @if ($arp_block->result == 2)
                            <td class="table-text"> <div>failure</div> </td>
                            @endif
                            <td class="table-text"> <div>{{ $arp_block->sensor_id }}</div> </td>
                       </tr>
                        @endforeach
      @endif
                    </tbody>
                </table>
            </div>
            <div class="row"> <div class="col-md-4 col-md-offset-4"> {{$arp_blocks->links()}} </div> </div>
        </div>
         <!-- バリデーションエラーの 表示 に 使用 -->
         @include('common.errors')
    @if (count($arp_blocks) == 0)
        <div class="alert alert-info">
             <div><strong> データがありません </strong></div>
        </div>
    @endif          

    </div>
</div>
@endsection
            
            