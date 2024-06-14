<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/mainicon.png') }}">
    <title>GEMA LMS - Reset Password</title>
</head>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: #f5f5f5;
}

.card {
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  margin: 40px auto;
  padding: 20px;
  width: 60%;
}

.card-body {
  padding: 20px;
}

.form-group {
  margin-bottom: 20px;
}

.form-control {
  height: 40px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  width: 100%
}

.form-control:focus {
  border-color: #66afe9;
  box-shadow: 0 0 10px rgba(102, 175, 233, 0.5);
}

.btn {
  background-color: #5F2DED;
  border: none;
  border-radius: 5px;
  color: #fff;
  cursor: pointer;
  padding: 10px 20px;
}

.btn:hover {
  background-color: white;
  color: black;
  border: 1px solid #5F2DED;
}

.alert {
  background-color: #f5f5f5;
  border: 1px solid #ddd;
  border-radius: 10px;
  padding: 10px;
}

.alert-danger {
  background-color: #f2dede;
  border-color: #eb5a4a;
}

.alert-success {
  background-color: #d9edf7;
  border-color: #b2dfdb;
}

.alert-dismissible {
  padding: 10px;
  border-bottom: 1px solid #ddd;
}

.alert-dismissible .close {
  float: right;
  font-size: 18px;
  cursor: pointer;
}

.alert-dismissible .close:hover {
  color: #666;
}
</style>
<body>
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h1 class="text-center" style="text-align: center">RESET PASSWORD</h1>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (session()->has('status'))
                        <div class="alert alert-success">
                            {{ session()->get('status') }}
                        </div>
                @endif
                <form method="POST" action="{{ route('password.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="email" value="{{ request()->email }}">
                    <input type="hidden" name="token" value="{{ request()->token }}">
                  <div class="form-group">
                    <label for="new_password">New Password:</label><br><br>
                    <input type="password" class="form-control" id="new_password" name="password" placeholder="Enter new password">
                  </div>
                  <div class="form-group">
                    <label for="confirm_password">Confirm Password:</label><br><br>
                    <input type="password" class="form-control" id="confirm_password" name="password_confirmation" placeholder="Confirm new password">
                  </div>
                  <button type="submit" class="btn btn-primary">Reset Password</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>
</html>
