<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>SJE performance tracker</title>
    <link rel="icon" href="{{ asset('images/434134192_783730273679533_5794188159581194881_n.png') }}" type="image/png">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #1e90ff;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #23a2f6,
        #1845ad
    );
    left: -250px;
    top: -80px;
}

form{
    height: 520px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 600px;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.role{
  margin-top: 30px;
  display: flex;
}
.role div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.role div:hover{
  background-color: rgba(255,255,255,0.47);
}

form.second-form {
    background-image: url('{{ asset('images/434134192_783730273679533_5794188159581194881_n (1).png') }}');
            background-size: 60% 50%;;
            background-repeat: no-repeat;
            background-color: white;
            background-position: center;
        }
.role .selected {
        background-color: white;
        color: #1e90ff;
        font-weight: bold;
      }

     

    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="POST" id="loginForm" action="{{ route('login.responsable') }}">
    @csrf
        <h3>Welcome Back!</h3>
        <div class="role">
            <div id="responsable" >  Responsable</div>
            <div id="membre" style="margin-left:25px" class="selected" >  Membre</div>
          </div>

        <label for="username">Username</label>
        <input type="text" placeholder="email" id="username" name="email" >

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" id="password">

        <button>Log In</button>
        
    </form>
    <form class="second-form" style="margin-left: 400px;"></form>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Update form action when the DOM is loaded
        updateFormAction();

        // Add event listeners to role divs to update form action when clicked
        document.getElementById('responsable').addEventListener('click', function() {
            updateFormAction('responsable');
            updateRoleStyle('responsable');
        });

        document.getElementById('membre').addEventListener('click', function() {
            updateFormAction('membre');
            updateRoleStyle('membre');
        });
    });

    function updateFormAction(role) {
        // Set the default route name
        let route = "/login/responsable";

        // Update the route based on the selected role
        if (role === 'membre') {
            route = "/login/membre";
        }

        // Update the form action with the appropriate route
        document.getElementById('loginForm').action = route;
    }

    function updateRoleStyle(selectedRole) {
        const roleDivs = document.querySelectorAll('.role div');
        roleDivs.forEach(div => {
            if (div.id === selectedRole) {
                div.classList.add('selected');
            } else {
                div.classList.remove('selected');
            }
        });
    }
</script>



</html>
