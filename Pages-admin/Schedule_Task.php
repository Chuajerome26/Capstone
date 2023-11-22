<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>Schedule task</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<style type="text/css">
    	body{margin-top:20px;}
.Scheduling .section-title .title-text {
    margin-bottom: 50px;
}

.Scheduling .tab-area .nav-tabs {
    border-bottom: inherit;
}

.Scheduling .tab-area .nav {
    border-bottom: inherit;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    margin-top: 80px;
}

.Scheduling .tab-area .nav-item {
    margin-bottom: 75px;
}
.Scheduling .tab-area .nav-item .nav-link {
    text-align: center;
    font-size: 22px;
    color: #333;
    font-weight: 600;
    border-radius: inherit;
    border: inherit;
    padding: 0px;
    text-transform: capitalize !important;
}
.Scheduling .tab-area .nav-item .nav-link.active {
    color: #4125dd;
    background-color: transparent;
}

.Scheduling .tab-area .tab-content .table {
    margin-bottom: 0;
    width: 80%;
}
.Scheduling .tab-area .tab-content .table thead td,
.Scheduling .tab-area .tab-content .table thead th {
    border-bottom-width: 1px;
    font-size: 20px;
    font-weight: 600;
    color: #252525;
}
.Scheduling .tab-area .tab-content .table td,
.Scheduling .tab-area .tab-content .table th {
    border: 1px solid #b7b7b7;
    padding-left: 30px;
}
.Scheduling .tab-area .tab-content .table tbody th .heading,
.Scheduling .tab-area .tab-content .table tbody td .heading {
    font-size: 16px;
    text-transform: capitalize;
    margin-bottom: 16px;
    font-weight: 500;
    color: #252525;
    margin-bottom: 6px;
}
.Scheduling .tab-area .tab-content .table tbody th span,
.Scheduling .tab-area .tab-content .table tbody td span {
    color: #4125dd;
    font-size: 18px;
    text-transform: uppercase;
    margin-bottom: 6px;
    display: block;
}
.Scheduling .tab-area .tab-content .table tbody th span.date,
.Scheduling .tab-area .tab-content .table tbody td span.date {
    color: #656565;
    font-size: 14px;
    font-weight: 500;
    margin-top: 15px;
}
.event-schedule-area .tab-area .tab-content .table tbody th p {
    font-size: 14px;
    margin: 0;
    font-weight: normal;
}

.Scheduling .section-title .title-text h2 {
    margin: 0px 0 15px;
}

.Scheduling1 ul.custom-tab {
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    border-bottom: 1px solid #dee2e6;
    margin-bottom: 30px;
}
.Scheduling1 ul.custom-tab li {
    margin-right: 70px;
    position: relative;
}
.Scheduling1 ul.custom-tab li a {
    color: #252525;
    font-size: 25px;
    line-height: 25px;
    font-weight: 600;
    text-transform: capitalize;
    padding: 35px 0;
    position: relative;
}
.Scheduling1 ul.custom-tab li a:hover:before {
    width: 100%;
}
.Scheduling1 ul.custom-tab li a:before {
    position: absolute;
    left: 0;
    bottom: 0;
    content: "";
    background: #4125dd;
    width: 0;
    height: 2px;
    -webkit-transition: all 0.4s;
    -o-transition: all 0.4s;
    transition: all 0.4s;
}
.Scheduling1 ul.custom-tab li a.active {
    color: #4125dd;
}

.Scheduling1 .primary-btn {
    margin-top: 40px;
}

.Scheduling1 .tab-content .table {
    -webkit-box-shadow: 0 1px 30px rgba(0, 0, 0, 0.1);
    box-shadow: 0 1px 30px rgba(0, 0, 0, 0.1);
    margin-bottom: 0;
}
.Scheduling1 .tab-content .table thead {
    background-color: #007bff;
    color: #fff;
    font-size: 20px;
}
.Scheduling1 .tab-content .table thead tr th {
    padding: 20px;
    border: 0;
}
.Scheduling1 .tab-content .table tbody {
    background: #fff;
}
.Scheduling1 .tab-content .table tbody tr.inner-box {
    border-bottom: 1px solid #dee2e6;
}
.Scheduling1 .tab-content .table tbody tr th {
    border: 0;
    padding: 30px 20px;
    vertical-align: middle;
}
.Scheduling1 .tab-content .table tbody tr th .event-date {
    color: #252525;
    text-align: center;
}
.Scheduling1 .tab-content .table tbody tr th .event-date span {
    font-size: 50px;
    line-height: 50px;
    font-weight: normal;
}
.Scheduling1 .tab-content .table tbody tr td {
    padding: 30px 20px;
    vertical-align: middle;
}
.Scheduling1 .tab-content .table tbody tr td .r-no span {
    color: #252525;
}
.Scheduling1 .tab-content .table tbody tr td .event-wrap h3 a {
    font-size: 20px;
    line-height: 20px;
    color: #cf057c;
    -webkit-transition: all 0.4s;
    -o-transition: all 0.4s;
    transition: all 0.4s;
}
.Scheduling1 .tab-content .table tbody tr td .event-wrap h3 a:hover {
    color: #4125dd;
}
.Scheduling1 .tab-content .table tbody tr td .event-wrap .categories {
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    margin: 10px 0;
}
.Scheduling1 .tab-content .table tbody tr td .event-wrap .categories a {
    color: #252525;
    font-size: 16px;
    margin-left: 10px;
    -webkit-transition: all 0.4s;
    -o-transition: all 0.4s;
    transition: all 0.4s;
}
.Scheduling1 .tab-content .table tbody tr td .event-wrap .categories a:before {
    content: "\f07b";
    font-family: fontawesome;
    padding-right: 5px;
}
.Scheduling1 .tab-content .table tbody tr td .event-wrap .time span {
    color: #252525;
}
.Scheduling1 .tab-content .table tbody tr td .event-wrap .organizers {
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    margin: 10px 0;
}
.Scheduling1 .tab-content .table tbody tr td .event-wrap .organizers a {
    color: #4125dd;
    font-size: 16px;
    -webkit-transition: all 0.4s;
    -o-transition: all 0.4s;
    transition: all 0.4s;
}
.Scheduling1 .tab-content .table tbody tr td .event-wrap .organizers a:hover {
    color: #4125dd;
}
.Scheduling1 .tab-content .table tbody tr td .event-wrap .organizers a:before {
    content: "\f007";
    font-family: fontawesome;
    padding-right: 5px;
}
.Scheduling1 .tab-content .table tbody tr td .primary-btn {
    margin-top: 0;
    text-align: center;
}
.Scheduling1 .tab-content .table tbody tr td .event-img img {
    width: 100px;
    height: 100px;
    border-radius: 8px;
}

    </style>
</head>
<body>
<div class="event-schedule-area-two bg-color pad100">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="section-title text-center">
<div class="title-text">
<h2>Schedule Task</h2>
</div>
<p>
    <button type="button" class="btn btn-primary">Add Schedule</button>
</p>
</div>
</div>

</div>

<div class="row">
    <div class="col-lg-12">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active show" id="home" role="tabpanel">
            <div class="table-responsive">
            <table class="table">
            <thead>
                <tr>
                    <th class="text-center" scope="col">Date</th>
                    <th scope="col">Profile</th>
                    <th scope="col">Session</th>
                    <th scope="col">Venue</th>
                    <th class="text-center" scope="col">Add to Records</th>
                </tr>
            </thead>
            <tbody>
                <tr class="inner-box">
                    <th scope="row"><div class="event-date"><span>16</span><p>Novembar</p></div></th>
                <td><div class="event-img"><img src="C:\Users\marti\Downloads\noprofilepic.jpg" alt /></div></td>
                <td><div class="event-wrap">
                        <h3><a href="#">Jericho castro</a></h3>
                        <div class="time">
                            <span>05:35 AM - 08:00 AM 2h 25'</span>
                        </div>
                    </div>  
                </td>
                <td>
                    <div class="r-no">
                        <span>Room B3</span>
                    </div>
                </td>
                <td>
                <div class="primary-btn">
                    <button type="button" class="btn btn-primary" name="rate">Rate</button>
                </div>
                </td>
                </tr>

                </tbody>
                </table>
</div>
</div>
</div>

</div>
</div>

</div>

</div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>