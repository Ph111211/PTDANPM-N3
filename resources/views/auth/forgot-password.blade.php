<!-- <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
< style="width: 671px; height: 438px; position: relative; background: #2F36B5; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); overflow: hidden; border-radius: 30px; outline: 1px black solid; outline-offset: -1px">
<form method="POST" action="{{ route('password.email') }}">
    @csrf
<input type="text" name="email" style="width: 468px; height: 68px; left: 113px; top: 185px; position: absolute; background: #F0F0F0; overflow: hidden; border-radius: 10px; color: black; font-size: 25px; font-family: Inter; font-weight: 400; word-wrap: break-word;" placehoder="Email/Mã đăng nhập">
  <button type="submit" style="width: 468px; height: 68px; left: 102px; top: 303px; position: absolute; background: #003C75; overflow: hidden; border-radius: 10px ;color: white; font-size: 25px; font-family: Inter; font-weight: 400; word-wrap: break-word">
    Tiếp tục
  </button>
</form>
<div style="width: 468px; height: 68px; left: 113px; top: 66px; position: absolute; color: white; font-size: 25px; font-family: Inter; font-weight: 400; word-wrap: break-word">MỜI NHẬP MÃ ĐĂNG NHẬP HOẶC EMAIL</div>
</div>
</div> -->
<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
<div style="width: 671px; height: 438px; position: relative; background: #2F36B5; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); overflow: hidden; border-radius: 30px; outline: 1px black solid; outline-offset: -1px">
<form method="POST" action="{{ route('password.email') }}">
    @csrf
<input type="text" name="email" style="width: 468px; height: 68px; left: 113px; top: 185px; position: absolute; background: #F0F0F0; overflow: hidden; border-radius: 10px; color: black; font-size: 25px; font-family: Inter; font-weight: 400; word-wrap: break-word;" placeholder="Email/Mã đăng nhập">
  <button type="submit" style="width: 468px; height: 68px; left: 102px; top: 303px; position: absolute; background: #003C75; overflow: hidden; border-radius: 10px ;color: white; font-size: 25px; font-family: Inter; font-weight: 400; word-wrap: break-word">
    Tiếp tục
  </button>
</form>
  <div style="left: 113px; top: 66px; position: absolute; color: white; font-size: 25px; font-family: Inter; font-weight: 400; word-wrap: break-word">MỜI NHẬP MÃ ĐĂNG NHẬP HOẶC EMAIL</div>
</div>