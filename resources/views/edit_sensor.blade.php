@extends('app')

@section('content')
<div class="panel-body">
                 <a class="btn btn-link pull-left" href="{{ url('/arp_sensor') }}">
                      <i class="glyphicon glyphicon-backward"></i>戻る
                </a>
</div>
<div class="panel panel-default"> <div class="panel-heading">選択データ変更</div>

    <div class="row">
         <div class="col-md-12">
    
            <form action="{{ url('arp_sensor/update')}}" method="POST">
            
                <input type="hidden" name="id" value="{{ $arp_sensor->id }}">
            
                <!--  -->
                <div class="form-group">
                    <label for="sensor_id">sensor_id</label>
                    <input type="text" id="sensor_id" name="sensor_id" class="form-control" value="{{$arp_sensor->sensor_id}}" readonly="readonly">
                </div>
                <!--  -->
                <div class="form-group">
                    <label for="mac_address">mac_address</label>
                    <input type="text" id="mac_address" name="mac_address" class="form-control" value="{{$arp_sensor->mac_address}}" readonly="readonly">
                </div>
                <!--  -->
                <div class="form-group">
                    <label for="version">version</label>
                    <input type="text" id="version" name="version" class="form-control" value="{{$arp_sensor->version}}" readonly="readonly">
                </div>
                <!--  -->
                <div class="form-group">
                    <label for="comment">comment</label>
                    <input type="text" id="comment" name="comment" class="form-control" value="{{$arp_sensor->comment}}">
                </div>
                <div class="form-group">
                    <label for="sensor_status">sensor_status</label>
                    <select id="sensor_status" name="sensor_status" class="form-control">
                         <option value="1">Running</option>
                         <option value="2">Shutdown</option>
                         <option value="4">Reboot</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="network_addr">network_addr</label>
                    <input type="text" id="network_addr" name="network_addr" class="form-control" value="{{$arp_sensor->network_addr}}">
                </div>
                <div class="form-group">
                    <label for="ip_address">ip_address</label>
                    <input type="text" id="ip_address" name="ip_address" class="form-control" value="{{$arp_sensor->ip_address}}">
                </div>
                   

                
              <!-- 保存ボタン/戻るボタン -->
                <div class="well well-sm">
                     <button type="submit" class="btn btn-primary">変更</button>
                </div>
              
                <!-- CSRF -->
                {{csrf_field()}}
                
            </form>
            @include('common.errors')
        </div>
    </div>
</div>
@endsection
            
            