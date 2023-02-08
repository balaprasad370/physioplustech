<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Physio Plus Tech</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'><link rel="stylesheet" href="./style.css">
<link rel='stylesheet' href='https://fullcalendar.io/assets/demo-to-codepen.css'>
<link rel='stylesheet' href='https://fullcalendar.io/releases/core/4.1.0/main.min.css'>
<link rel='stylesheet' href='https://fullcalendar.io/releases/daygrid/4.1.0/main.min.css'>
<link rel='stylesheet' href='https://fullcalendar.io/releases/timegrid/4.1.0/main.min.css'>
<link rel="stylesheet" href="<?php echo base_url() ?>asset/style.css">
<link href="https://getbootstrap.com/docs/3.4/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<style>
 #calendar {
 height:250px;
 overflow: scroll;
 }
* {
  margin: 0px;
  padding: 0px;
}

tr, td {
  width: 300px;
  text-align: left;
}

.nav {
  text-align: center;
}

.resume-content {
  display: inline-block;
  margin-top: 30px;
  margin-left: 30px;
  margin-right: 30px;
}

.profile {
  background-color: #F5F5F5;
  padding: 30px;
  text-align: left;
  font-size: 18px;
}

.content {
  width: 125px;
}

#personal-info {
  background-color: #E0E0E0;
}

.info-content {
  margin-top: 30px;
  margin-left: 10px;
}

#photo {
  width: 350px;
}

#orange {
  background-color: #FFA726;
  color: white;
  font-size: 18px;
}

#yellow {
  background-color: #D4E157;
  color: white;
  font-size: 18px;
}

#green {
  background-color: #66BB6A;
  color: white;
  font-size: 18px;
}

#blue {
  background-color: #42A5F5;
  color: white;
  font-size: 18px;
}

#name-top {
  background-color: #616161;
  padding-left: 50px;
  color: white;
  font-size: 18px;
}

#job-top {
  background-color: grey;
  padding-left: 50px;
  color: white;
  font-size: 18px;
}

#pro-skill {
  background-color: #42A5F5;
  padding-left: 25px;
}

#job {
  background-color: #AB47BC;
  padding-top: 20px;
  padding-left: 25px;
  padding-bottom: 15px;
}

#portfolio {
  text-align: center;
  padding: 30px;
  background-color: #66BB6A;
  font-size: 18px;
  color: white;
}

.folio {
  width: 350px;
  height: 200px;
  object-fit: cover;
}

#port-bottom {
  background-color: #66BB6A;
  height: 50px;
}

.contact {
  background-color: #616161;
  padding: 30px;
  padding-left: 60px;
  padding-right: 60px;
  color: white;
}

#get-in-touch {
  font-size: 30px;
  text-align: center;
  padding: 0px;
  border-left: 2px solid white;
}

.follow-me {
  display: inline-block;
  padding-right: 10px;
}

#follow {
  text-align: right;
  background-color: #616161;
  color: white;
  font-size: 18px;
  padding-right: 30px;
}
</style>
<body>

<!-- partial:index.partial.html -->
<div class="container">
    <div class="jumbotron">
      <table>
        <tr>
          <td rowspan="4"><img id="photo" src="https://physioplustech.in/uploads/logo/your_logo.png"></td>
        </tr>
        <tr>
          <td colspan="4" id="name-top"><strong><?php echo $this->session->userdata('clinic_name'); ?></strong></td>
        </tr>
        <tr>
          <td colspan="4" id="job-top"><strong> <?php echo $clinic_details['address']; ?> </strong></td>
        </tr>
        <tr>
          <td class="nav" id="orange"><strong>PROFILE</strong></td>
          <td class="nav" id="yellow"><strong>SKILLS</strong></td>
          <td class="nav" id="green"><strong>PORTFOLIO</strong></td>
          <td class="nav" id="blue"><strong>CONTACT</strong></td>
        </tr>
        <tr>
          <td colspan="2" class="profile">
		 <div id='calendar' ></div>
          </td>
          <td colspan="3" class="profile" id="personal-info"><strong>DOCTOR INFO</strong>
            <div class="info-content">
              <p style="font-size: 12px"><strong>NAME:</strong> <?php echo $this->session->userdata('first_name') ?><br></br><strong>Mobile:</strong> <?php echo $clinic_details['mobile']; ?>
<br></br><strong>EMAIL:</strong> <?php echo $clinic_details['email']; ?></p>
            </div>
          </td>
        </tr>
        <tr>
          <td id="job"><img src="https://i.imgur.com/XqbKpYU.png">             </td>
          <td id="pro-skill" colspan="4"><img src="https://i.imgur.com/SEiN3xy.png">
          </td>
        </tr>
        <tr>
          <td id="portfolio" colspan="5"><strong>MY WORKS/PORTFOLIO</strong></td>
        </tr>
        <tr>
          <td><img class="folio" src="https://images.duckduckgo.com/iu/?u=http%3A%2F%2Fwww.topdesignmag.com%2Fwp-content%2Fuploads%2F2012%2F06%2F22.-portfolio-design.jpg&f=1"></td>
          <td colspan="2"><img class="folio" src="https://images.duckduckgo.com/iu/?u=http%3A%2F%2Frichwp.com%2Fwp-content%2Fuploads%2F2013%2F07%2Fhandsome-portfolio-website.jpg&f=1"></td>
          <td colspan="2"><img class="folio" src="https://images.duckduckgo.com/iu/?u=http%3A%2F%2Fibrandstudio.com%2Fwp-content%2Fuploads%2F2013%2F09%2Fbest-portfolio-websites-MKJ-Creative.jpg&f=1"></td>
        </tr>
        <tr id="port-bottom">
          <td colspan="5"></td>
  	     </tr>
        <tr>
          <td class="contact" colspan="5"></td>
        </tr>
        <tr>
          <td colspan="2" class="contact">
            <form>
   <div class="form-group">
    <label for="usr">Name</label>
    <input type="text" class="form-control" id="usr">
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
          </td>
          <td colspan="4" class="contact" id="get-in-touch"><strong>GET IN <br>TOUCH</strong></td>
        </tr>
        <tr>
          <td id="follow" colspan="5">
            <ul>
              <li class="follow-me" id="follow"><strong>Follow me:</strong> </li>
              <li class="follow-me"><a href="https://www.facebook.com"><img src="https://i.gyazo.com/006724ad2ec587572a837b07c2d678c2.png"></a></li>
              <li class="follow-me"><a href="https://www.twitter.com"><img src="https://i.gyazo.com/43d70369bbf278084d71b4d9b7e8e977.png"></a></li>
              <li class="follow-me"><a href="https://www.linkedin.com"><img src="https://i.gyazo.com/b08a1cb3395d804ba0891dd6f6485369.png"></a></li>
            </ul>
          </td>
        </tr>
<tr>
  <td class="contact" colspan="5"></td>
</tr>
      </table>
  </div>
  
  <div id='calendar' style="width:500px; height:100px;"></div>
<div id="new_apt" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
		             <form class="form-horizontal" action="<?php echo base_url().'client/schedule/addAppointment' ?>" role="form" id="eventForm" method="post">
						  <div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
								<h3 class="modal-title thin">Add Appointment <small class="text-muted">( <span id="adapt"></span> )</small></h3>
							  </div>
							<div id="modalBody" class="modal-body">
							 <div class="pt_add" >
							 <div class="form-group">
								<label for="input01" class="col-sm-4 control-label">Patient Name  *</label>
								<div class="col-sm-6">
								  <input type="text" class="form-control"  name="full_name" id="full_name"   placeholder="Enter Full Name">
								</div>
							 </div>
							 <div class="form-group">
								<label for="input01" class="col-sm-4 control-label">Gender  *</label>
								<div class="col-sm-6">
								 <table>
								  <tr><td>
									<div class="radio radio-transparent">
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" id="optionsRadios1" class="gender" value="male">                            
									<label for="optionsRadios1"><font color="black">Male</font></label>
									</div></td><td>
									<div class="radio radio-transparent">
									<input type="radio" name="gender" id="optionsRadios2" class="gender" value="female">
									<label for="optionsRadios2"><font color="black">Female</font></label>
									</div></td></tr></table>
								</div>
							 </div>
							  <div class="form-group">
								<label for="input01" class="col-sm-4 control-label">Mobile Number </label>
								<div class="col-sm-6">
								   <input type="text" class="form-control mobile-num"  name="mobile_no" id="mobile_no"    placeholder="Enter Mobile Number">
								</div>
							 </div>
							 <div class="form-group">
								<label for="input01" class="col-sm-4 control-label">Email  </label>
								<div class="col-sm-6">
								  <input type="text" class="form-control" name="email"  id="email" placeholder="Enter Email">
								</div>
							 </div>
							 </div>
							 </div>
							 <input type="hidden" name="start_time" id="start" value="">
							 <input type="hidden" name="end_time" id="end" value="">
							 <div class="modal-footer">
							<button type="submit" class="btn btn-info" id="add_appointment">Add Appointment</button>
					 </div>
				</form>
        </div>
    </div>
</div>
</div>
<!-- partial -->
  
</body>
 <script src='https://fullcalendar.io/releases/core/4.1.0/main.min.js'></script>
<script src='https://fullcalendar.io/releases/interaction/4.1.0/main.min.js'></script>
<script src='https://fullcalendar.io/releases/daygrid/4.1.0/main.min.js'></script>
<script src='https://fullcalendar.io/releases/timegrid/4.1.0/main.min.js'></script>
<script src='https://fullcalendar.io/releases/google-calendar/4.1.0/main.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>window.jQuery || document.write('<script src="/docs/3.4/assets/js/vendor/jquery.min.js"><\/script>')</script>
 <script src="https://getbootstrap.com/docs/3.4/dist/js/bootstrap.min.js"></script>
<script>document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        columnHeaderHtml: function(date) {
            if (date.getUTCDay() === 0) {
            var date_day = "Sun";
            }
            if (date.getUTCDay() === 1) {
            var date_day = "Mon";
            }
            if (date.getUTCDay() === 2) {
            var date_day = "Tue";
            }
            if (date.getUTCDay() === 3) {
            var date_day = "Wed";
            }
            if (date.getUTCDay() === 4) {
            var date_day = "Thu";
            }
            if (date.getUTCDay() === 5) {
            var date_day = "Fri";
            }
            if (date.getUTCDay() === 6) {
            var date_day = "Sat";
            }
            if(date.getMonth() === 0)
            {
            var date_month = "Jan";
            } 
            if(date.getMonth() === 1)
            {
            var date_month = "Feb";
            } 
            if(date.getMonth() === 2)
            {
            var date_month = "Mar";
            } 
            if(date.getMonth() === 3)
            {
            var date_month = "Apr";
            } 
            if(date.getMonth() === 4)
            {
            var date_month = "May";
            } 
            if(date.getMonth() === 5)
            {
            var date_month = "Jun";
            } 
            if(date.getMonth() === 6)
            {
            var date_month = "Jul";
            } 
            if(date.getMonth() === 7)
            {
            var date_month = "Agu";
            } 
            if(date.getMonth() === 8)
            {
            var date_month = "Sep";
            } 
            if(date.getMonth() === 9)
            {
            var date_month = "Oct";
            } 
            if(date.getMonth() === 10)
            {
            var date_month = "Nov";
            } 
            if(date.getMonth() === 11)
            {
            var date_month = "Dec";
            } 

            var day_num = date.getDate();
            return '<b>'+date_day+'</b><br><small>'+day_num+" "+date_month+"</small>";

        },

        plugins: [ 'interaction', 'dayGrid', 'list', 'googleCalendar','timeGrid' ],
        selectable: true,
          resourceColumns: [   {
          width: '40px'
        }],
        defaultView: 'timeGridFourDay',
        views: {
            timeGridFourDay: {
                type: 'timeGrid',
                duration: { days: 4 },
                buttonText: '4 day'
            }
        },
        

        locale:'fr',
        header: {
            left: 'prev today',
			//middle : 'Make an appointment online',
            right: 'next'
        },
        validRange: {
            start: '2019-08-05 10:00:00',
            end: '2021-09-05'
        },
        allDaySlot:false,
        firstDay:1,
        minTime:"08:00:00",
        maxTime:"20:00:00",

        displayEventTime: true, // don't show the time column in list view
		googleCalendarApiKey: 'AIzaSyAL9K2UqkCVfV0n81mDW0iEpOJSwcklfsY',

        eventClick: function(arg) {
            arg.jsEvent.preventDefault() // don't navigate in main tab

            console.log(arg);
        },

    select: function(info) {
	  var d = new Date(info.start);
	  var d1 = new Date(info.end);
	  var date= moment(d).format('YYYY-MM-DD , H:mm:ss');
	  var date2 = moment(d).format('YYYY-MM-DD , hh:mm a');
	  var date1= moment(d1).format('YYYY-MM-DD , H:mm:ss');
	  $('#start').val(date);
	  $('#adapt').text(date2);
	  $('#end').val(date1);
	  $('#new_apt').modal('show');
				
    },
    slotDuration: "00:30:00",
		selectOverlap:false,
        displayEventEnd:false,
        events:[
        { 
        }],
        contentHeight: "auto",
        eventSources: [
        {
            googleCalendarId: 'contact@vetorino.com',
            className: "gcalEvent"

        }],
        eventRender: function () {
            $('.fc-widget-content').not(".fc-axis").each(function () {
			 if (!$(this).html()) {
                    var slots = $('.fc-day');
                    for (i = 0; i < slots.length; i++) {
                        $(this).append('<td class="temp-cell" style="border: 0px; width:' + (Number(slots.width()) + 3) + 'px"></td>');
                    }
					$(".temp-cell").each(function () {

                        var elem = $(this).first().parent().parent().data("time");
                        if (typeof elem  !== "undefined"){
                            var time = $(this).first().parent().parent().data("time").substring(0,5);
                            $(this).html('<div class="current-time w-100 h-100 align-items-center text-center" style="padding-left: 5px"><button>'+time+'</button></div>');                         
                        }
                            $(".gcalEvent div").html("<p class='w-100 h-100 align-items-center text-center m-0 event_planned'>-</p>");
                    });
                } else {
				    $(this).html();
				}
            });

        }
    });
    calendar.render();

  });</script>

</body>
</html>
