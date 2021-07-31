function loaddata(){
        var dataload = [0,0,0,0,0,0,0,0,0,0,0,0] ;
        $.get("data.php", function(data, status){
            data = JSON.parse(data);
            data.map(x => {dataload[x.thang -1] = x.dt});
            console.log(dataload);
            thongkeUI (dataload);
        });
        
}

function thongkeUI(datamoney){
    const labels = [
      'Tháng 1',
      'Tháng 2',
      'Tháng 3',
      'Tháng 4',
      'Tháng 5',
      'Tháng 6',
      'Tháng 7',
      'Tháng 8',
      'Tháng 9',
      'Tháng 10',
      'Tháng 11',
      'Tháng 12',
  ];
  const data = {
  labels: labels,
  datasets: [{
  label: 'Bảng thống kê danh thu trong năm 2021',
  backgroundColor: 'rgb(25, 240, 67)',
  borderColor: 'rgb(25, 240, 67)',
  data: datamoney
  }]
  };
  const config = {
    type: 'line',
    data,
    options: {}
  };
  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
  
  }
  