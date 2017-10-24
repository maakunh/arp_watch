@extends('app')

@section('content')
<div class="panel-body">
                 <a class="btn btn-link pull-left" href="{{ url('/') }}">
                      <i class="glyphicon glyphicon-backward"></i>戻る
                </a>
</div>
<div class="panel panel-default"> <div class="panel-heading">コントロールテーブルへ登録</div>
<div class="row">
     <div class="col-md-12">

        <form action="{{ url('arp_records/update')}}" method="POST">
            <!-- mac_address -->
            <div class="form-group">
                <label for="item_mac_address">mac_address</label>
                <input type="text" id="item_mac_address" name="item_mac_address" class="form-control" value="{{$arp_record->mac_address}}" readonly="readonly">
            </div>
                
            <!-- ip_address -->
            <div class="form-group">
                 <label for="item_ip_address">ip_address</label>
                 <input type="text" id="item_ip_address" name="item_ip_address" class="form-control" value="{{$arp_record->ip_address}}" readonly="readonly">
            </div>
            
            <!-- status -->
            <div class="form-group">
                 <label for="item_status">status</label>
                 <select id="item_status" name="item_status" class="form-control">
                     <option value="">▼以下から選択してください</option>
                     <option value="1">ブロックする</option>
                     <option value="2">ブロックしない</option>
                     <option value="3">保留する</option>
                 </select>
            </div>
            
            <!-- sensor_id -->
             <div class="form-group">
                <label for="item_sensor_id">sensor_id</label>
                <input type="text" id="item_sensor_id" name="item_sensor_id" class="form-control" value="{{$arp_record->sensor_id}}" readonly="readonly">
             </div>
            
          <!-- 保存ボタン/戻るボタン -->
            <div class="well well-sm">
                 <button type="submit" class="btn btn-primary">登録</button>
            </div>
          
            <!-- CSRF -->
            {{csrf_field()}}
            
        </form>
        @if($arp_control_count > 0)
            <div class="alert alert-info">
                 <div><strong> 注意！！　コントロールテーブルに同一ノードのデータがあるので、上書きとなります </strong></div>
            </div>
        @endif
        
        @include('common.errors')
    </div>
</div>
@endsection
            
            