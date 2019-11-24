<!DOCTYPE html>
<html lang="en">
<head>
<title>Coba DogeeKu</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Little Closet template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="<?php echo base_url()?>assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/styles/responsive.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" 
        ntegrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> 
   
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'; ?>">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/fullcalendar/fullcalendar.css'; ?>">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'; ?>">

    <style>
        body{
            background-color: #FEFFE4;
        }

        .container{
            font-size:40%;
        }

        #button_tambahKegiatan{
            color: #FEFFE4;
            background-color: #5A3921;
            border-radius:50px;
            padding:1% 1% 1% 1%;
            width:150%;
        }

        #button_tambahKegiatan:hover{
            color: #5A3921;
            background-color: #F77754;
        }

        .modal-header{
            color: #FEFFE4;
            background-color: #5A3921;
        }

        .modal-content{
            background-color: #FEFFE4;
        }

        .modal-footer {
            width:100%;
            background-color:#FEFFE4;
            margin-top:-10px;
        }

        #button_editKegiatan{
            color: #FEFFE4;
            background-color: #5A3921;
            border-radius:50px;
            padding:1% 1% 1% 1%;
            width:20%;
        }

        #button_editKegiatan:hover{
            color: #5A3921;
            background-color: #F77754;
        }

        .close{
            color:#FEFFE4;
            opacity:1;
        }

        .planner{
               margin-top:10%;
               color:#5A3921;
               text-align:center;
               font-size:300%;
            }
    </style>
</head>
<body>

<!-- Menu -->

<?php include('Pside-bar.php')?>

<div class="super_container">

	<!-- Header -->
		<?php include('Ptop-bar.php')?>

	<div class="super_container_inner">
		<div class="super_overlay"></div>
        <div class="planner">
                    <div class="container">
                        <div class="page-content-wrapper">
                            <div class="page-content">
                                <div class="alert notification" style="display: none;">
                                    <button class="close" data-close="alert"></button>
                                </div>
            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet light bordered">
                                        <div class="portlet-body">
                                            <div class="table-toolbar">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="btn-group">
                                                            <a href=" <?php echo base_url(). 'PPlanner/tambah_kegiatan'?>">
                                                                <button id="button_tambahKegiatan">+ Tambah Kegiatan</button>
                                                            </a>
                                                            <br><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- place -->
                                            <div id="calendarIO"></div>
                                            <div class="modal fade" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form class="form-horizontal" method="POST" action="<?php echo base_url().'PPlanner/edit_kegiatan'?>">
                                                                <input type="hidden" name="calendar_id" value="0">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    <h4 class="modal-title" id="myModalLabel">Data Kegiatan</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <div class="alert alert-danger" style="display: none;"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-sm-3">Nama Anjing<span class="required" > * </span></label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" name="title" class="form-control" placeholder="Nama Anjing" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-sm-3">Nama Kegiatan<span class="required"> * </span></label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" name="nama_anjing" class="form-control" placeholder="Nama Kegiatan" readonly><br>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="color" class="col-sm-3 control-label">Color</label>
                                                                    <div class="col-sm-8">
                                                                        <select name="color" class="form-control" readonly>
                                                                            <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                                                                            <option style="color:#008000;" value="#008000">&#9724; Green</option>                       
                                                                            <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                                                                            <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                                                                            <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                                                                            <option style="color:#000;" value="#000">&#9724; Black</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-sm-3">Start Date</label>
                                                                    <div class="col-sm-8">
                                                                        <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                                            <input type="text" name="start_date" class="form-control" readonly>
                                                                            <span class="input-group-addon"><i class="fa fa-calendar font-dark"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-sm-3">End Date</label>
                                                                    <div class="col-sm-8">
                                                                        <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                                            <input type="text" name="end_date" class="form-control" readonly>
                                                                            <span class="input-group-addon"><i class="fa fa-calendar font-dark"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-sm-11">
                                                                    <button id="button_editKegiatan" type="SUBMIT">Edit</button>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            <!-- end place -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


    </div>
</div>

<script src="<?php echo base_url()?>assets/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/styles/bootstrap-4.1.2/popper.js"></script>
<script src="<?php echo base_url()?>assets/styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/greensock/TweenMax.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/greensock/TimelineMax.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/greensock/animation.gsap.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?php echo base_url()?>assets/plugins/easing/easing.js"></script>
<script src="<?php echo base_url()?>assets/plugins/progressbar/progressbar.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/parallax-js-master/parallax.min.js"></script>
<script src="<?php echo base_url()?>assets/js/custom.js"></script>


<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.min.js'; ?>"></script>      
<script type="text/javascript" src="<?php echo base_url().'assets/js/moment.min.js'; ?>"></script>      
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js'; ?>"></script>      
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'; ?>"></script>      
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/fullcalendar/fullcalendar.js'; ?>"></script>      
<script type="text/javascript">
    var get_data        = '<?php echo $get_data; ?>';
    var backend_url     = '<?php echo base_url(); ?>';

    $(document).ready(function() {
        $('.date-picker').datepicker();
        $('#calendarIO').fullCalendar({
            header: {
                left: 'prev,next today',
                center: '',
                right: 'title'
            },
            defaultDate: moment().format('YYYY-MM-DD'),
            editable: true,
                eventLimit: true, // allow "more" link when too many events
                selectable: true,
                selectHelper: true,
                eventDrop: function(event, delta, revertFunc) { // si changement de position
                    editDropResize(event);
                },
                eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur
                    editDropResize(event);
                },
                eventClick: function(event, element)
                {
                    deteil(event);
                },
                events: JSON.parse(get_data)
            });
    });

    function editDropResize(event)
    //pas pencet event, dia cari datanya.
    {
        start = event.start.format('YYYY-MM-DD HH:mm:ss');
        if(event.end)
        {
            end = event.end.format('YYYY-MM-DD HH:mm:ss');
        }
        else
        {
            end = start;
        }
        
        $.ajax({
            url     : backend_url+'PPlanner/save',
            type    : 'POST',
            data    : 'calendar_id='+event.id+'&title='+event.title+'&start_date='+start+'&end_date='+end,
            dataType: 'JSON',
            beforeSend: function()
            {
            },
            success: function(data)
            {
                if(data.status)
                {   
                    $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html('Data success update');
                }
                else
                {
                    $('.notification').removeClass('alert-primary').addClass('alert-danger').find('p').html('Data cant update');
                }
                
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                $('.notification').removeClass('alert-primary').addClass('alert-danger').find('p').html('Wrong server, please save again');
            }         
        });
    }

    function save()
    {
        $('#form_create').submit(function(){
            var element = $(this);
            var eventData;
            $.ajax({
                url     : backend_url+'PPlanner/save',
                type    : element.attr('method'),
                data    : element.serialize(),
                dataType: 'JSON',
                beforeSend: function()
                {
                    element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
                },
                success: function(data)
                {
                    if(data.status)
                    {   
                        eventData = {
                            id          : data.id,
                        title       : $('#create_modal input[name=title]').val(),
                        id_anjing   : $('#create_modal input[name=nama_anjing]').val(),
                        start       : moment($('#create_modal input[name=start_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                        end         : moment($('#create_modal input[name=end_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                        color       : $('#create_modal select[name=color]').val()
                        };
                            $('#calendarIO').fullCalendar('renderEvent', eventData, true); // stick? = true
                            $('#create_modal').modal('hide');
                            element[0].reset();
                            $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                        }
                        else
                        {
                            element.find('.alert').css('display', 'block');
                            element.find('.alert').html(data.notif);
                        }
                        element.find('button[type=submit]').html('Submit');
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        element.find('button[type=submit]').html('Submit');
                        element.find('.alert').css('display', 'block');
                        element.find('.alert').html('Wrong server, please save again');
                    }         
                });
            return false;
        })
    }

    function deteil(event)
    {
        $('#create_modal input[name=calendar_id]').val(event.id);
        $('#create_modal input[name=start_date]').val(moment(event.start).format('YYYY-MM-DD'));
        $('#create_modal input[name=end_date]').val(moment(event.end).format('YYYY-MM-DD'));
        $('#create_modal input[name=title]').val(event.title);
        $('#create_modal input[name=nama_anjing]').val(event.nama_anjing);
        $('#create_modal select[name=color]').val(event.color);
        $('#create_modal .delete_calendar').show();
        $('#create_modal').modal('show');
    }


</script>
</body>
</html>