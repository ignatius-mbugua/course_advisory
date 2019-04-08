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
            <h3>Table:</h3>
            <table class="table table-bordered">
                <tr>
                    <th>FeedBack</th>
                    <th>Total</th>
                </tr>
                <tr>
                    <td>Yes</td>
                    <td>{{$yes_count}}</td>
                </tr>
                <tr>
                    <td>No</td>
                    <td>{{$no_count}}</td>
                </tr>
            </table>
        </div>
        <div>
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3><b>Feedback</b></h3></div>
                    <div class="panel-body">
                        <canvas id="canvas3" width="400" height="150"></canvas>
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

        function printReport(){
            window.print();
        }
    </script>
</html>