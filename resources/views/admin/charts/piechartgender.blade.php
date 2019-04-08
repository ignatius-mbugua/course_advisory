<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="col-md-10">
            <h3>Table</h3>
            <table class="table table-bordered">
                <tr>
                    <th>Gender</th>
                    <th>Total</th>
                </tr>
                <tr>
                    <td>Male</td>
                    <td>{{$male_count}}</td>
                </tr>
                <tr>
                    <td>Female</td>
                    <td>{{$female_count}}</td>
                </tr>
            </table>
        </div>
        <div>
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3><b>Chart</b></h3></div>
                    <div class="panel-body">
                        <canvas id="canvas" width="400" height="150"></canvas>
                    </div>
                </div>
            </div>
        
            <button class="btn btn-success" name="print" id="print" onclick="printReport()">Print Report</button>
        </div>
    </div>
    
</body>
<script src="{{asset('lib/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('js/Chart.min.js') }}"></script>

    <script>
        //pie chart
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

        function printReport(){
            window.print();
        }
    </script>
</html>