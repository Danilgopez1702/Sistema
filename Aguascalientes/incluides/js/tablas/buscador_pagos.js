$(document).ready(function(){
    

    //Creamos  una fila en el head de la tabla y lo clonamos para cada columna
        $('#dataTable thead tr').clone(true).appendTo('#dataTable thead');

        $('#dataTable thead tr:eq(1) th').each(function(i){
            var title = $(this).text();
            if(title == 'ID' ){
                $(this).html('<h2 style="color:blank;"><H2/>');
            }else{
            $(this).html('<input class= "col-md-12" type= "text" placeholder= "Buscar..." />');
            $( 'input', this ).on( 'keyup change', function(){
                if(table.column(i).search() !== this.value){
                    table   
                        .column(i)
                        .search( this.value)
                        .draw();
                }
            })
        }
        });
})