@extends('Admin1.layout.admin')

@section('content')
  <div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="/admin_home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
      <h1>Dashboard</h1>
    </div>
    <!--End-breadcrumbs-->
    <div class="container-fluid">
      <hr>
      <div class="row-fluid">
        <div class="span12">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Temperaments</b></div>
                    <div class="panel-body">
                        <canvas id="canvas2" height="280" width="600"></canvas>
                    </div>
                </div>
            </div>
        
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Male vs Female</b></div>
                    <div class="panel-body">
                        <canvas id="canvas" height="280" width="600"></canvas>
                    </div>
                </div>
            </div>
        
            <button class="btn btn-success" name="print" id="print" onclick="printReport()">Print Report</button>
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
        var Years1 = new Array();
        var Labels1 = new Array();
        var Total1 = new Array();
        $(document).ready(function(){
          $.get(url1, function(response1){
            response1.forEach(function(data1){
                Labels1.push(data1.personality);
                Total1.push(data1.total);
            });
            var ctx1 = document.getElementById("canvas2").getContext('2d');
                var myChart1 = new Chart(ctx1, {
                  type: 'bar',
                  data: {
                      labels:Labels1,
                      datasets: [{
                          label: 'Total',
                          backgroundColor: "#000099",
                          data: Total1,
                          borderWidth: 1
                      }]
                  },
                  options: {
                      legend: {display: true},
                      title: {
                          display: true,
                          text: 'Students Temperaments 2018'
                      }
                  }
              });
          });
        });
        
        //pie chart
        var url = "{{ url('admin/report/chartdata') }}";
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

        function printReport(){
            window.print();
        }
    </script>
@endsection