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
        
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Personalities</b></div>
                <div class="panel-body">
                    <canvas id="canvas2" height="280" width="600"></canvas>
                </div>
            </div>
        </div>
        <button class="btn btn-success" name="print" id="print" onclick="printReport()">Print Report</button>
    </div>
</body>
<script src="{{asset('lib/jquery/jquery.min.js')}}"></script>
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

        function printReport(){
            window.print();
        }
    </script>
</html>