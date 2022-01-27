<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forgot Page</title>
<link href="css/forgot-passwords.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <br />
    <br />
    <div class="login-card">
        <div class="log_head">
            <h1>Reset Password</h1>
        </div>
        <div class="log_body">
            <form id="savePasswordBtn" >
                <table width="400">
                    <tr>
                        <td><input type="password" placeholder="Enter your new Password"
                                name="password" id="password" class="log_user"></td>
                    </tr>

                    <div id='passwordrequired'></div>
                    <br>
                    <br>
                    <tr>
                        <td>

                            <input type="password"  
                                placeholder="Re-enter your new Password" name="confirmedpassword" id="confirmedpassword"
                                class="log_user">
                        </td>
                    </tr>
                    <div id='confirmedpasswordRequired'></div>

                    <tr>
                        <td><input type="submit" class="btn btn-lg" type="submit"
                                value="Save new Password"></td>
                    </tr>

                </table>

            </form>
        </div>

    </div>
</body>

</html>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="js/resetPassword.js" type="module"></script>
