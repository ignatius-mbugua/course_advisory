@extends('Admin1.layout.admin')

@section('content')
  <div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="/admin/home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
      <h1>Dashboard</h1>
    </div>
    <!--End-breadcrumbs-->
    <div class="container-fluid" id="printable_area">
      <hr>
      <div class="row-fluid">
        <div class="span12">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3><b>Personalities</b></h3></div>
                    <div class="panel-body">
                        <canvas id="canvas2" width="400" height="150"></canvas>
                    </div>
                </div>
                <a class="btn btn-success" href="/admin/report/bar-chart">Generate Report</a>
            </div>
        
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3><b>Male and Female</b></h3></div>
                    <div class="panel-body">
                        <canvas id="canvas" width="400" height="150"></canvas>
                    </div>
                </div>
                <a class="btn btn-success" href="/admin/report/pie-chart-gender">Generate Report</a>
            </div>
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3><b>Feedback</b></h3></div>
                    <div class="panel-body">
                        <canvas id="canvas3" width="400" height="150"></canvas>
                    </div>
                </div>
                <a class="btn btn-success" href="/admin/report/pie-chart-feedback">Generate Report</a>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script>
        //bar chart
        var url1 = "{{ url('admin/report/personalitydata') }}";
        var Labels1 = new Array();
        var Male = new Array();
        var Female = new Array();
        $(document).ready(function(){
          $.get(url1, function(response1){
            response1.forEach(function(data1){
                Labels1.push(data1.personality);
                Male.push(data1.male);
                Female.push(data1.female);
            });
            var ctx1 = document.getElementById("canvas2").getContext('2d');
                var myChart1 = new Chart(ctx1, {
                  type: 'bar',
                  data: {
                      labels:Labels1,
                      datasets: [
                          {
                            label: 'Female',
                            backgroundColor: "#000099",
                            data: Female,
                          },
                          {
                            label: 'Male',
                            backgroundColor: "#003300",
                            data: Male,
                          }

                        ]
                  },
                  options: {
                      legend: {display: true},
                      title: {
                          display: true,
                          text: 'Students Personalities 2018'
                      }
                  }
              });
          });
        });
        
        //pie chart gender
        var url = "{{ url('/admin/report/genderdata') }}";
        var Labels = new Array();
        var Total = new Array();
        $(document).ready(function(){
          $.get(url, function(response){
            response.forEach(function(data){
                Labels.push(data.gender);
                Total.push(data.total);
            });
            var ctx = document.getElementById("canvas");
                var myChart = new Chart(ctx, {
                  type: 'pie',
                  data: {
                      labels:Labels,
                      datasets: [{
                          label: 'Total',
                          backgroundColor: ["#8e5ea2", "#3cba9f"],
                          data: Total,
                          borderWidth: 1
                      }]
                  },
                  options: {
                      title: {
                          display: true,
                          text: 'Male and Female Students 2018'
                      }
                  }
              });
          });
        });

        //pie chart feedback
        var url2 = "{{ url('/admin/report/feedbackdata') }}";
        var Labels2 = new Array();
        var Total2 = new Array();
        $(document).ready(function(){
          $.get(url2, function(response2){
            response2.forEach(function(data2){
                Labels2.push(data2.satisfied);
                Total2.push(data2.total);
            });
            var ctx = document.getElementById("canvas3");
                var myChart = new Chart(ctx, {
                  type: 'pie',
                  data: {
                      labels:Labels2,
                      datasets: [{
                          label: 'Total',
                          backgroundColor: ["#339900", "#CC3300"],
                          data: Total2,
                          borderWidth: 1
                      }]
                  },
                  options: {
                      title: {
                          display: true,
                          text: 'Feedback Students 2018'
                      }
                  }
              });
          });
        });
    </script>
@endsection