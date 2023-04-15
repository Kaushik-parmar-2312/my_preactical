
@extends('layouts.app')
@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

input[type=text],input[type=email],input[type=password]{
  width: 50%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>

<div class="container">
    <label><h1>Insert  User Data</h1></label>
    <div>
      <!-- @if ($errors->any())
        @foreach ($errors->all() as $error)
           {{$error}}
        @endforeach
      @endif -->
    </div>



    <form id="first_form" method="post"  action="{{route ('user.store') }}"  >
        @csrf
    <div class="row">
      <div class="col-25">
        <label for="fname">Name</label>
      </div>
      <div class="col-75" >
        <input type="text" id="name" name="name" value ="{{ old('name') }}" placeholder="Your name.."  >

              @if ($errors->has('name'))
                  <span  id ="fn"  class="errormsg text-danger ">{{ $errors->first('name') }}</span>
               @endif
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Email</label>
      </div>
      <div class="col-75">
        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Your email..">

        @if ($errors->has('email'))
                  <span  id ="ln" class="errormsg text-danger" >{{ $errors->first('email') }}</span>
               @endif
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="lname">Password</label>
      </div>
      <div class="col-75">
        <input type="password" id="password" name="password" value="{{ old('passsword') }}" placeholder="Your  password..">

              @if ($errors->has('password'))
                  <span  id ="ln" class="errormsg text-danger" >{{ $errors->first('password') }}</span>
               @endif
      </div>
    </div>


    <div class="row"  >
      <input type="submit" id='form_submit2'  value="Submit">
    </div>
  </form>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
// $(document).ready (function () {
    function myFunction(){
      Isvalid = true;
      // e.preventDefault();
      var first_name = $('#name').val();
      var email = $('#email').val();
      var password=$('#password').val();
      console.log(name);
      console.log(password);
      $(".errormsg").remove();

      if (first_name.length < 1) {
        Isvalid = false;
        $('#name').after('<span class="errormsg text-danger">This field is required</span>');
      }


      if (email.length < 1)
      {
          $('#email').after('<span class="errormsg text-danger">This field is required</span>');
      }
      else
      {
        var regEx = /^[A-Z0-9][A-Z0-9._%+-]{0,63}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/;
        var validEmail = regEx.test(email);
        if (!validEmail)
        {
          $('#email').after('<span class="errormsg text-danger">Enter a valid email</span>');
        }
      }


      if (password.length < 8)
      {
        $('#password').after('<span class="errormsg text-danger">Password must be at least 8 characters long</span>');
      }

      return (Isvalid);
  }

// });
</script>
<!--
<script src="{{asset('theme/js/jquery.min.js')}}"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script>
  $(document).ready (function () {
  $("#basic-form").validate ();
});
  $(document).ready (function () {
    $('#first_form').validate({
    rules: {
      fname: 'required',
      lname: 'required',
    },
    messages: {
      fname: 'This field is required',
      lname: 'This field is required',

    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});
</script> -->


</div>

@endsection
