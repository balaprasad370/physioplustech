<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Physio Plus Tech</title>
        <link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
	<style>
	*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body{
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #00416A;
    background: -webkit-linear-gradient(135deg,  #3f6ad8, #6f42c1);
    background: linear-gradient(135deg,  #3f6ad8, #6f42c1);
}
.container{
    width: 260px;
    padding: 25px;
    border-radius: 5px;
    position: relative;
    background: #fff;
    box-shadow: 2px 2px 10px  rgba(0, 0, 0, 0.5);
}
.container.full{
    width: 480px;
}
.top-bar{
    margin-bottom: 12px;
    margin-top: 5px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.top-bar .icon{
    height: 64px;
    width: 64px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #3494E6;
    background: -webkit-linear-gradient(135deg, #3f6ad8, #6f42c1);
    background: linear-gradient(135deg, #3f6ad8, #6f42c1);
    border-radius: 50%;
    border:1px solid rgba(0, 0, 0, 0.2);
}
.top-bar .icon i{
    font-size: 20px;
    color: #fff;
}
h1{
    font-size: 20px;
    margin-bottom: 10px;
    color: #747474;
    background: -webkit-linear-gradient(135deg, #3f6ad8, #6f42c1);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    letter-spacing: 1px;
    text-align: center;
}
p{
    font-size: 12px;
    margin-bottom: 12px;
    color: #626060;
    letter-spacing: 1px;
    text-align: center;
}
a{
    font-weight: 500;
    color: #3494E6;
    transition: 0.3s;
}
a:hover{
    color: orangered;
}
label{
    font-size: 12px;
    color: #626060;
    margin-left: 10px;
    border:1px solid rgba(0, 0, 0, 0.2);
    user-select: none;
}
.input-group{
    margin-bottom: 12px;
    width: 100%;
    position: relative;
    display: flex;
    flex-direction: row;
}
.input-group .input-box{
    width: 100%;
    margin-right: 12px;
    position: relative;
}
.input-group .input-box:last-child{
    margin-right: 0;
}
input[type="text"],
input[type="tel"],
input[type="email"],
input[type="password"]{
    padding: 0px 10px 0px 32px;
    width: 100%;
    height: 36px;
    border:1px solid rgba(0, 0, 0, 0.2);
    outline: none;
    letter-spacing: 1px;
    transition: 0.3s;
    border-radius: 3px;
    color: #717171;
    box-shadow: inset 0 1px 1px 0 rgba(0, 0, 0, 0.1);
}
input[type="text"]:focus,
input[type="tel"]:focus,
input[type="email"]:focus,
input[type="password"]:focus{
    border-color: #3494E6;
    box-shadow: inset 0 1px 1px 0 rgba(0, 0, 0, 0.1),
                0 0 0 4px rgba(0, 127, 255, 0.3);
}
input[type="text"]:focus::-webkit-input-placeholder,
input[type="tel"]:focus::-webkit-input-placeholder,
input[type="email"]:focus::-webkit-input-placeholder,
input[type="password"]:focus::-webkit-input-placeholder{
    color: #3494E6;
}
.input-group i{
    height: 34px;
    width: 34px;
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    top: 1px;
    left: 1px;
    color: #717171;
    border-radius: 2px 0 0 2px;
    transition: 0.3s;
    font-size: 14px;
    pointer-events: none;
}
.input-group input:focus + i{
    color: #3494E6;
}
.button-group{
    width: 100%;
    margin-bottom: 12px;
    position: relative;
    display: flex;
    flex-direction: row;
}
.button-group .button-box{
    width: 100%;
    margin-right: 12px;
    position: relative;
}
.button-group .button-box:last-child{
    margin-right: 0;
}
button{
    background: #3494E6;
    background: -webkit-linear-gradient(135deg,  #3f6ad8, #6f42c1);
    background: linear-gradient(135deg,  #3f6ad8, #6f42c1);
    border:1px solid rgba(0, 0, 0, 0.2);
    color:#fff;
    outline: none;
    padding:0px 10px;
    height: 36px;
    cursor:pointer;
    border-radius: 3px;
    box-shadow: inset 0 1px 1px 0 rgba(255, 255, 255, 0.6); 
    letter-spacing: 1px;
    transition: 0.5s;
    width: 100%;
}
button:hover{
    background: orangered;
    background: -webkit-linear-gradient(-135deg,  #3f6ad8, #6f42c1);
    background: linear-gradient(-135deg,  #3f6ad8, #6f42c1);
    box-shadow: inset 0 1px 1px 0 rgba(255, 255, 255, 0.6),
                0 0 0 4px rgba(0, 127, 255, 0.3);
}
	</style>
	</head>
	<body>
		<div class="container full app-header header-shadow bg-plum-plate header-text-light">
			<div class="top-bar">
					<img src="<?php echo base_url() ?>/frontend_assets/img/New%20Purple%20243x68px%20beta.png" style="width:220px;" ><img>
			</div></br>
			<h1>OTP Verification Form</h1>
			<?php if ($error_msg != "" && $appoint_id != "") { ?>
					<div class="danger" style="margin-right:15px;color: #D8000C;background-color: #FFD2D2;text-align: center;
						margin-top: 6%;">Wrong OTP!! <a href="<?php echo base_url().'pages/otp_verification/'.$appoint_id ?>">Click here</a> to try again!!! </div>
					 <?php } else { ?>
					<form action="<?php echo base_url().'telehealthroom/join' ?>" method="post" name="ContactUs" id="ContactUs" class="admin_form">
					<?php
					if($this->session->flashdata('message')): echo '<div class="success">'.$this->session->flashdata('message').'</div>'; endif;
					if($this->session->flashdata('warning')): echo '<div class="danger">'.$this->session->flashdata('warning').'</div>'; endif;

					?>
				<div class="input-group">
					<div class="input-box">
					    <input type="hidden" name="upload_img" id="upload_img"  style="width:100%;"/>
					    <input type="hidden" name="invite" id="invite" value="<?php echo $invite; ?>" />
					    <input type="hidden" name="appoint_id" id="appoint_id" value="<?php echo $appoint_id; ?>" />
					    <input type="text" name="otp" id="otp" placeholder="Enter your OTP" title="" required>
						<i class="fas fa-pencil-alt"></i>
					</div>
				</div>
				
				<div class="button-group">
					<div class="button-box">
						<button type="submit">  Verify OTP</button>
					</div>
				</div>
			</form>
			<?php } ?>
		</div>
	</body>
</html>