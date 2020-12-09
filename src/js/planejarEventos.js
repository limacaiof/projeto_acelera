
var despesasElement = document.querySelectorAll(".eventosTable");
var valoresElement = document.querySelectorAll(".valorTable");
var color = document.querySelectorAll(".despesasTable");
var mesDepesas =  document.querySelectorAll(".dataTable");

var labels = [];
despesasElement.forEach(element => {
    labels.push(element.innerHTML).toString;
});

var valores = [];
valoresElement.forEach(element => {
    valores.push(element.innerHTML).toFixed(2);
});

var datas = [];
mesDepesas.forEach(element => {
    var pedaco = element.innerHTML.split("/");
    var dataQuaseFormatada = `${pedaco[2]}/${pedaco[1]}/${pedaco[0]}`;
    datas.push(ano(new Date(dataQuaseFormatada).getMonth()));
    // datas.push(element.innerHTML).toFixed(2);
});

// alert(valores);
function dadosGraficos (mes, valor ){
    dados = [];
    data = {
        label: "Mês "+mes,
        data: valor,
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
        ],
        borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            
        ],
        borderWidth: 2  
    }
    // dados.push(labels);// Colocar Shallow Copy
    dados.push(data);// Colocar Shallow Copy
    return dados;
}

// ASSOCIANDO VALORES COM AS DATAS
datasets = [];
nomesEventos = [];
var validate = [];
var arrayMes = [];
var mes = {
    nome: '',
    evento: [],
    valor: [],
}
console.log(datas)
for (index in datas){
    vali = true;
    mesRepetiu = "";
    validate.forEach(validar =>{
        if(validar != datas[index]){
            validate.push(datas[index])
        }else{
            vali = false;
            mesRepetiu = validar;
        }
    })
    
    if(vali){
        validate.push(datas[index]);
        mes.nome = datas[index];
        mes.evento.push(labels[index]);
        mes.valor.push(valores[index]);
        arrayMes.push(Object.assign({},mes));// Colocar Shallow Copy
    }else{
        console.log("Este Reptiu")
        arrayMes.forEach(item =>{
            if(item.nome == mesRepetiu){
                item.evento.push(labels[index]);
                item.valor.push(valores[index]);
            }
        })
        mesRepetiu = "";
    }
    mes.nome = '';
    mes.evento= []
    mes.valor = []
}
// INSERINDO NO GRAFICO
labelsViw = [];
var cont = 1;
arrayMes.forEach(element =>{
    for (var a = 1; a < cont ; a++){
        element.valor.unshift( null );
    }
    console.log( element.evento)
    // console.log( element.nome)
    datasets.push(dadosGraficos(element.nome,element.valor, element.evento)[0]);
    labelsViw.push( element.evento);
    cont ++;
});
console.log("ADSADASDASDASDSADASDASDASD");
console.log(nomesEventos);
console.log("ADSADASDASDASDSADASDASDASD");
console.log(datasets);

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Eventos',
            data: valores,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                
            ],
            borderWidth: 2  
        }]
    },
    
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

function ano (valor){
    var mes;
    switch (valor){
        case 0 :
            mes = "Janeiro";
            break;
        case 1 :
            mes = "Fevereiro";
            break;
        case 2 :
            mes = "Março";
            break;
        case 3 :
            mes = "Abril";
            break;
        case 4 :
            mes = "Maio";
            
            break;
        case 5 :
            mes = "Junho";
            
            break;
        case 6 :
            mes = "Julho";
            
            break;
        case 7 :
            mes = "Agosto";
            
            break;
        case 8 :
            mes = "Setembro";
            
            break;
        case 9 :
            mes = "Outubro";
            
            break;
        case 10 :
            mes = "Novembro";
            
            break;
        case 11 :
            mes = "Dezembro";
            
            break;
        default:
            console.log("ERRO VALOR DE ANO ERRADO");
            break;
    }
    return mes;
}








