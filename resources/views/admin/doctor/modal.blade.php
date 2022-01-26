<!-- Modal -->
<div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">施工管理者　インフォメーション</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p><img src="{{asset('images')}}/{{$user->image}}" width="200" alt=""></p>
          <p class="badge badge-pill badge-dark">Role:{{$user->role->name}}</p>
          <p>名前:{{$user->name}}</p>
          <p>メールアドレス:{{$user->email}}</p>
          <p>住所:{{$user->address}}</p>
          <p>電話番号:{{$user->phone_number}}</p>
          <p>担当:{{$user->department}}</p>
          <p>専門:{{$user->education}}</p>
          <p>Bio:{{$user->description}}</p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">閉じる</button>
          
        </div>
      </div>
    </div>
  </div>