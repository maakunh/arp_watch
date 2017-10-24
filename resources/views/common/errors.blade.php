<!-- resources/views/common/errors.blade.php -->
@if (count($errors) > 0) 
<!-- Form Error List -->
<div class="alert alert-danger">
     <div><strong> エラーメッセージ </strong></div>
     <div> <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul> </div>
</div>
@endif
@if (count($errors) == 0) 
<!--<div class="alert alert-success">
          <div><strong> 正常終了 </strong></div>
     </div>-->
@endif
