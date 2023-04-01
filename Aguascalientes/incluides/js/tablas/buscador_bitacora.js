$(document).ready(function(){
                    var table= $('#dataTable').DataTable({
                        lengthMenu: [ 50, 75, 100 ],
                        language: {
                            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-MX.json',
                        },
                        orderCellsTop: true,
                        fixedHeader: true
                    });
                
                    //Creamos  una fila en el head de la tabla y lo clonamos para cada columna
                        $('#dataTable thead tr').clone(true).appendTo('#dataTable thead');
                
                        $('#dataTable thead tr:eq(1) th').each(function(i){
                            var title = $(this).text();
                            if(title == 'ID' || title == 'Status' || title == 'Acciones'){
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