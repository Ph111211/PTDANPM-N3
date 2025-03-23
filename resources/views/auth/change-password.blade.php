<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div style="width: 671px; height: 598px; position: relative; background: #2F36B5; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); overflow: hidden; border-radius: 30px; outline: 1px black solid; outline-offset: -1px">
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('PUT')
  <input type = "password" name="current_password" style="width: 468px; height: 65px; left: 113px; top: 140px; position: absolute; background: #F0F0F0; overflow: hidden; border-radius: 10px; color: black; font-size: 25px; font-family: Inter; font-weight: 400; word-wrap: break-word; padding-left: 10px" placeholder="Mật khẩu cũ"/></input>
  
  <button type="submit" style="width: 468px; height: 68px; left: 102px; top: 485px; position: absolute; background: #003C75; overflow: hidden; border-radius: 10px">
    <span style="width: 222px; height: 32px; left: 100px; top: 18px; position: absolute; color: white; font-size: 25px; font-family: Inter; font-weight: 400; word-wrap: break-word">Xác nhận</span>
  </button>
  <div style="left: 113px; top: 66px; position: absolute; color: white; font-size: 25px; font-family: Inter; font-weight: 400; word-wrap: break-word">Đổi mật khẩu</div>
  <input type = "password" name = "password_confirmation" style="width: 468px; height: 68px; left: 113px; top: 343px; position: absolute; background: #F0F0F0; overflow: hidden; border-radius: 10px; color: black; font-size: 25px; font-family: Inter; font-weight: 400; word-wrap: break-word; padding-left: 10px" placeholder="Xác nhận mật khẩu mới"/></input>
  </input>
  <input type="password" name = "password" style="width: 468px; height: 68px; left: 113px; top: 240px; position: absolute; background: #F0F0F0; overflow: hidden; border-radius: 10px; color: black; font-size: 25px; font-family: Inter; font-weight: 400; word-wrap: break-word;" placeholder="Mật khẩu mới">
  </input>
</div>