<!DOCTYPE html>
<html>
	<head>
	 <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta http-equiv="Content-Language" content="en">
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	 <title>Physio Plus Tech - ChatRoom </title>
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"    />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	 <meta name="msapplication-tap-highlight" content="no">
    <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
	 <link href="<?php echo base_url()?>my_assets/main.css" rel="stylesheet"> 
     <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/mdp.css">
	 <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/prettify.css">
	<script src="<?php echo base_url() ?>assets/sweet-alert/sweetalert.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/sweet-alert/sweetalert.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.gritter.css" />
	<script src='https://meet.jit.si/external_api.js'></script>
        <style>
            /* The Overlay (background) */
.overlay {
  /* Height & width depends on how you want to reveal the overlay (see JS below) */   
  height: 100%;
  width: 0;
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  background-color: rgb(0,0,0); /* Black fallback color */
  background-color: rgba(205, 222, 230, 0.9);/* Black w/opacity */
  overflow-x: hidden; /* Disable horizontal scroll */
  transition: 0.5s; /* 0.5 second transition effect to slide in or slide down the overlay (height or width, depending on reveal) */
}

/* Position the content inside the overlay */
.overlay-content {
  position: relative;
  top: 25%; /* 25% from the top */
  width: 100%; /* 100% width */
  text-align: center; /* Centered text/links */
  margin-top: 30px; /* 30px top margin to avoid conflict with the close button on smaller screens */
}

/* The navigation links inside the overlay */
.overlay a {
  padding: 8px;
  text-decoration: none;
  font-size: 36px;
  color: #818181;
  display: block; /* Display block instead of inline */
  transition: 0.3s; /* Transition effects on hover (color) */
}

/* When you mouse over the navigation links, change their color */
.overlay a:hover, .overlay a:focus {
  color: #f1f1f1;
}

/* Position the close button (top right corner) */
.overlay .closebtn {
  position: absolute;
  top: 20px;
  right: 45px;
  font-size: 60px;
}

/* When the height of the screen is less than 450 pixels, change the font-size of the links and position the close button again, so they don't overlap */
@media screen and (max-height: 450px) {
  .overlay a {font-size: 20px}
  .overlay .closebtn {
    font-size: 40px;
    top: 15px;
    right: 35px;
  }
}</style>
    </head>
	<body> 
          <?php if ($chatroom != ""){ ?>
      <div id="myNav" class="overlay" onclick=initJitsiMeet();>
              <div class="overlay-content">
                <a href="#" id="chatroom1" onclick=initJitsiMeet();>Your virtual session is ready!!!</a>
                <img src="https://physioplustech.asia/images/physio-tech.png"  alt="Medico Logo">
    <a href="#" id="chatroom" onclick=initJitsiMeet();>Click to Enter Chatroom</a>


  </div>
      
    <script>
 isJitsiVideo = false;
custJitsiAPI = undefined;
function initJitsiMeet() {
document.getElementById("chatroom").style.display = "none";
document.getElementById("chatroom1").style.display = "none";
document.getElementById("myNav").style.display = "none";


  if(!isJitsiVideo && custJitsiAPI == undefined) {
    console.log('Initializing Jitsi Meet...');
    var domain = "conference.physioplustech.in";
    var options = {
        roomName: <?php echo json_encode($chatroom); ?>,
        height: window.innerHeight,
        width: window.innerWidth,
        parentNode: document.getElementById("click4help-video"),
    }
    custJitsiAPI= new JitsiMeetExternalAPI(domain, options);
     //custJitsiAPI.executeCommand('displayName', 'Customer');
     //custJitsiAPI.executeCommand('toggleChat');

    //custJitsiAPI.addListener('readyToClose', () => {console.log('call hung up fron add Listener Event');});
    custJitsiAPI.addEventListener('readyToClose',  function(){
                                              console.log('call hung up fron add Event Listener Event');
                                              alert('call hung up fron add Event Listener Event');
                                              });
    //custJitsiAPI.on('readyToClose', () => {console.log('call hung up fron ON event');});
    isJitsiVideo = true;
  }
}
 document.getElementById("myNav").style.width = "100%";
</script>
</div>
    <div id ="click4help-video"></div>

<?php }else{ ?>
    <div id="meet"> Chat Room is Empty!! </div>
<?php } ?>
</body>
</html>