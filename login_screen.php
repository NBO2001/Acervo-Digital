<!DOCTYPE html>
<!-- Desenvolvedor : N.B.O -> 02.02.2021 -->
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel='stylesheet' type='text/css' href='CSS/style.css'>
</head>
<body>        
        <form class='form_lg' action='login_process.php' method='post'>
            <img class='image_ufam' src='images/logo_ufam.jpg'/>
            <h1>Welcome!!!</h1>
            <input type='text' name='user_name' placeholder='your user name ...'/>
            <input type='password' id='user_password' name='password_user' placeholder='your password ...'/>
            <div class='ck_inp'>
                <input id='chk_see_pass' onclick='show_password()' name='chk_see_pass' type='checkbox'>
                <label for='chk_see_pass'>See password</label>
            </div>
                
            <input type='submit' name='button_submit' value='Send'/>

        </form>    
</body>
<script>
    function show_password(){
        var field_type = document.getElementById('user_password');
        if(field_type.type == "password"){
            field_type.type = 'text';
        }else{
            field_type.type = 'password';
        }
    }
</script>

</html>