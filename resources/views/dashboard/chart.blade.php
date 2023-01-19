@extends('dashboard.template.app')
@section('content')


    <div class="row">
        <div class="col-sm-6 col-xl-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">User Chart</h6>
                </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title" align="center">Statistik User</h4>
                     <canvas id="bcChart" class="chartjs" width="undefined" height="120px"></canvas>
                </div>
            </div>
              </div>
            </div> 
            <div class="col-sm-6 col-xl-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Kondisi Barang Chart</h6>
                    </div>
                <canvas id="myPieChart" height="100px" width="100px"></canvas>
                </div>
            </div>                 
        </div>

        <div class="row mt-2 mb-3">
            <div class="col-sm-6 col-xl-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Peminjaman Chart</h6>
                    </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title" align="center">Statistik Peminjaman</h4>
                         <canvas id="bcChart1" class="chartjs" width="undefined" height="undefined"></canvas>
                    </div>
                </div>
                  </div>
                </div> 
                             
            </div>
  
    @endsection
    
  @section('bar')
<script type="text/javascript">
    var ctx = document.getElementById("bcChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($label); ?>,
        datasets: [{
        label: 'Statistik User',
        backgroundColor: '#ADD8E6',
        borderColor: '#93C3D2',
        data: <?php echo json_encode($jumlah_user); ?>
        }],
        options: {
    animation: {
        onProgress: function(animation) {
            progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
        }
      }
    }
   },
 });
</script>
@endsection

@section('bar1')
<script type="text/javascript">
    var ctx = document.getElementById("bcChart1").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($label); ?>,
        datasets: [{
        label: 'Statistik Peminjaman',
        backgroundColor: '#FAD3E7',
        borderColor: '#EFA3C8',
        data: <?php echo json_encode($peminjaman_barang); ?>
        }],
        options: {
    animation: {
        onProgress: function(animation) {
            progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
        }
      }
    }
   },
 });
</script>
@endsection

@section('bar2')
<script>
            var ctx = document.getElementById('myPieChart');
         
            var myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    datasets: [{
                        label: 'Colors',
                        data: [{{ $baik }}, {{ $rusak }}],
                        backgroundColor: ["#EFA3C8", "#FAD3E7"]
                    }],
                    labels: ['Baik','Rusak'],

                },
                options: {
                tooltips: {
                  callbacks: {
                    label: function(tooltipItem, data) {
                      return data['labels'][tooltipItem['index']] + ': ' + data['datasets'][0]['data'][tooltipItem['index']] + ' Barang';
                    }
                  }
                }
            }
            
            });
        </script>
        @endsection    
