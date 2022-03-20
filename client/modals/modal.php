<div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body" id="logindiv">
                <form id="loginForm">
                    <div id="loginmsg"></div>
                    <div class="form-group">
                        <label for="Firstname">Email</label>
                        <input class="form-control" type="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="lastName">Password</label>
                        <input class="form-control" type="password" id="userPassword">
                    </div>
                    <button type="submit" class="btn btn-lg" id="logBtn" name="login">Login</button>
                </form>
                <br>
                <br>
                <a data-target="#myModal" data-toggle="modal" class="MainNavText" id="forgetPassword"
                    href="#myModal">Forget your password? Click here</a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-lg" id="registerButton" name="registerButton">Register</button>
                <button type="button" class="btn btn-lg" id="closeButton" name="closeButton"
                    data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Forget Password</h4>
            </div>
            <div class="modal-body" id="logindiv">
                <form id="forgetform">
                    <div id="errormsg"></div>
                    <div class="form-group">
                        <label for="Firstname">Email</label>
                        <input class="form-control" type="email" id="useremail">
                    </div>
                    <button type="submit" class="btn btn-lg" id="forgetPasswordBtn" name="forgetPasswordBtn">Send
                        link</button>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-lg" id="closeButton" name="closeButton"
                    data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<div id="registerModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-header">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Sign up</h4>
            </div>
            <form class="modal-body" id="registerdiv">
                <div id="msgDiv"></div>
                <div class="form-group">
                    <label for="Firstname">Firstname</label>
                    <input class="form-control" type="text" name="firstname" id="firstname"
                        placeholder="Please enter your firstname">
                </div>
                <span id='firstnamemessage'></span>
                <div class="form-group">
                    <label for="lastName">Lastname</label>
                    <input class="form-control" type="text" name="lastname" id="lastname"
                        placeholder="Please enter your lastname">
                </div>
                <span id='lastnamemessage'></span>
                <div class="form-group">
                <label for="Email">Email</label>
                    <input class="form-control" type="text" name="emailaddress" id="emailaddress"
                        placeholder="Please enter your emailaddresse">
                </div>
              <span id='emailaddressmessage'></span>
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" class="form-control" name="password" id="password"
                        placeholder="Please enter your password">
                </div>
                <span id='passwordrequired'></span>
                <div class="form-group">
                    <label for="pass">Confirmed password</label>
                    <input type="password" class="form-control" name="confirmedpassword" id="confirmedpassword"
                        placeholder="Please re-enter your password">
                </div>
                <span id='confirmedpasswordRequired'></span>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <br>
                    <select name="usergender" id="usergender" class="form-control">
                        <option value="" selected>Choose Your Gender</option>
                        <option class="form-control" value="Male">Male</option>
                        <option class="form-control" value="Female">Female</option>
                    </select>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="6Le7uDsaAAAAAC7N9TjSTajSI2kDU0MxmWOCvzOw" id=""></div>
                </div>
                <br>
                <button type="submit" class="btn btn-lg" id="regBtn" name="register">Register</button>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-lg" id="loginButton" name="loginButton">Login</button>
            </div>

        </div>
    </div>
</div>



 

<script src="js/jquery.min.js"></script>
<script src="js/login.js" type="module"></script>
<script src="js/forgetUserPassword.js" type="module"></script>
<script src="js/registerNewUsers.js" type="module"></script>
<script src="js/search_partner.js" type="module"></script>