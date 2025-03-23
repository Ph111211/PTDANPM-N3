<div style="width: 671px; height: 598px; position: absolute; background: #2F36B5; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); overflow: hidden; border-radius: 30px; outline: 1px black solid; outline-offset: -1px; left: 50%; transform: translateX(-50%);">
<div style="left: 20.5%; top: 66px; position: absolute; color: white; font-size: 25px; font-family: Inter; font-weight: 400; word-wrap: break-word; text-align: center;">Cập nhật mật khẩu mới với mã OTP</div>
<form action="{{ route('password.store')}}" method="POST">
    @csrf
    <input type="text" name="otp" style="width: 240px; height: 65px; left: 33.3%; top: 365px; position: absolute; background: #F0F0F0; overflow: hidden; border-radius: 10px; transform: translateX(-50%); border: none; font-size: 25px; font-family: Inter; font-weight: 400; word-wrap: break-word; padding-left: 10px;" placeholder=" Mã OTP"/>
    <input type="password" name="password" style="width: 468px; height: 68px; left: 50%; top: 143px; position: absolute; background: #F0F0F0; overflow: hidden; border-radius: 10px; transform: translateX(-50%); border: none; font-size: 25px; font-family: Inter; font-weight: 400; word-wrap: break-word; padding-left: 10px;" placeholder="Mật khẩu mới"/>
    <input type="password" name="password_confirmation" style="width: 468px; height: 68px; left: 50%; top: 254px; position: absolute; background: #F0F0F0; overflow: hidden; border-radius: 10px; transform: translateX(-50%); border: none; font-size: 25px; font-family: Inter; font-weight: 400; word-wrap: break-word; padding-left: 10px;" placeholder="Xác nhận mật khẩu mới"/>
    <button type="submit" style="width: 468px; height: 68px; left: 50%; top: 485px; position: absolute; background: #003C75; overflow: hidden; border-radius: 10px; transform: translateX(-50%); border: none; font-size: 25px; font-family: Inter; font-weight: 400; word-wrap: break-word; color: white;">Xác nhận</button>
</form>    
<!-- <div style="width: 240px; height: 65px; left: 33.3%; top: 365px; position: absolute; background: #F0F0F0; overflow: hidden; border-radius: 10px; transform: translateX(-50%);">
        <div style="width: 265px; height: 32px; left: 30px; top: 18px; position: absolute; opacity: 0.50; color: black; font-size: 25px; font-family: Inter; font-weight: 400; word-wrap: break-word">Mã OTP<br/><br/></div>
    </div>
    
    <div style="width: 468px; height: 68px; left: 50%; top: 485px; position: absolute; background: #003C75; overflow: hidden; border-radius: 10px; transform: translateX(-50%);">
        <div style="width: 222px; height: 32px; left: 182px; top: 18px; position: absolute; color: white; font-size: 25px; font-family: Inter; font-weight: 400; word-wrap: break-word">Xác nhận</div>
    </div>
    <div style="left: 20.5%; top: 66px; position: absolute; color: white; font-size: 25px; font-family: Inter; font-weight: 400; word-wrap: break-word; text-align: center;">Cập nhật mật khẩu mới với mã OTP</div>
    <div style="width: 468px; height: 68px; left: 50%; top: 143px; position: absolute; background: #F0F0F0; overflow: hidden; border-radius: 10px; transform: translateX(-50%);">
        <div style="width: 265px; height: 32px; left: 30px; top: 18px; position: absolute; opacity: 0.50; color: black; font-size: 25px; font-family: Inter; font-weight: 400; word-wrap: break-word">Mật khẩu mới<br/></div>
    </div>
    <div style="width: 468px; height: 68px; left: 50%; top: 254px; position: absolute; background: #F0F0F0; overflow: hidden; border-radius: 10px; transform: translateX(-50%);">
        <div style="width: 414px; height: 32px; left: 30px; top: 18px; position: absolute; opacity: 0.50; color: black; font-size: 25px; font-family: Inter; font-weight: 400; word-wrap: break-word">Xác nhận mật khẩu mới<br/><br/></div>
    </div> -->
</div>